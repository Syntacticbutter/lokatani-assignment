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
                <div class="row mb-3" style="font-size: large;">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"><b>Details of User #{{ $id }}</b></label>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input style="border: none;" readonly type="text" class="form-control" name="name" value="{{ $name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">E-Mail</label>
                    <div class="col-sm-10">
                        <input style="border: none;" readonly type="email" class="form-control" name="email" value="{{ $email }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input style="border: none;" readonly type="text" class="form-control" name="phone" value="{{ $phone }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea style="border: none;" readonly type="text" class="form-control" name="address">{{ $address }}</textarea>
                    </div>
                </div>
                <form method="get" action="{{ route('users.edit2') }}">
                    <div class="inline-flex">
                        <a href="{{ url($return) }}" class="btn btn-danger">Cancel</a>
                        @csrf
                        @method('get')
                        <input hidden name="return" value="{{ $return }}">
                        <input hidden name="id" value="{{ $id }}">
                        <input hidden name="name" value="{{ $name }}">
                        <input hidden name="email" value="{{ $email }}">
                        <input hidden name="phone" value="{{ $phone }}">
                        <input hidden name="address" value="{{ $address }}">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>