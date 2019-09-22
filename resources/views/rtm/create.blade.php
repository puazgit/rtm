@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
	select[readonly].select2-hidden-accessible + .select2-container {
    pointer-events: none;
    touch-action: none;
}
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection__arrow, select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
        display: none;
    }
</style>
@endsection

@section('content')
<h3 class="page-title">
</h3>
<div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" action="{{route ('rtm.store')}}" method="post" spellcheck="false">
        @csrf
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> CREATE RTM</span>
                </div>
                <div class="tools">                                        
                    <button type="submit" class="btn btn-circle green">Submit</button>
                    <button type="button"
                        class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                </div>
                
            </div>
            <div class="portlet-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <input type="hidden" id="h_uraian" name="h_uraian[]" />
                    <div class="tabbable-line boxless tabbable-reversed">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_0" data-toggle="tab">Form 1 </a>
                            </li>
                            <li>
                                <a href="#tab_1" data-toggle="tab"> Form 2 </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">Head RTM
                                            <i class="fa fa-gift"></i> </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">RTM Ke</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="Enter text" id="rtm_ke" name="rtm_ke">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tingkat</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" id="tingkat" name="tingkat">
                                                        <option>Pusat</option>
                                                        <option>Wilayah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">RKT</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" id="rkt" name="rkt">
                                                        <option>I</option>
                                                        <option>II</option>
                                                        <option>III</option>
                                                        <option>IV</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tahun</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" id="tahun" name="tahun">
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                        <option selected>2020</option>
                                                        <option>2021</option>
                                                        <option>2022</option>
                                                        <option>2023</option>
                                                        <option>2024</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_1">
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">Pilih Uraian Permasalahan
                                            <i class="fa fa-gift"></i> </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- BEGIN FORM-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light bordered">
                                                    <div class="portlet-body">
                                                        <div class="table-responsive m-t-10">
                                                            <table
                                                                class="table table-striped table-bordered table-hover dt-responsive"
                                                                width="100%" id="headrtm-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th rowspan="2" style="text-align: center;">Aksi
                                                                        </th>
                                                                        <th rowspan="2">Uraian Permasalahan Bidang</th>
                                                                        <th rowspan="2">Analisis /Penyebab</th>
                                                                        <th colspan="3" style="text-align: center;">
                                                                            Rencana
                                                                            Penyelesaian
                                                                        </th>
                                                                        <th rowspan="2">Tindaklanjut</th>
                                                                        <th colspan="2" style="text-align: center;">
                                                                            Rencana
                                                                            Penyelesaian
                                                                        </th>
                                                                        <th rowspan="2">Status</th>
                                                                        <th rowspan="2">RTM Ke</th>
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
                                                <div class="portlet light bordered">
                                                    <div class="portlet-body">
                                                        <label class="control-label">Uraian Permasalahan Terpilih
                                                            :</label>
                                                        <select id="c_uraian" name="c_uraian[]" multiple disabled />
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->
                                            </div>
                                        </div>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                {{-- <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-10 col-md-12">
                                            <button type="submit" class="btn btn-circle green">Submit</button>
                                            <button type="button"
                                                class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset ('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
<script>
    $(function() {
	    $('#headrtm-table').DataTable({
		    dom: 'Blfrtip',
          buttons: [
          ],
	    //   processing: true,
          serverSide: true,
          order:[[0,"desc"]],    
	      ajax: "{{route ('masalah.jsonuraian')}}",
	      columns: [
              { data: 'id', name: 'id'},//0
              { data: 'uraian', name: 'uraian', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //1
              { data: 'analisis', name: 'analisis', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //2
              { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //3
              { data: 'r_target', name: 'r_target', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //4
              { data: 'r_pic', name: 'r_pic', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //5
              { data: 'tindak', name: 'tindak', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //6
              { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //7
              { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                {
                    var decodedText = $("<p/>").html(data).text(); 
                    return ''+decodedText+''
                }
              }, //8
              { data: 'status', name: 'status'}, //9
              { data: 'rtm[].rtm_ke', name: 'rtm', render: function(data, type, row)
                { 
                    return ''+data+''
                }
              }//10
	      ],
	      columnDefs:[
                {targets:[0,3,4,5,6,7,8,10], visible:false, className: 'noVis'},
				{
					targets:9,
					render:function(a,e,t,n){
						var s={
							1:{title:"open",class:"label-danger"},
							0:{title:"close",class:"label-success"},
						};
						return void 0===s[a]?a:'<span class="label label-sm '+s[a].class+'">'+s[a].title+"</span>"
					}
				},
            ],
				 select: {
				 	style : 'multi',
				 },
	    });
        var tablekuw = $('#headrtm-table').DataTable();
        $('#headrtm-table tbody').on('click', 'tr', function () {
            var ids = $.map(tablekuw.rows('.selected').data(), function (item){
					return item.id;
				});
                var uraians = $.map(tablekuw.rows('.selected').data(), function (item){
					return '<option value="'+item.id+'" selected>'+item.uraian+'</option>';
				});
                $('#c_uraian').html(uraians).trigger('change');
                $('#h_uraian').val(ids);
			});
        $('#c_uraian').select2({placeholder: "Uraian ...", allowClear: true});
      });
</script>
@endsection