@extends('NaveBar.all')

    @section('content') 
	@if(Route::current()->getName() == 'Add_thing')
	<form class="needs-validation m-2" action="{{route('Add_Data' , $iduser)}}" method="post" enctype="multipart/form-data" novalidate>
	@else
	<form class="needs-validation m-2" action="{{route('update_think' , $iduser->id)}}" method="post" enctype="multipart/form-data" novalidate>
	@endif
	@csrf
	@if(Route::current()->getName() == 'Add_thing')
		<div class="form-row">
		  <div class="col-md-6 mb-3">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="Title" id="title" value="" required>
			<div class="valid-feedback">
			  Looks good!
			</div>
		  </div>
		  <div class="col-md-6 mb-3">
			<label for="price">Price</label>
			<input type="number" min="10" name="price" class="form-control" id="price" required>
			<div class="valid-feedback">
			  Looks good!
			</div>
		  </div>
		</div>
		<div class="form-row">
		  <div class="col-md-12 mb-12">
			<label for="discrpition">Discrpition</label>
			<textarea type="text" class="form-control" name="Discrpition" id="discrpition" required></textarea>
			<div class="invalid-feedback">
			  Please provide a valid Discrpition.
			</div>
		  </div>
		</div>
		<div class="form-row mt-2">
		  <div class="col-md-4">
			<label for="rate">Rate</label>
			<select class="custom-select" name="rate" id="rate" required>
			  <option selected disabled value="">Choose Rate</option>
			  <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			</select>
		  </div>
		  <div class="col-md-4">
			<label for="categoryname">Category think</label>
			<select class="custom-select" name="categoryname" id="categoryname" required>
			  <option selected disabled value="">Choose Category</option>
			  @foreach($Categories as $category)
			  <option value="{{$category->id}}">{{$category->name}}</option>
			  @endforeach
			</select>
		  </div>
			<div class="mt-0 invalid-feedback">
			  Please select a valid state.
			</div>
			<div class="col-md-4">
			<label for="Image">Category think</label>
			<input type="file" class="form-control" id="Image" name="image" accept="image/png, image/jpeg" require> 
			</div>
		  </div>
		  <div class="form-check ml-4 mt-2">
			<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
			<label class="form-check-label" for="invalidCheck">
			  Agree to terms and conditions
			</label>
			<div class="invalid-feedback">
			  You must agree before submitting.
			</div>
		  </div>
		</div>
		<button class="btn btn-primary" style="text-transform: capitalize;" type="submit">Add Information</button>
		<!--///////////////////////////////////////////////////////////////////////////-->
		
		@elseif(Auth::user()->id == $iduser->user_id ||Auth::user()->Position == 0 )
		<div class="form-row">
		  <div class="col-md-6 mb-3">
			<label for="title">Title</label>
			<input type="text" class="form-control" name="Title" id="title" value="{{$iduser->name}}" required>
			<div class="valid-feedback">
			  Looks good!
			</div>
		  </div>
		  <div class="col-md-6 mb-3">
			<label for="price">Price</label>
			<input type="number" min="10" name="price" class="form-control" value="{{$iduser->price}}" id="price" required>
			<div class="valid-feedback">
			  Looks good!
			</div>
		  </div>
		</div>
		<div class="form-row">
		  <div class="col-md-12 mb-12">
			<label for="discrpition">Discrpition</label>
			<textarea type="text" class="form-control" name="Discrpition" id="discrpition" required>{{$iduser->Discription}}</textarea>
			<div class="invalid-feedback">
			  Please provide a valid Discrpition.
			</div>
		  </div>
		</div>
		<div class="form-row mt-2">
		  <div class="col-md-4">
			<label for="rate">Rate</label>
			@if(Auth::user()->Position !== 0)
			<p>Only Admin Can Change Rate (Your rate is {{$iduser->Rate}})</p>
			@elseif(Auth::user()->Position == 0)
			<select class="custom-select" name="rate" id="rate" required>
			@switch($iduser->Rate)
								@case(1)
								<option disabled value="">Choose Rate</option>
									<option selected value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									@break
								@case(2)
								<option selected disabled value="">Choose Rate</option>
									<option value="1">1</option>
									<option selected value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									@break
								@case(3)
								<option disabled value="">Choose Rate</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option selected value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									@break
								@case(4)
								<option selected disabled value="">Choose Rate</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option selected value="4">4</option>
									<option value="5">5</option>
									@break
								@case(5)
								<option selected disabled value="">Choose Rate</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option selected value="5">5</option>
									@break
							@endswitch
			</select>
			@endif
		  </div>
		  <div class="col-md-4">
			<label for="categoryname">Category think</label>
			<select class="custom-select" name="categoryname" id="categoryname" required>
			  <option selected disabled value="">Choose Category</option>
			  @foreach($Categories as $category)
			  <option @if($iduser->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
			  @endforeach
			</select>
		  </div>
			<div class="mt-0 invalid-feedback">
			  Please select a valid state.
			</div>
			<div class="col-md-4">
			<label for="Image">Category think</label>
			<input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg" require> 
			</div>
		  </div>
		  <div class="form-check ml-3 mt-2">
			<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
			<label class="form-check-label" for="invalidCheck">
			  Agree to terms and conditions
			</label>
			<div class="invalid-feedback">
			  You must agree before submitting.
			</div>
		  </div>
		</div>
		<button class="btn btn-primary" style="text-transform: capitalize;" type="submit">Edite Information</button>
		<img class="img-fluid w-90" src="{{asset($iduser->Image)}}">
		@else
		<h1>No Page</h1>
		@endif  
	</form>
	  
	  <script>
	  // Example starter JavaScript for disabling form submissions if there are invalid fields
	  (function() {
		'use strict';
		window.addEventListener('load', function() {
		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.getElementsByClassName('needs-validation');
		  // Loop over them and prevent submission
		  var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
			  if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			  }
			  form.classList.add('was-validated');
			}, false);
		  });
		}, false);
	  })();
	  </script>
	
   @endsection