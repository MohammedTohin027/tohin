@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 m-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Section {{ @$editData ? 'Edit' : 'Create' }}
                        </h4>

                        <form class="forms-sample" enctype="multipart/form-data" method="post"
                            action="{{ @$editData ? route('portfolio.update', $editData->id) : route('portfolio.store') }}">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title"
                                            class="@error('title') is-invalid @enderror form-control" id="title"
                                            value="{{ @$editData ? $editData->title : old('title') }}"
                                            placeholder="Title">
                                        @error('title')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="client">Client</label>
                                        <input name="client" id="client"
                                            class="@error('client') is-invalid @enderror form-control" placeholder="Client"
                                            value="{{ @$editData ? $editData->client : old('client') }}">
                                        @error('client')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input name="category" id="category"
                                            class="@error('category') is-invalid @enderror form-control"
                                            placeholder="Category"
                                            value="{{ @$editData ? $editData->category : old('category') }}">
                                        @error('category')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="sub_title">Sub Title</label>
                                        <input type="text" name="sub_title"
                                            class="@error('sub_title') is-invalid @enderror form-control" id="sub_title"
                                            value="{{ @$editData ? $editData->sub_title : old('sub_title') }}"
                                            placeholder="Sub Title">
                                        @error('sub_title')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="url">Url</label>
                                        <input name="url" id="url" class="@error('url') is-invalid @enderror form-control"
                                            placeholder="url"
                                            value="{{ @$editData ? $editData->url : old('url') }}">
                                        @error('url')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control" cols="30"
                                            rows="8" placeholder="Description">
                                            {{ @$editData ? $editData->description : old('description') }}
                                        </textarea>
                                        @error('description')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Small Image</label>
                                        <input type="file" name="small_image" id="small_image" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Small Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                        @error('small_image')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="width: 200px; height:200px;">
                                        <img class="img-fluid"
                                            src="{{ @$editData ? asset($editData->small_image) : asset('upload/no_image_3.jpg') }}"
                                            id="showSmallImage"
                                            style="max-width: 200px; max-height:200px; display:block; border: 1px solid #c4c0c0;"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Big Image</label>
                                        <input type="file" name="big_image" id="big_image" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled
                                                placeholder="Upload Big Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                        @error('big_image')
                                            <div class="text-danger"><small
                                                    style="font-weight: bold">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="width: 200px; height:200px;">
                                        <img class="img-fluid"
                                            src="{{ @$editData ? asset($editData->big_image) : asset('upload/no_image_3.jpg') }}"
                                            id="showBigImage"
                                            style="max-width: 200px; max-height:200px; display:block; border: 1px solid #c4c0c0;"
                                            alt="">
                                    </div>
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
