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
    @if ($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-warning" role="alert">
        {{$error}}
    </div>
    @endforeach
    @endif
    <div class="container" style="padding: 1em">
        <div class="d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="5">Add New</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th colspan="2">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="post" action="{{ route('users.store') }}">
                                @csrf
                                @method('post')
                                <tr>
                                    <td><input type="text" name="name" value="" required pattern="[a-zA-Z ]+" title="Alphabetical characters only" /></td>
                                    <td><input type="text" name="email" value="" required onkeyup="
                                        var start = this.selectionStart;
                                        var end = this.selectionEnd;
                                        this.value = this.value.toLowerCase();
                                        this.setSelectionRange(start, end);" />
                                    </td>
                                    <td><input type="text" name="phone" value="" pattern="[a-zA-Z0-9 ]+" title="Alphanumeric values" /></td>
                                    <td><textarea type="text" name="address" value="" pattern="[a-zA-Z0-9 ]+"></textarea></td>
                                    <td><button class="btn btn-primary btn-sm" type="submit">Submit</button></td>
                                </tr>
                            </form>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl" style="padding: 1em">
        <div class="d-flex justify-content-center align-items-center">
            <div class="">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">List of Users</th>
                                <td colspan="8"><a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                        </svg>
                                        Add New</a></td>
                                <form method="get" action="{{ route('users.archive') }}">
                                    @csrf
                                    @method('get')
                                    <td><button type="submit" class="btn btn-primary btn-sm">Deleted Items</a></td>
                                </form>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Updated at*</th>
                                <th colspan="4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('patch')
                                    <td>{{$user->id}}</td>
                                    <input hidden name="id" value="{{$user->id}}">
                                    <td><input type="text" name="name" value="{{$user->name}}" placeholder="{{$user->name}}" required pattern="[a-zA-Z ]+" title="Alphabetical characters only"></td>
                                    <td>{{$user->email}}</td>
                                    <td><input type="text" name="phone" value="{{$user->phone}}" placeholder="{{$user->phone}}" pattern="[a-zA-Z0-9 ]+" title="Alphanumeric values"></td>
                                    <td><textarea type="text" name="address" value="{{$user->address}}" placeholder="{{$user->address}}" pattern="[a-zA-Z0-9 ]+">{{$user->address}}</textarea></td>
                                    <td>{{$user->created_at->format('d F Y H:i:s')}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td><button type="submit" class="btn btn-primary btn-sm">Save</button> </td>
                                </form>
                                <form method="get" action="{{ route('users.edit') }}">
                                    @csrf
                                    @method('get')
                                    <input hidden name="id" value="{{$user->id}}">
                                    <input hidden name="name" value="{{$user->name}}">
                                    <input hidden name="email" value="{{$user->email}}">
                                    <input hidden name="phone" value="{{$user->phone}}">
                                    <input hidden name="address" value="{{$user->address}}">
                                    <td><button type="submit" class="btn btn-primary btn-sm">Edit</button> </td>
                                </form>
                                <form method="get" action="{{ route('users.details') }}">
                                    @csrf
                                    @method('get')
                                    <input hidden name="id" value="{{$user->id}}">
                                    <input hidden name="name" value="{{$user->name}}">
                                    <input hidden name="email" value="{{$user->email}}">
                                    <input hidden name="phone" value="{{$user->phone}}">
                                    <input hidden name="address" value="{{$user->address}}">
                                    <td><button type="submit" class="btn btn-info btn-sm">Details</button> </td>
                                </form>
                                <form method="post" action="{{ route('users.delete', ['user' => $user->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <input hidden name="id" value="{{$user->id}}">
                                    <input hidden name="name" value="{{$user->name}}">
                                    <input hidden name="email" value="{{$user->email}}">
                                    <input hidden name="phone" value="{{$user->phone}}">
                                    <input hidden name="address" value="{{$user->address}}">
                                    <td><button type="submit" class="btn btn-danger btn-sm">Delete</button> </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg></td>
                                <form method="get" action="{{ route('users.index') }}">
                                    @csrf
                                    @method('get')
                                    <td><input type="text" name="search_name" placeholder="Search by Name"></td>
                                </form>
                                <form method="get" action="{{ route('users.index') }}">
                                    @csrf
                                    @method('get')
                                    <td><input type="text" name="search_email" placeholder="Search by Email"></td>
                                </form>
                                <form method="get" action="{{ route('users.index') }}">
                                    @csrf
                                    @method('get')
                                    <td><input type="text" name="search_phone" placeholder="Search by Phone"></td>
                                </form>
                                <form method="get" action="{{ route('users.index') }}">
                                    @csrf
                                    @method('get')
                                    <td colspan="6"><input type="text" name="search_address" placeholder="Search by Address"></td>
                                </form>
                                <td><a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">Refresh</a></td>
                            </tr>
                            <tr>
                                <td colspan="11">
                                    <b>
                                        *format('d F Y H:i:s') breaks on null values
                                    </b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <div class="container" style="padding: 1em">
        <div class="d-flex justify-content-center align-items-center">
            {{ $users->links() }}
        </div>
    </div>
    @if(session()->has('success'))
    <div class="container" style="padding: 1em">
        <div class="d-flex justify-content-center align-items-center">
            {{session('success')}}
        </div>
    </div>
    @endif
</footer>

</html>