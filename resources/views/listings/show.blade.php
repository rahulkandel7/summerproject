@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/lightbox/lightbox.min.css')}}">
@endsection

@section('main')
    <div class="w-11/12 mx-auto mt-5">
        <h2 class="text-primary font-bold text-2xl py-2">
            {{$listing->tole}}, {{$listing->municipality}} - {{$listing->wardno}}
        </h2>

        <div class="grid grid-cols-1 md:flex">
            @if ($listing->tbphoto)
                <div class="m-2">
                    <a href=" /storage/{{$listing->tbphoto}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->tbphoto}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif

            @if ($listing->hallphoto)
                <div class="m-2">
                    <a href=" /storage/{{$listing->hallphoto}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->hallphoto}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif

            @if ($listing->kitchenphoto)
                <div class="m-2">
                    <a href=" /storage/{{$listing->kitchenphoto}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->kitchenphoto}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif

            @if ($listing->psphoto)
                <div class="m-2">
                    <a href=" /storage/{{$listing->psphoto}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->psphoto}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif

            @if ($listing->froom)
                <div class="m-2">
                    <a href=" /storage/{{$listing->froom}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->froom}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif

            @if ($listing->sroom)
                <div class="m-2">
                    <a href=" /storage/{{$listing->sroom}} " data-lightbox="rooms">
                        <img src="/storage/{{$listing->sroom}}" class="rounded-lg p-2 shadow-lg w-full" alt="photo1">
                    </a>
                </div>
            @endif
            

            
        </div>

        <h2 class="text-primary font-bold text-2xl py-2 mt-4">
            Rs {{$listing->price}} <span class="text-gray-500 font-semibold">/ Month</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="my-2 border-b-2 pb-2 md:border-r-2 ">
                <p class="px-5 text-justify text-gray-600 ">
                    {!! $listing->info !!}
                </p>
            </div>

            <div>
                <div class="flex justify-center items-center md:mt-20">
                    <div>
                        <div class="flex justify-center">
                            <div class="w-32 h-32 rounded-full">
                                <img src="/storage/{{$listing->user->photo}}" class="rounded-full w-32 h-32">
                            </div>
                        </div>

                        <p class="text-center text-primary font-semibold text-xl my-2">
                            {{ $listing->user->name }} <span class="text-primary ml-1 text-base"><i class="fas fa-check-circle"></i></span>
                        </p>

                        {{-- <a href="tel:+977981529300" class="px-4 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary">Contact Now</a>  --}}

                        <a href="{{ route('listings.edit',$listing->id) }}" class="px-4 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary">Edit Now</a>

                        <form action="{{ route('listings.destroy',$listing->id) }}" method="post" class="inline-block">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="px-4 py-1 bg-red-600 text-white border-2 rounded-lg border-red-600 hover:bg-transparent hover:text-red-600 cursor-pointer">
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <h2 class="text-primary font-bold text-2xl py-2 mt-4">
            Prefered Tenants
        </h2>

        <table>
            <tr>
                <td class="font-semibold px-2">Age</td>
                <td>{{$listing->age_range}}</td>
            </tr>
            <tr>
                <td class="font-semibold px-2">Tenant Type</td>
                <td>{{$listing->tenant_type}}</td>
            </tr>
            <tr>
                <td class="font-semibold px-2">Gender</td>
                <td>{{$listing->gender}}</td>
            </tr>
        </table>

        <h2 class="text-primary font-bold text-2xl py-2 mt-4">
            House Rules
        </h2>

        <p class="text-gray-600 mb-2">
            {!! $listing->rules !!}
        </p>

        
    </div>
@endsection

@section('js')
    <script src="{{asset('js/lightbox/lightbox.min.js')}}"></script>
    <script src="{{asset('js/lightbox/lightbox-plus-jquery.js')}}"></script>
@endsection