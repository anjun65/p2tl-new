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

        foreach ($regus as $regu) {
            $i = 0;
            $count_wo = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $count_diperiksa = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA', 'Rumah Kosong', 'Tidak Ada Orang'])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();

            $count_temuan = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $data['label'][] = [
                'name' => $regu->name,
                'data' => [$count_wo, $count_diperiksa, $count_temuan],
            ];
        }
        $this->regus = json_encode($data);
    }


    public function changeData()
    {
        $regus = Regu::latest()->get();

        foreach ($regus as $regu) {
            $i = 0;
            $count_wo = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $count_diperiksa = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA', 'Rumah Kosong', 'Tidak Ada Orang'])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();

            $count_temuan = WorkOrder::query()
                ->where("regus_id", $regu->id)
                ->whereIn('status_pelanggaran', ['P1', 'P2', 'P3', 'P4', 'K1', 'K2', 'K3',])
                ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                ->count();



            $data['label'][] = [
                'name' => $regu->name,
                'data' => [$count_wo, $count_diperiksa, $count_temuan],
            ];
        }
        $this->regus = json_encode($data);

        $this->emit('berhasilUpdate', ['data' => $this->regus]);
    }


    public function render()
    {

        // $all_regu = Regu::whereNot('id', 1)->get();

        $all_regu = Regu::all();

        return view('livewire.admin.dashboard', [
            'all_regu' => $all_regu,
        ]);
    }
}
