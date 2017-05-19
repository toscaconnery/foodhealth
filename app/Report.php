<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $table = 'report';

	protected $fillable = [
		'title', 'description', 'imagepath', 'longitude', 'latitude', 'isvalidated', 'staff',
	];
}
