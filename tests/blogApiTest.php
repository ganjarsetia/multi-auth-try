<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class blogApiTest extends TestCase
{
    use MakeblogTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateblog()
    {
        $blog = $this->fakeblogData();
        $this->json('POST', '/api/v1/blogs', $blog);

        $this->assertApiResponse($blog);
    }

    /**
     * @test
     */
    public function testReadblog()
    {
        $blog = $this->makeblog();
        $this->json('GET', '/api/v1/blogs/'.$blog->id);

        $this->assertApiResponse($blog->toArray());
    }

    /**
     * @test
     */
    public function testUpdateblog()
    {
        $blog = $this->makeblog();
        $editedblog = $this->fakeblogData();

        $this->json('PUT', '/api/v1/blogs/'.$blog->id, $editedblog);

        $this->assertApiResponse($editedblog);
    }

    /**
     * @test
     */
    public function testDeleteblog()
    {
        $blog = $this->makeblog();
        $this->json('DELETE', '/api/v1/blogs/'.$blog->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/blogs/'.$blog->id);

        $this->assertResponseStatus(404);
    }
}
