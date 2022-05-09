@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 m-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">About {{ @$editData ? 'Edit' : 'Create' }}
                        </h4>

                        <form class="forms-sample" enctype="multipart/form-data" method="post"
                            action="{{ @$editData ? route('about.update', $editData->id) : route('about.store') }}">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="@error('title') is-invalid @enderror form-control"
                                    id="title" value="{{ @$editData ? $editData->title : old('title') }}"
                                    placeholder="Title">
                                @error('title')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input name="date" id="date" class="@error('date') is-invalid @enderror form-control"
                                    placeholder="Date" value="{{ @$editData ? $editData->date : old('date') }}">
                                @error('date')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control" cols="30"
                                    rows="5" placeholder="Description">
                                            {{ @$editData ? $editData->description : old('description') }}
                                        </textarea>
                                @error('description')
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
                                <img class="img-fluid" src="{{ @$editData ? asset($editData->image) : asset('upload/no_image_3.jpg') }}" id="showImage"
                                    style="width: 250px" alt="">
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
