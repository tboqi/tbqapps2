<?php
class Controller_Admin_Welcome extends Controller_Base
{
    public function action_index()
    {
        $view = View::factory('admin/index.html');
        $view->is_login = $this->is_login;
        $view->module = 1;
        $this->response->body($view);
    }
}
