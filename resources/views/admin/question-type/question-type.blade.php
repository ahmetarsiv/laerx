@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Kategorileri</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Soru Kategorileri</span>
                </figcaption>
            </figure>

            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <h4><a href="{{route('admin.type.create')}}" class="btn btn-success">Kategori Oluştur</a></h4>
                </div>
                <div class="col-12 col-lg-12 mt-3 overflow-auto">
                    <table id="data-table" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>{{$type->title}}</td>
                                <td>
                                    <a href="{{route('admin.type.edit',$type)}}"><i
                                            class="fas fa-edit"></i></a>
                                    <button class="btn"
                                            onclick="deleteButton(this,`${{route('admin.type.destroy',$type)}}`)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection

@section('meta')

    <title>Soru Kategorileri</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const backUrl = '{{route('admin.type.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    @include('layouts.script')
@endsection