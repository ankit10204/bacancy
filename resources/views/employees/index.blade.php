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
       <a href="{{ route('employees.create')}}" class="btn btn-success">Add Employee</a>
     </div>
     <div class="row">
       <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Company</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($employees as $key => $employee)
          <tr>
            <td>{{($employees->currentpage()-1) * $employees->perpage() + $key + 1  }}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->company? $employee->company->name:'-'}}</td>
            <td>{{$employee->email ? $employee->email:'-'}}</td>
            <td>{{$employee->phone ? $employee->phone:'-'}}</td>
            <td>
              <a href="{{route('employees.edit',['id'=>$employee->id])}}" class="btn btn-warning">Update</i></a>&nbsp;
              <a href="" class="btn btn-danger" 
               onclick="event.preventDefault(); var res = confirm('are you sure that you want to delete this employee'); if(res){document.getElementById('del-form').submit();} 
               ">Delete</i></a>&nbsp;
               
               <form id="del-form" action="{{route('employees.destroy',['id'=>$employee->id])}}" method="POST" style="display: none;">
                  @method('DELETE')
                  @csrf
               </form>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
       {{$employees->links()}}    
  	 	</div>
  </div>
@endsection

