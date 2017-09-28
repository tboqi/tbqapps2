<?php
class Block_Article
{

    public static function hot_articles()
    {
        $view = View::factory('blocks/article/hotArticles');
        $model_article = new Model_Article();
        $view->articles = $model_article->find_hot_articles();
        return $view->render();
    }

    public static function article($article, $showContent = false)
    {
        $view = View::factory('blocks/article/article');
        $view->article = $article;
        $view->showContent = $showContent;
        return $view->render();
    }
}
