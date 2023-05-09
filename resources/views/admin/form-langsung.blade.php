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
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                              <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                  <h3 class="text-lg font-medium leading-6 text-gray-900">Data Petugas Lapangan</h3>
                                  <p class="mt-1 text-sm text-gray-600"></p>
                                </div>
                              </div>
                              <div class="mt-5 md:col-span-2 md:mt-0">
                            
                              </div>
                            </div>
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
                                            <input type="text" disabled value="{{ $item->nama_saksi ?? '' }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                          
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->alamat_saksi ?? '' }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                    
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->nomor_identitas ?? '' }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->no_telpon_saksi ?? '' }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      @if (isset($item->file_nomor_identitas))
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                              <img src="{{ Storage::url($item->file_nomor_identitas) }}" />
                                          </div>
                                        </div>
                                      </div>
                                      @endif
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
                             
                              
                                  
                              @endif
                               {{-- Data App Baru --}}

                            @if (!empty($item->data_baru))
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
                             
                              
                                  
                              @endif
                               {{-- Data Pemeriksaan Terminal --}}

                               {{-- Data Pemeriksaan Pelindung KWH --}}

                            @if (!empty($item->pelindung_busbar))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Pintu Box APP 
                                        /Pelindung Busbar dan Pembatas</h3>
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
                                              <input type="text" disabled value="{{ $item->pelindung_busbar->peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pelindung_busbar->segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Sgel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pelindung_busbar->nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->pelindung_busbar->keterangan }}</textarea>
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sebelum</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->pelindung_busbar->foto_sebelum) }}"/>
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
                                                <input type="text" disabled value="{{ $item->pelindung_busbar->post_peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pelindung_busbar->post_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pelindung_busbar->post_nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                        

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sesudah</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->pelindung_busbar->foto_sesudah) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                              
                                  
                              @endif
                               {{-- Data Pemeriksaan Pelindung KWH --}}


                               {{-- Data Pemeriksaan Papan OK --}}

                            @if (!empty($item->papan_ok))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Pintu Box APP 
                                        /Pelindung Busbar dan Pembatas</h3>
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
                                              <input type="text" disabled value="{{ $item->papan_ok->peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->papan_ok->segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Sgel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->papan_ok->nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->papan_ok->keterangan }}</textarea>
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sebelum</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->papan_ok->foto_sebelum) }}"/>
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
                                                <input type="text" disabled value="{{ $item->papan_ok->post_peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->papan_ok->post_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->papan_ok->post_nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                        

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sesudah</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->papan_ok->foto_sesudah) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                              
                                  
                              @endif
                               {{-- Data Pemeriksaan Papan OK --}}


                         {{-- Data Box Penutup MCB/Pembatas --}}

                            @if (!empty($item->penutup_mcb))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Box Penutup MCB/Pembatas</h3>
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
                                              <input type="text" disabled value="{{ $item->penutup_mcb->peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->penutup_mcb->segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Sgel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->penutup_mcb->nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->penutup_mcb->keterangan }}</textarea>
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sebelum</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->penutup_mcb->foto_sebelum) }}"/>
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
                                                <input type="text" disabled value="{{ $item->penutup_mcb->post_peralatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->penutup_mcb->post_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Nomor, Tahun, Kode Segel</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->penutup_mcb->post_nomor_tahun_kode_segel }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                        

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Sesudah</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->penutup_mcb->foto_sesudah) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                              
                                  
                              @endif
                               {{-- Data Pemeriksaan Box Penutup MCB/Pembatas --}}

                               {{--  Data Pemeriksaan Pengukuran --}}

                            @if (!empty($item->pemeriksaan_pengukuran))
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Pemeriksaan dan Pengukuran</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                  
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Arus</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Phase 1</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->arus_1 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 2</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->arus_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 3</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->arus_3 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Netral</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->arus_netral }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Voltase Phase - Netral</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Phase 1</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_netral_1 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 2</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_netral_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 3</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_netral_3 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Voltase Phase - Phase</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Phase 1</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_phase_1 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 2</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_phase_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 3</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->voltase_phase_3 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">COS</label>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                          <div class="col-span-3 sm:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Phase 1</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->cos_1 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 2</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->cos_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Phase 3</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->cos_3 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-large text-gray-700">Akurasi</label>
                                            </div>
                                        </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label class="block text-sm font-medium text-gray-700">Akurasi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->pemeriksaan_pengukuran->akurasi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->pemeriksaan_pengukuran->foto_sebelum) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                                            
                                      </div>
                                    </div>
                                </div>
                              </div>
                             
                              
                                  
                              @endif
                               {{-- Data  Wiring App --}}

                            
                               @if (!empty($item->wiring_app))
                                <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                    <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Wiring APP</h3>
                                        <p class="mt-1 text-sm text-gray-600"></p>
                                    </div>
                                    </div>
                                    <div class="mt-5 md:col-span-2 md:mt-0">
                                    
                                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                            <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 1 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->wiring_app->terminal1 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 2 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 3 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal3 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 4 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal4 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 5 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal5 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 6 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal6 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 7 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal7 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 8 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal8 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 9 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal9 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Terminal 11 kWh Meter Terhubung dengan</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" disabled value="{{ $item->wiring_app->terminal11 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                                </div>
                                            </div>
                                            
                                            <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->wiring_app->keterangan_wiring_app }}</textarea>
                                                    

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Foto</label>
                                                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                <div class="space-y-1 text-center">
                                                    <img src="{{ Storage::url($item->wiring_app->foto_sebelum) }}"/>
                                                </div>
                                                </div>
                                            </div>
    
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                  
                              @endif
                               {{-- Data Wiring App --}}


                               {{-- Data  Hasil Pemeriksaan --}}

                            
                               @if (!empty($item->hasil_pemeriksaan))
                                <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                    <div class="md:col-span-1">
                                        <div class="px-4 sm:px-0">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Hasil Pemeriksaan</h3>
                                            <p class="mt-1 text-sm text-gray-600"></p>
                                        </div>
                                    </div>
                                    <div class="mt-5 md:col-span-2 md:mt-0">
                                    
                                        <div class="shadow sm:overflow-hidden sm:rounded-md">
                                            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                                                <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Hasil Pemeriksaan</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->hasil_pemeriksaan->hasil_pemeriksaan }}</textarea>
                                                </div>
                                                </div>
                                                </div>

                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Kesimpulan Hasil Pemeriksaan</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->hasil_pemeriksaan->kesimpulan }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Tindakan Yang Dilakukan</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->hasil_pemeriksaan->tindakan }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Barang Bukti Yang Diambil</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <textarea rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->hasil_pemeriksaan->barang_bukti }}</textarea>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Foto</label>
                                                    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                        <div class="space-y-1 text-center">
                                                            <img src="{{ Storage::url($item->hasil_pemeriksaan->foto_barang_bukti) }}"/>
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                              
                                  
                              @endif
                               {{-- Data Hasil Pemeriksaan App --}}
                              
                              @if ($item->work->kalibrasi)
                                  
                                
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data Kalibrasi</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                </div>
                              </div>

                              {{-- Data saksi --}}
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
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->nama_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->alamat_saksi  ?? ''}}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->nomor_identitas ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->no_telpon_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Pekerjaan Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->pekerjaan_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      {{-- @if ($item->work->kalibrasi->file_nomor_identitas)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <img src="{{ Storage::url($item->work->kalibrasi->file_nomor_identitas) }}" />
                              
                              
                                          </div>
                                        </div>
                                      </div>
                                      @endif --}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data Saksi --}}

                              {{-- Data kWh Meter --}}
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data kWh Meter</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                  <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Merk</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->merk }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">No. Register</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->no_register }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">No. Seri</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->no_seri }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Tahun Pembuatan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->tahun_pembuatan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Class</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->class }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Konstanta</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->konstanta }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Rating Arus</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->rating_arus }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Tegangan Nomimal</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->tegangan_nomimal }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Stand Kwh Meter</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh->stand_kwh_meter }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <textarea rows="3"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->work->kalibrasi->data_kwh->keterangan }}</textarea>
                                          </div>
                                        </div>
                                      </div>
                              
                                      @if ($item->work->kalibrasi->data_kwh->file)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <a href="{{ Storage::url($item->work->kalibrasi->data_kwh->file) }}">Download Video</a>
                                            
                                  
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data kWh Meter --}}

                              {{-- Data kWh Meter Lanjutan--}}
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data kWh Meter Lanjutan</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                  <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Atas A</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->atas_a }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Atas B</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->atas_a }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Atas Keterangan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->atas_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kanan A</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kanan_a }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kanan B</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kanan_b }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kanan Keterangan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kanan_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kiri A</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kiri_a }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kiri B</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kiri_b }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kiri Keterangan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_kwh_lanjutan->kiri_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                      
                              
                                      @if ($item->work->kalibrasi->data_kwh_lanjutan->file)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <a href="{{ Storage::url($item->work->kalibrasi->data_kwh_lanjutan->file) }}">Download Video</a>
                              
                              
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data kWh Meter Lanjutan--}}

                              {{-- Data Uji Akurasi--}}
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data Uji Akurasi</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                  <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Tegangan (100)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_100_tegangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Arus (100)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_100_arus }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Akurasi (100)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_100_akurasi }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Keterangan (100)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_100_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Tegangan (50)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_50_tegangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Arus (50)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_50_arus }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Akurasi (50)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_50_akurasi }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Keterangan (50)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_50_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Tegangan (5)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_5_tegangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Beban Arus (5)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_5_arus }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Akurasi (5)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_5_akurasi }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                      
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Keterangan (5)</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->beban_5_keterangan }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Merk alat Uji</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->alat_uji_merk }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Type alat Uji</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->alat_uji_type }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">No Seri alat Uji</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->data_uji_akurasi->alat_uji_no_seri }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Kesimpulan</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <textarea rows="3"
                                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $item->work->kalibrasi->data_uji_akurasi->kesimpulan }}</textarea>
                                          </div>
                                        </div>
                                      </div>
                              
                                      @if ($item->work->kalibrasi->data_uji_akurasi->file)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <a href="{{ Storage::url($item->work->kalibrasi->data_uji_akurasi->file) }}">Download Video</a>
                              
                              
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data Uji Akurasi--}}
                              @endif

                              @if ($item->work->barangBukti)
                              
                              
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Data Barang Bukti</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                </div>
                              </div>
                              
                              {{-- Data saksi --}}
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
                                            <input type="text" disabled value="{{ $item->work->barangBukti->nama_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->alamat_saksi  ?? ''}}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->nomor_identitas ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->no_telpon_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Pekerjaan Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->kalibrasi->pekerjaan_saksi ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      @if ($item->work->barangBukti->file_identitas)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <img src="{{ Storage::url($item->work->barangBukti->file_identitas) }}" />
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data Saksi --}}

                              
                              {{-- Data Barang Bukti --}}
                              <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                  <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Detail Barang Bukti</h3>
                                    <p class="mt-1 text-sm text-gray-600"></p>
                                  </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                              
                                  <div class="shadow sm:overflow-hidden sm:rounded-md">
                                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                      <div class="grid grid-cols-2 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Jenis Kabel</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->jenis_kabel ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Panjang Kabel</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->panjang_kabel  ?? ''}}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Tera</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->tera ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Terminal Kwh Meter</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->terminal_kwh_meter ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                              
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Box OK</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->box_ok ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Box APP</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->box_app ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alat Pembatas</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->alat_pembatas ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label class="block text-sm font-medium text-gray-700">Alat Bantu Ukur</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->work->barangBukti->alat_bantu_ukur ?? '' }}"
                                              class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>

                                      @if ($item->work->barangBukti->file_barang_bukti)
                                      <div>
                                        <label class="block text-sm font-medium text-gray-700">Foto Barang Bukti</label>
                                        <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                          <div class="space-y-1 text-center">
                                            <img src="{{ Storage::url($item->work->barangBukti->file_barang_bukti) }}" />
                                      
                                      
                                          </div>
                                        </div>
                                      </div>
                                      @endif

                                    </div>
                                  </div>
                                </div>
                              </div>
                              {{-- Data Barang Bukti --}}

                              @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>