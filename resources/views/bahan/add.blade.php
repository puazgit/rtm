@extends('layouts/wrapper')

@section('css')
{{-- <link href="{{asset ('assets/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
{{-- <link href="{{asset ('assets/dropzone/basic.min.css')}}" rel="stylesheet" type="text/css" /> --}}
@endsection

@section('content')
<h3 class="page-title">
</h3>
<div class="row">
    <div class="col-md-12">
        <form action="{{route ('rtm.save')}}" class="form-horizontal" method="POST" enctype="multipart/form-data"
            spellcheck="false">
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
                                            {{-- <label class="col-md-3 control-label">Attach Surat</label> --}}
                                            <div class="col-md-10">
                                                <div class="dropzone dropzone-file-area" id="document-dropzone"
                                                    style="width: 600px; margin-top: 10px;">
                                                    <div class="dz-message" data-dz-message><span>
                                                            <h4 class="sbold">Unggah Surat Permohonan Bahan RTM</h4>
                                                        </span>
                                                    </div>
                                                </div>
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
{{-- <script src="{{asset ('assets/dropzone/dropzone.min.js')}}" type="text/javascript"></script> --}}
{{-- <script src="{{asset ('assets/dropzone/form-dropzone.min.js')}}" type="text/javascript"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection

@section('script')
<script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
    url: '{{ route('rtm.saveMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
    uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
    file.previewElement.remove()
    var name = ''
    if (typeof file.file_name !== 'undefined') {
    name = file.file_name
    } else {
    name = uploadedDocumentMap[file.name]
    }
    $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
    @if(isset($rtm) && $rtm->document)
    var files =
    {!! json_encode($rtm->document) !!}
    for (var i in files) {
    var file = files[i]
    this.options.addedfile.call(this, file)
    file.previewElement.classList.add('dz-complete')
    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
    }
    @endif
    }
    }
</script>
@endsection