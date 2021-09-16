@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Sınıf Sınavı Oluştur</h2>
                </blockquote>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('manager.dashboard')}}">Anasayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('manager.class-exam.index')}}">Sınıf Sınavları</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sınıf Sınavı Oluştur</li>
                    </ol>
                </nav>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="form-control" name="form-data" onchange="changeValue()">
                        @csrf
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect1" name="periodId"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}">{{$period->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect1">Dönem</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect2" name="monthId"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($months as $month)
                                    <option value="{{$month->id}}">{{$month->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect2">Ay</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <select class="form-select" id="floatingSelect3" name="groupId"
                                    aria-label="Floating label select example">
                                <option disabled selected>Seçiniz</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}">{{$group->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect3">Sınıf</label>
                        </div>

                        @foreach($types as $type)
                            <label class="form-label">{{$type->title}}</label>
                            <div class="input-group mb-3">
                                <input name="{{$type->id}}" type="range" class="form-range" min="1" max="25"
                                       oninput="this.nextElementSibling.value = this.value">
                                <output>13</output>
                            </div>
                        @endforeach

                        <div class="col-md-3 rounded mb-5">
                            <label class="fw-bold text-danger">
                                Toplam Soru : <span id="total"></span>
                            </label>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.car.index')}}" class="btn btn-danger">İptal</a>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Sınıf Sınavı Oluştur</title>

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
        const actionUrl = '{{route('manager.class-exam.store')}}';
        const backUrl = '{{route('manager.class-exam.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script>

        let output = document.getElementsByTagName("output");
        var total = 0;
        for (let item of output) {
            let itemOutput = parseInt(item.textContent);
            total += itemOutput;
        }
        document.querySelector('#total').innerHTML = total;

        function changeValue() {
            let output = document.getElementsByTagName("output");
            var total = 0;
            for (let item of output) {
                let itemOutput = parseInt(item.textContent);
                total += itemOutput;
            }
            document.querySelector('#total').innerHTML = total;
        }

    </script>
    @include('layouts.script')
@endsection