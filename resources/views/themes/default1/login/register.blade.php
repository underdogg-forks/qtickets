@extends('themes.default1.layouts.register')
@section('body')

  <!-- openn a form -->

<body class="login-page">
<div class="login-box">

  <div class="login-box-body">
    <p class="login-box-msg">Registration</p>
    <!-- form open -->
    {!!  Form::open(['action'=>'Auth\AuthController@postRegister', 'method'=>'post']) !!}

      <!-- fullname -->
    <div class="form-group has-feedback {{ $errors->has('full_name') ? 'has-error' : '' }}">

      {!! Form::text('full_name',null,['placeholder'=>'Full Name','class' => 'form-control']) !!}
      {!! $errors->first('full_name', '<span class="help-block">:message</span>') !!}
      <span class="glyphicon glyphicon-user form-control-feedback"></span>

    </div>

    <!-- Email -->
    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">

      {!! Form::text('email',null,['placeholder'=>'Email','class' => 'form-control']) !!}
      {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

    </div>


    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
      {!! Form::password('password',['placeholder'=>'Password','class' => 'form-control']) !!}
      {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
      {!! Form::password('password_confirmation',['placeholder'=>'Retype Password','class' => 'form-control']) !!}
      {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>


    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms</a>
          </label>
        </div>
      </div><!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
      </div><!-- /.col -->
    </div>


    <a href="{{url('auth/login')}}" class="text-center">I already have a membership</a>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
{!! Form::close()!!}


@stop


