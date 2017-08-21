<?php
class Controller_Admin_Welcome extends Controller {
    public function action_index() {
        $view = View::factory('admin/index.html');
        $view->var = '123123';
        $this->response->body($view);
    }
}