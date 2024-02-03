<?php

namespace App\Converter;

use Illuminate\Support\LazyCollection;
use League\Csv\Exception;
use League\Csv\Reader;

class CsvConverter implements CsvConverterInterface
{
    /**
     * @throws \Exception
     */
    public static function convert(string $path): array
    {
        try {
            $csv = Reader::createFromPath(storage_path('app/upload/file.csv'));
            $csv->setDelimiter(';');
            if(!self::compareHeaders($csv->first())) {
                throw new \Exception("Заоголовки колонок не соответствуют");
            }
            $csv->setHeaderOffset(0);
            $collection = LazyCollection::make(static fn () => yield from $csv->getRecords())
                ->map(fn ($row) => self::processRow($row))
                ->toArray();


        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return  $collection;
    }


    private static function processRow($row): array
    {
        $result = [];
        foreach ($row as $k => $value) {
                $key = ConverterCollumns::getCollumn(trim($k));
                if(in_array($key, ['price', 'priceSP'])) {
                    $value = floatval(preg_replace("/[^0-9.]/", "", $value));
                }
                if($key === 'featured') {
                    $value = intval(trim($value));
                }
                $result[$key] = trim($value);

        }
        return $result;
    }

    private static function compareHeaders(array $headers): bool
    {
        $normalizedHeaders = [];

        foreach ($headers as $header) {
            $normalizedHeaders[] = ConverterCollumns::getCollumn(trim($header));
        }

        return ConverterCollumns::compare($normalizedHeaders);
    }
}
