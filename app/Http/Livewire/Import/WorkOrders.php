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
        'regus_id' => '',
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

        'P1' => '',
        'P2' => '',
        'P3' => '',
        'P4' => '',
        'P5' => '',
        'P6' => '',
        'P7' => '',
        'P8' => '',
        'P9' => '',
        'P10' => '',
    ];

    protected $rules = [
        'fieldColumnMap.regus_id' => 'nullable',
        'fieldColumnMap.id_pelanggan' => 'nullable',
        'fieldColumnMap.nama_pelanggan' => 'nullable',
        'fieldColumnMap.latitude' => 'nullable',
        'fieldColumnMap.longitude' => 'nullable',
        'fieldColumnMap.alamat' => 'nullable',
        'fieldColumnMap.jenis_p2tl' => 'nullable',
        'fieldColumnMap.tarif' => 'nullable',
        'fieldColumnMap.daya' => 'nullable',
        'fieldColumnMap.rbm' => 'nullable',
        'fieldColumnMap.lgkh' => 'nullable',
        'fieldColumnMap.fkm' => 'nullable',
        'fieldColumnMap.keterangan_p2tl' => 'nullable',
        'fieldColumnMap.status' => 'nullable',
        'fieldColumnMap.no_ba' => 'nullable',
        'fieldColumnMap.surat_tugas_p2tl' => 'nullable',
        'fieldColumnMap.tanggal_surat_tugas_p2tl' => 'nullable',
        'fieldColumnMap.surat_tugas_tni' => 'nullable',
        'fieldColumnMap.tanggal_surat_tugas_tni' => 'nullable',
        'fieldColumnMap.pendamping1_id' => 'nullable',
        'fieldColumnMap.pendamping2_id' => 'nullable',

        'fieldColumnMap.P1' => 'nullable',
        'fieldColumnMap.P2' => 'nullable',
        'fieldColumnMap.P3' => 'nullable',
        'fieldColumnMap.P4' => 'nullable',
        'fieldColumnMap.P5' => 'nullable',
        'fieldColumnMap.P6' => 'nullable',
        'fieldColumnMap.P7' => 'nullable',
        'fieldColumnMap.P8' => 'nullable',
        'fieldColumnMap.P9' => 'nullable',
        'fieldColumnMap.P10' => 'nullable',
    ];

    protected $customAttributes = [
        'fieldColumnMap.regus_id' => 'regus_id',
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
        'fieldColumnMap.P1' => 'P1',
        'fieldColumnMap.P2' => 'P2',
        'fieldColumnMap.P3' => 'P3',
        'fieldColumnMap.P4' => 'P4',
        'fieldColumnMap.P5' => 'P5',
        'fieldColumnMap.P6' => 'P6',
        'fieldColumnMap.P7' => 'P7',
        'fieldColumnMap.P8' => 'P8',
        'fieldColumnMap.P9' => 'P9',
        'fieldColumnMap.P10' => 'P10',
    ];

    public function updatingUpload($value)
    {
        Validator::make(
            ['upload' => $value],
            ['upload' => 'nullable|mimes:txt,csv'],
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

                $test = WorkOrder::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;
            });

        $this->reset();

        $this->emit('refreshTransactions');

        $this->notify('Imported ' . $importCount . ' transactions!');
    }

    public function extractFieldsFromRow($row)
    {
        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function ($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes + ['status' => 'success', 'date_for_editing' => now()];
    }

    public function guessWhichColumnsMapToWhichFields()
    {
        $guesses = [
            'regus_id' => ['regus_id'],
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
            'P1' => ['P1'],
            'P2' => ['P2'],
            'P3' => ['P3'],
            'P4' => ['P4'],
            'P5' => ['P5'],
            'P6' => ['P6'],
            'P7' => ['P7'],
            'P8' => ['P8'],
            'P9' => ['P9'],
            'P10' => ['P10'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn ($options) => in_array(strtolower($column), $options));

            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }
}
