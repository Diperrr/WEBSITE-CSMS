<x-app-layout>
    <x-slot name="title">Kuesioner</x-slot>

    @if (session()->has('success'))
        <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    @if ($errors->any())
        <x-alert type="danger" message="{{ $errors->first() }}" />
    @endif

    <x-card>
        <x-slot name="title">Download Sertifikat</x-slot>
        @if ($user->certificate)
            <div class="alert alert-success">
                <p>Sertifikat tersedia untuk diunduh:</p>
                @if ($user->certificate)
                    <a class="btn btn-success" href="{{ asset('storage/' . $user->certificate) }}" target="_blank">Download Sertifikat</a>
                @endif
            </div>
        @else
            <div class="alert alert-warning">
                <p>Sertifikat belum tersedia.</p>
            </div>
        @endif


    </x-card>

    <x-slot name="script">

    </x-slot>
</x-app-layout>
