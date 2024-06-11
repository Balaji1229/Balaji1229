<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Article Grid</title>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px; 
    }

    .grid-item {
        border: 1px solid #ccc;
        padding: 20px;
    }
</style>
</head>
<body>

<div class="grid-container">
    @foreach($articles as $article)
    <div class="grid-item">
        <p>Article ID: {{ $article->id }}</p>
        <p>User: {{ $article->user->name }}</p>
        <p>Post Title: {{ $article->post->title }}</p>
    </div>
    @endforeach
</div>

</body>
</html>
