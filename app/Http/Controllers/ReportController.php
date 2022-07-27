<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Jobs\CountInfoReport;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report');
    }

    public function generateReport(StoreReportRequest $request)
    {
        dispatch(new CountInfoReport($request->all(), Auth::user()));

        return redirect('/admin/report');
    }
}
