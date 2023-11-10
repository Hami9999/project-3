@extends('layout.front_layout')
@section('content')
    <div class="w-1/2 grid items-center">
        <div class="w-96 h-28 mt-8 text-left grid m-auto mt-auto">
              <h2 class="font-bold text-2xl text-rega1">Login</h2>
              <h4 class="font-normal text-xs tracking-tighter text-grey1 mt-10">Enter your email</h4>
            <div v-if="errorEmail" class="mt-3 w-96 h-11 flex items-center bg-pink-100 ">
                <img class="w-5 h-5 ml-2" src="{{ asset('images/Vector.png') }}">
                <p class="ml-2 font-normal text-sm leading-5 tracking-tight text-red1 rounded">Please enter a valid email address</p>
            </div>
            <input type="email" class="outline-none border-b-2 p-1 "  required>
            <button  class="bg-grey3 text-white w-28 h-9 rounded tracking-widest mt-8 ml-auto font-medium text-sm">
                Send code
            </button>
        </div>
    </div>
@endsection
