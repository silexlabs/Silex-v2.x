<?php

class cocktail_port_platform_touch_AbstractTouchListener {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::new");
		$製pos = $GLOBALS['%s']->length;
		$this->setNativeListeners();
		$GLOBALS['%s']->pop();
	}}
	public function getTouchEvent($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::getTouchEvent");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return null;
		}
		$GLOBALS['%s']->pop();
	}
	public function removeNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::removeNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function setNativeListeners() {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::setNativeListeners");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public function onNativeTouchMove($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::onNativeTouchMove");
		$製pos = $GLOBALS['%s']->length;
		if($this->onTouchMove !== null) {
			$this->onTouchMove($this->getTouchEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeTouchEnd($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::onNativeTouchEnd");
		$製pos = $GLOBALS['%s']->length;
		if($this->onTouchEnd !== null) {
			$this->onTouchEnd($this->getTouchEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public function onNativeTouchStart($event) {
		$GLOBALS['%s']->push("cocktail.port.platform.touch.AbstractTouchListener::onNativeTouchStart");
		$製pos = $GLOBALS['%s']->length;
		if($this->onTouchStart !== null) {
			$this->onTouchStart($this->getTouchEvent($event));
		}
		$GLOBALS['%s']->pop();
	}
	public $onTouchMove;
	public $onTouchEnd;
	public $onTouchStart;
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
	function __toString() { return 'cocktail.port.platform.touch.AbstractTouchListener'; }
}
