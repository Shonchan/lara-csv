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
            <x-form id="csvUploadForm" action="{{ route('csv.upload') }}" method="POST" enctype="multipart/form-data">

                <x-form-item>
                    <x-label required>{{ __('Csv файл') }}</x-label>
                    <x-form-input type="file" name="csv_file"/>
                </x-form-item>

                <x-form-item>
                    <div class="spinner-border" role="status" style="display:none;">
                        {{--                        <span class="sr-only">Loading...</span>--}}
                    </div>
                </x-form-item>

                <x-button type="submit">{{ __('Загрузить') }}</x-button>

            </x-form>
        </div>
    </div>
@stop

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#csvUploadForm').one('submit', function (e) {
                    e.preventDefault();

                    $('.spinner-border').show();
                    $(this).submit();
                });
            });
        });
    </script>
@endpush

