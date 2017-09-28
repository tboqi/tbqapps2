<?php
class Controller_Base extends Controller
{

    public function before()
    {
        parent::before();
    }

    protected function is_login()
    {
        if (Auth::instance()->logged_in()) {
            return true;
        }
        return false;
    }

    protected function display($view)
    {
        $view->is_login = $this->is_login();
        $this->response->body($view);
    }
}
