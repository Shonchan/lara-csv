<?php

namespace App\Converter;

use Illuminate\Support\LazyCollection;
use League\Csv\Exception;
use League\Csv\Reader;

class CsvConverter implements CsvConverterInterface
{
    public static function convert(string $path): array
    {
        try {
            $csv = Reader::createFromPath(storage_path('app/upload/file.csv'));
            $csv->setHeaderOffset(0);
            $collection = LazyCollection::make(static fn () => yield from $csv->getRecords())
                ->map(fn ($row) => self::processRow($row))
                ->toArray();


        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return  $collection;
    }


    private static function processRow($row): array
    {
        $result = [];
        foreach ($row as $k => $value) {
            $keys = explode(';', trim($k));
            $values = explode(';', trim($value));
            $max_count = min(count($keys), count($values));
            for ($i = 0; $i < $max_count; $i++) {
                $key = ConverterCollumns::getCollumn(trim($keys[$i]));
                $result[$key] = trim($values[$i]);
            }

        }
        return $result;
    }
}
