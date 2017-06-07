@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
	<strong>Sukses</strong> {{ Session::get('success')}} <!-- harus success(sama dgn yang di kontroller) -->
	</div>
@endif

@if (count($errors) > 0)
	
	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>

@endif