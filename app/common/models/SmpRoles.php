<?php

namespace Swoole4phalcon\Models;


use Phalcon\Mvc\Model;

class SmpRoles extends Model
{
	public int $id = 0;
	public string $roleName = "";
	public string $policies = "";
	public string $roleDesc = "";
	public string $createTime = "";
	public string $updateTime = "";
}
