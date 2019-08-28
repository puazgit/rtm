@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <i class="icon-docs"></i>Tambah Data</div>
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
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Uraian Permasalahan</label>
                                            <div class="col-md-10">
                                                <select id="single" class="form-control select2">
                                                    <option></option>
                                                    <optgroup label="Alaskan">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI" disabled="disabled">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Analisis / Penyebab</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_2"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <div class="alert alert-success margin-bottom-10">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true"></button>
                                        <i class="fa fa-warning fa-lg"></i> <b>PENYELESAIAN</b>
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Uraian</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_3"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Target Waktu</label>
                                            <div class="col-md-10">
                                                <div name="summernote" id="summernote_4"> </div>
                                            </div>
                                        </div>
                                        <label class="col-md-2 control-label">PIC :
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="" placeholder=""> </div>
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
<script src="{{asset ('assets/js/select2.full.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
<script>
    var ComponentsEditors=function()
    {
        var s=function(){
            $("#summernote_2").summernote(
                {height:300}
            )
            $("#summernote_3").summernote(
                {height:300}
            )
            $("#summernote_4").summernote(
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

    var ComponentsSelect2=function(){
    var e=function(){
        function e(e){
            if(e.loading)return e.text;
            var t="<div class='select2-result-repository clearfix'><div class='select2-result-repository__avatar'><img src='"+e.owner.avatar_url+"' /></div><div class='select2-result-repository__meta'><div class='select2-result-repository__title'>"+e.full_name+"</div>";
            return e.description&&(t+="<div class='select2-result-repository__description'>"+e.description+"</div>"),
            t+="<div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> "+e.forks_count+" Forks</div><div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> "+e.stargazers_count+" Stars</div><div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> "+e.watchers_count+" Watchers</div></div></div></div>"}
            
            function t(e){
                return e.full_name||e.text}$.fn.select2.defaults.set("theme","bootstrap");
                var s="Select a State";
                $(".select2, .select2-multiple").select2({
                    placeholder:s,
                    width:null
                }),
                
            $(".select2-allow-clear").select2({
                allowClear:!0,
                placeholder:s,
                width:null
            }),
            
            $(".js-data-example-ajax").select2({
                width:"off",
                ajax:{
                    url:"https://api.github.com/search/repositories",
                    dataType:"json",
                    delay:250,
                    data:function(e){
                        return{
                            q:e.term,page:e.page
                        }},
                        processResults:function(e,t){
                            return{results:e.items}
                        },
                        cache:!0},
                        escapeMarkup:function(e){
                            return e
                        },
                        
                        minimumInputLength:1,
                        templateResult:e,
                        templateSelection:t
            }),
            $("button[data-select2-open]").click(
                function(){
                    $("#"+$(this).data("select2-open")).select2("open")}),
                    $(":checkbox").on("click",function(){
                        $(this)
                        .parent()
                        .nextAll("select")
                        .prop("disabled",!this.checked)
                    }),
                
                $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open",function(){
                    if($(this).parents("[class*='has-']").length)
                    for(
                        var e=$(this).parents("[class*='has-']")[0].className.split(/\s+/),
                        t=0;t<e.length;++t)e[t].match("has-")&&
                        $("body > .select2-container").addClass(e[t])
                }),
                
                $(".js-btn-set-scaling-classes").on("click",function(){
                    $("#select2-multiple-input-sm, #select2-single-input-sm")
                    .next(".select2-container--bootstrap")
                    .addClass("input-sm"),
                    
                    $("#select2-multiple-input-lg, #select2-single-input-lg")
                    .next(".select2-container--bootstrap")
                    .addClass("input-lg"),
                    
                    $(this).removeClass("btn-primary btn-outline").prop("disabled",!0)
                })};
                
                return{
                    init:function(){
                        e()
                    }
                }
}();

App.isAngularJsApp()===!1&&jQuery(document).ready(function(){
    ComponentsSelect2.init()
});

</script>
@endsection