@extends('errors.error-layout')
@section('content')
    <div class="w-[50%] h-full" style="background-color: #333; background-image: url({{ asset('assets/img/wood-pattern.jpg') }}); clip-path: polygon(71% 0, 100% 50%, 71% 100%, 0 100%, 0 0);">
        <div class="w-[50%] m-auto">
            <img src="{{ asset('assets/img/chess1.png') }}" class="" style="position: relative; left: -20%;" width="800px" height="800px" alt="">
            <div class="w-[360px] size-down" style="color:white; position: absolute; top:50%; left: 30px; font-size: 25px; width: 33%">
                <h2 style="font-size: 75px; color: white"> 403! </h2>
                <h2 style="font-size: 30px"> {{ __('Whoops! Illegal move.') }} </h2>
                <h2> {{ __("You don't have permissions to view this page!") }} </h2>
                <div class="" style="font-size: 30px; margin-top: 50px">
                    <a href="{{ url()->previous() }}" style="color: lightblue">
                        <label class="cursor-pointer"> <span class="mr-[15px]" style=" font-size: 30px"> {{ __('Click me to go back') }} ></span> </label>
                        <i class="fa-solid fa-chess-knight" style="font-size: 45px"></i>
                    </a>
                </div>
            </div>
        </div>
        <div>
@endsection
