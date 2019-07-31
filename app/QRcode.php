<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRcode extends Model
{
    public function userCode()
    {
        return $this->hasOneThrough('App\Histoy', 'App\User');
    } 
}
