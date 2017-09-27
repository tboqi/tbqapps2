<?php defined('SYSPATH') or die('No direct script access.');

// class Controller_Welcome extends Controller_Base
class Controller_Welcome extends Controller
{

    protected $need_login = false;

    public function action_index()
    {
        $view = View::factory('welcome/index.html');
        $view->urls = [
            'khn_docs' => URL::site('guide'),
        ];
        $this->response->body($view);
    }

} // End Welcome
