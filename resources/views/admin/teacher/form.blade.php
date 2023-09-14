<div class="form-group{{ $errors->has('teacher_name') ? 'has-error' : ''}}">
    {!! Form::label('teacher_name', 'Teacher Name', ['class' => 'control-label']) !!}
    {!! Form::text('teacher_name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('teacher_name', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode == 'edit')
@php
    $user = \App\User::where('id', $teacher->user_id)->first();
@endphp
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', $user->email, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@else
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@endif
<div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
    {!! Form::text('password', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('teacher_dob') ? 'has-error' : ''}}">
    {!! Form::label('teacher_dob', 'Teacher Dob', ['class' => 'control-label']) !!}
    {!! Form::date('teacher_dob', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('teacher_dob', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('role') ? 'has-error' : ''}}">
    {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
    {!! Form::select('role', json_decode('{"admin":"Admin","teacher":"teacher"}', true), null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
