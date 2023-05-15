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
    <div class="card" style="width: 50rem; margin-top: 150px; margin-left: 450px;">
        <div class="card-body">
            <form method="post" action="{{ url('post/store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="tittle" class="form-label">tittle</label>
                    <input type="text" class="form-control" id="tittle" name="tittle">
                    @error('tittle')
                        <span class="text-danger err-msg-tittle" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
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
                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <input type="text" class="form-control" id="content" name="content">
                    @error('content')
                        <span class="text-danger err-msg-content" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>

                <select class="form-select mb-3" aria-label="Default select example" name="cat_id">
                    <option selected disabled>Open this select category </option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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


                <div class="mb-3">
                    <label for="content" class="form-label">Auther</label>
                    <input type="text" class="form-control" id="content" name="user_id"
                        value="{{ $user->id }}">
                </div>
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




                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
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
