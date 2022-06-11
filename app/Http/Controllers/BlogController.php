<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');
    $category_id = $request->input('category_id');

    $posts = [];
    $all =  Post::all();

    foreach ($all as $key => $value) {
      $posts['post' . $key + 1] = (object)[
        'id' => $value->id,
        'title' => $value->title,
        'content' => $value->content,
        'updated_at' => (string) $value->updated_at,
        'author' => User::find($value->user_id)->name,
      ];
    }

    $posts = array_filter($posts, function ($post) use ($search, $category_id) {
      if ($search && ! str_contains(strtolower($post->title), strtolower($search))) {
          return false;
      }

      if ($category_id && $post->category_id != $category_id) {
          return false;
      }

      return true;
    });

    $categories = [
        null => __('Все рубрики'),
        1 => __('Четырёхстишия'),
        2 => __('Экспромты'),
    ];

    return view('blog.index', compact('posts', 'categories'));
  }

  public function show(Request $request, $post)
  {
    $post = Post::find($post);
    // dd($post->content);
    return view('blog.show', compact('post'));
  }

  public function like($post)
  {
    return 'Поставить лайк';
  }
}