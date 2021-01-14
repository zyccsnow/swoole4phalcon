<?php
declare(strict_types=1);

namespace Swoole4phalcon\Modules\Frontend\Controllers;

use Swoole4phalcon\Models\SmpRoles;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
	    $name = uniqid('role');
	    $model = new SmpRoles();
	    $model->roleName = $name;
	    $model->updateTime = $model->createTime = date("Y-m-d H:i:s");
	    $model->save();
	    $this->view->setVar('name',$name);
    }
	
	public function testAction() {
    	$this->view->disable();
    	$params = $this->request->getJsonRawBody(true);
    	var_export($this->request->getLanguages());
    }
}

