@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
    <section class="card">
        <h2 style="margin-top: 0; margin-bottom: 0.25rem;">Tambah Artikel / Berita</h2>
        <p class="muted" style="margin-top: 0;">
            Isi formulir di bawah untuk menambahkan berita baru. URL gambar bersifat opsional; jika kosong, sistem memakai gambar placeholder.
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

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <label for="title">Judul Artikel</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                   required placeholder="Masukkan judul berita">

            <label for="image">URL Gambar (opsional)</label>
            <input type="url" id="image" name="image" value="{{ old('image') }}"
                   placeholder="https://example.com/gambar.jpg">
            <p class="muted" style="margin: 0.3rem 0 0;">
                Jika dikosongkan, sistem memakai gambar placeholder dari <code>picsum.photos</code>.
            </p>

            <label for="body">Isi Berita</label>
            <textarea id="body" name="body" rows="8" required
                      placeholder="Tulis isi berita di sini...">{{ old('body') }}</textarea>

            <div class="actions" style="margin-top: 1.25rem;">
                <button type="submit">Simpan Artikel</button>
                <a href="{{ route('articles.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </section>
@endsection