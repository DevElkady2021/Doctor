	<!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/js/moment.js') }}"></script>

    	<!-- Daterange -->
		<script src="{{ asset('public/vendor/daterange/daterange.js') }}"></script>
		<script src="{{ asset('public/vendor/daterange/custom-daterange.js') }}"></script>

    	<!-- Data Tables -->
		<script src="{{ asset('public/vendor/datatables/dataTables.min.js') }}"></script>
		<script src="{{ asset('public/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

        	<!-- Custom Data tables -->
		<script src="{{ asset('public/vendor/datatables/custom/custom-datatables.js') }}"></script>
		<script src="{{ asset('public/vendor/datatables/custom/fixedHeader.js') }}"></script>

		

		<!-- Bootstrap Select JS -->
		<script src="{{ asset('public/vendor/bs-select/bs-select.min.js') }}"></script>
	
    	<!-- Main Js Required -->
    	<script src="{{ asset('public/js/main.js') }}"></script>
		<script src="{{ asset('public/js/printThis.js') }}"></script>

		@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


@yield('scripts')
