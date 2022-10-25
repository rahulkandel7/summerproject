@extends('layouts.app')

@section('css')
    <style>
        .service{
            transition: all .3s ease-in-out;
        }
        .service:hover{
            transform: translateY(-.5rem);
    }
    </style>
@endsection

@section('main')
    <div class="w-11/12 mx-auto mb-5">
        <h2 class="text-primary text-2xl text-left font-semibold px-10 py-10">
            Homie Nepal Blogs
        </h2>

        <div class="flex flex-wrap justify-start mt-5">
            @foreach ($blogs as $blog)
                <a href="{{ route('showblog', $blog->id) }}">
                    <div class="shadow-lg hover:shadow-xl cursor-pointer w-72 mb-2 p-5 mr-2 service">
                        <img src="storage/{{$blog->image}}" alt="">
                        <p class="text-black font-bold text-lg mt-2">
                            {{$blog->title}}
                        </p>
                        {{-- <p class="text-gray-500 text-justify text-sm h-24 overflow-hidden">
                            {!! $blog->body !!}
                        </p> --}}
                        <p class="text-gray-500 text-sm mt-2 font-semibold">
                            {{\Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}
                        </p>
                    </div>
                </a>
            @endforeach

            

            
            

        </div>

        

    </div>
@endsection