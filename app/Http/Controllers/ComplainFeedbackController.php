<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\ComplainFeedback;

class ComplainFeedbackController extends Controller
{
    public function store(Request $request)
    {
        $complainFeedback = new ComplainFeedback;
        $complainFeedback->fullname = $request->fullname;
        $complainFeedback->email = $request->email;
        $complainFeedback->number = $request->number;
        $complainFeedback->type = $request->type;
        $complainFeedback->subject = $request->subject;
        $complainFeedback->description = $request->description;
        $complainFeedback->save();
 
       return redirect()->back()->with('success', 'Your request has been submitted successfully.');
    }

    public function index(){
        // $complainFeedbacks = ComplainFeedback::orderBy('id', 'desc')->get();
        $complainFeedbacks = ComplainFeedback::all();
        return view('admin.viewFeedbackComplain', compact('complainFeedbacks'));
    }

    public function userComplainFeedbackIndex(){
        $userId = session('user_id');
        $user = User::find($userId);

        $uName = $user->firstname . ' ' . $user->lastname;
        $uEmail = $user->email;
        $uNumber = $user->contact_number;
        return view('user.feedbackComplain' , compact('uName', 'uEmail', 'uNumber'));
    }
}
