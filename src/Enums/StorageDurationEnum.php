<?php

namespace CraftFieldConnector\Enums;

enum StorageDurationEnum: string
{
    case Indefinite = 'indefinite';
    case ThirtyDays = '30Days';
    case SixtyDays = '60Days';
    case NinetyDays = '90Days';
}
