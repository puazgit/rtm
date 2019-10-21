@extends('layouts/wrapper')

@section('css')
@endsection

@section('content')
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp sbold">Bootstrap Modal Demos</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tr>
                                            <td> Basic Example </td>
                                            <td>
                                                <a class="btn red btn-outline sbold" data-toggle="modal" href="#basic"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Draggable Modal Example </td>
                                            <td>
                                                <a class="btn green btn-outline sbold" data-toggle="modal" href="#draggable"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Large Width Example </td>
                                            <td>
                                                <a class="btn purple btn-outline sbold" data-toggle="modal" href="#large"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Small Width Example </td>
                                            <td>
                                                <a class="btn blue btn-outline sbold" data-toggle="modal" href="#small"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Full Width Example </td>
                                            <td>
                                                <a class="btn dark btn-outline sbold" data-toggle="modal" href="#full"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Responsive </td>
                                            <td>
                                                <a class="btn red btn-outline sbold" data-toggle="modal" href="#responsive"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> AJAX content loading </td>
                                            <td>
                                                <a class=" btn yellow btn-outline sbold" href="ui_modals_ajax_sample.html" data-target="#ajax" data-toggle="modal"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Stackable </td>
                                            <td>
                                                <a class=" btn green btn-outline sbold" data-target="#stack1" data-toggle="modal"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Static Background </td>
                                            <td>
                                                <a class=" btn purple btn-outline sbold" data-toggle="modal" href="#static"> View Demo </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Long Modals </td>
                                            <td>
                                                <a class=" btn dark btn-outline sbold" data-toggle="modal" href="#long"> View Demo </a>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div class="modal fade" id="full" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-full">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Responsive & Scrollable</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h4>Some Input</h4>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h4>Some More Input</h4>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                                <p>
                                                                    <input type="text" class="col-md-12 form-control"> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
                                    <div class="modal fade" id="ajax" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                                                    <span> &nbsp;&nbsp;Loading... </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                    <div id="stack1" class="modal fade" tabindex="-1" data-width="400">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Stack One</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>Some Input</h4>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                        </div>
                                                    </div>
                                                    <a class="btn green" data-toggle="modal" href="#stack2"> Launch modal </a>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    <button type="button" class="btn red">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="stack2" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Stack Two</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>Some Input</h4>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                            <p>
                                                                <input type="text" class="col-md-12 form-control"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                    <button type="button" class="btn yellow">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Confirmation</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p> Would you like to continue with some arbitrary task? </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                                                    <button type="button" data-dismiss="modal" class="btn green">Continue Task</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">A Fairly Long Modal</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img style="height: 800px" alt="" src="http://i.imgur.com/KwPYo.jpg"> </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Start Dragging Here</h4>
                                                </div>
                                                <div class="modal-body"> Modal body goes here </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
@endsection

@section('js')
<script src="{{asset ('assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/ui-modals.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
@endsection