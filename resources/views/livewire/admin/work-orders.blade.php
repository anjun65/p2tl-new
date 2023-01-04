{{-- @push('addon-style')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVNjQ0xxvZuZSljlbol5QxG8Dh_HY3HCQ"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    <style type="text/css">
        #map {
          width: 100%;
          height: 480px;
        }
    </style>
@endpush --}}


<div>
    <div class="py-4 space-y-4">

        
        <!-- Top Bar -->
        <div class="flex justify-between">
            <div class="w-2/4 flex space-x-4">
                <x-input.text wire:model="filters.name" placeholder="Search ..." />
            </div>

            <div class="space-x-2 flex items-center">
                <x-input.group borderless paddingless for="perPage" label="Per Page">
                    <x-input.select wire:model="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </x-input.select>
                </x-input.group>

                <x-dropdown label="Bulk Actions">

                    <x-dropdown.item type="button" wire:click="exportSelected" class="flex items-center space-x-2">
                        <x-icon.download class="text-cool-gray-400"/> <span>Export</span>
                    </x-dropdown.item>

                    <x-dropdown.item type="button" wire:click="$toggle('showDeleteModal')" class="flex items-center space-x-2">
                        <x-icon.trash class="text-cool-gray-400"/> <span>Delete</span>
                    </x-dropdown.item>

                </x-dropdown>

                <livewire:import.work-orders />

                <x-button.primary wire:click="create"><x-icon.plus/> New</x-button.primary>
            </div>
        </div>

        <!-- Products Table -->
        <div class="flex-col space-y-4">
            <x-table>
                <x-slot name="head">
                    <x-table.heading class="pr-0 w-8">
                        <x-input.checkbox wire:model="selectPage" />
                    </x-table.heading>
                    <x-table.heading>Regu</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('id_pelanggan')" :direction="$sorts['id_pelanggan'] ?? null" class="w-full">ID Pelanggan</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('nama_pelanggan')" :direction="$sorts['nama_pelanggan'] ?? null">Nama Pelanggan</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('alamat')" :direction="$sorts['alamat'] ?? null">Alamat</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('jenis_p2tl')" :direction="$sorts['jenis_p2tl'] ?? null">Jenis P2TL</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('tarif')" :direction="$sorts['tarif'] ?? null">Tarif</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('daya')" :direction="$sorts['daya'] ?? null">Daya</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('rbm')" :direction="$sorts['rbm'] ?? null">RBM</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('lgkh')" :direction="$sorts['lgkh'] ?? null">LGKH</x-table.heading>
                    <x-table.heading sortable multi-column wire:click="sortBy('fkm')" :direction="$sorts['fkm'] ?? null">FKM</x-table.heading>
                    
                    <x-table.heading>Keterangan</x-table.heading>
                    <x-table.heading>Status</x-table.heading>
                    <x-table.heading>Lihat BA</x-table.heading>
                    <x-table.heading />
                </x-slot>

                <x-slot name="body">
                    @if ($selectPage)
                    <x-table.row class="bg-cool-gray-200" wire:key="row-message">
                        <x-table.cell colspan="6">
                            @unless ($selectAll)
                            <div>
                                <span>You have selected <strong>{{ $items->count() }}</strong> data, do you want to select all <strong>{{ $items->total() }}</strong>?</span>
                                <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All</x-button.link>
                            </div>
                            @else
                            <span>You are currently selecting all <strong>{{ $items->total() }}</strong> data.</span>
                            @endif
                        </x-table.cell>
                    </x-table.row>
                    @endif

                    @forelse ($items as $item)
                    <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $item->id }}">
                        <x-table.cell class="pr-0">
                            <x-input.checkbox wire:model="selected" value="{{ $item->id }}" />
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-cool-gray-900 font-medium">
                                {{ $item->regu->name }}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->id_pelanggan }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->nama_pelanggan }} </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">
                                {{ $item->alamat }} <br/>

                                {{ $item->latitude}}, {{ $item->longitude}}
                            </span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->jenis_p2tl }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->tarif }}</span>
                        </x-table.cell>
                        
                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->daya }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->rbm }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->lgkh }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->fkm }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->keterangan_p2tl }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium">{{ $item->status }}</span>
                        </x-table.cell>

                        <x-table.cell>
                            <span class="text-gray-900 font-medium"><a href="{{ route('admin-form-langsung', $item->form->id) }}">Lihat BA</a></span>
                        </x-table.cell>

                        <x-table.cell>
                            <x-button.link wire:click="edit({{ $item->id }})">Edit</x-button.link>
                        </x-table.cell>

                    </x-table.row>
                    @empty
                    <x-table.row>
                        <x-table.cell colspan="14">
                            <div class="flex justify-center items-center space-x-2">
                                <x-icon.inbox class="h-8 w-8 text-gray-400" />
                                <span class="font-medium py-8 text-gray-400 text-xl">No Work Order found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>

            <div>
                {{ $items->links() }}
            </div>
        </div>
    </div>

    <!-- Save Product Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Work Order</x-slot>

            <x-slot name="content">
                
                <x-input.group for="regus_id" label="Regu" :error="$errors->first('editing.regus_id')">
                    <x-input.select wire:model="editing.regus_id" id="regus_id">
                        <option value="">Pilih Regu</option>
                        @forelse ($regus as $regu)
                            <option value="{{ $regu->id }}">{{ $regu->name }}</option>
                        @empty
                            <option value="">No Group Exist</option>
                        @endforelse
                    </x-input.select>
            </x-input.group>


                <x-input.group for="id_pelanggan" label="ID Pelanggan" :error="$errors->first('editing.id_pelanggan')">
                    <x-input.text wire:model="editing.id_pelanggan" id="id_pelanggan" placeholder="ID Pelanggan" />
                </x-input.group>

                <x-input.group for="nama_pelanggan" label="Nama Pelanggan" :error="$errors->first('editing.nama_pelanggan')">
                    <x-input.text wire:model="editing.nama_pelanggan" id="nama_pelanggan" placeholder="Nama Pelanggan" />
                </x-input.group>

                <x-input.group for="alamat" label="Alamat" :error="$errors->first('editing.alamat')">
                    <x-input.text wire:model="editing.alamat" id="alamat" placeholder="Alamat" />
                </x-input.group>

                <x-input.group for="latitude" label="Latitude" :error="$errors->first('editing.latitude')">
                    <x-input.text wire:model="editing.latitude" id="latitude" placeholder="Latitude" />
                </x-input.group>

                <x-input.group for="longitude" label="Longitude" :error="$errors->first('editing.longitude')">
                    <x-input.text wire:model="editing.longitude" id="longitude" placeholder="Longitude" />
                </x-input.group>

                <x-input.group for="jenis_p2tl" label="Jenis P2TL" :error="$errors->first('editing.jenis_p2tl')">
                    <x-input.select wire:model="editing.jenis_p2tl" id="regus_id">
                        <option value="">Pilih Jenis P2TL</option>
                        @forelse ($jenis_p2tl as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @empty
                            <option value="">Tidak ada Jenis P2TL yang ditemukan</option>
                        @endforelse
                    </x-input.select>
                </x-input.group>

                <x-input.group for="tarif" label="Tarif" :error="$errors->first('editing.tarif')">
                    <x-input.text wire:model="editing.tarif" id="tarif" placeholder="Tarif" />
                </x-input.group>

                <x-input.group for="daya" label="Daya" :error="$errors->first('editing.daya')">
                    <x-input.text type="number" wire:model="editing.daya" id="daya" placeholder="Daya" />
                </x-input.group>

                <x-input.group for="rbm" label="RBM" :error="$errors->first('editing.rbm')">
                    <x-input.text type="number" wire:model="editing.rbm" id="rbm" placeholder="RBM" />
                </x-input.group>

                <x-input.group for="lgkh" label="LGKH" :error="$errors->first('editing.lgkh')">
                    <x-input.text type="number" wire:model="editing.lgkh" id="lgkh" placeholder="LGKH" />
                </x-input.group>

                <x-input.group for="fkm" label="FKM" :error="$errors->first('editing.fkm')">
                    <x-input.text type="number" wire:model="editing.fkm" id="fkm" placeholder="FKM" />
                </x-input.group>
                
                <x-button.primary class="m-5" wire:click="jam_nyala_create"><x-icon.plus/> Jam Nyala Baru</x-button.primary>
                
                <x-table>
                    <x-slot name="head">
                        <x-table.heading>Tanggal</x-table.heading>
                        <x-table.heading>Jumlah</x-table.heading>
                        <x-table.heading />
                    </x-slot>

                    <x-slot name="body">
                        @forelse ($jam_nyala as $nyala)
                        <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $nyala->id }}">
                            {{-- <x-table.cell class="pr-0">
                                <x-input.checkbox wire:model="selected" value="{{ $nyala->id }}" />
                            </x-table.cell> --}}

                            <x-table.cell>
                                @php
                                    $sebut = Illuminate\Support\Carbon::parse($nyala->tanggal)->format('F');
                                @endphp
                                <span class="text-gray-900 font-medium">{{ $sebut }} </span>
                            </x-table.cell>

                            <x-table.cell>
                                <span class="text-gray-900 font-medium">{{ $nyala->jumlah }} </span>
                            </x-table.cell>

                            <x-table.cell>
                                <x-button.link wire:click="edit({{ $nyala->id }})">Edit</x-button.link>
                            </x-table.cell>
                        </x-table.row>
                        @empty
                        <x-table.row>
                            <x-table.cell colspan="12">
                                <div class="flex justify-center items-center space-x-2">
                                    <x-icon.inbox class="h-8 w-8 text-gray-400" />
                                    <span class="font-medium py-8 text-gray-400 text-xl">Tidak ada jam nyala yang ditemukan...</span>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>

                {{-- @if ($editing->id)
                    @livewire('admin.jam-nyala', array($editing->id))
                @endif --}}
                

                
                

                <x-input.group for="keterangan_p2tl" label="Keterangan" :error="$errors->first('editing.keterangan_p2tl')">
                    <x-input.text wire:model="editing.keterangan_p2tl" id="keterangan_p2tl" disabled>
                    </x-input.text>
                </x-input.group>
                

                <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
                    <x-input.select wire:model="editing.status" id="status">
                        <option value="">Pilih Status</option>
                        @forelse ($statuses as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @empty
                            <option value="">Tidak ada status yang diset</option>
                        @endforelse
                    </x-input.select>
                </x-input.group>

                {{-- @if (!empty($this->editing->ba_pemeriksaan->path_ba_pemeriksaan))
                    <x-input.group label="Upload Ba" for="upload_ba" :error="$errors->first('upload_ba')">
                        <x-jet-button wire:click="download_berita_acara({{ $editing->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg> 
                            Download Berita Acara
                        </x-jet-button>
                    </x-input.group>
                @endif --}}


                @if (!empty($this->editing->path_image))
                    <x-input.group label="Image" for="upload_video" :error="$errors->first('upload_video')">
                        <x-jet-button wire:click="download_image({{ $editing->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg> 
                            Download Image
                        </x-jet-button>
                    </x-input.group>
                @endif


                @if (!empty($this->editing->path_video))
                    <x-input.group label="Video" for="upload_video" :error="$errors->first('upload_video')">
                        <x-jet-button wire:click="download_video({{ $editing->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 pr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg> 
                            Download Video
                        </x-jet-button>
                    </x-input.group>
                @endif
                
                <x-input.group for="tanggal_inspeksi" label="Tanggal Inspeksi" :error="$errors->first('editing.tanggal_inspeksi')">
                    <x-datepicker wire:model="editing.tanggal_inspeksi" id="tanggal_inspeksi" Placeholder="Tanggal Inspeksi">
                    </x-datepicker>
                </x-input.group>

                <x-input.group for="" label="Keterangan Berita Acara">

                </x-input.group>


                <x-input.group for="no_ba" label="No BA" :error="$errors->first('editing.no_ba')">
                    <x-input.text wire:model="editing.no_ba" id="no_ba" Placeholder="Nomor BA">
                    </x-input.text>
                </x-input.group>

                <x-input.group for="surat_tugas_p2tl" label="Surat Tugas P2TL" :error="$errors->first('editing.surat_tugas_p2tl')">
                    <x-input.text wire:model="editing.surat_tugas_p2tl" id="surat_tugas_p2tl" Placeholder="Surat Tugas P2TL">
                    </x-input.text>
                </x-input.group>

                <x-input.group for="tanggal_surat_tugas_p2tl" label="Tanggal Surat Tugas P2TL" :error="$errors->first('editing.tanggal_surat_tugas_p2tl')">
                    <x-datepicker wire:model="editing.tanggal_surat_tugas_p2tl" id="tanggal_surat_tugas_p2tl" Placeholder="Tanggal Surat Tugas P2TL">
                    </x-datepicker>
                </x-input.group>

                <x-input.group for="surat_tugas_tni" label="Surat Tugas TNI" :error="$errors->first('editing.surat_tugas_tni')">
                    <x-input.text wire:model="editing.surat_tugas_tni" id="surat_tugas_tni" Placeholder="Surat Tugas TNI">
                    </x-input.text>
                </x-input.group>


                <x-input.group for="tanggal_surat_tugas_tni" label="Tanggal Surat Tugas TNI" :error="$errors->first('editing.tanggal_surat_tugas_tni')">
                    <x-datepicker wire:model="editing.tanggal_surat_tugas_tni" id="surat_tugas_p2tl" Placeholder="Tanggal Surat Tugas P2TL">
                    </x-datepicker>
                </x-input.group>

                <x-input.group for="pendamping1_id" label="Pendamping 1" :error="$errors->first('editing.pendamping1_id')">
                    <x-input.select wire:model="editing.pendamping1_id" id="pendamping1_id">
                        <option value="">Pilih Pendamping</option>
                        @forelse ($pendampings as $pendamping)
                            <option value="{{ $pendamping->id }}">{{ $pendamping->name }}</option>
                        @empty
                            <option value="">Tidak ada pendamping yang ditemukant</option>
                        @endforelse
                    </x-input.select>
                 </x-input.group>

                 <x-input.group for="pendamping2_id" label="Pendamping 2" :error="$errors->first('editing.pendamping2_id')">
                    <x-input.select wire:model="editing.pendamping2_id" id="pendamping2_id">
                        <option value="">Pilih Pendamping</option>
                        @forelse ($pendampings as $pendamping)
                            <option value="{{ $pendamping->id }}">{{ $pendamping->name }}</option>
                        @empty
                            <option value="">Tidak ada pendamping yang ditemukan</option>
                        @endforelse
                    </x-input.select>
                 </x-input.group>

                 @if(!empty($editing->status_pelanggaran))
                    @if($editing->status_pelanggaran != 'Normal')
    
                    <x-input.group for="jumlah_ts_rp" label="Jumlah TS (Rp)" :error="$errors->first('editing.jumlah_ts_rp')">
                        <x-input.text wire:model="editing.jumlah_ts_rp" id="no_ba" Placeholder="Jumlah TS (Rp)">
                        </x-input.text>
                    </x-input.group>

                    <x-input.group for="jumlah_ts_kwh" label="Jumlah TS (kWh)" :error="$errors->first('editing.jumlah_ts_kwh')">
                        <x-input.text wire:model="editing.jumlah_ts_kwh" id="no_ba" Placeholder="Jumlah TS (kWh)">
                        </x-input.text>
                    </x-input.group>

                    @endif
                 @endif
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>


    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Hapus Data</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Anda yakin ingin menghapus data? Data yang terhapus tidak bisa dikembalikan.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showDeleteModal', false)">Batal</x-button.secondary>

                <x-button.primary type="submit">Hapus</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>
    
    <form wire:submit.prevent="jam_nyala_save">
        <x-modal.dialog wire:model.defer="jam_nyala_showEditModal">
            <x-slot name="title">Jam Nyala</x-slot>

            <x-slot name="content">

                <x-input.group for="tanggal" label="Tanggal" :error="$errors->first('editing.tanggal')">
                    <x-.datepicker wire:model="nyala_model.tanggal" placeholder="Tanggal" />
                </x-input.group>

                <x-input.group for="jumlah" label="Jumlah" :error="$errors->first('editing.jumlah')">
                    <x-input.text wire:model="nyala_model.jumlah" placeholder="Jumlah" />
                </x-input.group>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('jam_nyala_showEditModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>

{{-- @push('addon-script')
<script>
    // Get element references
    var confirmBtn = document.getElementById('confirmPosition');
    var onClickPositionView = document.getElementById('onClickPositionView');
    var onIdlePositionView = document.getElementById('onIdlePositionView');
  
    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
      setCurrentPosition: true,
      lat: 45.5017,
      lng: -73.5673, // You can omit this, defaults to true
    }, {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
    });
  
    // Listen to button onclick event
    confirmBtn.onclick = function () {
      // Get current location and show it in HTML
      var location = lp.getMarkerPosition();
      onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
    };
  
    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
      // Get current location and show it in HTML
      var location = lp.getMarkerPosition();
      onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
    });
  </script>
@endpush --}}