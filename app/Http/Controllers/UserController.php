<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DriverLocation;
use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->occupation = $request->occupation;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('success', 'User has been registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('user_id');
        return redirect()->route('login')->with('success', 'User Logout successful');
    }

    public function profile()
    {
        $userId = session('user_id');
        $user = User::find($userId);
        return view('user.profile', compact('user'));
    }

    public function update(Request $request){
        $userId = session('user_id');
        $user = User::find($userId);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->occupation = $request->occupation;
         $uploadedFile = $request->userImage;

        //  $filename = uniqid() . '_' . $uploadedFile->getClientOriginalName();
         $filename = $uploadedFile->getClientOriginalName();
         // Move the uploaded file to the desired directory (e.g., public/images/users/)
         $uploadedFile->move('images/users/', $filename);
         // Update the user's profileImage column with the original filename
         $user->profileImage = $uploadedFile->getClientOriginalName();

        $user->save();
        return redirect()->route('profile')->with('message', 'Your Profile Has Been Updated!');
    }

    public function updateUserCredentials(Request $request){
        $userId = session('user_id');
        $user = User::find($userId);
        $user->password = $request->rpassword;
        $user->save();
        return redirect()->route('profile')->with('success', 'Credentials Updated');
    }

    public function dashboard(){
        //get date today with just initials of day name
        $dateToday = date('D, d M Y');
        $userId = session('user_id');
        $user = User::find($userId);

        //get user address 
        $userAddress = $user->address;
        $userOccupation = $user->occupation;
        $userEmail = $user->email;

          //get online drivers count
         $driverOnlineCount = DriverLocation::where('status', 'on')->count();

         //get stop count
            $stopCount = Stop::count();
        return view('user.userDashboard', compact('dateToday', 'userAddress', 'userOccupation', 'userEmail','driverOnlineCount', 'stopCount'));
    }

    //get all user data for admin
    public function adminViewUsers(){
        $users = User::all();
        return view('admin.viewUsers', compact('users'));
    }  
}
