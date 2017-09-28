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

    protected function display($tpl, $data = [])
    {
        $view = View::factory($tpl);
        foreach ($data as $key => $value) {
            $view->{$key} = $value;
        }
        $view->is_login = $this->is_login();
        $this->response->body($view);
    }
}
