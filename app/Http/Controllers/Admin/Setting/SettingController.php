<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::latest('updated_at')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('key', 'like', '%' . $request->search . '%');
            })
            ->paginate(10)
            ->appends($request->all());

        return view('Admin.Setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        Setting::create($request->validated());
        return redirect()->route('Admin.Setting.index')->with('success', 'Setting created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('Admin.Setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('Admin.Setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
        return redirect()->route('Admin.Setting.index')->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('Admin.Setting.index')->with('success', 'Setting deleted successfully');
    }
}
