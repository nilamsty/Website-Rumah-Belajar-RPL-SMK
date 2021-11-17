<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Data Pengguna Rumah Belajar RPL SMK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5>Cari Nama Pengguna! </h5>
                    <form class="d-flex" method="GET" action="{{route('datapengguna')}}">
                        <input name="cari" class="form-control me-2" type="search" placeholder="Masukkan Nama Pengguna" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>
                    
                    <br>
                    <br>

                    <h5>Data Pengguna! <a href="{{route('datapengguna')}}" class="btn btn-primary btn-sm">
                        <span class="fa fa-sync"></span>
                    </a></h5> 
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($users as $index=>$user)
                            <tr>
                                <td scope="row">{{$index+1}}</td>
                                <td scope="row">{{$user->name}}</td>
                                <td scope="row">{{$user->email}}</td>
                                <td scope="row"><a class="btn btn-danger fa fa-trash-alt" onClick="return confirm('Apakah Anda Yakin Menghapus Data Pengguna?')" href="{{route('datapengguna.hapus', $user->id)}}"> Hapus</a></td>
                            </tr>
                            @endforeach
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>