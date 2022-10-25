@extends('layouts.app')

@section('main')

    <div class="11/12 mx-auto">
        <div class="flex justify-center items-center">
            <h2 class="font-semibold my-3 text-primary text-2xl px-5 md:px-0">
                Why Homie Nepal To Rent Your Place
            </h2>
        </div>
    </div>

    <div class="w-11/12 md:w-9/12 mx-auto mt-5">
        <div class="grid grid-cols-1 md:grid-cols-2">

            <!-- Cast Home -->
                <div class="px-5 wow fadeInLeft" data-wow-delay="2s">
                    <h2 class="font-bold text-primary text-xl">
                        Spread a large net
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5">
                        Many of the rental people will look at your listing and decide whether or not to rent from you. You don&#39;t
                        have to look for and wander around looking for the right individual to rent your apartments. Many
                        individuals will look at your location and judge whether or not they like it.
                    </p>
                </div>

                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:ml-10 flex justify-center place-self-center wow fadeInRight" data-wow-delay="2s">
                    <img src="{{asset('images/landlord/net.svg')}}" class="h-52 mt-5">
                </div>
            <!-- Cast Home Close -->

            <!-- Control -->
                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:mr-10 flex justify-center place-self-center wow fadeInLeft" data-wow-delay="2s">
                    <img src="{{asset('images/landlord/control.svg')}}" class="h-52 mt-5">
                </div>

                <div class="px-5 wow fadeInRight" data-wow-delay="2s">
                    <h2 class="font-bold text-primary text-xl">
                        100% control over the rental provide
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5 mb-5 md:mb-0">
                        Your landlord will have complete authority over your apartment. You may choose whether or not to put
                        that renting person in your spot. We will not interfere with your choices. We just want to point you in
                        the direction of the proper individual for the position.
                    </p>
                </div>
            <!-- Control close -->

            <!-- Meet  -->
                <div class="px-5 wow fadeInLeft">
                    <h2 class="font-bold text-primary text-xl">
                        Find your match rental
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5">
                        You may search for people based on your requirements and only include those you like. Persons who
                        appreciate your apartment, plans, rules, etc. will only come to you, so you won&#39;t have to bargain with
                        many people or look for the individual on your own.
                    </p>
                </div>

                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:ml-10 flex justify-center place-self-center wow fadeInRight">
                    <img src="{{asset('images/landlord/match.svg')}}" class="h-52 mt-5">
                </div>
            <!-- Meet Close -->

            <!-- Tenant -->
                <div class="w-full  h-64 bg-gray-100 shadow-2xl mb-10 md:mb-32 md:mr-10 flex justify-center place-self-center wow fadeInLeft">
                    <img src="{{asset('images/tenant/confirmed.svg')}}" class="h-52 mt-5">
                </div>

                <div class="px-5 wow fadeInRight">
                    <h2 class="font-bold text-primary text-xl">
                        Remote tenant selection to save you time
                    </h2>

                    <p class="text-gray-500 text-sm text-justify pt-5 mb-5 md:mb-0">
                        Deposits, rent. They needn’t be scary words! On our platform, all of your payments are protected. We have anti-fraud measures to safeguard your experience and rest assured, if the landlord cancels, you’ll receive a full refund. We securely hold your first month’s rent until 48 hours after your move-in. Based on our ‘no news is good news’ approach, we’ll only payout the advertiser after this time.
                    </p>
                </div>
        <!-- Tenant close -->

        </div>

    </div>
@endsection