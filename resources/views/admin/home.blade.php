@extends('layouts.my-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase fw-bold text-primary mb-1">المراكز الثقافية</div>
                        <div class="h5 mb-0 font-weight-bold">25 مركز</div>
                    </div>
                    <i class="bi bi-building fs-2 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase fw-bold text-success mb-1">الزوار</div>
                        <div class="h5 mb-0 font-weight-bold">1,200 زائر</div>
                    </div>
                    <i class="bi bi-people fs-2 text-success"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection