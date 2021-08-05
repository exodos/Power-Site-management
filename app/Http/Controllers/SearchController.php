<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function search()
    {
        $configuration = request()->query('ps_configuration');
        $regionZone = request()->input('sites_region_zone');
        $politicalRegion = request()->input('sites_political_region');
        $generatorType = request()->input('generator_type');
        $generatorCapacity = request()->input('generator_capacity');
        $tankerCapacity = request()->input('fuel_tanker_capacity');


        $searchResults = DB::table('sites')
            ->where('sites.ps_configuration', '=', "{$configuration}")
            ->where('sites.sites_region_zone', '=', "{$regionZone}")
            ->where('sites.sites_political_region', '=', "{$politicalRegion}")
            ->join('powers', 'sites.id', '=', 'powers.site_id')
            ->where('powers.generator_type', '=', "{$generatorType}")
            ->where('powers.generator_capacity', '=', "{$generatorCapacity}")
            ->where('powers.fuel_tanker_capacity', '<=', "{$tankerCapacity}")
            ->get();


        return view('searches.search', compact('searchResults'));
    }
}
