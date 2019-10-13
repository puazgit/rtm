@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/basic.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<h3 class="page-title">
</h3>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{route ('rtm.save')}}" method="post" spellcheck="false">
            @csrf
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> PERMINTAAN DATA RTM</span>
                    </div>
                    <div class="tools">
                        <button type="submit" class="btn btn-circle green">Kirim Ke Unit Kerja</button>
                        <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                    </div>

                </div>
                <div class="portlet-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_0">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">RTM Ke</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Masukkan angka"
                                                    id="rtm_ke" name="rtm_ke">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="tingkat" name="tingkat">
                                                    <option>Pusat</option>
                                                    <option>Wilayah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">RKT</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="rkt" name="rkt">
                                                    <option>I</option>
                                                    <option>II</option>
                                                    <option>III</option>
                                                    <option>IV</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="tahun" name="tahun">
                                                    <option>2014</option>
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option selected>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                    <option>2024</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Attach Surat</label>
                                            <div class="dropzone dropzone-file-area" id="my-dropzone"
                                                style="width: 500px; margin-top: 10px;">
                                                <h3 class="sbold">Drop files disini</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">

                                            </div>
                                        </div>
                                    </div>
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
<script src="{{asset ('assets/js/dropzone.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/form-dropzone.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
<script>
    $(document).ready(function() {
      });
</script>
@endsection