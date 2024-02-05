<?php

namespace App\Http\Controllers;

use App\Converter\CsvConverter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;
use League\Csv\Exception;
use League\Csv\Reader;

class CsvController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(20);

        return  view('result.index', compact('products'));
    }

    public function upload(Request $request)
    {
        if(!$request->hasFile('csv')){
            return redirect()->back()->with(['error' => 'Не загружен csv файл']);
        }

        Product::query()->truncate();

        $file = $request->file('csv');
        $file->storeAs('upload', 'file.csv' );

        $collection = CsvConverter::convert(storage_path('app/upload/file.csv'));


        foreach ($collection as $product_array) {
            $product = new Product($product_array);
            $product->save();
        }

        return  redirect()->route('csv');
    }
}
