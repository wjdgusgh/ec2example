<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    public $timestamps = false;
    protected $fillable = ['id', 'password', 'name', 'phonenumber', 'birthday', 'division', 'purpose'];
    protected $hidden = [ 'password' ];
}
