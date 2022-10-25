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
        <div class="flex">
            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Tenants
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_tenants}}
                </p>
            </div>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5 ml-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Landlords
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_landlords}}
                </p>
            </div>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5 ml-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Listings
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_listings}}
                </p>
            </div>

            <div class="w-44 h-32 shadow-lg hover:shadow rounded-lg service mt-5 ml-5">
                <p class="text-primary font-bold text-lg px-5 py-2">
                    No. Of Blogs
                </p>
                <p class="text-primary text-right font-bold text-lg px-5 py-2">
                    {{$t_blogs}}
                </p>
            </div>
        </div>

        <div class="mt-5 ">
            <h2 class="text-primary font-bold text-2xl py-2">
                Latest Tenants
            </h2>

            <table class="border border-gray-200 w-full mt-2 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Name
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Email Address
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Phone Number
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
    
                @foreach ($tenants as $tenant)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$tenant->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('profile',$tenant->id)}}" class="cursor-pointer">
                                {{$tenant->name}}
                            </a>
                        </td>
                        <td class="text-primary px-5 border">
                            {{$tenant->email}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$tenant->phone}}
                        </td>
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <form action="{{route('admin.users.destroy',$tenant->id)}}" method="post" class="inline-block">
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
                {{$tenants->links()}}
            </div>
        </div>

        <div class="mt-5">
            <h2 class="text-primary font-bold text-2xl py-2">
                Latest Landlords
            </h2>

            <table class="border border-gray-200 w-full mt-2 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Name
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Email Address
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Phone Number
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Address
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
    
                @foreach ($landlords as $landlord)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$landlord->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('profile',$landlord->id)}}" class="cursor-pointer">
                                {{$landlord->name}}
                            </a>
                        </td>
                        <td class="text-primary px-5 border">
                            {{$landlord->email}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$landlord->phone}}
                        </td>
                        <td class="text-primary px-5 border">
                            {{$landlord->address}}
                        </td>
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <form action="{{route('admin.users.destroy',$landlord->id)}}" method="post" class="inline-block">
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
                {{$landlords->links()}}
            </div>
        </div>

        <div class="mt-5">
            <h2 class="text-primary font-bold text-2xl py-2">
                Our Latest Blogs
            </h2>

            <table class="border border-gray-200 w-full mt-2 shadow-md rounded-md">
                <tr>
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        ID
                    </td>
                    <td class="text-gray-600 font-semibold px-5 border">
                        Title
                    </td>
                    
                    <td class="text-gray-600 font-semibold px-5 border w-32">
                        Action
                    </td>
                </tr>
    
                @foreach ($blogs as $blog)
                    <tr>
                        <td class="text-primary px-5 border w-32">
                            {{$blog->id}}
                        </td>
                        <td class="text-primary px-5 border">
                            <a href="{{ route('admin.blogs.show', $blog->id) }}" class="cursor-pointer">
                                {{$blog->title}}
                            </a>
                        </td>
                        
                        <td class="text-gray-600 px-5 border w-32 py-2">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}"><i class="fas fa-edit hover:text-primary font-bold cursor-pointer text-xl"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post" class="inline-block">
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
                {{$blogs->links()}}
            </div>
        </div>

    </div>
    
            
@endsection