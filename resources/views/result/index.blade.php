@extends('layouts.main')

@section('main.content')
    <h1>
        {{ __('Загружено из файла') }}
    </h1>

    <div class="table-responsive mb-3">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" class="col-1">#</th>
                <th scope="col" class="col-1">Код</th>
                <th scope="col" class="col-2">Наименование</th>
                <th scope="col" class="col-1">Уровень1</th>
                <th scope="col" class="col-1">Уровень2</th>
                <th scope="col" class="col-1">Уровень3</th>
                <th scope="col" class="col-1">Цена</th>
                <th scope="col" class="col-1">ЦенаСП</th>
                <th scope="col" class="col-1">Количество</th>
                <th scope="col" class="col-1">Поля свойств</th>
                <th scope="col" class="col-1">Совместные покупки</th>
                <th scope="col" class="col-1">Единица измерения</th>
                <th scope="col" class="col-1">Картинка</th>
                <th scope="col" class="col-1">Выводить на главной</th>
                <th scope="col" class="col-3">Описание</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->level1 }}</td>
                        <td>{{ $product->level2 }}</td>
                        <td>{{ $product->level3 }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->priceSP }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->fields }}</td>
                        <td>{{ $product->featured }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->img }}</td>
                        <td>{{ $product->main }}</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
@stop

