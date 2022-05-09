@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-6 m-auto grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;">Section {{ @$editData ? 'Edit' : 'Create' }}</h4>

                        <form class="forms-sample" method="post" action="{{ @$editData ? route('service.update', $editData->id) : route('service.store') }}">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" name="icon" class="@error('icon') is-invalid @enderror form-control"
                                    id="icon" value="{{ @$editData ? $editData->icon : old('icon') }}" placeholder="Icon">
                                @error('icon')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="@error('title') is-invalid @enderror form-control"
                                    id="title" value="{{ @$editData ? $editData->title : old('title') }}" placeholder="Title">
                                @error('title')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control" cols="30" rows="5" placeholder="Description">
                                    {{ @$editData ? $editData->description : old('description') }}
                                </textarea>
                                @error('description')
                                    <div class="text-danger"><small style="font-weight: bold">{{ $message }}</small>
                                    </div>
                                @enderror
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
