@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                      Add Coupon
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                          <li class="text-danger">{{ $error }}</li>
                        @endforeach
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                              <label for="" class="form-label">Coupon Name</label>
                              <input type="text" class="form-control" placeholder="Coupon Name" name="Coupon_name">
                            </div>

                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Validity</label>
                                <input type="date" class="form-control" placeholder="coupon validity" name="validity">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Discount_Percentage</label>
                                <input type="text" class="form-control" placeholder="Discount_Percentage" name="discount_percentage">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Coupon Limit</label>
                                <input type="text" class="form-control" placeholder="limit" name="limit">
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Coupon</button>
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
