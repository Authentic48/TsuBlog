<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Post extends Model
{
  use HasFactory;

/**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id'
    ];

  public function user()
  {
    return $this->belongsToMany('App\Models\User');
  }
    
  public function getRouteKeyName()
  {
    return ['slug' => 'slug', 'tag' => 'tag', 'category' => 'category'];
  }



  public function tags()
  {
    return $this->hasMany(Tag::class);
  }
}
