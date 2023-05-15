<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">update User</h3>
                        <div class="card-body">
                            <form action="{{url('admin/edit',$admin->id)}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$admin->name}}">
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
                                    <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}}">
                                    @error('email')
                                        <span class="text-danger err-msg-email" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>



                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @error('password')
                                        <span class="text-danger err-msg-password" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>



                                <select class="form-select mb-3" aria-label="Default select example" name="premission">
                                    <option selected disabled>Open this select menu</option>
                                    <option {{$admin->premission == 1 ? 'selected' : ''  }} value="1">Super Admin</option>
                                    <option {{$admin->premission == 2 ? 'selected' : ''  }} value="2">Admin</option>
                                </select>
                                @error('premission')
                                <span class="text-danger err-msg-premission mb-3" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

