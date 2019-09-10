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
                    <span class="caption-subject bold">List RTM</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
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
                className:"btn btn-circle green btn-outline",
                    action: function ( e, dt, node, config ) {
                        window.location = '/rtm/create';
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
          serverSide: true,
          order:[[0,"asc"]],    
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
                        orderable:!1,
                        title:"aksi",
                        render:function(data, type, row){
                        return '<a href=\"\" data-target=\"#draggable\" data-idb=\"'+data+'\" data-toggle=\"modal\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-area-chart\"></i></button></a><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                        "></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                        }
                }
            ],
	    });
      });

</script>
@endsection