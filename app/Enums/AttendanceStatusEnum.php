<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AttendanceStatusEnum extends Enum
{
    public const DI_HOC = 1;
    public const DI_MUON = 2;
    public const NGHI_HOC = 3;
    public const NGHI_CO_PHEP = 4;

    public static function getArrayView(): array
    {
        return [
            'Đi học'       => self::DI_HOC,
            'Đi muộn'      => self::DI_MUON,
            'Nghỉ học'     => self::NGHI_HOC,
            'Nghỉ có phép' => self::NGHI_CO_PHEP,
        ];
    }
}
