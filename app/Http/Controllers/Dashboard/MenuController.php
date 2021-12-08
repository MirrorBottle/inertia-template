<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Menu/Index', [
            'menus' => Menu::all()->load('items')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $is_menu = $request->type == "menu";
        $is_menu ? Menu::create($request->all()) : MenuItem::create($request->all());
        return redirect()->route('menus.index')->with('success', $is_menu ? 'Menu created.' : 'Submenu created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $is_menu = $request->type == "menu";
        $data = $is_menu ? Menu::findOrFail($id) : MenuItem::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('menus.index')->with('success', $is_menu ? 'Menu updated.' : 'Submenu updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        $is_menu = $type == "menu";
        $data = $is_menu ? Menu::findOrFail($id) : MenuItem::findOrFail($id);
        $data->delete();
        return redirect()->route('menus.index')->with('success', $is_menu ? 'Menu updated.' : 'Submenu updated');
    }
}
