<?php

namespace App\Http\Controllers;

use App\Etudiant;
use App\Matiere;
use App\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $etudiant = Etudiant::all();
        $matiere = Matiere::all();
        $note = Note::all();

        return view('note.index', compact('etudiant','matiere','note'));
    }

    public function formulaire($id)
    {
        $matiere = Matiere::all();
        return view('note.formulaire', compact('matiere', 'id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->id_etudiant;
        $id_matiere = $request->id_matiere;


        $this->validate($request, [
            'note' => 'required|min:1|max:20',
            'id_etudiant' => 'required',
            'id_matiere' => 'required',
        ]);
        
        $note_update = Note::where('id_etudiant', $request->id_etudiant)->where('id_matiere', $request->id_matiere)->first();

        if (!collect($note_update)->isEmpty()) {
            $note_update->fill($request->all());
        }else{
            $input = $request->all();
            Note::create($input);
        }
        
        $matiere = Matiere::all();
        $note = Note::all();
        $etudiant = Etudiant::all();
        $i = 0;
        foreach ($note as $key => $value) {
            if($value->id_etudiant == $id)
                $i++;
        }
        if (count($matiere) === $i) {
            return view('note.index', compact('etudiant','matiere','note'));
        }
        return view('note.formulaire', compact('matiere', 'id'))->with('flash_message', 'Etudiant a bien été ajouté!');
    }
}
