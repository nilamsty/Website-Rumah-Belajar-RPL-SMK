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
                    <!--Title-->
                    <h2 style="bold">{{$materis->title}}</h2>

                    <p>Pada Bab <a>{{$materis->bab->name}}</a>
                    </p>
                    <hr>

                    <p>{{date('d M Y', strtotime($materis->created_at))}}</p>

                    <p>{{$materis->content}}</p>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
