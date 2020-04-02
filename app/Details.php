<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'user_id', 'email', 'dob', 'city',
    ];

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
