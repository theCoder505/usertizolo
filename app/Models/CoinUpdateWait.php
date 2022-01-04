<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinUpdateWait extends Model
{
    use HasFactory;

    public $table = 'coins_update';
    public $autoincrement = true;
    public $primarykey = 'sno';
    public $keytype = 'int';
    public $timestamp = true;
}
