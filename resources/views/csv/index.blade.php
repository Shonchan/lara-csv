@extends('layouts.main')

@section('main.content')
    <h1>
        {{ __('Загружено из файла') }}
    </h1>


    <x-table :products="$products" :tableHeaders="$tableHeaders"/>

    {{ $products->links() }}
@stop

