<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use app\Models\Photos;

class Photo extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $data = Photos::select();
//        $data = Photos::paginate(6);
//        $page = $data->render();

//        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->view->fetch();
    }

    public function news()
    {
        $newslist = [];
        return jsonp(['newslist' => $newslist, 'new' => count($newslist), 'url' => 'https://www.fastadmin.net?ref=news']);
    }

}
