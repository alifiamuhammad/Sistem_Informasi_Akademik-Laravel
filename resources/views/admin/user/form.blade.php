<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email_verified_at') ? 'has-error' : ''}}">
    {!! Form::label('email_verified_at', 'Email Verified At', ['class' => 'control-label']) !!}
    {!! Form::input('datetime-local', 'email_verified_at', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email_verified_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
    {!! Form::textarea('password', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('two_factor_secret') ? 'has-error' : ''}}">
    {!! Form::label('two_factor_secret', 'Two Factor Secret', ['class' => 'control-label']) !!}
    {!! Form::textarea('two_factor_secret', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('two_factor_secret', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('two_factor_recovery_codes') ? 'has-error' : ''}}">
    {!! Form::label('two_factor_recovery_codes', 'Two Factor Recovery Codes', ['class' => 'control-label']) !!}
    {!! Form::textarea('two_factor_recovery_codes', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('two_factor_recovery_codes', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('remember_token') ? 'has-error' : ''}}">
    {!! Form::label('remember_token', 'Remember Token', ['class' => 'control-label']) !!}
    {!! Form::text('remember_token', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('current_team_id') ? 'has-error' : ''}}">
    {!! Form::label('current_team_id', 'Current Team Id', ['class' => 'control-label']) !!}
    {!! Form::number('current_team_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('current_team_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('profile_photo') ? 'has-error' : ''}}">
    {!! Form::label('profile_photo', 'Profile Photo', ['class' => 'control-label']) !!}
    {!! Form::file('profile_photo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('profile_photo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
