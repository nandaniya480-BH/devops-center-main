<?php

namespace App\Http\Controllers;

use App\Models\ProfilePods;
use App\Models\Tag;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProfilePodsController extends Controller
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
        $languages = Language::all();
        return view('pages.profile.profile_create')->with('tag_options', $tags)->with('langauge_options', $languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new ProfilePods;

        $tags_array = $request->item_skill_tags;

        $item->item_name = $request->item_name;
        $item->item_last_name = $request->item_last_name;
        $item->item_profile_number = 0;
        $item->item_profile_title = $request->item_profile_title;
        $item->item_slug = Str::slug($request->item_profile_title);
        $item->item_content_teaser = $request->item_content_teaser;
        $item->item_location = $request->item_location;
        $item->item_content = $request->item_content;
        $item->item_available_from_date = date('Y-m-d', strtotime($request->item_available_from_date));
        $item->item_skill_tags = $tags_array;
        $item->item_experience = $request->item_experience;
        $item->item_language = $request->item_language;
        $item->item_is_active = $request->item_is_active;

        $item->save();

        $profileNumber = $item->id * 10;
        $item->item_profile_number = $profileNumber;
        $item->item_slug = Str::slug($request->item_profile_title.'-'.$profileNumber, '-');
        $item->save();

        return redirect('/profile/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilePods  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilePods $profile)
    {
        $profile = ProfilePods::all()->where('item_is_active', 1);
        return view('pages.profile.profile')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilePods  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ProfilePods::find($id);
        $tags = Tag::all();
        $languages = Language::all();

        return view('pages.profile.profile_edit')->with('item', $item)->with('tag_options', $tags)->with('langauge_options', $languages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilePods  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = ProfilePods::find($request->id);

        $item->item_profile_number = $request->id * 10;
        $item->item_name = $request->item_name;
        $item->item_last_name = $request->item_last_name;
        $item->item_profile_title = $request->item_profile_title;
        $item->item_content_teaser = $request->item_content_teaser;
        $item->item_location = $request->item_location;
        $item->item_content = $request->item_content;
        $item->item_available_from_date = date('Y-m-d', strtotime($request->item_available_from_date));
        $tags_array = $request->item_skill_tags;
        $item->item_skill_tags = $tags_array;
        $item->item_experience = $request->item_experience;
        $item->item_language = $request->item_language;
        $item->item_is_active = $request->item_is_active;

        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilePods  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProfilePods::find($id);

        $item->delete();

        return redirect('/profile/show');
    }


    /**
     * Display a listing of the resource for the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileList(Request $request)
    {
        $tags = $request->tags ?? [];
        $experience = $request->experience ?? null;

        $all_tags = Tag::all();

        // If we're getting a Post 
        if (\Request::isMethod('post'))
        {
            if($tags == [] && $experience == null){
                $profile = ProfilePods::where('item_is_active', 1)->paginate(10);
                return view('pages.profile.profile_list')->with('profile',$profile)->with('tags', $tags)->with('experience', $experience)->with('tag_options', $all_tags);
            }
            elseif($tags == [] && $experience != null){
                $profile = ProfilePods::where('item_is_active', 1)->where('item_experience', $experience)->paginate(10);
                return view('pages.profile.profile_list')->with('profile',$profile)->with('tags', $tags)->with('experience', $experience)->with('tag_options', $all_tags);
            }
            elseif($tags != [] && $experience == null){

                $query = ProfilePods::query();

                foreach($tags as $tag_item){
                    $query->orWhere('item_skill_tags', 'LIKE', '%'.$tag_item.'%')->where('item_is_active', 1);
                }
                $profile = $query->paginate(10);

                return view('pages.profile.profile_list')->with('profile',$profile)->with('tags', $tags)->with('experience', $experience)->with('tag_options', $all_tags);
            }
            elseif($tags != [] && $experience != null){

                $query = ProfilePods::query();

                foreach($tags as $tag_item){
                    $query->orWhere('item_skill_tags', 'LIKE', '%'.$tag_item.'%')->where('item_experience', $experience)->where('item_is_active', 1);
                }
                $profile = $query->paginate(10);
                
                return view('pages.profile.profile_list')->with('profile',$profile)->with('tags', $tags)->with('experience', $experience)->with('tag_options', $all_tags);
            } 
        }
        // If we're getting a Post 
        if (\Request::isMethod('get'))
        {
            $profile = ProfilePods::where('item_is_active', 1)->paginate(10);
            return view('pages.profile.profile_list')->with('profile',$profile)->with('tags', $tags)->with('experience', $experience)->with('tag_options', $all_tags);
        }
    }

     /**
     * Display a listing of the resource for the User with the given Topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileListTopic($topic)
    {
        $topics = ProfilePods::where('item_is_active', 1)->where('item_skill_tags', 'like', '%'.$topic.'%')->get();
        $profiles = [];
        $topic_profile_ids = [];

        foreach($topics as $item){
            $topic_profile_ids[] = $item->id;
        }

        // If we didn't get enough Topic Profiles, get some latest Profiles item aswell
        if(count($topic_profile_ids) < 20){
            $items_to_take = 20 - count($topic_profile_ids);
            $profiles = ProfilePods::where('item_is_active', 1)->whereNotIn('id', $topic_profile_ids)->take($items_to_take)->latest()->get();
        }

        return view('pages.profile.profile_topic_list')->with('profile',$profiles)->with('topics', $topics)->with('topic_title', $topic);
    }

    /**
     * Display an item with all its data for the Profile Description page
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfileItem($slug)
    {
        $item = ProfilePods::where('item_slug', $slug)->first() ?? [];
        $profiles = [];
        $related = [];
        $related_profile_ids = [];

        if($item->count() != 0){
            $related_profile_ids[] = $item->id;
        }

        if($item->item_skill_tags != null) {
            $tags = $item->item_skill_tags;

            // Get related Profiles using Tags and excluding existing one
            $query = ProfilePods::query();

            foreach($tags as $tag_item){
                $query->orWhere('item_skill_tags', 'like', '%'.$tag_item.'%')->where('item_is_active', 1)->where('id', '!=', $item->id);
            }
            $related = $query->take(5)->get();
            

            foreach($related as $related_item){
                $related_profile_ids[] = $related_item->id;
            }
        }

        // If we didn't get enough related Profile, merge it with the latest Profiles items
        if(count($related) < 5){
            $items_to_take = 5 - count($related);
            $profiles = ProfilePods::where('item_is_active', 1)->whereNotIn('id', $related_profile_ids)->take($items_to_take)->latest()->get();
        }

        return view('pages.profile.profile_description')->with('item', $item)->with('profile', $profiles)->with('related', $related);
    }
}
