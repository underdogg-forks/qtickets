@extends('themes.default1.admin.layout.admin')

@section('Manage')
  active
@stop

@section('manage-bar')
  active
@stop

@section('workflow')
  class="active"
  @stop

  @section('HeadInclude')
  @stop

    <!-- header -->
@section('PageHeader')
  <h1>{!! Lang::get('lang.create_workflow') !!}</h1>
  @stop
    <!-- /header -->
  <!-- breadcrumbs -->
@section('breadcrumbs')
  <ol class="breadcrumb">
    <li><a href="{!! URL::route('setting') !!}"><i class="fa fa-dashboard"></i> {!! Lang::get('lang.home') !!}</a></li>
    <li><a href="{!! URL::route('workflow') !!}">{!! Lang::get('lang.ticket_workflow') !!}</a></li>
    <li class="active"><a href="{!! URL::route('workflow.create') !!}">{!! Lang::get('lang.create_workflow') !!}</a>
    </li>
  </ol>
  @stop
    <!-- /breadcrumbs -->
  <!-- content -->
@section('content')
  <form class="form-horizontal" action="{!! URL::route('workflow.store') !!}" method="POST" id="form">
    {{ csrf_field() }}
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <!-- check whether success or not -->
        @if(Session::has('success'))
          <div class="alert alert-success alert-dismissable">
            <i class="fa  fa-check-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! Session::get('success') !!}
          </div>
          @endif
            <!-- failure message -->
          @if(Session::has('fails'))
            <div class="alert alert-danger alert-dismissable">
              <i class="fa fa-ban"></i>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <b>{!! Lang::get('lang.alert') !!} !</b><br>
              <li class="error-message-padding">{!! Session::get('fails') !!}</li>
            </div>
          @endif
          @if(Session::has('errors'))
            <div class="alert alert-danger alert-dismissable">
              <i class="fa fa-ban"></i>
              <b>Alert!</b>
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <br/>
              @if($errors->first('name'))
                <li class="error-message-padding">{!! $errors->first('name', ':message') !!}</li>
              @endif
              @if($errors->first('execution_order'))
                <li class="error-message-padding">{!! $errors->first('execution_order', ':message') !!}</li>
              @endif
              @if($errors->first('target_channel'))
                <li class="error-message-padding">{!! $errors->first('target_channel', ':message') !!}</li>
              @endif
              @if($errors->first('rule'))
                <li class="error-message-padding">{!! $errors->first('rule', ':message') !!}</li>
              @endif
              @if($errors->first('action'))
                <li class="error-message-padding">{!! $errors->first('action', ':message') !!}</li>
              @endif
            </div>
          @endif
          <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            <label for="inputName" class="col-sm-2 control-label">{!! Lang::get('lang.name') !!} <span class="text-red"> *</span></label>
            <div class="col-sm-6">
              {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => Lang::get('lang.name'), 'id' => 'name']) !!}
            </div>
          </div>
          <div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
            <label class="col-sm-2 control-label"> {!! Lang::get('lang.status') !!}</label>
            <div class="col-sm-6">
              <input type="radio" id="inputEmail2" name="status" value="1">&nbsp;&nbsp;<label class="control-label"
                                                                                              for="inputEmail2">{!! Lang::get('lang.active') !!}</label>&nbsp;&nbsp;
              <input type="radio" id="inputEmail1" name="status" value="0" checked>&nbsp;&nbsp;<label
                class="control-label" for="inputEmail1">{!! Lang::get('lang.inactive') !!}</label>&nbsp;&nbsp;
            </div>
          </div>
          <div class="form-group {!! $errors->has('execution_order') ? 'has-error' : '' !!}">
            <div>
              <label for="Exceution" class="col-sm-2 control-label">{!! Lang::get('lang.execution_order') !!} <span
                  class="text-red"> *</span></label>
              <div class="col-sm-6">
                {!! Form::input('number', 'execution_order',null,['class' => 'form-control', 'placeholder' => Lang::get('lang.execution_order'), 'id' => 'execution_order', 'min' => '0']) !!}
              </div>
            </div>
          </div>
          <div class="form-group {!! $errors->has('target_channel') ? 'has-error' : '' !!}">
            <label class="col-sm-2 control-label">{!! Lang::get('lang.target_channel') !!} <span
                class="text-red"> *</span></label>
            <div class="col-sm-6">
              {!! Form::select('target_channel', [''=> '-- '.Lang::get('lang.select_a_channel').' --', 'A-0' => 'Any', 'A-1' => 'Web Forms', 'A-4' => 'API Calls', 'A-2' => 'Emails'], null,['class' => 'form-control', 'id' => 'execution_order']) !!}
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#open" data-toggle="tab">{!! Lang::get('lang.workflow_rules') !!} <span
                  class="text-red"> *</span></a>
            </li>
            <li><a href="#close" data-toggle="tab">{!! Lang::get('lang.workflow_action') !!} <span
                  class="text-red"> *</span></a>
            </li>
            <li><a href="#delect" data-toggle="tab">{!! Lang::get('lang.internal_notes') !!} </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="open">
              <div>
                <div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <td>{!! Lang::get('lang.rules') !!} <span class="text-red"> *</span></td>
                        <td>{!! Lang::get('lang.condition') !!} <span class="text-red"> *</span></td>
                        <td>{!! Lang::get('lang.statement') !!} <span class="text-red"> *</span></td>
                        <td>{!! Lang::get('lang.action') !!}</td>
                      </tr>
                      </thead>
                      <tbody class="button1">
                      <tr id="firstdata">
                        <td>
                          <select class="form-control" name="rule[0][a]" required>
                            <option value="">-- {!! Lang::get('lang.select_one') !!} --</option>
                            <option value="email">{!! Lang::get('lang.email') !!}</option>
                            <option value="email_name">{!! Lang::get('lang.email_name') !!}</option>
                            <option value="subject">{!! Lang::get('lang.subject') !!}</option>
                            <option value="message">{!! Lang::get('lang.message') !!}
                              /{!! Lang::get('lang.body') !!}</option>
                          </select>
                        </td>
                        <td class="col-md-3">
                          <select class="form-control" name="rule[0][b]" required>
                            <option value="">-- {!! Lang::get('lang.select_one') !!} --</option>
                            <option value="equal">{!! Lang::get('lang.equal_to') !!}</option>
                            <option value="not_equal">{!! Lang::get('lang.not_equal_to') !!}</option>
                            <option value="contains">{!! Lang::get('lang.contains') !!}</option>
                            <option value="dn_contain">{!! Lang::get('lang.does_not_contain') !!}</option>
                            <option value="starts">{!! Lang::get('lang.starts_with') !!}</option>
                            <option value="ends">{!! Lang::get('lang.ends_with') !!}</option>
                            <!--                                                        <option value="match">Match Regular Expressions</option>
                                                                                    <option value="not_match">Does not match Regular Expression</option>-->
                          </select>
                        </td>
                        <td class="col-md-3">
                          <input class="form-control" type="text" name="rule[0][c]" required>
                        </td>
                        <td style="text-align: center">
                          <div class="tools">
                                                        <span class="btnRemove1" data-toggle="modal" data-target="#">
                                                            <a data-toggle="tooltip" data-placement="top"
                                                               title="{!! Lang::get('lang.delete') !!}"
                                                               onclick="document.getElementById('firstdata').innerHTML = ''">
                                                              <i class="fa fa-trash-o"></i>
                                                            </a>
                                                        </span>
                          </div>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <div class="row" style="padding: 10px 15px 0px">
                      <div class="pull-right">
                        <a class="btn btn-primary btnAdd1">{!! Lang::get('lang.add') !!}</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="close">
              <div>
                <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <td>{!! Lang::get('lang.condition') !!} <span class="text-red"> *</span></td>
                      <td>{!! Lang::get('lang.rules') !!} <span class="text-red"> *</span></td>
                      <td>{!! Lang::get('lang.action') !!}</td>
                    </tr>
                    </thead>
                    <tbody class="buttons">
                    <tr id="firstdata1">
                      <td>
                        <select class="form-control" onChange="selectdata(0)" id="selected0" name="action[0][a]"
                                required>
                          <option value="">-- {!! Lang::get('lang.select_an_action') !!} --</option>
                          <optgroup label="Ticket">
                            <option value="reject">{!! Lang::get('lang.reject_ticket') !!}</option>
                            <option value="department">{!! Lang::get('lang.set_department') !!}</option>
                            <option value="priority">{!! Lang::get('lang.set_priority') !!}</option>
                            <option value="sla">{!! Lang::get('lang.set_sla_plan') !!}</option>
                            <option value="team">{!! Lang::get('lang.assign_team') !!}</option>
                            <option value="agent">{!! Lang::get('lang.assign_agent') !!}</option>
                            <option value="helptopic">{!! Lang::get('lang.set_help_topic') !!}</option>
                            <option value="status">{!! Lang::get('lang.set_ticket_status') !!}</option>
                          </optgroup>
                        </select>
                      </td>
                      <td id="fill0">
                      </td>
                      <td style="text-align: center">
                        <div class="tools">
                                                    <span class="btnRemove" data-toggle="modal" data-target="#">
                                                        <a data-toggle="tooltip" data-placement="top"
                                                           title="{!! Lang::get('lang.delete') !!}"
                                                           onclick="document.getElementById('firstdata1').innerHTML = ''">
                                                          <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </span>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <div class="row" style="padding: 10px 15px 0px">
                    <div class="pull-right">
                      <a class="btn btn-primary btnAdd">{!! Lang::get('lang.add') !!}</a>
                    </div>
                  </div>
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="delect">
              <div>
                <textarea name="internal_note" class="textarea" placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
          <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="{!! Lang::get('lang.submit') !!}">
          </div>
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </form>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });

    function getSelectVal(val) {

      $.ajax({
        type: "POST",
        url: "",
        data: 'select_box=' + val,
        success: function (data) {
          $("#select-list").html(data);
        }
      });
    }

    $(document).ready(function () {
      var x = 0;
      var n = 0;
      $('.btnAdd').click(function () {
        n++;
        $('.buttons').append('<tr id="firstdata1">' +
          '<td>' +
          '<select class="form-control" onChange="selectdata(' + n + ')" name="action[' + n + '][a]" id="selected' + n + '" required>' +
          '<option value="">-- {!! Lang::get("lang.select_an_action") !!} --</option>' +
          '<optgroup label="Ticket">' +
          '<option value="reject">{!! Lang::get("lang.reject_ticket") !!} </option>' +
          '<option value="department">{!! Lang::get("lang.set_department") !!} </option>' +
          '<option value="priority">{!! Lang::get("lang.set_priority") !!} </option>' +
          '<option value="sla">{!! Lang::get("lang.set_sla_plan") !!}  </option>' +
          '<option value="team">{!! Lang::get("lang.assign_team") !!} </option>' +
          '<option value="agent">{!! Lang::get("lang.assign_agent") !!} </option>' +
          '<option value="helptopic">{!! Lang::get("lang.set_help_topic") !!}  </option>' +
          '<option value="status">{!! Lang::get("lang.set_ticket_status") !!}  </option>' +
          '</select>' +
          '</td>' +
          '<td id="fill' + n + '">' +
          '</td>' +
          '<td style="text-align: center">' +
          '<div class="tools">' +
          '<span class="btnRemove" data-toggle="modal" data-target="#">' +
          '<a data-toggle="tooltip" data-placement="top" title="Delete">' +
          '<i class="fa fa-trash-o"></i>' +
          '</a>' +
          '</span>' +
          '</div>' +
          '</td>' +
          '</tr>'); // end append
        $('div .btnRemove').last().click(function (e) {
          e.preventDefault();
          $(this).closest('tr').remove();
          x--;
        });
      });
    });

    $(document).ready(function () {
      var x = 0;
      var n = 0;
      $('.btnAdd1').click(function () {
        n++;
        $('.button1').append('<tr>' +
          '<td>' +
          '<select class="form-control" name="rule[' + n + '][a]" required>' +
          '<option>-- {!! Lang::get("lang.select_one") !!} --</option>' +
          '<option value="email">{!! Lang::get("lang.email") !!}</option>' +
          '<option value="email_name">{!! Lang::get("lang.email_name") !!}</option>' +
          '<option value="subject">{!! Lang::get("lang.subject") !!}</option>' +
          '<option value="message">{!! Lang::get("lang.message") !!}/{!! Lang::get("lang.body") !!}</option>' +
          '</select>' +
          '</td>' +
          '<td class="col-md-3">' +
          '<select class="form-control" name="rule[' + n + '][b]" required>' +
          '<option value="">-- {!! Lang::get("lang.select_one") !!} --</option>' +
          '<option value="equal">{!! Lang::get("lang.equal_to") !!}</option>' +
          '<option value="not_equal">{!! Lang::get("lang.not_equal_to") !!}</option>' +
          '<option value="contains">{!! Lang::get("lang.contains") !!}</option>' +
          '<option value="dn_contain">{!! Lang::get("lang.does_not_contain") !!}</option>' +
          '<option value="starts">{!! Lang::get("lang.starts_with") !!}</option>' +
          '<option value="ends">{!! Lang::get("lang.ends_with") !!}</option>' +
          '</select>' +
          '</td>' +
          '<td class="col-md-3"> <input class="form-control" type="text" name="rule[' + n + '][c]" required> </td>' +
          '<td style="text-align: center">' +
          '<div class="tools"> <span class="btnRemove1" data-toggle="modal" data-target="#"><a data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a></span> </div>' +
          '</td>' +
          '</tr>'); // end append
        $('div .btnRemove1').last().click(function (e) {
          e.preventDefault();
          $(this).closest('tr').remove();
          x--;
        });
      });
    });

    function selectdata(id) {
      var selected_data = document.getElementById('selected' + id).value;
      $.ajax({
        url: "{!! url('workflow/action-rule') !!}" + "/" + id,
        type: "get",
        data: {option: selected_data},
        headers: {
          'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {
          //adds the echoed response to our container
          $("#fill" + id).html(data);
        }
      });
    }
  </script>

@stop
