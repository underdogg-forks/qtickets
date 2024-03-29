@extends('themes.default1.admin.layout.admin')

@section('Themes')
  class="active"
@stop

@section('theme-bar')
  active
@stop

@section('footer4')
  class="active"
  @stop

  @section('content')
    <!-- open a form -->
  {!! Form::model($footer4,['url'=>'post-create-footer4/'.$footer4->id, 'method'=>'PATCH','files'=>true]) !!}
  <div class="box box-primary">
    <div class="box-header">
      <h4
        class="box-title">{!! Lang::get('lang.footer4') !!}</h4>{!! Form::submit(Lang::get('lang.save'),['class'=>'form-group btn btn-primary pull-right'])!!}
    </div>
    <!-- check whether success or not -->
    @if(Session::has('success'))
      <div class="alert alert-success alert-dismissable">
        <i class="fa  fa-check-circle"></i>
        <b>Success!</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
      </div>
      @endif
        <!-- failure message -->
      @if(Session::has('fails'))
        <div class="alert alert-danger alert-dismissable">
          <i class="fa fa-ban"></i>
          <b>Fail!</b>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{Session::get('fails')}}
        </div>
        @endif
          <!-- Name text form Required -->
        <div class="box-body">
          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {!! Form::label('title',Lang::get('lang.title') ) !!}
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            {!! Form::text('title',null,['class' => 'form-control']) !!}
          </div>
          <div class="form-group {{ $errors->has('footer') ? 'has-error' : '' }}">
            {!! Form::label('footer', Lang::get('lang.footer') ) !!}
            {!! $errors->first('footer', '<span class="help-block">:message</span>') !!}
            {!! Form::textarea('footer',null,['class' => 'form-control','size' => '30x5','id'=>'footer']) !!}
          </div>
        </div>
  </div>
@stop
