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
                        <span class="caption-subject bold uppercase">DETAIL RTM {{$rtm->rtm_ke}}</span>
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
                        id="sample_rtm">
                        <thead>
                            <tr>
                                <th> RTM Ke </th>
                                <th> Tingkat </th>
                                <th> RKT </th>
                                <th> Tahun </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="odd gradeX">
                                    <td>{{$rtm->rtm_ke}}</td>
                                    <td>{{$rtm->tingkat}}</td>
                                    <td>{{$rtm->rkt}}</td>
                                    <td>{{$rtm->tahun}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div class="table-responsive m-t-10">
                            <table
                                class="table table-striped table-bordered table-hover dt-responsive"
                                width="100%" id="uraian-table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Uraian Permasalahan Bidang</th>
                                        <th rowspan="2">Analisis /Penyebab</th>
                                        <th colspan="3" style="text-align: center;">
                                            Rencana
                                            Penyelesaian
                                        </th>
                                        <th rowspan="2">Tindaklanjut</th>
                                        <th colspan="2" style="text-align: center;">
                                        Penyelesaian
                                        </th>
                                        <th rowspan="2">Status</th>
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
    $('#uraian-table').DataTable({
        serverSide: true,   
	    ajax: "{{route ('rtm.jsonrtm')}}/{{$rtm->id}}",
        columns: [
              { data: 'uraian', name: 'uraian', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//0
              { data: 'analisis', name: 'analisis', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//1
              { data: 'r_uraian', name: 'r_uraian', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//2
              { data: 'r_target', name: 'r_target', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//3
              { data: 'r_pic', name: 'r_pic', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//4
              { data: 'tindak', name: 'tindak', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//5
              { data: 'p_rencana', name: 'p_rencana', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//6
              { data: 'p_realisasi', name: 'p_realisasi', render: function(data, column, row)
                {var decodedText = $("<p/>").html(data).text(); return ''+decodedText+''}
              },//7
              { data: 'status', name: 'status'},//8
	    ],
        columnDefs:[
                {targets:[5,6,7], visible:false, className: 'noVis'},
				{
					targets:8,
					render:function(a,e,t,n){
						var s={
							1:{title:"open",class:"label-danger"},
							0:{title:"close",class:"label-success"},
						};
						return void 0===s[a]?a:'<span class="label label-sm '+s[a].class+'">'+s[a].title+"</span><br></br><a href="+s[a].class+"><span class=\"label label-sm label-default\">detail</span></a>"
					}
				},
            ],
    });
    </script>
@endsection