<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;

    public $table = 'user_data';
    public $autoincrement = true;
    public $primarykey = 'id';
    public $keytype = 'int';
    public $timestamp = true;
}
