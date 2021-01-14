<?php
declare(strict_types=1);

namespace Swoole4phalcon\Modules\Cli\Tasks;

use Swoole\Coroutine;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

class ServeTask extends \Phalcon\Cli\Task
{
	public function mainAction()
	{
		echo "Ready to fly Phalcon on Swoole4" . PHP_EOL;
		Coroutine::set(['hook_flags'=> SWOOLE_HOOK_ALL|SWOOLE_HOOK_CURL]);
		$config = $this->di->getConfig();
		$httpServer = new Server($config->server->host,$config->server->port);
		$httpServer->set([
			"document_root" => BASE_PATH . "/public",
			"enable_static_handler" => true,
			'worker_num' => 'auto'
		]);
		$httpServer->on('request',function (Request $request,Response $response) use ($config){
			$_COOKIE = $_REQUEST = $_POST = $_GET = [];
			$request->post && $_POST = $request->post && $_REQUEST += $_POST;
			$request->get && $_GET = $request->get && $_REQUEST += $_GET;
			$request->cookie && $_COOKIE = $request->cookie;
			foreach ($request->server as $key=>$item) {
				$_SERVER[strtoupper($key)] = $item;
			}
			//Request Raw Body support
			$request->rawContent() && $_SERVER['RAW_BODY'] = $request->rawContent();
			$content = include BASE_PATH . '/app/bootstrap_swoole.php';
			$config->server->serverName && $response->setHeader("Server",$config->server->serverName);
			$response->end($content);
		});
		$httpServer->start();
		echo "Server is listening on {$config->server->host}:{$config->server->port}" . PHP_EOL;
	}
}
