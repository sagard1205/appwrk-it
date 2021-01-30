<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
 
    protected $fillable = ['transaction_type', 'description', 'amount'];   
}
