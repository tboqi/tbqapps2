<?php
class Controller_Admin_Welcome extends Controller
{
    public function action_index()
    {
        $view = View::factory('admin/index.html');
        $view->isLogin = 1;
        $view->module = 1;
        $this->response->body($view);
    }
}
