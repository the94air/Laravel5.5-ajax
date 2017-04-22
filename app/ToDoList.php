<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

Class ToDoList extends Model
{
	protected $dates = ['created_at', 'updated_at'];

	protected $fillable = ['title', 'item'];

	protected $table = 'lists';
}
