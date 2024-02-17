<?php

namespace CraftFieldConnector\Enums;

enum FieldType: string
{
    case Assets = 'assets';
    case BaseOptionsField = 'BaseOptionsField';
    case BaseRelationField = 'BaseRelationField';
    case Categories = 'Categories';
    case Checkboxes = 'Checkboxes';
    case Color = 'Color';
    case Country = 'Country';
    case Date = 'Date';
    case Dropdown = 'Dropdown';
    case Email = 'Email';
    case Entries = 'entries';
    case LightSwitch = 'lightSwitch';
    case Matrix = 'Matrix';
    case MissingField = 'MissingField';
    case Money = 'Money';
    case MultiSelect = 'MultiSelect';
    case Number = 'Number';
    case PlainText = 'PlainText';
    case RadioButtons = 'RadioButtons';
    case Table = 'Table';
    case Tags = 'Tags';
    case Time = 'Time';
    case Url = 'Url';
    case Users = 'Users';
    case Unknown = 'unknown';

    public static function matchFromCraftField($fieldValue): ?self
    {
        return match (true) {
            $fieldValue instanceof \craft\fields\Assets => FieldType::Assets,
            $fieldValue instanceof \craft\fields\BaseOptionsField => FieldType::BaseOptionsField,
            $fieldValue instanceof \craft\fields\BaseRelationField => FieldType::BaseRelationField,
            $fieldValue instanceof \craft\fields\Categories => FieldType::Categories,
            $fieldValue instanceof \craft\fields\Checkboxes => FieldType::Checkboxes,
            $fieldValue instanceof \craft\fields\data\ColorData => FieldType::Color,
            $fieldValue instanceof \craft\fields\Country => FieldType::Country,
            $fieldValue instanceof \craft\fields\Date => FieldType::Date,
            $fieldValue instanceof \craft\fields\Dropdown => FieldType::Dropdown,
            $fieldValue instanceof \craft\fields\Email => FieldType::Email,
            $fieldValue instanceof \craft\fields\Entries => FieldType::Entries,
            $fieldValue instanceof \craft\fields\LightSwitch => FieldType::LightSwitch,
            $fieldValue instanceof \craft\fields\Matrix => FieldType::Matrix,
            $fieldValue instanceof \craft\fields\MissingField => FieldType::MissingField,
            $fieldValue instanceof \craft\fields\Money => FieldType::Money,
            $fieldValue instanceof \craft\fields\MultiSelect => FieldType::MultiSelect,
            $fieldValue instanceof \craft\fields\Number => FieldType::Number,
            $fieldValue instanceof \craft\fields\PlainText => FieldType::PlainText,
            $fieldValue instanceof \craft\fields\RadioButtons => FieldType::RadioButtons,
            $fieldValue instanceof \craft\fields\Table => FieldType::Table,
            $fieldValue instanceof \craft\fields\Tags => FieldType::Tags,
            $fieldValue instanceof \craft\fields\Time => FieldType::Time,
            $fieldValue instanceof \craft\fields\Url => FieldType::Url,
            $fieldValue instanceof \craft\fields\Users => FieldType::Users,
            default => FieldType::Unknown,
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
