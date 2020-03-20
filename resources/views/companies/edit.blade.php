@extends('layouts.master')

@section('content')


  <div class="container">
  	 <div class="row">
  	 	 <div class="col-md-8 order-md-1">
          <h4 class="mb-3">{{'Edit Company'}}</h4>
          <form class="needs-validation" action="{{ route('companies.update',['id'=>$companies->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
          	@csrf
            <div class="mb-3">
              <label for="email">Name <span style="color:red;">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter company name" value={{$companies->name?$companies->name:''}}>
            </div>
             
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email address" value={{$companies->email?$companies->email:''}}>
            </div>

            <div class="mb-3">
              <label for="email">Website</label>
              <input type="text" class="form-control" id="website" name="website" placeholder="Enter company website" value={{$companies->website?$companies->website:''}}>
            </div>

            <div class="mb-3">
              <label for="email">Logo(minimum 100×100)</label>
              <input type="file" id="logo" name="image">
           </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>
  	 </div>
  </div>
@endsection
