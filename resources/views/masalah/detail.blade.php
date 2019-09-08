@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/summernote.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<h3 class="page-title">
    <small>&nbsp;</small>
</h3>
<div class="row">
    {{-- URAIAN 1--}}
    <div class="col-md-8">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-docs font-dark"></i>Detail Permasalahan
                </div>
                {{-- <div class="tools"> </div> --}}
            </div>
            <div class="item">
                <div class="item-head">
                    <div class="item-details">
                        <div class="item-name primary-link">PIC :</div>
                    </div>
                </div>
                <div class="item-body"> {{ $detmasalah->r_pic }}
                </div>
            </div>
            <div class="portlet-body">
                <div class="general-item-list">
                    <div class="item">
                        <div class="item-body">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th> RTM Ke </th>
                                                    <th> RKT </th>
                                                    <th> Tahun </th>
                                                    <th> Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detmasalah->rtm as $rtm)
                                                <tr>
                                                    <td> {{$rtm->rtm_ke}} </td>
                                                    <td> {{$rtm->rkt}} </td>
                                                    <td> {{$rtm->tahun}} </td>
                                                    <td>
                                                        <span class="label label-sm label-danger"> Open </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- GRAFIK --}}
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN CHART PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-body">
                        <div id="detchart_2" class="chart" style="height: 250px;"> </div>
                    </div>
                </div>
                <!-- END CHART PORTLET-->
            </div>
        </div>
    </div>
    {{-- URAIAN 2--}}
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="item">
                    <div class="item-head">
                        <div class="item-details">
                            <div class="item-name primary-link">Uraian Permasalahan Bidang :</div>
                        </div>
                    </div>
                    <div class="item-body">
                        <textarea class="form-control summernote" name="det_uraian"
                            id="det_uraian">{{ $detmasalah->uraian }}</textarea>
                    </div>
                </div>
                <div class="item">
                    <div class="item-head">
                        <div class="item-details">
                            <div class="item-name primary-link">Analisis / Penyebab :</div>
                        </div>
                    </div>
                    <div class="item-body">
                        <textarea class="form-control summernote" name="det_analisis"
                            id="det_analisis">{{ $detmasalah->analisis }}</textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- URAIAN 3--}}
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="general-item-list">
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Uraian :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            <textarea class="form-control summernote" name="det_ruraian"
                                id="det_ruraian">{{ $detmasalah->r_uraian }}</textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Target Waktu :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            <textarea class="form-control summernote" name="det_rtarget"
                                id="det_rtarget">{{ $detmasalah->r_target }}</textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Tindak Lanjut :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            <textarea class="form-control summernote" name="det_tindak"
                                id="det_tindak">{{ $detmasalah->tindak }}</textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Rencana Penyelesaian :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            <textarea class="form-control summernote" name="det_prencana"
                                id="det_prencana">{{ $detmasalah->p_rencana }}</textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Rencana Realisasi :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            <textarea class="form-control summernote" name="det_prealisasi"
                                id="det_prealisasi">{{ $detmasalah->p_realisasi }}</textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">Status terakhir :</div>
                            </div>
                        </div>
                        <div class="item-body">
                            @if( $detmasalah->status == 1)
                            <span class="label label-sm label-danger">open</span>
                            @else
                            <span class="label label-sm label-success">close</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
@endsection

@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset ('assets/js/summernote.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/amcharts/amstockcharts/plugins/dataloader/dataloader.min.js')}}" type="text/javascript">
</script>
@endsection

@section('script')
<script>
    var ComponentsEditors=function()
                {
                    var s=function(){
                        $("#det_uraian").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_analisis").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_ruraian").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_rtarget").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_tindak").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_prencana").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        $("#det_prealisasi").summernote({toolbar: [],disableDragAndDrop: true}).next().find(".note-editable").attr("contenteditable", false);
                        
                    };
                    return{
                        init:function(){
                            s()
                        }
                    }
                }();
            
                jQuery(document).ready(function(){
                    ComponentsEditors.init()
                });
    var ChartsAmcharts = function () {
    t = function () {
        var e = AmCharts.makeChart(

            "detchart_2",
            {
                type: "serial",
                dataLoader: {
                    url: "{{route ('progres.json')}}"+ '/' + {{ collect(request()->segments())->last() }},
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
        $("#detchart_2").closest(".portlet").find(".fullscreen").click(function () {
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


</script>
@endsection