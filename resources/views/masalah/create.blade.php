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
        <form class="form-horizontal form-row-seperated" action="{{route ('masalah.store')}}" method="post"
            spellcheck="false">
            @csrf
            <div class="portlet light bordered">
                    <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> CREATE PERMASALAHAN</span>
                            </div>
                            <div class="tools"><button type="button" name="back" class="btn btn-secondary-outline">
                                    <i class="fa fa-angle-left"></i> Back</button>
                                <button type="submit" name="btn_save" class="btn btn-success">
                                    <i class="fa fa-check"></i> Save</button></div>
                            
                        </div>
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
                                        <label for="cuser" class="col-md-2 control-label">Penanggung jawab (All)<input type="checkbox" name="chk_pic" value="1" id="chk_pic" {{ old('chk_pic') == '1' ? 'checked' : '' }} /></label></label>
                                        <div class="col-md-10">
                                            <select id="r_pic" class="form-control select2-multiple" name="r_pic[]"
                                                multiple>
                                                @foreach ($departemen as $departemen)
                                        <option value="{{ $departemen->id }}">{{ $departemen->departemen }}</option> 
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
                                        <label class="col-md-2 control-label">Tambah Grafik ?<input type="checkbox" name="chk_grafik" value="1" id="chk_grafik" {{ old('chk_grafik') == '1' ? 'checked' : '' }} /></label></label>
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
                                    <i class="fa fa-warning fa-lg"></i> <b>RENCANA PENYELESAIAN</b>
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
                                            <textarea class="form-control summernote" name="tindak"
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
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-10">
                                            {{-- <input type="checkbox" id="status" name="status" class="make-switch" checked data-on-text="Open"
                                                    checked data-off-text="Close"> --}}
                                            <input type="checkbox" name="status" class="make-switch" value="1"
                                                {{ old('status') ? 'checked="checked"' : '' }} checked
                                                data-on-text="Open" checked data-off-text="Close" />
                                        </div>
                                    </div>
                                    {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
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
                        $("#uraian").summernote(
                            {height:200}
                        )
                        $("#analisis").summernote(
                            {height:300}
                        )
                        $("#r_uraian").summernote(
                            {height:300}
                        )
                        $("#r_target").summernote(
                            {height:300}
                        )
                        $("#tindak").summernote(
                            {height:300}
                        )
                        $("#p_rencana").summernote(
                            {height:300}
                        )
                        $("#p_realisasi").summernote(
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

                $('#r_pic').select2({placeholder: "Pilih PIC ...",allowClear: true});
                
                // $('#r_pic').select2({
                //     placeholder: "Pilih PIC ...",
                //     minimumInputLength: 2,
                //     // maximumInputLength : 0,
                //     // openOnEnter: true,
                //     allowClear: true,
                //     ajax: {
                //         url: '/loadDepartemen',
                //         dataType: 'json',
                //         delay: 250,
                        
                //         data: function (params) {
                //             return {
                //                 q: $.trim(params.term)
                //             };
                //         },
                
                //         processResults: function (data) {
                //             return {
                //             results: data
                //             };
                //         },
                //             cache: true
                //     }
                // });

    $('#chk_pic').click(function(){
        // alert("button click");
        if($('#chk_pic').is(':checked')){ //select all
            $('#r_pic').find('option').prop('selected',true);
            $('#r_pic').trigger('change');
        } else { //deselect all
            $('#r_pic').find('option').prop('selected',false);
            $('#r_pic').trigger('change');
        }
    });          
            
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
            // html += '<td><input type="hidden" name="uraian_id[]" class="form-control" /></td>';
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