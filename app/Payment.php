<?php

namespace Networks;

use Jenssegers\Mongodb\Model;

/**
 * Networks\Payment
 *
 * @property-read \Networks\Administrator $admin
 * @property-read \Networks\AdministratorMovement $movement
 * @property-read mixed $id
 */
class Payment extends Model
{
    protected $fillable = ['amount', 'type', 'movement_id', 'status', 'invoice', 'history',
        'paypal', 'giftcard', 'conekta'];

    // relations
    public function admin()
    {
        return $this->belongsTo('Networks\Administrator');
    }

    public function movement()
    {
        return $this->belongsTo('Networks\AdministratorMovement', 'movement_id');
    }

    public function history()
    {
        return $this->embedsMany('Networks\AdministratorHistory');
    }
    // end relations
}
