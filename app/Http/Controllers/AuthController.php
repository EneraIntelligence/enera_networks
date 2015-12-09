<?php

namespace Networks\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Networks\Http\Requests;
use Networks\Http\Controllers\Controller;
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
        if ($validator->passes()) {
            if (auth()->attempt(['email' => Input::get('email'), 'password' => Input::get('password')], Input::get('login_page_stay_signed'))) {
                return redirect()->route('home');
            } else {
                return redirect()->route('auth.index')->with('error', 'El correo y/o la contraseña son incorrectos.');
            }
        } else {
            return redirect()->route('auth.index')->withErrors($validator);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.index');
    }
}
