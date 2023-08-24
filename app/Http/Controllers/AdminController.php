<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Stop;
use App\Models\User;
use App\Models\DriverLocation;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function index()
    // {
    //     // Logic for retrieving all admin records
    //     $admins = Admin::all();

    //     // Pass the admins data to the view
    //     return view('admin.index', compact('admins'));
    // }

    // public function create()
    // {
    //     // Return the create admin form view
    //     return view('admin.create');
    // }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('admin_id');
        return redirect()->route('login')->with('success', ' Logout successful');
    }

    
   //this is for admin dashboard from navbar
   public function adminDashboard()
   {
    return view('admin.adminDashboard')
       ->with($this->getCountsForAdmin());
   }

    private function getCountsForAdmin()
    {
       $userCount = User::count();
       $driverCount = Driver::count();
       $stopCount = Stop::count();

       //get driver whose status is on
        $driverOnlineCount = DriverLocation::where('status', 'on')->count();

        //get all the details of driver from driver_id whose status is on 
        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();
        
        $driverDetails = [];
        $i=0;
        foreach($driverLocations as $driverData){
            //get driver name
            $driver = Driver::where('id', $driverData->driver_id)->first();

            $driverDetails[$i]['driverName'] = $driver->firstname;
            $driverDetails[$i]['vehicleType'] = $driver->vehicle_type;
            $driverDetails[$i]['contactNumber'] = $driver->contact_number;
            $driverDetails[$i]['vehicleNumber'] = $driver->vehicle_number;
            $i++;
        }
        


       return compact('userCount', 'driverCount', 'stopCount', 'driverOnlineCount', 'driverDetails');
    }

}
