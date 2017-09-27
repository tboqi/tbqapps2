<?php defined('SYSPATH') or die('No direct script access.');

// class Controller_Welcome extends Controller_Base
class Controller_Welcome extends Controller
{

    protected $need_login = false;

    public function action_index()
    {
        $this->tpl = 'welcome/index';

        $session = Session::instance();
        $data = $session->as_array();
        $this->data = $data;
    }

    public function action_ajax()
    {
        $this->show_type = 'json';
        $this->data = ['aa' => 0, 'bb' => 'test'];
    }

    public function action_smarty()
    {
        $view = View::factory('welcome/smarty.html');
        $view->urls = [
            'logout' => URL::site('user/logout'),
        ];
        $view->urls = json_encode($view->urls);
        $this->response->body($view);
    }

} // End Welcome
