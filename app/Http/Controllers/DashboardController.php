<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = Visitor::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('created_at')
            ->orderBy('created_at')
            ->get();
        $dates = collect(CarbonPeriod::create(Carbon::now()->firstOfMonth(), Carbon::now()->endOfMonth())->toArray())
            ->map(function($date) {
                return $date->format('d-m');
            })
            ->toArray();
        $curr_day_tracks = $visitors->filter(function($visitor) {
                return Carbon::now()->format('d-m-Y') === Carbon::parse($visitor->date)->format('d-m-Y');
            })->first();
        $tracks = [];
        $curr_month_year = Carbon::now()->format('Y-m');
        for($day = 0; $day < Carbon::now()->daysInMonth; $day++) {
            $visitor = $visitors->filter(function($visitor) use ($day, $curr_month_year) {
                return Carbon::parse($visitor->date)->eq(Carbon::parse("$curr_month_year-$day"));
            })->first();
            $tracks[] = $visitor ? $visitor->views : 0;
        }
        return inertia('Dashboard/Index', [
            'tracks' => $tracks,
            'dates' => $dates,
            'curr_month_tracks' => array_sum($tracks),
            'curr_day_tracks' => $curr_day_tracks ? $curr_day_tracks->views : 0
        ]);
    }
}
