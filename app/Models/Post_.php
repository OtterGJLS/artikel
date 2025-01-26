<?php

namespace App\Models;


class Post 
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Dandy Wahyudin",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam hic libero quis tempora nesciunt, possimus ratione eius similique, repellat vel quod itaque! Voluptatibus, maxime! Minus magni corrupti itaque sequi a exercitationem ab laborum illum non, velit, pariatur fuga aspernatur, nam magnam veniam facilis dolores similique accusantium aliquam ipsam! Laudantium quos similique debitis soluta maiores et eius ipsa qui aperiam veniam, eaque mollitia iste, rerum eveniet consectetur libero accusantium nihil cupiditate."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Ujang",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam hic libero quis tempora nesciunt, possimus ratione eius similique, repellat vel quod itaque! Voluptatibus, maxime! Minus magni corrupti itaque sequi a exercitationem ab laborum illum non, velit, pariatur fuga aspernatur, nam magnam veniam facilis dolores similique accusantium aliquam ipsam! Laudantium quos similique debitis soluta maiores et eius ipsa qui aperiam veniam, eaque mollitia iste, rerum eveniet consectetur libero accusantium nihil cupiditate."
        ],
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = self::all();
        return $posts->firstWhere('slug', $slug);
    }
    
}
