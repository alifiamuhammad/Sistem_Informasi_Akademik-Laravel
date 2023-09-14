<div class="form-group{{ $errors->has('teacher_id') ? 'has-error' : ''}}">
    {!! Form::label('teacher_id', 'Teacher', ['class' => 'control-label']) !!}
    {!! Form::select('teacher_id', $teacher, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('teacher_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('class_group_id') ? 'has-error' : ''}}">
    {!! Form::label('class_group_id', 'Class Group', ['class' => 'control-label']) !!}
    {!! Form::select('class_group_id', $classgroup, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('class_group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('subject_id') ? 'has-error' : ''}}">
    {!! Form::label('subject_id', 'Subject', ['class' => 'control-label']) !!}
    {!! Form::select('subject_id', $subject, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('semester') ? 'has-error' : ''}}">
    {!! Form::label('semester', 'Semester', ['class' => 'control-label']) !!}
    {!! Form::select('semester', json_decode('{"Semester 1":"Semester 1","Semester 2":"Semester 2"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year', ['class' => 'control-label']) !!}
    {!! Form::text('year', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
