<?php

namespace App\Providers;

use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\Configuration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us5'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    }
}
