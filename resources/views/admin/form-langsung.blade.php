<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BERITA ACARA') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="py-4 space-y-4">
                    <div class="flex-col space-y-4">
                        <div>
                            {{-- Data Saksi --}}
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                              <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                  <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Saksi</h3>
                                  <p class="mt-1 text-sm text-gray-600"></p>
                                </div>
                              </div>
                              <div class="mt-5 md:col-span-2 md:mt-0">
                                
                                  <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->nama_saksi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                          
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->alamat_saksi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                    
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->nomor_identitas }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->no_telpon_saksi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <img src="{{ Storage::url($item->file_nomor_identitas) }}"/>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            {{-- Data Saksi --}}

                            {{-- Data App LAma --}}
                            @if (!empty($item->data_lama))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data APP Terpasang/Lama</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                  
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">kWh Meter</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Merk/Type</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->data_lama->merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">No. Register</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->no_reg }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">No. Seri</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->no_seri }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Tahun Pembuatan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->tahun_pembuatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Class</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->class }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Konstanta</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->konstanta }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Rating Arus (In)</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->rating_arus }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Tegangan Nomimal</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->tegangan_nominal }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Stand kWh Meter</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->stand_kwh_meter }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->data_lama->foto_kwh_meter) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-large text-gray-700">Alat Pembatas</label>
                                                </div>
                                            </div>
                                        
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                  <label class="block text-sm font-medium text-gray-700">Jenis pembatas</label>
                                                  <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->data_lama->jenis_pembatas }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                  </div>
                                                </div>
                                              </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Merk /Type</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->alat_pembatas_merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->rating_arus_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->data_lama->foto_pembatas) }}"/>
                                              </div>
                                            </div>
                                          </div>                                        
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                            </div>
                              
                                  
                              @endif
                               {{-- Data App Baru --}}

                            @if (!empty($item->data_lama))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data APP Baru</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                  
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">kWh Meter</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Merk/Type</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->data_baru->merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">No. Register</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->no_reg }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">No. Seri</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->no_seri }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Tahun Pembuatan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->tahun_pembuatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Class</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->class }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Konstanta</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->konstanta }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Rating Arus (In)</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->rating_arus }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Tegangan Nomimal</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->tegangan_nominal }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Stand kWh Meter</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->stand_kwh_meter }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->data_baru->foto_kwh_meter) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-large text-gray-700">Alat Pembatas</label>
                                                </div>
                                            </div>
                                        
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                  <label class="block text-sm font-medium text-gray-700">Jenis pembatas</label>
                                                  <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->data_baru->jenis_pembatas }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                  </div>
                                                </div>
                                              </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Merk /Type</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->alat_pembatas_merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_baru->rating_arus_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->data_baru->foto_pembatas) }}"/>
                                              </div>
                                            </div>
                                          </div>                                        
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                            </div>
                              
                                  
                              @endif
                               {{-- Data App Baru --}}

                            {{-- Data Pemeriksaan KWH Meter --}}

                            @if (!empty($item->kwh_meter))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">kWh Meter & Segel Metrologi kWh Meter</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                  
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Kondisi Ketika Pemeriksaan</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Peralatan</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->kwh_meter->peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->kwh_meter->segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Sgel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->kwh_meter->nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->kwh_meter->keterangan }}</textarea>
                                                
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->kwh_meter->foto_sebelum) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Kondisi Setelah Pemeriksaan</label>
                                            </div>
                                        </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Peralatan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->kwh_meter->post_peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->kwh_meter->post_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->kwh_meter->post_nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                        

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->kwh_meter->foto_sesudah) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                            </div>
                              
                                  
                              @endif
                            {{-- Data Pemeriksaan KWH --}}

                            {{-- Data Pemeriksaan Terminal --}}

                            @if (!empty($item->terminal))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Terminal kWh Meter</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                  
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Kondisi Ketika Pemeriksaan</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Peralatan</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->terminal->peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->terminal->segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Sgel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->terminal->nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->terminal->keterangan }}</textarea>
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->terminal->foto_sebelum) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Kondisi Setelah Pemeriksaan</label>
                                            </div>
                                        </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Peralatan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->terminal->post_peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->terminal->post_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->terminal->post_nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                        

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->terminal->foto_sesudah) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                            </div>
                              
                                  
                              @endif
                               {{-- Data Pemeriksaan KWH --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>