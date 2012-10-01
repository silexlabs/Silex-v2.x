<?php

class cocktail_core_dom_NamedNodeMap {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->_nodes = new _hx_array(array());
		$this->_nodesHash = new Hash();
	}}
	public function get_length() {
		return $this->_nodes->length;
	}
	public function item($index) {
		if($index > $this->get_length() - 1) {
			return null;
		} else {
			return $this->_nodes[$index];
		}
	}
	public function removeNamedItem($name) {
		$removedNode = $this->getNamedItem($name);
		if($removedNode === null) {
			return null;
		}
		$this->_nodesHash->remove($name);
		$newNodes = new _hx_array(array());
		{
			$_g1 = 0; $_g = $this->get_length();
			while($_g1 < $_g) {
				$i = $_g1++;
				if($this->_nodes[$i] !== $removedNode) {
					$newNodes->push($this->_nodes[$i]);
				}
				unset($i);
			}
		}
		$this->_nodes = $newNodes;
		return $removedNode;
	}
	public function setNamedItem($arg) {
		$replacedNode = $this->getNamedItem($arg->get_nodeName());
		if($replacedNode !== null) {
			$_g1 = 0; $_g = $this->get_length();
			while($_g1 < $_g) {
				$i = $_g1++;
				if($this->_nodes[$i] === $replacedNode) {
					$this->_nodes[$i] = $arg;
					return $replacedNode;
				}
				unset($i);
			}
		} else {
			$this->_nodes->push($arg);
		}
		$this->_nodesHash->set($arg->get_nodeName(), $arg);
		return $replacedNode;
	}
	public function getNamedItem($name) {
		return $this->_nodesHash->get($name);
	}
	public $length;
	public $_nodesHash;
	public $_nodes;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->�dynamics[$m]) && is_callable($this->�dynamics[$m]))
			return call_user_func_array($this->�dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("get_length" => "get_length");
	function __toString() { return 'cocktail.core.dom.NamedNodeMap'; }
}
