<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ekstrakurikuler: ') . $ekskul->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('admin.ekskul.update', $ekskul->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Ekskul -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama" id="nama" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   required 
                                   value="{{ old('nama', $ekskul->nama) }}">
                        </div>

                        <!-- Deskripsi Singkat -->
                        <div class="mb-4">
                            <label for="deskripsi_singkat" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                      required>{{ old('deskripsi_singkat', $ekskul->deskripsi_singkat) }}</textarea>
                        </div>
                        
                        <!-- Jadwal -->
                        <div class="mb-4">
                            <label for="jadwal" class="block text-sm font-medium text-gray-700">Jadwal (Opsional)</label>
                            <input type="text" name="jadwal" id="jadwal" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                                   value="{{ old('jadwal', $ekskul->jadwal) }}">
                        </div>

                        <!-- 
                          INI BAGIAN YANG HILANG/RUSAK DI KODE ANDA.
                          Di bawah ini adalah kode yang benar dengan semua class-nya.
                        -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.ekskul.index') }}" 
                               class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>