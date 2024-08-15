@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Home Slide Setup</h4>
                            <form method="POST" action="{{ route('home_slide.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeSlideData->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $homeSlideData->title }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="description" type="text"
                                            value="{{ $homeSlideData->description }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="video_url" type="text"
                                            value="{{ $homeSlideData->video_url }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="sliderImage" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="sliderImage">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="imagePreview" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="rounded me-2" width="200" id="imagePreview"
                                            alt="Uploaded Image" src="{{ $homeSlideData->image ? asset($homeSlideData->image) : asset('frontend/assets/img/images/about_img.png') }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" value="Update Slide"
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
            $('#sliderImage').change(function(event) {
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
