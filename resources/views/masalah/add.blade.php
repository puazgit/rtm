@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<h3 class="page-title"> Nestable List
    <small>Drag & drop hierarchical list with mouse and touch compatibility</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="portlet light bordered">
    <div class="portlet-body ">
        <div class="row">
            <div class="col-md-12">
                <h3>Serialised Output (per list)</h3>
                <textarea id="nestable_list_1_output" class="form-control col-md-12 margin-bottom-10"></textarea>
            </div>
        </div>
    </div>
</div>
<!-- XXX -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-purple"></i>
                    <span class="caption-subject font-purple sbold uppercase">Nestable List 3</span>
                </div>
                <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="dd" id="nestable_list_1">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="1">
                            <div class="dd-handle dd3-handle"> </div>
                            <div class="dd3-content"> Perubahan isu – isu internal dan eksternal </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="2">
                            <div class="dd-handle dd3-handle"> </div>
                            <div class="dd3-content"> Item 14 </div>
                        </li>
                        <li class="dd-item dd3-item" data-id="15">
                            <div class="dd-handle dd3-handle"> </div>
                            <div class="dd3-content"> Item 15 </div>
                            <ol class="dd-list">
                                <li class="dd-item dd3-item" data-id="16">
                                    <div class="dd-handle dd3-handle"> </div>
                                    <div class="dd3-content"> Item 16 </div>
                                </li>
                                <li class="dd-item dd3-item" data-id="17">
                                    <div class="dd-handle dd3-handle"> </div>
                                    <div class="dd3-content"> Item 17 </div>
                                </li>
                                <li class="dd-item dd3-item" data-id="18">
                                    <div class="dd-handle dd3-handle"> </div>
                                    <div class="dd3-content"> Item 18 </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset ('assets/js/jquery.nestable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/ui-nestable.min.js')}}" type="text/javascript"></script>
<!-- END: Page Vendor JS-->
@endsection