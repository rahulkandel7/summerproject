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
    <div class="w-11/12 mx-auto my-7">
        @if (count($listings) == 0)
                <h2 class="text-primary font-bold text-2xl py-2">
                    You Haven't Listed any Properties Yet.
                </h2>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            

            @foreach ($listings as $listing)
                <a href="{{ route('listings.show',$listing->id) }}">
                    <div class="bg-white shadow-xl service rounded-lg py-2">
                        <div class="flex justify-center items-center">
                            <img src="/storage/{{$listing->thumbnail}}" alt="" class="w-32">
            
                        </div>
                            <p class="text-gray-500 font-semibold text-center pt-3">
                                <span class="text-black text-xl">Rs {{$listing->price}}</span> / Month
                            </p>
                            <p class="text-left text-gray-500 font-semibold text-sm px-5 py-2">
                                <span class="text-black">Is Negotiable:</span> {{$listing->isNegotiable == 1 ? 'Yes' : 'No'}}
                            </p>
                            <p class="text-left text-gray-500 font-semibold text-sm px-5 py-2">
                                <span class="text-black">Is Available:</span> {{$listing->isAvailable == 1 ? 'Yes' : 'No'}}
                            </p>
                            <p class="text-left text-gray-500 font-semibold text-sm px-5 py-2">
                                <span class="text-black">Address:</span> {{$listing->tole}}, {{$listing->municipality}} - {{$listing->wardno}}
                            </p>
                    </div>
                </a>
            @endforeach
            
        </div>
    </div>
@endsection 