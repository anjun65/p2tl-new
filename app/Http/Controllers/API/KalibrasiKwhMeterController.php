<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalibrasiKwhMeter;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseFormatter;
use App\Models\KalibrasiDataKwhMeter;
use App\Models\KalibrasiDataKwhMeterLanjutan;
use App\Models\KalibrasiUjiAkurasi;

class KalibrasiKwhMeterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas_saksi' => ['nullable'],
            'pekerjaan' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'foto_identitas' => ['nullable', 'image'],
            'kwh_merk' => ['nullable'],
            'kwh_no_reg' => ['nullable'],
            'kwh_no_seri' => ['nullable'],
            'kwh_tahun_pembuatan' => ['nullable'],
            'kwh_konstanta' => ['nullable'],
            'kwh_class' => ['nullable'],
            'kwh_rating_arus' => ['nullable'],
            'kwh_tegangan_nominal' => ['nullable'],
            'kwh_stand_kwh' => ['nullable'],
            'kwh_keterangan' => ['nullable'],
            'kwh_video' => ['nullable'],
            'posisi_atas_a' => ['nullable'],
            'posisi_atas_b' => ['nullable'],
            'posisi_atas_c' => ['nullable'],
            'posisi_kanan_a' => ['nullable'],
            'posisi_kanan_b' => ['nullable'],
            'posisi_kanan_c' => ['nullable'],
            'posisi_kiri_a' => ['nullable'],
            'posisi_kiri_b' => ['nullable'],
            'posisi_kiri_c' => ['nullable'],
            'posisi_video' => ['nullable'],
            'uji_tegangan_100' => ['nullable'],
            'uji_arus_100' => ['nullable'],
            'uji_nilai_akurasi_100' => ['nullable'],
            'uji_keterangan_100' => ['nullable'],
            'uji_tegangan_50' => ['nullable'],
            'uji_arus_50' => ['nullable'],
            'uji_nilai_akurasi_50' => ['nullable'],
            'uji_keterangan_50' => ['nullable'],
            'uji_tegangan_5' => ['nullable'],
            'uji_arus_5' => ['nullable'],
            'uji_nilai_akurasi_5' => ['nullable'],
            'uji_keterangan_5' => ['nullable'],
            'uji_merk' => ['nullable'],
            'uji_type' => ['nullable'],
            'uji_no_seri' => ['nullable'],
            'uji_kesimpulan' => ['nullable'],
            'uji_video' => ['nullable'],
        ]);

        $form = KalibrasiKwhMeter::where('works_id', $request->works_id)->first();

        $locate_kalibrasi = "";
        if ($request->akhir_foto_barang_bukti) {
            $new_image = Storage::disk('public')->put('assets/kalibrasi/identitas', $request->foto_identitas);

            if ($new_image) {
                $locate_kalibrasi = $new_image;
            }
        }

        if ($form) {
            $form->update([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas_saksi' => $request->nomor_identitas_saksi,
                'pekerjaan_saksi' => $request->pekerjaan,
                'no_telp_saksi' => $request->no_telpon_saksi,
                'file' => $locate_kalibrasi,
            ]);
        } else {
            $form = KalibrasiKwhMeter::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $request->nama_saksi,
                'alamat_saksi' => $request->alamat_saksi,
                'nomor_identitas_saksi' => $request->nomor_identitas_saksi,
                'pekerjaan_saksi' => $request->pekerjaan,
                'no_telp_saksi' => $request->no_telpon_saksi,
                'file' => $locate_kalibrasi,
            ]);
        }


        //Data kWh Meter

        $form_data_kwh = KalibrasiDataKwhMeter::where('forms_id', $form->id)->first();


        $locate_kwh_video = "";
        if ($request->kwh_video) {
            $new_image = Storage::disk('public')->put('assets/kalibrasi/data-kwh', $request->kwh_video);

            if ($new_image) {
                $locate_kwh_video = $new_image;
            }
        }

        if (empty($form_data_kwh)) {
            $form_data_kwh = KalibrasiDataKwhMeter::create([
                'forms_id' => $form->id,
                'merk' => $request->kwh_merk,
                'no_register' => $request->kwh_no_reg,
                'no_seri' => $request->kwh_no_seri,
                'tahun_pembuatan' => $request->kwh_tahun_pembuatan,
                'class' => $request->kwh_konstanta,
                'konstanta' => $request->kwh_class,
                'rating_arus' => $request->kwh_rating_arus,
                'tegangan_nominal' => $request->kwh_tegangan_nominal,
                'stand_kwh_meter' => $request->kwh_stand_kwh,
                'keterangan' => $request->kwh_keterangan,
                'file' => $locate_kwh_video,
            ]);
        } else {
            $form_data_kwh->forms_id = $form->id;
            $form_data_kwh->merk = $request->kwh_merk;
            $form_data_kwh->no_register = $request->kwh_no_reg;
            $form_data_kwh->no_seri = $request->kwh_no_seri;
            $form_data_kwh->tahun_pembuatan = $request->kwh_tahun_pembuatan;
            $form_data_kwh->class = $request->kwh_konstanta;
            $form_data_kwh->konstanta = $request->kwh_class;
            $form_data_kwh->rating_arus = $request->kwh_rating_arus;
            $form_data_kwh->tegangan_nominal = $request->kwh_tegangan_nominal;
            $form_data_kwh->stand_kwh_meter = $request->kwh_stand_kwh;
            $form_data_kwh->keterangan = $request->kwh_keterangan;
            $form_data_kwh->file = $locate_kwh_video;

            $form_data_kwh->save();
        }


        //Data kWh Meter Lanjutan

        $form_data_kwh_lanjutan = KalibrasiDataKwhMeterLanjutan::where('forms_id', $form->id)->first();


        $locate_posisi_video = "";
        if ($request->posisi_video) {
            $new_image = Storage::disk('public')->put('assets/kalibrasi/data-kwh-lanjutan', $request->posisi_video);

            if ($new_image) {
                $locate_posisi_video = $new_image;
            }
        }

        if (empty($form_data_kwh_lanjutan)) {
            $form_data_kwh_lanjutan = KalibrasiDataKwhMeterLanjutan::create([
                'forms_id' => $form->id,
                'atas_a' => $request->posisi_atas_a,
                'atas_b' => $request->posisi_atas_b,
                'atas_keterangan' => $request->posisi_atas_c,
                'kanan_a' => $request->posisi_kanan_a,
                'kanan_b' => $request->posisi_kanan_b,
                'kanan_keterangan' => $request->posisi_kanan_c,
                'kiri_a' => $request->posisi_kiri_a,
                'kiri_b' => $request->posisi_kiri_b,
                'kiri_keterangan' => $request->posisi_kiri_c,
                'file' => $locate_posisi_video,
            ]);
        } else {
            $form_data_kwh_lanjutan->forms_id = $form->id;
            $form_data_kwh_lanjutan->atas_a = $request->posisi_atas_a;
            $form_data_kwh_lanjutan->atas_b = $request->posisi_atas_b;
            $form_data_kwh_lanjutan->atas_keterangan = $request->posisi_atas_c;
            $form_data_kwh_lanjutan->kanan_a = $request->posisi_kanan_a;
            $form_data_kwh_lanjutan->kanan_b = $request->posisi_kanan_b;
            $form_data_kwh_lanjutan->kanan_keterangan = $request->posisi_kanan_c;
            $form_data_kwh_lanjutan->kiri_a = $request->posisi_kiri_a;
            $form_data_kwh_lanjutan->kiri_b = $request->posisi_kiri_b;
            $form_data_kwh_lanjutan->kiri_keterangan = $request->posisi_kiri_c;
            $form_data_kwh_lanjutan->file = $locate_posisi_video;

            $form_data_kwh_lanjutan->save();
        }

        //Data Uji

        $form_data_uji = KalibrasiUjiAkurasi::where('forms_id', $form->id)->first();

        $locate_uji_video = "";
        if ($request->uji_video) {
            $new_image = Storage::disk('public')->put('assets/kalibrasi/akurasi', $request->uji_video);

            if ($new_image) {
                $locate_uji_video = $new_image;
            }
        }

        if (empty($form_data_uji)) {
            $form_data_uji = KalibrasiUjiAkurasi::create([
                'forms_id' => $form->id,
                'beban_100_tegangan' => $request->uji_tegangan_100,
                'beban_100_arus' => $request->uji_arus_100,
                'beban_100_akurasi' => $request->uji_nilai_akurasi_100,
                'beban_100_keterangan' => $request->uji_keterangan_100,
                'beban_50_tegangan' => $request->uji_tegangan_50,
                'beban_50_arus' => $request->uji_arus_50,
                'beban_50_akurasi' => $request->uji_nilai_akurasi_50,
                'beban_50_keterangan' => $request->uji_keterangan_50,
                'beban_5_tegangan' => $request->uji_tegangan_5,
                'beban_5_arus' => $request->uji_arus_5,
                'beban_5_akurasi' => $request->uji_nilai_akurasi_5,
                'beban_5_keterangan' => $request->uji_keterangan_5,
                'alat_uji_merk' => $request->uji_merk,
                'alat_uji_type' => $request->uji_type,
                'alat_uji_no_seri' => $request->uji_no_seri,
                'kesimpulan' => $request->uji_kesimpulan,
                'file' => $locate_uji_video,
            ]);
        } else {
            $form_data_uji->forms_id = $form->id;
            $form_data_uji->beban_100_tegangan = $request->uji_tegangan_100;
            $form_data_uji->beban_100_arus = $request->uji_arus_100;
            $form_data_uji->beban_100_akurasi = $request->uji_nilai_akurasi_100;
            $form_data_uji->beban_100_keterangan = $request->uji_keterangan_100;
            $form_data_uji->beban_50_tegangan = $request->uji_tegangan_50;
            $form_data_uji->beban_50_arus = $request->uji_arus_50;
            $form_data_uji->beban_50_akurasi = $request->uji_nilai_akurasi_50;
            $form_data_uji->beban_50_keterangan = $request->uji_keterangan_50;
            $form_data_uji->beban_5_tegangan = $request->uji_tegangan_5;
            $form_data_uji->beban_5_arus = $request->uji_arus_5;
            $form_data_uji->beban_5_akurasi = $request->uji_nilai_akurasi_5;
            $form_data_uji->beban_5_keterangan = $request->uji_keterangan_5;
            $form_data_uji->alat_uji_merk = $request->uji_merk;
            $form_data_uji->alat_uji_type = $request->uji_type;
            $form_data_uji->alat_uji_no_seri = $request->uji_no_seri;
            $form_data_uji->kesimpulan = $request->uji_kesimpulan;
            $form_data_uji->file = $locate_uji_video;

            $form_data_uji->save();
        }


        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
