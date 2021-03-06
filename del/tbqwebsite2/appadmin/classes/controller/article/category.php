<?php
class Controller_Article_Category extends Controller_Template {

	function action_index() {
		$model_article_category = new Model_Article_Category();
		$this->sub_title = '文章分类管理';
		$content = Helper_View::create_view('article/categories');
		$content->categories = $model_article_category->find_all();
		$this->template->content = $content;
	}
	
	function action_edit() {
		$content = '';
		
		//验证是否登录状态
		if($user = Auth::instance ()->logged_in()) {
			$id = intval($this->request->param('param1'));
			$content = Helper_View::create_view('article/category_form');
			$content->title = '编辑文章分类';
			$model_article_category = new Model_Article_Category();
			$content->category = $model_article_category->get($id);
		} else {
			$content = '没有权限';
		}
		
		$this->template->content = $content;
		$this->sub_title = '文章分类';
	}

	function action_save() {
		$result = array();
		
		$content = '';
		
		//验证是否登录状态
		if($user = Auth::instance ()->logged_in()) {
			$category = array();
			$category['name'] = trim($_POST['category_name']);
			$category['description'] = trim($_POST['description']);
			$category['show_order'] = intval($_POST['show_order']);
			$post = Validation::factory($_POST)
			->rule('category_name', 'not_empty')
			->rule('description', 'not_empty')
			->rule('show_order', 'not_empty');
			if ($post->check()) {
				$result['status'] = 1;
				$result['url'] = URL::site('article_category/index');
				$model_article_category = new Model_Article_Category();
				$id = isset($_POST['id'])?intval($_POST['id']):0;
				if ($id < 1) {
					$model_article_category->insert($category);
				} else {
					$model_article_category->update($category, $id);
				}
			} else {
				$result['status'] = 0;
				$result['errors'] = $post->errors('error_msg');
			}
		} else {
			$result['msg'] = '没有权限';
			$result['status'] = 0;
		}
		
		$this->auto_render = false;
		echo json_encode($result);
	}
	
	function action_del() {
		$content = '';
		
		//验证是否登录状态
		if($user = Auth::instance ()->logged_in()) {
			$id = intval($this->request->param('param1'));
			DB::update('articles')->set(array('category_id' => 0, 
					'category_name'=> '未分类'))
				->where('category_id', '=', $id)->execute();
			$model_article_category = new Model_Article_Category();
			$model_article_category->del($id);
			header("location:" . URL::site('article_category/index'));exit;
		} else {
			$content = '没有权限';
		}
		
		$this->template->content = $content;
	}
}