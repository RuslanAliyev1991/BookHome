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
                            <h4 class="title">Slider yarat</h4>
                            <p class="category">Yeni slider yaradin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.slider.create.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        {{-- image --}}

                                            <div class="form-group">
                                                <label class="">slider sekli</label>
                                                <input type="file" class="form-control-file" name="image" style="opacity: 1;position: inherit;">
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
