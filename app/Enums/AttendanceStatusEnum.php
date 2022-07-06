<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AttendanceStatusEnum extends Enum
{
    public const DI_HOC = 1;
    public const DI_MUON = 2;
    public const NGHI = 3;
    public const NGHI_CO_PHEP = 4;
}
