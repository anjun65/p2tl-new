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
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label for="company-website" class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->nama_saksi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                          
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label for="company-website" class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->alamat_saksi }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>
                                    
                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label for="company-website" class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                          <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" disabled value="{{ $item->nomor_identitas }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="grid grid-cols-3 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                          <label for="company-website" class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
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
                                            <label for="company-website" class="block text-sm font-medium text-gray-700">Merk/Type</label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                              <input type="text" disabled value="{{ $item->data_lama->merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            </div>
                                          </div>
                                        </div>

                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">No. Register</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->no_reg }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">No. Seri</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->no_seri }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>


                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Tahun Pembuatan</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->tahun_pembuatan }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Class</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->class }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Konstanta</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->konstanta }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Rating Arus (In)</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->rating_arus }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Tegangan Nomimal</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->tegangan_nominal }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Stand kWh Meter</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->stand_kwh_meter }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto KWH Meter</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->foto_kwh_meter) }}"/>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->rating_arus }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->alat_pembatas_merk }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                              <label for="company-website" class="block text-sm font-medium text-gray-700">Nama Saksi</label>
                                              <div class="mt-1 flex rounded-md shadow-sm">
                                                <input type="text" disabled value="{{ $item->data_lama->rating_arus_2 }}" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                              </div>
                                            </div>
                                          </div>

                                          <div>
                                            <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                            <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                              <div class="space-y-1 text-center">
                                                <img src="{{ Storage::url($item->foto_pembatas) }}"/>
                                              </div>
                                            </div>
                                          </div>                                        
                                      </div>
                                    </div>
                                </div>
                              </div>
                             

                              
                                  
                              @endif
                               {{-- Data App Lama --}}
                        </div>

                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>