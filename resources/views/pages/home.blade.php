@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0; margin-bottom: 0.4rem;">Portal Berita Sederhana</h2>
        <p class="muted" style="margin-top: 0;">
            Selamat datang di portal berita berbasis Laravel. Artikel terbaru di bawah ini diambil langsung dari tabel <code>articles</code>.
        </p>

        @guest
            <div class="actions" style="margin-top: 0.75rem;">
                <a href="{{ route('login') }}" class="btn btn-sm">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm btn-outline">Register</a>
            </div>
        @endguest

        @auth
            <p class="muted" style="margin-bottom: 0;">
                Masuk sebagai <strong>{{ auth()->user()->name }}</strong> &mdash; kelola tulisanmu di menu
                <a href="{{ route('articles.index') }}">Artikel</a>.
            </p>
        @endauth
    </section>

    <section class="card" style="margin-top: 1rem;">
        <h3 style="margin-top: 0;">Berita Terbaru</h3>

        @if ($articles->isNotEmpty())
            <div class="row">
                @foreach ($articles as $article)
                    <article class="card" style="background-color: var(--bg-soft);">
                        <div class="article-item">
                            <img src="{{ $article->image_url }}"
                                 alt="Gambar {{ $article->title }}"
                                 class="article-thumb">
                            <div>
                                <h4 style="margin: 0 0 0.25rem 0;">
                                    <a href="{{ route('articles.show', $article) }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>
                                <p class="muted" style="margin: 0 0 0.5rem 0;">
                                    {{ $article->created_at->format('d M Y') }} &bull; oleh {{ $article->user->name }}
                                </p>
                                <p style="margin: 0 0 0.65rem 0;">
                                    {{ \Illuminate\Support\Str::limit($article->body, 140) }}
                                </p>
                                <a href="{{ route('articles.show', $article) }}">
                                    Baca selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="muted">Belum ada berita yang tersedia.</p>
            @auth
                <a href="{{ route('articles.create') }}" class="btn btn-sm">+ Tambah Artikel</a>
            @endauth
        @endif
    </section>
@endsection