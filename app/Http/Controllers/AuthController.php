<?php

namespace Networks\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Input;
use Mail;
use Networks\Administrator;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
use Networks\ValidationCode;
use Validator;

class AuthController extends Controller
{
    /**
     * Muestra el formulario
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Recibe los datos desde el formulario
     */
    public function login()
    {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email|min:6|max:250',
            'password' => 'required|alpha_num|min:8|max:16',
        ]);

        Input::flashOnly('email');

        if ($validator->passes()) {
            if (auth()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')], Input::get('login_page_stay_signed'))) {
                return redirect()->route('home');
            } else {
                return redirect()->route('auth.index')->withInput()->with('error', 'El correo y/o la contraseña son incorrectos.');
            }
        } else {
            return redirect()->route('auth.index')->withInput()->with('error', 'El correo y/o la contraseña son incorrectos.');
//            return redirect()->route('auth.index')->withErrors($validator);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.index');
    }

    public function verify($id, $token) //verifica los codigos que llegan
    {
        $code = ValidationCode::where('token', $token)->first();// busco el codigo en la base de datos
        if ($code != null && $code->count() > 0) //si el codigo existe
        {
            echo 'el codigo existe';
            if ($code->administrator_id == $id) //verifico si el token es el mismo
            {
                echo 'si el codigo pertenece al user';
                $tipo = $code->type;
                /*** se compara que tipo de codigo es   ***/
                switch ($tipo) {
                    case 'resetPassword':
                        $data['id'] = $id;
                        $data['token'] = $token;
                        return redirect()->route('auth.newpassword')->with('data', $data);
                        break;
                    case 'validationEmail':
                        echo 'validar email';
                        $admin = Administrator::find($id);
//                        dd($admin);
                        if ($admin && $admin->status != 'active') {
                            $admin->status = 'active';   //cambio el status de pending a active
                            $admin->save();
                            /**    se agrega el historial de cuando se cambio a activo     **/
                            $admin->history()->create(array('previous_status' => 'pending'));
                            /**    se borra el validation code     **/
                            $code->delete();
                            //  se regresa al login con mensaje de que se activo cuenta
                            return redirect()->route('auth.index')->with('data', 'active');
                        } else {
                            return redirect()->route('auth.index')->with('data', 'invalido');
                        }
                        break;
                    default:
                        return redirect()->route('auth.index')->with('data', 'invalido');
                        break;
                }
            } else {
                return redirect()->route('auth.index')->with('data', 'invalido');
            }
        } else {
            return redirect()->route('auth.index')->with('data', 'invalido');
        }

    }

    public function restore()   //manda correo para recuperar contraseña
    {

        //dd(Input::all());
        $validator = Validator::make(Input::all(), [
            'reset_password_email' => 'required|email|max:250'
        ]);
//        var_dump(Input::all());
        if ($validator->passes()) {
//            dd($validator);
            $admin = Administrator::where('email', Input::get('reset_password_email'))->first();
            if ($admin != null) {
                if ($admin && $admin->status == 'active') {
                    $confirmation_code = md5(Input::get('email')) . date('Ymdhms');
                    $data['correo'] = $admin->email;
                    $data['nombre'] = $admin->name['first'];
                    $data['apellido'] = $admin->name['last'];
                    $data['session'] = session('_token');
                    $data['id_usuario'] = $admin->_id;
                    $data['confirmation_code'] = $confirmation_code;
                    $correo = $admin->email;
                    $nombre = $admin->name['first'];

                    $Token = ValidationCode::create(array(
                        'administrator_id' => $admin->_id, 'type' => 'resetPassword', 'token' => $confirmation_code
                    ));
//                    var_dump($data);
//                    var_dump($admin);

                    Mail::send('emails.resetpass', ['data' => $data], function ($message) use ($correo, $nombre) {
                        $message->from('notificacion@enera.mx', 'Enera Intelligence');
                        $message->to($correo, $nombre)->subject('Recuperacion de contraseña');
                    });
                    //dd($data);
                    return redirect()->route('auth.index')->with('reset_msg2', '<p>Se envió un correo a <strong> ' . Input::get('reset_password_email') . ' </strong>  con instrucciones para restablecer la contraseña </p>');
                } else if ($admin && $admin->status == 'pending') {
                    return redirect()->route('auth.index')->with('reset_msg2', '<p>La cuenta <strong> ' . Input::get('reset_password_email') . ' </strong>  no se ha activado todavía. por favor activa tu cuenta primero </p>');
                }
            } else {
                return redirect()->route('auth.index')->with('reset_msg2', '<p>Se envió un correo a <strong> ' . Input::get('reset_password_email') . ' </strong>  con instrucciones para restablecer la contraseña </p>');
            }
        } else {
            return redirect()->route('auth.index')->withErrors($validator);
        }
    }

    public function newpassword() //vista solo valida, si no traes variables te regresa a login
    {
        $data = session('data');
        if ($data != null || session('cc') != null) {
            return view('auth.newpassword')->with('data', $data);
        } 
        else {
            $status = 'Hubo un problema, verifica el enlace de tu correo.';
        }
        return redirect()->route('auth.index')->with('error', $status);
    }

    public function newpass() //post recibe la nueva contraseña y la pone
    {
        $validator = Validator::make(Input::all(), [
            'password' => 'required|alpha_num|min:8|max:16',
            'confirma_contraseña' => 'required|alpha_num|min:8|max:16',
            'u' => 'required',
            't' => 'required'
        ]);

        if ($validator->passes()) {
            $new = Hash::make(Input::get('password'));
            $admin = Administrator::where('_id', Input::get('u'))->first();
            if ($admin != null) {
                $admin->password = $new;
                $admin->save();
                /**    se agrega el historial de cuando se cambio a activo     **/
                $admin->history()->create(array('previous_status' => 'cambio de contraseña'));
                /**    se borra el validation code     **/
                $code = ValidationCode::where('token', Input::get('t'))->first();// busco el codigo en la base de datos y lo borro
                $code->delete();

                $data['correo'] = $admin->email;
                $data['nombre'] = $admin->name['first'];
                $data['apellido'] = $admin->name['last'];
                $data['session'] = session('_token');
                $data['id_usuario'] = $admin->_id;
                $correo = $admin->email;
                $nombre = $admin->name['first'];

                Mail::send('emails.confirmreset', ['data' => $data], function ($message) use ($correo, $nombre) {
                    $message->from('notificacion@enera.mx', 'Enera Intelligence');
                    $message->to($correo, $nombre)->subject('Confirmacion de Recuperacion de contraseña');
                });

                return redirect()->route('auth.index')->with('reset_msg2', 'se ha cambiado la contraseña');
            } else {
                return redirect()->route('auth.index')->with('data', 'invalido');
            }
        } else {
            return redirect()->route('auth.index')->with('data', 'invalido');
        }
    }

    public function remove()
    {
        $validator = Validator::make(Input::all(), [
            'id' => 'required|alpha_num|min:8|max:25'
        ]);
        if ($validator->passes()){
            $tokens = ValidationCode::where('administrator_id', Input::get('id'))->get();// busco el codigo en la base de datos y lo borro
            foreach ($tokens as $k => $v) { //se recorre el arreglo con todos los tokens que alla creado y se borran
                $tokens[$k]->delete();
            }
            return redirect()->route('auth.index')->with('reset_msg2', 'tu solicitud de cancelacion se ha procesado');
        } else {
            echo 'no trae datos';
            return redirect()->route('auth.index');
        }
    }
}
