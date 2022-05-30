@extends('layouts.template')

@section('container')
    <h1>{{  $title  }}</h1>
    {{-- <h5>editor: {{ $name }} | {{ $email }}</h5> --}}
    <hr/>
    @foreach($articles as $article)
    <div class="card my-3">
        <article class="mb-2 mx-2 card-body">
            <h3 class="card-title">
                {{-- <a href="/article/{{ $article->slug }}"> --}}
                {{ $article->title }}
                </a>                    
            </h3>
            <p>{{ $article->description }}</p>
        </article>
    </div>

    @endforeach

    @if ($articles->links()->paginator->hasPages())
    <div class=" pagination justify-content-center mt-4 p-4 box has-text-centered">
        {{ $articles->links() }}
    </div>
    @endif
@endsection


