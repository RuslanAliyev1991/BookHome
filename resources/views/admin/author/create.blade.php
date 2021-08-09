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
                            <h4 class="title">Yazici yarat</h4>
                            <p class="category">Yeni yazici yaradin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.author.create.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        {{-- name --}}

                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">yazici adi</label>
                                                <input type="text" class="form-control" name="name">
                                                <span class="material-input"></span>
                                            </div>
                                        

                                        {{-- image --}}

                                            <div class="form-group">
                                                <label class="">yazici sekli</label>
                                                <input type="file" class="form-control-file" name="image" style="opacity: 1;position: inherit;">
                                                <span class="material-input"></span>
                                            </div>
                                         

                                        {{-- description --}}

                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">aciqlama</label>
                                                <input type="text" class="form-control" name="bio">
                                                <span class="material-input"></span>
                                            </div>
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Yarat</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
