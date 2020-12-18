@extends('NaveBar.all')

    @section('content') 
    <div class="card mb-3 mt-5">
        <img class="card-img-top" src="{{asset($idea->Image)}}" height="300vh" alt="Card image cap">
        <div class="card-body">

                <h4 class="card-title">{{$idea->name}}
                 @if(Auth::check() && (Auth::user()->id == $idea->user_id || Auth::user()->Position == 0))
                <a style="position: relative;" href="{{route('Edite_think' , $idea->id)}}">Edite</a>
                <a style="position: relative; color:FF5733;"
                href="{{route('Delete_think' , $idea->id)}}">
                Delete</a>
                @else
                <p style="display:inline; border-style: dotted; margin-left:5vw;">Owner {{$usrmail->email}} </p>
                @endif
                </h4>
            
            <p class="card-text">{{$idea->Discription}}</p>
            <p class="card-text">price: {{$idea->price}}</p>
            <p class="card-text">Rate: {{$idea->Rate}}</p>
            <p class="card-text"><small class="text-muted">Last updated {{$idea->updated_at}}</small></p>
            <p>Owner email: {{$usrmail->email}} </p> <p>Owner Name: {{$usrmail->name}} </p>
        </div>
    </div>
	@endsection