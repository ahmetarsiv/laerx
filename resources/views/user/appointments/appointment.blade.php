@extends('user.layout.app')

@section('content')
    @include('user.appointments.appointment-add')
    <div class="container-fluid">
        <section class="content">
            <figure>
                <blockquote class="blockquote">
                    <h2>Randevularım</h2>
                </blockquote>
                <figcaption>
                    <span><a href="{{route('user.dashboard')}}"><i class="fas fa-home"></i> Ana Sayfa</a> /</span>
                    <span class="active">Randevularım</span>
                </figcaption>
            </figure>
            <div class="row">
                <div class="col-12 col-lg-12 mt-3 mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#createAppointment">
                        Yeni Randevu Al
                    </button>
                </div>
                <div class="col-12 col-lg-12 overflow-scroll">
                    <table id="data-table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Eğitmen</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">Durum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <th scope="row">{{$appointment->user->name .' '. $appointment->user->surname}}</th>
                                <td>{{$appointment->date}}</td>
                                <td class="{{$appointment->status == 1 ? 'text-success' : 'text-danger'}}">{{$appointment->status == 1 ? 'Aktif' : 'Pasif'}}</td>
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

    <title>Randevularım</title>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/toastr/toastr.min.css')}}">
    @include('layouts.stylesheet')
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @include('layouts.script')
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('/plugins/toastr/custom-toastr.js')}}"></script>
    <script>
        const actionUrl = '{{route('user.appointment.store')}}';
        const backUrl = '{{route('user.appointment.index')}}';
    </script>
    <script src="{{asset('js/post.js')}}"></script>
@endsection