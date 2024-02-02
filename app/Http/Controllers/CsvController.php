<?php

namespace App\Http\Controllers;

use App\Converter\CsvConverter;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;
use League\Csv\Exception;
use League\Csv\Reader;

class CsvController extends Controller
{
    public function index()
    {

    }

    public function upload(Request $request)
    {
        if(!$request->hasFile('csv')){
            return redirect()->back()->with(['error' => 'Не загружен csv файл']);
        }

        $file = $request->file('csv');
        $file->storeAs('upload', 'file.csv' );

        $collection = CsvConverter::convert(storage_path('app/upload/file.csv'));
        dd($collection);
    }
}
