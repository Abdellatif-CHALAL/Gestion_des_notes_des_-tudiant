@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Matiere</div>
                    <div class="panel-body">
                        <a href="{{ url('/matiere/create') }}" class="btn btn-success btn-sm" title="Ajouter une matiere">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter une matiere
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nom Matiere</th><th>Coefficient</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($matiere as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nom_matiere }}</td><td>{{ $item->Coeff_matiere }}</td>
                                        <td>
                                            <a href="{{ url('/matiere/' . $item->id) }}" title="View user"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button></a>
                                            <a href="{{ url('/matiere/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/matiere', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'supprimer Matiere',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $matiere->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection