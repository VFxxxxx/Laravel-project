<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'type', 'start', 'end',
    ];

	protected $dates = ['created_at', 'updated_at'];
}
