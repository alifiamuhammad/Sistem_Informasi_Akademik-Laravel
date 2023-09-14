<div class="form-group{{ $errors->has('class_id') ? 'has-error' : ''}}">
    {!! Form::label('class_id', 'Class', ['class' => 'control-label']) !!}
    {!! Form::select('class_id', $class, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('class_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'control-label']) !!}
    {!! Form::number('year', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
