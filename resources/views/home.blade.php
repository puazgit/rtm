@extends('layouts/wrapper')
{{-- @extends('layouts.app') --}}
@section('css')
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('content')
<h3 class="page-title">
    <small></small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="6"></span></div>
                <div class="desc"> Total RTM</div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="87">0</span>
                </div>
                <div class="desc"> Total Permasalahan </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="47">0</span>
                </div>
                <div class="desc"> Permasalahan Close </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="40">0</span></div>
                <div class="desc"> Permasalahan Open</div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green"></i>
                    <span class="caption-subject font-green bold">Evaluasi Progres RTM sebelumnya</span>
                    <span class="caption-helper">3 bulanan</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn red btn-outline btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                        <label class="btn red btn-outline btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection

@section('js')
<script src="{{asset ('assets/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
{{-- amchart --}}
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
@endsection

@section('script')
<script>
    am4core.ready(function() {
    
    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end
    
    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);
    
    // Add percent sign to all numbers
    chart.numberFormatter.numberFormat = "#.3'%'";
    
    // Add data
    chart.data = [{
        "country": "Hasil Audit",
        "year2004": 3.5,
        "year2005": 4.2
    }, {
        "country": "Umpan Balik (Feedback) Pelanggan",
        "year2004": 1.7,
        "year2005": 3.1
    }, {
        "country": "Kinerja Proses </br>dan Kesesuaian Produk",
        "year2004": 2.8,
        "year2005": 2.9
    }, {
        "country": "Status Tindakan Koreksi</br> dan Tindakan Pencegahan",
        "year2004": 2.6,
        "year2005": 2.3
    }, {
        "country": "Perubahan yang dapat</br> mempengaruhi pada </br>sistem manajemen",
        "year2004": 1.4,
        "year2005": 2.1
    }, {
        "country": "Saran Untuk </br>Koreksi",
        "year2004": 2.6,
        "year2005": 4.9
    }];
    
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "GDP growth rate";
    valueAxis.title.fontWeight = 800;
    
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "year2004";
    series.dataFields.categoryX = "country";
    series.clustered = false;
    series.tooltipText = "GDP grow in {categoryX} (2004): [bold]{valueY}[/]";
    
    var series2 = chart.series.push(new am4charts.ColumnSeries());
    series2.dataFields.valueY = "year2005";
    series2.dataFields.categoryX = "country";
    series2.clustered = false;
    series2.columns.template.width = am4core.percent(50);
    series2.tooltipText = "GDP grow in {categoryX} (2005): [bold]{valueY}[/]";
    
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineX.disabled = true;
    chart.cursor.lineY.disabled = true;
    
    }); // end am4core.ready()
</script>
@endsection