<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;
   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'name', 'phone', 'email', 'active', 'token'
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
