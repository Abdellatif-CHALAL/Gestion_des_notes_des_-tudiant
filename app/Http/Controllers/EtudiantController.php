<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $etudiant = Etudiant::where('name','LIKE',"%$keyword%")->paginate($perPage);
        } else {
            $etudiant = Etudiant::paginate($perPage);
        }

        return view('etudiant.index', compact('etudiant'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiant.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
        ]);
    
        $input = $request->all();
    
       Etudiant::create($input);
    
        return redirect('etudiant')->with('flash_message', 'Etudiant a bien été ajouté!');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiant.show',compact('etudiant'));
    }
    


     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);

        return view('etudiant.edit', compact('etudiant'));
    }
    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
        ]);
    
        $input = $request->all();
        
    
        $etudiant = Etudiant::find($id);
        $etudiant->update($input);
        
        return redirect('etudiant')->with('flash_message', 'Etudiant a bien été modifié!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etudiant::destroy($id);

        return redirect('etudiant')->with('flash_message', 'Etudiant a bien été supprimer!');
    }
}
