@extends('errors.error-layout')
@section('content')
    <div class="w-[50%] h-full" style="background-color: #333; background-image: url({{ asset('assets/img/wood-pattern.jpg') }}); clip-path: polygon(71% 0, 100% 50%, 71% 100%, 0 100%, 0 0);">
        <div class="w-[50%] m-auto">
{{--            <img src="{{ asset('assets/img/wood-pattern.jpg') }}" alt="" width="1000" height="1000">--}}
            <img src="{{ asset('assets/img/chess-table.png') }}" class="" style="position: relative; left: -20%;" width="800px" height="800px" alt="">
            <div class="" style="color:white; position: absolute; top:45%; left: 30px; font-family: 'Javanese Text', cursive; font-size: 25px">
                <h1 style="font-size: 100px; color: white"> 404 </h1>
                <h2 style="font-size: 35px"> {{ __('Whoops! Illegal move.') }} </h2>
                <h2> {{ __('Stranica kojoj pokusavate pristupiti trenutno nedostupna ili ne postoji.') }} </h2>
                <div style="font-size: 35px; margin-top: 50px">
                    <label class=""> {{ __('Click me to go back') }} ></label>
                    <a class="" href="{{ url()->previous() }}" style="font-size:50px; color: wheat"><i class="fa-solid fa-chess-knight"></i></a>
                </div>
            </div>
        </div>
    <div>
@endsection
