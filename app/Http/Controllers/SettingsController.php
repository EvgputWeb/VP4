<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Settings;

class SettingsController extends Controller
{

    public function index()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/');
        }
        $key = 'orders_info_email';
        $value = Settings::where('key','=',$key)->get(['value'])->toArray();
        (empty($value)) ? ( $value = '' ) : ( $value = (string)$value[0]['value'] );
        $data = [
            $key => $value
        ];
        return view('settings.index', $data);
    }

    public function store(Request $request)
    {
        if (!Auth::user()->is_admin) {
            return redirect('/');
        }
        $key = 'orders_info_email';

        $setting = new Settings();
        $setting->key = $key;
        $setting->value = $request->get($key);
        $setting->save();
        return redirect('/settings');
    }


}
