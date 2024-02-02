@extends('layouts.main')

@section('main.content')
    <h1>
        {{ __('Загрузка файла') }}
    </h1>


    <div class="card mb-3">
        <div class="card-body">
            <x-form action="{{ route('csv.upload') }}" method="POST"  enctype="multipart/form-data">

                <x-form-item>
                    <x-label required>{{ __('Csv файл') }}</x-label>
                    <x-form-input type="file" name="csv"/>
                </x-form-item>

                <x-button type="submit">{{ __('Загрузить') }}</x-button>
            </x-form>
        </div>
    </div>
@stop

