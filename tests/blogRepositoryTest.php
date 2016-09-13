<?php

use App\Models\blog;
use App\Repositories\blogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class blogRepositoryTest extends TestCase
{
    use MakeblogTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var blogRepository
     */
    protected $blogRepo;

    public function setUp()
    {
        parent::setUp();
        $this->blogRepo = App::make(blogRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateblog()
    {
        $blog = $this->fakeblogData();
        $createdblog = $this->blogRepo->create($blog);
        $createdblog = $createdblog->toArray();
        $this->assertArrayHasKey('id', $createdblog);
        $this->assertNotNull($createdblog['id'], 'Created blog must have id specified');
        $this->assertNotNull(blog::find($createdblog['id']), 'blog with given id must be in DB');
        $this->assertModelData($blog, $createdblog);
    }

    /**
     * @test read
     */
    public function testReadblog()
    {
        $blog = $this->makeblog();
        $dbblog = $this->blogRepo->find($blog->id);
        $dbblog = $dbblog->toArray();
        $this->assertModelData($blog->toArray(), $dbblog);
    }

    /**
     * @test update
     */
    public function testUpdateblog()
    {
        $blog = $this->makeblog();
        $fakeblog = $this->fakeblogData();
        $updatedblog = $this->blogRepo->update($fakeblog, $blog->id);
        $this->assertModelData($fakeblog, $updatedblog->toArray());
        $dbblog = $this->blogRepo->find($blog->id);
        $this->assertModelData($fakeblog, $dbblog->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteblog()
    {
        $blog = $this->makeblog();
        $resp = $this->blogRepo->delete($blog->id);
        $this->assertTrue($resp);
        $this->assertNull(blog::find($blog->id), 'blog should not exist in DB');
    }
}
