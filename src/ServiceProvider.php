<?php

namespace Yarob\LaravelExpirable;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([ __DIR__ . '/../resources/config/expirable.php' => config_path('expirable.php')], 'config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__ . '/../resources/config/expirable.php', 'expirable');

		$this->app->singleton(Expirable::class, function ($app) {
			//return new HasSettingsObserver(new ModelSettingsService(), $app['events']);
		});
	}
}