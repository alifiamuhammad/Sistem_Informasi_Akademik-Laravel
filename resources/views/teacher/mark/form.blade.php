<div class="form-group{{ $errors->has('id') ? 'has-error' : ''}}">
    {!! Form::label('id', 'Id', ['class' => 'control-label']) !!}
    {!! Form::number('id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('student_id') ? 'has-error' : ''}}">
    {!! Form::label('student_id', 'Student Id', ['class' => 'control-label']) !!}
    {!! Form::number('student_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('enrollment_id') ? 'has-error' : ''}}">
    {!! Form::label('enrollment_id', 'Enrollment Id', ['class' => 'control-label']) !!}
    {!! Form::number('enrollment_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('enrollment_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('assignment_score') ? 'has-error' : ''}}">
    {!! Form::label('assignment_score', 'Assignment Score', ['class' => 'control-label']) !!}
    {!! Form::number('assignment_score', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('assignment_score', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('midterm_score') ? 'has-error' : ''}}">
    {!! Form::label('midterm_score', 'Mid Term Score', ['class' => 'control-label']) !!}
    {!! Form::number('midterm_score', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('midterm_score', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('finalterm_score') ? 'has-error' : ''}}">
    {!! Form::label('finalterm_score', 'Final Term Score', ['class' => 'control-label']) !!}
    {!! Form::number('finalterm_score', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('finalterm_score', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('attendance_score') ? 'has-error' : ''}}">
    {!! Form::label('attendance_score', 'Attendance Score', ['class' => 'control-label']) !!}
    {!! Form::number('attendance_score', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('attendance_score', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
