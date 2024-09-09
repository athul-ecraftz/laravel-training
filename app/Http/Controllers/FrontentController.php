<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userDetail;
use Illuminate\Http\Request;

class FrontentController extends Controller
{
    public function index()
    {

        $users = User::has('books')->withCount('books')->withTrashed()->latest()->paginate(10); // select * from users where deleted_at NULL

        return view('HomePage', compact('users'));
    }
    public function about()
    {

        return view('about');
    }
    public function contact()
    {

        return view('contact');
    }
    public function create()
    {

        return view('createUser');
    }
    public function saveUser(Request $request)
    {
        request()->validate([
            'name' => 'required|min:6|max:10',
            'phone' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'dob' => 'required',
        ]);

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $dob = $request->dob;
        $status = $request->status;

        $user = User::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'date_of_birth' => $dob,
            'status' => $status,
        ]);

        // return "Inserted";
        return  redirect()->route('home')->with('message', 'User Created Successfully');

        // $user = new User;

        // $user->name = $name;
        // $user->phone = $phone;
        // $user->email = $email;
        // $user->address = $address;
        // $user->date_of_birth = $dob;
        // $user->status = $status;
        // $user->save();
    }
    public function edit($i)
    {
        $userId = decrypt($i);
        $user = User::find($userId);
        return view('editUser', compact('user'));
    }
    public function view($i)
    {
        $userId = decrypt($i);
        $user = User::find($userId);

        // $userDetails = userDetail::find($userId);

        return view('viewUser', compact('user'));
    }
    public function updateUser(Request $request)
    {
        // return $request->all();
        $userId = decrypt($request->userid);
        $user = User::find($userId)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'date_of_birth' => $request->dob,
            'status' => $request->status

        ]);

        return  redirect()->route('home')->with('message', 'User Edited Successfully');
    }
    public function deleteUser($i)
    {
        $userId = decrypt($i);
        $user = User::find($userId)->delete();
        return  redirect()->route('home')->with('message', 'User Deleted Successfully');
    }
    public function activateUser($i)
    {
        $userId = decrypt($i);
        $user = User::withTrashed()->find($userId);
        $user->restore();
        return  redirect()->route('home')->with('message', 'User Restored Successfully');
    }
    public function forcedeleteUser($i)
    {
        $userId = decrypt($i);
        $user = User::withTrashed()->find($userId);
        $user->forceDelete();
        return  redirect()->route('home')->with('message', 'User Force deleted Successfully');
    }
    public function register()
    {
        session()->put('username', 'Amal');
        session()->put('userid', 21);
        session()->flash('message', 'Message from flash');
        return redirect()->route('login');
        // return view('register');
    }
    public function login()
    {

        return view('login');
    }
    public function doLogin()
    {
        $input = [
            'email' => request('email'),
            'password' => request('password')
        ];
        $email = request('email');
        if (auth()->attempt($input)) {
            $dataStore = [
                'email' => $email,
                'isLoggedIn' => true
            ];
            session()->put('userDetails', $dataStore);
            return  redirect()->route('home')->with('message', 'Login Successfull');
        } else {
            return  redirect()->route('login')->with('message', 'Login Failed');
        }
    }
}
