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
                                                    <x-button.primary type="submit" class="mt-5 items-end">
                                                        Generate PDF
                                                    </x-button.primary>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-2 gap-6">
                                                <div class="col-span-3 sm:col-span-2">
                                                    @if (($item->isEmpty()))
                                                        <form action="{{ route('serah-terima-post') }}" method="POST">
                                                            @csrf
                                                            <label class="block text-sm font-medium text-gray-700">No Berita Acara Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                <input type="text" name='no_ba'
                                                                    class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                            </div>
                                                        
                                                            <label class="mt-1 block text-sm font-medium text-gray-700">Tanggal Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                <x-datepicker2 name='tanggal_serah_terima'>
                                                                </x-datepicker2>
                                                            </div>
                                                        
                                                            <x-button type="submit" class="mt-5">
                                                                Save now
                                                            </x-button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('annev-edit-form-langsung', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <label class="block text-sm font-medium text-gray-700">No Berita Acara Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                <input type="text" name='no_ba'
                                                                    class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                            </div>
                                                        
                                                            <label class="mt-1 block text-sm font-medium text-gray-700">Tanggal Serah Terima</label>
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                                <x-datepicker2 name='tanggal_serah_terima'>
                                                                </x-datepicker2>
                                                            </div>
                                                        
                                                            <x-button type="submit" class="mt-5">
                                                                Save now
                                                            </x-button>
                                                        
                                                        </form>
                                                    @endif
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
