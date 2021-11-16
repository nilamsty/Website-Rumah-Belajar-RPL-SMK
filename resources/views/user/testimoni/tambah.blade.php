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
                    <h5>Silakan Menambahkan Testimoni!</h5><hr><br>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('testimoni.simpantesti')}}">
                        @csrf
                        <div class="form-group">
                            <label><strong>Nama</strong></label>
                            <select class="form-control" name="user" type="hidden">
                                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>   
                            </select>
                        <br>
                        <div class="form-group">
                            <label><strong>Testimoni</strong></label>
                            <textarea class="form-control" rows="4" name="content"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <br><br>
                        <hr>
                        <div class="text-center">
                            <strong>Kamu mau lihat testimoni dari pengguna lain?? Yukkk,</strong>
                            <a href="{{route('dashboard.testi')}}" class="link-primary">Lihat Di Sini</a>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>