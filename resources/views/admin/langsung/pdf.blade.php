<!DOCTYPE html>
<html>

<head>
    <title>BA Pemeriksaan Langsung</title>
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
                style="border:1px solid black;vertical-align: bottom;">SERVICES BUSINESS UNIT<br/>PT PELAYANA LISTRIK NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA HASIL PEMERIKSAAN<br />
                PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)<br/>
                INSTALASI / SAMBUNGAN LISTRIK SATU / TIGA FASA <br/>
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
        $tanggal_pemeriksaan = \Illuminate\Support\Carbon::parse($item->form->hasil_pemeriksaan->tanggal_penyelesaian);

        $hari = $tanggal->dayOfWeek;
        $hari_pemeriksaan = $tanggal->dayOfWeek;
        $bulan = $tanggal->month;

        $indonesianDay = trans($day_name[$hari]);
        $indonesianMonth = trans($month_name[$bulan-1]);

        $indonesianDay_pemeriksaan = trans($day_name[$hari_pemeriksaan]);

        // $now = \Illuminate\Support\Carbon::now()->locale('id');


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
        <br/>
        @endforeach

        

        <tr>
            <td colspan="12" class="px-3">
                Masing-masing sebagai Petugas Pelaksana Lapangan P2TL, berdasarkan Surat Tugas Nomor: 
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
                Dengan didampingi oleh petugas dari TNI, POLRI berdasarkan Surat Tugas dari : {{ $item->surat_dari }}
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
        <br />

        @php
            $pendamping1 = \App\Models\Pendamping::where('id', $item->pendamping1_id)->first();
        @endphp

        <tr>
            <td colspan="2">
                <div class="pl-5">Nama</div>
            </td>
            <td colspan="10">
                : @if ($pendamping1) {{ $pendamping1->name }} @endif
            </td>
        </tr>
        
        <tr>
        
            <td colspan="2">
                <div class="pl-5">Nomor Induk</div>
            </td>
            <td colspan="10">
                : @if ($pendamping1) {{ $pendamping1->nip }} @endif
            </td>
        </tr>
        
            <tr>
                <td colspan="2">
                    <div class="pl-5">Jabatan</div>
                </td>
                <td colspan="10">
                    : @if ($pendamping1) {{ $pendamping1->jabatan }} @endif
                </td>
            </tr>
        <br />

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
                :  {{ $item->nama_pelanggan }}
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
                : {{ $item->form->nama_saksi }}
            </td>
        </tr>
        
        
        <tr>
            <td colspan="2">
                <div class="pl-5">Alamat</div>
            </td>
            <td colspan="10">
                : {{ $item->form->alamat_saksi }}
            </td>
        </tr>
        
        
        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor KTP/SIM</div>
            </td>
            <td colspan="10">
                : {{ $item->form->nomor_identitas }}
            </td>
        </tr>
        

        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor Telp./HP</div>
            </td>
            <td colspan="10">
                : {{ $item->form->no_telpon_saksi }}	
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                
                Yang bertanggung jawab atas Bangunan/Persil yang diperiksa oleh petugas P2TL PLN pada instalasi tersebut.<br/>
                Dengan data dan hasil pemeriksaan sebagai berikut pada halaman selanjutnya:
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
                <b>IV. Data APP :</b>
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
                        <td colspan="2" class="pl-3">
                            <b>Data APP Terpasang Lama</b>
                        </td>
                        
                        <td colspan="4">
                            
                        </td>
                        
                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            <b>Data App Baru</b>
                        </td>
                        
                        <td colspan="4" class="pr-3">
                            
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            <b>1. kWh Meter</b>
                        </td>
                    
                        <td colspan="4">
                            
                        </td>
                    
                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            <b>1. kWh Meter</b>
                        </td>
                    
                        <td colspan="4" class="pr-3">
                            
                        </td>
                    </tr>


                    <tr>
                        <td colspan="6" class="pl-4">
                            Merk/Type : {{ $item->form->data_lama->merk }}
                        </td>
                    
                    
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Merk/Type : {{ $item->form->data_baru->merk }}
                        </td>
                    
                    </tr>


                    <tr>
                        <td colspan="6" class="pl-4">
                            No. Register : {{ $item->form->data_lama->no_reg }}
                        </td>
                    
                    
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            No. Register : {{ $item->form->data_baru->no_reg }}
                        </td>
                    </tr>

                    <tr>                    
                        <td colspan="6" class="pl-4">
                            No. Seri : {{ $item->form->data_lama->no_seri }}
                        </td>
                        
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            No. Seri : {{ $item->form->data_baru->no_seri }}
                        </td>
                    </tr>

                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Tahun Pembuatan : {{ $item->form->data_lama->tahun_pembuatan }}
                        </td>
                        
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Tahun Pembuatan : {{ $item->form->data_baru->tahun_pembuatan }}
                        </td>
                    </tr>

                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Class : {{ $item->form->data_lama->class }}
                        </td>
                        
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Class : {{ $item->form->data_baru->class }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" class="pl-4">
                            Konstanta : {{ $item->form->data_lama->konstanta }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Konstanta : {{ $item->form->data_baru->konstanta }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" class="pl-4">
                            Rating Arus (ln) : {{ $item->form->data_lama->rating_arus }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Rating Arus (ln) : {{ $item->form->data_baru->rating_arus }}
                        </td>
                    </tr>
                    
                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Tegangan Nomimal : {{ $item->form->data_lama->tegangan_nominal }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Tegangan Nomimal : {{ $item->form->data_baru->tegangan_nominal }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" class="pl-4">
                            Stand kWh Meter : {{ $item->form->data_lama->stand_kwh_meter }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Stand kWh Meter : {{ $item->form->data_baru->stand_kwh_meter }}
                        </td>
                    </tr>



                    <tr>
                        <td colspan="2" class="pl-3">
                            <b>2. Alat Pembatas</b>
                        </td>
                    
                        <td colspan="4">
                            
                        </td>
                    
                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            <b>2. Alat Pembatas</b>
                        </td>
                    
                        <td colspan="4" class="pr-3">

                        </td>
                    </tr>


                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Jenis pembatas : {{ $item->form->data_lama->jenis_pembatas }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Jenis pembatas : {{ $item->form->data_baru->jenis_pembatas }}
                        </td>
                    </tr>

                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Merk/Type : {{ $item->form->data_lama->alat_pembatas_merk }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Merk/Type : {{ $item->form->data_baru->alat_pembatas_merk }}
                        </td>
                    </tr>
                
                    <tr>                    
                        <td colspan="6" class="pl-4">
                            Rating Arus (ln) : {{ $item->form->data_lama->rating_arus_2 }}
                        </td>
                        
                        <td colspan="6" class="pl-4" style="border-left: 1px solid black">
                            Rating Arus (ln) : {{ $item->form->data_baru->rating_arus_2 }}
                        </td>
                    </tr>
                </table>
            </td>
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
        
                        <td colspan="5" class="px-1 text-center" style="border: 1px solid black">
                            <b>Kondisi Ketika Pemeriksaan</b>
                        </td>
        
                        <td colspan="4" class="px-1 text-center" style="border: 1px solid black">
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
                            <input type="checkbox" @if ($item->form->kwh_meter->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->kwh_meter->peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->kwh_meter->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->kwh_meter->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->kwh_meter->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->kwh_meter->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->kwh_meter->post_peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->kwh_meter->post_peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->kwh_meter->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->kwh_meter->post_segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->kwh_meter->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
        
                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            2.
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Terminal kWh Meter
                        </td>
        
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->terminal->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->terminal->peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->terminal->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->terminal->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->terminal->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->terminal->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->terminal->post_peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->terminal->post_peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->terminal->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->terminal->post_segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->terminal->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            3.
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Box APP <br />
                            /Pelindung kWh <br />
                            Meter
                        </td>
        
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindungkwh->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindungkwh->peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindungkwh->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindungkwh->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindungkwh->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindungkwh->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindungkwh->post_peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindungkwh->post_peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindungkwh->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindungkwh->post_segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindungkwh->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            4.
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Pintu Box APP <br />
                            /Pelindung Busbar <br />
                            dan Pembatas
                        </td>
        
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindung_busbar->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindung_busbar->peralatan == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindung_busbar->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindung_busbar->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindung_busbar->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindung_busbar->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindung_busbar->post_peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindung_busbar->post_peralatan == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->pelindung_busbar->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->pelindung_busbar->post_segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pelindung_busbar->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            5.
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Papan OK
                        </td>
                        
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->papan_ok->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->papan_ok->peralatan == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->papan_ok->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->papan_ok->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->papan_ok->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->papan_ok->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->papan_ok->post_peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->form->papan_ok->post_peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->papan_ok->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->papan_ok->post_segel == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->papan_ok->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            6.
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            Box Penutup<br />
                            MCB/Pembatas
                        </td>
        
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->penutup_mcb->peralatan == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->penutup_mcb->peralatan == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->penutup_mcb->segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->penutup_mcb->segel == "Tidak Ada") checked="true" @endif> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->penutup_mcb->nomor_tahun_kode_segel }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            {{ $item->form->penutup_mcb->keterangan }}
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->penutup_mcb->post_peralatan == "Ada") checked="true" @endif> Ada
                            <br />
                            <input type="checkbox" @if ($item->form->penutup_mcb->post_peralatan == "Tidak Ada") checked="true" @endif>
                            Tidak
                            Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox" @if ($item->form->penutup_mcb->post_segel == "Ada") checked="true" @endif> Ada <br />
                            <input type="checkbox" @if ($item->form->penutup_mcb->post_segel == "Tidak Ada") checked="true" @endif> Tidak
                            Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->penutup_mcb->post_nomor_tahun_kode_segel }}
                        </td>
                    </tr>
        
                    <tr>
                        <td colspan="12" class="px-1">
                            Keterangan : {{ $item->form->penutup_mcb->all_keterangan }}
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
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            <b>Parameter</b>
                        </td>
        
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            <b>Phase 1</b>
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Phase 2</b>
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Phase 3</b>
                        </td>
        
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            <b>Netral</b>
                        </td>
                    </tr>


                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Arus
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->arus_1 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->arus_2 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->arus_3 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->arus_netral }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Phase - Netral
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_netral_1 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_netral_2 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_netral_3 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Phase - Phase
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_phase_1 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_phase_2 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->voltase_phase_3 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                    
                        </td>
                    </tr>
        
                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            COS
                        </td>
                    
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->cos_1 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->cos_2 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                            {{ $item->form->pemeriksaan_pengukuran->cos_3 }}
                        </td>
                    
                        <td colspan="2" class="px-1" style="border: 1px solid black">
                    
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="12" style="border: 1px solid black">
                            <b>Akurasi pengukuran kWh Meter : {{ $item->form->pemeriksaan_pengukuran->akurasi }}</b> 
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1" colspan="12">
                            <b>Wiring APP</b>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="12">
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
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4" >
                                        Terminal 1 kWh Meter
                                    </td>
                            
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>

                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal1 }}
                                    </td>
                            
                                </tr>

                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 2 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal2 }}
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 3 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal3 }}
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 4 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal4 }}
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 5 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal5 }}
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 6 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal6 }}
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 7 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal7 }}
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 8 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal8 }}
                                    </td>
                                
                                </tr>

                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 9 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal9 }}
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 11 kWh Meter
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>
                                
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        {{ $item->form->wiring_app->terminal11 }}
                                    </td>
                                
                                </tr>

                                
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 pb-3" colspan="12">
                            Keterangan : {{ $item->form->wiring_app->keterangan_wiring_app }}
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
                {{ $item->form->hasil_pemeriksaan->hasil_pemeriksaan }}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>IX. KESIMPULAN HASIL PEMERIKSAAN</b>
            </td>
        </tr>
        
        <tr>
            <td colspan="12" class="px-4">
                {{ $item->form->hasil_pemeriksaan->kesimpulan }}
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>X. TINDAKAN YANG DILAKUKAN</b>
            </td>
        </tr>
        
        <tr>
            <td colspan="12" class="px-4">
                {{ $item->form->hasil_pemeriksaan->tindakan }}
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-4">
                <b>XI. BARANG BUKTI YANG DIAMBIL</b>
            </td>
        </tr>
        
        <tr>
            <td colspan="12" class="px-4">
                {{ $item->form->hasil_pemeriksaan->barang_bukti }}
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
                : {{ $item->form->hasil_pemeriksaan->tanggal_penyelesaian }}
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
                <b>Pelanggan/Pemakai/Penghuni/Wakil</b><br/>
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