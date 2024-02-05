<?php

namespace App\Converter;

class ConverterCollumns
{
    private static array $collumns = [
        "Код" => "sku",
        "Наименование" => "title",
        "Уровень1" => "level1",
        "Уровень2" => "level2",
        "Уровень3" => "level3",
        "Цена" => "price",
        "ЦенаСП" => "priceSP",
        "Количество" => "quantity",
        "Поля свойств" => "fields",
        "Совместные покупки" => "featured",
        "Единица измерения" => "unit",
        "Картинка" => "img",
        "Выводить на главной" => "main",
        "Описание" => "description"
    ];

    public static function getCollumn(string $name): string|null
    {
        if (isset(self::$collumns[$name])) {
            return self::$collumns[$name];
        }

        return $name;
    }

    public static function compare(array $headers): bool
    {
        return array_values(self::$collumns) === $headers;
    }

    public static function getCollumnsAliases()
    {
        return array_flip(self::$collumns);
    }
}
