<x-app-layout>
	<x-slot name="head">
		<link rel="stylesheet" href="{{ asset('dist/vendor/datatables/buttons.dataTables.min.css') }}">
	</x-slot>
	<x-slot name="title">Laporan</x-slot>

	@if(session()->has('success'))
	<x-alert type="success" message="{{ session()->get('success') }}" />
	@endif

	<x-card>
    <x-slot name="title">Detail Pengguna</x-slot>

    <table class="table table-hover mb-3">
        <thead>
            <th>Nama Perusahaan</th>
            <th>Alamat Pos</th>
            <th>Nomor Telephone/Fax</th>
            <th>Email</th>
            <th>Pekerjaan</th>
            <th>Sertifikat</th>
        </thead>
		<tbody>
			@foreach ($data as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->alamat_pos }}</td>
					<td>{{ $user->nomor }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->pekerjaan }}</td>
					<td>
						@if($user->certificate)
							<a href="{{ asset('public/storage/app/public/' . $user->certificate) }}" target="_blank">
								Lihat Sertifikat
							</a>
						@else
							Tidak ada sertifikat
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
			
    </table>
</x-card>


	

	<x-slot name="script">
		<script src="{{ asset('dist/vendor/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/jszip.min.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/pdfmake.min.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/vfs_fonts.js') }}"></script>
		<script src="{{ asset('dist/vendor/datatables/buttons.html5.min.js') }}"></script>
		<script>

			$(document).ready(function () {
		      $('table').DataTable({
			        dom: 'Bfrtip',
			        buttons: [
			            'excelHtml5',
			            'csvHtml5',
			            'pdfHtml5'
			        ]
			    } );
		    });
		</script>
	</x-slot>
</x-app-layout>