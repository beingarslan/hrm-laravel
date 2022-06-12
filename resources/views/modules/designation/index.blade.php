@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card box-shadow-0">
            <div class="card-header">
                <h4 class="card-title">Designations
                    @can('add-master-designations')
                    <a href="{{ route('designations.create') }}" class="btn-min-width btn-primary mb-1" style="margin-left: 20px; font-size: 14px; padding: 5px;">Add New Designation </a>
                    @endcan
                </h4>
                {{-- <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>--}}
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="collapse"><i class="feather icon-minus"></i></a>
                        </li>
                        <li>
                            <a data-action="reload"><i class="feather icon-rotate-cw"></i></a>
                        </li>
                        <li>
                            <a data-action="expand"><i class="feather icon-maximize"></i></a>
                        </li>
                        <li>
                            <a data-action="close"><i class="feather icon-x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">

                <livewire:designation.designation-list>

            </div>
        </div>
    </div>
</div>

@endsection