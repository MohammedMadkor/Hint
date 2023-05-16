<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="card" style="width: 80%;">
        <img src="{{$post->image}}" class="card-img-top" alt="..." width="250px" height="250px">
        <div class="card-body">
          <h5 class="card-title">{{$post->content}}</h5>
          @foreach ($post->PostMedia as $PostMedia)
          <img src="{{$PostMedia->imageMedia}}" class="card-img-top" alt="..." width="250px" height="250px">
          <h5 class="card-title">{{$PostMedia->description}}</h5>
          @endforeach



        </div>
      </div>
      <div class="card" style="width: 18rem; margin-left: 450px;">
        <div class="card-body">
            <h5 class="card-title">add comment</h5>
            <form action="{{url('comment/store')}}" method="post">
                @csrf
                <div class="mb-3">
               
                <input type="number" class="form-control" id="post_id" name="post_id" value="{{$post->id}}" hidden>
                </div>
                <div class="mb-3">
                <label for="comment" class="form-label">comment</label>
                <input type="text" class="form-control" id="comment" name="comment">
                @error('comment')
                <span class="text-danger err-msg-comment" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
                </div>
                <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                <span class="text-danger err-msg-name" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
                </div>
                <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <span class="text-danger err-msg-email" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
