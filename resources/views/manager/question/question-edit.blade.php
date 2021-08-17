@extends('manager.layout.app')

@section('content')

    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Soru Düzenle</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('manager.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Soru Düzenle</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3">
                    <form class="p-2" name="form-data">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status"
                                   {{$question->questionImage == 1 ? 'checked' : null}} id="switchQuestionImageShow">
                            <label class="form-check-label" for="switchQuestionImageShow">Soru Resim</label>
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Başlık"
                                   value="{{$question->title}}">
                            <label for="floatingFirst">Soru</label>
                        </div>
                        <div class="input-group mb-3 d-none question-image">
                            <input type="file" class="form-control" name="imagePath">
                            <label class="input-group-text" for="inputGroupFile02">Soru Resmi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="typeId" aria-label="Floating label select example">
                                @foreach($types as $type)
                                    <option
                                        value="{{$type->id}}" {{$question->typeId === $type->id ? 'selected' : null}}>{{$type->title}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Soru Tipi</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="statusChoiceImage"
                                   {{$question->choiceImage == 1 ? 'checked' : null}} id="switchImageShow">
                        </div>
                        <br>
                        @foreach($question->choice as $key => $choice)
                            <div class="row mb-3 text-choice">
                                <div class="form-floating ps-1 col-11">
                                    <input type="text" class="form-control " name="choice_text_{{$choice->id}}" placeholder="Cevap 0{{$key + 1}}"
                                           value="{{$choice->title}}">
                                    <label class="" for="floatingFirst">Cevap 0{{$key + 1}}</label>
                                </div>
                                <div class="col-1">
                                    <input class="form-check-input p-3" type="checkbox" id="flexCheckDefault"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           {{$choice->id === $choice->choiceKey->choiceId ? 'checked' : null}}
                                           name="status_choice_{{$choice->choiceKey->id}}"
                                           title="Doğru Cevabı İşaretleyin.">
                                </div>
                            </div>
                        @endforeach
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı İşaretleyin.">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="photo">
                            </div>

                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı İşaretleyin.">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı İşaretleyin.">
                            </div>
                        </div>
                        <div class="row mb-3 image-choice d-none">
                            <div class="mb-3 col-11">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            <div class="col-1">
                                <input class="form-check-input p-3" type="checkbox" value="" id="flexCheckDefault"
                                       data-bs-toggle="tooltip" data-bs-placement="top"
                                       title="Doğru Cevabı İşaretleyin.">
                            </div>
                        </div>

                        <div class="mt-3 mb-5">
                            <button type="button" onclick="createAndUpdateButton()" class="btn btn-success">Kaydet
                            </button>
                            <a href="{{route('manager.question.index')}}" class="btn btn-danger">İptal</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('meta')

    <title>Soru Düzenle</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('manager.question.store')}}';
        const backUrl = '{{route('manager.question.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script>
        const choiceImage = document.querySelector('#switchImageShow');
        const textInput = document.querySelectorAll('.text-choice');
        const imageInput = document.querySelectorAll('.image-choice');

        const questionImageChoice = document.querySelector('#switchQuestionImageShow');
        const questionImageInput = document.querySelector('.question-image');

        choiceImage.addEventListener('click', () => {
            if (choiceImage.checked === true) {
                textInput.forEach((input, index) => {
                    textInput[index].classList.add('d-none');
                    imageInput[index].classList.remove('d-none');
                })
            } else {
                textInput.forEach((input, index) => {
                    textInput[index].classList.remove('d-none');
                    imageInput[index].classList.add('d-none');
                });
            }
        });

        questionImageChoice.addEventListener('click', () => {
            if (questionImageChoice.checked === true)
                questionImageInput.classList.remove('d-none')
            else
                questionImageInput.classList.add('d-none')

        });

    </script>
@endsection
