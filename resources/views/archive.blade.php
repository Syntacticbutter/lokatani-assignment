<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/app.css" type="text/css">
</head>

<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="container" style="padding: 1em">
        <div class="d-flex justify-content-center align-items-center">
            <div class="">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="7">Deleted Items</th>
                                <td><a href="{{ url($return) }}" class="btn btn-danger btn-sm">Back</a></td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Deleted at</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td><textarea readonly>{{$user->address}}</textarea></td>
                                <td>{{$user->deleted_at}}</td>
                                <form method="post" action="{{ route('users.restore', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('post')
                                    <input hidden name="return" value="{{url()->previous()}}">
                                    <td><button type="submit" class="btn btn-success btn-sm">Restore</button> </td>
                                </form>
                                <form method="post" action="{{ route('users.delete', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <input hidden name="return" value="{{url()->previous()}}">
                                    <td><button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button> </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>