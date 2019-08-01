@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset ('assets/css/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<h3 class="page-title"> Buttons Datatable
    <small>buttons extension demos</small>
</h3>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Buttons</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
    {{-- <script src="{{asset ('assets/js/table-datatables-buttons.min.js')}}" type="text/javascript"></script> --}}
    <!-- END: Page Vendor JS-->
@endsection

@section('script')
	<script>
	  $(function() {
	    $('#sample_1').DataTable({
		  dom: 'Blfrtip',
          buttons: [
              {
                extend:"pdf",
                className:"btn green btn-outline"
              }
          ],
	      processing: true,
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
						return'<button type=\"button\" class=\"btn btn-icon rounded-circle btn-flat-primary mr-1 mb-1\"><i class=\"feather icon-eye\"></i></button>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-icon rounded-circle btn-flat-warning mr-1 mb-1\"><i class=\"feather icon-edit\"></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-icon rounded-circle btn-flat-danger mr-1 mb-1\"><i class=\"feather icon-trash-2\"></i></button>@endrole'
					}
				}],
	    });
	  });
	</script>
@endsection