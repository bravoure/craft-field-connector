<?php

namespace CraftFieldConnector\Enums;


enum FieldType: string
{
    case Assets = 'assets';
    case Blurhash = 'blurhash';
    case Categories = 'categories';
    case Checkboxes = 'checkboxes';
    case Color = 'color';
    case Country = 'country';
    case Date = 'date';
    case Dropdown = 'dropdown';
    case Email = 'email';
    case Embed = 'embed';
    case Entries = 'entries';
    case LightSwitch = 'lightSwitch';
    case Matrix = 'matrix';
    case Map = 'map';
    case MissingField = 'missingField';
    case Money = 'money';
    case MultiSelect = 'multiSelect';
    case Number = 'number';
    case PlainText = 'plainText';
    case Position = 'position';
    case RadioButtons = 'radioButtons';
    case Redactor = 'redactor';
    case SuperTable = 'superTable';
    case Table = 'table';
    case Tags = 'tags';
    case Time = 'time';
    case Url = 'url';
    case Users = 'users';

    /**
     * @throws \Exception
     */
    public static function matchFromCraftField($field): ?self
    {
        return match (true) {
            $field instanceof \craft\fields\Assets => FieldType::Assets,
            $field instanceof \modules\lucasmodule\fields\BlurhashField => FieldType::Blurhash,
            $field instanceof \craft\fields\Categories => FieldType::Categories,
            $field instanceof \craft\fields\Checkboxes => FieldType::Checkboxes,
            $field instanceof \craft\fields\Color => FieldType::Color,
            $field instanceof \craft\fields\Country => FieldType::Country,
            $field instanceof \craft\fields\Date => FieldType::Date,
            $field instanceof \craft\fields\Dropdown => FieldType::Dropdown,
            $field instanceof \craft\fields\Email => FieldType::Email,
            $field instanceof \modules\embedsmodule\fields\Embed => FieldType::Embed,
            $field instanceof \craft\fields\Entries => FieldType::Entries,
            $field instanceof \craft\fields\LightSwitch => FieldType::LightSwitch,
            $field instanceof \craft\fields\Matrix => FieldType::Matrix,
            $field instanceof \ether\simplemap\fields\MapField => FieldType::Map,
            $field instanceof \craft\fields\Money => FieldType::Money,
            $field instanceof \craft\fields\MultiSelect => FieldType::MultiSelect,
            $field instanceof \craft\fields\Number => FieldType::Number,
            $field instanceof \craft\fields\PlainText => FieldType::PlainText,
            $field instanceof \rias\positionfieldtype\fields\Position => FieldType::Position,
            $field instanceof \craft\fields\RadioButtons => FieldType::RadioButtons,
            $field instanceof \craft\redactor\Field => FieldType::Redactor,
            $field instanceof \verbb\supertable\fields\SuperTableField => FieldType::SuperTable,
            $field instanceof \craft\fields\Table => FieldType::Table,
            $field instanceof \craft\fields\Tags => FieldType::Tags,
            $field instanceof \craft\fields\Time => FieldType::Time,
            $field instanceof \craft\fields\Url => FieldType::Url,
            $field instanceof \craft\fields\Users => FieldType::Users,
            default => throw new \Exception("No enum found for $field"),
        };
    }

    public static function fromType(string $value): ?FieldType
    {
        foreach (FieldType::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }
}
