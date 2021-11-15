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
                    <h5>Silakan Menambahkan Materi!</h5><hr><br>
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('materi.updatemateri', $materis->id)}}">
                        @csrf
                        <div class="form-group">
                            <label><strong>Bab</strong></label>
                            <select class="form-control" name="bab">
                                <option value="">Pilih Bab</option>
                                @foreach ($babs as $bab)
                                    <option value="{{$bab->id}}" @if(old('bab', $materis->bab_id)==$bab->id) selected="selected" @endif>{{$bab->name}}</option>   
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><strong>Judul Materi</strong></label>
                            <input type="text" class="form-control" name="title" value="{{old('title', $materis->title)}}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><strong>Materi</strong></label>
                            <textarea class="form-control" rows="4" name="content">{{old('content', $materis->content)}}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 mr-3" href="{{ route('dashboard.manajemenmateri') }}">
                                {{ __('Kembali ke Halaman Manajemen Materi') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>