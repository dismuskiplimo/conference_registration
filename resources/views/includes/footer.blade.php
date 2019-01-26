	</div>

	<div class="container-fluid">
		<div class="row footer">
			<div class="col-xs-12">

				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<p>
								Copyright &copy; {{ date('Y') }} <a href="https://www.ciarbkenya.org">CIArb Kenya</a>. All rights Reserved

								<span class="pull-right">
									@if(Auth::check())
										<a href="{{ route('dashboard') }}">Admin Dashboard</a>
										<a href="{{ route('logout') }}">Logout</a>
									@else
										<a href="{{ route('login') }}">Staff Login</a>
									@endif
									
								</span>
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>

	<script src="{{ my_asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ my_asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ my_asset('js/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ my_asset('js/jquery-ui.min.js') }}"></script>
	<script src="{{ my_asset('js/sweetalert2.all.min.js') }}"></script>
	<script src="{{ my_asset('js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ my_asset('js/printThis.js') }}"></script>
	@if(!isset($nav))
		<script src="{{ my_asset('js/scripts.js') }}"></script>
	@endif
</body>
</html>