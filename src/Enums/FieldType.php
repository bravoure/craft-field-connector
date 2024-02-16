<?php

namespace CraftFieldConnector\Enums;
enum FieldType: string
{
    case UnKnown = 'unknown';
    case PlainText = 'plainText';
    case MatrixBlock = 'matrixBlock';
    case Color = 'color';
    case Assets = 'assets';
    case Int = 'int';
    case Entries = 'entries';
    case LightSwitch = 'lightSwitch';
    case CheckBoxes = 'checkBoxes';

    public static function matchFromCraftField($fieldValue): ?self
    {
        return match (true) {
            $fieldValue instanceof \craft\fields\Entries => FieldType::Entries,
            $fieldValue instanceof \craft\fields\Matrix => FieldType::MatrixBlock,
            $fieldValue instanceof \craft\fields\Assets => FieldType::Assets,
            $fieldValue instanceof \craft\fields\data\ColorData => FieldType::Color,
            $fieldValue instanceof \craft\fields\Number=> FieldType::Int,
            $fieldValue instanceof \craft\fields\PlainText=> FieldType::PlainText,
            $fieldValue instanceof \craft\fields\LightSwitch=> FieldType::LightSwitch,
            $fieldValue instanceof \craft\fields\CheckBoxes=> FieldType::CheckBoxes,
            default => FieldType::UnKnown,
        };
    }

    public static function fromType(string $value): ?FieldType {
        foreach (FieldType::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }

        return null;
    }
}
