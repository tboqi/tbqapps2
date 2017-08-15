<?php
class Controller_Admin extends Controller {
    public function action_index() {
        $this->response->body('hello, world!');
    }
}