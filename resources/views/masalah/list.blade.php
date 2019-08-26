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
                <div class="caption">
                    <i class="icon-docs font-dark"></i>List Permasalahan
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="rtm-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Id RTM</th>
                            <th rowspan="2">Rtm Ke</th>
                            <th rowspan="2">Tingkat</th>
                            <th rowspan="2">RKT</th>
                            <th rowspan="2">Tahun</th>
                            <th rowspan="2">Uraian Bidang Permasalahan</th>
                            <th rowspan="2">Analisis / Penyebab</th>
                            <th colspan="3" style="text-align: center;">Rencana Penyelesaian</th>
                            <th rowspan="2">Status</th>
                            <th rowspan="2" style="text-align: center;">Aksi</th>
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

<div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                {{-- <h4 class="modal-title">Progress</h4> --}}
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN CHART PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-haze"></i>
                                    <span class="caption-subject bold uppercase font-green-haze"> Progress</span>
                                    {{-- <span class="caption-helper">duration on value axis</span> --}}
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                    <a href="javascript:;" class="reload"> </a>
                                    <a href="javascript:;" class="fullscreen"> </a>
                                    <a href="javascript:;" class="remove"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="chart_2" class="chart" style="height: 400px;"> </div>
                            </div>
                        </div>
                        <!-- END CHART PORTLET-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
<script src="{{asset ('assets/amcharts/amstockcharts/plugins/dataloader/dataloader.min.js')}}" type="text/javascript">
</script>
{{-- assets\amcharts\amstockcharts\plugins\dataloader --}}

{{-- <script src="{{asset ('assets/js/charts-amcharts.min.js')}}" type="text/javascript"></script> --}}
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
                        window.location = "/masalah/add";
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
	      ajax: "{{route ('masalah.json')}}",
	      columns: [
              { data: 'idr', name: 'tb_rtm.id', width: '15%'},//0
              { data: 'rtm_ke', name: 'tb_rtm.rtm_ke'}, //1
              { data: 'tingkat', name: 'tb_rtm.tingkat'}, //2
              { data: 'rkt', name: 'tb_rtm.rkt'}, //3
              { data: 'tahun', name: 'tb_rtm.tahun'}, //4
              { data: 'index_masalah', name: 'tb_index.index_masalah'}, //5
              { data: 'analisis', name: 'tb_uraian.analisis'}, //6
              { data: 'r_uraian', name: 'tb_uraian.r_uraian'}, //7
              { data: 'r_target', name: 'tb_uraian.r_target'}, //8
              { data: 'r_pic', name: 'tb_uraian.r_pic'}, //9
              { data: 'status', name: 'tb_uraian.status'}, //10
              { data: 'idu', name: 'tb_uraian.id', width: '18%'} //11

            //   { data: 'tindak', name: 'tb_uraian.tindak'}, //9
            //   { data: 'p_rencana', name: 'tb_uraian.p_rencana'}, //10
            //   { data: 'p_realisasi', name: 'tb_uraian.p_realisasi'}, //11
            //   { data: 'rtm_id', name: 'tb_uraian.rtm_id'}, //13
            //   { data: 'index_id', name: 'tb_uraian.index_id'}, //14
	      ],
	      columnDefs:[
                {targets:[0,1,2,3,4], visible:false, className: 'noVis'},
				{
					targets:10,
					render:function(a,e,t,n){
						var s={
							0:{title:"open",class:"label-danger"},
							1:{title:"close",class:"label-success"},
						};
						return void 0===s[a]?a:'<span class="label label-sm '+s[a].class+'">'+s[a].title+"</span>"
					}
				},
                {
                        targets:11,
                        orderable:!1,
                        title:"aksi",
                        render:function(data, type, row){
                        return '<a href=\"\" data-target=\"#draggable\" data-idb=\"'+data+'\" data-toggle=\"modal\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-area-chart\"></i></button></a><a href=\"/masalah/detail/'+data+'\"><button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"feather icon-eye\"></i></button></a>@hasanyrole('editor|admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-pencil-square-o\
                        "></i></button>@endhasanyrole @role('admin')<button type=\"button\" class=\"btn btn-circle btn-icon-only green\"><i class=\"fa fa-trash-o\"></i></button>@endrole'
                        }
                }
            ],
	    });
      });

$('#draggable').on('show.bs.modal',function (event){

    var button = $(event.relatedTarget);
    var data_id = button.data().idb;

    var ChartsAmcharts = function () {
    t = function () {
        var e = AmCharts.makeChart(

            "chart_2",
            {
                type: "serial",
                dataLoader: {
                    url: "{{route ('progres.json')}}" + '/' + data_id,
                    format: "json"
                },
                theme: "light",
                fontFamily: "Open Sans",
                color: "#888888",
                legend:
                
                {
                    equalWidths: !1,
                    useGraphSettings: !0,
                    valueAlign: "left",
                    valueWidth: 120
                },
                valueAxes:
                    [
                        {
                            axisAlpha: 0,
                            position: "left"
                        }
                    ],
                graphs:
                    [
                        {
                            alphaField: "alpha",
                            balloonText: "realisasi:[[value]]",
                            dashLengthField: "dashLength",
                            fillAlphas: .7,
                            legendPeriodValueText: "total: [[value.sum]]",
                            legendValueText: "[[value]]",
                            title: "realisasi",
                            type: "column",
                            valueField: "realisasi",
                            valueAxis: "realisasiAxis"
                        },
                        {
                            bullet: "square",
                            balloonText: "target:[[value]]",
                            bulletBorderAlpha: 1,
                            bulletBorderThickness: 1,
                            dashLengthField: "dashLength",
                            legendValueText: "[[value]]",
                            title: "target",
                            fillAlphas: 0,
                            legendPeriodValueText: "total: [[value.sum]]",
                            valueField: "target",
                            valueAxis: "targetAxis"
                        },
                        {
                            balloonText: "competitor:[[value]]",
                            bullet: "round",
                            bulletBorderAlpha: 1,
                            useLineColorForBulletBorder: !0,
                            bulletColor: "#FFFFFF",
                            dashLengthField: "dashLength",
                            labelPosition: "right",
                            legendValueText: "[[value]]",
                            title: "competitor",
                            fillAlphas: 0,
                            legendPeriodValueText: "total: [[value.sum]]",
                            valueField: "competitor",
                            valueAxis: "competitorAxis"
                        }
                    ],
                chartCursor:
                {
                    categoryBalloonDateFormat: "DD",
                    cursorAlpha: .1,
                    cursorColor: "#000000",
                    fullWidth: !0,
                    valueBalloonsEnabled: !1,
                    zoomable: !1
                },
                categoryField: "year",
                categoryAxis:
                {
                    gridPosition: "start",
                    axisAlpha: 0, tickLength: 0
                },
                exportConfig:
                {
                    menuBottom: "20px",
                    menuRight: "22px",
                    menuItems:
                        [
                            {
                                icon: App.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png", format: "png"
                            }
                        ]
                }
            });
        $("#chart_2").closest(".portlet").find(".fullscreen").click(function () {
            e.invalidateSize()
        })
    };
    return {
        init: function () {
            t()
        }
    }
}();
jQuery(document).ready(function () {
    ChartsAmcharts.init() 
});

    console.log(data_id);
    // var modal =$(this);
    // modal.find('.modal-body #idb').val(data_id);
});


</script>
@endsection