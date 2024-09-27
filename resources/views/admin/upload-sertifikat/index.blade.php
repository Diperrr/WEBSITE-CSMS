<x-app-layout>
    <x-slot name="title">Kuesioner</x-slot>

    @if (session()->has('success'))
        <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    @if ($errors->any())
        <x-alert type="danger" message="{{ $errors->first() }}" />
    @endif

    <x-card>
        <x-slot name="title">Upload Sertifikat</x-slot>

        <form action="{{ route('admin.upload-sertifikat.store', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="certificate">Pilih Sertifikat</label>
                <input type="file" name="certificate" id="certificate" class="form-control">
                @error('certificate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Unggah Sertifikat</button>
        </form>


    </x-card>

    <x-slot name="script">
        
    </x-slot>
</x-app-layout>
