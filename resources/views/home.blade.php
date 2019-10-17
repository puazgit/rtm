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
    {{-- @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif --}}
</div>
<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="portlet-body">
            {!! $message!!}
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $total_rtm }}"></span>
                </div>
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
                    <span data-counter="counterup" data-value="{{ $total_uraian }}">0</span>
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
                    <span data-counter="counterup" data-value="{{ $masalah_close }}">0</span>
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
                    <span data-counter="counterup" data-value="{{ $masalah_open }}">0</span></div>
                <div class="desc"> Permasalahan Open</div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="portlet light bordered">
    <div class="portlet-body">
        <a href="{{route ('masalah.create')}}" class="icon-btn">
            <i class="fa fa-file-o"></i>
            <div> + Data</div>
        </a>
        <a href="javascript:;" class="icon-btn">
            <i class="fa fa-barcode"></i>
            <div> Products </div>
            <span class="badge badge-success"> 4 </span>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green"></i>
                    <span class="caption-subject font-green bold">Evaluasi Progres RTM sebelumnya</span>
                    <span class="caption-helper"></span>
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
    chart.numberFormatter.numberFormat = "#";
    
    // Add data
    chart.data = [
        {"rtm": "RTM 73","s_open": 15,"s_close": 20},
        {"rtm": "RTM 72","s_open": 35,"s_close": 20},
        {"rtm": "RTM 71","s_open": 12,"s_close": 18},
        {"rtm": "RTM 70","s_open": 13,"s_close": 20},
        {"rtm": "RTM 69","s_open": 23,"s_close": 15}];
    
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "rtm";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "";
    valueAxis.title.text = "Permasalahan";
    valueAxis.title.fontWeight = 800;
    
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "s_open";
    series.dataFields.categoryX = "rtm";
    series.clustered = false;
    series.tooltipText = "Status Open {categoryX} : [bold]{valueY}[/]";
    
    var series2 = chart.series.push(new am4charts.ColumnSeries());
    series2.dataFields.valueY = "s_close";
    series2.dataFields.categoryX = "rtm";
    series2.clustered = false;
    series2.columns.template.width = am4core.percent(50);
    series2.tooltipText = "Status Close {categoryX} : [bold]{valueY}[/]";
    
    chart.cursor = new am4charts.XYCursor();
    chart.cursor.lineX.disabled = true;
    chart.cursor.lineY.disabled = true;
    
    }); // end am4core.ready()
</script>
@endsection