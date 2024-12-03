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
