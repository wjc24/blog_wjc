<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use app\Models\Articles;


class Article extends Frontend
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
        $data = Articles::paginate(2);
        $page = $data->render();

        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->view->fetch();
    }
    public function detail()
    {
        $id = request()->param('id');
        $data = Articles::where('id',$id)->find();
        $this->assign('data',$data);
        return $this->view->fetch();
    }

}
