<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Regras extends Model
{
  protected $table = "regras";
    // Relação many-to-many
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
