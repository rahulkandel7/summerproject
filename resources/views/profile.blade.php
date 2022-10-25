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
    <div class="md:w-10/12 mx-auto">
        <div class="flex justify-center my-3">
            <img src="/storage/{{$user->photo}}" class="w-36 h-36 rounded-full">
        </div>
        <h2 class="text-primary text-center font-bold text-2xl py-2">
            {{ $user->name }} 
            @if($user->isVerified == 1) 
                <span class="text-primary ml-1 text-base"><i class="fas fa-check-circle"></i></span> 
            @endif
        </h2>
        <hr class="border-b-2 mb-2 border-gray-300">
        <h2 class="text-primary font-semibold text-xl py-2">
            Learn About {{ $user->name }} 
        </h2>
        <div class="my-2  pb-2 shadow-lg rounded-xl px-5">
            @if ($user->bio)
                <p class="px-5 text-justify text-gray-600 ">
                    {!! $user->bio !!}
                </p>

            @else
                <p class="px-5 text-justify text-gray-600 ">
                    @if ($user->gender == "male")
                        He hasn't written about himself

                    @else
                    She hasn't written about herself
                    @endif
                </p>
            @endif
            
        </div>

        

        @if ($user->type == 'landlord')
            <h2 class="text-primary font-semibold text-xl py-2 ">
                {{ $user->name }} Listings
            </h2>
            <div class="flex flex-wrap justify-center">
                
                @if (count($listings) == 0)
                    <h2 class="text-primary font-bold text-2xl py-2 mt-8">
                        @if ($user->gender == "male")
                            He hasn't Listed Any Properties Yet
                        @else
                            She hasn't Listed Any Properties Yet
                        @endif
                    </h2>
                @endif

                @foreach ($listings as $listing)
                    <!-- item display-->
                        <a href="{{ route('look',$listing->id) }}">
                            <div class="bg-white shadow-xl w-60 rounded-lg py-2 service mx-2 my-4">
                                <img src="{{$listing->hallphoto}}" class="px-3 py-2">
                                <p class="px-5 py-2">
                                    Rs {{$listing->price}} <span class="text-gray-500">/ Month</span>
                                </p>
                                <p class="px-5 text-sm text-gray-500">
                                    Flat
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
        @endif

        
    </div>
@endsection