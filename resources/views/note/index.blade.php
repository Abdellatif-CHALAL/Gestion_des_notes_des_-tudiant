@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Notes</div>
                    <div class="panel-body">
                           <h3 class="btn btn-success btn-sm">Moyenne des étudiants</h3> 
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nom d'étudiant</th><th>Moyenne</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($etudiant as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <?php 
                                                $somme = 0;
                                                $coeff = 0;
                                                foreach ($note as $key => $value) {
                                                    if($value->id_etudiant == $item->id){
                                                        foreach ($matiere as $key1 => $value1) {
                                                            if($value->id_matiere == $value1->id){
                                                                $somme += $value->note*$value1->Coeff_matiere;
                                                                $coeff += $value1->Coeff_matiere;
                                                            }  
                                                        }
                                                    }
                                                }
                                                if($coeff == 0)
                                                    echo 0;
                                                else
                                                    echo $somme/$coeff;
                                            ?>
                                        </td>
                                        <td>
                                            <a href="{{ url('/note/formulaire/'. $item->id) }}" title="Saisie notes"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Saisie Notes</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection