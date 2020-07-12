<div class="form-group {{ $errors->has('Nom Matiere') ? 'has-error' : ''}}">
    {!! Form::label('nom_matiere', 'Nom Matiere', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nom_matiere', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('nom_matiere', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Coefficient') ? 'has-error' : ''}}">
    {!! Form::label('Coeff_matiere', 'Coefficient', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('Coeff_matiere', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Coeff_matiere', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Submit', ['class' => 'btn btn-primary']) !!}
    </div>
</div>