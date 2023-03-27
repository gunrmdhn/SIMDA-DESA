<x-layout :menu="$menu">
    <x-card title="{{ $sub_menu }}">
        <form method="post" action="{{ route('kata-sandi.update', auth()->user()->nama_pengguna) }}">
            @method('put')
            @csrf
            @include('auth/kata-sandi/_form')
        </form>
    </x-card>
</x-layout>