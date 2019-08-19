@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset ('assets/css/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<h3 class="page-title">
    <small>&nbsp;</small>
</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject bold">List Rtm</span>
                </div>
                <div class="tools"> </div>
            </div>
            <td>
                <a class="btn green btn-outline sbold" data-toggle="modal" href="#draggable"> View Demo </a>
            </td>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                id="rtm-table">
                <thead>
                    <tr>
                            <th rowspan="2">Rtm Ke</th>
                            <th rowspan="2">Tingkat</th>
                            <th rowspan="2">RKT</th>
                            <th rowspan="2">Tahun</th>
                            <th rowspan="2">Uraian Bidang Permasalahan</th>
                            <th rowspan="2">Analisis / Penyebab</th>
                            <th colspan="3" style="text-align: center;">Rencana Penyelesaian</th>
                            <th rowspan="2" style="text-align: center;">Aksi</th>
                    </tr>
                    <tr>    
                            <th>Uraian</th>
                            <th>Target Waktu</th>
                            <th>PIC</th>
                    </tr>    
{{--                             
                            <th>Tindak Lanjut</th>

                            <th>Rencana</th>
                            <th>Realisasi</th>

                            <th>Status</th>
                            <th>Id Rtm</th>
                            <th>Id Index</th>
                            <th>id</th> --}}
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="portlet-body">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <td> Basic Example </td>
                        <td>
                            <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Draggable Modal Example </td>
                        <td>
                            <a class="btn green btn-outline sbold" data-toggle="modal" href="#draggable"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Large Width Example </td>
                        <td>
                            <a class="btn purple btn-outline sbold" data-toggle="modal" href="#large"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Small Width Example </td>
                        <td>
                            <a class="btn blue btn-outline sbold" data-toggle="modal" href="#small"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Full Width Example </td>
                        <td>
                            <a class="btn dark btn-outline sbold" data-toggle="modal" href="#full"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Responsive </td>
                        <td>
                            <a class="btn red btn-outline sbold" data-toggle="modal" href="#responsive"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> AJAX content loading </td>
                        <td>
                            <a class=" btn yellow btn-outline sbold" href="ui_modals_ajax_sample.html" data-target="#ajax" data-toggle="modal"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Stackable </td>
                        <td>
                            <a class=" btn green btn-outline sbold" data-target="#stack1" data-toggle="modal"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Static Background </td>
                        <td>
                            <a class=" btn purple btn-outline sbold" data-toggle="modal" href="#static"> View Demo </a>
                        </td>
                    </tr>
                    <tr>
                        <td> Long Modals </td>
                        <td>
                            <a class=" btn dark btn-outline sbold" data-toggle="modal" href="#long"> View Demo </a>
                        </td>
                    </tr>
                </table>
                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body"> Modal body goes here </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body"> Modal body goes here </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body"> Modal body goes here </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body"> Modal body goes here </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Responsive & Scrollable</h4>
                            </div>
                            <div class="modal-body">
                                <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Some Input</h4>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Some More Input</h4>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                            <p>
                                                <input type="text" class="col-md-12 form-control"> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
                <div class="modal fade" id="ajax" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                                <span> &nbsp;&nbsp;Loading... </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
                <div id="stack1" class="modal fade" tabindex="-1" data-width="400">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Stack One</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Some Input</h4>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                    </div>
                                </div>
                                <a class="btn green" data-toggle="modal" href="#stack2"> Launch modal </a>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="button" class="btn red">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="stack2" class="modal fade" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Stack Two</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Some Input</h4>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                        <p>
                                            <input type="text" class="col-md-12 form-control"> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                <button type="button" class="btn yellow">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p> Would you like to continue with some arbitrary task? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">A Fairly Long Modal</h4>
                            </div>
                            <div class="modal-body">
                                <img style="height: 800px" alt="" src="http://i.imgur.com/KwPYo.jpg"> </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Start Dragging Here</h4>
                            </div>
                            <div class="modal-body"> Modal body goes here </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="button" class="btn green">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset ('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/ui-modals.min.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset ('assets/js/table-datatables-buttons.min.js')}}" type="text/javascript"></script> --}}
<!-- END: Page Vendor JS-->
@endsection

@section('script')
<script>
    $(function() {
	    $('#rtm-table').DataTable({
		                dom: 'Blfrtip',
          buttons: [
              {
                text: 'Add +',
                className:"btn btn-circle green btn-outline",
                    action: function ( e, dt, node, config ) {
                        window.location = '/rtm/add';
                        // alert( 'Button activated' );
                    }
                },
                {
					extend: "colvis",
                    text: "Show",
                    className: "btn btn-circle green btn-outline"
                	// columns: ':not(.noVis)',
				},  
                {
                    extend:"pdf",
                    className:"btn btn-circle green btn-outline"
                }
          ],
	    //   processing: true,
          serverSide: true,
          order:[[0,"asc"]],    
	      ajax: "{{route ('rtm.json')}}",
	      columns: [
              { data: 'rtm_ke', name: 'tb_rtm.rtm_ke'}, //0
              { data: 'tingkat', name: 'tb_rtm.tingkat'}, //1
              { data: 'rkt', name: 'tb_rtm.rkt'}, //2
              { data: 'tahun', name: 'tb_rtm.tahun'}, //3
              { data: 'index_masalah', name: 'tb_index.index_masalah'}, //4
              { data: 'analisis', name: 'tb_uraian.analisis'}, //5
              { data: 'r_uraian', name: 'tb_uraian.r_uraian'}, //6
              { data: 'r_target', name: 'tb_uraian.r_target'}, //7
              { data: 'r_pic', name: 'tb_uraian.r_pic'}, //8
            //   { data: 'tindak', name: 'tb_uraian.tindak'}, //9
            //   { data: 'p_rencana', name: 'tb_uraian.p_rencana'}, //10
            //   { data: 'p_realisasi', name: 'tb_uraian.p_realisasi'}, //11
            //   { data: 'status', name: 'tb_uraian.status'}, //12
            //   { data: 'rtm_id', name: 'tb_uraian.rtm_id'}, //13
            //   { data: 'index_id', name: 'tb_uraian.index_id'}, //14
              { data: 'id', name: 'tb_rtm.id', width: '15%'} //15
	      ],
	      columnDefs:[
                {targets:[0,1,2,3], visible:false, className: 'noVis'},

                {
                        targets:9,
                        orderable:!1,
                        title:"aksi",
                        render:function(data){
                        return'<a href="" data-toggle=""><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-area-chart\"></i></button></a><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\"></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                        }
                }
            ],
	    });
	  });
</script>
@endsection