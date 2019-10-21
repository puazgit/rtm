@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<h3 class="page-title">
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    {{-- @php
    $alldepartemen=$alldepartemen->id;
    $alldepartemen=explode(",",$alldepartemen);
    @endphp --}}

    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="{{route ('masalah.index')}}/{{$bahan->id}}"
            method="POST" spellcheck="false">
            @csrf
            @method('PATCH')
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">EDIT PERMASALAHAN</span>
                    </div>
                    <div class="actions">
                        <button type="submit" id="btn_save" class="btn btn-circle green">Update</button>
                        <button type="button" onclick="history.back()"
                            class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                    </div>
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
                                <a href="#tab_1" data-toggle="tab"> URAIAN PERMASALAHAN </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab"> RENCANA PENYELESAIAN</a>
                            </li>
                            <li>
                                <a href="#tab_3" data-toggle="tab"> EVALUASI PROGRES TINDAKLANJUT </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div @role('unit') id="noEdit" @endrole class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-10">
                                            <input @role('unit') readonly @endrole type="checkbox"
                                                {{ $bahan->status == 0 ? '' : ' checked=checked' }} id="status"
                                                name="status" class="make-switch" value="{{$bahan->status}}"
                                                data-on-text="Open" data-off-text="Close">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cuser" class="col-md-2 control-label">Penanggung jawab (All)<input
                                                @role('unit') disabled @endrole type="checkbox" name="chk_pic" value="1"
                                                id="chk_pic" checked /></label></label>
                                        {{-- <div class="col-md-10">
                                            <select @role('unit') readonly @endrole id="r_pic"
                                                class="form-control select2-multiple" name="r_pic[]" multiple>
                                                @foreach ($alldepartemen as $alldepartemen)
                                                @if(in_array($dept_id, $alldepartemen))
                                                <option value="{{ $alldepartemen->id }}" selected \>
                                        {{ $alldepartemen->departemen }}
                                        </option>
                                        @else
                                        <option value="{{ $alldepartemen->id }}" \>
                                            {{ $alldepartemen->departemen }}
                                        </option>
                                        @endif
                                        @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="col-md-10">
                                        <select id="sdepartemen" class="form-control select2-multiple"
                                            name="sdepartemen[]" multiple>
                                            @foreach ($bahan->departemen as $item)
                                            <option value="{{ $item->id }}" selected />
                                            {{ $item->departemen }}
                                            </option>
                                            @endforeach
                                            @foreach ($alldepartemen as $alldepartemen)
                                            <option value="{{ $alldepartemen->id }}" />
                                            {{ $alldepartemen->departemen }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Uraian Permasalahan</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="uraian"
                                            id="uraian">{{ old('uraian') ?? $bahan->uraian }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Analisis / Penyebab</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="analisis"
                                            id="analisis">{{ old('analisis') ?? $bahan->analisis }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="alert alert-success margin-bottom-10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <i class="fa fa-warning fa-lg"></i> <b>RENCANA PENYELESAIAN</b>
                            </div>
                            <div @role('unit') id="noEdit" @endrole class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Uraian</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="r_uraian"
                                            id="r_uraian">{{ old('r_uraian') ?? $bahan->r_uraian }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Target Waktu</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="r_target"
                                            id="r_target">{{ old('r_target') ?? $bahan->r_target }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_3">
                            <div class="alert alert-success margin-bottom-10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <i class="fa fa-warning fa-lg"></i> <b>EVALUASI PROGRES TINDAKLANJUT</b>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tambah Grafik ?</br>jika ada<input type="checkbox"
                                        name="chk_grafik" value="1" id="chk_grafik"
                                        {{ count($bahan->progres) > 0 ? ' checked' : ''}} /></label>
                                <div class="col-md-10">
                                    <div class="portlet light bordered">
                                        <div class="portlet-body">
                                            <div class="table-scrollable">
                                                <table class="table table-hover" id="user_table">
                                                    <thead>
                                                        <tr>
                                                            <th> Target </th>
                                                            <th> Realisasi </th>
                                                            <th> Competitor </th>
                                                            <th style="width:100px"> Tahun </th>
                                                            <th> Aksi </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyprogres1">
                                                        @foreach($bahan->progres as $progres)
                                                        <tr>
                                                            <td><input type="text" disabled name="target[]"
                                                                    class="form-control" value="{{$progres->target}}" />
                                                            </td>
                                                            <td><input type="text" disabled name="realisasi[]"
                                                                    class="form-control"
                                                                    value="{{$progres->realisasi}}" /></td>
                                                            <td><input type="text" disabled name="competitor[]"
                                                                    class="form-control"
                                                                    value="{{$progres->competitor}}" /></td>
                                                            <td><select name="year[]" disabled class="form-control">
                                                                    <option>{{$progres->year}}</option>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    <tbody id="bodyprogres">
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tindak Lanjut</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="tindak"
                                            id="tindak">{{ old('tindak') ?? $bahan->tindak }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Rencana Penyelesaian</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="p_rencana"
                                            id="p_rencana">{{ old('p_rencana') ?? $bahan->p_rencana }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Realisasi Penyelesaian</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control summernote" name="p_realisasi"
                                            id="p_realisasi">{{ old('p_realisasi') ?? $bahan->p_realisasi }} </textarea>
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

                $('#sdepartemen').select2({placeholder: "Pilih PIC ...",allowClear: true});
                

    $('#chk_pic').click(function(){
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