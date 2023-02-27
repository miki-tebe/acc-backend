<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Approved()
 * @method static static Pending()
 * @method static static Rejected()
 */
final class StatusType extends Enum
{
    const Approved = 0;
    const Pending = 1;
    const Rejected = 2;
}
