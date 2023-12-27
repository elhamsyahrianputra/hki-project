<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Brand;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BrandStatus;

class DashboardController extends Controller
{
    public function index() {
        if (auth()->user()->hasRole('admin')) {
            return view('dashboard.admin.index', [
                'brand_statuses' => BrandStatus::orderBy('created_at', 'desc')->limit(10)->get(),
                'count_status' => Brand::countStatus(),
                'visitorsDay' => json_encode($this->countVisitorsDay()),
                'visitorsMonth' => json_encode($this->countVisitorsMonth()),
                'visitorsYear' => json_encode($this->countVisitorsYear()),
            ]);
            
        } else if(auth()->user()->hasRole('applicant')){
            // dd(Brand::getPDKI('riel'));
            return view('dashboard.applicant.index', [
                'brand_statuses' => BrandStatus::orderBy('created_at', 'desc')->limit(10)->get(),
                'count_status' => Brand::countStatus(auth()->user()->id),
            ]);
        }
    }

    private function countVisitorsDay() {
        $visitors = Visitor::select(DB::raw('date_visit, COUNT(date_visit) as visit_count'))
        ->groupBy('date_visit')
        ->get()
        ->map(function ($visitor) {
            return [$visitor->date_visit, $visitor->visit_count];
        })
        ->toArray();

        return $visitors;
    }

    private function countVisitorsMonth() {
        $results = Visitor::select(DB::raw('YEAR(date_visit) as tahun, MONTHNAME(date_visit) as nama_bulan, COUNT(ip) as jumlah_ip'))
        ->groupBy(DB::raw('YEAR(date_visit), MONTHNAME(date_visit)'))
        ->orderBy(DB::raw('YEAR(date_visit) DESC, MONTH(date_visit)'))
        ->get()
        ->map(function ($visitor) {
            return $visitor['jumlah_ip'];
        })
        ->toArray();

        $results = array_slice($results, 0, 12);
        return $results;
    }

    private function countVisitorsYear() {
        $results = Visitor::select(DB::raw('YEAR(date_visit) as tahun, COUNT(ip) as jumlah_ip'))
        ->groupBy(DB::raw('YEAR(date_visit)'))
        ->orderBy(DB::raw('YEAR(date_visit)'))
        ->get()
        ->map(function ($results) {
            return $results['jumlah_ip'];
        })
        ->toArray();

        return $results;
    }
}
