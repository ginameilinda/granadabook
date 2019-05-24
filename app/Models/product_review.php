<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class product_review extends Model
{
	/**
	*The attributes that are mass assignable
	*
	*@var array
	*/ 
	
	protected $fillable = [
		'user_id', 'product_id', 'description', 'comen', 'rating'
	];
}
