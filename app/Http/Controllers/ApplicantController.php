<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use App\Mail\JobApplied;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ApplicantController extends Controller
{
    public function store(Request $request, Job $job) : RedirectResponse
    {  
        
        //check if the already applicated
        $existingApplicant = Applicant::where('job_id', $job->id)->where('user_id', Auth::id())->exists();

        if ($existingApplicant) {
            return redirect()->back()->with('error', 'You have already applied for this job');
        }
        // Validate incoming data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle resume uplaod
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // Store the application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = Auth::id();
        $application->save();

        // Send email notification
        Mail::to($job->user->email)->send(new JobApplied($application, $job));


       

        return redirect()->back()->with('success', 'Your application has been submitted');
    
    }

    public function destroy( $id) : RedirectResponse
    {   // Delete The application
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('error', 'Application deleted successfully');
    }
}
