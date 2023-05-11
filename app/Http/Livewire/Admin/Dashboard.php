<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Regu;
use Illuminate\Support\Carbon;
use App\Models\WorkOrder;

class Dashboard extends Component
{
    public $filters = [
        'min_tanggal_inspeksi' => null,
        'max_tanggal_inspeksi' => null,
    ];

    public $regus;
    public $all_wo;
    public $all_temuan;
    public $all_rp;
    public $all_kwh;

    public $listener = ['ubahData' => ''];

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function daily()
    {
        $this->filters['min_tanggal_inspeksi'] = now();
        $this->filters['max_tanggal_inspeksi'] = now();
    }


    public function weekly()
    {

        $start = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();

        $this->filters['min_tanggal_inspeksi'] = $start->toDateString();
        $this->filters['max_tanggal_inspeksi'] = $end->toDateString();
    }


    public function monthly()
    {

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $this->filters['min_tanggal_inspeksi'] = $start->toDateString();
        $this->filters['max_tanggal_inspeksi'] = $end->toDateString();
    }

    public function mount()
    {
        $regus = Regu::latest()->get();

        // $all_wo = WorkOrder::query()
        //     ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
        //     ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
        //     ->count();

        // $all_temuan = WorkOrder::query()
        //     ->where('is_temuan', 1)
        //     ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
        //     ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
        //     ->count();

        // $all_rp = WorkOrder::query()
        //     ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
        //     ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
        //     ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
        //     ->sum('jumlah_ts_rp');

        // $all_kwh = WorkOrder::query()
        //     ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
        //     ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
        //     ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
        //     ->sum('jumlah_ts_kwh');

        foreach ($regus as $regu) {
            $i = 0;
            $count_wo = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $count_diperiksa = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA', 'Rumah Kosong', 'Tidak Ada Orang'])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
                ->count();

            $count_temuan = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $data['label'][] = [
                'name' => $regu->name,
                'data' => [$count_wo, $count_diperiksa, $count_temuan],
            ];
        }
        $this->regus = json_encode($data);

        // $this->all_wo = $all_wo;
        // $this->all_temuan = $all_temuan;
        // $this->all_rp = $all_rp;
        // $this->all_kwh = $all_kwh;
    }


    // public function changeData()
    // {
    //     $regus = Regu::latest()->get();

    //     foreach ($regus as $regu) {
    //         $i = 0;
    //         $count_wo = WorkOrder::query()
    //             ->where("regus_id", $regu->id)
    //             ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
    //             ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
    //             ->count();



    //         $count_diperiksa = WorkOrder::query()
    //             ->where("regus_id", $regu->id)
    //             ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA', 'Rumah Kosong', 'Tidak Ada Orang'])
    //             ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
    //             ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
    //             ->count();

    //         $count_temuan = WorkOrder::query()
    //             ->where("regus_id", $regu->id)
    //             ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
    //             ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
    //             ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
    //             ->count();



    //         $data['label'][] = [
    //             'name' => $regu->name,
    //             'data' => [$count_wo, $count_diperiksa, $count_temuan],
    //         ];
    //     }
    //     $this->regus = json_encode($data);

    //     $this->emit('berhasilUpdate', ['data' => $this->regus]);
    // }


    public function render()
    {

        // $all_regu = Regu::whereNot('id', 1)->get();

        $all_regu = Regu::all();

        // $all_wo = $this->all_wo;
        // $all_temuan = $this->all_temuan;
        // $all_rp = $this->all_rp;
        // $all_kwh = $this->all_kwh;

        return view('livewire.admin.dashboard', [
            'all_regu' => $all_regu,
            // 'all_wo' => $all_wo,
            // 'all_temuan' => $all_temuan,
            // 'all_rp' => $all_rp,
            // 'all_kwh' => $all_kwh,

        ]);
    }
}
