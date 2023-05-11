<div>
    <x-button.secondary wire:click="$toggle('showModal')" class="flex items-center space-x-2"><x-icon.upload class="text-cool-gray-500"/> <span>Import</span></x-button.secondary>

    <form wire:submit.prevent="import">
        <x-modal.dialog wire:model="showModal">
            <x-slot name="title">Import Target Operasi</x-slot>

            <x-slot name="content">
                @unless ($upload)
                <div class="py-12 flex flex-col items-center justify-center ">
                    <div class="flex items-center space-x-2 text-xl">
                        <x-icon.upload class="text-cool-gray-400 h-8 w-8" />
                        <x-input.file-upload wire:model="upload" id="upload"><span class="text-cool-gray-500 font-bold">CSV File</span></x-input.file-upload>
                    </div>
                    @error('upload') <div class="mt-3 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>
                @else
                <div>
                    <x-input.group for="regus_id" label="Regu ID" :error="$errors->first('fieldColumnMap.regus_id')">
                        <x-input.select wire:model="fieldColumnMap.regus_id" id="regus_id">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    
                    <x-input.group for="id_pelanggan" label="ID Pelanggan" :error="$errors->first('fieldColumnMap.id_pelanggan')">
                        <x-input.select wire:model="fieldColumnMap.id_pelanggan" id="id_pelanggan">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="nama_pelanggan" label="Nama Pelanggan" :error="$errors->first('fieldColumnMap.nama_pelanggan')">
                        <x-input.select wire:model="fieldColumnMap.nama_pelanggan" id="nama_pelanggan">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="latitude" label="Latitude" :error="$errors->first('fieldColumnMap.latitude')">
                        <x-input.select wire:model="fieldColumnMap.latitude" id="latitude">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="longitude" label="Longitude" :error="$errors->first('fieldColumnMap.longitude')">
                        <x-input.select wire:model="fieldColumnMap.longitude" id="longitude">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="alamat" label="Alamat" :error="$errors->first('fieldColumnMap.alamat')">
                        <x-input.select wire:model="fieldColumnMap.alamat" id="alamat">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="jenis_p2tl" label="Jenis P2TL" :error="$errors->first('fieldColumnMap.jenis_p2tl')">
                        <x-input.select wire:model="fieldColumnMap.jenis_p2tl" id="jenis_p2tl">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="tarif" label="Tarif" :error="$errors->first('fieldColumnMap.tarif')">
                        <x-input.select wire:model="fieldColumnMap.tarif" id="tarif">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="daya" label="Daya" :error="$errors->first('fieldColumnMap.daya')">
                        <x-input.select wire:model="fieldColumnMap.daya" id="daya">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="rbm" label="RBM" :error="$errors->first('fieldColumnMap.rbm')">
                        <x-input.select wire:model="fieldColumnMap.rbm" id="rbm">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="lgkh" label="LGKH" :error="$errors->first('fieldColumnMap.lgkh')">
                        <x-input.select wire:model="fieldColumnMap.lgkh" id="lgkh">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="fkm" label="FKM" :error="$errors->first('fieldColumnMap.fkm')">
                        <x-input.select wire:model="fieldColumnMap.fkm" id="fkm">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>


                    <x-input.group for="keterangan_p2tl" label="Keterangan P2TL" :error="$errors->first('fieldColumnMap.keterangan_p2tl')">
                        <x-input.select wire:model="fieldColumnMap.keterangan_p2tl" id="keterangan_p2tl">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P1" label="P1" :error="$errors->first('fieldColumnMap.P1')">
                        <x-input.select wire:model="fieldColumnMap.P1" id="P1">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P2" label="P2" :error="$errors->first('fieldColumnMap.P2')">
                        <x-input.select wire:model="fieldColumnMap.P2" id="P2">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P3" label="P3" :error="$errors->first('fieldColumnMap.P3')">
                        <x-input.select wire:model="fieldColumnMap.P3" id="P3">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>


                    <x-input.group for="P4" label="P4" :error="$errors->first('fieldColumnMap.P4')">
                        <x-input.select wire:model="fieldColumnMap.P4" id="P4">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>


                    <x-input.group for="P5" label="P5" :error="$errors->first('fieldColumnMap.P5')">
                        <x-input.select wire:model="fieldColumnMap.P5" id="P5">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P6" label="P6" :error="$errors->first('fieldColumnMap.P6')">
                        <x-input.select wire:model="fieldColumnMap.P6" id="P6">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P7" label="P7" :error="$errors->first('fieldColumnMap.P7')">
                        <x-input.select wire:model="fieldColumnMap.P7" id="P7">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P8" label="P8" :error="$errors->first('fieldColumnMap.P8')">
                        <x-input.select wire:model="fieldColumnMap.P8" id="P8">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="P9" label="P9" :error="$errors->first('fieldColumnMap.P9')">
                        <x-input.select wire:model="fieldColumnMap.P9" id="P9">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>


                    <x-input.group for="P10" label="P10" :error="$errors->first('fieldColumnMap.P10')">
                        <x-input.select wire:model="fieldColumnMap.P10" id="P10">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                            <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    
                    <x-input.group for="status" label="Status" :error="$errors->first('fieldColumnMap.status')">
                        <x-input.select wire:model="fieldColumnMap.status" id="status">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="no_ba" label="Nomor BA" :error="$errors->first('fieldColumnMap.no_ba')">
                        <x-input.select wire:model="fieldColumnMap.no_ba" id="no_ba">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="surat_tugas_p2tl" label="Surat Tugas P2TL" :error="$errors->first('fieldColumnMap.surat_tugas_p2tl')">
                        <x-input.select wire:model="fieldColumnMap.surat_tugas_p2tl" id="surat_tugas_p2tl">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="tanggal_surat_tugas_p2tl" label="Tanggal Surat Tugas P2TL" :error="$errors->first('fieldColumnMap.tanggal_surat_tugas_p2tl')">
                        <x-input.select wire:model="fieldColumnMap.tanggal_surat_tugas_p2tl" id="tanggal_surat_tugas_p2tl">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    

                    <x-input.group for="surat_tugas_tni" label="Surat Tugas TNI/Polri" :error="$errors->first('fieldColumnMap.surat_tugas_tni')">
                        <x-input.select wire:model="fieldColumnMap.surat_tugas_tni" id="surat_tugas_tni">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="tanggal_surat_tugas_tni" label="Tanggal Surat Tugas TNI/Polri" :error="$errors->first('fieldColumnMap.tanggal_surat_tugas_tni')">
                        <x-input.select wire:model="fieldColumnMap.tanggal_surat_tugas_tni" id="tanggal_surat_tugas_tni">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="pendamping1_id" label="Pendamping 1" :error="$errors->first('fieldColumnMap.pendamping1_id')">
                        <x-input.select wire:model="fieldColumnMap.pendamping1_id" id="pendamping1_id">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group for="pendamping2_id" label="Pendamping 2" :error="$errors->first('fieldColumnMap.pendamping2_id')">
                        <x-input.select wire:model="fieldColumnMap.pendamping2_id" id="pendamping2_id">
                            <option value="" disabled>Pilih Kolom</option>
                            @foreach ($columns as $column)
                                <option>{{ $column }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Import</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
