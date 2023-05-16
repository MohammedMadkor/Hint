<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="shortcut icon" href="../images/24hours.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('../css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('../css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../css/style.css')}}">
    <link rel="stylesheet" href="{{'../css/media.css'}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/all.min.js"></script>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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
    <div class="card" style="width: 50rem; ">
        <div class="card-body">
            <form method="post" action="{{ url('post/edit',$post->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tittle" class="form-label">tittle</label>
                    <input type="text" class="form-control" id="tittle" name="tittle" value="{{$post->tittle}}">
                    @error('tittle')
                        <span class="text-danger err-msg-tittle" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
                <div class="mb3">
                    <img src="{{$post->image}}" alt="" width="250px" height="250px">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <span class="text-danger err-msg-image" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>


                <select class="form-select mb-3" aria-label="Default select example" name="cat_id">
                    <option selected disabled>Open this select category </option>
                    @foreach ($cats as $cat)
                        <option {{$post->cat_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                    @error('cat_id')
                        <span class="text-danger err-msg-cat_id" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </select>
                <select class="form-select mb-3 " aria-label="Default select example" name="tag[]" multiple>

                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                    @error('tag')
                        <span class="text-danger err-msg-tag" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </select>



                {{-- <div id="inputContainer"></div>
                <button id="addInputsButton">Add Inputs</button>
                <br> --}}
                <div class="table-responsive">

                    <div class="table-responsive">

                        <table id="table" class="table caption-top table-bordered">

                            <caption>Treatment <button class="addrow" onclick="addRow()" type="button"
                                    id="add-row">add media</button></caption>

                            <thead>
                                <tr style="background-color:#038eff60">
                                    <th scope="col">Media image</th>
                                    <th scope="col">description</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                    <div class="form-floating">


                            {{$post->content}} <br>
                            @foreach ($post->PostMedia as $PostMedia)
                            <img src="{{$PostMedia->imageMedia}}" alt="" width="200px" height="200px"> <br>
                            {{$PostMedia->description}}
                            @endforeach



                      </div>




                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


</div>

</div>
</div>

</section>
    <script>
        // Add and remove rows from the table
        function addRow() {
            var table = document.getElementById("table");
            var row = table.insertRow(-1);
            var imageMedia = row.insertCell(0);
            var description = row.insertCell(1);
            var actionCell = row.insertCell(2);
            imageMedia.innerHTML = '<input type="file" required name="imageMedia[]">';
            description.innerHTML = '<input type="text"  name="description[]">';
            actionCell.innerHTML = '<button class="remove-row" onclick="deleteRow(this)">Remove</button>';
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
