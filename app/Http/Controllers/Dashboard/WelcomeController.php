<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(): View
    {
        $services = [
            ['name' => 'Wash & Fold', 'price' => 'Rp18.000 / kg', 'eta' => 'Ready in 24 hours'],
            ['name' => 'Express Wash', 'price' => 'Rp30.000 / kg', 'eta' => 'Ready in 6 hours'],
            ['name' => 'Ironing Only', 'price' => 'Rp12.000 / kg', 'eta' => 'Ready in 12 hours'],
        ];

        return view('dashboard.welcome', [
            'services' => $services,
        ]);
    }
}
