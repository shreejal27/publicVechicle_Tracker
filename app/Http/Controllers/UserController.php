<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
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

        // Get the current user's existing profile picture filename
        $previousProfileImage = $user->profileImage;

        $uploadedFile = $request->file('userImage');

        if ($uploadedFile) { 
        $filename = uniqid() . '_' . $uploadedFile->getClientOriginalName();

        // Move the uploaded file to the desired directory 
        $uploadedFile->move('images/users/', $filename);

        // Update the user's profileImage column with the original filename
        $user->profileImage = $filename;
        
        //update session value to show profile image on the topBar
        session(['userProfile' => $filename]);
        
        // Delete the previous profile picture from storage
        if ($previousProfileImage && $uploadedFile !== 'anonymous.jpg') {
            $pathToDelete = public_path('images/users/' . $previousProfileImage);
            if (file_exists($pathToDelete)) {
                unlink($pathToDelete);
            }
        }
    }
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

        //get all the details of driver from driver_id whose status is on 
        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();
        $driverDetails = [];
        $i=0;
        foreach($driverLocations as $driverData){
            //get driver name
            $driver = Driver::where('id', $driverData->driver_id)->first();
            $driverDetails[$i]['vehicleType'] = $driver->vehicle_type;
            $i++;
        }

        $vehicleTypesArray = [];
        foreach ($driverDetails as $driverDetail) {
            if (isset($driverDetail['vehicleType'])) {
                $vehicleTypesArray[] = $driverDetail['vehicleType'];
            }
        }

        $distinctVehicleCounts = array_count_values($vehicleTypesArray);
        $vehicleTypes = array_keys($distinctVehicleCounts);
        $vehicleCounts = array_values($distinctVehicleCounts);


         //get stop count
        $stopCount = Stop::count();
        return view('user.userDashboard', compact('dateToday', 'userAddress', 'userOccupation', 'userEmail','driverOnlineCount', 'stopCount', 'vehicleTypes', 'vehicleCounts'));
    }

    //get all user data for admin
    public function adminViewUsers(){
        $users = User::all();
        return view('admin.viewUsers', compact('users'));
    }  
}
