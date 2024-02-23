<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [
        'id'
    ];

    protected $with = [ //agar tidak terjadi N+1 Problem untuk bukan route model binding (manual Post::), tambah load()
        'category',
        'author'
    ];

    // ->where('title', 'like', '%' . $search . '%')
    //                 ->orWhere('body', 'like', '%' . $search . '%');

    public function scopeFilter($query, array $filters){
      $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) => 
          $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        )
      );

      $query->when($filters['category'] ?? false, function($query, $category){
        return $query->whereHas('category', function($query) use ($category){
          $query->where('slug', $category);
        });
      });

      $query->when($filters['author'] ?? false, fn($query, $author) => 
        $query->whereHas('author', fn($query) =>
          $query->where('username', $author))
      );
    } 

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
