<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\AdministratorMovement
 *
 * @property-read \Networks\Administrator $admin
 * @property-read \Networks\Client $client
 * @property-read \Networks\AdministratorMovement $reference
 * @property-read \Networks\Payment $payment
 * @property-read mixed $id
 */
class AdministratorMovement extends Model
{
    protected $fillable = ['administrator_id', 'client_id', 'movement', 'reference_id', 'reference_type', 'amount', 'balance'];

    // relations
    public function admin()
    {
        return $this->belongsTo('Networks\Administrator');
    }

    public function client()
    {
        return $this->belongsTo('Networks\Client');
    }

    public function reference()
    {
        return $this->morphTo();
    }

    public function payment()
    {
        return $this->hasOne('Networks\Payment', 'movement_id');
    }
    // end relations
}
