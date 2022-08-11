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
<div class="grid lg:grid-cols-2 py-2 gap-5">
  @foreach ($posts as $post)
  <div class="flex justify-center">
    <div class="rounded-lg shadow-lg bg-custom-100 max-w-sm">
      <a href="/blog/{{ $post->slug }}" data-mdb-ripple="true" data-mdb-ripple-color="light">
        <img class="rounded-t-lg" src="/images/{{ $post->image_path }}" alt=""/>
      </a>
      <div class="p-4">
        <h5 class="text-2xl font-semibold mb-2">{{ $post->title }}</h5>
        <p class="text-sm">
          {{ Str::limit($post->description,100) }}
        </p>
        <a href="/blog/{{ $post->slug }}">
          <button type="button" class="btn inline-block px-6 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">read more</button>
        </a>
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
    </div>
  </div>
  
  @endforeach
</div>



<div class="p-12">
  <div class="flex items-center space-x-1">
    {{ $posts->links() }}  
  </div>
</div>



@endsection

{{-- 
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
</div> --}}