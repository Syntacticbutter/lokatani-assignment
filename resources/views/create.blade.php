<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="padding: 1em;">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('users.store2') }}">
                    @csrf
                    @method('post')
                    <div class="row mb-3" style="font-size: large;">
                        <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Create User</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" required pattern="[a-zA-Z ]+" title="Alphabetical characters only">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" required
                            onkeyup="
                                var start = this.selectionStart;
                                var end = this.selectionEnd;
                                this.value = this.value.toLowerCase();
                                this.setSelectionRange(start, end);
                            "/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" pattern="[a-zA-Z0-9 ]+" title="Alphanumeric values">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="address" pattern="[a-zA-Z0-9 ]+"></textarea>
                        </div>
                    </div>
                    <div class="inline-flex">
                        <input hidden name="return" value="{{ url($return) }}">
                        <a href="{{ url($return) }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>