<?php

namespace Tests\Unit\Article;
use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class ArticleControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_article()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
    }

    public function test_article_detail()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }

}
