@extends('layouts/wrapper')

@section('css')
@endsection

@section('content')
<h3 class="page-title">
    <small>&nbsp;</small>
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
                    <span class="caption-subject bold uppercase"> Tambah Data RTM</span>
                </div>
                <div class="actions btn-set">
                    <button type="button" name="back" class="btn btn-secondary-outline">
                        <i class="fa fa-angle-left"></i> Back</button>
                    <button type="submit" name="btn_save" class="btn btn-success">
                        <i class="fa fa-check"></i> Save</button>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label>RTM Ke</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" placeholder="" id="rtm_ke">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tingkat</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" placeholder="" id="tingkat">
                            </div>
                        </div>
                        <div class="form-group">
                                <label>RKT</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" class="form-control" placeholder="" id="rkt">
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" placeholder="" id="tahun">
                            </div>
                        </div>
                    </div>
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