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
                            <h4 class="title">Slider yenileme</h4>
                            <p class="category">Yenileyin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.slider.edit.post',['id'=>$data[0]['id']]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="">Slider sekli</label>
                                            <input type="file" class="form-control-file" name="image" style="opacity: 1;position: inherit;">
                                            <img src="{{ asset($data[0]['image'])}}" style="height: 150px; width: 150px;">
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

