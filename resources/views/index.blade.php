@extends('layouts.default')

@include('includes.dashboard.dashboard-css')
@include('includes.dashboard.dashboard-css')

@section('content')

<section id="outline-variants">
  <div class="row match-height">
    <div class="col-md-12 col-sm-12">
      <div class="card border-primary text-center bg-transparent">
        <div class="card-content">
          <div class="card-body">
            <h4 class="card-title m-3">Welcome {{auth()->user()->first_name}}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@include('includes.dashboard.dashboard-js')