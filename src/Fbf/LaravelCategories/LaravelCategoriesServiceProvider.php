<?php namespace Fbf\LaravelCategories;

use Illuminate\Support\ServiceProvider;

class LaravelCategoriesServiceProvider extends ServiceProvider {

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
		$this->package('fbf/laravel-categories');

		\App::register('Baum\BaumServiceProvider');
		\App::register('Cviebrock\EloquentSluggable\SluggableServiceProvider');

		// Shortcut so developers don't need to add an Alias in app/config/app.php
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Sluggable', 'Cviebrock\EloquentSluggable\Facades\Sluggable');
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}