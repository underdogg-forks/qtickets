@extends('themes.default1.admin.layout.admin')

@section('Emails')
active
@stop

@section('emails-bar')
active
@stop

@section('emails')
class="active"
@stop

@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')
<h1>{{Lang::get('lang.add_an_email')}}</h1> 
@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">
</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')<!-- open a form -->
<form id="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{!! Lang::get('lang.email_information_and_settings') !!}</h3>
        </div>
        <div class="box-body">
            <div id="head"></div>
            <div id="alert" style="display:none;">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div id="alert-message"></div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <!-- email address -->
                <div class="col-xs-4 form-group {!! $errors->has('email_address') ? 'has-error' : '' !!}" id = "email_address_error">
                    {!! Form::label('email_address',Lang::get('lang.email_address')) !!} <span class="text-red"> *</span>
                    {!! $errors->first('email_address', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('email_address',null,['class' => 'form-control', 'id' => 'email_address']) !!}
                </div>
                <!-- Email name -->
                <div class="col-xs-4 form-group {!! $errors->has('email_name') ? 'has-error' : ''!!}" id="email_name_error">
                    {!! Form::label('email_name',Lang::get('lang.from_name')) !!} <span class="text-red"> *</span>
                    {!! $errors->first('email_name', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('email_name',null,['class' => 'form-control', 'id' => 'email_name']) !!}
                </div>
                <!-- password -->
                <div class="col-xs-4 form-group {!! $errors->has('password') ? 'has-error' : ''!!}" id="password_error">
                    {!! Form::label('password',Lang::get('lang.password')) !!} <span class="text-red"> *</span>
                    {!! $errors->first('password', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::password('password',['class' => 'form-control', 'id' => 'password']) !!}
                </div>
            </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">{!! Lang::get('lang.new_ticket_settings') !!}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <!-- department -->
                <div class="col-xs-4 form-group {!! $errors->has('department') ? 'has-error' : ''!!}" id="department_error">
                    {!! Form::label('department',Lang::get('lang.department')) !!}
                    {!! $errors->first('department', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('department', [''=>'--System Default--','departments'=>$departments->pluck('name','id')->toArray()],null,['class' => 'form-control select', 'id' => 'department' ]) !!}
                </div>
                <!-- Priority -->
                <div class="col-xs-4 form-group {!! $errors->has('priority') ? 'has-error' : ''!!}" id="priority_error">
                    {!! Form::label('priority',Lang::get('lang.priority')) !!}
                    {!! $errors->first('priority', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('priority', [''=>'--System Default--','Priorities'=>$priority->pluck('priority_desc','priority_id')->toArray()],null,['class' => 'form-control select', 'id' => 'priority']) !!}
                </div>
                <!-- Help topic -->
                <div class="col-xs-4 form-group {!! $errors->has('help_topic') ? 'has-error' : ''!!}" id="help_topic_error">
                    {!! Form::label('help_topic',Lang::get('lang.help_topic')) !!}
                    {!! $errors->first('help_topic', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('help_topic', [''=>'--System Default--','Help Topics'=>$helps->pluck('topic','id')->toArray()],null,['class' => 'form-control select', 'id' => 'help_topic']) !!}
                </div>
                <!-- status -->
                <div class="col-xs-2 form-group">
                    {!! Form::label('auto_response',Lang::get('lang.auto_response')) !!}
                </div>
                <div class="col-xs-3 form-group">

                    <input type="checkbox" name="auto_response" id="auto_response"> {{Lang::get('lang.disable_for_this_email_address')}}
                </div>
            </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">{!! Lang::get('lang.incoming_email_information') !!}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="form-group">
                    <!-- status -->
                    <div class="col-xs-1 form-group">
                        {!! Form::label('fetching_status',Lang::get('lang.status')) !!}
                    </div>
                    <div class="col-xs-2 form-group">
                        <!--{!! Form::radio('fetching_status','1',true) !!} {{Lang::get('lang.enable')}}-->
                        <input type="checkbox" name="fetching_status" id="fetching_status"> {{Lang::get('lang.enable')}}
                    </div>
                    <div class="col-xs-2 form-group">
                        <!--<input type="radio" name="fetching_status" id="fetching_status" value="0"> {{Lang::get('lang.disabled')}}-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 form-group {!! $errors->has('fetching_protocol') ? 'has-error' : ''!!}" id="fetching_protocol_error">
                    {!! Form::label('fetching_protocol',Lang::get('lang.protocol')) !!}
                    {!! $errors->first('fetching_protocol', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('fetching_protocol',['imap' => 'IMAP', 'pop' => 'POP3'],null,['class' => 'form-control select', 'id' => 'fetching_protocol']) !!}
                </div>
                <div class="col-xs-2 form-group  {!! $errors->has('fetching_host') ? 'has-error' : ''!!}" id="fetching_host_error">
                    {!! Form::label('fetching_host',Lang::get('lang.host_name')) !!}
                    {!! $errors->first('fetching_host', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('fetching_host',null,['class' => 'form-control', 'id' => 'fetching_host']) !!}
                </div>
                <div class="col-xs-2 form-group {!! $errors->has('fetching_port') ? 'has-error' : ''!!}" id="fetching_port_error">
                    {!! Form::label('fetching_port',Lang::get('lang.port_number')) !!}
                    {!! $errors->first('fetching_port', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('fetching_port',null,['class' => 'form-control', 'id' => 'fetching_port']) !!}
                </div>
                <div class="col-xs-2 form-group {!! $errors->has('fetching_encryption') ? 'has-error' : ''!!}" id="fetching_encryption_error">
                    {!! Form::label('fetching_encryption',Lang::get('lang.encryption')) !!}
                    {!! $errors->first('fetching_encryption', '<spam class="help-block">:message</spam>') !!}
                    {!!Form::select('fetching_encryption',[''=>'-----Select-----','ssl' => 'SSL', 'tls' => 'TLS', 'starttls' => 'STARTTLS'],null,['class' => 'form-control select', 'id' => 'fetching_encryption']) !!}
                </div>
                <div class="col-xs-2 form-group {!! $errors->has('imap_authentication') ? 'has-error' : ''!!}" id="imap_authentication_error">
                    {!! Form::label('fetching_authentication',Lang::get('lang.authentication')) !!}
                    {!!Form::select('imap_authentication',['normal' => 'Normal Password'],null,['class' => 'form-control select', 'id' => 'imap_authentication']) !!}
                </div>
                <div class="col-xs-2 form-group">
                    <br>
                    <input type="checkbox" name="imap_validate" id="imap_validate">&nbsp; {!! Lang::get('lang.validate_certificates_from_tls_or_ssl_server') !!}
                </div>
            </div>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">{!! Lang::get('lang.outgoing_email_information') !!}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <!-- status -->
                <div class="form-group">
                    <div class="col-xs-1 form-group"> 
                        {!! Form::label('sending_status',Lang::get('lang.status')) !!} 
                    </div> 
                    <div class="col-xs-2 form-group"> 
                        <input type="checkbox" name="sending_status" id="sending_status"> {!! Lang::get('lang.enable') !!} 
                    </div> 
                    <div class="col-xs-2 form-group"> 
                        <!--<input type="radio" name="sending_status" id="sending_status" value=""> {!! Lang::get('lang.disabled') !!}--> 
                    </div> 
                </div>
            </div>
            <div class="row">
                <!-- Encryption -->
                <div class="col-xs-2 form-group {!! $errors->has('sending_protocol') ? 'has-error' : ''!!}" id="sending_protocol_error">
                    {!! Form::label('sending_protocol',Lang::get('lang.transfer_protocol')) !!}
                    {!! $errors->first('sending_protocol', '<spam class="help-block">:message</spam>') !!} 
                    {!!Form::select('sending_protocol',[''=>'Select','Drives'=>$services],null,['class' => 'form-control select','id'=>'service']) !!}
                </div> 
                <!-- sending hoost -->
                <div class="col-xs-2 form-group {!! $errors->has('sending_host') ? 'has-error' : ''!!}" id="sending_host_error">
                    {!! Form::label('sending_host',Lang::get('lang.host_name')) !!}
                    {!! $errors->first('sending_host', '<spam class="help-block">:message</spam>') !!} 
                    {!! Form::text('sending_host',null,['class' => 'form-control']) !!}
                </div> 
                <!-- sending port -->
                <div class="col-xs-2 form-group {!! $errors->has('sending_port') ? 'has-error' : ''!!}" id="sending_port_error">
                    {!! Form::label('sending_port',Lang::get('lang.port_number')) !!}
                    {!! $errors->first('sending_port', '<spam class="help-block">:message</spam>') !!}
                    {!! Form::text('sending_port',null,['class' => 'form-control']) !!}
                </div>
                <!-- Encryption -->
                <div class="col-xs-2 form-group {!! $errors->has('sending_encryption') ? 'has-error' : ''!!}" id="sending_encryption_error">
                    {!! Form::label('sending_encryption',Lang::get('lang.encryption')) !!}
                    {!! $errors->first('sending_encryption', '<spam class="help-block">:message</spam>') !!} 
                    {!!Form::select('sending_encryption',[''=>'-----Select-----','ssl' => 'SSL', 'tls' => 'TLS', 'starttls' => 'STARTTLS'],null,['class' => 'form-control select']) !!}
                </div> 
                <div class="col-xs-2 form-group {!! $errors->has('smtp_authentication') ? 'has-error' : ''!!}" id="smtp_authentication_error">
                    {!! Form::label('sending_authentication',Lang::get('lang.authentication')) !!}
                    {!!Form::select('smtp_authentication',['normal' => 'Normal Password'],null,['class' => 'form-control select', 'id' => 'smtp_authentication']) !!}
                </div>
                <div class="col-xs-2 form-group">
                    <br>
                    <input type="checkbox" name="smtp_validate" id="smtp_validate">&nbsp; {!! Lang::get('lang.validate_certificates_from_tls_or_ssl_server') !!}
                </div>
            </div>
            <div id="response"></div>
            <!-- Internal notes -->
            <div class="form-group">
                {!! Form::label('internal_notes',Lang::get('lang.internal_notes')) !!}
                {!! Form::textarea('internal_notes',null,['class' => 'form-control','size' => '30x10']) !!}
            </div>
            <input type="checkbox" name="sys_email" >&nbsp;&nbsp;{{Lang::get('lang.make-system-default-mail')}}</input>
        </div>
        <div class="box-footer">
            {!! Form::button('<i id="spin" class="fa fa-spinner" style="display:none;"></i> <b>' . Lang::get("lang.create").'</b>' ,['class'=>'btn btn-primary', 'type' => 'submit'])!!}
        </div>
    </div>
</form>

<div class="modal fade" id="loadingpopup" style="padding:200px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div id="head">
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" style="display:none;"><span aria-hidden="true">×</span></button>
                    <div class="col-md-5"></div><div class="col-md-2"><img src="{{asset("lb-faveo/media/images/gifloader.gif")}}" ></div><div class="col-md-5"></div>
                    <br/>
                    <br/>
                    <br/>
                    <center><h3 style="color:#80DE02;">Testing incoming & outgoing mail server</h3></center>
                    <br/>
                    <center><h4>Please wait while testing is in progress ...</h4></center>
                    <center><h4>(Please do not use "Refresh" or "Back" button)</h4></center>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>

<button style="display:none" data-toggle="modal" data-target="#loadingpopup" id="click"></button>

<script type="text/javascript">
    //submit form
    $('#form').on('submit', function () {
        var form_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{!! route('validating.email.settings') !!}",
            dataType: "json",
            data: form_data,
            headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
            beforeSend: function () {
                $('#alert').empty();
                $("#click").trigger("click");
            },
            success: function (json) {
                console.log(json);
                $("#close").trigger("click");
                var res = "";
                $.each(json.result, function (idx, topic) {
                    if (idx === "success") {
                        res = "<div class='alert alert-success'>" + topic + "</div>";
                    }
                    if (idx === "fails") {
                        res = "<div class='alert alert-danger'>" + topic + "</div>";
                    }
                });

                $("#head").html(res);
                $('html, body').animate({scrollTop: $("#form").offset().top}, 500);
            },
            error: function (json) {
                console.log(json);
                $("#close").trigger("click");
                var res = "";
                $.each(json.responseJSON, function (idx, topic) {
                    res += "<li>" + topic + "</li>";
                });
                $("#head").html("<div class='alert alert-danger'><strong>Whoops!</strong> There were some problems with your input.<br><br><ul>" + res + "</ul></div>");
                $('html, body').animate({scrollTop: $("#form").offset().top}, 500);
            }
        });
        return false;
    });

    $(document).ready(function () {
        var serviceid = $("#service").val();
        send(serviceid);
        $("#service").on('change', function () {
            serviceid = $("#service").val();
            send(serviceid);
        });
        function send(serviceid) {
            $.ajax({
                url: "{{url('mail/config/service')}}",
                dataType: "html",
                data: {'service': serviceid},
                success: function (response) {
                    $("#response").html(response);
                },
                error: function (response) {
                    $("#response").html(response);
                }
            });
        }
    });
</script>
@stop