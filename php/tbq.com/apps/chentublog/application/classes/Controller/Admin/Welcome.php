<?php
class Controller_Admin_Welcome extends Controller {
    public function action_index() {
        $view = View::factory('template_name.html', ['var' => 'bbbbb']);
        $view->var = '123123';
        $this->response->body($view);
    }
}