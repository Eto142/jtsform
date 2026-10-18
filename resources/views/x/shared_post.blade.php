<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->writeup }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit($post->writeup, 160) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->writeup }}">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit($post->writeup, 160) }}">
    <meta property="og:image" content="{{ asset($post->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->writeup }}">
    <meta name="twitter:description" content="{{ \Illuminate\Support\Str::limit($post->writeup, 160) }}">
    <meta name="twitter:image" content="{{ asset($post->image) }}">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 32px 16px;
            background: #f3f5f7;
            color: #20262e;
            font-family: Arial, sans-serif;
        }
        main {
            width: 100%;
            max-width: 680px;
            margin: 0 auto;
            overflow: hidden;
            background: #fff;
            border: 1px solid #e1e5e9;
            border-radius: 8px;
            box-shadow: 0 8px 28px rgba(25, 35, 45, 0.08);
        }
        img {
            display: block;
            width: 100%;
            max-height: 560px;
            object-fit: contain;
            background: #eef1f3;
        }
        .writeup {
            padding: 24px;
            font-size: 18px;
            line-height: 1.55;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }
        @media (max-width: 600px) {
            body { padding: 16px 10px; }
            .writeup { padding: 18px; font-size: 16px; }
        }
    </style>
</head>
<body>
    <main>
        <img src="{{ asset($post->image) }}" alt="Shared image">
        <div class="writeup">{{ $post->writeup }}</div>
    </main>
</body>
</html>