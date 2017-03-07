<?php
/**
 * 工具測試
 */
class Controller_Utilstest extends Controller {

    public function action_index() {
    }

    public function action_mergearray() {
        if ($this->request->method() == 'POST') {
            $post = $this->request->post();
            unset($post['_txt_val']);
            (new Model_Auth())->insert($post);
            http::redirect('auth/index');
        }
        $this->tpl = 'auth/form';
        $this->data['top_menus'] = (new Model_Auth())->find_top_menus();
    }
}
