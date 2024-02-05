<?php

namespace App\Converter;

interface CsvConverterInterface
{
    public static function convert(string $path): array;
}
