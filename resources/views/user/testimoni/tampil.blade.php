<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimoni - Rumah Belajar RPL SMK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5>Testimoni Pengguna!</h5><hr><br>
                    @foreach ($testimonis as $testi)
                    <div class="card text-dark-center bg-light" style="width: 55rem">
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-1">{{Str::limit($testi->content, 400)}}</p>
                            </blockquote>
                        <p class="card-text text-right"><small class="text-muted">{{date('d M Y', strtotime($testi->created_at))}}</small></p>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-primary-600 hover:text-primary-900 mr-3" href="{{ route('testimoni.tambahtesti') }}">
                            {{ __('Kembali ke Halaman Tambah Testimoni') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
