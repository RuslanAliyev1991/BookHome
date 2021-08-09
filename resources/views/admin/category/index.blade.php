@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success">Kategoriya yarat</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Kategoriyalar</h4>
                            <p class="category">Burada daxil edilen kategoriyalari gore bilersiniz</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{ $value['name'] }}</td>
                                            <td><a href="{{ route('admin.category.edit', ['id'=>$value['id']]) }}">Update</a></td>
                                            <td><a href="{{ route('admin.category.delete', ['id'=>$value['id']]) }}">Delete</a></td>
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
