<!DOCTYPE html>
<html>

<head>
    <title>BA Serah Terima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .judul {
            font-size: 14px !important;
            border:1px solid black !important;
        }

        .header {
            border:1px solid black !important;
            border-spacing: 0px;
            border-collapse: collapse !important;
        }

        .isi {
            padding: 1rem !important
        }
        
        
        table.table td, table.table th {
            padding: 0;
            margin: 0;
        }
    </style>
</head>
    
<body>
    <table class="table table-borderless" style="font-size: 10px;border-collapse: collapse;padding:0;border:1px solid black">
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
            <td colspan="10" class="text-center font-weight-bold judul p-2" style="border:1px solid black;vertical-align: bottom;"> SERVICES BUSINESS UNIT<br/>PT PELAYANAN LISTRIK NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold judul" style="">BERITA ACARA<br /> PENGAMBILAN BARANG BUKTI<br /> PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)</td>
            <td colspan="2" class="header" >No. Formulir</td>
            <td colspan="4"  class="header">FORM-P2TL-SBU-03</td>
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
            <td colspan="12" class="px-3" >
                Pada hari ini, {{ $indonesianDay }} Tanggal {{ $tanggal_only }} Bulan {{ $indonesianMonth }} Tahun {{ $tahun }} Berdasarkan
                hasil
                dan
                kesimpulan pemeriksaan yang dilakukan oleh Tim P2TL sebagaimana tercantum dalam Berita Acara
                Hasil Pemeriksaan P2TL Nomor ............ Tanggal .............................. Dilakukan pengambilan Barang
                Bukti
                berupa peralatan hasil temuan P2TL oleh Penyidik P2TL/Petugas P2TL atas :
            </td>
        </tr>

       
        @php
            $users = \App\Models\User::where('regus_id', $item->work->regus_id)->get();
        @endphp

        @foreach ($users as $user)
            <tr >
                <td colspan="1">
                    <b class="pl-5" style="border: 0;">Nama</b>
                </td>
                <td colspan="11">
                    : {{ $user->name }}
                </td>
            </tr>
            
            <tr>

                <td colspan="1">
                    <b class="pl-5">NIP</b>
                </td>
                <td colspan="11">
                    : {{ $user->nip ?? "-" }}
                </td>
            </tr>
            
            
            <tr>
            
                <td colspan="1">
                    <b class="pl-5">Jabatan</b>
                </td>
                <td colspan="11">
                    : {{ $user->jabatan ?? "-" }}
                </td>
            </tr>
            
            <tr>
                <td colspan="1">
            
                </td>
                <td colspan="11">
                    Adalah Petugas Pelaksana Lapangan P2TL PLN yang bertugas melaksanakan pemeriksaan P2TL
                    berdasarkan Surat Tugas dari PLN nomor {{ $item->work->surat_tugas_p2tl ?? "-" }} Tanggal
                    @if (!empty($item->work->tanggal_surat_tugas_p2tl))
                        @php
                            $tanggal_surat = \Illuminate\Support\Carbon::parse($item->work->tanggal_surat_tugas_p2tl)
                        @endphp
                        
                        {{ $tanggal_surat->toDateString()}}
                    @else
                        -
                    @endif
                    
                </td>
            
            </tr>
        @endforeach
        


        <tr>
            <td colspan="12" class="px-3 font-weight-bold">
                Petugas pelaksana lapangan P2TL telah menyerahkan kepada Petugas Administrasi P2TL, dan Petugas
            </td>        
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Administrasi P2TL telah menerima dari Petugas Pelaksana Lapangan P2TL, seluruh dokumen
                Pelaksanaan P2TL yang berupa Berita Acara Hasil Pemeriksaan P2TL beserta Berita Acara P2TL
                lainnya yang terkait, serta barang bukti P2TL sebagaimana dimaksud pada lampiran Berita Acara :
            </td>
        </tr>

        <tr>
            <td class="px-3" colspan="3">
                Nomor BA Pengambilan Barang Bukti P2TL
            </td>

            <td colspan="9">
               : {{ $item->id }}
            </td>
        </tr>

        <tr>
            <td class="px-3" colspan="3">
                Tanggal BA
            </td>
        
            <td colspan="9">
                : {{ $item->tanggal_serah_terima }}
            </td>
        </tr>

        <tr>
            <td class="px-3" colspan="3">
                Nomor ID Pelanggan
            </td>
        
            <td colspan="9">
                : {{ $item->work->id_pelanggan }}
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Dalam keadaan lengkap dan tersegel dengan ketentuan sebagai berikut:
            </td>
        </tr>

        <tr>
            <td colspan="12" >
                <ol>
                    <li>
                        Dokumen dan barang bukti tersebut diserah terimakan dalam rangka pemeriksaan tindak lanjut
                        hasil temuan P2TL.
                    </li>
                    <li>
                        Dengan diserah terimakannya Dokumen dan Barang Bukti tersebut, maka hak dan tanggung jawab
                        Petugas Pelaksana Lapangan P2TL atas Dokumen dan Barang Bukti tersebut beralih ke Petugas
                        Administrasi P2TL.
                    </li>
                </ol>
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                Demikian Berita Acara ini dibuat dengan sebenarnya.
            </td>
        </tr>


        <tr>
            <td colspan="6" class="text-center" class="px-5">
                Petugas Administrasi P2TL
            </td>
            <td colspan="6" class="text-center" class="px-5">
                Petugas Pelaksana Lapangan P2TL
            </td>
        </tr>


        <tr>
            <td colspan="6" class="px-5" style="height: 100px !important">
                
            </td>
        
            <td colspan="6" class="px-5" style="height: 100px !important">
                
            </td>
        </tr>
        <tr>
            <td colspan="6" class="px-5">
                .......................
            </td>

            <td colspan="6" class="px-5">
                .......................
            </td>
        </tr>


        <tr>
            <td colspan="12" class="px-3">
                Keterangan : 
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                1. Coret Yang Tidak Perlu
            </td>
        </tr>

        <tr>
            <td colspan="12" class="px-3">
                2. Diisi nama terang dan tanda tangan masing-masing
            </td>
        </tr>
        
        <tr>
            <td colspan="12" class="px-3">
                <br />
            </td>
        </tr>
        



    </table>

</body>

</html>