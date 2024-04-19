<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('pages.jobs.jobs_create')->with('tag_options', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Jobs;

        $item->item_title = $request->item_title;
        $item->item_slug = Str::slug($request->item_title.'-'.$request->item_location, '-');
        $item->item_content = $request->item_content;
        $item->item_location = $request->item_location;
        $item->item_type = $request->item_type;
        $item->item_social_linkedin = $request->item_social_linkedin;
        $item->item_social_xing = $request->item_social_xing;
        $item->item_contact_full_name = $request->item_contact_full_name;
        $item->item_contact_email = $request->item_contact_email;
        $item->item_contact_phone = $request->item_contact_phone;
        $item->item_is_active = $request->item_is_active;
        $tags_array = $request->item_tags;
        $item->item_tags = $tags_array;

        $item->save();

        return redirect('/jobs/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs)
    {
        $jobs = Jobs::all();
        return view('pages.jobs.jobs')->with('jobs',$jobs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobs  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Jobs::find($id);
        $tags = Tag::all();

        return view('pages.jobs.jobs_edit')->with('item',$item)->with('tag_options', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = Jobs::find($request->id);

        $item->item_title = $request->item_title;
        $item->item_content = $request->item_content;
        $item->item_location = $request->item_location;
        $item->item_type = $request->item_type;
        $item->item_social_linkedin = $request->item_social_linkedin;
        $item->item_social_xing = $request->item_social_xing;
        $item->item_contact_full_name = $request->item_contact_full_name;
        $item->item_contact_email = $request->item_contact_email;
        $item->item_contact_phone = $request->item_contact_phone;
        $item->item_is_active = $request->item_is_active;
        $tags_array = $request->item_tags;
        $item->item_tags = $tags_array;

        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobs  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jobs::find($id);

        $item->delete();

        return redirect('/jobs/show');
    }

    /**
     * Display a listing of the resource for the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function showJobList()
    {
        $jobs = Jobs::where('item_is_active', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.jobs.jobs_list')->with('jobs',$jobs);
    }

    /**
     * Display a listing of the resource for the User with the given Topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function showJobListTopic($topic)
    {
        $topics = Jobs::where('item_is_active', 1)->where('item_tags', 'like', '%'.$topic.'%')->get();
        $jobs = [];
        $topic_jobs_ids = [];

        foreach($topics as $item){
            $topic_jobs_ids[] = $item->id;
        }

        // If we didn't get enough Topic Jobs, get some latest Jobs item aswell
        if(count($topic_jobs_ids) < 20){
            $items_to_take = 20 - count($topic_jobs_ids);
            $jobs = Jobs::where('item_is_active', 1)->whereNotIn('id', $topic_jobs_ids)->take($items_to_take)->latest()->get();
        }

        return view('pages.jobs.job_topic_list')->with('jobs',$jobs)->with('topics', $topics)->with('topic_title', $topic);
    }

    /**
     * Display an item with all its data for the Job Description page
     *
     * @return \Illuminate\Http\Response
     */
    public function showJobItem($slug)
    {
        $item = Jobs::all()->where('item_slug', $slug)->first();
        $jobs = [];
        $related = [];
        $related_jobs_ids = [];

        if($item->count() != 0){
            $related_jobs_ids[] = $item->id;
        }

        if($item->item_tags != null) {
            $tags = $item->item_tags;

            // Get related Jobs using Tags and excluding existing one
            $query = Jobs::query();

            foreach($tags as $tag_item){
                $query->orWhere('item_tags', 'like', '%'.$tag_item.'%')->where('item_is_active', 1)->where('id', '!=', $item->id);
            }
            $related = $query->take(5)->get();
    
            foreach($related as $related_item){
                $related_jobs_ids[] = $related_item->id;
            }
        }

        // If we didn't get enough related Jobs, merge it with the latest Jobs item
        if(count($related) < 5){
            $items_to_take = 5 - count($related);
            $jobs = Jobs::where('item_is_active', 1)->whereNotIn('id', $related_jobs_ids)->take($items_to_take)->latest()->get();
        }

        return view('pages.jobs.jobs_description')->with('item', $item)->with('jobs', $jobs)->with('related', $related);
    }
}
