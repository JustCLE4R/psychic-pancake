<?php

namespace App\Models;

class postModel
{
  private static $blog_post = [
    [
      'title' => 'Blog Post 1',
      'slug' => 'blog-post-1',
      'author' => 'Dimas Yudistira',
      'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse sunt explicabo quae veniam maxime doloremque eaque, accusantium molestias reiciendis labore perferendis, dicta distinctio! Totam maagni deserunt vel, quos minima vero dolor a, illo obcaecati quo excepturi quidem atque reprehenderit saepe suscipit placeat! Tempora perferendis nulla asperiores et eius quidem dolor minima cumque, quibusdam, odit dicta magnam quia inventore ullam maxime reiciendis, aspernatur nihil ea numquam! Similique, recusandae dolores autem voluptas modi atque magnam nemo voluptatum eveniet dicta necessitatibus debitis? Consequatur, recusandae ea incidunt amet aliquid asperiores dolorum quae dolores sint harum in magnam omnis. Quisquam ipsa optio officiis dolorum tempora.',
    ],
    [
      'title' => 'Blog Post 2',
      'slug' => 'blog-post-2',
      'author' => 'Sabirin Bin Birin',
      'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse sunt explicabo quae veniam maxime doloremque eaque, accusantium molestias reiciendis labore perferendis, dicta distinctio! Totam magni deserunt vel, quos minima vero dolor a, illo obcaecati quo excepturi quidem atque reprehenderit saepe suscipit placeat! Tempora perferendis nulla asperiores et eius quidem dolor minima cumque, quibusdam, odit dicta magnam quia inventore ullam maxime reiciendis, aspernatur nihil ea numquam! Similique, recusandae dolores autem voluptas modi atque magnam nemo voluptatum eveniet dicta necessitatibus debitis? Consequatur, recusandae ea incidunt amet aliquid asperiores dolorum quae dolores sint harum in magnam omnis. Quisquam ipsa optio officiis dolorum tempora.',
    ],
    [
      'title' => 'Blog Post 3',
      'slug' => 'blog-post-3',
      'author' => 'Dimas Yudistira',
      'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse sunt explicabo quae veniam maxime doloremque eaque, accusantium molestias reiciendis labore perferendis, dicta distinctio! Totam magni deserunt vel, quos minima vero dolor a, illo obcaecati quo excepturi quidem atque reprehenderit saepe suscipit placeat! Tempora perferendis nulla asperiores et eius quidem dolor minima cumque, quibusdam, odit dicta magnam quia inventore ullam maxime reiciendis, aspernatur nihil ea numquam! Similique, recusandae dolores autem voluptas modi atque magnam nemo voluptatum eveniet dicta necessitatibus debitis? Consequatur, recusandae ea incidunt amet aliquid asperiores dolorum quae dolores sint harum in magnam omnis. Quisquam ipsa optio officiis dolorum tempora.',
    ],
  ];

  public static function all(){
    return collect(self::$blog_post);
  }

  //first where to find slug
  public static function find($slug){
    $posts = static::all();
    return $posts -> firstWhere('slug', $slug);
  }

}
