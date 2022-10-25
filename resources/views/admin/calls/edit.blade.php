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
                Update Call Status
            </h2>

            <form action="{{ route('admin.calls.update',$call->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="my-3">
                        <label for="name" class="block text-primary font-semibold mb-2">
                        Name
                        </label>
                        <input type="text" name="name" id="name" class=" sm:w-auto md:w-full border-0 focus:ring-primary shadow-md rounded-md" readonly value="{{$call->name}}">

                    </div>

                    <div class="my-3">
                        <label for="phone" class="block text-primary font-semibold mb-2">
                        Phone
                        </label>
                        <input type="text" name="phone" id="phone" class=" sm:w-auto md:w-full border-0 focus:ring-primary shadow-md rounded-md" readonly value="{{$call->phone}}">

                    </div>

                    <div class="my-3">
                        <label for="user_id" class="block text-primary font-semibold mb-2">
                        User ID
                        </label>
                        <input type="text" name="user_id" id="user_id" class=" sm:w-auto md:w-full border-0 focus:ring-primary shadow-md rounded-md" readonly value="{{$call->user_id}}">

                    </div>

                    <div class="my-3">
                        <label for="status" class="block text-primary font-semibold mb-2">
                            Status
                        </label>
                        <select name="status" id="status" class="sm:w-auto border-0 focus:ring-primary shadow-md rounded-md my-2">
                            <option value="pending" @if($call->status == "pending") selected @endif>Pending</option>
                            <option value="done" @if($call->status == "done") selected @endif>Done</option>
                        </select>
                    </div>

                    <div class="flex justify-center mb-3 mx-5 md:mx-0">
                        <x-button class="ml-3 px-10 md:px-40 py-1 bg-primary text-white border-2 rounded-lg border-primary hover:bg-transparent hover:text-primary">
                            {{ __('Save') }}
                        </x-button>
                    </div>

            </form>
        </div>
    </div>
@endsection
