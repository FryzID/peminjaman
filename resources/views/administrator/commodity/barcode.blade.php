@extends('layouts.app')

@section('title', 'Barcode Komoditas')

@section('content')
<div class="container">
    <h3>Barcode untuk: {{ $commodity->name }}</h3>
    <div>
        {!! $barcode !!}
    </div>
    <p>ID: {{ $commodity->id }}</p>
    <a href="{{ route('administrators.commodities.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection