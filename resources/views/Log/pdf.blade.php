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
				<h3>Tabel Daftar Aktivitas Aplikasi</h3>
			</div>
		</div>
		<table class="table-striped table"
			id="tableDT"
			width="100%">
			<thead>
				<th>No.</th>
				<th style="white-space: nowrap;">Nama Pengguna</th>
				<th>Aksi</th>
				<th>Entitas</th>
				<th>Alamat IP</th>
				<th>User Agent</th>
				<th>URL</th>
				<th>Pesan</th>
				<th>Waktu</th>
			</thead>
			<tbody>
				@foreach ($data as $i)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $i["username"] }}</td>
						<td>{{ $i["action"] }}</td>
						<td>{{ $i["entity"] }}</td>
						<td>{{ $i["ip_address"] }}</td>
						<td>{{ $i["user_agent"] }}</td>
						<td>{{ $i["url"] }}</td>
						<td>{{ $i["message"] }}</td>
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
