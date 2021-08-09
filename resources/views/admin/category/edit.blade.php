@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @if(session()->has('status'))
                        <div class="alert alert-primary">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">kategoriya yenileme</h4>
                            <p class="category">Yenileyin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.category.edit.post',['id'=>$data[0]['id']]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">kategoriya adi</label>
                                            <input type="text" class="form-control" name="name" value="{{ $data[0]['name'] }}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Yenile</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

