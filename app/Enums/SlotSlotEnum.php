<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SlotSlotEnum extends Enum
{
    public const MORNING = 1;
    public const AFTERNOON = 2;

    public static function getArrayView(): array
    {
        return [
            'Ca sáng'  => self::MORNING,
            'Ca chiều' => self::AFTERNOON,
        ];
    }
}
