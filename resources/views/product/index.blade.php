@extends('layouts.main')

@section('title', 'Products')
@section('content')
    @foreach ($products as $product)
        <p>==============================</p>
        <b>name:</b> {{ $product->name }}<br />
        <b>model:</b> {{ $product->model }}<br />
        <b>views:</b> {{ $product->view }}<br />
        <b>price:</b> {{ $product->price ?? 'none' }}<br />
        <b>availability:</b> {{ $product->availability ?? 'none' }}<br />
        <b>description:</b> {{ $product->description ?? 'none' }}<br />
        <b>photo:</b> {{ $product->photo }}<br />
        <b>date:</b> {{ $product->updated_at }}<br />
    @endforeach
@endsection
