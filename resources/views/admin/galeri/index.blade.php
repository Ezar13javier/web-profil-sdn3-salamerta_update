<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mb-6">
                        Upload Foto Baru
                    </a>

                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">

                        @forelse ($galeris as $galeri)
                            <div class="relative border rounded-lg shadow-sm">
                                <img src="{{ asset('storage/' . $galeri->path_gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-40 object-cover rounded-t-lg">

                                <div class="p-3">
                                    <p class="text-sm text-gray-700 truncate" title="{{ $galeri->judul }}">
                                        {{ $galeri->judul }}
                                    </p>
                                </div>

                                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white rounded-full p-2 hover:bg-red-700 focus:outline-none"
                                            onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500">
                                Belum ada foto di galeri.
                            </div>
                        @endforelse

                    </div>

                    <div class="mt-6">
                        {{ $galeris->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>