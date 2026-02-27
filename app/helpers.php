<?php

if (!function_exists('date_suffix')) {
    function date_suffix(int $day): string
    {
        if ($day >= 11 && $day <= 13) return 'TH';
        return match ($day % 10) {
            1       => 'ST',
            2       => 'ND',
            3       => 'RD',
            default => 'TH',
        };
    }
}
