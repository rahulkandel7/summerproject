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
        <div class="flex justify-center">
            <div class="bg-white rounded-full shadow-xl  h-12 mt-2 flex">
                <div class="relative w-full">
                    <form action="{{ route('search') }}" method="get">
                        <span class="text-primary pl-5 text-xl"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" name="search" id="search" placeholder="Where you want to go?" class="border-0 bg-transparent focus:border-0 focus:ring-transparent outline-none mt-1 text-sm md:text-base" value="{{request('search')}}">
                        <input type="submit" value="Search" class="hover:bg-primary cursor-pointer h-12 px-7 rounded-full text-white absolute right-0" >
                    </form>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">
            
            @if (count($listings) == 0)
                <h2 class="text-primary font-bold text-2xl py-2 mt-8">
                    No Properties Found in {{request('search')}}
                </h2>
            @endif

            @foreach ($listings as $listing)
                <!-- item display-->
                    <a href="{{ route('look',$listing->id) }}">
                        <div class="bg-white shadow-xl w-60 rounded-lg py-2 service mx-2 my-4">
                            <img src="/storage/{{$listing->thumbnail}}" class="px-3 py-2">
                            <p class="px-5 py-2">
                                Rs {{$listing->price}} <span class="text-gray-500">/ Month</span>
                            </p>
                            <p class="px-5 text-sm text-gray-500">
                                {{$listing->type}}
                            </p>
                            <p class="px-5 text-sm text-gray-500 pt-1">
                                <i class="fas fa-map-marker-alt"></i> {{$listing->tole}}, {{$listing->municipality}} 
                            </p>
                        </div>
                    </a>
                <!-- Item Display Close -->
            @endforeach
        </div>

        {{$listings->links()}}
        
    </div>
@endsection