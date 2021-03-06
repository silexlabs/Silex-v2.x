<?php

class HList implements IteratorAggregate{
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("List::new");
		$製pos = $GLOBALS['%s']->length;
		$this->length = 0;
		$GLOBALS['%s']->pop();
	}}
	public function getIterator() {
		$GLOBALS['%s']->push("List::getIterator");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->iterator();
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function map($f) {
		$GLOBALS['%s']->push("List::map");
		$製pos = $GLOBALS['%s']->length;
		$b = new HList();
		$l = $this->h;
		while($l !== null) {
			$v = $l[0];
			$l = $l[1];
			$b->add(call_user_func_array($f, array($v)));
			unset($v);
		}
		{
			$GLOBALS['%s']->pop();
			return $b;
		}
		$GLOBALS['%s']->pop();
	}
	public function filter($f) {
		$GLOBALS['%s']->push("List::filter");
		$製pos = $GLOBALS['%s']->length;
		$l2 = new HList();
		$l = $this->h;
		while($l !== null) {
			$v = $l[0];
			$l = $l[1];
			if(call_user_func_array($f, array($v))) {
				$l2->add($v);
			}
			unset($v);
		}
		{
			$GLOBALS['%s']->pop();
			return $l2;
		}
		$GLOBALS['%s']->pop();
	}
	public function join($sep) {
		$GLOBALS['%s']->push("List::join");
		$製pos = $GLOBALS['%s']->length;
		$s = "";
		$first = true;
		$l = $this->h;
		while($l !== null) {
			if($first) {
				$first = false;
			} else {
				$s .= $sep;
			}
			$s .= Std::string($l[0]);
			$l = $l[1];
		}
		{
			$GLOBALS['%s']->pop();
			return $s;
		}
		$GLOBALS['%s']->pop();
	}
	public function toString() {
		$GLOBALS['%s']->push("List::toString");
		$製pos = $GLOBALS['%s']->length;
		$s = "";
		$first = true;
		$l = $this->h;
		while($l !== null) {
			if($first) {
				$first = false;
			} else {
				$s .= ", ";
			}
			$s .= Std::string($l[0]);
			$l = $l[1];
		}
		{
			$裨mp = "{" . $s . "}";
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function iterator() {
		$GLOBALS['%s']->push("List::iterator");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = new _hx_list_iterator($this);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function remove($v) {
		$GLOBALS['%s']->push("List::remove");
		$製pos = $GLOBALS['%s']->length;
		$prev = null;
		$l = & $this->h;
		while($l !== null) {
			if($l[0] === $v) {
				if($prev === null) {
					$this->h =& $l[1];
				} else {
					$prev[1] =& $l[1];
				}
				if(($this->q === $l)) {
					$this->q =& $prev;
				}
				$this->length--;
				{
					$GLOBALS['%s']->pop();
					return true;
				}
			}
			$prev =& $l;
			$l =& $l[1];
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function clear() {
		$GLOBALS['%s']->push("List::clear");
		$製pos = $GLOBALS['%s']->length;
		$this->h = null;
		$this->q = null;
		$this->length = 0;
		$GLOBALS['%s']->pop();
	}
	public function isEmpty() {
		$GLOBALS['%s']->push("List::isEmpty");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $this->h === null;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function pop() {
		$GLOBALS['%s']->push("List::pop");
		$製pos = $GLOBALS['%s']->length;
		if($this->h === null) {
			$GLOBALS['%s']->pop();
			return null;
		}
		$x = $this->h[0];
		$this->h = $this->h[1];
		if($this->h === null) {
			$this->q = null;
		}
		$this->length--;
		{
			$GLOBALS['%s']->pop();
			return $x;
		}
		$GLOBALS['%s']->pop();
	}
	public function last() {
		$GLOBALS['%s']->push("List::last");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = HList_0($this);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function first() {
		$GLOBALS['%s']->push("List::first");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = HList_1($this);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function push($item) {
		$GLOBALS['%s']->push("List::push");
		$製pos = $GLOBALS['%s']->length;
		$x = array($item, &$this->h);
		$this->h =& $x;
		if($this->q === null) {
			$this->q =& $x;
		}
		$this->length++;
		$GLOBALS['%s']->pop();
	}
	public function add($item) {
		$GLOBALS['%s']->push("List::add");
		$製pos = $GLOBALS['%s']->length;
		$x = array($item, null);
		if($this->h === null) {
			$this->h =& $x;
		} else {
			$this->q[1] =& $x;
		}
		$this->q =& $x;
		$this->length++;
		$GLOBALS['%s']->pop();
	}
	public $length;
	public $q;
	public $h;
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
	function __toString() { return $this->toString(); }
}
function HList_0(&$裨his) {
	$製pos = $GLOBALS['%s']->length;
	if($裨his->q === null) {
		return null;
	} else {
		return $裨his->q[0];
	}
}
function HList_1(&$裨his) {
	$製pos = $GLOBALS['%s']->length;
	if($裨his->h === null) {
		return null;
	} else {
		return $裨his->h[0];
	}
}
