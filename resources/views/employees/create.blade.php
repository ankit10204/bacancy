@extends('layouts.master')

@section('content')


  <div class="container">
  	 <div class="row">
  	 	 <div class="col-md-8 order-md-1">
          <h4 class="mb-3">{{'Add Employee'}}</h4>
          <form class="needs-validation" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
          	@csrf
            <div class="mb-3">
              <label for="email">First name <span style="color:red;">*</span></label>
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter first name">
            </div>

            <div class="mb-3">
              <label for="email">Last name <span style="color:red;">*</span></label>
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter last name">
            </div>
            
            <div class="mb-3">
              <label for="email">Company<span style="color:red;">*</span></label>
              <select class="form-control @error('company_id') is-invalid @enderror" name="company_id">
                <option value="">--Select company--</option>
                @foreach($companies as $key=>$company)
                <option value="{{$company}}">{{$key}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
            </div>

            <div class="mb-3">
              <label for="email">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter mobile no." maxlength="10">
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>
  	 </div>
  </div>
@endsection
