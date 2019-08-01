<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarded = []; 

    protected $dates = [
        'date',
        'entramanha',
        'saimanha',
        'entratarde',
        'saitarde'
    ];
   
}
