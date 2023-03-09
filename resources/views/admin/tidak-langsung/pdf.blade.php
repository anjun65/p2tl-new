<!DOCTYPE html>
<html>

<head>
    <title>BA Pemeriksaan Tidak Langsung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .judul {
            font-size: 14px !important;
            border: 1px solid black !important;
        }

        .header {
            border: 1px solid black !important;
            border-spacing: 0px;
            border-collapse: collapse !important;
        }

        .isi {
            padding: 1rem !important
        }


        .page-break {
            page-break-after: always;
            /* depreciating, use break-after */
            break-after: page;
            height: 0px;
            display: block !important;
        }

        table.table td,
        table.table th {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <table class="table table-borderless"
        style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center;"><img src="img/bright.png" class="w-auto"
                    style="height: 60px;padding-top:1rem;padding-bottom:1rem;"></td>
            <td colspan="10" class="text-center font-weight-bold judul p-2"
                style="border:1px solid black;vertical-align: bottom;">SERVICES BUSINESS UNIT<br />PT PELAYANA LISTRIK
                NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA HASIL
                PEMERIKSAAN<br />
                PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)<br />
                INSTALASI / SAMBUNGAN LISTRIK TIGA FASA <br />
                PENGUKURAN TIDAK LANGSUNG
            </td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-P2TL-SBU-01</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Revisi</td>
            <td colspan="4" class="header">00</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Tanggal</td>
            <td colspan="4" class="header">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Halaman</td>
            <td colspan="4" class="header">1 dari 3</td>
        </tr>

        <tr>
            <td colspan="2" class="header">No. BA</td>
            <td colspan="4" class="header">{{ sprintf('%05d', $item->id); }}</td>
        </tr>


        @php
        
        $day_name = ['Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'];
        
        
        $month_name = ['Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'];
        
        $tanggal = \Illuminate\Support\Carbon::parse($item->tanggal_serah_terima);
        $tanggal_pemeriksaan = \Illuminate\Support\Carbon::parse($item->tidak_langsung->hasil_pemeriksaan->tanggal_penyelesaian);
        
        $hari = $tanggal->dayOfWeek;
        $hari_pemeriksaan = $tanggal->dayOfWeek;
        $bulan = $tanggal->month;
        
        $indonesianDay = trans($day_name[$hari]);
        $indonesianMonth = trans($month_name[$bulan-1]);
        
        $indonesianDay_pemeriksaan = trans($day_name[$hari_pemeriksaan]);
        
        $now = \Illuminate\Support\Carbon::now()->locale('id');
        
        
        $tanggal_only = $tanggal->day;
        $tahun = $tanggal->year;
        
        @endphp
        
        
        <tr>
            <td colspan="12" class="px-3">
                Pada hari ini, {{ $indonesianDay }} Tanggal {{ $tanggal_only }} Bulan {{ $indonesianMonth }} Tahun {{
                $tahun }}, Kami yang bertanda tangan dibawah ini :
            </td>
        </tr>
        
        
        @php
        $users = \App\Models\User::where('regus_id', $item->regus_id)->get();
        @endphp
        
        @foreach ($users as $user)
        @php
        $i = 1;
        @endphp
        <tr>
            <td colspan="2">
                <div class="pl-5">Nama</div>
            </td>
            <td colspan="10">
                : {{ $user->name }}
            </td>
        </tr>
        
        <tr>
        
            <td colspan="2">
                <div class="pl-5">Nomor Induk</div>
            </td>
            <td colspan="10">
                : {{ $user->NIP ?? "-" }}
            </td>
        </tr>
        
        
        <tr>
        
            <td colspan="2">
                <div class="pl-5">Jabatan</div>
            </td>
            <td colspan="10">
                : {{ $user->jabatan ?? "-" }}
            </td>
        </tr>
        <br />
        @endforeach


        <tr>
            <td colspan="12" class="px-3">
                Masing-masing sebagai Petugas Pelaksana Lapangan P2TL, berdasarkan Surat Tugas Nomor : 
            </td>
        </tr>

        <tr>
            <td colspan="6" class="pl-3">
                Nomor : {{ str_pad($item->surat_tugas_p2tl, 5, '0', STR_PAD_LEFT); }}
            </td>
        
            <td colspan="6" class="pl-5">
                Tanggal : {{ $item->tanggal_surat_tugas_p2tl}}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Telah melaksanakan Pemeriksaan P2TL dengan cara pemeriksaan Instalasi dan peralatan APP pada Sambungan
                Tenaga Listrik Pelanggan pada bangunan atau persil dengan data sebagai berikut :
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="pl-5">- Nama</div>
            </td>
            <td colspan="10">
                : {{ $item->nama_pelanggan }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- Alamat Pelanggan</div>
            </td>
            <td colspan="10">
                : {{ $item->alamat }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- IDPEL</div>
            </td>
            <td colspan="10">
                : {{ $item->id_pelanggan }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- Tarif / Daya</div>
            </td>
            <td colspan="10">
                : {{ $item->tarif }} / {{ $item->daya }}
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                Dengan disaksikan oleh Pelanggan / Pemakai / Penghuni / Wakil Pelanggan :
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="pl-5">Nama</div>
            </td>
            <td colspan="10">
                : {{ $item->tidak_langsung->nama_saksi }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Alamat</div>
            </td>
            <td colspan="10">
                : {{ $item->tidak_langsung->alamat_saksi }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor KTP/SIM</div>
            </td>
            <td colspan="10">
                : {{ $item->tidak_langsung->nomor_identitas }}
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Pekerjaan</div>
            </td>
            <td colspan="10">
                : {{ $item->tidak_langsung->pekerjaan }}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor Telp./HP</div>
            </td>
            <td colspan="10">
                : {{ $item->tidak_langsung->no_telpon_saksi }}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Yang bertanggung jawab atas Bangunan/Persil yang diperiksa tersebut, dengan hasil pemeriksaan sebagai berikut:
            </td>
        </tr>

        <tr>
            <td colspan="3" class="px-3">
                <b>I. Tegangan tersambung</b>
            </td>

            <td colspan="2" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tegangan_tersambung == "380 Volt") checked="true" @endif> 380 Volt
            </td>

            <td colspan="2" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tegangan_tersambung == "20 kV") checked="true" @endif> 20 kV
            </td>

            <td colspan="2" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tegangan_tersambung == "150 kV") checked="true" @endif> 150 kV
            </td>

            <td colspan="3" >
            
            </td>
        </tr>


        <tr>
            <td colspan="3" class="px-3">
                <b>II. Jenis Pengukuran</b>
            </td>
        
            <td colspan="3" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_jenis_pengukuran == "Primer; Sekunder dengan CT") checked="true" @endif> Primer; Sekunder dengan CT
            </td>
        
            <td colspan="6" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_jenis_pengukuran == "Primer; Sekunder dengan CT dan PT") checked="true" @endif> Primer; Sekunder dengan CT dan PT
            </td>
        </tr>

        <tr>
            <td colspan="3" class="px-3">
                <b>III. Tempat Kedudukan APP</b>
            </td>
        
            <td colspan="3" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tempat_kedudukan == "Di dalam bangunan pelanggan") checked="true" @endif> Di dalam bangunan pelanggan
            </td>
        
            <td colspan="3" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tempat_kedudukan == "Di luar bangunan pelanggan") checked="true" @endif> Di luar bangunan pelanggan
            </td>
            <td colspan="3" >
                <input type="checkbox" @if ($item->tidak_langsung->data_app->data_tempat_kedudukan == "Di Gardu") checked="true" @endif> Di Gardu
            </td>
        </tr>
        <tr>
            <td colspan="12" class="px-3" style="border-top:1px solid black">
                <b>IV. DATA APP : </b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-1">
                <table class="table table-borderless"
                    style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-1">
                            <b>1. Alat Pembatas</b>
                        </td>
                    
                        <td colspan="5" class="pl-1" style="border-left: 1px solid black">
                            <b>4. Trafo Tegangan (PT)</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-3">
                            Jenis :  {{ $item->tidak_langsung->data_app->no_seri }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Merk/Type : {{ $item->tidak_langsung->data_app->merk }}
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="7" class="pl-3">
                            Merk/Type : {{ $item->tidak_langsung->data_app->no_seri }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Kls | Rasio | Burden : {{ $item->tidak_langsung->data_app->ct_cls }} | {{ $item->tidak_langsung->data_app->ct_rasio }} | {{ $item->tidak_langsung->data_app->ct_burden }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-3">
                            Rating Arus (ln) : {{ $item->tidak_langsung->data_app->rating_arus }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-1" style="border-top:1px solid black;border-left: 1px solid black">
                            <b>2. kWh Meter</b>
                        </td>
                    
                        <td colspan="5" class="pl-1" style="border-top:1px solid black;border-left: 1px solid black">
                            <b>5. Kubikel</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            Merk/type : {{ $item->tidak_langsung->data_app->kwh_merk }} 
                        </td>
                        
                        <td colspan="3" class="pl-3">
                            Rating Arus(ln) : {{ $item->tidak_langsung->data_app->kwh_arus }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Merk/type : {{ $item->tidak_langsung->data_app->kubikel_merk }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            No. Register : {{ $item->tidak_langsung->data_app->kwh_no_reg }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Tegangan : {{ $item->tidak_langsung->data_app->kwh_tegangan }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Type : {{ $item->tidak_langsung->data_app->kubikel_type }}
                        </td>
                    </tr>


                    <tr>
                        <td colspan="4" class="pl-3">
                            No. Seri : {{ $item->tidak_langsung->data_app->kwh_no_seri }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Stand Mtr LBP : {{ $item->tidak_langsung->data_app->kwh_stand_mtr_lbp }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            No. Seri : {{ $item->tidak_langsung->data_app->kubikel_no_seri }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            Tahun Buat : {{ $item->tidak_langsung->data_app->kwh_tahun_buat }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Stand Mtr LBP : {{ $item->tidak_langsung->data_app->kwh_stand_mtr_bp }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Tahun Pembuatan : {{ $item->tidak_langsung->data_app->kubikel_tahun }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            Konstanta : {{ $item->tidak_langsung->data_app->kwh_konstanta }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Stand kWhTotal : {{ $item->tidak_langsung->data_app->kwh_stand_total }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            Class Akurasi : {{ $item->tidak_langsung->data_app->kwh_class }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Stand Mtr kVArh : {{ $item->tidak_langsung->data_app->kwh_stand_kvarh }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-top:1px solid black;border-left: 1px solid black">
                            <b>6. Box APP Tegangan Rendah</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="pl-3">
                            Konstanta : {{ $item->tidak_langsung->data_app->kwh_konstanta }}
                        </td>
                    
                        <td colspan="3" class="pl-3">
                            Stand kWhTotal : {{ $item->tidak_langsung->data_app->kwh_stand_total }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Merk : {{ $item->tidak_langsung->data_app->box_app_merk }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-3" style="border-top:1px solid black;">
                            <b>3. Trafo Arus (CT)</b>
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Type : {{ $item->tidak_langsung->data_app->box_app_type }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7" class="pl-3" >
                            Merk/Type : {{ $item->tidak_langsung->data_app->ct_merk }}
                        </td>
                    

                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            No. Seri : {{ $item->tidak_langsung->data_app->box_app_no_seri }}
                        </td>
                    </tr>
                    

                    <tr>
                        <td colspan="7" class="pl-3" >
                                Kls | Rasio | Burden : {{ $item->tidak_langsung->data_app->pt_cls }} | {{ $item->tidak_langsung->data_app->pt_rasio
                                }} | {{ $item->tidak_langsung->data_app->pt_burden }}
                        </td>
                    
                        <td colspan="5" class="pl-3" style="border-left: 1px solid black">
                            Tahun Pembuatan : {{ $item->tidak_langsung->data_app->box_app_tahun }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="2">Jenis : <input type="checkbox"> MCCB <input type="checkbox"> NFB <input type="checkbox"> HRC <input type="checkbox"> Relay</td>
                        <td colspan="1"></td>
                        <td colspan="9">Merk/Type : </td>
                    </tr> --}}

                </table>
            </td>
        </tr>

    </table>


    <div class="page-break">
    </div>

    <table class="table table-borderless"
        style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center;"><img src="img/bright.png" class="w-auto"
                    style="height: 60px;padding-top:1rem;padding-bottom:1rem;"></td>
            <td colspan="10" class="text-center font-weight-bold judul p-2"
                style="border:1px solid black;vertical-align: bottom;">SERVICES BUSINESS UNIT<br />PT PELAYANA LISTRIK
                NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA HASIL
                PEMERIKSAAN<br />
                PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)<br />
                INSTALASI / SAMBUNGAN LISTRIK SATU / TIGA FASA <br />
                PENGUKURAN LANGSUNG
            </td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-P2TL-SBU-01</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Revisi</td>
            <td colspan="4" class="header">00</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Tanggal</td>
            <td colspan="4" class="header">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Halaman</td>
            <td colspan="4" class="header">2 dari 3</td>
        </tr>

        <tr>
            <td colspan="2" class="header">No. BA</td>
            <td colspan="4" class="header">{{ sprintf('%05d', $item->id); }}</td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>V. Data Pemeriksaan</b>
            </td>
        </tr>

        <tr>
            <td colspan="12">
                <table class="px-3 table table-borderless"
                    style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="px-1" colspan="1">
                            <b>No</b>
                        </td>

                        <td rowspan="2" class="px-1" colspan="2" style="border: 1px solid black">
                            <b>Yang Diperiksa</b>
                        </td>

                        <td colspan="5" class="px-1" style="border: 1px solid black">
                            <b>Kondisi Ketika Pemeriksaan</b>
                        </td>

                        <td colspan="4" class="px-1" style="border: 1px solid black">
                            <b>Kondisi Setelah Pemeriksaan</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <b>Peralatan</b>
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <b>Segel</b>
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Nomor, Tahun, Kode, Segel</b>
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <b>Keterangan</b>
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <b>Peralatan</b>
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <b>Segel</b>
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Nomor, Tahun, Kode, Segel</b>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            1.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            kWh Meter dan Segel <br />
                            Metrologi kWh Meter
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_segel == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_kwh->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_kwh->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_peralatan == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                           <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_kwh->post_segel == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_kwh->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>


                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            2.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Box APP TR/ Pelindung CT dan Pembatas
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_ct->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_ct->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pelindung_ct->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pelindung_ct->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            3.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            KWH Meter & Segel <br />
                            Metrologi kWh <br />
                            Meter
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->segel->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->segel->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->segel->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->segel->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->segel->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->segel->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            4.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Tutup Terminal kWh <br />
                            Meter
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            5.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Box Modem <br/>
                            AMR
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->amr->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->amr->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->amr->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->amr->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->amr->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->amr->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            6.
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Kubikel/<br />
                            Peliondung Terminal VT
                        </td>

                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->kubikel->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->kubikel->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->kubikel->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->kubikel->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>


                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            7.
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Kubikel/<br />
                            Peliondung Terminal CT & Relay
                        </td>
                    
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal_ct->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal_ct->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->terminal_ct->post_segel == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->terminal_ct->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            8.
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Gardu
                        </td>
                    
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_segel == "Tidak Ada") checked="true"
                            @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pintu_gardu->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pintu_gardu->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_peralatan == "Ada") checked="true" @endif>
                            Ada <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_peralatan == "Tidak Ada") checked="true"
                            @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_segel == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->tidak_langsung->pintu_gardu->post_segel == "Tidak Ada") checked="true"
                            @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pintu_gardu->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="12" class="px-1">
                            Keterangan : {{ $item->tidak_langsung->pintu_gardu->all_keterangan }}
                        </td>
                    </tr>


                </table>
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>VI. Pemeriksaan dan Pengukuran</b>
            </td>
        </tr>

        <tr>
            <td colspan="12">
                <table class="px-1 table table-borderless"
                    style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="12">
                            <b>Wiring</b>
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 1 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal1 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 2 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal2 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 3 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal3 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 4 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal4 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 5 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal5 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 6 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal6 }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 7 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal7 }}
                        </td>
                    
                    </tr>
                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 8 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal8 }}
                        </td>
                    
                    </tr><tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 9 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal9 }}
                        </td>
                    
                    </tr><tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Terminal 11 kWh Meter
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            terhubung dengan terminal
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            {{ $item->tidak_langsung->wiring_app->terminal11 }}
                        </td>
                    
                    </tr>
                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Nilai Pentanahan/Grounding
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="8">
                            {{ $item->tidak_langsung->wiring_app->grounding }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="4">
                            Keterangan
                        </td>
                    
                        <td class="px-1" style="border-bottom: 1px solid black" colspan="8">
                            {{ $item->tidak_langsung->wiring_app->keterangan_wiring_app }}
                        </td>
                    
                    </tr>

                    <tr>
                        <td colspan="12" class="px-1">Diagram Phasor</td>
                    </tr>

                    <tr>
                        <td colspan="12" style="text-align: center;">
                            <img src="{{ Storage::url($item->tidak_langsung->wiring_app->wiring_diagram) }}" class="w-auto"
                                style="height: 60px;padding-top:1rem;padding-bottom:1rem;"></td>
                    </tr>

                    <tr>
                        <td colspan="12" class="px-1"><b>Pengukuran</b>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            <b>Parameter</b>
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            <b>Phase R</b>
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Phase S</b>
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Phase T</b>
                        </td>
                    </tr>


                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Arus Primer
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_primer_r }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_primer_s }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_primer_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Arus Sekunder
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_sekunder_r }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_sekunder_s }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->arus_sekunder_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Ratio CT
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->ct_r }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->ct_s }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->ct_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Akurasi Ratio CT (100%)
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->akurasi_r }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->akurasi_s }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->akurasi_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Primer
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_primer_r }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_primer_s }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_primer_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Sekunder
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_sekunder_r }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_sekunder_s }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->voltase_sekunder_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            COS
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->cos_r }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->cos_s }}
                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->tidak_langsung->pemeriksaan_pengukuran->cos_t }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="12" style="border: 1px solid black">
                            <b>Akurasi pengukuran kWh Meter :{{ $item->tidak_langsung->pemeriksaan_pengukuran->akurasi }}</b>
                        </td>
                    </tr>
                    

                    <tr>
                        <td class="px-1" colspan="12">
                            Keterangan : {{ $item->tidak_langsung->pemeriksaan_pengukuran->keterangan }}
                        </td>

                    </tr>
                </table>
            </td>
        </tr>

    </table>

    <div class="page-break">
    </div>

    <table class="table table-borderless"
        style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2" style="text-align: center;"><img src="img/bright.png" class="w-auto"
                    style="height: 60px;padding-top:1rem;padding-bottom:1rem;"></td>
            <td colspan="10" class="text-center font-weight-bold judul p-2"
                style="border:1px solid black;vertical-align: bottom;">SERVICES BUSINESS UNIT<br />PT PELAYANA LISTRIK
                NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA HASIL
                PEMERIKSAAN<br />
                PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)<br />
                INSTALASI / SAMBUNGAN LISTRIK SATU / TIGA FASA <br />
                PENGUKURAN LANGSUNG
            </td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-P2TL-SBU-01</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Revisi</td>
            <td colspan="4" class="header">00</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Tanggal</td>
            <td colspan="4" class="header">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Halaman</td>
            <td colspan="4" class="header">3 dari 3</td>
        </tr>

        <tr>
            <td colspan="2" class="header">No. BA</td>
            <td colspan="4" class="header">{{ sprintf('%05d', $item->id); }}</td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>VII. HASIL PEMERIKSAAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                {{ $item->tidak_langsung->hasil_pemeriksaan->hasil_pemeriksaan }}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>IX. KESIMPULAN HASIL PEMERIKSAAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                {{ $item->tidak_langsung->hasil_pemeriksaan->kesimpulan }}
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>X. TINDAKAN YANG DILAKUKAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                {{ $item->tidak_langsung->hasil_pemeriksaan->tindakan }}
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>XI. BARANG BUKTI YANG DIAMBIL</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                {{ $item->tidak_langsung->hasil_pemeriksaan->barang_bukti }}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>XII. PENYELESAIAN JIKA ADA TEMUAN ATAU KELAINAN (SURAT PANGGILAN I)</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                Untuk menyelesaikan atas kondisi temuan yang ditemukan oleh Petugas (TIM) P2TL sesuai hasil pemeriksaan
                tersebut diatas, Pelanggan / Pemakai yang bertanggung jawab atas pemakaian tenaga listrik di Persil
                sebagaimana tersebut diatas diminta datang ke kantor pada :
            </td>
        </tr>

        <tr>
            <td colspan="2" class="px-4">
                Hari
            </td>

            <td colspan="10">
                : {{ $indonesianDay_pemeriksaan }}
            </td>
        </tr>

        <tr>
            <td colspan="2" class="px-4">
                Tanggal
            </td>

            <td colspan="10">
                : {{ $item->tidak_langsung->hasil_pemeriksaan->tanggal_penyelesaian }}
            </td>

        </tr>
        <tr>
            <td colspan="2" class="px-4">
                Waktu
            </td>

            <td colspan="10">
                : Pukul 08.00 WIB s/d 15.00 WIB
            </td>

        </tr>

        <tr>
            <td colspan="2" class="px-4">
                Bertempat
            </td>

            <td colspan="10">
                : Kantor Services Business Unit b'right. PLN BATAM<br />
                Komplek Capitol Superblock Imperium Blok B No. 1-2A<br />
                Jl. Jenderal Sudirman, Baloi - Batam
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                Demikian Berita Acara ini dibuat dengan sebenarnya dan ditanda tangani oleh masing-masing pihak
                Tersebut diatas dalam rangkap 3 (tiga), satu rangkap berikut lampirannya diberikan kepada
                Pelanggan/Pemakai/Penghuni/Wakil Pelanggan/Penanggung jawab bangunan atau persil.
            </td>
        </tr>


        <tr>
            <td colspan="6" class="text-center px-4">
                <b>Pelanggan/Pemakai/Penghuni/Wakil</b><br />
                <b>Pelanggan/Penanggung Jawab Bangunan</b><br />
                <b>atau Persil</b><br />
            </td>

            <td colspan="6" class="text-center px-4">
                <b>TIM P2TL</b>
            </td>
        </tr>

        <tr>
            <td colspan="6" class="text-center px-4" style="height: 50px;vertical-align:bottom;">
                ................
            </td>
            <td colspan="6" class="text-center px-4" style="height: 50px;vertical-align:bottom;">
                ................
            </td>
        </tr>

        <tr>
            <td colspan="6" class="text-center px-4" style="height: 50px;vertical-align:bottom;">

            </td>
            <td colspan="6" class="text-center px-4" style="height: 50px;vertical-align:bottom;">
                ................
            </td>
        </tr>

        <tr>
            <td colspan="12" class="text-center px-4">
                <b>PETUGAS PENDAMPING DARI KEPOLISIAN, TNI/SAKSI</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="text-center px-4" style="height: 50px;vertical-align:bottom;">
                ................
            </td>
        </tr>
    </table>
</body>

</html>