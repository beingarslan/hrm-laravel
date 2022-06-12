@extends('layouts.default')

@include('includes.user.approvals.index-css')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Your Requests</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <p>You cannot reply to closed requests.</p>
                    <div class="list-group">
                        @forelse($approvals as $approval)
                        <a href="/approvals/view/{{$approval->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="text-bold-600">
                                    <span class="badge bg-primary">{{$approval->user->first_name.' '.$approval->user->last_name}}</span>
                                    {{$approval->title}}
                                </h5>
                                <small>{{$approval->updated_at->diffForHumans()}}</small>
                            </div>
                            <span class="badge bg-primary">{{$approval->status->name}}</span>
                            <span class="badge bg-primary">{{$approval->type->name}}</span>
                            @if($approval->leave)
                            <span class="badge bg-primary">{{$approval->leave?->start_date}} - {{$approval->leave?->end_date}}</span>
                            @endif

                        </a>
                        @empty
                        <h1>No records found.</h1>
                        @endforelse
                        <!-- pagination -->
                        <div class="d-flex justify-content-center mt-2">
                            {{$approvals->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('includes.user.approvals.index-js')