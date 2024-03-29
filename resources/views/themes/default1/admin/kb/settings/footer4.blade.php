@extends('themes.default1.admin.layout.kb')

@section('widget')
  active
@stop
@section('footer4')
  class="active"
@stop
<script type="text/javascript" src="{{asset('dist/js/SetnicEdit.js')}}"></script>
<script type="text/javascript">
  bkLib.onDomLoaded(function () {
    nicEditors.allTextAreas()
  });
</script>

@section('content')


  {!! Form::model($footer4,['url' => 'post-create-footer4/'.$footer4->id, 'method' => 'PATCH','files'=>true]) !!}

  <div class="box box-primary">
    <div class="box-header">
      <h3
        class="box-title">{{Lang::get('lang.footer4')}}</h3> {!! Form::submit(Lang::get('lang.save'),['class'=>'form-group btn btn-primary pull-right'])!!}
    </div>

    <div class="box-body">

      <div class="row">


        <div class="col-md-10">

          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">

            {!! Form::label('title',Lang::get('lang.title')) !!}
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
            {!! Form::text('title',null,['class' => 'form-control']) !!}

          </div>

          <div class="form-group {{ $errors->has('footer') ? 'has-error' : '' }}">
            {!! Form::label('footer',Lang::get('lang.footer')) !!}
            {!! $errors->first('footer', '<span class="help-block">:message</span>') !!}
            {!! Form::textarea('footer',null,['class' => 'form-control','size' => '128x10','id'=>'footer','placeholder'=>'Enter the description']) !!}
          </div>

        </div>

      </div>

    </div>

    @stop
    @section('FooterInclude')

    @stop

      <!-- /content -->
