@extends('layouts/wrapper')

@section('css')
<link href="{{asset ('assets/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset ('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<h3 class="page-title">
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-4">
            <select id="srtm" class="form-control select2" name="srtm">
                <option value=""></option>
                @foreach (App\Rtm::get() as $rtm)
                <option value="{{ $rtm->id }}">{{ $rtm->rtm_ke }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="portlet light bordered">
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table1">
                    <thead>
                        <tr>
                            <th>Uraian</th>
                            <th>Analisis</th>
                            <th>Status</th>
                            <th>RTM Ke</th>
                            <th>Departemen</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset ('assets/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset ('assets/js/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
@endsection

@section('script')
<script>
    $(function() {
    $('#srtm').select2({placeholder: "--- Pilih Rtm ---",allowClear: true, width : '100%'});

    load_data();

    $('#srtm').change(function(){
        var	srtm = $(this).val();
        $('#table1').DataTable().destroy();
        load_data(srtm);
    })
    
function load_data(srtm)
{
    var	srtm = $('#srtm').val();

       $('#table1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:'{{ route("rtm.cek") }}',
                data:{srtm:srtm}
            },
            columns: [
            {data: 'uraian', name: 'uraian', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }
            },
            {data: 'analisis', name: 'analisis', render: function(data, column, row)
                        {
                            var decodedText = $("<p/>").html(data).text(); 
                            return ''+decodedText+''
                        }},
            {data: 'status', name: 'status'},
            {data: 'rtm', name: 'rtm.rtm_ke'},
            {data: 'departemen', name: 'departemen.departemen'}
            ],
        });
    }
    });
</script>
@endsection