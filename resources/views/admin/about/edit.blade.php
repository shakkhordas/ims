@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About Page Setup</h4>
                            <form method="POST" action="{{ route('about.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $data->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $data->title }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Info</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="info" type="text"
                                            value="{{ $data->info }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea required="" class="form-control" name="short_description" id="example-text-input" rows="5">
                                            {{ $data->short_description }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="long_description">
                                            {{ $data->long_description }}
                                        </textarea>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="aboutImage" class="col-sm-2 col-form-label">About Page Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="aboutImage">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="imagePreview" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded me-2" width="200" id="imagePreview"
                                            alt="Uploaded Image" src="{{ $data->image ? asset($data->image) : asset('frontend/assets/img/images/about_img.png') }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" value="Update About"
                                    class="btn btn-primary waves-effect waves-light">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#aboutImage').change(function(event) {
                if (event.target.files && event.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                        // $('#imagePreview').attr('hidden', false);
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
            });
        });
    </script>
@endsection
