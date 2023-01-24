<!DOCTYPE html>
<html>

<head>
    <title>BA Pengambilan</title>
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
        page-break-after: always; /* depreciating, use break-after */
        break-after: page;
        height: 0px;
        display: block!important;
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
                style="border:1px solid black;vertical-align: bottom;"> SERVICES BUSINESS UNIT<br />PT PELAYANAN LISTRIK
                NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA<br />
                PENGAMBILAN BARANG BUKTI<br /> PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)</td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-P2TL-SBU-03</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Revisi</td>
            <td colspan="4" class="header">0</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Tanggal</td>
            <td colspan="4" class="header">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Halaman</td>
            <td colspan="4" class="header">1 dari 2</td>
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
                $tahun }} Berdasarkan
                hasil
                dan
                kesimpulan pemeriksaan yang dilakukan oleh Tim P2TL sebagaimana tercantum dalam Berita Acara
                Hasil Pemeriksaan P2TL Nomor ............ Tanggal .............................. Dilakukan pengambilan
                Barang
                Bukti
                berupa peralatan hasil temuan P2TL oleh Penyidik P2TL/Petugas P2TL atas :
            </td>
        </tr>


        {{-- <tr>
            <td colspan="12" class="px-3 pb-2">
                Selanjutnya Barang Bukti tersebut diatas dibawa untuk disimpan dan diamankan di gudang/
                laboratorium PLN sebagai barang titipan Penyidik sampai dengan dibuka dan diperiksa bersama oleh
                Para Pihak.
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Demikian Berita Acara ini setelah dibaca, dibuat dan ditanda tangani oleh masing-masing pihak tersebut
                dalam rangkap 3 (tiga), satu rangkap untuk Pelanggan/Pemakai/Penghuni/Wakil Pelanggan/
                Penanggung Jawab Bangunan atau Persil yang diperiksa.
            </td>
        </tr> --}}


        @php
        $users = \App\Models\User::where('regus_id', $item->regus_id)->get();
        
        @endphp

        @foreach ($users as $user)
        <tr>
            <td colspan="3" class="pl-5">
                Nama
            </td>
            <td colspan="9">
                : {{ $user->name }}
            </td>
        </tr>

        <tr>

            <td colspan="3" class="pl-5">
                NIP
            </td>
            <td colspan="9">
                : {{ $user->nip ?? "-" }}
            </td>
        </tr>


        <tr>

            <td colspan="3" class="pl-5">
                Jabatan
            </td>
            <td colspan="9">
                : {{ $user->jabatan ?? "-" }}
            </td>
        </tr>
        @endforeach



        <tr>
            <td colspan="12" class="px-3">
                Barang bukti seperti data pada Berita Acara ini, dimasukkan dalam kantong/bungkus
                kemudian disegel, serta dibubuhi tandatangan pada kertas segel penutup kantong tersebut
                Disaksikan oleh Pemakai/Penghuni/Wakil Pelanggan/Penanggung Jawab Bangunan atau Persil :
            </td>
        </tr>

        <tr>
            <td class="pl-5" colspan="3">
                Nama
            </td>

            <td colspan="9">
                : 
            </td>
        </tr>

        <tr>
            <td class="pl-5" colspan="3">
                Alamat
            </td>

            <td colspan="9">
                : 
            </td>
        </tr>

        <tr>
            <td class="pl-5" colspan="3">
                Nomor KTP/SIM
            </td>

            <td colspan="9">
                : 
            </td>
        </tr>

        <tr>
            <td class="pl-5" colspan="3">
                Nomor Telp./HP
            </td>
        
            <td colspan="9">
                :
            </td>
        </tr>

        <tr>
            <td class="pl-5" colspan="3">
                Nomor ID Pelanggan
            </td>
        
            <td colspan="9">
                :
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3 pb-3">
                Data Barang Bukti Yang Diambil sebagai berikut :
            </td>
        </tr>

        <tr>

            <td colspan="1"  >
                
            </td>

            <td colspan="5" class="px-3"style="border:1px solid black;border-bottom:0px solid black">
                Data Barang Bukti
            </td>

            <td colspan="5" class="px-3" style="border:1px solid black;border-bottom:0px solid black">
                
            </td>

            <td colspan="1">
            
            </td>
        </tr>

        <tr>
        
            <td colspan="1" >
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                <b>1. kWh Meter</b>
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                <b>3. Kabel</b>
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Merk/Type : 
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Jenis Kabel : 
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>


        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                No. Register :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Panjang Kabel :
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                No. Seri :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Tahun Pembuatan:
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                <b>4. Segel segel</b>
            </td>
        
            <td colspan="1">
                
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Class :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Tera :
            </td>
        
            <td colspan="1">
                
            </td>
        </tr>


        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Konstanta :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Terminal kWh Meter :
            </td>
        
            <td colspan="1">
                
            </td>
        </tr>


        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Rating Arus (ln) :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Box OK :
            </td>
        
            <td colspan="1">
                
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Tegangan Nomimal :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Box APP :
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Stand kWh Meter :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Alat Pembatas:
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                <b>2. Alat Pembatas Arus</b>
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                Alat Bantu Ukur
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Jenis pembatas :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
                
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3" style="border-left:1px solid black">
                Merk/Type :
            </td>
        
            <td colspan="5" class="px-3" style="border-right:1px solid black;border-left:1px solid black">
        
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>


        <tr>
        
            <td colspan="1">
        
            </td>
        
            <td colspan="5" class="px-3 pb-2" style="border:1px solid black;border-top:0px solid black">
                Rating Arus (ln) : 
            </td>
        
            <td colspan="5" class="px-3 pb-2" style="border:1px solid black;border-top:0px solid black">
        
            </td>
        
            <td colspan="1">
        
            </td>
        </tr>

        <tr>
            <td colspan="12"><br/></td>
        </tr>
    </table>

    <div class="page-break">
    </div>
    <table class="table table-borderless"
        style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black;">
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
                style="border:1px solid black;vertical-align: bottom;"> SERVICES BUSINESS UNIT<br />PT PELAYANAN LISTRIK
                NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA<br />
                PENGAMBILAN BARANG BUKTI<br /> PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)</td>
            <td colspan="2" class="header">No. Formulir</td>
            <td colspan="4" class="header">FORM-P2TL-SBU-03</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Revisi</td>
            <td colspan="4" class="header">0</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Tanggal</td>
            <td colspan="4" class="header">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" class="header">Halaman</td>
            <td colspan="4" class="header">2 dari 2</td>
        </tr>

        <tr>
            <td colspan="2" class="header">No. BA</td>
            <td colspan="4" class="header">{{ sprintf('%05d', $item->id); }}</td>
        </tr>



        <tr>
            <td colspan="12" class="px-3 pb-2">
                Selanjutnya Barang Bukti tersebut diatas dibawa untuk disimpan dan diamankan di gudang/
                laboratorium PLN sebagai barang titipan Penyidik sampai dengan dibuka dan diperiksa bersama oleh
                Para Pihak.
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3 pb-2">
                Demikian Berita Acara ini setelah dibaca, dibuat dan ditanda tangani oleh masing-masing pihak tersebut
                dalam rangkap 3 (tiga), satu rangkap untuk Pelanggan/Pemakai/Penghuni/Wakil Pelanggan/
                Penanggung Jawab Bangunan atau Persil yang diperiksa.
            </td>
        </tr>

        <tr>
            <td colspan="6" class="px-3 font-weight-bold text-center">
                Pelanggan/Pemakai/Penghuni/Wakil Pelanggan/<br/>
                Penanggung Jawab Bangunan atau Persil
            </td>

            <td colspan="6" class="px-3 font-weight-bold text-center">
                Tim P2TL
            </td>
        </tr>


        <tr>
            <td colspan="6" style="height:50px;" class="px-3 font-weight-bold text-center">
                
            </td>
        
            <td colspan="6" style="height:50px;" class="px-3 font-weight-bold text-center">
                
            </td>
        </tr>

        <tr>
            <td colspan="6" style="height:60px;" class="px-3 font-weight-bold text-center">
        
            </td>
        
            <td colspan="6" style="height:60px;" class="px-3 font-weight-bold text-center">
                ( .................... )
            </td>
        </tr>



        <tr>
            <td colspan="6" class="px-3 py-3 font-weight-bold text-center">
                ( .................... )
            </td>
        
            <td colspan="6" class="px-3 py-3 font-weight-bold text-center">
                ( .................... )
            </td>
        </tr>

        <tr>
            <td colspan="6" class="px-3 font-weight-bold text-center">
                Saksi
            </td>
        
            <td colspan="6" class="px-3 font-weight-bold text-center">
                Petugas Pendamping dari TNI, Polri
            </td>
        </tr>

        <tr>
            <td colspan="6" style="height:50px;" class="px-3 font-weight-bold text-center">
        
            </td>
        
            <td colspan="6" style="height:50px;" class="px-3 font-weight-bold text-center">
        
            </td>
        </tr>

        <tr>
            <td colspan="6" class="px-3 font-weight-bold text-center">
                ( .................... )
            </td>
        
            <td colspan="6" class="px-3 font-weight-bold text-center">
                ( .................... )
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3 py-3">
                Keterangan :<br/>
                * Agar diisi nama lengkap dan tanda tangan masing-masing
            </td>
        </tr>

    </table>
    

</body>

</html>