<?php
class Controller_Admin_Welcome extends Controller_Base
{
    public function action_index()
    {
        $this->display('admin/index.html');
    }
}
