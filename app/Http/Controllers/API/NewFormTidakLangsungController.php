<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTidakLangsung;
use App\Models\FormTidakLangsungDataApp;
use App\Helpers\ResponseFormatter;
use App\Models\FormTidakLangsungDataPemeriksaanBoxAmr;
use App\Models\FormTidakLangsungDataPemeriksaanKubikel;
use App\Models\FormTidakLangsungDataPemeriksaanPelindungCt;
use App\Models\FormTidakLangsungDataPemeriksaanPelindungKwh;
use App\Models\FormTidakLangsungDataPemeriksaanPintuGardu;
use App\Models\FormTidakLangsungDataPemeriksaanSegelMetrologi;
use App\Models\FormTidakLangsungDataPemeriksaanTerminalCt;
use App\Models\FormTidakLangsungDataPemeriksaanTutupTerminal;
use App\Models\FormTidakLangsungHasilPemeriksaan;
use App\Models\FormTidakLangsungPemeriksaanPengukuran;
use App\Models\FormTidakLangsungWiringApp;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class NewFormTidakLangsungController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'works_id' => ['required'],
            'nama_saksi' => ['nullable'],
            'alamat_saksi' => ['nullable'],
            'nomor_identitas' => ['nullable'],
            'pekerjaan' => ['nullable'],
            'no_telpon_saksi' => ['nullable'],
            'file_nomor_identitas' => ['nullable'],

            'data_tegangan_tersambung' => ['required'],
            'data_jenis_pengukuran' => ['required'],
            'data_tempat_kedudukan' => ['required'],
            'pembatas_jenis' => ['required'],
            'pembatas_merk' => ['required'],
            'pembatas_rating_arus' => ['required'],
            'pembatas_foto_pembatas' => ['required'],
            'kwh_merk' => ['required'],
            'kwh_no_reg' => ['required'],
            'kwh_no_seri' => ['required'],
            'kwh_tahun' => ['required'],
            'kwh_konstanta' => ['required'],
            'kwh_class' => ['required'],
            'kwh_rating_arus' => ['required'],
            'kwh_tegangan' => ['required'],
            'kwh_lbp' => ['required'],
            'kwh_bp' => ['required'],
            'kwh_total' => ['required'],
            'kwh_kvarh' => ['required'],
            'kwh_foto' => ['required'],

            // 'ct_merk' => ['required'],
            // 'ct_cls' => ['required'],
            // 'ct_rasio' => ['required'],
            // 'ct_burden' => ['required'],
            // 'ct_foto' => ['required'],
            // 'pt_merk' => ['required'],
            // 'pt_cls' => ['required'],
            // 'pt_rasio' => ['required'],
            // 'pt_burden' => ['required'],
            // 'pt_foto' => ['required'],

            // 'kubikel_merk' => ['required'],
            // 'kubikel_type' => ['required'],
            // 'kubikel_no_seri' => ['required'],
            // 'kubikel_tahun' => ['required'],
            // 'kubikel_foto' => ['required'],

            // 'box_app_merk' => ['required'],
            // 'box_app_type' => ['required'],
            // 'box_app_no_seri' => ['required'],
            // 'box_app_tahun' => ['required'],
            // 'box_app_foto' => ['required'],


            // 'pelindung_kwh_peralatan' => ['required'],
            // 'pelindung_kwh_segel' => ['required'],
            // 'pelindung_kwh_nomor_tahun_kode_segel' => ['required'],
            // 'pelindung_kwh_keterangan' => ['required'],
            // 'pelindung_kwh_foto_sebelum' => ['required'],
            // 'pelindung_kwh_post_peralatan' => ['required'],
            // 'pelindung_kwh_post_segel' => ['required'],
            // 'pelindung_kwh_post_nomor_tahun_kode_segel' => ['required'],
            // 'pelindung_kwh_foto_sesudah' => ['required'],

            // 'pelindung_ct_peralatan' => ['required'],
            // 'pelindung_ct_segel' => ['required'],
            // 'pelindung_ct_nomor_tahun_kode_segel' => ['required'],
            // 'pelindung_ct_keterangan' => ['required'],
            // 'pelindung_ct_foto_sebelum' => ['required'],
            // 'pelindung_ct_post_peralatan' => ['required'],
            // 'pelindung_ct_post_segel' => ['required'],
            // 'pelindung_ct_post_nomor_tahun_kode_segel' => ['required'],
            // 'pelindung_ct_foto_sesudah' => ['required'],

            // 'segel_peralatan' => ['required'],
            // 'segel_segel' => ['required'],
            // 'segel_nomor_tahun_kode_segel' => ['required'],
            // 'segel_keterangan' => ['required'],
            // 'segel_foto_sebelum' => ['required'],
            // 'segel_post_peralatan' => ['required'],
            // 'segel_post_segel' => ['required'],
            // 'segel_post_nomor_tahun_kode_segel' => ['required'],
            // 'segel_foto_sesudah' => ['required'],

            // 'tutup_terminal_peralatan' => ['required'],
            // 'tutup_terminal_segel' => ['required'],
            // 'tutup_terminal_nomor_tahun_kode_segel' => ['required'],
            // 'tutup_terminal_keterangan' => ['required'],
            // 'tutup_terminal_foto_sebelum' => ['required'],
            // 'tutup_terminal_post_peralatan' => ['required'],
            // 'tutup_terminal_post_segel' => ['required'],
            // 'tutup_terminal_post_nomor_tahun_kode_segel' => ['required'],
            // 'tutup_terminal_foto_sesudah' => ['required'],

            // 'amr_peralatan' => ['required'],
            // 'amr_segel' => ['required'],
            // 'amr_nomor_tahun_kode_segel' => ['required'],
            // 'amr_keterangan' => ['required'],
            // 'amr_foto_sebelum' => ['required'],
            // 'amr_post_peralatan' => ['required'],
            // 'amr_post_segel' => ['required'],
            // 'amr_post_nomor_tahun_kode_segel' => ['required'],
            // 'amr_foto_sesudah' => ['required'],

            // 'terminal_vt_peralatan' => ['required'],
            // 'terminal_vt_segel' => ['required'],
            // 'terminal_vt_nomor_tahun_kode_segel' => ['required'],
            // 'terminal_vt_keterangan' => ['required'],
            // 'terminal_vt_foto_sebelum' => ['required'],
            // 'terminal_vt_post_peralatan' => ['required'],
            // 'terminal_vt_post_segel' => ['required'],
            // 'terminal_vt_post_nomor_tahun_kode_segel' => ['required'],
            // 'terminal_vt_foto_sesudah' => ['required'],

            // 'terminal_ct_peralatan' => ['required'],
            // 'terminal_ct_segel' => ['required'],
            // 'terminal_ct_nomor_tahun_kode_segel' => ['required'],
            // 'terminal_ct_keterangan' => ['required'],
            // 'terminal_ct_foto_sebelum' => ['required'],
            // 'terminal_ct_post_peralatan' => ['required'],
            // 'terminal_ct_post_segel' => ['required'],
            // 'terminal_ct_post_nomor_tahun_kode_segel' => ['required'],
            // 'terminal_ct_foto_sesudah' => ['required'],

            // 'pintu_peralatan' => ['required'],
            // 'pintu_segel' => ['required'],
            // 'pintu_nomor_tahun_kode_segel' => ['required'],
            // 'pintu_keterangan' => ['required'],
            // 'pintu_foto_sebelum' => ['required'],
            // 'pintu_post_peralatan' => ['required'],
            // 'pintu_post_segel' => ['required'],
            // 'pintu_post_nomor_tahun_kode_segel' => ['required'],
            // 'pintu_foto_sesudah' => ['required'],
            // 'pintu_keterangan_all' => ['required'],

            // 'wiring_terminal1' => ['required'],
            // 'wiring_terminal2' => ['required'],
            // 'wiring_terminal3' => ['required'],
            // 'wiring_terminal4' => ['required'],
            // 'wiring_terminal5' => ['required'],
            // 'wiring_terminal6' => ['required'],
            // 'wiring_terminal7' => ['required'],
            // 'wiring_terminal8' => ['required'],
            // 'wiring_terminal9' => ['required'],
            // 'wiring_terminal11' => ['required'],
            // 'wiring_grounding' => ['required'],
            // 'wiring_keterangan' => ['required'],
            // 'wiring_diagram' => ['required'],
            // 'wiring_foto' => ['required'],

            // 'pengukuran_arus_primer_r' => ['required'],
            // 'pengukuran_arus_primer_s' => ['required'],
            // 'pengukuran_arus_primer_t' => ['required'],
            // 'pengukuran_arus_sekunder_r' => ['required'],
            // 'pengukuran_arus_sekunder_s' => ['required'],
            // 'pengukuran_arus_sekunder_t' => ['required'],
            // 'pengukuran_ct_r' => ['required'],
            // 'pengukuran_ct_s' => ['required'],
            // 'pengukuran_ct_t' => ['required'],
            // 'pengukuran_akurasi_r' => ['required'],
            // 'pengukuran_akurasi_s' => ['required'],
            // 'pengukuran_akurasi_t' => ['required'],
            // 'pengukuran_voltase_primer_r' => ['required'],
            // 'pengukuran_voltase_primer_s' => ['required'],
            // 'pengukuran_voltase_primer_t' => ['required'],
            // 'pengukuran_voltase_sekunder_r' => ['required'],
            // 'pengukuran_voltase_sekunder_s' => ['required'],
            // 'pengukuran_voltase_sekunder_t' => ['required'],
            // 'pengukuran_cos_r' => ['required'],
            // 'pengukuran_cos_s' => ['required'],
            // 'pengukuran_cos_t' => ['required'],
            // 'pengukuran_akurasi' => ['required'],
            // 'pengukuran_keterangan' => ['required'],
            // 'pengukuran_foto' => ['required'],

            // 'akhir_hasil_pemeriksaan' => ['required'],
            // 'akhir_kesimpulan' => ['required'],
            // 'akhir_tindakan' => ['required'],
            // 'akhir_barang_bukti' => ['required'],
            // 'akhir_tanggal_penyelesaian' => ['required'],
            // 'akhir_foto_barang_bukti' => ['required'],
            // 'akhir_labor' => ['required'],
        ]);

        //Saksi

        $form = FormTidakLangsung::where('works_id', $request->works_id)->first();

        $locate_file_nomor_identitas = "";

        if ($request->file_nomor_identitas) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/saksi', $request->file_nomor_identitas);

            if ($new_image) {
                $locate_file_nomor_identitas = $new_image;
            }
        }

        $nama_saksi = '';
        $alamat_saksi = '';
        $nomor_identitas = '';
        $no_telpon_saksi = '';
        $pekerjaan = '';

        if ($request->nama_saksi !== 'null' && $request->nama_saksi != NULL) {
            $nama_saksi = $request->nama_saksi;
        }

        if ($request->alamat_saksi !== 'null' && $request->alamat_saksi != NULL) {
            $alamat_saksi = $request->alamat_saksi;
        }

        if ($request->nomor_identitas !== 'null' && $request->nomor_identitas != NULL) {
            $nomor_identitas = $request->nomor_identitas;
        }

        if ($request->pekerjaan !== 'null' && $request->pekerjaan != NULL) {
            $pekerjaan = $request->pekerjaan;
        }

        if ($request->no_telpon_saksi !== 'null' && $request->no_telpon_saksi != NULL) {
            $no_telpon_saksi = $request->no_telpon_saksi;
        }

        if (empty($form)) {
            $form = FormTidakLangsung::create([
                'works_id' => $request->works_id,
                'nama_saksi' => $nama_saksi,
                'alamat_saksi' => $alamat_saksi,
                'nomor_identitas' => $nomor_identitas,
                'no_telpon_saksi' => $no_telpon_saksi,
                'pekerjaan' => $pekerjaan,
                'file_nomor_identitas' => $locate_file_nomor_identitas,
            ]);
        } else {
            $form->works_id = $request->works_id;
            $form->nama_saksi = $nama_saksi;
            $form->alamat_saksi = $alamat_saksi;
            $form->nomor_identitas = $nomor_identitas;
            $form->no_telpon_saksi = $no_telpon_saksi;
            $form->file_nomor_identitas = $locate_file_nomor_identitas;

            $form->save();
        }

        //Form Data App

        $form_app = FormTidakLangsungDataApp::where('forms_id', $form->id)->first();


        $locate_pembatas_foto_pembatas = "";

        if ($request->pembatas_foto_pembatas) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pembatas', $request->pembatas_foto_pembatas);

            if ($new_image) {
                $locate_pembatas_foto_pembatas = $new_image;
            }
        }

        $locate_kwh_foto = "";

        if ($request->kwh_foto) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/kwh', $request->kwh_foto);

            if ($new_image) {
                $locate_kwh_foto = $new_image;
            }
        }


        $locate_ct_foto = "";
        if ($request->ct_foto) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/ct', $request->ct_foto);

            if ($new_image) {
                $locate_ct_foto = $new_image;
            }
        }

        $locate_pt_foto = "";
        if ($request->pt_foto) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/pt', $request->pt_foto);

            if ($new_image) {
                $locate_pt_foto = $new_image;
            }
        }

        $locate_kubikel_foto = "";
        if ($request->kubikel_foto) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/kubikel', $request->kubikel_foto);

            if ($new_image) {
                $locate_kubikel_foto = $new_image;
            }
        }

        $locate_box_app_foto = "";
        if ($request->box_app_foto) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/dataapp/box_app', $request->box_app_foto);

            if ($new_image) {
                $locate_box_app_foto = $new_image;
            }
        }


        if (empty($form_app)) {
            $form_app = FormTidakLangsungDataApp::create([
                'forms_id' => $form->id,
                'data_tegangan_tersambung' => $request->data_tegangan_tersambung,
                'data_jenis_pengukuran' => $request->data_jenis_pengukuran,
                'data_tempat_kedudukan' => $request->data_tempat_kedudukan,
                'merk' => $request->pembatas_merk,
                'no_seri' => $request->pembatas_jenis,
                'rating_arus' => $request->pembatas_rating_arus,
                'kwh_merk' => $request->kwh_merk,
                'kwh_no_reg' => $request->kwh_no_reg,
                'kwh_no_seri' => $request->kwh_no_seri,
                'kwh_tahun_buat' => $request->kwh_tahun,
                'kwh_konstanta' => $request->kwh_konstanta,
                'kwh_class' => $request->kwh_class,
                'kwh_rating_arus' => $request->kwh_rating_arus,
                'kwh_tegangan_nominal' => $request->kwh_tegangan,
                'kwh_stand_mtr_lbp' => $request->kwh_lbp,
                'kwh_stand_mtr_bp' => $request->kwh_bp,
                'kwh_stand_total' => $request->kwh_total,
                'kwh_stand_kvarh' => $request->kwh_kvarh,
                'ct_merk' => $request->ct_merk,
                'ct_cls' => $request->ct_cls,
                'ct_rasio' => $request->ct_rasio,
                'ct_burden' => $request->ct_burden,
                'pt_merk' => $request->pt_merk,
                'pt_cls' => $request->pt_cls,
                'pt_rasio' => $request->pt_rasio,
                'pt_burden' => $request->pt_burden,
                'kubikel_merk' => $request->kubikel_merk,
                'kubikel_type' => $request->kubikel_type,
                'kubikel_no_seri' => $request->kubikel_no_seri,
                'kubikel_tahun' => $request->kubikel_tahun,
                'box_app_merk' => $request->box_app_merk,
                'box_app_type' => $request->box_app_type,
                'box_app_no_seri' => $request->box_app_no_seri,
                'box_app_tahun' => $request->box_app_tahun,
                'file_alat_pembatas' => $locate_pembatas_foto_pembatas,
                'file_kwh_meter' => $locate_kwh_foto,
                'file_trafo_arus' => $locate_ct_foto,
                'file_trafo_tegangan' => $locate_pt_foto,
                'file_kubikel' => $locate_kubikel_foto,
                'file_box_app' => $locate_box_app_foto,

            ]);
        } else {
            $form_app->forms_id = $form->id;
            $form_app->data_tegangan_tersambung = $request->data_tegangan_tersambung;
            $form_app->data_jenis_pengukuran = $request->data_jenis_pengukuran;
            $form_app->data_tempat_kedudukan = $request->data_tempat_kedudukan;
            $form_app->merk = $request->pembatas_merk;
            $form_app->no_seri = $request->pembatas_jenis;
            $form_app->rating_arus = $request->pembatas_rating_arus;
            $form_app->kwh_merk = $request->kwh_merk;
            $form_app->kwh_no_reg = $request->kwh_no_reg;
            $form_app->kwh_no_seri = $request->kwh_no_seri;
            $form_app->kwh_tahun_buat = $request->kwh_tahun;
            $form_app->kwh_konstanta = $request->kwh_konstanta;
            $form_app->kwh_class = $request->kwh_class;
            $form_app->kwh_rating_arus = $request->kwh_rating_arus;
            $form_app->kwh_tegangan_nominal = $request->kwh_tegangan;
            $form_app->kwh_stand_mtr_lbp = $request->kwh_lbp;
            $form_app->kwh_stand_mtr_bp = $request->kwh_bp;
            $form_app->kwh_stand_total = $request->kwh_total;
            $form_app->kwh_stand_kvarh = $request->kwh_kvarh;
            $form_app->ct_merk = $request->ct_merk;
            $form_app->ct_cls = $request->ct_cls;
            $form_app->ct_rasio = $request->ct_rasio;
            $form_app->ct_burden = $request->ct_burden;
            $form_app->pt_merk = $request->pt_merk;
            $form_app->pt_cls = $request->pt_cls;
            $form_app->pt_rasio = $request->pt_rasio;
            $form_app->pt_burden = $request->pt_burden;
            $form_app->kubikel_merk = $request->kubikel_merk;
            $form_app->kubikel_type = $request->kubikel_type;
            $form_app->kubikel_no_seri = $request->kubikel_no_seri;
            $form_app->kubikel_tahun = $request->kubikel_tahun;
            $form_app->box_app_merk = $request->box_app_merk;
            $form_app->box_app_type = $request->box_app_type;
            $form_app->box_app_no_seri = $request->box_app_no_seri;
            $form_app->box_app_tahun = $request->box_app_tahun;
            $form_app->file_alat_pembatas = $locate_pembatas_foto_pembatas;
            $form_app->file_kwh_meter = $locate_kwh_foto;
            $form_app->file_trafo_arus = $locate_ct_foto;
            $form_app->file_trafo_tegangan = $locate_pt_foto;
            $form_app->file_kubikel = $locate_kubikel_foto;
            $form_app->file_box_app = $locate_box_app_foto;

            $form_app->save();
        }


        //Pelindung kWh

        $form_pemeriksaan_pelindung_kwh = FormTidakLangsungDataPemeriksaanPelindungKwh::where('forms_id', $form->id)->first();


        $locate_pelindung_kwh_foto_sebelum = "";
        if ($request->pelindung_kwh_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pelindungkwh/sebelum', $request->pelindung_kwh_foto_sebelum);

            if ($new_image) {
                $locate_pelindung_kwh_foto_sebelum = $new_image;
            }
        }


        $locate_pelindung_kwh_foto_sesudah = "";
        if ($request->pelindung_kwh_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pelindungkwh/sesudah', $request->pelindung_kwh_foto_sesudah);

            if ($new_image) {
                $locate_pelindung_kwh_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_pelindung_kwh)) {
            $form_pemeriksaan_pelindung_kwh = FormTidakLangsungDataPemeriksaanPelindungKwh::create([
                'forms_id' => $form->id,
                'peralatan' => $request->pelindung_kwh_peralatan,
                'segel' => $request->pelindung_kwh_segel,
                'nomor_tahun_kode_segel' => $request->pelindung_kwh_nomor_tahun_kode_segel,
                'keterangan' => $request->pelindung_kwh_keterangan,
                'foto_sebelum' => $locate_pelindung_kwh_foto_sebelum,
                'post_peralatan' => $request->pelindung_kwh_post_peralatan,
                'post_segel' => $request->pelindung_kwh_post_segel,
                'post_nomor_tahun_kode_segel' => $request->pelindung_kwh_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_pelindung_kwh_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_pelindung_kwh->forms_id = $form->id;
            $form_pemeriksaan_pelindung_kwh->peralatan = $request->pelindung_kwh_peralatan;
            $form_pemeriksaan_pelindung_kwh->segel = $request->pelindung_kwh_segel;
            $form_pemeriksaan_pelindung_kwh->nomor_tahun_kode_segel = $request->pelindung_kwh_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_kwh->keterangan = $request->pelindung_kwh_keterangan;
            $form_pemeriksaan_pelindung_kwh->foto_sebelum = $locate_pelindung_kwh_foto_sebelum;
            $form_pemeriksaan_pelindung_kwh->post_peralatan = $request->pelindung_kwh_post_peralatan;
            $form_pemeriksaan_pelindung_kwh->post_segel = $request->pelindung_kwh_post_segel;
            $form_pemeriksaan_pelindung_kwh->post_nomor_tahun_kode_segel = $request->pelindung_kwh_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_kwh->foto_sesudah = $locate_pelindung_kwh_foto_sesudah;

            $form_pemeriksaan_pelindung_kwh->save();
        }


        //Pelindung CT

        $form_pemeriksaan_pelindung_ct = FormTidakLangsungDataPemeriksaanPelindungCt::where('forms_id', $form->id)->first();


        $locate_pelindung_ct_foto_sebelum = "";
        if ($request->pelindung_ct_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pelindungct/sebelum', $request->pelindung_ct_foto_sebelum);

            if ($new_image) {
                $locate_pelindung_ct_foto_sebelum = $new_image;
            }
        }


        $locate_pelindung_ct_foto_sesudah = "";
        if ($request->pelindung_ct_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pelindungct/sesudah', $request->pelindung_ct_foto_sesudah);

            if ($new_image) {
                $locate_pelindung_ct_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_pelindung_ct)) {
            $form_pemeriksaan_pelindung_ct = FormTidakLangsungDataPemeriksaanPelindungCt::create([
                'forms_id' => $form->id,
                'peralatan' => $request->pelindung_ct_peralatan,
                'segel' => $request->pelindung_ct_segel,
                'nomor_tahun_kode_segel' => $request->pelindung_ct_nomor_tahun_kode_segel,
                'keterangan' => $request->pelindung_ct_keterangan,
                'foto_sebelum' => $locate_pelindung_ct_foto_sebelum,
                'post_peralatan' => $request->pelindung_ct_post_peralatan,
                'post_segel' => $request->pelindung_ct_post_segel,
                'post_nomor_tahun_kode_segel' => $request->pelindung_ct_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_pelindung_ct_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_pelindung_ct->forms_id = $form->id;
            $form_pemeriksaan_pelindung_ct->peralatan = $request->pelindung_ct_peralatan;
            $form_pemeriksaan_pelindung_ct->segel = $request->pelindung_ct_segel;
            $form_pemeriksaan_pelindung_ct->nomor_tahun_kode_segel = $request->pelindung_ct_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_ct->keterangan = $request->pelindung_ct_keterangan;
            $form_pemeriksaan_pelindung_ct->foto_sebelum = $locate_pelindung_ct_foto_sebelum;
            $form_pemeriksaan_pelindung_ct->post_peralatan = $request->pelindung_ct_post_peralatan;
            $form_pemeriksaan_pelindung_ct->post_segel = $request->pelindung_ct_post_segel;
            $form_pemeriksaan_pelindung_ct->post_nomor_tahun_kode_segel = $request->pelindung_ct_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_pelindung_ct->foto_sesudah = $locate_pelindung_ct_foto_sesudah;

            $form_pemeriksaan_pelindung_ct->save();
        }


        //Segel

        $form_pemeriksaan_segel = FormTidakLangsungDataPemeriksaanSegelMetrologi::where('forms_id', $form->id)->first();

        $locate_segel_foto_sebelum = "";
        if ($request->segel_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/segel/sebelum', $request->segel_foto_sebelum);

            if ($new_image) {
                $locate_segel_foto_sebelum = $new_image;
            }
        }


        $locate_segel_foto_sesudah = "";
        if ($request->segel_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/segel/sesudah', $request->segel_foto_sesudah);

            if ($new_image) {
                $locate_segel_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_segel)) {
            $form_pemeriksaan_segel = FormTidakLangsungDataPemeriksaanSegelMetrologi::create([
                'forms_id' => $form->id,
                'peralatan' => $request->segel_peralatan,
                'segel' => $request->segel_segel,
                'nomor_tahun_kode_segel' => $request->segel_nomor_tahun_kode_segel,
                'keterangan' => $request->segel_keterangan,
                'foto_sebelum' => $locate_segel_foto_sebelum,
                'post_peralatan' => $request->segel_post_peralatan,
                'post_segel' => $request->segel_post_segel,
                'post_nomor_tahun_kode_segel' => $request->segel_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_segel_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_segel->forms_id = $form->id;
            $form_pemeriksaan_segel->peralatan = $request->segel_peralatan;
            $form_pemeriksaan_segel->segel = $request->segel_segel;
            $form_pemeriksaan_segel->nomor_tahun_kode_segel = $request->segel_nomor_tahun_kode_segel;
            $form_pemeriksaan_segel->keterangan = $request->segel_keterangan;
            $form_pemeriksaan_segel->foto_sebelum = $locate_segel_foto_sebelum;
            $form_pemeriksaan_segel->post_peralatan = $request->segel_post_peralatan;
            $form_pemeriksaan_segel->post_segel = $request->segel_post_segel;
            $form_pemeriksaan_segel->post_nomor_tahun_kode_segel = $request->segel_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_segel->foto_sesudah = $locate_segel_foto_sesudah;

            $form_pemeriksaan_segel->save();
        }

        //Tutup Terminal

        $form_pemeriksaan_terminal = FormTidakLangsungDataPemeriksaanTutupTerminal::where('forms_id', $form->id)->first();


        $locate_tutup_terminal_foto_sebelum = "";
        if ($request->tutup_terminal_foto_sebelum) {

            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/terminal/sebelum', $request->tutup_terminal_foto_sebelum);

            if ($new_image) {
                $locate_tutup_terminal_foto_sebelum = $new_image;
            }
        }


        $locate_tutup_terminal_foto_sesudah = "";
        if ($request->tutup_terminal_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/terminal/sesudah', $request->tutup_terminal_foto_sesudah);

            if ($new_image) {
                $locate_tutup_terminal_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_terminal)) {
            $form_pemeriksaan_terminal = FormTidakLangsungDataPemeriksaanTutupTerminal::create([
                'forms_id' => $form->id,
                'peralatan' => $request->tutup_terminal_peralatan,
                'segel' => $request->tutup_terminal_segel,
                'nomor_tahun_kode_segel' => $request->tutup_terminal_nomor_tahun_kode_segel,
                'keterangan' => $request->tutup_terminal_keterangan,
                'foto_sebelum' => $locate_tutup_terminal_foto_sebelum,
                'post_peralatan' => $request->tutup_terminal_post_peralatan,
                'post_segel' => $request->tutup_terminal_post_segel,
                'post_nomor_tahun_kode_segel' => $request->tutup_terminal_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_tutup_terminal_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_terminal->forms_id = $form->id;
            $form_pemeriksaan_terminal->peralatan = $request->tutup_terminal_peralatan;
            $form_pemeriksaan_terminal->segel = $request->tutup_terminal_segel;
            $form_pemeriksaan_terminal->nomor_tahun_kode_segel = $request->tutup_terminal_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal->keterangan = $request->tutup_terminal_keterangan;
            $form_pemeriksaan_terminal->foto_sebelum = $locate_tutup_terminal_foto_sebelum;
            $form_pemeriksaan_terminal->post_peralatan = $request->tutup_terminal_post_peralatan;
            $form_pemeriksaan_terminal->post_segel = $request->tutup_terminal_post_segel;
            $form_pemeriksaan_terminal->post_nomor_tahun_kode_segel = $request->tutup_terminal_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal->foto_sesudah = $locate_tutup_terminal_foto_sesudah;

            $form_pemeriksaan_terminal->save();
        }


        //Amr

        $form_pemeriksaan_amr = FormTidakLangsungDataPemeriksaanBoxAmr::where('forms_id', $form->id)->first();

        $locate_amr_foto_sebelum = "";
        if ($request->amr_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/amr/sebelum', $request->amr_foto_sebelum);

            if ($new_image) {
                $locate_amr_foto_sebelum = $new_image;
            }
        }

        $locate_amr_foto_sesudah = "";
        if ($request->amr_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/amr/sesudah', $request->amr_foto_sesudah);

            if ($new_image) {
                $locate_amr_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_amr)) {
            $form_pemeriksaan_amr = FormTidakLangsungDataPemeriksaanBoxAmr::create([
                'forms_id' => $form->id,
                'peralatan' => $request->amr_peralatan,
                'segel' => $request->amr_segel,
                'nomor_tahun_kode_segel' => $request->amr_nomor_tahun_kode_segel,
                'keterangan' => $request->amr_keterangan,
                'foto_sebelum' => $locate_amr_foto_sebelum,
                'post_peralatan' => $request->amr_post_peralatan,
                'post_segel' => $request->amr_post_segel,
                'post_nomor_tahun_kode_segel' => $request->amr_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_amr_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_amr->forms_id = $form->id;
            $form_pemeriksaan_amr->peralatan = $request->amr_peralatan;
            $form_pemeriksaan_amr->segel = $request->amr_segel;
            $form_pemeriksaan_amr->nomor_tahun_kode_segel = $request->amr_nomor_tahun_kode_segel;
            $form_pemeriksaan_amr->keterangan = $request->amr_keterangan;
            $form_pemeriksaan_amr->foto_sebelum = $locate_amr_foto_sebelum;
            $form_pemeriksaan_amr->post_peralatan = $request->amr_post_peralatan;
            $form_pemeriksaan_amr->post_segel = $request->amr_post_segel;
            $form_pemeriksaan_amr->post_nomor_tahun_kode_segel = $request->amr_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_amr->foto_sesudah = $locate_amr_foto_sesudah;

            $form_pemeriksaan_amr->save();
        }

        //Terminal VT

        $form_pemeriksaan_kubikel = FormTidakLangsungDataPemeriksaanKubikel::where('forms_id', $form->id)->first();


        $locate_terminal_vt_foto_sebelum = "";
        if ($request->terminal_vt_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/kubikel/sebelum', $request->terminal_vt_foto_sebelum);

            if ($new_image) {
                $locate_terminal_vt_foto_sebelum = $new_image;
            }
        }

        $locate_terminal_vt_foto_sesudah = "";
        if ($request->terminal_vt_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/kubikel/sesudah', $request->terminal_vt_foto_sesudah);

            if ($new_image) {
                $locate_terminal_vt_foto_sesudah = $new_image;
            }
        }


        if (empty($form_pemeriksaan_kubikel)) {
            $form_pemeriksaan_kubikel = FormTidakLangsungDataPemeriksaanKubikel::create([
                'forms_id' => $form->id,
                'peralatan' => $request->terminal_vt_peralatan,
                'segel' => $request->terminal_vt_segel,
                'nomor_tahun_kode_segel' => $request->terminal_vt_nomor_tahun_kode_segel,
                'keterangan' => $request->terminal_vt_keterangan,
                'foto_sebelum' => $locate_terminal_vt_foto_sebelum,
                'post_peralatan' => $request->terminal_vt_post_peralatan,
                'post_segel' => $request->terminal_vt_post_segel,
                'post_nomor_tahun_kode_segel' => $request->terminal_vt_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_terminal_vt_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_kubikel->forms_id = $form->id;
            $form_pemeriksaan_kubikel->peralatan = $request->terminal_vt_peralatan;
            $form_pemeriksaan_kubikel->segel = $request->terminal_vt_segel;
            $form_pemeriksaan_kubikel->nomor_tahun_kode_segel = $request->terminal_vt_nomor_tahun_kode_segel;
            $form_pemeriksaan_kubikel->keterangan = $request->terminal_vt_keterangan;
            $form_pemeriksaan_kubikel->foto_sebelum = $locate_terminal_vt_foto_sebelum;
            $form_pemeriksaan_kubikel->post_peralatan = $request->terminal_vt_post_peralatan;
            $form_pemeriksaan_kubikel->post_segel = $request->terminal_vt_post_segel;
            $form_pemeriksaan_kubikel->post_nomor_tahun_kode_segel = $request->terminal_vt_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_kubikel->foto_sesudah = $locate_terminal_vt_foto_sesudah;

            $form_pemeriksaan_kubikel->save();
        }


        //Terminal CT

        $form_pemeriksaan_terminal_ct = FormTidakLangsungDataPemeriksaanTerminalCt::where('forms_id', $form->id)->first();


        $locate_ct_foto_sebelum = "";
        if ($request->terminal_ct_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/terminalct/sebelum', $request->terminal_ct_foto_sebelum);

            if ($new_image) {
                $locate_ct_foto_sebelum = $new_image;
            }
        }

        $locate_ct_foto_sesudah = "";
        if ($request->terminal_ct_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/terminalct/sesudah', $request->terminal_ct_foto_sesudah);

            if ($new_image) {
                $locate_ct_foto_sesudah = $new_image;
            }
        }



        if (empty($form_pemeriksaan_terminal_ct)) {
            $form_pemeriksaan_terminal_ct = FormTidakLangsungDataPemeriksaanTerminalCt::create([
                'forms_id' => $form->id,
                'peralatan' => $request->terminal_ct_peralatan,
                'segel' => $request->terminal_ct_segel,
                'nomor_tahun_kode_segel' => $request->terminal_ct_nomor_tahun_kode_segel,
                'keterangan' => $request->terminal_ct_keterangan,
                'foto_sebelum' => $locate_ct_foto_sebelum,
                'post_peralatan' => $request->terminal_ct_post_peralatan,
                'post_segel' => $request->terminal_ct_post_segel,
                'post_nomor_tahun_kode_segel' => $request->terminal_ct_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_ct_foto_sesudah,
            ]);
        } else {
            $form_pemeriksaan_terminal_ct->forms_id = $form->id;
            $form_pemeriksaan_terminal_ct->peralatan = $request->terminal_ct_peralatan;
            $form_pemeriksaan_terminal_ct->segel = $request->terminal_ct_segel;
            $form_pemeriksaan_terminal_ct->nomor_tahun_kode_segel = $request->terminal_ct_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal_ct->keterangan = $request->terminal_ct_keterangan;
            $form_pemeriksaan_terminal_ct->foto_sebelum = $locate_ct_foto_sebelum;
            $form_pemeriksaan_terminal_ct->post_peralatan = $request->terminal_ct_post_peralatan;
            $form_pemeriksaan_terminal_ct->post_segel = $request->terminal_ct_post_segel;
            $form_pemeriksaan_terminal_ct->post_nomor_tahun_kode_segel = $request->terminal_ct_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_terminal_ct->foto_sesudah = $locate_ct_foto_sesudah;
            $form_pemeriksaan_terminal_ct->save();
        }

        //Pintu Gardu

        $form_pemeriksaan_pintu = FormTidakLangsungDataPemeriksaanPintuGardu::where('forms_id', $form->id)->first();

        $locate_pintu_foto_sebelum = "";
        if ($request->pintu_foto_sebelum) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pintu/sebelum', $request->pintu_foto_sebelum);

            if ($new_image) {
                $locate_pintu_foto_sebelum = $new_image;
            }
        }

        $locate_pintu_foto_sesudah = "";
        if ($request->pintu_foto_sesudah) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pemeriksaan/pintu/sesudah', $request->pintu_foto_sesudah);

            if ($new_image) {
                $locate_pintu_foto_sesudah = $new_image;
            }
        }

        if (empty($form_pemeriksaan_pintu)) {
            $form_pemeriksaan_pintu = FormTidakLangsungDataPemeriksaanPintuGardu::create([
                'forms_id' => $form->id,
                'peralatan' => $request->pintu_peralatan,
                'segel' => $request->pintu_segel,
                'nomor_tahun_kode_segel' => $request->pintu_nomor_tahun_kode_segel,
                'keterangan' => $request->pintu_keterangan,
                'foto_sebelum' => $locate_pintu_foto_sebelum,
                'post_peralatan' => $request->pintu_post_peralatan,
                'post_segel' => $request->pintu_post_segel,
                'post_nomor_tahun_kode_segel' => $request->pintu_post_nomor_tahun_kode_segel,
                'foto_sesudah' => $locate_pintu_foto_sesudah,
                'all_keterangan' => $request->pintu_keterangan_all,
            ]);
        } else {
            $form_pemeriksaan_pintu->forms_id = $form->id;
            $form_pemeriksaan_pintu->peralatan = $request->pintu_peralatan;
            $form_pemeriksaan_pintu->segel = $request->pintu_segel;
            $form_pemeriksaan_pintu->nomor_tahun_kode_segel = $request->pintu_nomor_tahun_kode_segel;
            $form_pemeriksaan_pintu->keterangan = $request->pintu_keterangan;
            $form_pemeriksaan_pintu->foto_sebelum = $locate_pintu_foto_sebelum;
            $form_pemeriksaan_pintu->post_peralatan = $request->pintu_post_peralatan;
            $form_pemeriksaan_pintu->post_segel = $request->pintu_post_segel;
            $form_pemeriksaan_pintu->post_nomor_tahun_kode_segel = $request->pintu_post_nomor_tahun_kode_segel;
            $form_pemeriksaan_pintu->foto_sesudah = $locate_pintu_foto_sesudah;
            $form_pemeriksaan_pintu->all_keterangan = $request->pintu_keterangan_all;
            $form_pemeriksaan_pintu->save();
        }


        //Wiring

        $form_pemeriksaan_wiring = FormTidakLangsungWiringApp::where('forms_id', $form->id)->first();


        $locate_wiring_diagram = "";
        if ($request->wiring_diagram) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/wiring/diagram', $request->wiring_diagram);

            if ($new_image) {
                $locate_wiring_diagram = $new_image;
            }
        }

        $locate_wiring_foto = "";
        if ($request->wiring_foto) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/wiring/foto', $request->wiring_foto);

            if ($new_image) {
                $locate_wiring_foto = $new_image;
            }
        }


        if (empty($form_pemeriksaan_wiring)) {
            $form_pemeriksaan_wiring = FormTidakLangsungWiringApp::create([
                'forms_id' => $form->id,
                'terminal1' => $request->wiring_terminal1,
                'terminal2' => $request->wiring_terminal2,
                'terminal3' => $request->wiring_terminal3,
                'terminal4' => $request->wiring_terminal4,
                'terminal5' => $request->wiring_terminal5,
                'terminal6' => $request->wiring_terminal6,
                'terminal7' => $request->wiring_terminal7,
                'terminal8' => $request->wiring_terminal8,
                'terminal9' => $request->wiring_terminal9,
                'terminal11' => $request->wiring_terminal11,
                'grounding' => $request->wiring_grounding,
                'keterangan_wiring_app' => $request->wiring_keterangan,
                'wiring_diagram' => $locate_wiring_diagram,
                'wiring_foto' => $locate_wiring_foto,
            ]);
        } else {
            $form_pemeriksaan_wiring->forms_id = $form->id;
            $form_pemeriksaan_wiring->terminal1 = $request->wiring_terminal1;
            $form_pemeriksaan_wiring->terminal2 = $request->wiring_terminal2;
            $form_pemeriksaan_wiring->terminal3 = $request->wiring_terminal3;
            $form_pemeriksaan_wiring->terminal4 = $request->wiring_terminal4;
            $form_pemeriksaan_wiring->terminal5 = $request->wiring_terminal5;
            $form_pemeriksaan_wiring->terminal6 = $request->wiring_terminal6;
            $form_pemeriksaan_wiring->terminal7 = $request->wiring_terminal7;
            $form_pemeriksaan_wiring->terminal8 = $request->wiring_terminal8;
            $form_pemeriksaan_wiring->terminal9 = $request->wiring_terminal9;
            $form_pemeriksaan_wiring->terminal11 = $request->wiring_terminal11;
            $form_pemeriksaan_wiring->grounding = $request->wiring_grounding;
            $form_pemeriksaan_wiring->keterangan_wiring_app = $request->wiring_keterangan;
            $form_pemeriksaan_wiring->wiring_diagram = $locate_wiring_diagram;
            $form_pemeriksaan_wiring->wiring_foto = $locate_wiring_foto;
            $form_pemeriksaan_wiring->save();
        }

        //Pemeriksaan Pengukuran

        $form_pemeriksaan_pengukuran = FormTidakLangsungPemeriksaanPengukuran::where('forms_id', $form->id)->first();

        $locate_pengukuran_foto = "";
        if ($request->pengukuran_foto) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/pengukuran', $request->pengukuran_foto);

            if ($new_image) {
                $locate_pengukuran_foto = $new_image;
            }
        }

        if (empty($form_pemeriksaan_pengukuran)) {
            $form_pemeriksaan_pengukuran = FormTidakLangsungPemeriksaanPengukuran::create([
                'forms_id' => $form->id,
                'arus_primer_r' => $request->pengukuran_arus_primer_r,
                'arus_primer_s' => $request->pengukuran_arus_primer_s,
                'arus_primer_t' => $request->pengukuran_arus_primer_t,
                'arus_sekunder_r' => $request->pengukuran_arus_sekunder_r,
                'arus_sekunder_s' => $request->pengukuran_arus_sekunder_s,
                'arus_sekunder_t' => $request->pengukuran_arus_sekunder_t,
                'ct_r' => $request->pengukuran_ct_r,
                'ct_s' => $request->pengukuran_ct_s,
                'ct_t' => $request->pengukuran_ct_t,
                'akurasi_r' => $request->pengukuran_akurasi_r,
                'akurasi_s' => $request->pengukuran_akurasi_s,
                'akurasi_t' => $request->pengukuran_akurasi_t,
                'voltase_primer_r' => $request->pengukuran_voltase_primer_r,
                'voltase_primer_s' => $request->pengukuran_voltase_primer_s,
                'voltase_primer_t' => $request->pengukuran_voltase_primer_t,
                'voltase_sekunder_r' => $request->pengukuran_voltase_sekunder_r,
                'voltase_sekunder_s' => $request->pengukuran_voltase_sekunder_s,
                'voltase_sekunder_t' => $request->pengukuran_voltase_sekunder_t,
                'cos_r' => $request->pengukuran_cos_r,
                'cos_s' => $request->pengukuran_cos_s,
                'cos_t' => $request->pengukuran_cos_t,
                'akurasi' => $request->pengukuran_akurasi,
                'keterangan' => $request->pengukuran_keterangan,
                'foto' => $locate_pengukuran_foto,
            ]);
        } else {
            $form_pemeriksaan_wiring->forms_id = $form->id;
            $form_pemeriksaan_pengukuran->arus_primer_r = $request->pengukuran_arus_primer_r;
            $form_pemeriksaan_pengukuran->arus_primer_s = $request->pengukuran_arus_primer_s;
            $form_pemeriksaan_pengukuran->arus_primer_t = $request->pengukuran_arus_primer_t;
            $form_pemeriksaan_pengukuran->arus_sekunder_r = $request->pengukuran_arus_sekunder_r;
            $form_pemeriksaan_pengukuran->arus_sekunder_s = $request->pengukuran_arus_sekunder_s;
            $form_pemeriksaan_pengukuran->arus_sekunder_t = $request->pengukuran_arus_sekunder_t;
            $form_pemeriksaan_pengukuran->ct_r = $request->pengukuran_ct_r;
            $form_pemeriksaan_pengukuran->ct_s = $request->pengukuran_ct_s;
            $form_pemeriksaan_pengukuran->ct_t = $request->pengukuran_ct_t;
            $form_pemeriksaan_pengukuran->akurasi_r = $request->pengukuran_akurasi_r;
            $form_pemeriksaan_pengukuran->akurasi_s = $request->pengukuran_akurasi_s;
            $form_pemeriksaan_pengukuran->akurasi_t = $request->pengukuran_akurasi_t;
            $form_pemeriksaan_pengukuran->voltase_primer_r = $request->pengukuran_voltase_primer_r;
            $form_pemeriksaan_pengukuran->voltase_primer_s = $request->pengukuran_voltase_primer_s;
            $form_pemeriksaan_pengukuran->voltase_primer_t = $request->pengukuran_voltase_primer_t;
            $form_pemeriksaan_pengukuran->voltase_sekunder_r = $request->pengukuran_voltase_sekunder_r;
            $form_pemeriksaan_pengukuran->voltase_sekunder_s = $request->pengukuran_voltase_sekunder_s;
            $form_pemeriksaan_pengukuran->voltase_sekunder_t = $request->pengukuran_voltase_sekunder_t;
            $form_pemeriksaan_pengukuran->cos_r = $request->pengukuran_cos_r;
            $form_pemeriksaan_pengukuran->cos_s = $request->pengukuran_cos_s;
            $form_pemeriksaan_pengukuran->cos_t = $request->pengukuran_cos_t;
            $form_pemeriksaan_pengukuran->akurasi = $request->pengukuran_akurasi;
            $form_pemeriksaan_pengukuran->keterangan = $request->pengukuran_keterangan;
            $form_pemeriksaan_pengukuran->foto = $locate_pengukuran_foto;

            $form_pemeriksaan_pengukuran->save();
        }


        //Hasil Pemeriksaan

        $form_hasil_pemeriksaan = FormTidakLangsungHasilPemeriksaan::where('forms_id', $form->id)->first();


        $locate_akhir_foto_barang_bukti = "";
        if ($request->akhir_foto_barang_bukti) {
            $new_image = Storage::disk('public')->put('assets/tidaklangsung/hasil', $request->akhir_foto_barang_bukti);

            if ($new_image) {
                $locate_akhir_foto_barang_bukti = $new_image;
            }
        }

        $akhir_tanggal_penyelesaian = Carbon::now()->format('Y-m-d');
        if ($request->akhir_tanggal_penyelesaian !== 'null' || $request->akhir_tanggal_penyelesaian != Null) {
            $akhir_tanggal_penyelesaian = Carbon::parse($request->akhir_tanggal_penyelesaian)->format('Y-m-d');
        }

        if (empty($form_hasil_pemeriksaan)) {
            $form_hasil_pemeriksaan = FormTidakLangsungHasilPemeriksaan::create([
                'forms_id' => $form->id,
                'hasil_pemeriksaan' => $request->akhir_hasil_pemeriksaan,
                'kesimpulan' => $request->akhir_kesimpulan,
                'tindakan' => $request->akhir_tindakan,
                'barang_bukti' => $request->akhir_barang_bukti,
                'tanggal_penyelesaian' => $akhir_tanggal_penyelesaian,
                'foto_barang_bukti' => $locate_akhir_foto_barang_bukti,

            ]);
        } else {
            $form_hasil_pemeriksaan->forms_id = $form->id;
            $form_hasil_pemeriksaan->hasil_pemeriksaan = $request->akhir_hasil_pemeriksaan;
            $form_hasil_pemeriksaan->kesimpulan = $request->akhir_kesimpulan;
            $form_hasil_pemeriksaan->tindakan = $request->akhir_tindakan;
            $form_hasil_pemeriksaan->barang_bukti = $request->akhir_barang_bukti;
            $form_hasil_pemeriksaan->tanggal_penyelesaian = $akhir_tanggal_penyelesaian;
            $form_hasil_pemeriksaan->foto_barang_bukti = $locate_akhir_foto_barang_bukti;

            $form_hasil_pemeriksaan->save();
        }


        $akhir_labor = 0;
        if ($request->akhir_labor == 1) {
            $akhir_labor = 1;
        }

        $work = WorkOrder::where('id', $form->works_id)->first();
        $work->labor = $akhir_labor;
        $work->save();

        return ResponseFormatter::success($form, 'Berhasil ditambahkan');
    }
}
