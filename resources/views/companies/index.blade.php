@extends('layouts.master')

@section('content')


  <div class="container">

    @if (session('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
      </div>
    @elseif(session('error'))
       <div class="alert alert-warning" role="alert">
        {{ session('error') }}
       </div>
     @endif
     
     <div class="row" style="margin-bottom: 5px;">
       <a href="{{ route('companies.create')}}" class="btn btn-success">Add Company</a>
     </div>
     <div class="row">
       <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Logo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($companies as $key => $company)
          <tr>
            <td>{{($companies->currentpage()-1) * $companies->perpage() + $key + 1  }}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->email ? $company->email:'-'}}</td>
            <td>{{ $company->website ?$company->website: '-' }}</td>
            <td>
              @if($company->logo)
                <img src="{{asset('images/'.$company->logo)}}" style="width: 50px;">
              @else
                empty
              @endif
            </td>
            <td>
              <a href="{{route('companies.edit',['id'=>$company->id])}}" class="btn btn-warning">Update</i></a>&nbsp;
              <a href="" class="btn btn-danger" 
               onclick="event.preventDefault(); var res = confirm('are you sure that you want to delete this company'); if(res){document.getElementById('del-form').submit();} 
               ">Delete</i></a>&nbsp;
               
               <form id="del-form" action="{{route('companies.destroy',['id'=>$company->id])}}" method="POST" style="display: none;">
                  @method('DELETE')
                  @csrf
               </form>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
       {{$companies->links()}}    
  	 	</div>
  </div>
@endsection

