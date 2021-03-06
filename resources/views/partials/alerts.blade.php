@if (session('success'))
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ session('success') }}
	</div>
@endif

@if (session('error'))
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ session('error') }}
	</div>
@endif

@if ($errors->any())
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ $error }}
		</div>
	@endforeach
@endif

@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
