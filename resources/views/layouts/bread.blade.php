<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route ('home')}}">Home</a>
        </li>
        @for($i = 0; $i <= count(Request::segments()); $i++) <li>
            <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
                {{(Request::segment($i))}}
            </a>
            <i class="fa fa-circle"></i>
            </li>
            @endfor
    </ul>
    <div class="page-toolbar">
        {{-- <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div> --}}
    </div>
</div>