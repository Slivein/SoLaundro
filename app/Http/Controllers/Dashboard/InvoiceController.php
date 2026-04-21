<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $invoices = [
            ['number' => 'INV-240421-001', 'date' => '21 Apr 2026', 'amount' => 'Rp54.000', 'payment' => 'Paid'],
            ['number' => 'INV-240420-014', 'date' => '20 Apr 2026', 'amount' => 'Rp72.000', 'payment' => 'Paid'],
            ['number' => 'INV-240419-009', 'date' => '19 Apr 2026', 'amount' => 'Rp36.000', 'payment' => 'Pending'],
        ];

        return view('dashboard.invoices.index', [
            'invoices' => $invoices,
        ]);
    }
}
