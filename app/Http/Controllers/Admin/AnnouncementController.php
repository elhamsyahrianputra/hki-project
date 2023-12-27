<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Services\FileUploadService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Announcement\StoreAnnouncementRequest;
use App\Http\Requests\Admin\Announcement\UpdateAnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.announcement.index', [
            'announcements' => Announcement::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.announcement.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnouncementRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['title']);
        
        if ($request->file('cover_url')) {
            $validatedData['cover_url'] = FileUploadService::uploadFile($request->file('cover_url'), 'announcement/cover');
        }

        Announcement::create($validatedData);
        
        return redirect()->route('admin.announcements.index')->with('updateAnnouncement', 'Permohonan Merk Berhasil Direvisi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('dashboard.admin.announcement.show', [
            'announcement' => $announcement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('dashboard.admin.announcement.edit', [
            'announcement' => $announcement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->file('cover_url')) {
            Storage::delete($announcement->cover_url);
            $validatedData['cover_url'] = FileUploadService::uploadFile($request->file('cover_url'), 'announcement/cover');
        }

        Announcement::find($announcement->id)->update($validatedData);
        
        return redirect()->route('admin.announcements.index')->with('updateAnnouncement', 'Permohonan Merk Berhasil Direvisi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        Announcement::destroy($announcement->id);
        Storage::delete($announcement->cover_url);
        return redirect()->route('admin.announcements.index');
    }
}
