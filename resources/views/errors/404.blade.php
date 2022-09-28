@extends('errors.error-layout')
@section('content')
    <div class="w-[50%] h-full" style="background-color: #333; background-image: url({{ asset('assets/img/wood-pattern.jpg') }}); clip-path: polygon(71% 0, 100% 50%, 71% 100%, 0 100%, 0 0);">
        <div class="w-[50%] m-auto">
            <img src="{{ asset('assets/img/chess-table.png') }}" class="" style="position: relative; left: -20%;" width="800px" height="800px" alt="">
            <div class="" style="color:white; position: absolute; top:45%; left: 30px; font-size: 25px; width: 33%">
                <h2 style="font-size: 90px; color: white"> 404 </h2>
                <h2 style="font-size: 35px"> {{ __('Whoops! Illegal move.') }} </h2>
                <h2> {{ __("The page you're trying to access is currently unavailable or doesn't exist.") }} </h2>
                <div class="" style="font-size: 30px; margin-top: 50px">
                    <a href="{{ url()->previous() }}" style="color: wheat">
                    <label class="cursor-pointer"> <u class="mr-[15px]" style=" font-size: 30px"> {{ __('Click me to go back') }} ></u> </label>
                        <i class="fa-solid fa-chess-knight" style="font-size: 45px"></i>
                    </a>
                </div>
            </div>
        </div>
    <div>
@endsection