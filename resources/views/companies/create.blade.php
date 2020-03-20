@extends('layouts.master')

@section('content')


  <div class="container">
  	 <div class="row">
  	 	 <div class="col-md-8 order-md-1">
          <h4 class="mb-3">{{'Add Company'}}</h4>
          <form class="needs-validation" action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
          	@csrf
            <div class="mb-3">
              <label for="email">Name <span style="color:red;">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter company name">
            </div>
             
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter company email address">
            </div>

            <div class="mb-3">
              <label for="email">Website</label>
              <input type="text" class="form-control" id="website" name="website" placeholder="Enter company website">
            </div>

            <div class="mb-3">
              <label for="email">Logo(minimum 100×100)</label>
              <input type="file" id="logo" name="image" class="form-control @error('image') is-invalid @enderror">
           </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>
  	 </div>
  </div>
@endsection
