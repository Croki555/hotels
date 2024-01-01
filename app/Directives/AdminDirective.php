<?php

namespace App\Directives;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AdminDirective
{
    public function handle()
    {
        Blade::if('admin', function () {
            if (Auth::check() && Auth::user()->role_id === 2) {
                return '<?php echo "" ?>';
            }
        });
    }
}
