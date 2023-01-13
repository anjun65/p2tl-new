<div>
    <div class="p-4 space-y-4">
        <label for="time-range">Time Range:</label>

        <x-datepicker wire:model="filters.min_tanggal_inspeksi" id="filter-min_tanggal_inspeksi">
        </x-datepicker>

        <x-datepicker wire:model="filters.max_tanggal_inspeksi" id="filter-max_tanggal_inspeksi">
        </x-datepicker>

        <x-button wire:click="resetFilters" class="right-0 bottom-0 p-4">Reset Filters</x-button>


        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class="w-full">Nama Grup</x-table.heading>
                    <x-table.heading>Jumlah TO</x-table.heading>
                    <x-table.heading>Jumlah Luar TO</x-table.heading>
                    <x-table.heading>Diperiksa</x-table.heading>
                    <x-table.heading>Jumlah Temuan (unit)</x-table.heading>
                    <x-table.heading>Jumlah TS (Rp)</x-table.heading>
                    <x-table.heading>Jumlah TS (kWh)</x-table.heading>
                </x-slot>
        
                <x-slot name="body">
                    @forelse ($all_regu as $regu)
                        @php
                            $count_wo = App\Models\WorkOrder::query()
                                        ->where("regus_id", $regu->id)
                                        ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                                        ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                                        ->count();
                                        
                            $count_diperiksa = App\Models\WorkOrder::query()
                                        ->where("regus_id", $regu->id)
                                        ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA','Rumah Kosong','Tidak Ada Orang'])
                                        ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                                        ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                                        ->count();
                            
                            $count_temuan= App\Models\WorkOrder::query()
                                        ->where("regus_id", $regu->id)
                                        ->whereIn('status_pelanggaran', ['P1','P2','P3','P4','K1','K2','K3',])
                                        ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                                        ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                                        ->count();

                        @endphp

                    <x-table.row wire:loading.class.delay="opacity-50" >       
                        <x-table.cell>
                            <span class="text-center text-cool-gray-900 font-medium">{{ $regu->name }} </span>
                        </x-table.cell>
                        
                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">{{ $count_wo }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">0 </span>
                        </x-table.cell>
        
                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">{{ $count_diperiksa }}</span>
                        </x-table.cell>
        
                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">{{ $count_temuan }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">0</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">0</span>
                        </x-table.cell>
                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="8">
                            <div class="flex justify-center items-center space-x-2">
                                <x-icon.inbox class="h-8 w-8 text-cool-gray-400" />
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">Tidak ada data yang ditemukan...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
        </div>
    </div>
</div>


{{-- 
@push('addon-script')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>


@endpush
<div>
    <div class="p-4 space-y-4">
            <label for="time-range">Time Range:</label>
            
            <x-datepicker wire:model="filters.min_tanggal_inspeksi" id="filter-min_tanggal_inspeksi">
            </x-datepicker>

            <x-datepicker wire:model="filters.max_tanggal_inspeksi" id="filter-max_tanggal_inspeksi">
            </x-datepicker>

            <x-button wire:click="resetFilters" class="right-0 bottom-0 p-4">Reset Filters</x-button>

        @foreach ($all_regu as $regu)
            <canvas id="myChart{{ $regu->id }}"></canvas>
            <br>
            
            @php
                $count_wo = App\Models\WorkOrder::query()
                            ->where("regus_id", $regu->id)
                            ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                            ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                            ->count();
                            
                $count_diperiksa = App\Models\WorkOrder::query()
                            ->where("regus_id", $regu->id)
                            ->whereIn('keterangan_p2tl', ['Pemeriksaan dengan BA','Rumah Kosong','Tidak Ada Orang'])
                            ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                            ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                            ->count();
                
                $count_temuan= App\Models\WorkOrder::query()
                            ->where("regus_id", $regu->id)
                            ->whereIn('status_pelanggaran', ['P1','P2','P3','P4','K1','K2','K3',])
                            ->when($this->filters['max_tanggal_inspeksi'], fn($query, $max_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '<=', Illuminate\Support\Carbon::parse($max_tanggal_inspeksi)))
                            ->when($this->filters['min_tanggal_inspeksi'], fn($query, $min_tanggal_inspeksi) => $query->where('tanggal_inspeksi', '>=', Illuminate\Support\Carbon::parse($min_tanggal_inspeksi)))
                            ->count();

            @endphp


            @push('addon-script')
                <script>
                    var ctx = document.getElementById('myChart{{ $regu->id }}').getContext('2d');
                    var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['TO', 'Luar TO', 'Diperiksa', 'Jumlah Temuan'],
                        datasets: [
                        {
                            label: '{{ $regu->name }}',
                            data: [{{ $count_wo }}, 1, {{ $count_diperiksa }}, {{ $count_temuan }}],
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }
                        ]
                    },
                    options: {
                        scales: {
                        yAxes: [
                            {
                            ticks: {
                                beginAtZero: true
                            }
                            }
                        ]
                        }
                    }
                    });
                </script>

            @endpush
        @endforeach
        
        
        
        
        
    </div>
</div> --}}
