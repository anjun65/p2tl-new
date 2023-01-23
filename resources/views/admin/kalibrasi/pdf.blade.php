<!DOCTYPE html>
<html>

<head>
    <title>BA Kalibrasi</title>
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
                style="border:1px solid black;vertical-align: bottom;"> LABORATORIUM KALIBRASI<br />SERVICES BUSINESS UNIT<br/>PT PELAYANA LISTRIK NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA<br />
                KALIBRASI kWh METER</td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-CAL-SBU-03</td>
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
            <td colspan="4" class="header">1 dari 1</td>
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
                $tahun }} <br/>Telah Dilaksanakan uji/ kalibrasi kWh Meter dengan data sebagai berikut :
            </td>
        </tr>
        <tr>
            <td colspan="12" class="px-3">
                <b>I. DATA PELANGGAN</b>
            </td>
        </tr>

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
            <td colspan="3" class="pl-5">
                Alamat Instalasi
            </td>
            <td colspan="3">
                :
            </td>
        
            <td colspan="3" class="pl-5">
                Tarif / Daya
            </td>
            <td colspan="3">
                :
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                Dengan disaksikan oleh Pelanggan / Pemakai / Penghuni / Wakil Pelanggan :
            </td>
        </tr>

        <tr>
            <td colspan="3" class="pl-5">
                Nama
            </td>
            <td colspan="3">
                :
            </td>
        
            <td colspan="3" class="pl-5">
                Pekerjaan
            </td>
            <td colspan="3">
                :
            </td>
        </tr>
        <tr>
            <td colspan="3" class="pl-5">
                Alamat
            </td>
            <td colspan="3">
                :
            </td>
        
            <td colspan="3" class="pl-5">
                No. Telp./HP
            </td>
            <td colspan="3">
                :
            </td>
        </tr>

        <tr>
            <td colspan="3" class="pl-5">
                Nomor KTP/SIM
            </td>
            <td colspan="3">
                :
            </td>
        
            <td colspan="3" class="pl-5">
                
            </td>
            <td colspan="3">
                
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                <b>II. DATA kWh Meter</b>
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
                        <td colspan="12" class="px-3">
                            <br />
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            Merk/Type
                        </td>

                        <td colspan="4" class="pl-3">
                            :
                        </td>

                        <td colspan="2" class="pl-3">
                            Konstanta
                        </td>
                        
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            No. Register
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    
                        <td colspan="2" class="pl-3">
                            Rating Arus (ln)
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="pl-3">
                            No. Seri
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    
                        <td colspan="2" class="pl-3">
                            Tegangan Nomimal
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2" class="pl-3">
                            Tahun Pembuatan
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    
                        <td colspan="2" class="pl-3">
                            Stand kWh Meter
                        </td>
                    
                        <td colspan="4" class="pl-3">
                            :
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2" class="pl-3 pb-2">
                            Class
                        </td>
                    
                        <td colspan="4" class="px-3">
                            :
                        </td>
                    
                        <td colspan="2" class="pl-3">
                            Keterangan
                        </td>
                    
                        <td colspan="4" class="px-3">
                            :
                        </td>
                    </tr>
                
                </table>
    

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
                        <td colspan="3" class="pl-3 text-center" style="border:1px solid black;">
                            POSISI SEGEL
                        </td>
        
                        <td colspan="3" class="pl-3 text-center" style="border:1px solid black;">
                            KODE SEGEL SISI A
                        </td>
        
                        <td colspan="3" class="px-3 text-center" style="border:1px solid black;">
                            KODE SEGEL SISI B
                        </td>
        
                        <td colspan="3" class="pl-3 text-center" style="border:1px solid black;">
                            KETERANGAN
                        </td>
                                
                    </tr>


                    <tr>
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                            Sisi Atas kWh Meter
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                            
                        </td>
                    
                        <td colspan="3" class="px-3" style="border:1px solid black;">
                            
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                            
                        </td>
                    
                    </tr>

                    <tr>
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                            Sisi Kanan kWh Meter
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                    
                        </td>
                    
                        <td colspan="3" class="px-3" style="border:1px solid black;">
                    
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                    
                        </td>
                    
                    </tr>

                    <tr>
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                            Sisi Kiri kWh Meter
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                    
                        </td>
                    
                        <td colspan="3" class="px-3" style="border:1px solid black;">
                    
                        </td>
                    
                        <td colspan="3" class="pl-3" style="border:1px solid black;">
                    
                        </td>
                    
                    </tr>
        
                    
        
                </table>
        
        
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <b>III. HASIL UJI AKURASI PENGUKURAN kWH METER</b>
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
                        <td colspan="2"  style="border:1px solid black;">TEGANGAN (V)</td>
                        <td colspan="1"  style="border:1px solid black;">FREKWENSI (Hz)</td>
                        <td colspan="2"  style="border:1px solid black;">BEBAN (% IN)</td>
                        <td colspan="2"  style="border:1px solid black;">ARUS (A)</td>
                        <td colspan="1"  style="border:1px solid black;">FAKTOR DAYA (COS)</td>
                        <td colspan="2"  style="border:1px solid black;">Nilai Akurasi (%)</td>
                        <td colspan="2"  style="border:1px solid black;">KETERANGAN</td>
                    </tr>

                    <tr>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">50</td>
                        <td colspan="2" style="border:1px solid black;">100</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">1</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="2" style="border:1px solid black;"></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">50</td>
                        <td colspan="2" style="border:1px solid black;">50</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">1</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="2" style="border:1px solid black;"></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">50</td>
                        <td colspan="2" style="border:1px solid black;">5</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="1" style="border:1px solid black;">1</td>
                        <td colspan="2" style="border:1px solid black;"></td>
                        <td colspan="2" style="border:1px solid black;"></td>
                    </tr>

                    <tr>
                        <td colspan="3">Alat Uji</td>
                        <td colspan="3">Merk :</td>
                        <td colspan="3">Type : </td>
                        <td colspan="3">No. Seri: </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        
        <tr>
            <td colspan="12" class="px-3">
                <b>IV. KESIMPULAN</b>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                <br/>
            </td>
        </tr>


        <tr>
            <td colspan="4" class="px-3">
                <b>Pelanggan/Pemakai/Penghuni/Wakil<br/>
                Penanggung Jawab Bangunan atau Persil</b>
            </td>

            <td colspan="4" class="px-3">
                <b>Tim P2TL</b>
            </td>

            <td colspan="4" class="px-3">
                <b>Petugas Labor/Penguji</b>
            </td>
        </tr>


        <tr>
            <td colspan="4" class="px-3" style="height: 50px">
                
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                
            </td>
        </tr>

        <tr>
            <td colspan="4" class="px-3" style="height: 50px">
                    ........................
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                 ........................
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                ........................
            </td>
        </tr>

        <tr>
            <td colspan="4" class="px-3">
                <b>Petugas Pendamping dari POLRI/TNI/ Saksi<br /></b>
            </td>
        
            <td colspan="4" class="px-3">
                
            </td>
        
            <td colspan="4" class="px-3">
                
            </td>
        </tr>

        <tr>
            <td colspan="4" class="px-3" style="height: 50px">
        
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
        
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
        
            </td>
        </tr>
        
        <tr>
            <td colspan="4" class="px-3" style="height: 50px">
                ........................
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                ........................
            </td>
        
            <td colspan="4" class="px-3" style="height: 50px">
                ........................
            </td>
        </tr>
    </table>

    

</body>

</html>