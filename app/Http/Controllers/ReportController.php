<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function index()
    {
        return view('admin.report');
    }
}
