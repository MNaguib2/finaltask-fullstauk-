@extends('NaveBar.all')

    @section('content') 
	<!--
			<div class="top-container mt-0">
				<image class="logo" src="Image/logo2.png"></image>
			  </div>
				-->	
	<section>
</section>
		<div id="carouselExampleControls" class="carousel slide mt-3 pt-2" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="Image/Catsoul/1.png" height="230" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="Image/Catsoul/2.png" height="230" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="Image/Catsoul/3.png" height="230" class="d-block w-100" alt="...">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</a>
		</div>
	</section>


	<section class="m-3">
		<!-- nav pills with content -->
		<ul class="nav nav-pills nav-justified mt-1" style="background-color: #e3f2fd;">
			<li class="nav-item"><a href="#C1" class="nav-link active" data-toggle="tab">افكار ويب ديزاين</a></li>
			<li class="nav-item"><a href="#C2" class="nav-link" data-toggle="tab">افكار موبيل ابليكشن</a></li>
			<li class="nav-item"><a href="#C3" class="nav-link" data-toggle="tab">افكار برامج حسابيه</a></li>
			<li class="nav-item"><a href="#C4" class="nav-link" data-toggle="tab">افكار مشروعات</a></li>
			<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" href="#">افكار متنوعه</a>
						<div class="dropdown-menu" style="max-height : 25vh;overflow-y : auto">
							@foreach($Categoriesdropdown as $category)
							<a class="dropdown-item" href="#C{{$category->id}}" role="button" data-toggle="tab">{{$category->name}}</a>
							@endforeach
						</div>					
			</li>
		</ul>

		<div class="tab-content pt-2">
			@foreach($Categories as $category)
			<div class="tab-pane @if($category->id == 1)active @endif" id="C{{$category->id}}">
				<div class="row">
				@foreach($Ideas  as $idea)	
				@if($idea->category_id == $category->id)			
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card ">
							<a href="./Detials Page/view.html"><img class="card-img-top"
									src="{{asset($idea->Image)}}" alt=""></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="./Detials Page/view.html">{{$idea->name}}</a>
								</h4>
								<h5>{{$idea->price}}$</h5>
								<p class="card-text description" id="discription-{{$idea->id}}" style="display: inline;">{{$idea->Discription}}</p>
								<a class="stretched-link text-danger"
									style="position: relative;display: inline;cursor : pointer" id="discription-{{$idea->id}}"
									onclick="toggleContent({id})">Read More</a>
							</div>
							<div class="card-footer">
								<small class="text-muted">
								@switch($idea->Rate)
								@case(1)
									&#9733;
									@break
								@case(2)
									&#9733; &#9733;
									@break
								@case(3)
									&#9733; &#9733;  &#9733;
									@break
								@case(4)
									&#9733; &#9733;  &#9733;  &#9733;
									@break
								@case(5)
									&#9733; &#9733;  &#9733;  &#9733;  &#9733;
									@break
							@endswitch
								</small>
							</div>
						</div>
					</div>
					@endif
					@endforeach				
				</div>
			</div>
			@endforeach
		</div>
	</section>
	@endsection