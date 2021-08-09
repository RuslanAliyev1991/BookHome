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
                        <h4 class="title">Kitab yarat</h4>
                        <p class="category">Yeni kitab yaradin</p>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('admin.book.create.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="">Kitab adi</label>
                                        <input type="text" class="form-control" name="name">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="">Kitab sayi</label>
                                        <input type="number" class="form-control" name="quantity">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="">Kitab sekli</label>
                                        <input type="file" class="form-control-file" name="image" style="opacity: 1;position: inherit;">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="disabledSelect" class="form-label">Nesriyyat evi secin</label>
                                        <select name="publishing_id" id="publishing_id" class="form-control">
                                            @foreach ($publishing as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach

                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="disabledSelect" class="form-label">Yazici secin</label>
                                        <select name="author_id" id="author_id" class="form-control">
                                            @foreach ($author as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach

                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="disabledSelect" class="form-label">Kategoriya secin</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach ($category as $value)
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endforeach

                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="">Qiymet</label>
                                        <input type="number" class="form-control" name="amount">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="">Aciqlama</label>
                                        <input type="text" class="form-control" name="description">
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
