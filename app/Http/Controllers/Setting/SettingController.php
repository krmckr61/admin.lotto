<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::get();

        return view('Setting.index', ['settings' => $settings]);
    }

    public function edit($id, Request $request)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            $request->session()->flash('alert', ['type' => 'danger', 'message' => 'Böyle bir ayar bulunamadı.']);
            return redirect(url('/settings'));
        }

        return view('Setting.edit', ['setting' => $setting]);
    }

    public function update($id, Request $request)
    {
        $setting = Setting::find($id);
        if (!$setting) {
            $request->session()->flash('alert', ['type' => 'danger', 'message' => 'Böyle bir ayar bulunamadı.']);
            return redirect(url('/settings'));
        }

        $value = $request->input('value');
        if($value) {
            $setting->value = $value;
            if($setting->save()) {
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Kaydetme işlemi başarıyla gerçekleşti.']);
            } else {
                $request->session()->flash('alert', ['type' => 'danger', 'message' => 'Kaydetme işlemi gerçekleştirilirken hata meydana geldi']);
            }
        } else {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Böyle bir ayar bulunamadı.']);
            return redirect(url('/settings/edit/' . $id));
        }

        return redirect(url('settings'));
    }

}