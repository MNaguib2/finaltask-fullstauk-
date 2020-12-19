@extends('NaveBar.all')

    @section('content') 

	<section class="row" style="max-width: 98vw;">
		<div class="nav flex-column nav-pills mt-5 col-md-2 col-lg-2" id="v-pills-tab" role="tablist"
			aria-orientation="vertical">
			<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
				aria-controls="v-pills-home" style="text-align: center;" aria-selected="true">Home</a>
			<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
				aria-controls="v-pills-profile" style="text-align: center;" aria-selected="false">Members</a>
			<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
				aria-controls="v-pills-messages" style="text-align: center;" aria-selected="false">Category Think</a>
			<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
				aria-controls="v-pills-settings" style="text-align: center;" aria-selected="false">Thinks</a>
		</div>
		<div class="tab-content mt-5 col-md-10" id="v-pills-tabContent">
			<div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				<div class="row">
					<div class="flip-card ml-5">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="../Image/Setting Profile Admin/Member.png" alt="Avatar"
									style="width: 300px;height: 300px;">
							</div>
							<div class="flip-card-back">
								<h1>Hello Admin</h1>
								<p>Number Of Member in Your website</p>
								<p>Is {{count($Member)}}</p>
							</div>
						</div>
					</div>
					<div class="flip-card ml-5">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="../Image/Setting Profile Admin/category.png" alt="Category"
									style="width: 300px;height: 300px;">
							</div>
							<div class="flip-card-back">
								<h1>Hello Admin</h1>
								<p>Number Of Category Think</p>
								<p>Is {{count($Categories)}}</p>
							</div>
						</div>
					</div>
					<div class="flip-card ml-5">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="../Image/Setting Profile Admin/thinks.jpg" alt="Category"
									style="width: 300px;height: 300px;">
							</div>
							<div class="flip-card-back">
								<h1>Hello Admin</h1>
								<p>Number Of Think</p>
								<p>Is {{count($Ideas)}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" style="max-height: 75vh; overflow-y: auto;" id="v-pills-profile" role="tabpanel"
				aria-labelledby="v-pills-profile-tab">
				<table class="table table-striped text-center">
					<thead class="thead-dark">
					<tr>
					   <td>#ID</td>
					   <td>Name</td>
					   <td>Address</td>
					   <td>Email</td>
					   <td>Control</td>
					</tr>
				</thead>
				@foreach($Member as $member)
				<tr>
					   <th>{{$loop->iteration}}</th>
					   <td>{{$member->	name}}</td>
					   <td>{{$member-> Address}}</td>
					   <td>{{$member->email}}</td>
					   <td>
						@if ($member->Position == 1)
						<button onclick="window.location='{{route('Hold_Member',$member->id)}}'" class="ButtonMember btn btn-warning">Hold</button>
						<button onclick="window.location='{{route('Delete_Member',$member->id)}}'" class="ButtonMember btn btn-danger">Delete</button>
						@elseif ($member->Position == 2)
						<button onclick="window.location='{{route('Resume_Member',$member->id)}}'" class="ButtonMember btn btn-warning">Resume</button>
						<button onclick="window.location='{{route('Delete_Member',$member->id)}}'" class="ButtonMember btn btn-danger">Delete</button>
						@elseif ($member->Position == 0)
						<h3>this Acount is Admin</h3>
						@endif
						</td>
					</div>
					</tr>
					@endforeach
					</tbody>
				 </table>
			</div>
			<div class="tab-pane fade" id="v-pills-messages" style="max-height: 65vh; overflow-y: auto;" role="tabpanel" aria-labelledby="v-pills-messages-tab">
				<table id="Table_id" class="table table-striped text-center">
					<thead class="thead-dark">
					<tr>
					   <td>#ID</td>
					   <td>Category Name</td>
					   <td>Discrpition</td>
					   <td>Registered-date</td>
					   <td>Control</td>
					</tr>
				</thead>
				<tbody>
				@foreach($Categories as $member)
					<tr>						
					   <th>{{$loop->iteration}}</th>
					   <td>{{$member->name}}</td>
					   <td>{{$member->Discription}}</td>
					   <td>{{$member->created_at}}</td>
					   @csrf  
					   <td>    
						   <a href="{{route('Delete_Category',$member->id)}}" class="d-inline-block control-button delete mb-2 m-lg-0"><i class="fas fa-trash-alt"></i> delete</a>
						  <a href="#" id="row-{{$loop->iteration}}" onclick="edite({id},{{$member->id}})" role="button" class="d-inline-block control-button edit "><i class="fa fa-edit"></i> edit</a>
					   </td>
					</tr>
					@endforeach					
					</tbody>
				 </table>
				 <i class="fas fa-plus fa-3x center"
				 onclick="Addthing()"
				  role="button" id="Addcategory" style="margin-left: 35vw;"></i>
			</div>
			<div class="tab-pane fade" id="v-pills-settings" style="max-height: 75vh; overflow-y: auto;" role="tabpanel" aria-labelledby="v-pills-settings-tab">
				@foreach($Categories as $catogry)
				<div class="namecatthing">
					<h4 class="textcategory">{{$catogry->name}}</h4>
					<hr>
					<div class="row pb-3">
					@foreach($Ideas  as $idea)	
					@if($idea->category_id == $catogry->id)
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card ">
								<a href="{{route('view' , $idea->id)}}"><img class="card-img-top"
										src="{{asset($idea->Image)}}" alt=""></a>
								<div class="card-body">
									<h4 class="card-title">
										<a href="{{route('view' , $idea->id)}}">{{$idea->name}}</a>
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
					<hr>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endsection
	<section>
	<div id="id02" class="modal signupfont">
			<form id="formdesign" class="modal-content animate" action="{{route('AddCategory')}}" method="post">
			@csrf
				<div class="containerLog">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id02').style.display='none'" class="close"
							title="Close Modal">&times;</span>
						<img src="{{asset('Image/add category.jpg')}}" alt="Avatar"
							style="height: 30vh;width: 18vw; border-radius: 100%; border: 5px solid #9C9492;"
							class="avatar">
					</div>
					<h1 id="add/edite" style="text-align: center;">Add New Category</h1>
					<p>Please fill in this form to create an Category.</p>
					<hr>
					<label for="uname"><b>Name Category</b></label>
					<input id="name" type="text" placeholder="Name Category" name="Name" required>

					<label for="uname"><b>Discription</b></label>
					<input id="Edit" type="text" placeholder="Discription" name="Discription" required>

					<button id="editebutton" type="submit" class="registerbtn">Add New Category</button>
				</div>

			</section>