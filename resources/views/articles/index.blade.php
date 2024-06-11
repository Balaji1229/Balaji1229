<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
</head>
<body>
    <h2>Create Article</h2>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('articles.store') }}">
        @csrf
        <div>
            <label for="user_id">Select User:</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="post_id">Select Post:</label>
            <select name="post_id" id="post_id">
                @foreach($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                @endforeach
            </select>
        </div>
      
        <button type="submit">Save Article</button>
    </form>


</body>
</html>
