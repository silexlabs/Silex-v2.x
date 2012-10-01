<?php

class cocktail_plugin_Plugin {
	public function __construct($elementAttributes, $params, $loadComplete, $loadError) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::new");
		$製pos = $GLOBALS['%s']->length;
		$this->set_viewport(new cocktail_core_geom_RectangleVO(0.0, 0.0, 0.0, 0.0));
		$this->_loadComplete = $loadComplete;
		$this->_loadError = $loadError;
		$this->_elementAttributes = $elementAttributes;
		$this->_params = $params;
		$GLOBALS['%s']->pop();
	}}
	public function set_viewport($value) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::set_viewport");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->viewport = $value;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_viewport() {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::get_viewport");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->viewport;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function detach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::detach");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function attach($graphicsContext) {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::attach");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function dispose() {
		$GLOBALS['%s']->push("cocktail.plugin.Plugin::dispose");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $_params;
	public $_elementAttributes;
	public $_loadError;
	public $_loadComplete;
	public $viewport;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("set_viewport" => "set_viewport","get_viewport" => "get_viewport");
	function __toString() { return 'cocktail.plugin.Plugin'; }
}
