<div
	class="z-60 fixed bottom-0 w-[100dvw] border-t-2 border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-slate-800/60 print:hidden">
	<div class="container">
		<!-- Footer Start -->
		<footer class="footer bg-transparent text-end font-medium text-slate-600 dark:text-white md:text-center">
			&copy;
			<script>
				var year = new Date();
				document.write(year.getFullYear());
			</script>
			{{ isset($layout) ? $layout["app_name"] : session("layout")[0]["app_name"] }}
		</footer>
		<!-- end Footer -->
	</div>
</div>