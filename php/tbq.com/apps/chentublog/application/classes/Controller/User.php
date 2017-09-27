<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller
{
    private $auth_config;

    public function action_login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $auth = Auth::instance();

            $url = URL::site('admin');
            if ($auth->login($username, $password, true)) {
                $url = $_POST['url'];
                $url = !empty($url) ? $url : URL::site('admin');
                //写入cookie
                $this->remember_login($username, $password);
            }
            header('location:' . $url);
            exit;
        }

        $view = View::factory('site/user/login.html');
        $view->url = '';
        $view->action = url::site('user/login');
        $this->response->body($view);
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        $this->auth_destroy();
        // $this->auth_destroy();
        header('location:' . URL::base());
        exit;
    }

    private function remember_login($username, $password)
    {
        $password_hash = Auth::instance()->hash($password);
        $cookie_lifetime = $this->auth_config['lifetime'];
        $webkey = $this->auth_config['hash_key'];
        $md5str = md5("{$username}{$password_hash}{$cookie_lifetime}{$webkey}");
        $base64str = base64_encode("{$username}:{$cookie_lifetime}:{$md5str}");
        $cookie_name = $this->auth_config['session_key'];
        Cookie::set($cookie_name, $base64str, $cookie_lifetime);
    }

    private function auth_destroy()
    {
        $cookie_name = $this->auth_config['session_key'];
        Cookie::delete($cookie_name);
    }

} // End User
