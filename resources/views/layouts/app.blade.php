<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita') — prakpweb-cutisma</title>
    <style>
        :root {
            --bg-page: #f8f6f0;
            --bg-card: #ffffff;
            --bg-soft: #f2eee4;
            --text-main: #102542;
            --text-muted: #5c677d;
            --accent: #13293d;
            --accent-hover: #1f3f5b;
            --border: #e3ddd0;
            --success-bg: #eef7f2;
            --success-text: #1b5e3a;
            --error-bg: #fdf1f0;
            --error-text: #9b2226;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            line-height: 1.6;
        }

        a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 1.5rem 1rem 3rem;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.75rem 1rem;
        }

        .nav a {
            padding: 0.45rem 0.85rem;
            border-radius: 8px;
            color: var(--text-main);
        }

        .nav a:hover {
            background-color: var(--bg-soft);
            text-decoration: none;
        }

        .nav a.active {
            background-color: var(--accent);
            color: #ffffff;
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .inline {
            display: inline;
        }

        .muted {
            color: var(--text-muted);
            font-size: 0.92rem;
        }

        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1rem;
        }

        .article-item {
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        .article-thumb {
            width: 220px;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid var(--border);
            flex-shrink: 0;
        }

        .article-thumb-sm {
            width: 120px;
            height: 82px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border);
            flex-shrink: 0;
        }

        .article-hero {
            width: 100%;
            max-height: 360px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .article-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0;
        }

        .article-list li {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1rem;
            border: 1px solid var(--border);
            background-color: var(--bg-soft);
            border-radius: 10px;
            margin-bottom: 0.65rem;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        button,
        .btn {
            display: inline-block;
            background-color: var(--accent);
            color: #ffffff;
            border: 1px solid var(--accent);
            border-radius: 8px;
            padding: 0.5rem 0.95rem;
            font-size: 0.92rem;
            font-weight: 500;
            cursor: pointer;
        }

        button:hover,
        .btn:hover {
            background-color: var(--accent-hover);
            border-color: var(--accent-hover);
            text-decoration: none;
        }

        .btn-outline {
            background-color: var(--bg-card);
            color: var(--text-main);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background-color: var(--bg-soft);
            border-color: var(--text-muted);
        }

        .btn-danger {
            background-color: var(--error-text);
            border-color: var(--error-text);
            color: #ffffff;
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
        }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.85rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 1rem;
            margin-bottom: 0.35rem;
        }

        input[type="text"],
        input[type="url"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background-color: var(--bg-page);
            color: var(--text-main);
            font-family: inherit;
            font-size: 0.95rem;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid var(--accent);
            background-color: var(--bg-card);
        }

        .flash {
            margin-top: 1rem;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            background-color: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #b7e4c7;
            font-weight: 500;
        }

        .error {
            margin-top: 1rem;
            padding: 0.85rem 1rem;
            border-radius: 10px;
            background-color: var(--error-bg);
            color: var(--error-text);
            border: 1px solid #f5c2c7;
        }

        .pagination-wrap {
            margin-top: 1.25rem;
        }

        .footer {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--text-muted);
            font-size: 0.88rem;
        }

        @media (max-width: 640px) {
            .article-item {
                flex-direction: column;
            }

            .article-thumb {
                width: 100%;
                height: 180px;
            }

            .nav .right {
                margin-left: 0;
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @include('partials.nav')

        <main style="margin-top: 1rem;">
            @yield('content')
        </main>

        <footer class="footer">
            Portal Berita Sederhana &bull; Laravel CRUD (`prakpweb-cutisma`)
        </footer>
    </div>
</body>
</html>