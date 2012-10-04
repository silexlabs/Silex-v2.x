<?php

class sys_FileSystem {
	public function __construct(){}
	static function exists($path) {
		$GLOBALS['%s']->push("sys.FileSystem::exists");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = file_exists($path);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function rename($path, $newpath) {
		$GLOBALS['%s']->push("sys.FileSystem::rename");
		$�spos = $GLOBALS['%s']->length;
		rename($path, $newpath);
		$GLOBALS['%s']->pop();
	}
	static function stat($path) {
		$GLOBALS['%s']->push("sys.FileSystem::stat");
		$�spos = $GLOBALS['%s']->length;
		$fp = fopen($path, "r");
		$fstat = fstat($fp);
		fclose($fp);;
		{
			$�tmp = _hx_anonymous(array("gid" => $fstat['gid'], "uid" => $fstat['uid'], "atime" => Date::fromTime($fstat['atime'] * 1000), "mtime" => Date::fromTime($fstat['mtime'] * 1000), "ctime" => Date::fromTime($fstat['ctime'] * 1000), "dev" => $fstat['dev'], "ino" => $fstat['ino'], "nlink" => $fstat['nlink'], "rdev" => $fstat['rdev'], "size" => $fstat['size'], "mode" => $fstat['mode']));
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function fullPath($relpath) {
		$GLOBALS['%s']->push("sys.FileSystem::fullPath");
		$�spos = $GLOBALS['%s']->length;
		$p = realpath($relpath);
		if(($p === false)) {
			$GLOBALS['%s']->pop();
			return null;
		} else {
			$GLOBALS['%s']->pop();
			return $p;
		}
		$GLOBALS['%s']->pop();
	}
	static function kind($path) {
		$GLOBALS['%s']->push("sys.FileSystem::kind");
		$�spos = $GLOBALS['%s']->length;
		$k = filetype($path);
		switch($k) {
		case "file":{
			$�tmp = sys__FileSystem_FileKind::$kfile;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		case "dir":{
			$�tmp = sys__FileSystem_FileKind::$kdir;
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		default:{
			$�tmp = sys__FileSystem_FileKind::kother($k);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}break;
		}
		$GLOBALS['%s']->pop();
	}
	static function isDirectory($path) {
		$GLOBALS['%s']->push("sys.FileSystem::isDirectory");
		$�spos = $GLOBALS['%s']->length;
		{
			$�tmp = is_dir($path);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	static function createDirectory($path) {
		$GLOBALS['%s']->push("sys.FileSystem::createDirectory");
		$�spos = $GLOBALS['%s']->length;
		@mkdir($path, 493);
		$GLOBALS['%s']->pop();
	}
	static function deleteFile($path) {
		$GLOBALS['%s']->push("sys.FileSystem::deleteFile");
		$�spos = $GLOBALS['%s']->length;
		@unlink($path);
		$GLOBALS['%s']->pop();
	}
	static function deleteDirectory($path) {
		$GLOBALS['%s']->push("sys.FileSystem::deleteDirectory");
		$�spos = $GLOBALS['%s']->length;
		@rmdir($path);
		$GLOBALS['%s']->pop();
	}
	static function readDirectory($path) {
		$GLOBALS['%s']->push("sys.FileSystem::readDirectory");
		$�spos = $GLOBALS['%s']->length;
		$l = array();
		$dh = opendir($path);
        while (($file = readdir($dh)) !== false) if("." != $file && ".." != $file) $l[] = $file;
        closedir($dh);;
		{
			$�tmp = new _hx_array($l);
			$GLOBALS['%s']->pop();
			return $�tmp;
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'sys.FileSystem'; }
}