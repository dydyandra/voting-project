@extends('layouts.template')

@section('container')
    <h1>{{  $title  }}</h1>
    {{-- <h5>editor: {{ $name }} | {{ $email }}</h5> --}}
    <hr/>
    @foreach($articles as $article)
    <div class="card my-3">
        <article class="mb-2 mx-2 card-body">
            <h3 class="card-title">
                <a href="/articles/{{ $article->slug }}">
                {{ $article->title }}
                </a>                    
            </h3>
            <a href="/articles/{{ $article->category->slug }}" class="text-decoration-none"> {{ $article->category->name  }} </a>
            <p>{{ $article->description }}</p>
        </article>
    </div>

    @endforeach

    {{-- @if ($articles->links()->paginator->hasPages())
    <div class=" pagination justify-content-center mt-4 p-4 box has-text-centered">
        {{ $articles->links() }}
    </div>
    <div> --}}
        {{-- {{ $articles->category->name }} --}}
    {{-- </div>
    @endif --}}
@endsection


