<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name'       => 'required|string|max:255',
            'site_description'=> 'nullable|string|max:500',
            'contact_email'   => 'nullable|email|max:255',
            'contact_phone'   => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'social_instagram'=> 'nullable|string|max:255',
            'social_facebook' => 'nullable|string|max:255',
            'social_youtube'  => 'nullable|string|max:255',
            'social_whatsapp' => 'nullable|string|max:50',
        ]);

        $keys = [
            'site_name', 'site_description', 'contact_email', 'contact_phone',
            'contact_address', 'social_instagram', 'social_facebook',
            'social_youtube', 'social_whatsapp',
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Pengaturan situs berhasil disimpan!');
    }
}
