@if($message = Session::get('success'))
	 <div class="alert alert-success" role="alert">
	 	<strong><i class="fa fa-thumbs-o-up"></i> SUCCESS :</strong> {{ $message }}
	 </div>
@endif
@if($message = Session::get('errors_message'))
	 <div class="alert alert-warning" role="alert">
	 	<strong><i class="fa fa-thumbs-o-up"></i> FAILURE :</strong> {{ $message }}
	 </div>
@endif

@if(count($errors) > 0 )
	<div class="alert alert-danger" role="alert">
	 	<strong><i class="fa fa-thumbs-o-down"></i> ERRORS :</strong> 
	 	<ul>
	 	@foreach($errors->all() as $error)
	 		<li>{{$error}}</li>
	 	@endforeach
	 	</ul>
	 </div>
@endif
