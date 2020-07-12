<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_matiere','Coeff_matiere',
    ];


    public function matieres(){
        return $this->belongsToMany(Etudiant::class);
    }
}
