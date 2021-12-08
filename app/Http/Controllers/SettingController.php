<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        // module name
        $this->module_name = 'setting';

        // module model name, path
        $this->module_model = "App\Models\Setting";
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_name = $this->module_name;
        $settings = config('setting_fields', []);
        $stored_settings = $this->module_model::all();
        return inertia('Setting/Index', [
            'settings' => $settings,
            'stored_settings' => $stored_settings
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $val) {
            $this->module_model::add($key, $val, $this->module_model::getDataType($key));  
        }
        return redirect()->route('settings.index')
            ->with('success', 'Setting saved.');
    }
}
