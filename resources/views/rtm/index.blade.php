@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset ('assets/css/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<h3 class="page-title">

</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> RTM</span>
                </div>
                <div class="tools">
                    {{-- <a href="{{route ('rtm.create')}}"><button type="submit" name="btn_add" class="btn btn-success">
                            <i class="fa fa-magic"></i> Add</button></a> --}}
                </div>
            </div>
            <div class="portlet-body">
                {{-- <div class="table-responsive m-t-10"> --}}
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-rtm">
                    <thead>
                        <tr>
                            <th>RTM Ke</th>
                            <th>Tingkat</th>
                            <th>RKT</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                </div>
            {{-- </div> --}}
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
<script src="{{asset ('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/ui-modals.min.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset ('assets/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amstockcharts/plugins/dataloader/dataloader.min.js')}}" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
@endsection

@section('script')
<script>
    $(function() {
	    $('#table-rtm').DataTable({
		  dom: 'Blfrtip',
          buttons: [
              {
                text: 'Add +',
                className:"btn btn-square green btn-success",
                    action: function ( e, dt, node, config ) {
                        window.location = '{{route ('rtm.create')}}';
                        // alert( 'Button activated' );
                    }
                },
                {
					extend: "colvis",
                    text: "Show",
                    className: "btn btn-square green btn-success"
                	// columns: ':not(.noVis)',
				},  
                {
                    extend:"pdf",
                    className:"btn btn-square green btn-success"
                }
          ],
          serverSide: true,
          order:[[4,"desc"]],    
	      ajax: "{{route ('rtm.jsonrtm')}}",
	      columns: [
              { data: 'rtm_ke'}, //0
              { data: 'tingkat'}, //1
              { data: 'rkt'}, //2
              { data: 'tahun'}, //3
              { data: 'id'},//4

	      ],
	      columnDefs:[
                // {targets:[0,1,2,3,4], visible:false, className: 'noVis'},

                {
                        targets:4,
                        // orderable:!1,
                        title:"aksi",
                        render:function(data, type, row){
                        return '<a href=\"{{route ('rtm.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('editor|admin')<a href=\"{{route ('rtm.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                        "></i></button></a>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                        }
                }
            ],
	    });
      });

</script>
@endsection