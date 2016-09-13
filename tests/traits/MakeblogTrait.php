<?php

use Faker\Factory as Faker;
use App\Models\blog;
use App\Repositories\blogRepository;

trait MakeblogTrait
{
    /**
     * Create fake instance of blog and save it in database
     *
     * @param array $blogFields
     * @return blog
     */
    public function makeblog($blogFields = [])
    {
        /** @var blogRepository $blogRepo */
        $blogRepo = App::make(blogRepository::class);
        $theme = $this->fakeblogData($blogFields);
        return $blogRepo->create($theme);
    }

    /**
     * Get fake instance of blog
     *
     * @param array $blogFields
     * @return blog
     */
    public function fakeblog($blogFields = [])
    {
        return new blog($this->fakeblogData($blogFields));
    }

    /**
     * Get fake data of blog
     *
     * @param array $postFields
     * @return array
     */
    public function fakeblogData($blogFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'content' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $blogFields);
    }
}
