@extends('layouts.app')

@section('main')

    <div class="11/12 mx-auto">
        <div class="flex justify-center items-center">
            <h2 class="font-semibold my-3 text-primary text-2xl px-4">
                Why Homie Nepal To Find a Place To Rent
            </h2>
        </div>
    </div>

    <div class="w-11/12 md:w-9/12 mx-auto mt-5">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <!-- Book Home -->
                <div class="px-5 wow fadeInLeft" data-wow-delay="2s">
                    <h2 class="font-bold text-primary text-xl">
                        Book your new home from home
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5">
                        You can now search, view, and rent a room or a home from the comfort of your own home. You don&#39;t
                        have to go house by house looking for a property to rent. We seek for the nicest rooms and residences
                        available and make them available to you through our website and apps. Our staff is working really hard
                        to offer you with the finest services possible.
                    </p>
                </div>

                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:ml-10 flex justify-center place-self-center wow fadeInRight" data-wow-delay="2s">
                    <img src="{{asset('images/tenant/confirmed.svg')}}" class="h-52 mt-5">
                </div>
            <!-- Book Home Close -->

            <!-- Search fast -->
                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:mr-10 flex justify-center place-self-center wow fadeInLeft" data-wow-delay="2s">
                    <img src="{{asset('images/tenant/search.svg')}}" class="h-52 mt-5">
                </div>

                <div class="px-5 wow fadeInRight" data-wow-delay="2s">
                    <h2 class="font-bold text-primary text-xl">
                        Search fast, search smart
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5 mb-5 md:mb-0">
                        Homie Nepal allows you to look for available rooms in various areas. You may search and explore the
                        properties listed on the website. You may search based on your requirements and your preferred
                        location. We classify the properties based on their amenities and services. By sitting in one location, you
                        may visit many locations at the same time.
                    </p>
                </div>
            <!-- Search fast close -->

            <!-- Real Feel -->
                <div class="px-5 wow fadeInLeft">
                    <h2 class="font-bold text-primary text-xl">
                        Get a real feel for the place
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5">
                        You may have a lot of inquiries before deciding on an apartment or a room to reside in. You can watch
                        images and videos of the location here to get a sense of what it&#39;s like. You may also learn everything
                        there is to know about the location. Only if you like the room will we be able to forward with the
                        procedure.
                    </p>
                </div>

                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:ml-10 flex justify-center place-self-center wow fadeInRight">
                    <img src="{{asset('images/tenant/feel.svg')}}" class="h-52 mt-5">
                </div>
            <!-- Real Feel Close -->

            <!-- Geniune -->
                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:mr-10 flex justify-center place-self-center wow fadeInLeft">
                    <img src="{{asset('images/tenant/geniune.svg')}}" class="h-52 mt-5">
                </div>

                <div class="px-5 wow fadeInRight">
                    <h2 class="font-bold text-primary text-xl">
                        Geniune Landlords
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5 mb-5 md:mb-0">
                        The available rooms are just those that have been confirmed by our team. We only recommend sites
                        that have been thoroughly reviewed. Nobody is allowed to put the phony flats here. The featured
                        apartments will be available only when they have been confirmed by our complete staff.
                    </p>
                </div>
        <!-- Geniune close -->

        </div>

    </div>
@endsection