<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'title', 'start', 'end',
    ];

	protected $dates = ['created_at', 'updated_at'];
}
