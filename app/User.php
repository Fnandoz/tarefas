<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Regras;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relação many-to-many

    public function regras()
    {
      return $this->belongsToMany(Regras::class);
    }

    public function RegrasAutorizadas($regra)
    {
      if(is_array($regra)){
        return $this->checaRegras($regra) || abort(401, 'Sem autorização.');
      }
      return $this->checaRegra($regra) || abort(401, 'Sem autorização.');
    }

    public function checaRegras($regras)
    {
      return null !== $this->regras()->whereIn('nome', $regras)->first();
    }

    public function checaRegra($regra)
    {
      return null !== $this->regras()->where('nome', $regra)->first();
    }

    public function retornaRegras()
    {
      return $this->regras()->orderBy('nome')->get();
    }
}
