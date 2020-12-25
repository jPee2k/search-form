@extends('layouts.app')

@section('title', 'Products')
@section('content')
    <main class="content">
        <div class="mt-2 mb-2 h3 text-center border border-primary rounded">{{ $products->total() }} hits</div>

        @foreach ($products as $product)
            <section class="product border border-primary rounded mb-3 p-3">
                <b>id:</b> {{ $product->id }}<br />
                <b>name:</b> {{ $product->name }}<br />
                <b>model:</b> {{ $product->model }}<br />
                <b>views:</b> {{ $product->view }}<br />
                <b>rating:</b> {{ $product->rating }}<br />
                <b>price:</b> {{ $product->price ?? 'none' }}<br />
                <b>availability:</b> {{ $product->availability ?? 'none' }}<br />
                <b>photo:</b> {{ $product->photo }}<br />
                <b>category:</b> {{ $product->category->name }}<br />
                <b>brand:</b> {{ $product->brand->name }}<br />
                <b>description:</b> {{ $product->description ?? 'none' }}<br />
                <b>date:</b> {{ $product->updated_at }}<br />
            </section>
        @endforeach

    </main>
@endsection
