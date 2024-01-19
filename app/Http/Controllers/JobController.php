<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Auth::user()->jobs;
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('jobs.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated_data = $request->validate([
            'job_title'=>['required', 'string', 'max:255'],
            'company'=>['required', 'string', 'max:255'],
            'company_logo'=>['nullable', 'image'],
            'salary'=>['required', 'string'],
            'location'=>['required', 'string', 'max:255'],
            'url'=>['nullable', 'url', 'max:255'],
            'description'=>['required'],
            'job_type'=>['required', 'in:Internship,Full time,Part time,Contract'],
            'contact'=>['required', 'string', 'max:255']
        ]);

        $request->validate([
            'tags'=>['required', 'array', 'max:5']
        ]);
        $validated_data['user_id'] = auth()->user()->id;
        
        if ($request->hasFile('company_logo')) {
            $company_logo = $request->file('company_logo')->store('company-logos', 'public');
            $validated_data['company_logo'] = $company_logo;
        }

        $job = Job::create($validated_data);
        if($job){
            $job->tags()->attach($request->tags);
            return redirect('job')->with('status', 'Success, new job added!');;
        } else{
            return redirect('job')->with('status', 'Sorry something went wrong. Please, try again');;
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        if(! Gate::allows('job-owner', $job)){
            abort(404);
        } else{
            return view('jobs.show', compact('job'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $tags = Tag::all();
        $job = Job::findOrFail($id);
        if(! Gate::allows('job-owner', $job)){
            abort(404);
        } else{
            return view('jobs.edit', compact('job', 'tags'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);
        if(! Gate::allows('job-owner', $job)){
            abort(404);
        } else{
            $validated_data = $request->validate([
                'job_title'=>['required', 'string', 'max:255'],
                'company'=>['required', 'string', 'max:255'],
                'company_logo'=>['nullable', 'image'],
                'salary'=>['required', 'string'],
                'location'=>['required', 'string', 'max:255'],
                'url'=>['nullable', 'url', 'max:255'],
                'description'=>['required', 'string'],
                'job_type'=>['required', 'in:internship,full_time,part_time,contract'],
                'contact'=>['required', 'string', 'max:255']
            ]);

            $request->validate([
                'tags'=>['required', 'array', 'max:5']
            ]);
            if ($request->hasFile('company_logo')){
                if ($job->company_logo){
                    Storage::disk('public')->delete($job->company_logo);
                    $updated_company_logo = $request->file('company_logo')->store('company-logos', 'public');
                    $validated_data['company_logo'] = $updated_company_logo;
                } else{
                    $new_company_logo = $request->file('company_logo')->store('company-logos', 'public');
                    $validated_data['company_logo'] = $new_company_logo;
                }
            }

            if ($job->update($validated_data)){
                $job->tags()->detach();
                $job->tags()->attach($request->tags);      
                return redirect('job')->with('status', 'Success, job updated!');
            } else{
                return redirect('job')->with('status', 'Sorry something went wrong. Please, try again');
            };
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        if(! Gate::allows('job-owner', $job)){
            return redirect('job');
        } else{
            if ($job->company_logo){
                Storage::disk('public')->delete($job->company_logo);
            }
            $job->delete();
            return redirect('job')->with('status', 'Job deleted successfuly');
        }
    }
}
