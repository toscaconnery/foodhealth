<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	protected $table = 'report';

	protected $fillable = [
		'Title', 'Description', 'ImagePath', 'Longitude', 'Latitude', 'IsValidated', 'Staff',
	];
}
