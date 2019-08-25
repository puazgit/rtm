@extends('layouts/wrapper')

@section('css')
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
                <div class="caption font-dark">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject bold">Detail Permasalahan</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <div class="general-item-list">
                    <div class="item">
                        <div class="item-head">
                            <div class="item-details">
                                <div class="item-name primary-link">{{ $detmasalah->analisis }}</div>
                            </div>
                        </div>
                        <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpatLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat
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
@endsection

@section('script')
<script>

</script>
@endsection