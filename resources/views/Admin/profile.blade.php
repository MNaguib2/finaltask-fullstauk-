@extends('NaveBar.all')

    @section('content') 
        <section style="display: flex; flex-direction: row;">
            <img src="../Image/profile.png" style="height: 30vh;" aria-expanded="false"></img>
            <div class="ml-1" style="max-height: 75vh; overflow-y: auto; width: 93%;">
                <form class="ml-1" style="width: 99%;">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Name *</label>
                        <input type="text" class="form-control" id="name" placeholder="what's Your Name?" value="{{$profile->name}}" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password *</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password" value="{{$profile->password}}" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address *</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{$profile->Address}}" required>
                    </div>
                      <div class="form-group">
                        <label for="inputCity">Email *</label>
                        <input type="email" class="form-control" id="inputEmail" value="{{$profile->email}}" required>
                      </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck">
                          I agree to change in one item data
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edite</button>
                  </form>
            </div>
        </section>
		@endsection