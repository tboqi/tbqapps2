<?php
class Controller_Admin_Welcome extends Controller {
    public function action_index() {
        $view = View::factory('template_name.tpl');
        $view->var = 'aaa';
        $this->response->body($view);
    }
}