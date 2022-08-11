
@extends('welcome')
@section('content')


  <div class="container flex w-full place-content-center">
    <div class="rounded-lg shadow-2xl">
      <div class="px-6 ">
        {{-- <img class="flex rounded-lg w-1/2" src="/images/{{ $post->image_path }}" height="200" alt=""> --}}
        <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full text-sm font-semibold text-gray-700 mr-2 mb-2 text-white">authored by: </span>
        <span class="inline-block bg-gray-500 rounded-full py-1 text-sm font-sm text-gray-700 mr-2 mb-2 text-white"> {{ $post->user->name }}</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-100 mr-2 mb-2 text-white">{{ date('jS M Y',strtotime($post->updated_at)) }}</span>
      </div>
        <div class="font-bold text-2xl lg:text-4xl pt-10 mb-6 underline text-white">{{ $post->title }}</div>
        <p class=" leading-7  text-xs lg:text-base p-10 place-content-start text-white">
          {{ $post->description }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 text-white">{{ $post->seo_tag }}</span>
      </div>
    </div>
  </div>
@endsection