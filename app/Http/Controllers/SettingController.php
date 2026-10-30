<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Manajemen Setting';
        $setting = Setting::all()->keyBy('key');
        return view('admin.setting.index', compact('title', 'setting'));
    }
    public function update(Request $datasetting)
    {
        $datas = $datasetting->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:255',
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',

            'phone' => 'nullable|string|max:100',
            'email_upload' => 'nullable|email|max:255',
            'email_order' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:1000',

            'url_shopee' => 'nullable|url|max:255',
            'url_facebook' => 'nullable|url|max:255',
            'url_youtube' => 'nullable|url|max:255',
            'url_tiktok' => 'nullable|url|max:255',
        ]);
        if ($datasetting->hasFile('site_logo')) {
            # code...
            $datas = Setting::where('key', 'site_logo')->first();
            if ($datas && $datas->value) {
                # code...
                // hapus gambar
                Storage::disk('public')->delete($datas->value);
            }
            $path = $datasetting->file('site_logo')->store('logo', 'public');
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                [
                    'value' => $path,
                    'label' => 'site_logo',
                    'group' => 'general',
                    'type' => 'image'
                ]
            );
        }
        $ignoreKeys = ['site_logo'];

        foreach ($datas as $key => $value) {
            if (in_array($key, $ignoreKeys)) {
                # code...
                continue;
            }
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'label' => ucwords(str_replace('_', ' ', $key)),
                    'group' => 'general',
                    'type' => 'text'
                ]
            );
        }
        return redirect()->route('admin.setting')->with('succes', 'Pengaturan website sticker berhasil disimpan');
    }
}
