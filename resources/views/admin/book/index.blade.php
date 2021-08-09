@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.book.create') }}" class="btn btn-success">Kitab yarat</a>
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Kitablar</h4>
                            <p class="category">Burada daxil edilen kitablari gore bilersiniz</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Say</th>
                                        <th>Sekil</th>
                                        <th>Yazar</th>
                                        <th>Nesriyyat evi</th>
                                        <th>Kategoriya</th>
                                        <th>Qiymeti</th>
                                        <th>Aciqlama</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <td>{{ $value['name'] }}</td>
                                            <td>{{ $value['quantity'] }}</td>
                                            <td>
                                                <img class="getImage" src="{{ asset($value['image']) }}">
                                            </td>
                                            <td>{{ $value->author->name ?? 'null' }}</td>
                                            <td>{{ $value->publishing->name ?? 'null' }}</td>
                                            <td>{{ $value->category->name ?? 'null' }}</td>
                                            <td>{{ $value['amount'] }}</td>
                                            <td>{{ $value['description'] }}</td>
                                            <td><a href="{{ route('admin.book.edit', ['id'=>$value['id']]) }}">Update</a></td>
                                            <td><a href="{{ route('admin.book.delete', ['id'=>$value['id']]) }}">Delete</a></td>
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
