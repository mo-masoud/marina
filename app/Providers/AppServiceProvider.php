<?php

namespace App\Providers;

use App\ArrayField;
use App\HejryDateCustomfield;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
        Voyager::addAction(\App\Actions\ViewOrder::class);

	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Voyager::addFormField(ArrayField::class);
		Voyager::addFormField(HejryDateCustomfield::class);
		Schema::defaultStringLength(191);
		Schema::enableForeignKeyConstraints();





        \View::composer('booking.contract.printShow', function ($view) {
            $view->with('setting', \App\Models\Setting::all());

        });

    }
}
