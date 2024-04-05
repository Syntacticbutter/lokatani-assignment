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
                <form method="post" action="{{ route('users.update2', $id) }}">
                    @csrf
                    @method('patch')
                    <div class="row mb-3" style="font-size: large;">
                        <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Edit User #{{ $id }}</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input style="border: none" readonly="email" class="form-control" name="email" value="{{ $email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="{{ $phone }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="address">{{ $address }}</textarea>
                        </div>
                    </div>
                    <div class="inline-flex">
                        <input hidden name="id" value="{{ $id }}">
                        <input hidden name="return" value="{{ url($return) }}">
                        <a href="{{ url($return) }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>