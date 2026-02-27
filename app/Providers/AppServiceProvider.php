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
        // Format a date (Carbon instance or any parseable string) as "22ND JUNE 1998"
        Blade::directive('formatDate', function ($expression) {
            return "<?php
                try {
                    \$_val = $expression;
                    \$_d = (\$_val instanceof \\Carbon\\Carbon) ? \$_val : \\Carbon\\Carbon::parse(\$_val);
                    echo strtoupper(\$_d->format('j') . date_suffix(\$_d->day) . ' ' . \$_d->format('F Y'));
                } catch (\\Exception \$e) {
                    echo strtoupper((string)($expression ?? 'N/A'));
                }
            ?>";
        });
    }
}
