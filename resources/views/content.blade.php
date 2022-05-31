@extends('layouts.template')

@section('container')
<article class="mb-5">
    <h3>{{ $article->title }}</h3>

    <h6>
        <a href="/articles/{{ $article->category->slug }}" class="text-decoration-none"> {{ $article->category->name  }} </a>
    </h6>

    {!! $article->description !!}

    <a href="/articles" class="d-block mt-3">Back</a>
</article>
@endsection