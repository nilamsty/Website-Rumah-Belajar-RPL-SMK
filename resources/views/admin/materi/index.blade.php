<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Materi Rumah Belajar RPL SMK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="lead"><a href="{{route('materi.tambahmateri')}}">Tambah Materi</a></p>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Materi</th>
                                <th scope="col">Bab</th>
                                <th scope="col">Materi</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($materis as $index=>$materi)
                            <tr>
                                <td scope="row">{{$index+1}}</td>
                                <td scope="row"><a href="{{route('materi.detailmateri', $materi->id)}}">{{$materi->title}}</td>
                                <td scope="row">{{$materi->bab->name}}</td>
                                <td scope="row">{{Str::limit($materi->content), 115}}</td>
                                <td scope="row"><a href="{{route('materi.ubahmateri', $materi->id)}}">Ubah</a></td>
                                <td scope="row"><a href="{{route('materi.hapusmateri', $materi->id)}}">Hapus</a></td>
                            </tr>
                            @endforeach
                        </body>
                    </table>
                    {{$materis->render()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>