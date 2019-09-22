@extends('layouts/wrapper')
{{-- @extends('layouts.app') --}}
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
<div class="clearfix"></div>
@endsection

@section('js')
<script src="{{asset ('assets/js/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
@endsection