@extends('welcome')
@section('content')

@if (session()->has('message'))
    <div class="m-auto w-4/5 mt-10 pl-2">
      <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
        {{ session()->get('message') }}
      </p>
    </div>
@endif

@if (Auth::check())
  <div class="pt-15 w-4/5 m-auto">
    <a href="/blog/create" class="bg-custom-100 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
      create post
    </a>
  </div>  
@endif
<div class="grid lg:grid-cols-2 py-6 gap-5">
  @foreach ($posts as $post)
  <div class="max-w-sm rounded overflow-hidden bg-custom-100 shadow-2xl">
    <div class="px-6 py-4">
      <div class="font-bold lg:text-xl mb-2"><a href="/blog/{{ $post->slug }}">{{ $post->title }} </a></div>
      <p class="text-gray-700 text-sm">
        {{ $post->description }}
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $post->seo_tag }}</span>
        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
          <a href="/blog/{{ $post->slug }}/edit">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
              Edit
            </span>
          </a>

          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            <form action="/blog/{{ $post->slug }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit">delete</button>
            </form>
          </span>
        
        @endif
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2">authored by: </span>
      <span class="inline-block bg-gray-500 rounded-full py-1 text-sm font-sm text-gray-700 mr-2 mb-2"> {{ $post->user->name }}</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-100 mr-2 mb-2">{{ date('jS M Y',strtotime($post->updated_at)) }}</span>
    </div>
  </div>
  @endforeach
</div>



<div class="p-12">
  <div class="flex items-center space-x-1">
    <a href="#" class="flex items-center px-4 py-2 text-gray-500 bg-gray-300 rounded-md">
        Previous
    </a>

    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        1
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        2
    </a>
    <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-blue-400 hover:text-white">
        3
    </a>
    <a href="#" class="px-4 py-2 font-bold text-gray-500 bg-gray-300 rounded-md hover:bg-blue-400 hover:text-white">
        Next
    </a>
  </div>
</div>



@endsection
