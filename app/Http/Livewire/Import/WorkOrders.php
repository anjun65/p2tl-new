<?php

namespace App\Http\Livewire\Import;

use App\Csv;
use Validator;
use Livewire\Component;
use App\Models\WorkOrder;
use Livewire\WithFileUploads;

class WorkOrders extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $upload;
    public $columns;
    public $fieldColumnMap = [
        'id_pelanggan' => '',
        'nama_pelanggan' => '',
        'latitude' => '',
        'longitude' => '',
        'alamat' => '',
        'jenis_p2tl' => '',
        'tarif' => '',
        'daya' => '',
        'rbm' => '',
        'lgkh' => '',
        'fkm' => '',
        'keterangan_p2tl' => '',
        'status' => '',
        'no_ba' => '',
        'surat_tugas_p2tl' => '',
        'tanggal_surat_tugas_p2tl' => '',
        'surat_tugas_tni' => '',
        'tanggal_surat_tugas_tni' => '',
        'pendamping1_id' => '',
        'pendamping2_id' => '',
    ];

    protected $rules = [
        'fieldColumnMap.id_pelanggan' => 'required',
        'fieldColumnMap.nama_pelanggan' => 'required',
        'fieldColumnMap.latitude' => 'required',
        'fieldColumnMap.longitude' => 'required',
        'fieldColumnMap.alamat' => 'required',
        'fieldColumnMap.jenis_p2tl' => 'required',
        'fieldColumnMap.tarif' => 'required',
        'fieldColumnMap.daya' => 'required',
        'fieldColumnMap.rbm' => 'required',
        'fieldColumnMap.lgkh' => 'required',
        'fieldColumnMap.fkm' => 'required',
        'fieldColumnMap.keterangan_p2tl' => 'required',
        'fieldColumnMap.status' => 'required',
        'fieldColumnMap.no_ba' => 'required',
        'fieldColumnMap.surat_tugas_p2tl' => 'required',
        'fieldColumnMap.tanggal_surat_tugas_p2tl' => 'required',
        'fieldColumnMap.surat_tugas_tni' => 'required',
        'fieldColumnMap.tanggal_surat_tugas_tni' => 'required',
        'fieldColumnMap.pendamping1_id' => 'required',
        'fieldColumnMap.pendamping2_id' => 'required',
    ];

    protected $customAttributes = [
        'fieldColumnMap.id_pelanggan' => 'id_pelanggan',
        'fieldColumnMap.nama_pelanggan' => 'nama_pelanggan',
        'fieldColumnMap.latitude' => 'latitude',
        'fieldColumnMap.longitude' => 'longitude',
        'fieldColumnMap.alamat' => 'alamat',
        'fieldColumnMap.jenis_p2tl' => 'jenis_p2tl',
        'fieldColumnMap.tarif' => 'tarif',
        'fieldColumnMap.daya' => 'daya',
        'fieldColumnMap.rbm' => 'rbm',
        'fieldColumnMap.lgkh' => 'lgkh',
        'fieldColumnMap.fkm' => 'fkm',
        'fieldColumnMap.keterangan_p2tl' => 'keterangan_p2tl',
        'fieldColumnMap.status' => 'status',
        'fieldColumnMap.no_ba' => 'no_ba',
        'fieldColumnMap.surat_tugas_p2tl' => 'surat_tugas_p2tl',
        'fieldColumnMap.tanggal_surat_tugas_p2tl' => 'tanggal_surat_tugas_p2tl',
        'fieldColumnMap.surat_tugas_tni' => 'surat_tugas_tni',
        'fieldColumnMap.tanggal_surat_tugas_tni' => 'tanggal_surat_tugas_tni',
        'fieldColumnMap.pendamping1_id' => 'pendamping1_id',
        'fieldColumnMap.pendamping2_id' => 'pendamping2_id',
    ];

    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv'],
        )->validate();
    }

    public function updatedUpload()
    {
        $this->columns = Csv::from($this->upload)->columns();

        $this->guessWhichColumnsMapToWhichFields();
    }

    public function import()
    {
        $this->validate();

        $importCount = 0;

        Csv::from($this->upload)
            ->eachRow(function ($row) use (&$importCount) {
                WorkOrder::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;
            });

        $this->reset();

        $this->emit('refreshTransactions');

        $this->notify('Imported '.$importCount.' transactions!');
    }

    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes + ['status' => 'success', 'date_for_editing' => now()];
    }

    public function guessWhichColumnsMapToWhichFields()
    {
        $guesses = [

            'id_pelanggan' => ['id_pelanggan'],
            'nama_pelanggan' => ['nama_pelanggan'],
            'latitude' => ['latitude'],
            'longitude' => ['longitude'],
            'alamat' => ['alamat'],
            'jenis_p2tl' => ['jenis_p2tl'],
            'tarif' => ['tarif'],
            'daya' => ['daya'],
            'rbm' => ['rbm'],
            'lgkh' => ['lgkh'],
            'fkm' => ['fkm'],
            'keterangan_p2tl' => ['keterangan_p2tl'],
            'status' => ['status'],
            'no_ba' => ['no_ba'],
            'surat_tugas_p2tl' => ['surat_tugas_p2tl'],
            'tanggal_surat_tugas_p2tl' => ['tanggal_surat_tugas_p2tl'],
            'surat_tugas_tni' => ['surat_tugas_tni'],
            'tanggal_surat_tugas_tni' => ['tanggal_surat_tugas_tni'],
            'pendamping1_id' => ['pendamping1_id'],
            'pendamping2_id' => ['pendamping2_id'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));

            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }
}
