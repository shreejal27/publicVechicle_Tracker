<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverLocation;
use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        // Retrieve all drivers from the database
        $drivers = Driver::all();

        // Return the drivers to a view or perform any other logic
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'contact_number' => [
                'required',
                'string',
                'unique:drivers,contact_number', // Assuming the drivers table is used for drivers
                'regex:/^98\d{8}$/u', // Custom regex rule for numbers starting with "98" and having 10 digits
            ],
            'address' => 'required|string',
            'license_number' => 'required|string|unique:drivers,license_number',
            'vehicle_type' => 'required|string',
            'vehicle_number' => 'required|string|unique:drivers,vehicle_number',
            'username' => 'required|string|unique:drivers,username',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new driver
        $driver = new Driver;
        $driver->fill($validatedData);
        $driver->save();
    
        return redirect()->back()->with('success', 'Driver has been registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('driver_id');
        return redirect()->route('login')->with('success', 'Driver Logout successful');
    }

    public function adminViewDriver(){
        $drivers = Driver::all();

        $driverLocations = DriverLocation::where('status', 'on')->latest()->get();

        $workingDriverId = $driverLocations->pluck('driver_id');
        
        return view('admin.viewDriversReports', compact('drivers', 'workingDriverId'));
    }

    public function dashboard(){
        //get date today with just initials of day name
        $dateToday = date('D, d M Y');

        $driverVehicleType = session('vehicleType');

        $driverVehicleStops = Stop::where('vehicle_type', $driverVehicleType)->count();


        return view('driver.driverDashboard', compact('dateToday', 'driverVehicleType', 'driverVehicleStops'));
    }

        //this is for driver profile
        public function driverProfile()
        {
            $driverId = session('driver_id');
            $driver = Driver::find($driverId);
            return view('driver.driverProfile', compact('driver'));
        }

        public function driverUpdate(Request $request){
            $driverId = session('driver_id');
            $driver = Driver::find($driverId);
            $driver->firstname = $request->firstname;
            $driver->lastname = $request->lastname;
            $driver->address = $request->address;
            $driver->license_number = $request->licenseNumber;
            $driver->vehicle_type = $request->vehicleType;
            $driver->contact_number = $request->contactNumber;
            $driver->vehicle_number = $request->vehicleNumber;
    
            // Get the current user's existing profile picture filename
            $previousProfileImage = $driver->profileImage;
    
            $uploadedFile = $request->file('driverImage');
    
            if ($uploadedFile) { 
            $filename = uniqid() . '_' . $uploadedFile->getClientOriginalName();
    
            // Move the uploaded file to the desired directory 
            $uploadedFile->move('images/drivers/', $filename);
    
            // Update the user's profileImage column with the original filename
            $driver->profileImage = $filename;
            
            //update session value to show profile image on the topBar
            session(['driverProfile' => $filename]);
            
            // Delete the previous profile picture from storage
            if ($previousProfileImage && $uploadedFile !== 'anonymous.jpg') {
                $pathToDelete = public_path('images/drivers/' . $previousProfileImage);
                if (file_exists($pathToDelete)) {
                    unlink($pathToDelete);
                }
            }
        }
        $driver->save();
        return redirect()->route('driverProfile')->with('message', 'Your Profile Has Been Updated!');
    }
    
        public function updatedriverCredentials(Request $request){
            $driverId = session('driver_id');
            $driver = driver::find($driverId);
            $driver->password = $request->rpassword;
            $driver->save();
            return redirect()->route('driverProfile')->with('message', 'Credentials Updated');
        }

        public function adminEditDriver($id){
            $driver = Driver::where('id', $id)->first();
            return view('/admin/viewDriversEdit', compact('driver'));

        }

        public function adminDeleteDriver($id){
            $driver = Driver::find($id);
            if ($driver) {
                $driver->delete();
                return redirect()->route('adminViewDriver')->with('message', 'Driver deleted successfully.');
            }
            return redirect()->route('adminViewDriver')->with('message', 'Driver not found.');
        }

        public function adminUpdateDriver(Request $request, $id){
    
            $driver = Driver::findOrFail($id);
            $driver->firstname = $request->firstname;
            $driver->lastname = $request->lastname;
            $driver->address = $request->address;
            $driver->license_number = $request->licenseNumber;
            $driver->vehicle_type = $request->vehicleType;
            $driver->contact_number = $request->contactNumber;
            $driver->vehicle_number = $request->vehicleNumber;
    
            // Get the current user's existing profile picture filename
            $previousProfileImage = $driver->profileImage;
    
            $uploadedFile = $request->file('driverImage');
    
            if ($uploadedFile) { 
            $filename = uniqid() . '_' . $uploadedFile->getClientOriginalName();
    
            // Move the uploaded file to the desired directory 
            $uploadedFile->move('images/drivers/', $filename);
    
            // Update the user's profileImage column with the original filename
            $driver->profileImage = $filename;
            
            // Delete the previous profile picture from storage
            if ($previousProfileImage && $uploadedFile !== 'anonymous.jpg') {
                $pathToDelete = public_path('images/drivers/' . $previousProfileImage);
                if (file_exists($pathToDelete)) {
                    unlink($pathToDelete);
                }
            }
        }
        $driver->save();
        return redirect()->route('adminViewDriver')->with('message', 'Driver Profile Has Been Updated!');
        }
    
    
}
