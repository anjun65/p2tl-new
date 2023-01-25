<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BERITA ACARA SERAH TERIMA DOKUMEN DAN BARANG BUKTI') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="py-4 space-y-4">
                    <div class="flex-col space-y-4">
                        <div>
                            {{-- Detail saksi --}}
                            {{-- <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Detail BA Pengambilan</h3>
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
                                                        <input type="text" disabled value="{{ $item->nama_saksi }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Alamat Saksi</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->alamat_saksi }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Nomor Identitas Saksi</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->nomor_identitas }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Nomor Telpon Saksi</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->no_telpon_saksi }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Foto Identitas</label>
                                                <div
                                                    class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                    <div class="space-y-1 text-center">
                                                        <img src="{{ Storage::url($item->file_identitas) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            {{-- Detail saksi --}}
                            
                            {{-- Detail Barang Bukti --}}
                            {{-- <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Detail BA Pengambilan</h3>
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
                                                        <input type="text" disabled value="{{ $item->jenis_kabel }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Panjang Kabel</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->panjang_kabel }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Tera</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->tera }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Terminal kWh Meter</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->terminal_kwh_meter }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Box OK</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->box_ok }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Box APP</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->box_app }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Alat Pembatas</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->alat_pembatas }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700">Alat Bantu Ukur</label>
                                                    <div class="mt-1 flex rounded-md shadow-sm">
                                                        <input type="text" disabled value="{{ $item->alat_bantu_ukur }}"
                                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                            </div>
                            
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">File Barang Bukti</label>
                                                <div
                                                    class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                                    <div class="space-y-1 text-center">
                                                        <img src="{{ Storage::url($item->file_barang_bukti) }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                            {{-- Detail Barang Bukti --}}
                            
                            <div class="md:grid md:grid-cols-3 md:gap-6 mb-4">
                                <div class="md:col-span-1">
                                    <div class="px-4 sm:px-0">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Detail BA</h3>
                                        <p class="mt-1 text-sm text-gray-600"></p>
                                    </div>
                                </div>
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                            

                                            <div class="grid grid-cols-2 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    {{-- @if (($serah->isEmpty())) --}}
                                                        <form action="{{ route('serah-terima-post', $id)  }}" method="POST">
                                                            @csrf
                                                            
                                                        
                                                            <label class="mt-1 block text-sm font-medium text-gray-700">Tanggal Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                {{-- <x-datepicker2 name='tanggal_serah_terima' id='tanggal_serah_terima'>
                                                                </x-datepicker2> --}}

                                                                <input type="text" name="tanggal_serah_terima" value="{{ $serah->tanggal_serah_terima }}"
                                                                    class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                            </div>
                                                        
                                                            <x-button type="submit" class="mt-5">
                                                                Save now
                                                            </x-button>
                                                        </form>
                                                    {{-- @else
                                                        <form action="{{ route('serah-terima-update', $id) }}" method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            
                                                        
                                                            <label class="mt-1 block text-sm font-medium text-gray-700">Tanggal Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm"> --}}
                                                                {{-- <x-datepicker2 name='tanggal_serah_terima'>
                                                                </x-datepicker2> --}}

                                                                {{-- <input type="text" name="tanggal_serah_terima" value="{{ $serah->tanggal_serah_terima }}"
                                                                    class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                            </div>
                                                        
                                                            <x-button type="submit" class="mt-5">
                                                                Save now
                                                            </x-button>
                                                        
                                                        </form>
                                                    @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
