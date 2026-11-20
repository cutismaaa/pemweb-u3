@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0; margin-bottom: 0.25rem;">Edit Artikel / Berita</h2>
        <p class="muted" style="margin-top: 0;">
            Perbarui data berita di bawah ini. Kosongkan URL gambar untuk kembali memakai gambar placeholder.
        </p>

        @if ($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 0.4rem 0 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title"
                   value="{{ old('title', $article->title) }}"
                   required placeholder="Masukkan judul berita">

            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image"
                   value="{{ old('image', $article->image) }}"
                   placeholder="https://example.com/gambar.jpg">

            <p class="muted" style="margin-top: 0.9rem; margin-bottom: 0.35rem;">Pratinjau gambar saat ini:</p>
            <img src="{{ $article->image_url }}" alt="Gambar artikel"
                 class="article-thumb" style="width: 100%; max-width: 400px; height: 220px;">

            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" rows="8"
                      required>{{ old('body', $article->body) }}</textarea>

            <div class="actions" style="margin-top: 1.25rem;">
                <button type="submit">Update Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </section>
@endsection