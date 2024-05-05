<?php

namespace HalilCosdu\SignalWire;

use Illuminate\Support\Facades\Http;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SignalWireServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-signalwire')
            ->hasConfigFile()
            ->publishesServiceProvider(SignalWireServiceProvider::class);
    }

    public function packageRegistered(): void
    {
        Http::macro('signalWire', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])
                ->withBasicAuth(config('signalwire.project_id'), config('signalwire.token'))
                ->baseUrl(sprintf('%s%s%s%s',
                    'https://', config('signalwire.space_url'), '/api/laml/2010-04-01/Accounts/', config('signalwire.project_id')
                ));
        });
    }
}
