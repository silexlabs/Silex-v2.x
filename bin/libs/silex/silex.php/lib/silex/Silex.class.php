<?php

class silex_Silex {
	public function __construct(){}
	static $CONFIG_FILE_BODY = "fileBody";
	static $CONFIG_USE_DEEPLINK = "useDeeplink";
	static $LOADER_SCRIPT_PATH = "../../libs/silex/loader.js";
	static function main() {
		$GLOBALS['%s']->push("silex.Silex::main");
		$�spos = $GLOBALS['%s']->length;
		$serverConfig = new silex_server_ServerConfig(null);
		$fileService = new silex_file_server_FileService($serverConfig);
		if(haxe_remoting_HttpConnection::handleRequest(silex_ServiceBase::$context)) {
			$GLOBALS['%s']->pop();
			return;
		}
		header("Location" . ": " . ($serverConfig->userFolder . $serverConfig->defaultFile));
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'silex.Silex'; }
}