<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Pending()
 * @method static static Accepted()
 * @method static static Confirmed()
 * @method static static Completed()
 * @method static static Rejected()
 * @method static static Canceled()
 * @method static static NotShown()
 * @method static static NotConfirmed()
 * @method static static Waiting()
 * @method static static CheckedIn()
 * @method static static PaymentRequested()
 */
final class ReservationStatusType extends Enum
{
    const Pending = 0;
    const Accepted = 1;
    const Confirmed = 2;
    const Completed = 3;
    const Rejected = 4;
    const Canceled = 5;
    const NotShown = 6;
    const NotConfirmed = 7;
    const Waiting = 8;
    const CheckedIn = 9;
    const PaymentRequested = 10;
}
