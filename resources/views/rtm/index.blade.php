@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
</br>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">RTM</span>
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                    id="table-rtm">
                    <thead>
                        <tr>
                            <th> RTM Ke </th>
                            <th> Tingkat </th>
                            <th> RKT </th>
                            <th> Tahun </th>
                            <th> ID </th>
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
<script src="{{asset ('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
<script>
    $(function() {
	    $('#table-rtm').DataTable({
		  dom: 'Blfrtip',
          buttons: [
              {
                text: 'Tambah RTM',
                className:"btn btn-square green btn-success",
                    action: function ( e, dt, node, config ) {
                        window.location = '{{route ('rtm.add')}}';
                        // alert( 'Button activated' );
                    }
                },
                'excelHtml5'
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
                        return '<a href=\"{{route ('rtm.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('admin')<a href=\"{{route ('rtm.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                        "></i></button></a>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                        }
                }
            ],
	    });
            var tablertm = $('#table-rtm').DataTable();
            @role('unit')
                tablertm.buttons(0).disable();
            @endrole
      });

</script>
@endsection