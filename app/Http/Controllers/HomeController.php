<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Home;
use App\Models\Page;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{
    public function index()
    {
        $agent = new Agent();
        $ip = request()->ip();
        $device = $agent->platform() . ', ' . $agent->browser();
        $check = Visitor::exist($ip);
        if (!$check) {
            Visitor::create([
                'ip_address' => $ip,
                'device' => $device,
                'visitor' => 1
            ]);
        }
        return view('visitors.pages.home');
    }

    public function page($slug = null)
    {
        if ($slug == null) {
            abort(404);
        }
        $page = Page::where('slug', $slug)->first();
        $agent = new Agent();
        $ip = request()->ip();
        $device = $agent->platform() . ', ' . $agent->browser();
        $check = Visitor::existByPage($ip, $page->id);
        if (!$check) {
            Visitor::create([
                'ip_address' => $ip,
                'device' => $device,
                'visitor' => 1,
                'page_id' => $page->id
            ]);
            $page->update(['views' => $page->views + 1]);
        }
        return view('visitors.pages.template', compact('page'));
    }
}
