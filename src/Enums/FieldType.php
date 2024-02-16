<?php

namespace CraftFieldConnector\Enums;
enum FieldType: string
{
    case PlainText = 'plainText';
    case MatrixBlock = 'matrixBlock';
    case Color = 'color';

    public static function matchFromCraftField($fieldValue): ?self
    {
        return match (true) {
            $fieldValue instanceof \craft\elements\db\MatrixBlockQuery => FieldType::MatrixBlock,
            $fieldValue instanceof \craft\fields\data\ColorData => FieldType::Color,
            is_string($fieldValue) => FieldType::PlainText,
            default => null,
        };
    }

    public static function formatFieldValue($fieldValue)
    {
        return match (self::matchFromCraftField($fieldValue)) {
            FieldType::PlainText => $fieldValue,
            FieldType::Color => $fieldValue->getHex(),
            default => $fieldValue
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
