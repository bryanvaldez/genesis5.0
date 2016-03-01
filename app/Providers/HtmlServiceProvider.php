<?php namespace genesis50\Providers;

use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use genesis50\Components\HtmlBuilder;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider
{

	/**
	 * Register the HTML builder instance.
	 *
	 * @return void
	 */
	protected function registerHtmlBuilder()
	{
		$this->app->bindShared('html', function($app)
		{
			return new HtmlBuilder($app['config'], $app['view'], $app['url']);
		});
	}
} 