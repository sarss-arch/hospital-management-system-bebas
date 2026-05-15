<?php
namespace App\Enums;

enum AppointmentStatus: string {
    case PENDING='pending'; case CONFIRMED='confirmed'; case CANCELLED='cancelled'; case COMPLETED='completed';
    public function canTransitionTo(self $next): bool {
        return match($this) {
            self::PENDING => in_array($next, [self::CONFIRMED, self::CANCELLED], true),
            self::CONFIRMED => in_array($next, [self::COMPLETED, self::CANCELLED], true),
            self::CANCELLED, self::COMPLETED => false,
        };
    }
}
