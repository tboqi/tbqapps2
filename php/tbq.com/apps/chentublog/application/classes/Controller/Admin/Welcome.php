<?php
class Controller_Admin_Welcome extends Controller {
    public function action_index() {
        $view = View::factory('admin/index.html');
        $view->urls = [
            'logout' => URL::site('user/logout'),
        ];
        $this->response->body($view);
    }
}