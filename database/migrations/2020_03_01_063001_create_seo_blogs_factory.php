<?php

use App\Models\Blogs\Blogs;
use App\Models\SEO\SeoBlog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoBlogsFactory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $blogs = Blogs::all();
        foreach($blogs as $blog)
        {
            $seo = new SeoBlog();
            $seo->title = $blog->title;
            $seo->blog_id = $blog->id;
            $seo->text = htmlentities(mb_substr(strip_tags($blog->post),0,154)).'...';
            $seo->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
