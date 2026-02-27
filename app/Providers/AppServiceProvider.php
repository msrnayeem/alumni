<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Format a stored date (any parseable format) as "22ND JUNE 1998"
        Blade::directive('formatDob', function ($expression) {
            return "<?php
                try {
                    \$_d = Carbon\\Carbon::parse($expression);
                    echo strtoupper(\$_d->format('j') . date_suffix(\$_d->day) . ' ' . \$_d->format('F Y'));
                } catch (\\Exception \$e) {
                    echo strtoupper($expression ?? 'N/A');
                }
            ?>";
        });
    }
}
