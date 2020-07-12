<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
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
            $matiere = Matiere::where('name','LIKE',"%$keyword%")->paginate($perPage);
        } else {
            $matiere = Matiere::paginate($perPage);
        }

        return view('matiere.index', compact('matiere'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matiere.create');
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
            'nom_matiere' => 'required',
            'Coeff_matiere' => 'required',
        ]);
    
        $input = $request->all();
    
        Matiere::create($input);
    
        return redirect('matiere')->with('flash_message', 'matiere a bien été ajouté!');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matiere = matiere::find($id);
        return view('matiere.show',compact('matiere'));
    }
    
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);

        return view('matiere.edit', compact('matiere'));
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
            'nom_matiere' => 'required',
            'Coeff_matiere' => 'required',
        ]);
    
        $input = $request->all();
        
    
        $matiere = Matiere::find($id);
        $matiere->update($input);
        
        return redirect('matiere')->with('flash_message', 'matiere a bien été modifié!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matiere::destroy($id);

        return redirect('matiere')->with('flash_message', 'matiere a bien été supprimer!');
    }
}
