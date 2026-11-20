@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0; margin-bottom: 0.25rem;">Dashboard</h2>
        <p style="margin: 0;">Selamat datang kembali, <strong>{{ $user->name }}</strong>.</p>
        <p class="muted" style="margin: 0.25rem 0 0;">Ringkasan artikel dan aktivitas akun kamu di aplikasi.</p>
    </section>

    <section class="grid-3" style="margin-top: 1rem;">
        <div class="card">
            <span class="muted">Total Artikel</span>
            <p style="font-size: 2rem; font-weight: 700; margin: 0.2rem 0;">{{ $totalArticles }}</p>
            <p class="muted" style="margin: 0;">Seluruh artikel yang tersimpan.</p>
        </div>

        <div class="card">
            <span class="muted">Artikel Kamu</span>
            <p style="font-size: 2rem; font-weight: 700; margin: 0.2rem 0;">{{ $myArticles }}</p>
            <p class="muted" style="margin: 0;">Artikel milik {{ $user->name }}.</p>
        </div>

        <div class="card">
            <span class="muted">Aksi Cepat</span>
            <div class="row" style="margin-top: 0.65rem; gap: 0.5rem;">
                <a href="{{ route('articles.create') }}" class="btn btn-sm">+ Tambah Artikel Baru</a>
                <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline">Lihat Semua Artikel</a>
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline">Lihat Halaman Home</a>
            </div>
        </div>
    </section>

    <section class="card" style="margin-top: 1rem;">
        <h3 style="margin-top: 0;">Artikel Terbaru</h3>

        @if ($latestArticles->isNotEmpty())
            <div class="row">
                @foreach ($latestArticles as $article)
                    <article class="card" style="background-color: var(--bg-soft); padding: 0.9rem 1rem;">
                        <div class="article-item">
                            <img src="{{ $article->image_url }}"
                                 alt="Thumbnail {{ $article->title }}"
                                 class="article-thumb-sm">
                            <div>
                                <h4 style="margin: 0 0 0.2rem 0;">
                                    <a href="{{ route('articles.show', $article) }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>
                                <p class="muted" style="margin: 0 0 0.25rem 0;">
                                    oleh {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                                </p>
                                <p style="margin: 0;">
                                    {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                                </p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="muted">Belum ada artikel yang bisa ditampilkan.</p>
        @endif
    </section>

    <section class="card" style="margin-top: 1rem;">
        <h3 style="margin-top: 0;">Info Akun</h3>
        <p style="margin: 0.25rem 0;"><strong>Nama:</strong> {{ $user->name }}</p>
        <p style="margin: 0.25rem 0 0;"><strong>Email:</strong> {{ $user->email }}</p>
    </section>
@endsection