<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Base
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

        $this->display('site/user/login.html', ['url' => '', 'action' => url::site('user/login')]);
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        $this->auth_destroy();
        // $this->auth_destroy();
        header('location:' . URL::base());
        exit;
    }
    /*
    public function action_reset_password()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_old = trim($_POST['password_old']);
    $password_new = trim($_POST['password_new']);
    $password_new2 = trim($_POST['password_new2']);

    if (empty($password_new) || empty($password_old) || $password_new != $password_new2) {
    die('密码错误');
    }

    }
    $this->display('site/user/reset_password.html');
    }*/

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
