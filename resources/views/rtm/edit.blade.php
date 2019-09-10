@extends('layouts/wrapper')

@section('css')
@endsection

@section('content')
<h3 class="page-title">
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-6 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> EDIT RTM</span>
                </div>
                <div class="actions btn-set">
                    <button type="button" name="back" class="btn btn-secondary-outline">
                        <i class="fa fa-angle-left"></i> Back</button>
                    <button type="submit" name="btn_save" class="btn btn-success">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form" action="{{route ('masalah.store')}}" method="post"
            spellcheck="false">
                @include('rtm.form');
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection

@section('script')
@endsection