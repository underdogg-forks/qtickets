@extends('themes.default1.admin.layout.admin')

@section('Staffs')
active
@stop

@section('staffs-bar')
active
@stop

@section('agents')
class="active"
@stop

@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')
<h1>{{Lang::get('lang.staffs')}}</h1>
@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">

</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')

<!-- open a form -->

{!! Form::model($user, ['url' => 'agents/'.$user->id,'method' => 'PATCH'] )!!}

<!-- <section class="content"> -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{!! Lang::get('lang.edit_an_agent') !!}</h3>  
    </div>
    <div class="box-body">
        @if(Session::has('errors'))
        <?php //dd($errors); ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>Alert!</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <br/>
            @if($errors->first('user_name'))
            <li class="error-message-padding">{!! $errors->first('user_name', ':message') !!}</li>
            @endif
            @if($errors->first('first_name'))
            <li class="error-message-padding">{!! $errors->first('first_name', ':message') !!}</li>
            @endif
            @if($errors->first('last_name'))
            <li class="error-message-padding">{!! $errors->first('last_name', ':message') !!}</li>
            @endif
            @if($errors->first('email'))
            <li class="error-message-padding">{!! $errors->first('email', ':message') !!}</li>
            @endif
            @if($errors->first('ext'))
            <li class="error-message-padding">{!! $errors->first('ext', ':message') !!}</li>
            @endif
            @if($errors->first('phone_number'))
            <li class="error-message-padding">{!! $errors->first('phone_number', ':message') !!}</li>
            @endif
            @if($errors->first('mobile'))
            <li class="error-message-padding">{!! $errors->first('mobile', ':message') !!}</li>
            @endif
            @if($errors->first('active'))
            <li class="error-message-padding">{!! $errors->first('active', ':message') !!}</li>
            @endif
            @if($errors->first('role'))
            <li class="error-message-padding">{!! $errors->first('role', ':message') !!}</li>
            @endif
            @if($errors->first('group'))
            <li class="error-message-padding">{!! $errors->first('group', ':message') !!}</li>
            @endif
            @if($errors->first('primary_department'))
            <li class="error-message-padding">{!! $errors->first('primary_department', ':message') !!}</li>
            @endif
            @if($errors->first('agent_time_zone'))
            <li class="error-message-padding">{!! $errors->first('agent_time_zone', ':message') !!}</li>
            @endif
            @if($errors->first('team'))
            <li class="error-message-padding">{!! $errors->first('team', ':message') !!}</li>
            @endif 
        </div>
        @endif
        @if(Session::has('fails2'))
            <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>Alert!</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <br/>
                <li class="error-message-padding">{!! Session::get('fails2') !!}</li>
            </div>
        @endif
        <div class="row">
            <!-- Email -->
            <div class="col-xs-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                {!! Form::label('email',Lang::get('lang.email_address')) !!} <span class="text-red"> *</span>

                {!! Form::email('email',null,['class' => 'form-control']) !!}

            </div>
            <!-- username -->
            <div class="col-xs-6 form-group {{ $errors->has('user_name') ? 'has-error' : '' }}">

                {!! Form::label('user_name',Lang::get('lang.user_name')) !!} <span class="text-red"> *</span>
                 {!!Form::hidden('role',$user->role)!!}
                {!! Form::text('user_name',null,['class' => 'form-control', 'pattern' => '^[a-zA-Z0-9-_\.]{1,20}$|[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => Lang::get('lang.username_pattern_warning')]) !!}

            </div>
        </div>
        <div class="row">
            <!-- firstname -->
            <div class="col-xs-6 form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">

                {!! Form::label('first_name',Lang::get('lang.first_name')) !!} <span class="text-red"> *</span>

                {!! Form::text('first_name',null,['class' => 'form-control']) !!}

            </div>

            <!-- Lastname -->
            <div class="col-xs-6 form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">

                {!! Form::label('last_name',Lang::get('lang.last_name')) !!}

                {!! Form::text('last_name',null,['class' => 'form-control']) !!}

            </div>
        </div>

        <div class="row">
            <div class="col-xs-1 form-group {{ $errors->has('ext') ? 'has-error' : '' }}">

                <label for="ext">{!! Lang::get('lang.ext') !!}</label>    

                <input type="text" name="ext" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$user->ext}}" >


                <!-- {!! Form::text('ext',null,['class' => 'form-control']) !!} -->

            </div>

             <!-- phone -->
            <div class="col-xs-5 form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">

                {!! Form::label('phone_number',Lang::get('lang.phone')) !!}

                 <input type="text" name="phone_number" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$user->phone_number}}" >

                <!-- {!! Form::text('phone_number',null,['class' => 'form-control']) !!} -->

            </div>
            <!--country code-->
            <div class="col-xs-1 form-group {{ Session::has('country_code') ? 'has-error' : '' }}">

                {!! Form::label('country_code',Lang::get('lang.country-code')) !!}
                <!-- {!! Form::text('country_code',null,['class' => 'form-control', 'placeholder' => $phonecode, 'title' => Lang::get('lang.enter-country-phone-code')]) !!} -->
                  <input type="text" name="country_code" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value = "{{$user->country_code}}" >

            </div>


            <!-- Mobile -->
            <div class="col-xs-5 form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">

                {!! Form::label('mobile',Lang::get('lang.mobile_number')) !!}

                <input type="text" name="mobile" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$user->mobile}}" >


                <!-- {!! Form::input('number', 'mobile',null,['class' => 'form-control']) !!} -->

            </div>

        </div>

        <div>
            <h4>{{Lang::get('lang.account_status_setting')}}</h4>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <!-- acccount type -->
                <div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">

                    {!! Form::label('active',Lang::get('lang.status')) !!}

                    <div class="row">
                        <div class="col-xs-3">
                            {!! Form::radio('active','1',true) !!} {{ Lang::get('lang.active') }}
                        </div>
                        <div class="col-xs-3">
                            {!! Form::radio('active','0',null) !!} {{Lang::get('lang.inactive')}}
                        </div>
                    </div>

                </div>
                <!-- role -->
                <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">

                    {!! Form::label('role',Lang::get('lang.role')) !!}

                    <div class="row">
                        <div class="col-xs-3">
                            {!! Form::radio('role','admin',true) !!} {{Lang::get('lang.admin')}}
                        </div>
                        <div class="col-xs-3">
                            {!! Form::radio('role','agent',null) !!} {{Lang::get('lang.agent')}}
                        </div>
                    </div>
                </div>

            </div>
            <!-- day light saving -->
            {{-- <div class="col-xs-6"> --}}

            {{-- <div> --}}
            {{-- <div class="row"> --}}
            {{-- {!! Form::label('',Lang::get('lang.day_light_saving')) !!} --}}
            {{-- <div class="col-xs-2"> --}}
            {{-- {!! Form::checkbox('daylight_save',1,null,['class' => 'checkbox']) !!} --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}

            <!-- limit access -->
            {{-- <div > --}}
            {{-- <div class="row"> --}}
            {{-- {!! Form::label('limit_access',Lang::get('lang.limit_access')) !!} --}}
            {{-- <div class="col-xs-2"> --}}
            {{-- {!! Form::checkbox('limit_access',1,null,['class' => 'checkbox']) !!} --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}

            <!-- directory listing -->
            {{-- <div> --}}
            {{-- <div class="row"> --}}
            {{-- {!! Form::label('directory_listing',Lang::get('lang.directory_listing')) !!} --}}
            {{-- <div class="col-xs-2"> --}}
            {{-- {!! Form::checkbox('directory_listing',1,null,['class' => 'checkbox']) !!} --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}

            <!-- vocation mode -->
            {{-- <div> --}}
            {{-- <div class="row"> --}}
            {{-- {!! Form::label('vocation_mode',Lang::get('lang.vocation_mode')) !!} --}}
            {{-- <div class="col-xs-2"> --}}
            {{-- {!! Form::checkbox('vocation_mode',1,null,null,['class' => 'checkbox']) !!} --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
        <div class="row">
            <!-- assigned group -->
            <div class="col-xs-4 form-group {{ $errors->has('group') ? 'has-error' : '' }}">
                {!! Form::label('assign_group', Lang::get('lang.assigned_group')) !!} <span class="text-red"> *</span>

                {!!Form::select('group',[''=>Lang::get('lang.select_a_group'), Lang::get('lang.groups')=>$groups->pluck('name','id')->toArray()],$user->assign_group,['class' => 'form-control select']) !!}
            </div>

            <!-- primary department -->
            <div class="col-xs-4 form-group {{ $errors->has('primary_department') ? 'has-error' : '' }}">
                {!! Form::label('primary_dpt', Lang::get('lang.primary_department')) !!} <span class="text-red"> *</span>
 



    {!! Form::select('primary_department[]', [Lang::get('lang.departments')=>$departments->pluck('name','id')->toArray()],$dept,['multiple'=>true,'class'=>"form-control select2" ,'id'=>"primary_department"]) !!}
            </div>

            <!-- agent timezone -->
            <div class="col-xs-4 form-group {{ $errors->has('agent_time_zone') ? 'has-error' : '' }}">
                {!! Form::label('agent_tzone', Lang::get('lang.agent_time_zone')) !!} <span class="text-red"> *</span>

                {!!Form::select('agent_time_zone', [''=>Lang::get('lang.select_a_time_zone'), Lang::get('lang.time_zones')=>$timezones->pluck('name','id')->toArray()],$user->agent_tzone,['class' => 'form-control select']) !!}
            </div>
        </div>

        <!-- team -->
        <div class="{{ $errors->has('team') ? 'has-error' : '' }}">
            {!! Form::label('agent_tzone',Lang::get('lang.assigned_team')) !!} 
        </div>
        @while (list($key, $val) = each($teams))
        <div class="form-group ">
            <input type="checkbox" name="team[]" value="<?php echo $val; ?> " <?php
            if (in_array($val, $assign)) {
                echo ('checked');
            }
            ?> > &nbsp;<?php echo "  " . $key; ?><br/>
        </div>
        @endwhile
        <div class="row">
            <!-- Agent signature -->
            <div class="col-xs-12">

                <h4>{{Lang::get('lang.agent_signature')}}</h4>

            </div>

            <div class="col-xs-12">

                {!! Form::textarea('agent_sign',null,['class' => 'form-control','size' => '30x5']) !!}

            </div>
        </div>
    </div>
    <div class="box-footer">
        {!! Form::submit(Lang::get('lang.update'),['class'=>'form-group btn btn-primary'])!!}
    </div>
</div>
{!!Form::close()!!}
<!-- <script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();
        $('.select2-selection').css('border-radius','0px')
$('.select2-container').children().css('border-radius','0px')
    });
    </script> -->


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('#primary_department').select2({
            placeholder: "{{Lang::get('lang.Choose_departments...')}}",
            minimumInputLength: 2,
            ajax: {
                // URL: '/agent/dept/find',
                   url: '{{route("agent.dept.search")}}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
    <script type="text/javascript">
    $(function() {
        $('.select2-selection--multiple').css('border-radius','0px');
        $('.select2-selection__rendered').css('margin-bottom','-7px');
    });
    </script>
@stop