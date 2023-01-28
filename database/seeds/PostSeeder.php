<?php

use App\Author;
use App\AuthorDetail;
use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $author = new Author();
            $author->email = $faker->email();
            $author->save();

            $authorDetail = new AuthorDetail();
            $authorDetail->first_name = $faker->firstName();
            $authorDetail->last_name = $faker->lastName();
            $authorDetail->birth = $faker->date();
            $authorDetail->bio = $faker->sentence(5);
            $authorDetail->website = $faker->url();
            $author->detail()->save($authorDetail);

            for ($x = 0; $x < rand(0, 5); $x++) {
                $post = new Post();
                $post->title = $faker->sentence(5);
                $post->text = $faker->sentence(20);
                $post->picture = 'https://picsum.photos/seed/'.rand(1,1000).'/400/600';
                $author->posts()->save($post);

                for ($y = 0; $y < rand(2, 5); $y++) {
                    $comment = new Comment();
                    $comment->first_name = $faker->firstName();
                    $comment->last_name = $faker->lastName();
                    $comment->comment = $faker->sentence(4);
                    $post->comments()->save($comment);
                }
            }
        }
    }
}
