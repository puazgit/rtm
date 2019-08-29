@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/summernote.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset ('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<h3 class="page-title">
    <small>&nbsp;</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="#">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-docs"></i>Tambah Data Permasalahan</div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-secondary-outline">
                            <i class="fa fa-angle-left"></i> Back</button>
                        <button class="btn btn-secondary-outline">
                            <i class="fa fa-reply"></i> Reset</button>
                        <button class="btn btn-success">
                            <i class="fa fa-check"></i> Save</button>
                        <div class="btn-group">
                            <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Duplicate </a>
                                </li>
                                <li>
                                    <a href="javascript:;"> Delete </a>
                                </li>
                                <li class="dropdown-divider"> </li>
                                <li>
                                    <a href="javascript:;"> Print </a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal form-bordered">
                        <div class="tabbable-bordered">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab"> Isian 1 </a>
                                </li>
                                <li>
                                    <a href="#tab_2" data-toggle="tab"> Isian 2 </a>
                                </li>
                                <li>
                                    <a href="#tab_3" data-toggle="tab"> Isian 3 </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="cuser" class="col-md-2 control-label">PIC</label>
                                            <div class="col-md-10">
                                                <select id="cuser" class="form-control select2-multiple" name="cuser[]"
                                                    multiple>
                                                </select>
                                                {{-- <select id="tag_list" name="tag_list[]" class="form-control" multiple></select> --}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Uraian Permasalahan</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_uraianmasalah"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Analisis / Penyebab</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_analisis"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <div class="alert alert-success margin-bottom-10">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"></button>
                                        <i class="fa fa-warning fa-lg"></i> <b>RENCANA PENYELESAIAN</b>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Uraian</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_uraian"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Target Waktu</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_target"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <div class="alert alert-success margin-bottom-10">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"></button>
                                        <i class="fa fa-warning fa-lg"></i> <b>EVALUASI PROGRES TINDAKLANJUT</b>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tindak Lanjut</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_tindak"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Rencana Penyelesaian</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_rencana"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Realisasi Penyelesaian</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_realisasi"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Status</label>
                                            <div class="col-md-10">
                                                <input type="checkbox" class="make-switch" checked data-on-text="Open"
                                                    checked data-off-text="Close">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endsection

            @section('js')
            <script src="{{asset ('assets/js/summernote.min.js')}}" type="text/javascript"></script>
            {{-- <script src="{{asset ('assets/js/select2.full.min.js')}}" type="text/javascript"></script> --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <script src="{{asset ('assets/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
            <script src="{{asset ('assets/js/components-bootstrap-switch.min.js')}}" type="text/javascript"></script>


            @endsection

            @section('script')
            <script>
                var ComponentsEditors=function()
                {
                    var s=function(){
                        $("#summernote_uraianmasalah").summernote(
                            {height:200}
                        )
                        $("#summernote_analisis").summernote(
                            {height:300}
                        )
                        $("#summernote_uraian").summernote(
                            {height:300}
                        )
                        $("#summernote_target").summernote(
                            {height:300}
                        )
                        $("#summernote_tindak").summernote(
                            {height:300}
                        )
                        $("#summernote_rencana").summernote(
                            {height:300}
                        )
                        $("#summernote_realisasi").summernote(
                            {height:300}
                        )
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

                $('#cuser').select2({
                    placeholder: "Pilih PIC ...",
                    minimumInputLength: 2,
                    // maximumInputLength : 0,
                    // openOnEnter: true,
                    allowClear: true,
                    ajax: {
                        url: '/cari',
                        dataType: 'json',
                        delay: 250,
                        
                        data: function (params) {
                            return {
                                q: $.trim(params.term)
                            };
                        },
                
                        processResults: function (data) {
                            return {
                            results: data
                            };
                        },
                            cache: true
                    }
                });
            
            
            </script>
            @endsection