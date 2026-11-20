@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <section class="card">
        <h2 style="margin-top: 0; margin-bottom: 0.3rem;">{{ $article->title }}</h2>
        <p class="muted" style="margin-top: 0;">
            Dipublikasikan pada {{ $article->created_at->format('d M Y') }} oleh {{ $article->user->name }}
        </p>

        <div style="margin: 1rem 0;">
            <img src="{{ $article->image_url }}"
                 alt="Gambar untuk {{ $article->title }}"
                 class="article-hero">
        </div>

        <div style="margin-top: 1rem;">
            {!! nl2br(e($article->body)) !!}
        </div>

        <div class="actions" style="margin-top: 1.5rem; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn-sm btn-outline">&larr; Kembali ke Home</a>
            <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline">Lihat semua artikel</a>
            @auth
                @if ($article->user_id === auth()->id())
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm">Edit Artikel</a>
                @endif
            @endauth
        </div>
    </section>
@endsection