<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','prenom',
    ];


    public function etudiants(){
        return $this->belongsToMany(Matiere::class);
    }
}
