<?php

namespace Networks;

use Jenssegers\Mongodb\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * Networks\Administrator
 *
 * @property-read \Networks\Client $client
 * @property-read \Networks\Role $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Campaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Subcampaign[] $subcampaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\AdministratorMovement[] $movements
 * @property-read \Illuminate\Database\Eloquent\Collection|\Networks\Payment[] $payments
 * @property-read mixed $id
 */
class Administrator extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database collection used by the model.
     *
     * @var string
     */
    protected $table = 'administrators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'rol_id', 'client_id', 'status', 'wallet', 'history', 'giftcards'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // relations
    public function client()
    {
        return $this->belongsTo('Networks\Client');
    }

    public function role()
    {
        return $this->belongsTo('Networks\Role');
    }

    public function campaigns()
    {
        return $this->hasMany('Networks\Campaign');
    }

    public function subcampaigns()
    {
        return $this->hasMany('Networks\Subcampaign');
    }

    public function wallet()
    {
        return $this->embedsOne('Networks\AdministratorWallet');
    }

    public function movements()
    {
        return $this->hasMany('Networks\AdministratorMovement');
    }

    public function history()
    {
        return $this->embedsMany('Networks\AdministratorHistory');
    }

    public function payments()
    {
        return $this->hasMany('Networks\Payment');
    }
    // end relations
}
