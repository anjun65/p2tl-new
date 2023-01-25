<?php

namespace App\Http\Livewire\Annev;

use App\Http\Livewire\DataTable\WithSorting;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithPerPagePagination;

use Livewire\Component;
use App\Models\WorkOrder;
use App\Models\Pendamping;
use App\Models\Regu;
use Illuminate\Support\Carbon;

class Wo extends Component
{

    use WithPerPagePagination, WithSorting, WithBulkActions, WithCachedRows;

    public $showEditModal = false;
    public $showDeleteModal = false;

    public $showFilters = false;
    public $filters = [
        'nama_pelanggan' => '',
        'id_pelanggan' => '',
        'alamat' => '',
        'status' => '',
        'keterangan_p2tl' => '',
        'jumlah_ts_rp' => '',
        'jumlah_ts_kwh' => '',
        'min_tanggal_inspeksi' => null,
        'max_tanggal_inspeksi' => null,
    ];

    public $pass;

    public WorkOrder $editing;

    public $upload_video;
    public $upload_image;

    protected $queryString = ['sorts'];

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public function rules()
    {
        return [
            'editing.regus_id' => 'required',
            'editing.id_pelanggan' => 'required',
            'editing.nama_pelanggan' => 'required',
            'editing.latitude' => 'required',
            'editing.longitude' => 'required',
            'editing.alamat' => 'required',
            'editing.jenis_p2tl' => 'required',
            'editing.tarif' => 'required',
            'editing.daya' => 'required',
            'editing.rbm' => 'required',
            'editing.lgkh' => 'required',
            'editing.fkm' => 'required',
            'editing.status' => 'nullable',
            'editing.keterangan_p2tl' => 'nullable',
            'nyala_model.tanggal' => 'nullable',
            'nyala_model.jumlah' => 'nullable',
            'editing.no_ba' => 'required',
            'editing.surat_tugas_p2tl' => 'required',
            'editing.tanggal_surat_tugas_p2tl' => 'required',
            'editing.surat_tugas_tni' => 'required',
            'editing.tanggal_surat_tugas_tni' => 'required',
            'editing.pendamping1_id' => 'required',
            'editing.pendamping2_id' => 'nullable',
            'editing.tanggal_inspeksi' => 'nullable',
        ];
    }

    public function mount()
    {
        $this->editing = $this->makeBlankTransaction();
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function makeBlankTransaction()
    {
        return WorkOrder::make();
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();

        $this->showFilters = !$this->showFilters;
    }


    public function create()
    {
        $this->useCachedRows();

        if ($this->editing->getKey()) $this->editing = $this->makeBlankTransaction();

        $this->showEditModal = true;
    }

    public function edit(WorkOrder $transaction)
    {
        $this->useCachedRows();

        if ($this->editing->isNot($transaction)) $this->editing = $transaction;

        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();

        $this->editing->save();

        $this->notify('Data telah tersimpan');

        $this->showEditModal = false;
    }

    public function resetFilters()
    {
        $this->reset('filters');
    }

    public function getRowsQueryProperty()
    {
        $query = WorkOrder::query()
            ->where('keterangan_p2tl', '=', 'Pemeriksaan dengan BA')
            ->when($this->filters['max_tanggal_inspeksi'], fn ($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Carbon::parse($max_tanggal_inspeksi)))
            ->when($this->filters['min_tanggal_inspeksi'], fn ($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Carbon::parse($min_tanggal_inspeksi)))
            ->when($this->filters['nama_pelanggan'], fn ($query, $nama_pelanggan) => $query->where('nama_pelanggan', 'like', '%' . $nama_pelanggan . '%'))
            ->when($this->filters['id_pelanggan'], fn ($query, $id_pelanggan) => $query->where('id_pelanggan', 'like', '%' . $id_pelanggan . '%'))
            ->when($this->filters['alamat'], fn ($query, $alamat) => $query->where('alamat', 'like', '%' . $alamat . '%'))
            ->when($this->filters['status'], fn ($query, $status) => $query->where('status', 'like', '%' . $status . '%'))
            ->when($this->filters['keterangan_p2tl'], fn ($query, $keterangan_p2tl) => $query->where('keterangan_p2tl', $keterangan_p2tl))
            ->when($this->filters['keterangan_p2tl'], fn ($query, $keterangan_p2tl) => $query->where('keterangan_p2tl', $keterangan_p2tl));

        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'work-orders.csv');
    }

    public function deleteSelected()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteModal = false;

        $this->notify('Anda telah menghapus ' . $deleteCount . ' data.');
    }

    public function render()
    {

        $regus = Regu::all();
        $pendampings = Pendamping::all();
        $keterangan = WorkOrder::Keterangan;
        $statuses = WorkOrder::Status;

        $jenis_p2tl = WorkOrder::JenisP2TL;


        return view('livewire.annev.wo', [
            'items' => $this->rows,
            'regus' => $regus,
            'pendampings' => $pendampings,
            'keterangan' => $keterangan,
            'statuses' => $statuses,
            'jenis_p2tl' => $jenis_p2tl,
        ]);
    }
}
