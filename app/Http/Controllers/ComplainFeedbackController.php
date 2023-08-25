<?php

namespace App\Http\Controllers;

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
}
