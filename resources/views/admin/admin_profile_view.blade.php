@php
    $filename = Auth::user()->profile_image;
@endphp

@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <img class="rounded m-2" width="200" src="{{ $filename ? asset('uploads/admin_images/'.$filename) : asset('backend/assets/images/default.png') }}" alt="Profile Image">
                        <div class="card-body">
                            Name: <h4 class="card-title">{{ $adminData->name }}</h4>
                            <hr>
                            Username: <h5 class="card-title">{{ $adminData->username }}</h5>
                            <hr>
                            Email: <h5 class="card-title">{{ $adminData->email }}</h5>
                            <hr>
                            <a class="btn btn-primary btn-rounded waves-effect waves-light" href="{{ route('admin.edit') }}">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
