<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Regu;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public $filters = [
        'min_tanggal_inspeksi' => null,
        'max_tanggal_inspeksi' => null,
    ];


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


    public function render()
    {

        // $all_regu = Regu::whereNot('id', 1)->get();

        $all_regu = Regu::all();

        return view('livewire.admin.dashboard', [
            'all_regu' => $all_regu,
        ]);
    }
}
