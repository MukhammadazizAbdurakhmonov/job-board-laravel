<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Tag;

class PagesController extends Controller
{
    public function index(){
        $tags = Tag::all();
        $jobs = Job::latest()->paginate(10);
        return view('front-pages.index', compact('jobs', 'tags'));
    }

    public function filter_tags(string $tag){
        $jobs = Job::whereHas('tags', function($q) {
            $q->where('tag', request('tag'));})->paginate(10);
        $tags = Tag::all();
        return view('front-pages.index', compact('jobs', 'tags'));
    }

    public function job_description(string $id){
        $job = Job::findorFail($id);
        return view('front-pages/job-description', compact('job'));
    }
    public function manage_jobs(){
        return view('jobs.manage-jobs');
    }
}
