<?php

namespace Swoole4phalcon\Extension;


class Request extends \Phalcon\Http\Request {
	
	public function getJsonRawBody(bool $associative = false): array {
		return isset($_SERVER['RAW_BODY']) ? json_decode($_SERVER['RAW_BODY'], $associative) : [];
	}
	
	public function getRawBody(): string {
		return $_SERVER['RAW_BODY'] ?? "";
	}
}
