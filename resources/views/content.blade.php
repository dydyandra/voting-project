@extends('layouts.template')

@section('container')
    <div style="margin-top: 10%; padding: 40px; border-radius: 40px; align-items: center" class="card my-3 shadow d-flex align-items-center">
        <article class="mb-5">
            <h3>{{ $article->title }}</h3>

            <h6>
                <a href="/categories/{{ $article->category->slug }}" class="text-decoration-none"> {{ $article->category->name  }} </a>
            </h6>

            {!! $article->description !!}

            <a href="/articles" class="d-block mt-3">Back</a>
        </article>
    </div>
@endsection