<?php

class cocktail_plugin_swf_SWFPlugin extends cocktail_plugin_Plugin {
	public function __construct($elementAttributes, $params, $loadComplete, $loadError) { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.plugin.swf.SWFPlugin::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($elementAttributes,$params,$loadComplete,$loadError);
		$GLOBALS['%s']->pop();
	}}
	static $__properties__ = array("set_viewport" => "set_viewport","get_viewport" => "get_viewport");
	function __toString() { return 'cocktail.plugin.swf.SWFPlugin'; }
}
