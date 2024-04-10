<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jefatura extends Model
{
  use HasFactory;

  protected $table = 'jefatura';


  public function personales()
  {
      return $this->hasMany(Personal::class, 'jefatura', 'id');
  }

}
