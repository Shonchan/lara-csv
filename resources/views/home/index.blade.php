@extends('layouts.main')

@section('main.content')
    <h1>
        {{ __('Загрузка файла') }}
    </h1>

    @if($errors->any())
        <div class="row">
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <x-form action="{{ route('csv.upload') }}" method="POST"  enctype="multipart/form-data">

                <x-form-item>
                    <x-label required>{{ __('Csv файл') }}</x-label>
                    <x-form-input type="file" name="csv_file"/>
                </x-form-item>

                <x-button type="submit">{{ __('Загрузить') }}</x-button>
            </x-form>
        </div>
    </div>
@stop

