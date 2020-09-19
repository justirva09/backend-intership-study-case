<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
  protected $table = 'employee';
  protected $fillable = [
    'name',
    'email',
    'phone_number',
    'profession'
  ];
}