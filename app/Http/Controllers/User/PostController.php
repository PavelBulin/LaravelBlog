<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
  public function index(Request $request)
  {
    if (Auth::check()) {
      $id = $request->user()->id;
      $posts = Post::where('user_id', $id)->get();

      return view('user.posts.index', compact('posts'));
    }
    return redirect()->route('login');
  }

  public function create()
  {
    return view('user.posts.create');
  }

  public function store(Request $request)
  {
    if (Auth::check()) {
      $id = $request->user()->id;

      $validated = validate($request->all(), [
        'title' => ['required', 'string', 'max:100'],
        'content' => ['required', 'string', 'max:10000'],
      ]);

      $title = $validated['title'];
      $content = $validated['content'];

      Post::create([
        'user_id' => $id,
        'title' => $title,
        'content' => $content,
      ]);

      alert(__('Сохранено!'));

      return redirect()->route('user.posts');
    }
    return redirect()->route('login');
  }

  public function show($post)
  {
    $post = Post::find($post);
    return view('user.posts.show', compact('post'));
  }

  public function edit($post)
  {
    $post = Post::find($post);
    return view('user.posts.edit', compact('post'));
  }

  public function update(Request $request, $post)
  {
    $validated = validate($request->all(), [
      'title' => ['required', 'string', 'max:100'],
      'content' => ['required', 'string', 'max:10000'],
    ]);


    $title = $validated['title'];
    $content = $validated['content'];

    Post::where('id', $post)->update([
      'title' => $title,
      'content' => $content,
    ]);

    alert(__('Сохранено!'));

    return redirect()->back();
  }

  public function delete($post)
  {
    Post::where('id', $post)->delete();
    return redirect()->route('user.posts');
  }

  public function like()
  {
    return 'Лайк + 1';
  }
}