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
    <div class="portlet-body">
        <div class="note note-danger">
            <h4 class="block">Danger! Some Header Goes Here</h4>
            <p> Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit mattis
                consectetur purus sit amet.\ Cras mattis consectetur purus sit amet fermentum. </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row" style="padding-top: 5px; padding-bottom: 0px;">
                @role('admin')
                <div class="col-lg-4">
                    <select id="sdept" class="form-control select2" name="sdept">
                        <option value=""></option>
                        @foreach (App\Departemen::get() as $departemen)

                        <option value="{{ $departemen->id }}">{{ $departemen->departemen }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endrole
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
        <div class="portlet light bg-inverse">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase">BAHAN RTM (BARU)
                    </span>
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%"
                    id="table-bahan1">
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

<div class="row">
    <div class="col-md-12">
        @include('evaluasi/open')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('bahan/off')
    </div>
</div>
<div class="modal fade" id="ubahRisalah" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="{{route ('bahan.torisalah')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Masukkan kedalam Risalah ?</label>
                            <input type="text" class="form-control" id="iduraian" name="iduraian"
                                placeholder="Uraian ID">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn green">Ya</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    //table-bahan1    
    $('#sdept').select2({placeholder: "--- Pilih Departemen ---",allowClear: true, width : '100%'});
    //table-bahan2
    $('#sdept2').select2({placeholder: "--- Pilih Departemen ---",allowClear: true, width : '100%'});
    $('#srtm').select2({placeholder: "--- Pilih Rtm ---",allowClear: true, width : '100%'});
    //table-bahan3
    $('#sdept3').select2({placeholder: "--- Pilih Departemen ---",allowClear: true, width : '100%'});
    $('#srtm3').select2({placeholder: "--- Pilih Rtm ---",allowClear: true, width : '100%'});

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

 load_data();
 $('#sdept').change(function(){
    var	sdept = $(this).val();

    $('#table-bahan1').DataTable().destroy();
    load_data(sdept);
 })
 function load_data(sdept)
{
    var	sdept = $('#sdept').val();
    
    $('#table-bahan1').DataTable({
    processing: true,
    serverSide: true,
    order:[[10,"desc"]],
    ajax: {
        url:'{{ route("bahan.index") }}',
        data:{sdept:sdept}
    },
    dom: 'Blfrtip',
    buttons: [
              {
                text: '+ bahan',
                className:"btn btn-square green btn-success",
                    action: function ( e, dt, node, config ) {
                        window.location = '{{route ('bahan.create')}}';
                    }
                },
                @role('admin')
                {
					extend: "colvis",
                    text: "Show",
                    className: "btn btn-square green btn-success"
				},
                @endrole  
                // {
                //     extend:"pdf",
                //     className:"btn btn-square green btn-success"
                // }
          ],
    columns: [
                    { data: 'uraian', name: 'uraian', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //0
                    { data: 'analisis', name: 'analisis', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //1
                    { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //2
                    { data: 'r_target', name: 'r_target', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //3
                    { data: 'departemen', name: 'departemen', orderable: false}, //4
                    { data: 'tindak', name: 'tindak', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //5
                    { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //6
                    { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                        {
                            var d = $("<p/>").html(data).text(); 
                            return ''+d+''
                        }
                    }, //7
                    { data: 'status_1', name: 'status_1'}, //8
                    { data: 'rtm', name: 'rtm', orderable: false},//9
                    { data: 'id', name: 'id'}//10
	            ],
                columnDefs:[
                    @role('unit')
                    {targets:[4,5,6,7,8], visible:false, className: 'noVis'},
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
                            return '<a href=\"{{route ('bahan.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('unit|admin')<a href=\"{{route ('bahan.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                            "></i></button></a>@endhasanyrole @hasanyrole('admin')<button type=\"button\" data-myuraian=\"'+data+'\" data-toggle=\"modal\" href=\"#ubahRisalah\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-flag\"></i></button><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                            }
                    }
                ],
    });

}

load_data2();
$('#sdept2').change(function(){
   var	sdept2 = $(this).val();
   var	srtm2 = $(srtm2).val();

   $('#table-bahan2').DataTable().destroy();
   load_data2(sdept2 ,srtm2);
})
$('#srtm').change(function(){
   var	srtm = $(this).val();
   var	sdept2 = $(sdept2).val();

   $('#table-bahan2').DataTable().destroy();
   load_data2(sdept2, srtm);
})
function load_data2(sdept2, srtm)
{

    var buttonCommon = {
        exportOptions: {
            columns: ':visible',
            format: {
                body: function ( data, column,row ) {
                    data = $("<p/>").html(data).text();
                    return $.trim(data);
                }
            }
        }
    };

   var	sdept2 = $('#sdept2').val();
   var	srtm = $('#srtm').val();
   
   $('#table-bahan2').DataTable({
   processing: true,
   serverSide: true,
   order:[[10,"desc"]],
   ajax: {
       url:'{{ route("bahan.rtmlama") }}',
       data:{sdept2:sdept2, srtm:srtm}
   },
   dom: 'Blfrtip',
    buttons: [
                {
                extend: "colvis",
                    text: "Show",
                    className: "btn btn-square green btn-success"
                },
                {
                extend: "print",
                    text: "Print",
                    className: "btn btn-square green btn-success",
                    title: 'Pada Rtm Ke'+' '+ $('#srtm option:selected').text(),
                },
                $.extend( true, {}, buttonCommon, {
                    extend: 'excelHtml5',
                    className: "btn btn-square green btn-success",
                    title: 'Pada Rtm Ke'+' '+ $('#srtm option:selected').text(),
                } ),
                $.extend( true, {}, buttonCommon, {
                    extend: 'pdfHtml5',
                    className: "btn btn-square green btn-success",
                    orientation: 'landscape',
                    title: 'Pada Rtm Ke'+' '+ $('#srtm option:selected').text(),
                } )
            ],
   columns: [
                   { data: 'uraian', name: 'uraian', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //0
                   { data: 'analisis', name: 'analisis', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //1
                   { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //2
                   { data: 'r_target', name: 'r_target', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //3
                   { data: 'departemen', name: 'departemen.departemen', orderable: false}, //4
                   { data: 'tindak', name: 'tindak', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //5
                   { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //6
                   { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //7
                   { data: 'status_1', name: 'status_1'}, //8
                   { data: 'rtm', name: 'rtm.rtm_ke', orderable: false},//9
                   { data: 'id', name: 'id'}//10
               ],
               columnDefs:[
                   @role('unit')
                   {targets:[4,5,6,7,8,9], visible:false, className: 'noVis'},
                   @else
                   {targets:[4,5,6,7,8,9], visible:false, className: 'noVis'},
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
                           return '<a href=\"{{route ('evaluasi.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('unit|admin')<a href=\"{{route ('evaluasi.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                           "></i></button></a>@endhasanyrole @hasanyrole('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                           }
                   }
               ],
   });
}

load_data3();
$('#sdept3').change(function(){
   var	sdept3 = $(this).val();
   var	srtm3 = $(srtm3).val();

   $('#table-bahan3').DataTable().destroy();
   load_data3(sdept3 ,srtm3);
})
$('#srtm3').change(function(){
   var	srtm3 = $(this).val();
   var	sdept3 = $(sdept3).val();

   $('#table-bahan3').DataTable().destroy();
   load_data3(sdept3, srtm3);
})

function load_data3(sdept3, srtm3)
{
   var	sdept3 = $('#sdept3').val();
   var	srtm3 = $('#srtm3').val();
   
   $('#table-bahan3').DataTable({
   processing: true,
   serverSide: true,
   order:[[10,"desc"]],
   ajax: {
       url:'{{ route("bahan.bahanoff") }}',
       data:{sdept3:sdept3, srtm3:srtm3}
   },
   @role('admin')
   dom: 'Blfrtip',
   @endrole
   buttons: [
                {
					extend: "colvis",
                    text: "Show",
                    className: "btn btn-square green btn-success"
				},  
          ],
   columns: [
                   { data: 'uraian', name: 'uraian', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //0
                   { data: 'analisis', name: 'analisis', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //1
                   { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //
                   { data: 'r_target', name: 'r_target', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //3
                   { data: 'departemen', name: 'departemen.departemen', orderable: false}, //4
                   { data: 'tindak', name: 'tindak', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //5
                   { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //6
                   { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                       {
                           var d = $("<p/>").html(data).text(); 
                           return ''+d+''
                       }
                   }, //7
                   { data: 'status_1', name: 'status_1'}, //8
                   { data: 'rtm', name: 'rtm.rtm_ke', orderable: false},//9
                   { data: 'id', name: 'id'}//10
               ],
               columnDefs:[
                   @role('unit')
                   {targets:[4,5,6,7,8,9,10], visible:false, className: 'noVis'},
                   @else
                   {targets:[5,6,7,8,9,10], visible:false, className: 'noVis'},
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
                           return '<a href=\"{{route ('evaluasi.index')}}'+'/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('unit|admin')<a href=\"{{route ('evaluasi.index')}}'+'/'+data+'/edit\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                           "></i></button></a>@endhasanyrole @hasanyrole('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                           }
                   }
               ],
   });
}

$('#ubahRisalah').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var IdUraian = button.data('myuraian');
  
  var modal = $(this);
  modal.find('.modal-body input').val(IdUraian);
});

    });


</script>
@endsection