<!DOCTYPE html>

<html>

	<head>
		<title>Laporan</title>
		<style type="text/css">
			.center {
				text-align: center;
			}

			.full {
				width: 100%;
			}

			.wrapper {
				padding-left: 30px;
				padding-right: 30px;
			}

			.kanan {
				float: right;
				display: block;
				width: 200px;
			}

			.kiri {
				float: left;
				display: block;
				width: 200px;
			}

			table {
				text-align: center;
			}
		</style>
	</head>

	<body>
		<div class="center">
			<div>
				<h3>Tabel Daftar Pengguna Aplikasi</h3>
			</div>
		</div>
		<table class="table-striped table"
			id="tableDT"
			width="100%">
			<thead>
				<th>No.</th>
				<th style="white-space: nowrap;">Nama Pengguna</th>
				<th>Email</th>
				<th>Sejak</th>
				{{-- <th>Phone</th> --}}
			</thead>
			<tbody>
				@foreach ($data as $i)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $i["name"] }}</td>
						<td>{{ $i["email"] }}</td>
						<td>{{ Carbon\Carbon::parse(strtotime($i["created_at"]))->translatedFormat("l, d F Y") }}
							<br>
							{{ Carbon\Carbon::parse(strtotime($i["created_at"]))->translatedFormat("H:i:s") }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>

</html>
