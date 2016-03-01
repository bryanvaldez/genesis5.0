<?php namespace genesis50\Components;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Routing\UrlGenerator as Url;
use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;



class HtmlBuilder extends CollectiveHtmlBuilder{

	protected $config;
	protected $view;
	protected $url;

	public function __construct(Config $config,  View $view,  Url $url)
	{
		$this->config 	= $config; 
		$this->view 	= $view;
		$this->url 		= $url;
	}

	public function menu($items)
	{
		if( ! is_array($items))
		{
			$items = $this->config->get($items, array());
		}
		return $this->view->make('partials/menu', compact('items'));
	}

	public function classes(array $classes)
	{
		$html = '';
		foreach ($classes as $name => $bool){
			if(is_int($name)){
				$name = $bool; 
				$bool = true;
			}
			if($bool){
				$html .= $name.' ';
			}
		}
		if(! empty($html)){
			return ' class="'.trim($html).'" ';
		}
		return '';
	}


}