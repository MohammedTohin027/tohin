@extends('layouts.admin_layout')

@section('admin-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Portfolio Item</h4>

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
                                            Sub Title
                                        </th>
                                        <th>
                                            Small Image
                                        </th>
                                        <th>
                                            Big Image
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Client
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Url
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
                                    @foreach ($portfolios as $key => $item)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $item->title }}
                                            </td>
                                            <td>
                                                {{ $item->sub_title }}
                                            </td>
                                            <td>
                                                <img src="{{ asset($item->small_image) }}" alt="" style="width: 80px; height:70">
                                            </td>
                                            <td>
                                                <img src="{{ asset($item->big_image) }}" alt="" style="width: 80px; height:70">
                                            </td>
                                            <td>
                                                {{ Str::limit($item->description, 51) }}
                                            </td>
                                            <td>
                                                {{ $item->client }}
                                            </td>
                                            <td>
                                                {{ $item->category }}
                                            </td>
                                            <td>
                                                {{ $item->url }}
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
                                                    <a href="{{ route('portfolio.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></a>
                                                    @if ($item->status == 1)
                                                        <a href="{{ route('portfolio.inactive', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                                class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="{{ route('portfolio.active', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                aria-hidden="true"></i></a>
                                                    @endif
                                                    <a href="{{ route('portfolio.destroy', $item->id) }}" id="delete" class="btn btn-danger btn-sm"><i
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
