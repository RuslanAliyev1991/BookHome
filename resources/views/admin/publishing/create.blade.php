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
                            <h4 class="title">Nesriyyat evi yarat</h4>
                            <p class="category">Yeni nesriyyat evi yaradin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.publishing.create.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Nesriyyat evi adi</label>
                                            <input type="text" class="form-control" name="name">
                                        <span class="material-input"></span></div>
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
