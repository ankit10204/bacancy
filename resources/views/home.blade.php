@extends('layouts.master')

@section('content')
<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Total Companies</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">Total <small class="text-muted"> {{$companies}}</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>&nbsp;</li>
          <li>&nbsp;</li>
          <li>&nbsp;</li>
          <li>&nbsp;</li>
        </ul>
        <a href="{{route('companies.index')}}" class="btn btn-lg btn-block btn-outline-primary">Companies</a>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Total Employees</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">Total <small class="text-muted"> {{$employees}}</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
           <li>&nbsp;</li>
          <li>&nbsp;</li>
          <li>&nbsp;</li>
          <li>&nbsp;</li>
        </ul>
        <a  href="{{route('employees.index')}}" class="btn btn-lg btn-block btn-primary">Employees</a>
      </div>
    </div>
  </div>
@endsection
