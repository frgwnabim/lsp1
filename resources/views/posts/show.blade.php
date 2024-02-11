<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/posts/' . $post->image) }}" class="w-100 rounded">
                        <hr>
                        <form method="post" action="{{ route('posts.updateStatus', $post->id) }}">
                            @csrf
                            @method('patch')
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" @if ($post->status == 'pending') selected @endif>Pending
                                </option>
                                <option value="progress" @if ($post->status == 'progress') selected @endif>On-Progress
                                </option>
                                <option value="done" @if ($post->status == 'done') selected @endif>Done</option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                        </form>
                        <h4>{{ $post->title }}</h4>
                        <p class="tmt-3">
                            {!! $post->content !!}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="/posts">
                            <button class="btn btn-primary">
                                kembali
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
