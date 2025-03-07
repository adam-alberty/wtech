@extends('layouts.default')

@section('content')
    @include('components.header')
    @include('components.banner')

    <section class="mx-auto max-w-screen-2xl py-20">
        <h2 class="text-lg font-semibold mb-10">New arrivals</h2>
        <div class="grid grid-cols-4 gap-5">
            @foreach ($new_arrivals as $product)
                @include('components.product', $product)
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-screen-2xl pb-40">
        <h2 class="text-lg font-semibold mb-10">Most popular</h2>
        <div class="grid grid-cols-4 gap-5">
            @foreach ($most_popular as $product)
                @include('components.product', $product)
            @endforeach
        </div>
    </section>

    @include('components.email-deals')
    @include('components.footer')
@stop
