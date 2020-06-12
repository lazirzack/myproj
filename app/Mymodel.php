<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mymodel extends Model
{
    public $timestamps = true;
	protected $fillable=['name','alamat','email','notelp'];
}
