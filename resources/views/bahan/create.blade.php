@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/summernote.css')}}" rel="stylesheet" type="text/css" />
{{-- <link href="{{asset ('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css" /> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection

@section('content')
<h3 class="page-title">
    <small></small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    @isset($selectedrtm->rtm_ke)
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="{{route ('bahan.store')}}" method="post"
            spellcheck="false">
            @csrf
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> TAMBAH BAHAN RTM</span>
                    </div>
                    <div class="tools">
                        <button type="submit" id="btn_save" class="btn btn-circle green">Submit</button>
                        <button type="button" onclick="history.back()"
                            class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-step">
                        <div class="row step-line">
                            <div class="col-md-3 bg-grey mt-step-col">
                                <div class="mt-step-title uppercase font-grey-cascade">&nbsp;</div>
                                <div class="mt-step-content uppercase font-grey-cascade bold">&nbsp;</div>
                                <div class="mt-step-content uppercase font-grey-cascade bold">&nbsp;</div>
                            </div>
                            <div class="col-md-6 bg-grey mt-step-col">
                                <div id="lrtmke" class="mt-step-title uppercase font-grey-cascade">Rapat Tinjauan
                                    Manajemen : @isset($selectedrtm->rtm_ke) {{ $selectedrtm->rtm_ke }} @endisset
                                </div>
                                <div id="ltingkat" class="mt-step-content uppercase font-grey-cascade bold">Tingkat
                                    @isset($selectedrtm->tingkat){{$selectedrtm->tingkat}}@endisset</div>
                                <div id="lrktTahun" class="mt-step-content uppercase font-grey-cascade bold">Pada Rkt
                                    @isset($selectedrtm->rkt)
                                    {{$selectedrtm->rkt}}@endisset Tahun
                                    @isset($selectedrtm->tahun){{$selectedrtm->tahun}}@endisset
                                </div>
                            </div>
                            <div class="col-md-3 bg-grey mt-step-col">
                                <div class="mt-step-title uppercase font-grey-cascade">&nbsp;</div>
                                <div class="mt-step-content uppercase font-grey-cascade bold">&nbsp;</div>
                                <div class="mt-step-content uppercase font-grey-cascade bold">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div @role ('unit') id="noEdit" @endrole><select id="srtm" class="form-control select2" name="srtm">
                        <option value="@isset($selectedrtm->id){{$selectedrtm->id}}@endisset">
                            @isset($selectedrtm->rtm_ke){{$selectedrtm->rtm_ke}}@endisset
                        </option>
                    </select>
                </div>
                <hr>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><b>{{ $error }}</b></li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <div class="portlet-body form">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab"> URAIAN PERMASALAHAN </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab"> RENCANA PENYELESAIAN </a>
                            </li>
                            @role('admin')
                            <li>
                                <a href="#tab_3" data-toggle="tab"> EVALUASI PROGRES TINDAKLANJUT </a>
                            </li>
                            @endrole
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="alert alert-success margin-bottom-10">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    <i class="fa fa-check fa-lg"></i> <b>URAIAN PERMASALAHAN</b>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="jenis" class="col-md-2 control-label">Jenis Permasalahan</label>
                                        <div class="col-md-10">
                                            <select id="jenis_id" class="form-control select2" name="jenis_id">
                                                <option value="{{old('jenis_id')}}">{{old('jenis_id')}}</option>
                                                @foreach ($jenis as $jenis)
                                                <option value="{{ $jenis->id }}">{{ $jenis->jenis_masalah }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Uraian Permasalahan</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="uraian"
                                                id="uraian">{{ old('uraian') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Analisis / Penyebab</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="analisis"
                                                id="analisis">{{ old('analisis') }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="alert alert-success margin-bottom-10">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    <i class="fa fa-check fa-lg"></i> <b>RENCANA PENYELESAIAN</b>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Uraian</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="r_uraian"
                                                id="r_uraian">{{ old('r_uraian') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Target Waktu</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="r_target"
                                                id="r_target">{{ old('r_target') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group" @role('unit') id="noEdit" @endrole>
                                        <label for="cuser" class="col-md-2 control-label">Penanggung jawab (All)
                                            <input type="checkbox" name="chk_pic" value="1" id="chk_pic"
                                                {{ old('chk_pic') == '1' ? 'checked' : '' }} /></label>
                                        <div class="col-md-10">
                                            <select id="sdept" class="form-control select2-multiple" name="sdept[]"
                                                multiple>
                                                @role('unit')
                                                <option value="{{Auth::user()->departemen_id }}" selected />
                                                {{Auth::user()->name }}
                                                </option>
                                                @endrole
                                                @role('admin')
                                                @foreach ($alldepartemen as $item)
                                                <option value="{{$item->id}}">{{$item->departemen}}
                                                </option>
                                                @endforeach
                                                @endrole
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ket. PIC</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="ket"
                                                id="ket">{{ old('ket') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-10">
                                            <input @role('unit') readonly @endrole type="checkbox" name="status"
                                                class="make-switch" value="1"
                                                {{ old('status') ? 'checked="checked"' : '' }} checked
                                                data-on-text="Open" checked data-off-text="Close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_3">
                                <div class="alert alert-success margin-bottom-10">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true"></button>
                                    <i class="fa fa-check fa-lg"></i> <b>EVALUASI PROGRES TINDAKLANJUT</b>
                                </div>
                                <div class="form-body" @role('unit') id="noEdit" @endrole>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tambah Grafik ?</br>jika ada<input
                                                type="checkbox" name="chk_grafik" value="1" id="chk_grafik"
                                                {{ old('chk_grafik') == '1' ? 'checked' : '' }} /></label></label>
                                        <div class="col-md-10">
                                            <div class="portlet light bordered">
                                                <div class="portlet-body">
                                                    <div class="table-scrollable">
                                                        <table class="table table-hover" id="progres_table">
                                                            <thead>
                                                                <tr>
                                                                    <th> Target </th>
                                                                    <th> Realisasi </th>
                                                                    <th> Competitor </th>
                                                                    <th style="width:100px"> Tahun </th>
                                                                    <th> Aksi </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="bodyprogres">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tindak Lanjut</label>
                                        <div class="col-md-10">
                                            <textarea tabindex="-1" class="form-control summernote" name="tindak"
                                                id="tindak">{{ old('tindak') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Rencana Penyelesaian</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="p_rencana"
                                                id="p_rencana">{{ old('p_rencana') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Realisasi Penyelesaian</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control summernote" name="p_realisasi"
                                                id="p_realisasi">{{ old('p_realisasi') }} </textarea>
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
    @endisset
</div>
<style>
    #noEdit {
        pointer-events: none;
    }
</style>
@endsection

@section('js')
<script src="{{asset ('assets/js/summernote.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{asset ('assets/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/components-bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection

@section('script')
<script>
    var ComponentsEditors=function()
    {
    var s=function(){
    $('.summernote').summernote(
    {
    toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['fontname', ['fontname']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['insert',['table']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['height', ['height']],
    ['view', ['fullscreen','help']]
    ],
    height:200,
    disableDragAndDrop: true,
    codeviewFilter: false,
    codeviewIframeFilter: true,
    }
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
    
    $('#sdept').select2({placeholder: "Pilih PIC ...",allowClear: true, width : '100%'});
    $('#jenis_id').select2({placeholder: "Pilih Jenis Permasalahan ...",allowClear: true, width : '100%'});
    
    $('#srtm').select2({
			placeholder: 'Pilih RTM Ke ...',
			minimumInputLength: 0,
			allowClear: true,
			dropdownAutoWidth: true,
			ajax: {
				url: '{{route ('rtm.load')}}',
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		}).on('select2:select', function(e){
            var data = e.params.data;
            $('#lrtmke').html("Rapat Tinjauan Manajemen : "+data.text+"");
            $('#ltingkat').html("Tingkat "+data.tingkat+"");
            $('#lrktTahun').html("Pada RKT "+data.rkt+" Tahun "+data.tahun+"");
        });

    $('#chk_pic').click(function(){
    if($('#chk_pic').is(':checked')){ //select all
    $('#sdept').find('option').prop('selected',true);
    $('#sdept').trigger('change');
    } else { //deselect all
    $('#sdept').find('option').prop('selected',false);
    $('#sdept').trigger('change');
    }
    });
    
    // var uploadedDocumentMap = {}
    // Dropzone.options.documentDropzone = {
    // url: '{{ route('masalah.saveMedia') }}',
    // maxFilesize: 2, // MB
    // addRemoveLinks: true,
    // headers: {
    // 'X-CSRF-TOKEN': "{{ csrf_token() }}"
    // },
    // success: function (file, response) {
    // $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
    // uploadedDocumentMap[file.name] = response.name
    // },
    // removedfile: function (file) {
    // file.previewElement.remove()
    // var name = ''
    // if (typeof file.file_name !== 'undefined') {
    // name = file.file_name
    // } else {
    // name = uploadedDocumentMap[file.name]
    // }
    // $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    // },
    // init: function () {
    // @if(isset($rtm) && $rtm->document)
    // var files =
    // {!! json_encode($rtm->document) !!}
    // for (var i in files) {
    // var file = files[i]
    // this.options.addedfile.call(this, file)
    // file.previewElement.classList.add('dz-complete')
    // $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
    // }
    // @endif
    // }
    // }
</script>

<script>
    $(document).ready(function () {

        var count = 1;

        dynamic_field(count);

        function dynamic_field(number) {
            html = '<tr>';
            html += '<td><input type="text" name="target[]" class="form-control" /></td>';
            html += '<td><input type="text" name="realisasi[]" class="form-control" /></td>';
            html += '<td><input type="text" name="competitor[]" class="form-control" /></td>';
            html += '<td><select name="year[]" class="form-control"><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2022</option><option>2023</option><option>2024</option><option>2025</option></select></td>';
            if (number > 1) {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">hapus</button></td></tr>';
                $('tbody#bodyprogres').append(html);
            }
            else {
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">tambah</button></td></tr>';
                $('tbody#bodyprogres').html(html);
            }
        }

        $(document).on('click', '#add', function () {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function () {
            count--;
            $(this).closest("tr").remove();
        });
    });
</script>

@endsection