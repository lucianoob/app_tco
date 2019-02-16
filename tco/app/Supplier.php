<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'name', 'phone',
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
