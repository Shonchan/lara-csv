<?php

namespace App\Http\Controllers;

use App\Converter\ConverterCollumns;
use App\Http\Requests\UploadCsvRequest;
use App\Models\Product;
use App\Services\ImportCsvService;

class CsvController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(20);

        $tableHeaders = array_merge(['id' => '#'], ConverterCollumns::getCollumnsAliases());

        return view('csv.index', compact('products', 'tableHeaders'));
    }

    public function upload(UploadCsvRequest $request, ImportCsvService $service)
    {
        if (!$request->hasFile('csv_file')) {
            return redirect()->back()->withErrors(['error' => 'Не загружен csv файл']);
        }
        try {
            $file = $request->file('csv_file');
            $file->move(storage_path('app/upload'), 'file.csv');

            $service->import(storage_path('app/upload/file.csv'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('csv');
    }
}
