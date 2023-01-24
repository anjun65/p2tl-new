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

        $hari = $tanggal->dayOfWeek;
        $bulan = $tanggal->month;

        $indonesianDay = trans($day_name[$hari]);
        $indonesianMonth = trans($month_name[$bulan-1]);

        // $now = \Illuminate\Support\Carbon::now()->locale('id');


        $tanggal_only = $tanggal->day;
        $tahun = $tanggal->year;

        @endphp


        <tr>
            <td colspan="12" class="px-3">
                Pada hari ini, {{ $indonesianDay }} Tanggal {{ $tanggal_only }} Bulan {{ $indonesianMonth }} Tahun {{
                $tahun }} <br />Kami yang bertanda tangan dibawah ini :
            </td>
        </tr>


        @php
        $users = \App\Models\User::where('regus_id', $item->regus_id)->get();
        @endphp

        @foreach ($users as $user)
        <tr>
            <td colspan="2">
                <div class="pl-5">1. Nama</div>
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
                : {{ $user->nip ?? "-" }}
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


        @endforeach

        <tr>
            <td colspan="3" class="pl-5">
                Nama Pelanggan
            </td>
            <td colspan="3">
                :
            </td>

            <td colspan="3" class="pl-5">
                ID Pelanggan
            </td>
            <td colspan="3">
                :
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Masing-masing sebagai Petugas Pelaksana Lapangan P2TL, berdasarkan Surat Tugas Nomor : ........ tanggal:
                ........
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
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- Alamat Pelanggan</div>
            </td>
            <td colspan="10">
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- IDPEL</div>
            </td>
            <td colspan="10">
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">- Tarif / Daya</div>
            </td>
            <td colspan="10">
                :
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
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Alamat</div>
            </td>
            <td colspan="10">
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor KTP/SIM</div>
            </td>
            <td colspan="10">
                :
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <div class="pl-5">Pekerjaan</div>
            </td>
            <td colspan="10">
                :
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div class="pl-5">Nomor Telp./HP</div>
            </td>
            <td colspan="10">
                :
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
                <input type="checkbox"> 380 Volt
            </td>

            <td colspan="2" >
                <input type="checkbox"> 20 kV
            </td>

            <td colspan="2" >
                <input type="checkbox"> 150 kV
            </td>

            <td colspan="3" >
            
            </td>
        </tr>


        <tr>
            <td colspan="3" class="px-3">
                <b>II. Jenis Pengukuran</b>
            </td>
        
            <td colspan="3" >
                <input type="checkbox"> Primer; Sekunder dengan CT
            </td>
        
            <td colspan="6" >
                <input type="checkbox"> Primer; Sekunder dengan CT dan PT
            </td>
        </tr>

        <tr>
            <td colspan="3" class="px-3">
                <b>III. Tempat Kedudukan APP</b>
            </td>
        
            <td colspan="3" >
                <input type="checkbox"> Di dalam bangunan pelanggan
            </td>
        
            <td colspan="3" >
                <input type="checkbox"> Di luar bangunan pelanggan
            </td>
            <td colspan="3" >
                <input type="checkbox"> Di Gardu
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
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
                        <td colspan="6"><b>1. Alat Pembatas</b></td>
                        <td colspan="1"></b></td>
                        <td colspan="5"><b>4. Trafo Tegangan (PT)</b></td>
                    </tr>
                    
                    <tr>
                        <td colspan="6"><b>Jenis : <input type="checkbox"> MCCB <input type="checkbox"> NFB <input type="checkbox"> HRC <input type="checkbox"> Relay</b></td>
                        <td colspan="1"></td>
                        <td colspan="5">Merk/Type : </td>
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
                        <td colspan="2" class="pl-3">
                            Merk/Type
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Merk/Type
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2" class="pl-3">
                            No. Register
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            No. Register
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            No. Seri
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            No. Seri
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="pl-3">
                            Tahun Prmbuatan
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Tahun Prmbuatan
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Class
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Class
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Konstanta
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Konstanta
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Rating Arus (ln)
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Rating Arus (ln)
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Tegangan Nomimal
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Tegangan Nomimal
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Stand kWh Meter
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Stand kWh Meter
                        </td>

                        <td colspan="4" class="pr-3">
                            :
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
                        <td colspan="2" class="pl-3">
                            Jenis pembatas
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Jenis pembatas
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Merk/Type
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Merk/Type
                        </td>

                        <td colspan="4" class="pr-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Rating Arus (ln)
                        </td>

                        <td colspan="4">
                            :
                        </td>

                        <td colspan="2" class="pl-3" style="border-left: 1px solid black">
                            Rating Arus (ln)
                        </td>

                        <td colspan="4" class="pr-3">
                            :
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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

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
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">

                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="1" class="px-1" style="border: 1px solid black">
                            <input type="checkbox"> Ada <br />
                            <input type="checkbox"> Tidak Ada
                        </td>
                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                    </tr>

                    <tr>
                        <td colspan="12" class="px-1">
                            Keterangan :
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

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Phase - Netral
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            Voltase Phase - Phase
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="3" style="border: 1px solid black">
                            COS
                        </td>

                        <td class="px-1" colspan="3" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>

                        <td colspan="2" class="px-1" style="border: 1px solid black">

                        </td>
                    </tr>

                    <tr>
                        <td class="px-1" colspan="12" style="border: 1px solid black">
                            <b>Akurasi pengukuran kWh Meter :</b>
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
                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        Terminal 1 kWh Meter
                                    </td>

                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        terhubung dengan terminal
                                    </td>

                                    <td class="px-3" style="border-bottom: 1px solid black" colspan="4">
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
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
                                        ...........
                                    </td>

                                </tr>


                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 pb-3" colspan="12">
                            Keterangan :
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
                ......................................................
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>IX. KESIMPULAN HASIL PEMERIKSAAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                ......................................................
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>X. TINDAKAN YANG DILAKUKAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                ......................................................
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-4">
                <b>XI. BARANG BUKTI YANG DIAMBIL</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-4">
                ......................................................
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
                :
            </td>
        </tr>

        <tr>
            <td colspan="2" class="px-4">
                Tanggal
            </td>

            <td colspan="10">
                :
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