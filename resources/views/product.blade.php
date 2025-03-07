@extends('layouts.default')

@section('content')
    <div class="px-8">
        <div class="mx-auto max-w-screen-2xl mt-10 mb-20">
            <section class="grid grid-cols-2 gap-10">
                <div class="aspect-square">
                    <img class="h-full w-full object-cover rounded-xl" src="/assets/product-image.jpg" alt="">
                </div>

                <div class="">
                    <h2 class="text-2xl font-semibold">Nike Air Force 1 Max</h2>
                    <div class="text-muted-foreground text-lg mt-1">Men's running shoes</div>
                    <div class="text-lg font-semibold mt-4">
                        193,99€
                    </div>
                    <p class="mt-2 mb-10 text-muted-foreground">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea
                        ipsam
                        necessitatibus
                        consectetur odit eveniet
                        soluta et consequuntur pariatur fugit! Quasi illum ipsam ullam doloribus quae ratione nihil sunt
                        optio
                        at.
                    </p>
                    <button class="bg-primary text-primary-foreground p-5 w-full rounded-full">Add to cart</button>
                </div>
            </section>
        </div>
    </div>
@stop
