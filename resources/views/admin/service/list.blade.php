@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Services</h4>

                        <div class="pt-3">
                            <table class="table table-hover table-striped table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Icon
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Description
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
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $service->icon }}
                                            </td>
                                            <td>
                                                {{ $service->title }}
                                            </td>
                                            <td>

                                                {{ Str::limit($service->description, 51) }}
                                            </td>
                                            <td>
                                                @if ($service->status == 1)
                                                    <div class="badge badge-pill badge-success">active</div>
                                                @else
                                                    <div class="badge badge-pill badge-danger">inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Button group">
                                                    <a href="{{ route('service.edit', $service->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    @if ($service->status == 1)
                                                        <a href="{{ route('service.inactive', $service->id) }}"
                                                            class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"
                                                                aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="{{ route('service.active', $service->id) }}"
                                                            class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                aria-hidden="true"></i></a>
                                                    @endif
                                                    <a href="{{ route('service.destroy', $service->id) }}" id="delete"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
