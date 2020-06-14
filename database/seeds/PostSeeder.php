<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
use App\Category;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoryNews = Category::create(['name'=>'News']);
        $categoryDesign = Category::create(['name'=>'Design']);
        $categoryTechnology = Category::create(['name'=>'Technology']);
        $categoryEngineering = Category::create(['name'=>'Engineering']);

        $tagCustomers = Tag::Create(['name'=>'customers']);
        $tagDesign = Tag::Create(['name'=>'design']);
        $tagLaravel = Tag::Create(['name'=>'laravel']);
        $tagCoding = Tag::Create(['name'=>'coding']);

        $post1=Post::create([
        	'title'=>'We relocated our office to our home!',
        	'excerpt'=>Faker\Factory::create()->sentence(rand(10,18)),
        	'content'=>Faker\Factory::create()->paragraphs(rand(3,7), true),
        	'image'=>'posts/1.jpg',
        	'category_id'=>$categoryDesign->id,
        	'user_id'=>2,
        	'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post2=Post::create([
        	'title'=>'Corona virus vaccine has been invented!',
        	'excerpt'=>Faker\Factory::create()->sentence(rand(10,18)),
        	'content'=>Faker\Factory::create()->paragraphs(rand(3,7), true),
        	'image'=>'posts/2.jpg',
        	'category_id'=>$categoryNews->id,
        	'user_id'=>3,
        	'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post3=Post::create([
        	'title'=>'Java is Amazing!',
        	'excerpt'=>Faker\Factory::create()->sentence(rand(10,18)),
        	'content'=>Faker\Factory::create()->paragraphs(rand(3,7), true),
        	'image'=>'posts/3.jpg',
        	'category_id'=>$categoryEngineering->id,
        	'user_id'=>2,
        	'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post4=Post::create([
        	'title'=>'Fashion Designining upcomings!',
        	'excerpt'=>Faker\Factory::create()->sentence(rand(10,18)),
        	'content'=>Faker\Factory::create()->paragraphs(rand(3,7), true),
        	'image'=>'posts/4.jpg',
        	'category_id'=>$categoryDesign->id,
        	'user_id'=>4,
        	'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post5=Post::create([
        	'title'=>'Php developers',
        	'excerpt'=>Faker\Factory::create()->sentence(rand(10,18)),
        	'content'=>Faker\Factory::create()->paragraphs(rand(3,7), true),
        	'image'=>'posts/5.jpg',
        	'category_id'=>$categoryDesign->id,
        	'user_id'=>2,
        	'published_at'=>Carbon::now()->format('Y-m-d')
        ]);

        $post1->tags()->attach([$tagCustomers->id]);
        $post2->tags()->attach([$tagLaravel->id]);
        $post3->tags()->attach([$tagCoding->id, $tagCustomers->id, $tagLaravel->id]);
        $post4->tags()->attach([$tagCoding->id, $tagCustomers->id, $tagDesign->id]);
        $post5->tags()->attach([$tagCoding->id, $tagDesign->id]);
    }
}
