<?php

namespace App\Http\Controllers;

use App\Charts\HomeChart;
use App\Models\Site;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $mainsOnly = Site::query()
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $mainsDG = Site::query()
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $dualDG = Site::query()
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $dGBB = Site::query()
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $solarHybrid = Site::query()
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $pureSolar = Site::query()
            ->where('ps_configuration', '=', 'Pure Solar')->count();

//        With Region

        $NWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $SWWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SWWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SWWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SWWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SWWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SWWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $NEERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NEERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NEERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NEERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NEERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NEERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $CNRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $CNRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $CNRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $CNRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $CNRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $CNRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $CWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $CWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $CWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $CWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $CWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $CWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $NERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $CERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $CERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $CERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $CERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $CERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $CERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $ERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $ERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $ERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $ERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $ERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $ERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $EERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $EERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $EERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $EERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $EERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $EERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $SSWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SSWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SSWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SSWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SSWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SSWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $NNWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NNWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NNWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NNWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NNWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NNWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $SRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $SERMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SERMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SERDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SERDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SERSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SERPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $WRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $WRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $WRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $WRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $WRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $WRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $SWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $WWRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $WWRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $WWRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $WWRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $WWRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $WWRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $NRMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NRMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NRDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NRDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NRSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NRPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->where('ps_configuration', '=', 'Pure Solar')->count();


        $CAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $CAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $CAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $CAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $CAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $CAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $WAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $WAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $WAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $WAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $WAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $WAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $SWAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SWAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SWAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SWAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SWAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SWAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $NAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $NAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $NAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $NAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $NAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $NAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $EAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $EAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $EAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $EAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $EAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $EAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

        $SAAZMainOnly = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'Mains Only')->count();
        $SAAZMainDg = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'Mains + DG')->count();
        $SAAZDualDg = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'Dual DG')->count();
        $SAAZDgBB = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'DG + BB')->count();
        $SAAZSolarHybrid = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'Solar Hybrid')->count();
        $SAAZPureSolar = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->where('ps_configuration', '=', 'Pure Solar')->count();

//        Generators
        $NWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_generator');
        $SWWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_generator');
        $NEERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_generator');
        $CNRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_generator');
        $CWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_generator');
        $NERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_generator');
        $CERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_generator');
        $ERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_generator');
        $EERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_generator');
        $SSWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_generator');
        $NNWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_generator');
        $SRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_generator');
        $SERGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_generator');
        $WRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_generator');
        $SWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_generator');
        $WWRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_generator');
        $NRGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_generator');
        $CAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_generator');
        $WAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_generator');
        $SWAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_generator');
        $NAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_generator');
        $EAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_generator');
        $SAAZGeneratorCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_generator');


//        AirConditioner
        $NWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_airconditioners');
        $SWWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_airconditioners');
        $NEERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_airconditioners');
        $CNRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_airconditioners');
        $CWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_airconditioners');
        $NERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_airconditioners');
        $CERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_airconditioners');
        $ERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_airconditioners');
        $EERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_airconditioners');
        $SSWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_airconditioners');
        $NNWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_airconditioners');
        $SRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_airconditioners');
        $SERAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_airconditioners');
        $WRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_airconditioners');
        $SWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_airconditioners');
        $WWRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_airconditioners');
        $NRAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_airconditioners');
        $CAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_airconditioners');
        $WAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_airconditioners');
        $SWAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_airconditioners');
        $NAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_airconditioners');
        $EAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_airconditioners');
        $SAAZAirConditionerCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_airconditioners');


//        Towers
        $NWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_towers');
        $SWWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_towers');
        $NEERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_towers');
        $CNRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_towers');
        $CWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_towers');
        $NERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_towers');
        $CERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_towers');
        $ERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_towers');
        $EERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_towers');
        $SSWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_towers');
        $NNWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_towers');
        $SRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_towers');
        $SERTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_towers');
        $WRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_towers');
        $SWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_towers');
        $WWRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_towers');
        $NRTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_towers');
        $CAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_towers');
        $WAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_towers');
        $SWAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_towers');
        $NAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_towers');
        $EAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_towers');
        $SAAZTowerCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_towers');


//        Rectifiers
        $NWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_Rectifiers');
        $SWWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_Rectifiers');
        $NEERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_Rectifiers');
        $CNRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_Rectifiers');
        $CWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_Rectifiers');
        $NERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_Rectifiers');
        $CERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_Rectifiers');
        $ERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_Rectifiers');
        $EERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_Rectifiers');
        $SSWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_Rectifiers');
        $NNWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_Rectifiers');
        $SRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_Rectifiers');
        $SERRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_Rectifiers');
        $WRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_Rectifiers');
        $SWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_Rectifiers');
        $WWRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_Rectifiers');
        $NRRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_Rectifiers');
        $CAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_Rectifiers');
        $WAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_Rectifiers');
        $SWAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_Rectifiers');
        $NAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_Rectifiers');
        $EAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_Rectifiers');
        $SAAZRectifierCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_Rectifiers');



//        SolarSystem
        $NWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_solar_system');
        $SWWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_solar_system');
        $NEERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_solar_system');
        $CNRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_solar_system');
        $CWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_solar_system');
        $NERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_solar_system');
        $CERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_solar_system');
        $ERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_solar_system');
        $EERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_solar_system');
        $SSWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_solar_system');
        $NNWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_solar_system');
        $SRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_solar_system');
        $SERSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_solar_system');
        $WRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_solar_system');
        $SWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_solar_system');
        $WWRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_solar_system');
        $NRSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_solar_system');
        $CAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_solar_system');
        $WAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_solar_system');
        $SWAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_solar_system');
        $NAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_solar_system');
        $EAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_solar_system');
        $SAAZSolarSystemCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_solar_system');


//        DownLinks
        $NWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_down_links');
        $SWWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_down_links');
        $NEERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_down_links');
        $CNRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_down_links');
        $CWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_down_links');
        $NERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_down_links');
        $CERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_down_links');
        $ERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_down_links');
        $EERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_down_links');
        $SSWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_down_links');
        $NNWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_down_links');
        $SRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_down_links');
        $SERDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_down_links');
        $WRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_down_links');
        $SWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_down_links');
        $WWRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_down_links');
        $NRDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_down_links');
        $CAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_down_links');
        $WAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_down_links');
        $SWAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_down_links');
        $NAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_down_links');
        $EAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_down_links');
        $SAAZDownLinksCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_down_links');


        $chartNumberGenerator = new HomeChart();
        $chartNumberGenerator->labels(['NWR', 'SWWR', 'NEER', 'CNR', 'CWR', 'NER', 'CER', 'ER', 'EER', 'SSWR', 'NNWR', 'SR', 'SER', 'WR', 'SWR', 'WWR', 'NR', 'CAAZ', 'WAAZ', 'SWAAZ', 'NAAZ', 'EAAZ', 'SAAZ']);
        $chartNumberGenerator->dataset('Number Of Generators', 'line', [$NWRGeneratorCount, $SWWRGeneratorCount, $NEERGeneratorCount, $CNRGeneratorCount, $CWRGeneratorCount, $NERGeneratorCount, $CERGeneratorCount, $ERGeneratorCount, $EERGeneratorCount, $SSWRGeneratorCount, $NNWRGeneratorCount, $SRGeneratorCount, $SERGeneratorCount, $WRGeneratorCount, $SWRGeneratorCount, $WWRGeneratorCount, $NRGeneratorCount, $CAAZGeneratorCount, $WAAZGeneratorCount, $SWAAZGeneratorCount, $NAAZGeneratorCount, $EAAZGeneratorCount, $SAAZGeneratorCount])
            ->options([
                'borderColor' => 'blue',
                'fill' => 'false',
                'tension' => '0.1',
            ]);
        $chartNumberGenerator->dataset('Number Of Air Conditioners', 'line', [$NWRAirConditionerCount, $SWWRAirConditionerCount, $NEERAirConditionerCount, $CNRAirConditionerCount, $CWRAirConditionerCount, $NERAirConditionerCount, $CERAirConditionerCount, $ERAirConditionerCount, $EERAirConditionerCount, $SSWRAirConditionerCount, $NNWRAirConditionerCount, $SRAirConditionerCount, $SERAirConditionerCount, $WRAirConditionerCount, $SWRAirConditionerCount, $WWRAirConditionerCount, $NRAirConditionerCount, $CAAZAirConditionerCount, $WAAZAirConditionerCount, $SWAAZAirConditionerCount, $NAAZAirConditionerCount, $EAAZAirConditionerCount, $SAAZAirConditionerCount])
            ->options([
                'borderColor' => 'orange',
                'fill' => 'false',
                'tension' => '0.1',
            ]);

        $chartNumberGenerator->dataset('Number Of Towers', 'line', [$NWRTowerCount, $SWWRTowerCount, $NEERTowerCount, $CNRTowerCount, $CWRTowerCount, $NERTowerCount, $CERTowerCount, $ERTowerCount, $EERTowerCount, $SSWRTowerCount, $NNWRTowerCount, $SRTowerCount, $SERTowerCount, $WRTowerCount, $SWRTowerCount, $WWRTowerCount, $NRTowerCount, $CAAZTowerCount, $WAAZTowerCount, $SWAAZTowerCount, $NAAZTowerCount, $EAAZTowerCount, $SAAZTowerCount])
            ->options([
                'borderColor' => 'red',
                'fill' => 'false',
                'tension' => '0.1',
            ]);

        $chartNumberGenerator->dataset('Number Of Rectifiers', 'line', [$NWRRectifierCount, $SWWRRectifierCount, $NEERRectifierCount, $CNRRectifierCount, $CWRRectifierCount, $NERRectifierCount, $CERRectifierCount, $ERRectifierCount, $EERRectifierCount, $SSWRRectifierCount, $NNWRRectifierCount, $SRRectifierCount, $SERRectifierCount, $WRRectifierCount, $SWRRectifierCount, $WWRRectifierCount, $NRRectifierCount, $CAAZRectifierCount, $WAAZRectifierCount, $SWAAZRectifierCount, $NAAZRectifierCount, $EAAZRectifierCount, $SAAZRectifierCount])
            ->options([
                'borderColor' => 'lime',
                'fill' => 'false',
                'tension' => '0.1',
            ]);

        $chartNumberGenerator->dataset('Number Of Solar System', 'line', [$NWRSolarSystemCount, $SWWRSolarSystemCount, $NEERSolarSystemCount, $CNRSolarSystemCount, $CWRSolarSystemCount, $NERSolarSystemCount, $CERSolarSystemCount, $ERSolarSystemCount, $EERSolarSystemCount, $SSWRSolarSystemCount, $NNWRSolarSystemCount, $SRSolarSystemCount, $SERSolarSystemCount, $WRSolarSystemCount, $SWRSolarSystemCount, $WWRSolarSystemCount, $NRSolarSystemCount, $CAAZSolarSystemCount, $WAAZSolarSystemCount, $SWAAZSolarSystemCount, $NAAZSolarSystemCount, $EAAZSolarSystemCount, $SAAZSolarSystemCount])
            ->options([
                'borderColor' => 'yellow',
                'fill' => 'false',
                'tension' => '0.1',
            ]);


        $chartNumberGenerator->dataset('Number Of Down Links', 'line', [$NWRDownLinksCount, $SWWRDownLinksCount, $NEERDownLinksCount, $CNRDownLinksCount, $CWRDownLinksCount, $NERDownLinksCount, $CERDownLinksCount, $ERDownLinksCount, $EERDownLinksCount, $SSWRDownLinksCount, $NNWRDownLinksCount, $SRDownLinksCount, $SERDownLinksCount, $WRDownLinksCount, $SWRDownLinksCount, $WWRDownLinksCount, $NRDownLinksCount, $CAAZDownLinksCount, $WAAZDownLinksCount, $SWAAZDownLinksCount, $NAAZDownLinksCount, $EAAZDownLinksCount, $SAAZDownLinksCount])
            ->options([
                'borderColor' => 'green',
                'fill' => 'false',
                'tension' => '0.1',
            ]);


        $chart = new HomeChart;
        $chart->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chart->dataset('Power Source', 'doughnut', [$mainsOnly, $mainsDG, $dualDG, $dGBB, $solarHybrid, $pureSolar])
            ->options([
                'hoverOffset' => '4',
                'backgroundColor' => ['blue', 'orange', 'red', 'lime', 'yellow', 'green']
            ]);

        $chartRegion = new HomeChart();
        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NWR', 'bar', [$NWRMainOnly, $NWRMainDg, $NWRDualDg, $NWRDgBB, $NWRSolarHybrid, $NWRPureSolar])
            ->backgroundColor('blue');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SWWR', 'bar', [$SWWRMainOnly, $SWWRMainDg, $SWWRDualDg, $SWWRDgBB, $SWWRSolarHybrid, $SWWRPureSolar])
            ->backgroundColor('orange');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('CNR', 'bar', [$CNRMainOnly, $CNRMainDg, $CNRDualDg, $CNRDgBB, $CNRDgBB, $CNRSolarHybrid, $CNRPureSolar])
            ->backgroundColor('red');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NEER', 'bar', [$NEERMainOnly, $NEERMainDg, $NEERDualDg, $NEERDgBB, $NEERSolarHybrid, $NEERPureSolar])
            ->backgroundColor('#E8ADAA');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('CWR', 'bar', [$CWRMainOnly, $CWRMainDg, $CWRDualDg, $CWRDgBB, $CWRSolarHybrid, $CWRPureSolar])
            ->backgroundColor('lime');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NER', 'bar', [$NERMainOnly, $NERMainDg, $NERDualDg, $NERDgBB, $NERSolarHybrid, $NERPureSolar])
            ->backgroundColor('#EDC9AF');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('CER', 'bar', [$CERMainOnly, $CERMainDg, $CERDualDg, $CERDgBB, $CERSolarHybrid, $CERPureSolar])
            ->backgroundColor('yellow');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('ER', 'bar', [$ERMainOnly, $ERMainDg, $ERDualDg, $ERDgBB, $ERSolarHybrid, $ERPureSolar])
            ->backgroundColor('green');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('EER', 'bar', [$EERMainOnly, $EERMainDg, $EERDualDg, $EERDgBB, $EERSolarHybrid, $EERPureSolar])
            ->backgroundColor('cyan');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SSW', 'bar', [$SSWRMainOnly, $SSWRMainDg, $SSWRDualDg, $SSWRDgBB, $SSWRSolarHybrid, $SSWRPureSolar])
            ->backgroundColor('darkblue');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NNWR', 'bar', [$NNWRMainOnly, $NNWRMainDg, $NNWRDualDg, $NNWRDgBB, $NNWRSolarHybrid, $NNWRPureSolar])
            ->backgroundColor('lightblue');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SSR', 'bar', [$SRMainOnly, $SRMainDg, $SRDualDg, $SRDgBB, $SRSolarHybrid, $SRPureSolar])
            ->backgroundColor('purple');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SSE', 'bar', [$SERMainOnly, $SERMainDg, $SERDualDg, $SERDgBB, $SERSolarHybrid, $SERPureSolar])
            ->backgroundColor('magenta');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('WR', 'bar', [$WRMainOnly, $WRMainDg, $WRDualDg, $WRDgBB, $WRSolarHybrid, $WRPureSolar])
            ->backgroundColor('grey');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SWR', 'bar', [$SWRMainOnly, $SWRMainDg, $SWRDualDg, $SWRDgBB, $SWRSolarHybrid, $SWRPureSolar])
            ->backgroundColor('black');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('WWR', 'bar', [$WWRMainOnly, $WWRMainDg, $WWRDualDg, $WWRDgBB, $WWRSolarHybrid, $WWRPureSolar])
            ->backgroundColor('brown');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NR', 'bar', [$NRMainOnly, $NRMainDg, $NRDualDg, $NRDgBB, $NRSolarHybrid, $NRPureSolar])
            ->backgroundColor('olive');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('CAAZ', 'bar', [$CAAZMainOnly, $CAAZMainDg, $CAAZDualDg, $CAAZDgBB, $CAAZSolarHybrid, $CAAZPureSolar])
            ->backgroundColor('maroon');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('WAAZ', 'bar', [$WAAZMainOnly, $WAAZMainDg, $WAAZDualDg, $WAAZDgBB, $WAAZSolarHybrid, $WAAZPureSolar])
            ->backgroundColor('#FFF380');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SWAAZ', 'bar', [$SWAAZMainOnly, $SWAAZMainDg, $SWAAZDualDg, $SWAAZDgBB, $SWAAZSolarHybrid, $SWAAZPureSolar])
            ->backgroundColor('#CCFB5D');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('NAAZ', 'bar', [$NAAZMainOnly, $NAAZMainDg, $NAAZDualDg, $NAAZDgBB, $NAAZSolarHybrid, $NAAZPureSolar])
            ->backgroundColor('#FFCBA4');


        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('EAAZ', 'bar', [$EAAZMainOnly, $EAAZMainDg, $EAAZDualDg, $EAAZDgBB, $EAAZSolarHybrid, $EAAZPureSolar])
            ->backgroundColor('#614051');

        $chartRegion->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chartRegion->dataset('SAAZ', 'bar', [$SAAZMainOnly, $SAAZMainDg, $SAAZDualDg, $SAAZDgBB, $SAAZSolarHybrid, $SAAZPureSolar])
            ->backgroundColor('#893BFF');


        return view('home', compact('chart', 'chartRegion', 'chartNumberGenerator'));
    }
}
