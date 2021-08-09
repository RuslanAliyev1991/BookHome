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
                            <h4 class="title">Kitab yenileme</h4>
                            <p class="category">Yenileyin</p>
                        </div>
                        <div class="card-content">
                            <form action="{{ route('admin.book.edit.post',['id'=>$data[0]['id']]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Kitab adi</label>
                                            <input type="text" class="form-control" name="name" value="{{ $data[0]['name'] }}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Kitab sayi</label>
                                            <input type="number" class="form-control" name="quantity" value="{{ $data[0]['quantity'] }}">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Kitab sekli</label>
                                            <input type="file" class="form-control-file" name="image" style="opacity: 1;position: inherit;">
                                            <img src="{{ asset($data[0]['image'])}}" style="height: 150px; width: 150px;">
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
                                                <option disabled selected value="{{ $data[0]['id'] }}">{{ $data[0]->publishing->name }}</option>
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
                                            <option disabled selected value="{{ $data[0]['id'] }}">{{ $data[0]->author->name }}</option>

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
                                            <option disabled selected value="{{ $data[0]['id'] }}">{{ $data[0]->category->name }}</option>

                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="">Qiymet</label>
                                        <input value="{{ $data[0]['amount'] }}" type="number" class="form-control" name="amount">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="">Aciqlama</label>
                                        <input value="{{ $data[0]['description'] }}" type="text" class="form-control" name="description">
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

