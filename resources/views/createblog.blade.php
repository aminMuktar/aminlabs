@extends('welcome')
@section('content')


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
    @endforeach
@endif

<div class="w-4/5 m-auto">
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="m-4">
            <input type="text" name="title" id="" placeholder="title..." class="bg-transparent block w-full py-6 h-10 text-xl focus:border-bg-1 outline-none ">
        </div>
        <div class="m-4">
            <input type="text" name="seo_tag" id="" placeholder="seo tag..." class="bg-transparent block w-full py-6 h-10 text-xl focus:border-bg-1 outline-none ">
        </div>
        <div class="m-4">
            <textarea name="description" id="" placeholder="description" cols="30" rows="5" class="bg-transparent h-60 block w-full py-6 text-xl focus:border-bg-1 outline-none"></textarea>
        </div>
        
            <input type="file" name="image" class="" id="">
            <button class="btn" type="submit">submit</button> 
    </form>
</div>

@endsection
