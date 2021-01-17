<?php
namespace Swoole4phalcon\Extensions;

use Phalcon\Http\Response\CookiesInterface;

class Cookies extends \Phalcon\Http\Response\Cookies
{
	public function set(string $name,$value = null,int $expire=0,string $path = '/',?bool $secure=null,?string $domain=null,?bool $httpOnly=null,array $options=[]):CookiesInterface {
		$SWOOLE_RESPONSE = $this->getDI()->getShared('swooleResponse');
		$SWOOLE_RESPONSE->setCookie($name,$value,$expire,$path,$domain,$secure,$httpOnly,'','');
		return parent::set($name,$value,$expire,$path,$secure,$domain,$httpOnly,$options);
	}
}
