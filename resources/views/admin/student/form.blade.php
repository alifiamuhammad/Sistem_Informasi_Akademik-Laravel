<div class="form-group(( $errors->has('student_name') ? 'has-error' : ''))">
    {!! Form::label('student_name', 'Student Name', ['class' => 'control-label']) !!}
    {!! Form::text('student_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required','placeholder' => 'Student Name'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_name', '<p class="help-block">:jangan kosong</p>') !!}
</div>

<div class="form-group{{ $errors->has('student_dob') ? 'has-error' : ''}}">
    {!! Form::label('student_dob', 'Student Dob', ['class' => 'control-label']) !!}
    {!! Form::date('student_dob', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control',]) !!}
    {!! $errors->first('student_dob', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode == 'edit')
@php
    $user = \App\User::where('id', $student->user_id)->first();
@endphp
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', $user->email, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@else
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required','placeholder' => 'Email'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@endif
@if($formMode == 'edit')
@php
    $user = \App\User::where('id', $student->user_id)->first();
@endphp
<div class="form-group">
    <label for="password">password</label>
<input type="password"  class="form-control" id="password" minlength="6" placeholder="password" name="password" aria-describedby="password">
</div>
@else
<div class="form-group">
    <label for="password">password</label>
<input type="password" required="required" class="form-control" id="password" minlength="6" placeholder="password" name="password" aria-describedby="password">
</div>
@endif

<div class="form-group{{ $errors->has('student_id') ? 'has-error' : ''}}">
    {!! Form::label('student_id', 'NIS', ['class' => 'control-label']) !!}
    {!! Form::number('student_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_id', '<p class="help-block">:sssss</p>') !!}
</div>
<div class="form-group{{ $errors->has('student_gender') ? 'has-error' : ''}}">
    {!! Form::label('student_gender', 'Student Gender', ['class' => 'control-label']) !!}
    {!! Form::select('student_gender', json_decode('{"Male":"Male","Female":"Female"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('student_gender', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('class_group_id') ? 'has-error' : ''}}">
    {!! Form::label('class_group_id', 'Class Group', ['class' => 'control-label']) !!}
    {!! Form::select('class_group_id', $classgroup, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('class_group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('current_grade') ? 'has-error' : ''}}">
    {!! Form::label('current_grade', 'Current Grade', ['class' => 'control-label']) !!}
    {!! Form::select('current_grade', json_decode('{"X":"X","XI":"XI","XII":"XII"}', true), null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('current_grade', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="left">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
@include('sweetalert::alert')
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    
