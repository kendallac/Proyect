@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden"> 
@if ($post->image)
<img class="w-full h-80  object-cover object-center" src="{{Storage::url($post->image->url)}} "alt="">

@else
<img class="w-full h-80  object-cover object-center" src="https://images.pexels.com/photos/2330137/pexels-photo-2330137.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260 "alt="">

@endif
    <div  class="px-6 py-4 ">
<h1 class="font-bold text-xl ,b-2 ">
    <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>

</h1>
<div class="text-base text-gray-700 ">
    {!! $post->extract !!}
</div>
<div class="px-6 pt-4 pb-2">
     @foreach ($post->tags  as $tag)
         <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm mr-2">{{$tag->name}}</a>
     @endforeach 
</div>
    </div>


</article>