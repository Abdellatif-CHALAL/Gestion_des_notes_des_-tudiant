@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Ajouter les notes des matieres</div>
                <div class="panel-body">
                    <a href="{{ url('/note') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        <li>{{ $errors->first() }}</li>
                    </ul>
                    @endif

                    @foreach ($matiere as $item)

                    {!! Form::open(['url' => '/note', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('note matiere') ? 'has-error' : ''}} ">
                        <label class='col-md-4 control-label' for="note">Note {{$item->nom_matiere }}</label>
                        <div class="col-md-6">
                            {!! Form::number('note', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-2">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    <input class='hide' type="number" id="id_etudiant" name="id_etudiant" value="{{ $id }}">
                    <input class='hide' type="number" id="id_matiere" name="id_matiere" value="{{ $item->id }}">
                    {!! Form::close() !!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection