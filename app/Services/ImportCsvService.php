<?php

namespace App\Services;

use App\Converter\CsvConverter;
use App\Models\Product;

class ImportCsvService
{
    /**
     * @throws \Exception
     */
    public function import(string $path): void
    {
        Product::query()->truncate();

        try {
            $collection = CsvConverter::convert($path);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        foreach ($collection as $product_array) {
            $product = new Product($product_array);
            $product->save();
        }
    }
}
