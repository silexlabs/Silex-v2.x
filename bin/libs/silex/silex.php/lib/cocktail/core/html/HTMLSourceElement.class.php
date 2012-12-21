<?php

class cocktail_core_html_HTMLSourceElement extends cocktail_core_html_HTMLElement {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct("SOURCE");
		$GLOBALS['%s']->pop();
	}}
	public function set_media($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::set_media");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("media", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_media() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::get_media");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("media");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_type($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::set_type");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("type", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_type() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::get_type");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("type");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function set_src($value) {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::set_src");
		$製pos = $GLOBALS['%s']->length;
		$this->setAttribute("src", $value);
		{
			$GLOBALS['%s']->pop();
			return $value;
		}
		$GLOBALS['%s']->pop();
	}
	public function get_src() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::get_src");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->getAttribute("src");
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function isVoidElement() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::isVoidElement");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function createElementRenderer() {
		$GLOBALS['%s']->push("cocktail.core.html.HTMLSourceElement::createElementRenderer");
		$製pos = $GLOBALS['%s']->length;
		$GLOBALS['%s']->pop();
	}
	public $media;
	public $type;
	public $src;
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
	static $__properties__ = array("set_src" => "set_src","get_src" => "get_src","set_type" => "set_type","get_type" => "get_type","set_media" => "set_media","get_media" => "get_media","set_tabIndex" => "set_tabIndex","get_tabIndex" => "get_tabIndex","set_id" => "set_id","get_id" => "get_id","set_className" => "set_className","get_className" => "get_className","set_hidden" => "set_hidden","get_hidden" => "get_hidden","set_scrollTop" => "set_scrollTop","get_scrollTop" => "get_scrollTop","set_scrollLeft" => "set_scrollLeft","get_scrollLeft" => "get_scrollLeft","get_scrollHeight" => "get_scrollHeight","get_scrollWidth" => "get_scrollWidth","set_innerHTML" => "set_innerHTML","get_innerHTML" => "get_innerHTML","set_outerHTML" => "set_outerHTML","get_outerHTML" => "get_outerHTML","get_offsetParent" => "get_offsetParent","get_offsetWidth" => "get_offsetWidth","get_offsetHeight" => "get_offsetHeight","get_offsetLeft" => "get_offsetLeft","get_offsetTop" => "get_offsetTop","get_clientWidth" => "get_clientWidth","get_clientHeight" => "get_clientHeight","get_clientLeft" => "get_clientLeft","get_clientTop" => "get_clientTop","get_attachedToDOM" => "get_attachedToDOM","get_firstElementChild" => "get_firstElementChild","get_lastElementChild" => "get_lastElementChild","get_previousElementSibling" => "get_previousElementSibling","get_nextElementSibling" => "get_nextElementSibling","get_childElementCount" => "get_childElementCount","get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","get_nodeType" => "get_nodeType","set_nodeValue" => "set_nodeValue","get_nodeValue" => "get_nodeValue","get_nodeName" => "get_nodeName","set_ownerDocument" => "set_ownerDocument","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd","set_onpopstate" => "set_onPopState");
	function __toString() { return 'cocktail.core.html.HTMLSourceElement'; }
}
