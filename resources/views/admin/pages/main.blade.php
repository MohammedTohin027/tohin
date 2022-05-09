@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 m-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Update Information</h4>

                        <form class="forms-sample" method="post" action="{{ route('main.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="@error('title') is-invalid @enderror form-control"
                                    id="title" value="{{ @old(title, $data->title) }}" placeholder="Title">
                                @error('title')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" name="sub_title"
                                    class="@error('sub_title') is-invalid @enderror form-control" id="sub_title"
                                    value="{{ @old(sub_title, $data->sub_title) }}" placeholder="Sub Title">
                                @error('sub_title')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Background Image</label>
                                <input type="file" name="image" id="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <img class="img-fluid" src="{{ asset($data->image) }}" id="showImage" style="width: 250px" alt="">
                            </div>
                            <div class="form-group">
                                <label>Upload Resume</label>
                                <input type="file" name="resume" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            {{-- <button type="reset" class="btn btn-light">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
