@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All About Item</h4>

                        <div class="pt-3">
                            <table class="table table-hover table-striped table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Big Image
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Image
                                        </th>                                                                              
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abouts as $key => $item)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $item->title }}
                                            </td>                                            
                                            <td>
                                                {{ $item->date }}
                                            </td>
                                            <td>
                                                {{ Str::limit($item->description, 51) }}
                                            </td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="" style="width: 80px; height:70">
                                            </td>                                            
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge badge-pill badge-success">active</div>
                                                @else
                                                    <div class="badge badge-pill badge-danger">inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Button group">
                                                    <a href="{{ route('about.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('about.inactive', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                                class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="{{ route('about.active', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                aria-hidden="true"></i></a>
                                                    @endif
                                                    <a href="{{ route('about.destroy', $item->id) }}" id="delete" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
