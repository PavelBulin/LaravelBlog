@extends('layouts.main')

@section('page.title', 'Просмотр')

@section('main.content')
    <x-title>
        {{ __('Просмотр поста') }}

        <x-slot name="link">
            <a href="{{ route('user.posts') }}">
                {{ __('Назад') }}
            </a>
        </x-slot>

        <x-slot name="right">
          <span class="mx-2">
            <x-button-link href="{{ route('user.posts.delete', $post->id) }}">
                {{ __('Удалить') }}
            </x-button-link>
          </span>

            <span>
              <x-button-link href="{{ route('user.posts.edit', $post->id) }}">
                  {{ __('Изменить') }}
              </x-button-link>
            </span>
        </x-slot>
    </x-title>

    <h2 class="h4">
      {{ $post->title }}
    </h2>

    <div class="small text-muted">
      {{ $post->updated_at }}
    </div>

    <div class="pt-3">
      {!! $post->content !!}
    </div>
@endsection
