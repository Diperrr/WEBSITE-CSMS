<x-app-layout>
    <x-slot name="title">Kuesioner</x-slot>

    @if (session()->has('success'))
        <x-alert type="success" message="{{ session()->get('success') }}" />
    @endif

    @if ($errors->any())
        <x-alert type="danger" message="{{ $errors->first() }}" />
    @endif

    <x-card>
        <x-slot name="title">Semua Kuesioner</x-slot>

        <form id="kuesionerForm" action="{{ route('admin.kuesioner-response.store') }}" method="POST"
            enctype="multipart/form-data" onsubmit="return validateForm();">
            @csrf

            @foreach ($kuesioners as $kuesioner)
                <div class="mb-4">
                    <label>{{ $kuesioner->pertanyaan }}</label>
                    <input type="hidden" name="kuesioner_id[]" value="{{ $kuesioner->id }}">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{ $kuesioner->id }}]"
                            value="Ya" id="jawabanYa{{ $kuesioner->id }}"
                            {{ isset($responses[$kuesioner->id]) && $responses[$kuesioner->id]['jawaban'] == 'Ya' ? 'checked' : '' }}
                            onchange="toggleFileInput(this, {{ $kuesioner->id }}, '{{ $kuesioner->keterangan }}')"
                            disabled>
                        <label class="form-check-label" for="jawabanYa{{ $kuesioner->id }}">Ya</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban[{{ $kuesioner->id }}]"
                            value="Tidak" id="jawabanTidak{{ $kuesioner->id }}"
                            {{ isset($responses[$kuesioner->id]) && $responses[$kuesioner->id]['jawaban'] == 'Tidak' ? 'checked' : '' }}
                            onchange="toggleFileInput(this, {{ $kuesioner->id }})" disabled>
                        <label class="form-check-label" for="jawabanTidak{{ $kuesioner->id }}">Tidak</label>
                    </div>

                    <!-- File input dan preview -->
                    <div id="lampiran{{ $kuesioner->id }}"
                        style="display: {{ isset($responses[$kuesioner->id]) && $responses[$kuesioner->id]['jawaban'] == 'Ya' ? 'block' : 'none' }};">
                        <input type="file" name="lampiran[{{ $kuesioner->id }}]" class="form-control-file"
                            onchange="previewFile(this, {{ $kuesioner->id }})" disabled>

                        <!-- Preview area -->
                        <div id="preview{{ $kuesioner->id }}" style="margin-top: 10px;">
                            @if (isset($responses[$kuesioner->id]) && $responses[$kuesioner->id]['lampiran'])
                                @php
                                    $extension = pathinfo($responses[$kuesioner->id]['lampiran'], PATHINFO_EXTENSION);

                                @endphp

                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Display image -->
                                    <img src="{{ asset('storage/' . $responses[$kuesioner->id]['lampiran']) }}"
                                        alt="Lampiran" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <!-- Display file link -->
                                    <a href="{{ asset('storage/' . $responses[$kuesioner->id]['lampiran']) }}"
                                        target="_blank">download file</a>
                                @endif
                            @endif
                        </div>
                    </div>

                    <!-- Keterangan div -->
                    <div id="keterangan{{ $kuesioner->id }}"
                        style="display: {{ isset($responses[$kuesioner->id]) && $responses[$kuesioner->id]['jawaban'] == 'Ya' && $kuesioner->keterangan ? 'block' : 'none' }}; margin-top: 10px;">
                        <p><strong>Keterangan:</strong> {{ $kuesioner->keterangan }}</p>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary" disabled>Submit</button>
        </form>

        <!-- Tombol Edit -->
        <button class="btn btn-warning" onclick="enableEditing()">Edit</button>
    </x-card>

    <x-slot name="script">
        <script>
            function enableEditing() {
                const inputs = document.querySelectorAll('input.form-check-input, input.form-control-file');
                inputs.forEach(input => {
                    input.disabled = false;
                });
                const submitBtn = document.querySelector('button[type="submit"]');
                submitBtn.disabled = false;
            }

            function toggleFileInput(radio, id, keterangan = '') {
                const fileInput = document.getElementById('lampiran' + id);
                const keteranganDiv = document.getElementById('keterangan' + id);

                if (radio.value === 'Ya') {
                    fileInput.style.display = 'block';
                    if (keterangan) {
                        keteranganDiv.style.display = 'block';
                    }
                } else {
                    fileInput.style.display = 'none';
                    keteranganDiv.style.display = 'none';
                    clearFilePreview(id); // Clear preview when "Tidak" is selected
                }
            }

            function previewFile(input, id) {
                const preview = document.getElementById('preview' + id);
                preview.innerHTML = ''; // Clear previous preview

                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        if (file.type.startsWith('image/')) {
                            // Display image preview
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '200px';
                            img.style.maxHeight = '200px';
                            preview.appendChild(img);
                        } else {
                            // Display file name for non-image files
                            const link = document.createElement('a');
                            link.href = e.target.result;
                            link.textContent = file.name;
                            link.target = '_blank';
                            preview.appendChild(link);
                        }
                    };

                    reader.readAsDataURL(file);
                }
            }

            function clearFilePreview(id) {
                const preview = document.getElementById('preview' + id);
                preview.innerHTML = '';
            }
        </script>
    </x-slot>
</x-app-layout>
