<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="shortcut icon" href="../images/24hours.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
<!-- NavBar -->




 <div class="main-background">
    <div class="container text-white ">
        <h5 class=" pt-2">HINT / SYSTEM</h5>
        <h1 class=" fw-bold pb-2"> HINT SYSTEM</h1>
    </div>

</div>

<section>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            

            <a href="{{url('dashboard')}}" class=" text-decoration-none">
              <div class="appoinment p-3 text-muted">
                <i class="fa-regular fa-calendar-days"></i>
                <span class=" ps-2">dashboard</span>
            </div>
            </a>
            <a href="{{url('category')}}" class=" text-decoration-none">
              <div class="appoinment p-3 text-muted">
                <i class="fa-regular fa-calendar-days"></i>
                <span class=" ps-2">category</span>
            </div>
            </a>
            <a href="{{url('comment')}}" class=" text-decoration-none">
              <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-user-group"></i>
                <span class=" ps-2">comment</span>
            </div>
            </a>

            <a href="{{url('post')}}" class=" text-decoration-none">
            <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-gear"></i>
                <span class=" ps-2">post</span>
            </div>
            </a>
            <a href="{{url('media')}}" class=" text-decoration-none">
            <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-gear"></i>
                <span class=" ps-2">media</span>
            </div>
            </a>
            <a href="{{url('tag')}}" class=" text-decoration-none">
            <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-gear"></i>
                <span class=" ps-2">tag</span>
            </div>
            </a>
            <a href="{{url('admin')}}" class=" text-decoration-none">
            <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-gear"></i>
                <span class=" ps-2">admin</span>
            </div>
            </a>
            <a href="{{ route('signout') }}" class=" text-decoration-none">
            <div class="appoinment p-3 text-muted">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class=" ps-2">Logout</span>
            </div>
            </a>
        </div>



            <div class="col-md-9">
                <div class="container mt-5">
                    <a href="{{url('post/create')}}"><button type="button" class="btn btn-primary mb-2"> Add Post</button></a>

                    <table class="table table-secondary">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">ACTIVE</th>
                            <th scope="col">COMMENTS</th>
                            <th scope="col">VIEWS</th>
                            <th scope="col">CREATED DATE</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td><a href="{{url('post/views',$post->id)}}">{{$post->tittle}}</a></td>
                                <td>{{$post->Auther->name}}</td>
                                <td>{{$post->Category->name}}</td>
                                <td>
                                    <input type="checkbox"  name="active"  data-id="{{$post->id}}"  {{$post->active == 1 ? 'checked' : ''}}>
                                </td>
                                <td>
                                @if (!is_null($post->Comment))
                                    {{count($post->Comment)}}
                                @else
                                0
                                @endif
                                </td>
                                <td>{{$post->viewsCount}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="{{url('post/delete',$post->id)}}">delete</a>
                                    <a href="{{url('post/update',$post->id)}}">update</a>
                                </td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>


                </div>



        </div>


    </div>

</div>
</div>

</section>
<script>
    // send id of active post to controller
    $(document).ready(function(){
                $('input[type="checkbox"]').click(function(){
                    var id = $(this).attr('data-id');
                    var active = $(this).prop('checked') == true ? 1 : 0;
                    $.ajax({
                        url: "{{ url('post/active') }}",
                        type: 'post',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            active: active
                        },
                        success: function(response){
                            console.log(response);
                        }
                    });
                });
            });
</script>


      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/index.js"></script>
</body>

</html>
