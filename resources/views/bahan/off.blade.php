<div class="m-portlet__body">
    <div class="form-group m-form__group row" style="padding-top: 5px; padding-bottom: 0px;">
        @role('admin')
        <div class="col-lg-4">
            <select id="sdept3" class="form-control select2" name="sdept3">
                <option value=""></option>
                @foreach (App\Departemen::get() as $departemen2)

                <option value="{{ $departemen2->id }}">{{ $departemen2->departemen }}
                </option>
                @endforeach
            </select>
        </div>
        @endrole
        <div class="col-lg-4">
            <select id="srtm3" class="form-control select2" name="srtm3">
                <option value=""></option>
                @foreach (App\Rtm::get() as $rtm)
                <option value="{{ $rtm->id }}">{{ $rtm->rtm_ke }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">BAHAN YANG TIDAK DISETUJUI
            </span>
        </div>
        <div class="tools">
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="table-bahan3">
            <thead>
                <tr>
                    <th rowspan="2">Uraian Permasalahan Bidang</th>
                    <th rowspan="2">Analisis /Penyebab</th>
                    <th colspan="3" style="text-align: center;">Rencana Penyelesaian</th>
                    <th rowspan="2">Tindaklanjut</th>
                    <th colspan="2" style="text-align: center;">Rencana Penyelesaian</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">RTM Ke</th>
                    <th rowspan="2" style="text-align: center;">Aksi</th>
                </tr>
                <tr>
                    <th>Uraian</th>
                    <th>Target Waktu</th>
                    <th>Penanggung Jawab (PIC)</th>
                    <th>Rencana</th>
                    <th>Realisasi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>