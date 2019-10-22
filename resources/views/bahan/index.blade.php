@extends('layouts/wrapper')
@section('css')
<link href="{{asset ('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<h3 class="page-title">
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row" style="padding-top: 5px; padding-bottom: 0px;">
                <div class="col-lg-4">
                    <select id="sdept" class="form-control select2" name="sdept">
                        <option value=""></option>
                        @foreach (App\Departemen::get() as $departemen)
                        <option value="{{ $departemen->id }}">{{ $departemen->departemen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <select id="srtm" class="form-control select2" name="srtm">
                        <option value=""></option>
                        @foreach (App\Rtm::get() as $rtm)
                        <option value="{{ $rtm->id }}">{{ $rtm->rtm_ke }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">BAHAN RTM
                        {{ Auth::user()->name == 'Administrator' ? 'SELURUH UNIT KERJA' : Auth::user()->name}}</span>
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                    id="table-bahan">
                    <thead>
                        <tr>
                            <th rowspan="2">Uraian Permasalahan Bidang</th>
                            <th rowspan="2">Analisis /Penyebab</th>
                            <th colspan="3" style="text-align: center;">Rencana Penyelesaian</th>
                            <th rowspan="2">Tindaklanjut</th>
                            <th colspan="2" style="text-align: center;">Rencana Penyelesaian</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2">RTM Ke</th>
                            <th rowspan="2" style="text-align: center;">Aksi</th>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <th>Target Waktu</th>
                            <th>Penanggung Jawab (PIC)</th>
                            <th>Rencana</th>
                            <th>Realisasi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset ('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/components-select2.min.js')}}" type="text/javascript"></script>
</script>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        
    $('#sdept').select2({placeholder: "--- Pilih Departemen ---",allowClear: true, width : '100%'});
    $('#srtm').select2({placeholder: "--- Pilih Rtm ---",allowClear: true, width : '100%'});

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

 load_data();

 $('#sdept').change(function(){
    var	sdept = $(this).val();
    var	srtm = $(srtm).val();

    $('#table-bahan').DataTable().destroy();
    load_data(sdept ,srtm);
 })

 $('#srtm').change(function(){
    var	srtm = $(this).val();
    var	sdept = $(sdept).val();

    $('#table-bahan').DataTable().destroy();
    load_data(sdept, srtm);
 })

 function load_data(sdept, srtm)
 {
    var	sdept = $('#sdept').val();
    var	srtm = $('#srtm').val();
    
    $('#table-bahan').DataTable({
    processing: true,
    serverSide: true,
    order:[[10,"desc"]],
    ajax: {
        url:'{{ route("bahan.index") }}',
        data:{sdept:sdept, srtm:srtm}
    },
    dom: 'Blfrtip',
    buttons: [
              {
                text: 'Add +',
                className:"btn btn-square green btn-success",
                    action: function ( e, dt, node, config ) {
                        window.location = '{{route ('bahan.create')}}';
                    }
                },
                {
					extend: "colvis",
                    text: "Show",
                    className: "btn btn-square green btn-success"
				},  
                {
                    extend:"pdf",
                    className:"btn btn-square green btn-success"
                }
          ],
    columns: [
                    { data: 'uraian', name: 'uraian', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //0
                    { data: 'analisis', name: 'analisis', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //1
                    { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //2
                    { data: 'r_target', name: 'r_target', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //3
                    { data: 'departemen[].departemen', name: 'departemen', orderable: false, render: function(data, column, row)
                        {
                            return ''+data+''
                        }
                    }, //4
                    { data: 'tindak', name: 'tindak', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //5
                    { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //6
                    { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
                    }, //7
                    { data: 'status', name: 'status'}, //8
                    { data: 'rtm[].rtm_ke', name: 'rtm', orderable: false, render: function(data, type, row)
                        { 
                            return ''+data+''
                        }
                    
                    },//9
                    { data: 'id', name: 'id'}//10
	            ],
                columnDefs:[
                    @role('unit')
                    {targets:[4,5,6,7], visible:false, className: 'noVis'},
                    @else
                    {targets:[5,6,7], visible:false, className: 'noVis'},
                    @endrole
                    {
                        targets:8,
                        render:function(a,e,t,n){
                            var s={
                                1:{title:"open",class:"label-danger"},
                                0:{title:"close",class:"label-success"},
                            };
                            return void 0===s[a]?a:'<span class="label label-sm '+s[a].class+'">'+s[a].title+"</span>"
                        }
                    },
                    {
                            targets:10,
                            orderable:!1,
                            title:"aksi",
                            render:function(data, type, row){
                            return '<a href=\"\" data-target=\"#draggable\" data-idb=\"'+data+'\" data-toggle=\"modal\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-area-chart\"></i></button></a><a href=\"{{route ('masalah.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('unit|admin')<a href=\"{{route ('masalah.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                            "></i></button></a>@endhasanyrole @hasanyrole('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                            }
                    }
                ],
    });
    }
    });
</script>
@endsection