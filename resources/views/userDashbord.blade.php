@extends('layout.front_layout')
@section('content')
    <div class="w-full grid items-center h-112">
        <div class="w-full h-111.5">
            <img class="w-110 h-110 m-auto mt-10" src="{{ asset('images/image1.png') }}">
            <h1 class="text-5xl	leading-8	font-light	text-blue1 mt-12">COMING SOON</h1>
            <button  class="bg-blue1 text-white w-80 h-9 mt-8 rounded">EDIT MY PROFILE AND MY WORKLOG</button>
            <p  class="mt-8 text-blue1 text-sm font-medium cursor-pointer tracking-wide 	">LOGOUT</p>
        </div>
    </div>
@endsection
