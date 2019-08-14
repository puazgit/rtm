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
              { data: 'r_pic', name: 'tb_uraian.r_pic'} //8
            //   { data: 'tindak', name: 'tb_uraian.tindak'}, //9
            //   { data: 'p_rencana', name: 'tb_uraian.p_rencana'}, //10
            //   { data: 'p_realisasi', name: 'tb_uraian.p_realisasi'}, //11
            //   { data: 'status', name: 'tb_uraian.status'}, //12
            //   { data: 'rtm_id', name: 'tb_uraian.rtm_id'}, //13
            //   { data: 'index_id', name: 'tb_uraian.index_id'}, //14
            //   { data: 'id', name: 'tb_rtm.id', width: '15%'} //15
	      ],
	      columnDefs:[
                {targets:[0,1,2,3], visible:false, className: 'noVis'},

                // {
                //         targets:15,
                //         orderable:!1,
                //         title:"aksi",
                //         render:function(data){
                //         return'<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\"></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                //         }
                // }
            ],
	    });
	  });
</script>
@endsection