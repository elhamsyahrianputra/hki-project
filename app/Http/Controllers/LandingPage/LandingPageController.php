<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\Brand;
use App\Models\BrandStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;

class LandingPageController extends Controller
{
    public function home() {
        return view('landing-page.index', [
            'title' => 'HKI UNS',
        ]);
    }

    public function search() {

        $search = request('search');
        if ($search) {
            $brands = Brand::where('name', 'like', '%' . $search . '%')->orWhere('owner', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $brands = Brand::latest()->paginate(10);
        }

        return view('landing-page.search', [
            'title' => 'HKI UNS',
            'brands' => $brands,
        ]);
    }

    public function detail(Brand $brand) {
        return view('landing-page.detail', [
            'title' => $brand->name . ' | HKI UNS',
            'brand' => $brand,
        ]);
    }

    public function announcements() {
        return view('landing-page.announcements', [
            'title' => 'Pengumuman | HKI UNS',
            'announcements' => Announcement::latest()->get(),
        ]);
    }

    public function announcement(Announcement $announcement) {
        return view('landing-page.announcement', [
            'title' => 'Pengumuman | HKI UNS',
            'announcement' => $announcement,
        ]);
    }
}
