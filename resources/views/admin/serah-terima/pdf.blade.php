<!DOCTYPE html>
<html>

<head>
    <title>BA Serah Terima</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <table class="table table-bordered">
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
        </tr>
        
        <tr>
            <td colspan="3" style="border-bottom: 3px black !important"><img src="img/bright.png" class="w-auto"
                    style="height: 50px"></td>
            <td colspan="7" class="text-center font-weight-bold" style="border-bottom: 3px black !important"> SERVICES BUSINESS UNIT
            PT PELAYANAN LISTRIK NASIONAL BATAM</td>
        </tr>

        <tr>
            <td colspan="6" rowspan="5" class="text-center font-weight-bold" style="border-bottom: 3px black !important">BERITA ACARA PENGAMBILAN BARANG BUKTI PENERTIBAN PEMAKAIAN TENAGA LISTRIK (P2TL)</td>
            <td colspan="2" style="border-bottom: 3px black !important">No. Formulir</td>
            <td colspan="2" style="border-bottom: 3px black !important">FORM-P2TL-SBU-03</td>
        </tr>

        <tr>
            <td colspan="2" style="border-bottom: 3px black !important">Revisi</td>
            <td colspan="2" style="border-bottom: 3px black !important">0</td>
        </tr>

        <tr>
            <td colspan="2" style="border-bottom: 3px black !important">Tanggal</td>
            <td colspan="2" style="border-bottom: 3px black !important">22 Juni 2022</td>
        </tr>

        <tr>
            <td colspan="2" style="border-bottom: 3px black !important">Halaman</td>
            <td colspan="2" style="border-bottom: 3px black !important">1 dari 2</td>
        </tr>

        <tr>
            <td colspan="2" style="border-bottom: 3px black !important">No. BA</td>
            <td colspan="2" style="border-bottom: 3px black !important">{{ sprintf('%05d', $item->id); }}</td>
        </tr>


        @php
            $now = \Illuminate\Support\Carbon::parse($item->tanggal_serah_terima)->locale('id_ID');
            // $now = \Illuminate\Support\Carbon::now()->locale('id');

            $tanggal = $now->format('d');
            $tahun = $now->format('Y');

        @endphp
        <tr>
            <td colspan="10">
                Pada hari ini, {{ $now->formatLocalized('%A'); }} Tanggal {{ $tanggal }} Bulan ....................... Tahun {{ $tahun }} Berdasarkan
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
            <tr>
                <td colspan="1">
            
                </td>
                <td colspan="2">
                    Nama
                </td>
                <td colspan="7">
                    : {{ $user->name }}
                </td>
            </tr>
            
            <tr>
                <td colspan="1">
            
                </td>
                <td colspan="2">
                    NIP
                </td>
                <td colspan="7">
                    : {{ $user->id }}
                </td>
            </tr>
            
            
            <tr>
                <td colspan="1">
            
                </td>
                <td colspan="2">
                    Jabatan
                </td>
                <td colspan="7">
                    : {{ $user->roles }}
                </td>
            </tr>
            
            <tr>
                <td colspan="1">
            
                </td>
                <td colspan="9">
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
            <td colspan="10" class="font-weight-bold">
                Petugas pelaksana lapangan P2TL telah menyerahkan kepada Petugas Administrasi P2TL, dan Petugas
            </td>        
        </tr>

        <tr>
            <td colspan="10">
                Administrasi P2TL telah menerima dari Petugas Pelaksana Lapangan P2TL, seluruh dokumen
                Pelaksanaan P2TL yang berupa Berita Acara Hasil Pemeriksaan P2TL beserta Berita Acara P2TL
                lainnya yang terkait, serta barang bukti P2TL sebagaimana dimaksud pada lampiran Berita Acara :
            </td>
        </tr>

        <tr>
            <td colspan="4">
                Nomor BA Pengambilan Barang Bukti P2TL
            </td>

            <td colspan="6">
               : {{ $item->id }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                Tanggal BA :
            </td>
        
            <td colspan="6">
                : {{ $item->tanggal_serah_terima }}
            </td>
        </tr>

        <tr>
            <td colspan="4">
                Nomor ID Pelanggan :
            </td>
        
            <td colspan="6">
                : {{ $item->work->id_pelanggan }}
            </td>
        </tr>

        <tr>
            <td colspan="10">
                Dalam keadaan lengkap dan tersegel dengan ketentuan sebagai berikut:
            </td>
        </tr>

        <tr>
            <td colspan="1">
                1.
            </td>
            <td colspan="9">
                Dokumen dan barang bukti tersebut diserah terimakan dalam rangka pemeriksaan tindak lanjut
                hasil temuan P2TL.
            </td>
        </tr>

        <tr>
            <td colspan="1">
                2.
            </td>
            <td colspan="9">
                Dengan diserah terimakannya Dokumen dan Barang Bukti tersebut, maka hak dan tanggung jawab
                Petugas Pelaksana Lapangan P2TL atas Dokumen dan Barang Bukti tersebut beralih ke Petugas
                Administrasi P2TL.
            </td>
        </tr>

        <tr>
            <td colspan="10">
                Demikian Berita Acara ini dibuat dengan sebenarnya.
            </td>
        </tr>


        <tr>
            <td colspan="5" class="text-center">
                Petugas Administrasi P2TL
            </td>
            <td colspan="5" class="text-center">
                Petugas Pelaksana Lapangan P2TL
            </td>
        </tr>


        <tr>
            <td colspan="5">
                .......................
            </td>

            <td colspan="5">
                .......................
            </td>
        </tr>


        <tr>
            <td colspan="10">
                Keterangan : 
            </td>
        </tr>

        <tr>
            <td colspan="10">
                1. Coret Yang Tidak Perlu
            </td>
        </tr>

        <tr>
            <td colspan="10">
                2. Diisi nama terang dan tanda tangan masing-masing
            </td>
        </tr>
        

        



    </table>

    <table class="table table-striped">
        <tbody>
            

        </tbody>
    </table>
    <br />

    <table class="table table-striped">
        <thead>
            

        </thead>
        <tbody>
            
        </tbody>
    </table>

    <table class="table table-striped">
        <tbody>
            {{-- <tr>
                <td rowspan="2">
                    This is Computer generated document.<br />
                    No Signatured Needed
                </td>
                <td>
                    Subtotal:
                    @if ($item->user->roles == 'Indonesia Reguler' || $item->user->roles == 'Indonesia Student' ||
                    $item->user->roles == 'Poster Reguler' || $item->user->roles =='Poster Student' )
                    Rp.

                    @else
                    USD
                    @endif
                    {{ $item->nominal_transfer }}
                </td>
            </tr>
            <tr>
                <td>
                    Total:
                    @if ($item->user->roles == 'Indonesia Reguler' || $item->user->roles == 'Indonesia Student' ||
                    $item->user->roles == 'Poster Reguler' || $item->user->roles =='Poster Student' )
                    Rp.

                    @else
                    USD
                    @endif
                    {{ $item->nominal_transfer }}
                </td>
            </tr> --}}
        </tbody>
    </table>

</body>

</html>