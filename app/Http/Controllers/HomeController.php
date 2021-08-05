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


        $NWRCount = Site::query()
            ->where('sites_region_zone', '=', 'NWR')
            ->sum('number_of_generator');
        $SWWRCount = Site::query()
            ->where('sites_region_zone', '=', 'SWWR')
            ->sum('number_of_generator');
        $NEERCount = Site::query()
            ->where('sites_region_zone', '=', 'NEER')
            ->sum('number_of_generator');
        $CNRCount = Site::query()
            ->where('sites_region_zone', '=', 'CNR')
            ->sum('number_of_generator');
        $CWRCount = Site::query()
            ->where('sites_region_zone', '=', 'CWR')
            ->sum('number_of_generator');
        $NERCount = Site::query()
            ->where('sites_region_zone', '=', 'NER')
            ->sum('number_of_generator');
        $CERCount = Site::query()
            ->where('sites_region_zone', '=', 'CER')
            ->sum('number_of_generator');
        $ERCount = Site::query()
            ->where('sites_region_zone', '=', 'ER')
            ->sum('number_of_generator');
        $EERCount = Site::query()
            ->where('sites_region_zone', '=', 'EER')
            ->sum('number_of_generator');
        $SSWRCount = Site::query()
            ->where('sites_region_zone', '=', 'SSWR')
            ->sum('number_of_generator');
        $NNWRCount = Site::query()
            ->where('sites_region_zone', '=', 'NNWR')
            ->sum('number_of_generator');
        $SRCount = Site::query()
            ->where('sites_region_zone', '=', 'SR')
            ->sum('number_of_generator');
        $SERCount = Site::query()
            ->where('sites_region_zone', '=', 'SER')
            ->sum('number_of_generator');
        $WRCount = Site::query()
            ->where('sites_region_zone', '=', 'WR')
            ->sum('number_of_generator');
        $SWRCount = Site::query()
            ->where('sites_region_zone', '=', 'SWR')
            ->sum('number_of_generator');
        $WWRCount = Site::query()
            ->where('sites_region_zone', '=', 'WWR')
            ->sum('number_of_generator');
        $NRCount = Site::query()
            ->where('sites_region_zone', '=', 'NR')
            ->sum('number_of_generator');
        $CAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'CAAZ')
            ->sum('number_of_generator');
        $WAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'WAAZ')
            ->sum('number_of_generator');
        $SWAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'SWAAZ')
            ->sum('number_of_generator');
        $NAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'NAAZ')
            ->sum('number_of_generator');
        $EAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'EAAZ')
            ->sum('number_of_generator');
        $SAAZCount = Site::query()
            ->where('sites_region_zone', '=', 'SAAZ')
            ->sum('number_of_generator');

        $chartNumberGenerator = new HomeChart();
        $chartNumberGenerator->labels(['NWR', 'SWWR', 'NEER', 'CNR', 'CWR', 'NER', 'CER', 'ER', 'EER', 'SSWR', 'NNWR', 'SR', 'SER', 'WR', 'SWR', 'WWR', 'NR', 'CAAZ', 'WAAZ', 'SWAAZ', 'NAAZ', 'EAAZ', 'SAAZ']);
        $chartNumberGenerator->dataset('Number Of Generators', 'line', [$NWRCount, $SWWRCount, $NEERCount, $CNRCount, $CWRCount, $NERCount, $CERCount, $ERCount, $EERCount, $SSWRCount, $NNWRCount, $SRCount, $SERCount, $WRCount, $SWRCount, $WWRCount, $NRCount, $CAAZCount, $WAAZCount, $SWAAZCount, $NAAZCount, $EAAZCount, $SAAZCount])
            ->options([
                'borderColor' => 'rgb(75, 192, 192)',
                'fill' => 'false',
                'tension' => '0.1',
            ]);

        $chart = new HomeChart;
        $chart->labels(['Mains Only', 'Mains + DG', 'Dual DG', 'Dual BB', 'Solar Hybrid', 'Pure Solar']);
        $chart->dataset('Power Source', 'doughnut', [$mainsOnly, $mainsDG, $dualDG, $dGBB, $solarHybrid, $pureSolar])
            ->options([
                'hoverOffset'=>'4',
                'backgroundColor'=>['blue', 'orange', 'red', 'lime', 'yellow', 'green']
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
        $chartRegion->dataset('NER', 'bar', [$NERMainOnly, $NERMainDg, $NERDualDg, $NERDgBB, $NERSolarHybrid])
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
