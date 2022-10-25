@extends('layouts.admin.index')

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
    <div class="w-11/12 mx-auto">
        <div>
            <h2 class="text-primary font-bold text-2xl py-2">
                Listings
            </h2>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Listings
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_listings}}
                </p>
            </div>

            <table class="border border-gray-200 w-full mt-10 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Location
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Is Available
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Price
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Posted By
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
    
                @foreach ($listings as $listing)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$listing->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('look',$listing->id)}}" class="cursor-pointer">
                                {{$listing->tole}}, {{$listing->municipality}} - {{$listing->wardno}}
                            </a>
                        </td>
                        <td class="text-primary px-5 border">
                        
                            {{$listing->isAvailable== '1' ? 'Yes' : 'No'}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$listing->price}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$listing->user_id}}
                        </td>
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <a href="{{ route('listings.edit', $listing->id) }}"><i class="fas fa-edit hover:text-primary font-bold cursor-pointer text-xl"></i></a>
                            <form action="{{route('listings.destroy',$listing->id)}}" method="post" class="inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit">
                                    <i class="fas fa-trash hover:text-red-500 font-bold cursor-pointer text-xl ml-3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
    
                @endforeach
    
            </table>
            <div class="mt-5">
                {{$listings->links()}}
            </div>
        </div>
    </div>
@endsection