<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat dark">
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
    <div class="dashboard-stat yellow">
        <div class="visual">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="details">
            <div class="number">
                <span data-counter="counterup" data-value="{{ $total_uraian_dept }}">0</span>
            </div>
            <div class="desc"> Total Permasalahan {{ Auth::user()->name }}</div>
        </div>
        <a class="more" href=""> View more
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
                <span data-counter="counterup" data-value="{{ $total_masalah_close_dept }}">0</span>
            </div>
            <div class="desc">Total Permasalahan Close {{ Auth::user()->name }}</div>
        </div>
        <a class="more" href="javascript:;"> View more
            <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple">
        <div class="visual">
            <i class="fa fa-bar-chart-o"></i>
        </div>
        <div class="details">
            <div class="number">
                <span data-counter="counterup" data-value="{{ $total_masalah_open_dept }}">0</span>
            </div>
            <div class="desc">Total Permasalahan Open {{ Auth::user()->name }}</div>
        </div>
        <a class="more" href=""> View more
            <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>