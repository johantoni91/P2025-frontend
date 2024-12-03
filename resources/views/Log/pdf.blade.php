<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type"
			content="text/html; charset=utf-8" />
		<style>
			#header {
				text-align: center;
			}

			.table {
				width: 100%;
				border-collapse: collapse;
			}

			.mx-auto {
				padding: 0 4rem;
			}

			.vertical-top {
				vertical-align: top;
			}

			.left {
				text-align: left;
			}

			.table tr th,
			.table tr {
				padding: 10px;
				border: 1px solid #000;
			}

			.table td {
				padding: 10px;
				max-width: 2rem;
				word-wrap: break-word;
				border: 1px solid #000;
			}
		</style>
	</head>

	<body>
		<div id="header">
			<h3>Tabel Daftar Aktivitas Aplikasi</h3>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th style="width: 30px;">No</th>
					<th>Nama</th>
					<th>Aksi</th>
					<th>Alamat IP</th>
					<th>User Agent</th>
					<th>Waktu</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $i)
					<tr>
						<td id="header">{{ $loop->iteration }}.</td>
						<td>{{ $i["username"] }}
						</td>
						<td>{{ $i["action"] }}
						</td>
						<td style="text-align: center;">{{ $i["ip_address"] }}</td>
						<td>{{ $i["user_agent"] }}</td>
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
