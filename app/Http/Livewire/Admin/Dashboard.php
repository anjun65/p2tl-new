<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Regu;

class Dashboard extends Component
{
    public $filters = [
        'min_tanggal_inspeksi' => null,
        'max_tanggal_inspeksi' => null,
    ];


    public function resetFilters() { $this->reset('filters'); }
    
    public function render()
    {
        
        $all_regu = Regu::whereNot('id', 1)->get();

        return view('livewire.admin.dashboard', [
            'all_regu' => $all_regu,
        ]);
    }
}
