@extends('layouts.main')
@section('main-section')
    @push('title')
        <title>Dashboard</title>
    @endpush


    <!-- Breadcrumb -->
    <div class="d-md-flex d-block align-items-center justify-content-between page-breadcrumb mb-3">
        <div class="my-auto mb-2">
            <h2 class="mb-1">Admin Dashboard</h2>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="ti ti-smart-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        Dashboard
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
                </ol>
            </nav>

        </div>
        <div class="float-end">
          
        </div>

    </div>
    <!-- /Breadcrumb -->


    <div class="row">

        <!-- Widget Info -->
        <div class="col-xxl-12 d-flex">
            <div class="row flex-fill">
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-primary mb-2">
                                <i class="ti ti-calendar-share fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Total Statement</h6>
                            <h3 class="mb-3">{{ $statement->total }} </h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-secondary mb-2">
                                <i class="ti ti-browser fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Pending Statement</h6>
                            <h3 class="mb-3">{{ $statement->pending }} </h3>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <span class="avatar rounded-circle bg-info mb-2">
                                <i class="ti ti-users-group fs-16"></i>
                            </span>
                            <h6 class="fs-13 fw-medium text-default mb-1">Complete Statement</h6>
                            <h3 class="mb-3">{{ $statement->complete }}</h3>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-purple mb-2">
                            <i class="ti ti-moneybag fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Customers</h6>
                        <h3 class="mb-3">{{ $customers }}</h3>
                        <a href="/customers" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-danger mb-2">
                            <i class="ti ti-browser fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Vendor</h6>
                        <h3 class="mb-3">{{ $vendor }}</h3>
                        <a href="/vendor" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-success mb-2">
                            <i class="ti ti-users-group fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Office</h6>
                        <h3 class="mb-3">{{ $office }} </h3>
                        <a href="/office" class="link-default">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-body">
                        <span class="avatar rounded-circle bg-dark mb-2">
                            <i class="ti ti-user-star fs-16"></i>
                        </span>
                        <h6 class="fs-13 fw-medium text-default mb-1">Project</h6>
                        <h3 class="mb-3">{{ $project }} </h3>
                        <a href="/project" class="link-default">View All</a>
                    </div>
                </div>
            </div>
        </div>


    </div>





  

  
@endsection
