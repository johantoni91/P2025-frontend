<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.min.css
"
	rel="stylesheet">
<script>
	$(function() {
		$('#del{{ $i["id"] }}').on('click', function() {
			Swal.fire({
				title: "{{ $title }}",
				showDenyButton: true,
				confirmButtonText: "Ya",
				denyButtonText: `Batal`
			}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					$.ajax({
						url: "{{ $route }}",
						type: 'GET',
						success: function(result) {
							Swal.fire("Berhasil", result['message'], "success");
							setTimeout(() => {
								location.reload();
							}, 2000);
						},
						error: function(xhr) {
							Swal.fire("Gagal", xhr, "error");
						}
					});
				}
			});
		})
	})
</script>
