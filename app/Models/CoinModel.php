<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinModel extends Model
{
    use HasFactory;

    public $table = 'coininfos';
    public $autoincrement = true;
    public $primarykey = 'id';
    public $keytype = 'int';
    public $timestamp = true;
}
