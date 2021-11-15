<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materi - Rumah Belajar RPL SMK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5>Silakan akses materi yang Anda Inginkan!</h5><hr><br>
                    @foreach ($materis as $materi)
                    <div class="card">
                        <h5 class="card-header">{{$materi->bab->name}}</h5>
                        <div class="card-body">
                          <h5 class="card-title">{{$materi->title}}</h5>
                          <p class="card-text">{{Str::limit($materi->content, 400)}}</p>
                          <a href="{{route('materi.detailmateri', $materi->id)}}" class="btn btn-primary">Baca Selengkapnya</a>
                          <br>
                          <p class="card-text text-right"><small class="text-muted">{{date('d M Y', strtotime($materi->created_at))}}</small></p>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    {{$materis->render()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
