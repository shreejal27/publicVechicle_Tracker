<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplainFeedback;

class ComplainFeedbackController extends Controller
{
    public function store(Request $request)
    {
        $complainFeedback = new ComplainFeedback;
        $complainFeedback->username = $request->username;
        $complainFeedback->type = $request->formType;
        $complainFeedback->description = $request->formDescription;
        $complainFeedback->save();
 
       return redirect()->back()->with('message', 'Your form has been submitted successfully');
    }
}
