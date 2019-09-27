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
                    <span class="caption-subject bold">List User</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                    id="user-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Id</th>
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
	    $('#user-table').DataTable({
		                dom: 'Blfrtip',
          buttons: [
              {
                text: 'Add +',
                className:"btn btn-circle green btn-outline",
                    action: function ( e, dt, node, config ) {
                        window.location = '/user/create';
                        // alert( 'Button activated' );
                    }
                },   
              {
                extend:"pdf",
                className:"btn btn-circle green btn-outline"
              }
          ],
	    //   processing: true,
          serverSide: true,
          order:[[0,"asc"]],    
	      ajax: 'user/json',
	      columns: [
	      { data: 'name'},
	      { data: 'email'},
	      { data: 'id', width: '15%'}
	      ],
	      columnDefs:[
	      				{
					targets:2,
					orderable:!1,
					title:"aksi",
					render:function(data){
						return'<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\"></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
					}
				}],
	    });
	  });
</script>
@endsection