<?php

namespace CraftFieldConnector\Enums;

/**
 * Represents the various field types available in Craft CMS, each identified by a unique string value.
 * This enumeration facilitates consistent referencing and management of field types within the system,
 * providing a type-safe way to handle different kinds of field operations and validations.
 */
enum FieldType: string
{
    case Assets = 'assets';
    case Blurhash = 'blurhash';
    case Categories = 'categories';
    case Checkboxes = 'checkboxes';
    case Ckeditor = 'ckeditor';
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
     * Matches a Craft CMS field instance to a corresponding enum case.
     *
     * @param mixed $field A Craft CMS field instance to be matched.
     * @return FieldType|null The corresponding FieldType enum case if a match is found, or null if no match is found.
     * @throws \Exception if no corresponding enum case is found for the provided field type.
     */
    public static function matchFromCraftField($field): ?self
    {
        return match (true) {
            $field instanceof \craft\fields\Assets => FieldType::Assets,
            $field instanceof \modules\lucymodule\fields\BlurhashField => FieldType::Blurhash,
            $field instanceof \craft\fields\Categories => FieldType::Categories,
            $field instanceof \craft\fields\Checkboxes => FieldType::Checkboxes,
            $field instanceof \craft\ckeditor\Field => FieldType::Ckeditor,
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

    /**
     * Retrieves the FieldType enum case based on the string value of the field type.
     *
     * @param string $value The string identifier of the field type.
     * @return FieldType|null The corresponding FieldType enum case, or null if no match is found.
     */
    public static function fromType(string $value): ?FieldType
    {
        foreach (FieldType::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }

    /**
     * Determines if the specified field type is considered a text field.
     *
     * @param string $fieldType The string identifier of the field type to check.
     * @return bool True if the field type is a text field, false otherwise.
     */
    public static function isTextField(string $fieldType): bool
    {
        return in_array(
            self::fromType($fieldType), [
            FieldType::Ckeditor,
            FieldType::Email,
            FieldType::Number,
            FieldType::PlainText,
            FieldType::Redactor,
            FieldType::Table,
            FieldType::Url
        ]);
    }

    /**
     * Determines if the specified field type supports iterable operations.
     *
     * @param string $fieldType The string identifier of the field type to check.
     * @return bool True if the field type is iterable, false otherwise.
     */
    public static function isIterable(string $fieldType): bool
    {
        return in_array(
            self::fromType($fieldType), [
            FieldType::Matrix,
            FieldType::SuperTable,
            FieldType::Entries
        ]);
    }
}
