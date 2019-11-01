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
    <div class="breadcrumbs">
        <h1>Rincian Kegiatan</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Anggaran Kegiatan</a></li>
            <li class="active">Rincian Kegiatan</li>
        </ol>
    </div>
    <div class="col-md-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered ">
            <div class="portlet-body">
                <table class="table table-striped table-hover font-sm">
                    <tbody>
                        <tr>
                            <th width="200">Urusan Pemerintahan</th>
                            <th width="5">:</th>
                            <td>1.03 Pekerjaan Umum dan Penataan Ruang</td>
                        </tr>
                        <tr>
                            <th>Organisasi</th>
                            <th>:</th>
                            <td>10301501&nbsp;SUKU DINAS BINA MARGA KOTA - JAKTIM</td>
                        </tr>
                        <tr>
                            <th>Program</th>
                            <th>:</th>
                            <td>1.03.05&nbsp;Program Rehabilitasi/Pemeliharaan Jalan dan Jembatan</td>
                        </tr>
                        <tr>
                            <th>Kegiatan</th>
                            <th>:</th>
                            <td>1.03.05.002&nbsp;Pemeliharaan jalan lingkungan dan orang di Kota Administrasi Jakarta
                                Timur</td>
                        </tr>
                        <tr>
                            <th>Pagu Kegiatan</th>
                            <th>:</th>
                            <td>Rp. 70,000,171,650</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <a href="https://apbd.jakarta.go.id/main/pub/2019/8/3/giat/list?cd=dW5pdD0xMDMwMTUwMQ=="
                        class="btn green">Kembali</a>
                    <a href="https://apbd.jakarta.go.id/main/pub/2019/8/3/giat/detil?cd=dW5pdD0xMDMwMTUwMSZpZGdpYXQ9NjEzMA=="
                        class="btn blue-hoki">Buka Detil</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="row">
                    <div class="fixed-table-container complex">
                        <div class="header-background"></div>
                        <div class="fixed-table-container-inner">
                            <table class="table table-striped table-hover font-sm" id="table_komponen">
                                <thead>
                                    <tr class="complex-top">
                                        <th class="first" colspan="7">
                                            <div class="th-inner" style="padding-left:200px">Semula</div>
                                        </th>
                                        <th class="first" colspan="7">
                                            <div class="th-inner" style="padding-left:200px">Menjadi</div>
                                        </th>
                                    </tr>
                                    <tr class="complex-bottom">
                                        <th width="200" class="first" colspan="2">
                                            <div class="th-inner">Komponen</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Satuan</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Koefisien</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Harga</div>
                                        </th>
                                        <th width="80" class="second">
                                            <div class="th-inner">PPN</div>
                                        </th>
                                        <th width="150" class="second">
                                            <div class="th-inner">Total</div>
                                        </th>
                                        <th width="200" class="first" colspan="2">
                                            <div class="th-inner">Komponen</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Satuan</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Koefisien</div>
                                        </th>
                                        <th width="100" class="second">
                                            <div class="th-inner">Harga</div>
                                        </th>
                                        <th width="80" class="second">
                                            <div class="th-inner">PPN</div>
                                        </th>
                                        <th width="150" class="second">
                                            <div class="th-inner">Total</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: TAHAP 2</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] Belanja
                                            Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>8939.36055090909 ton</td>
                                        <td class="text-right">1,650,000</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">14,749,944,909</td>
                                    </tr>
                                    <tr id="tr_392421">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>14,749,944,909</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>14,749,944,909</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total TAHAP 2 :</strong>
                                        </td>
                                        <td align="right"><strong>14,749,944,909</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: TAHAP 2 (ZONA
                                                    I)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] Belanja Jasa
                                            Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>6 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">4,560,000</td>
                                        <td class="text-right">50,160,000</td>
                                    </tr>
                                    <tr id="tr_392472">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_392456">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>6 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">164,244</td>
                                        <td class="text-right">1,806,684</td>
                                    </tr>
                                    <tr id="tr_392481">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>2 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">2,730,000</td>
                                        <td class="text-right">30,030,000</td>
                                    </tr>
                                    <tr id="tr_392486">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total TAHAP 2 (ZONA I) :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: TAHAP 2 (ZONA
                                                    II)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] Belanja
                                            Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr id="tr_400285">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr id="tr_400281">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] Belanja Jasa
                                            Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>6 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">4,560,000</td>
                                        <td class="text-right">50,160,000</td>
                                    </tr>
                                    <tr id="tr_400313">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_400296">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>6 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">164,244</td>
                                        <td class="text-right">1,806,684</td>
                                    </tr>
                                    <tr id="tr_400293">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>2 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">2,730,000</td>
                                        <td class="text-right">30,030,000</td>
                                    </tr>
                                    <tr id="tr_400306">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total TAHAP 2 (ZONA II) :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: TAHAP 2 (ZONA
                                                    III)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] Belanja Jasa
                                            Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>6 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">4,560,000</td>
                                        <td class="text-right">50,160,000</td>
                                    </tr>
                                    <tr id="tr_400322">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_400336">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>6 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">164,244</td>
                                        <td class="text-right">1,806,684</td>
                                    </tr>
                                    <tr id="tr_400327">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td></td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>2 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">2,730,000</td>
                                        <td class="text-right">30,030,000</td>
                                    </tr>
                                    <tr id="tr_400320">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>0</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total :</strong>
                                        </td>
                                        <td align="right"><strong>0</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total TAHAP 2 (ZONA III) :</strong>
                                        </td>
                                        <td align="right"><strong>83,351,697</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: Zona 1 (Kecamatan Cakung
                                                    &amp; Duren Sawit)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>9000 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">1,166,517,000</td>
                                        <td class="text-right">12,831,687,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>11955.6957852853 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">1,549,613,598</td>
                                        <td class="text-right">17,045,749,576</td>
                                    </tr>
                                    <tr id="tr_1">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>12,831,687,000</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>17,045,749,576</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>
                                    </tr>
                                    <tr id="tr_6">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>

                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>
                                    </tr>
                                    <tr id="tr_8">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>
                                    </tr>
                                    <tr id="tr_7">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>
                                    </tr>
                                    <tr id="tr_2">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_3">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>
                                    </tr>
                                    <tr id="tr_4">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>
                                    </tr>
                                    <tr id="tr_5">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>13,108,680,420</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>17,322,742,996</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 1 (Kecamatan Cakung &amp; Duren Sawit) :</strong>
                                        </td>
                                        <td align="right"><strong>13,108,680,420</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 1 (Kecamatan Cakung &amp; Duren Sawit) :</strong>
                                        </td>
                                        <td align="right"><strong>17,322,742,996</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: Zona 2 (Kecamatan Kramat
                                                    Jati &amp; Pulogadung)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>7182.27837485437 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">930,916,647</td>
                                        <td class="text-right">10,240,083,117</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>9151.42490617173 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">1,186,143,636</td>
                                        <td class="text-right">13,047,580,000</td>
                                    </tr>
                                    <tr id="tr_9">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>10,240,083,117</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>13,047,580,000</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>
                                    </tr>
                                    <tr id="tr_14">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>

                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>
                                    </tr>
                                    <tr id="tr_16">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>
                                    </tr>
                                    <tr id="tr_15">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>
                                    </tr>
                                    <tr id="tr_10">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_11">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>
                                    </tr>
                                    <tr id="tr_12">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>
                                    </tr>
                                    <tr id="tr_13">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>10,517,076,537</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>13,324,573,420</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 2 (Kecamatan Kramat Jati &amp; Pulogadung) :</strong>
                                        </td>
                                        <td align="right"><strong>10,517,076,537</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 2 (Kecamatan Kramat Jati &amp; Pulogadung) :</strong>
                                        </td>
                                        <td align="right"><strong>13,324,573,420</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: Zona 3 (Kecamatan
                                                    Jatinegara &amp; Matraman)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; <span
                                                class="label label-danger">Perubahan</span> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>5596.29654082118 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">725,352,784</td>
                                        <td class="text-right">7,978,880,619</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>1141.21549255371 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">147,916,364</td>
                                        <td class="text-right">1,627,080,000</td>
                                    </tr>
                                    <tr id="tr_17">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>7,978,880,619</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>1,627,080,000</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>
                                    </tr>
                                    <tr id="tr_22">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>

                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>
                                    </tr>
                                    <tr id="tr_24">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>
                                    </tr>
                                    <tr id="tr_23">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>9 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">6,840,000</td>
                                        <td class="text-right">75,240,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>9 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">6,840,000</td>
                                        <td class="text-right">75,240,000</td>
                                    </tr>
                                    <tr id="tr_18">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_19">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>9 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">246,366</td>
                                        <td class="text-right">2,710,026</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>9 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">246,366</td>
                                        <td class="text-right">2,710,026</td>
                                    </tr>
                                    <tr id="tr_20">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>3 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">4,095,000</td>
                                        <td class="text-right">45,045,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>3 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">4,095,000</td>
                                        <td class="text-right">45,045,000</td>
                                    </tr>
                                    <tr id="tr_21">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>124,350,039</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>124,350,039</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>8,179,629,013</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>1,827,828,394</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 3 (Kecamatan Jatinegara &amp; Matraman) :</strong>
                                        </td>
                                        <td align="right"><strong>8,179,629,013</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 3 (Kecamatan Jatinegara &amp; Matraman) :</strong>
                                        </td>
                                        <td align="right"><strong>1,827,828,394</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: Zona 4 (Kecamatan Pasar
                                                    Rebo &amp; Ciracas)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>7672 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">994,390,936</td>
                                        <td class="text-right">10,938,300,296</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>8423.804290114 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">1,091,834,545</td>
                                        <td class="text-right">12,010,180,000</td>
                                    </tr>
                                    <tr id="tr_25">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>10,938,300,296</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>12,010,180,000</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>
                                    </tr>
                                    <tr id="tr_30">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>

                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>
                                    </tr>
                                    <tr id="tr_32">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>
                                    </tr>
                                    <tr id="tr_31">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>
                                    </tr>
                                    <tr id="tr_26">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_27">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>
                                    </tr>
                                    <tr id="tr_28">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>
                                    </tr>
                                    <tr id="tr_29">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>11,215,293,716</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>12,287,173,420</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 4 (Kecamatan Pasar Rebo &amp; Ciracas) :</strong>
                                        </td>
                                        <td align="right"><strong>11,215,293,716</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 4 (Kecamatan Pasar Rebo &amp; Ciracas) :</strong>
                                        </td>
                                        <td align="right"><strong>12,287,173,420</strong></td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="14">
                                            <span class="text-bold font-blue-dark"><strong>:: Zona 5 (Kecamatan Cipayung
                                                    &amp; Makasar)</strong></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.20.01.008
                                            Belanja Pemeliharaan Jalan Lingkungan</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>AC-WC dengan Tack Coat Pengelaran
                                                    Manual</strong></span> &nbsp; <span
                                                class="label label-danger">Perubahan</span> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>8208 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">1,063,863,504</td>
                                        <td class="text-right">11,702,498,544</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Ton</td>
                                        <td>6986.43444155083 ton</td>
                                        <td class="text-right">1,296,130</td>
                                        <td class="text-right">905,532,727</td>
                                        <td class="text-right">9,960,860,000</td>
                                    </tr>
                                    <tr id="tr_33">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Harga Termasuk PPN</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>11,702,498,544</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Pemeliharaan Jalan
                                                Lingkungan :</strong></td>
                                        <td class="text-right text-bold"><strong>9,960,860,000</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.02
                                            Belanja Jasa Konsultansi Perencanaan (Planning)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Cad/ Cam Operator</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>1.5 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">1,140,000</td>
                                        <td class="text-right">12,540,000</td>
                                    </tr>
                                    <tr id="tr_38">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (5-10 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>

                                        <td colspan="7"><span><strong>Laporan Teknis/ Khusus</strong></span> &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">684,350</td>
                                        <td class="text-right">205,305</td>
                                        <td class="text-right">2,258,355</td>
                                    </tr>
                                    <tr id="tr_40">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Surveyor</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>8 orang bulan</td>
                                        <td class="text-right">7,000,000</td>
                                        <td class="text-right">5,600,000</td>
                                        <td class="text-right">61,600,000</td>
                                    </tr>
                                    <tr id="tr_39">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Perencanaan (Planning) :</strong></td>
                                        <td class="text-right text-bold"><strong>76,398,355</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)
                                        </td>
                                        <td colspan="7" class="font-blue bold">[BELANJA BARANG DAN JASA] 5.2.2.21.04
                                            Belanja Jasa Konsultansi Pengawasan (Supervision)</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Inspector</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>16 orang bulan</td>
                                        <td class="text-right">7,600,000</td>
                                        <td class="text-right">12,160,000</td>
                                        <td class="text-right">133,760,000</td>
                                    </tr>
                                    <tr id="tr_34">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : D3/S0 (&gt;3 Tahun)</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Akhir</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>3 Buku</td>
                                        <td class="text-right">410,610</td>
                                        <td class="text-right">123,183</td>
                                        <td class="text-right">1,355,013</td>
                                    </tr>
                                    <tr id="tr_35">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Perencanaan/ Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>

                                        <td colspan="7"><span><strong>Laporan Bulanan</strong></span> &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>Buku</td>
                                        <td>18 Buku</td>
                                        <td class="text-right">273,740</td>
                                        <td class="text-right">492,732</td>
                                        <td class="text-right">5,420,052</td>
                                    </tr>
                                    <tr id="tr_36">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : Pengawasan</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>

                                        <td colspan="7"><span><strong>Tenaga Ahli Pratama Golongan I-C</strong></span>
                                            &nbsp; </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>

                                        <td colspan="2" width="100px">&nbsp;</td>
                                        <td>O.B</td>
                                        <td>4 orang bulan</td>
                                        <td class="text-right">13,650,000</td>
                                        <td class="text-right">5,460,000</td>
                                        <td class="text-right">60,060,000</td>
                                    </tr>
                                    <tr id="tr_37">
                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td colspan="7">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <span><u>Spesifikasi</u> : S1 Pengalaman 3 Tahun</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                        <td colspan="6" class="text-right"><strong>Total Belanja Jasa Konsultansi
                                                Pengawasan (Supervision) :</strong></td>
                                        <td class="text-right text-bold"><strong>200,595,065</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>11,979,491,964</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>::: Total :</strong>
                                        </td>
                                        <td align="right"><strong>10,237,853,420</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 5 (Kecamatan Cipayung &amp; Makasar) :</strong>
                                        </td>
                                        <td align="right"><strong>11,979,491,964</strong></td>
                                        <td colspan="6" class="text-right">
                                            <strong>:: Total Zona 5 (Kecamatan Cipayung &amp; Makasar) :</strong>
                                        </td>
                                        <td align="right"><strong>10,237,853,420</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="6" class="text-right"><strong>Grand Total :</strong></td>
                                        <td class="text-right"><strong>Rp. 55,000,171,650</strong></td>
                                        <td colspan="6" class="text-right"><strong>Grand Total :</strong></td>
                                        <td class="text-right"><strong>Rp. 70,000,171,650</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
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