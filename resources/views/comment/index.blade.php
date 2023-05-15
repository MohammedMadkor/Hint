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
</head>
<body>
<!-- NavBar -->




 <div class="main-background">
    <div class="container text-white ">
        <h5 class=" pt-2">Home / Appointments</h5>
        <h1 class=" fw-bold pb-2"> Appointment</h1>
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
                <div class="container my-5">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">POST TITTLE</th>
                            <th scope="col">COMMENT</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$comment->Post->tittle}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td><a href="{{url('comment/delete',$comment->id)}}">delete</a></td>

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


      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="../js/index.js"></script>
</body>

</html>
