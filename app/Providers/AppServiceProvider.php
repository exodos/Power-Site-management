<?php

namespace App\Providers;

use App\Charts\SampleChart;
use App\Observers\SiteObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use App\Models\Site;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @param Charts $charts
     * @return void
     */

//    public function boot(Charts $charts)

    public function boot()
    {
        Paginator::useBootstrap();

//        Validator::extend('allowed_domain', function($attribute, $value, $parameters, $validator) {
//            return in_array(explode('@', $value)[1], $this->allowedDomains);
//        }, 'Domain not valid for registration.');


        Validator::extend('allowed_domain', function ($attribute, $value, $parameters, $validator) {
            $allowedEmailDomains = ['ethiotelecom.et', 'sub.ethiotelecom.et'];
            return in_array(explode('@', $value)[1], $allowedEmailDomains);
        }, 'Registration Allowed Only With EthioTelecom Email Address !! Please Use EthioTelecom Email To Register');

//        $charts->register([
//            SampleChart::class
//        ]);

//        Site::observe(SiteObserver::class);
    }
}
