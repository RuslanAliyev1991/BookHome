@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-success">Slider yarat</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Sliderler</h4>
                            <p class="category">Burada slider gore bilersiniz</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Image</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>
                                                <img class="getImage" src="{{ asset($value['image']) }}">
                                            </td>
                                            <td><a href="{{ route('admin.slider.edit', ['id'=>$value['id']]) }}">Update</a></td>
                                            <td><a href="{{ route('admin.slider.delete', ['id'=>$value['id']]) }}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
