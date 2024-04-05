<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = Username::orderBy('id', 'desc');

        if (request()->has('search_name')) {
            $users = $users->where('name', 'like', '%' . request()->get('search_name','') . '%');
        }
        if (request()->has('search_email')) {
            $users = $users->where('email', 'like', '%' . request()->get('search_email','') . '%');
        }
        if (request()->has('search_phone')) {
            $users = $users->where('phone', 'like', '%' . request()->get('search_phone','') . '%');
        }
        if (request()->has('search_address')) {
            $users = $users->where('address', 'like', '%' . request()->get('search_address','') . '%');
        }

        return view('index', [
            'users' => $users->paginate(5)
        ]);
    }

    public function archive()
    {
        $return = url()->previous();

        $users = Username::onlyTrashed()
            ->orderBy('id', 'desc')
            ->get();

        return view('archive')
            ->with('return', $return)
            ->with('users', $users);
    }

    public function create()
    {
        $return = url()->previous();

        return view('create')
            ->with('return', $return);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $return = url()->previous();
        // dd($request);

        return view('edit')
            ->with('return', $return)
            ->with('id', $id)
            ->with('name', $name)
            ->with('email', $email)
            ->with('phone', $phone)
            ->with('address', $address);
    }

    public function edit_return(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $return = $request->input('return');

        // dd($request);

        return view('edit2')
            ->with('return', $return)
            ->with('id', $id)
            ->with('name', $name)
            ->with('email', $email)
            ->with('phone', $phone)
            ->with('address', $address);
    }

    public function details(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $return = url()->previous();

        return view('details')
            ->with('return', $return)
            ->with('id', $id)
            ->with('name', $name)
            ->with('email', $email)
            ->with('phone', $phone)
            ->with('address', $address);
    }

    public function update_remain(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $now = now();
        $updated = $now;

        DB::table('user_lists')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'updated_at' => $updated
            ]);

        return redirect()->back()
            ->with('success', '');
    }

    public function update_return(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $now = now();
        $updated = $now;
        $return = $request->input('return');

        DB::table('user_lists')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'updated_at' => $updated
            ]);

        return redirect($return)
            ->with('success', '');
    }

    public function store_remain(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        $request->validate([
            'email' => 'required|unique:user_lists'
        ]);

        DB::table('user_lists')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'created_at' => now()
        ]);

        return redirect()->back()
            ->with('success', '');
    }

    public function store_return(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $return = $request->input('return');

        $request->validate([
            'email' => 'required|unique:user_lists'
        ]);

        DB::table('user_lists')->insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'created_at' => now()
        ]);

        return redirect($return)
            ->with('success', '');
    }

    public function destroy(Username $user, Request $request)
    {
        if ($user->trashed()) {
            $user->forceDelete();

            $return = $request->input('return');

            return redirect($return)
                ->with('success', '');
        }

        $user->delete();

        return redirect()->back()
            ->with('success', '');
    }

    public function restore(Username $user, Request $request)
    {
        $user->restore();

        $return = $request->input('return');

        return redirect($return)
            ->with('success', '');
    }
}
