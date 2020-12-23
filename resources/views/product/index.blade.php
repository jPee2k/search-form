@extends('layouts.app')

@section('title', 'Products')
@section('content')
    <main class="content d-flex flex-wrap justify-content-around">

        @foreach ($products as $product)
            <section class="product mb-3 mr-3 p-3">
                <b>id:</b> {{ $product->id }}<br />
                <b>price:</b> {{ $product->price ?? 'none' }}<br />
                <b>availability:</b> {{ $product->availability ?? 'none' }}<br />
                <b>photo:</b> {{ $product->photo }}<br />
                <b>category:</b> {{ $product->category->name }}<br />
                <b>views:</b> {{ $product->view }}<br />
                <b>brand:</b> {{ $product->brand->name }}<br />
                <b>date:</b> {{ $product->updated_at }}<br />
            </section>
        @endforeach

    </main>
@endsection
