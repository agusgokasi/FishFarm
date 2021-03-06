<?php

namespace App\Http\Controllers;

// add class
use Auth;
use App\Project;
use App\User;
use App\Slot;
use App\Investasion;
use App\Transaction;
use App\Statistic;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //menampilkan project di halaman awal
    public function welcome()
    {
    //   $projects = Project::orderBy('created_at', 'desc')->where('status', 0)->paginate(3);
      $projects = Project::orderBy('created_at', 'desc')->where('status', 0)->take(3)->get();
      $projects1 = Project::orderBy('created_at', 'desc')->where('status', 2)->take(3)->get();
      $projects2 = Project::orderBy('created_at', 'desc')->where('status', 3)->take(3)->get();
      $investasions = Investasion::orderBy('created_at', 'desc')->take(5)->get();
      $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
      $statistics = Statistic::all();
      // welcome.blade.php
      return view('welcome', compact('projects', 'investasions', 'statistics', 'projects1', 'projects2','newinvestasion'));
    }
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->where('status', 0)->paginate(6);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('projects.index', compact('projects', 'newinvestasion'));
    }
    public function index_terdanai()
    {
        $projects = Project::orderBy('created_at', 'desc')->where('status', 2)->paginate(6);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('projects.index_terdanai', compact('projects', 'newinvestasion'));
    }
    public function index_selesai()
    {
        $projects = Project::orderBy('created_at', 'desc')->where('status', 3)->paginate(6);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('projects.index_selesai', compact('projects', 'newinvestasion'));
    }

    public function index_guest()
    {
        $projects = Project::orderBy('created_at', 'desc')->where('status', 0)->paginate(6);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app_guest.blade.php
        return view('projects.index_guest', compact('projects', 'newinvestasion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('projects.create', compact('newinvestasion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi saat create project
        $this->validate($request, [
            'title' => 'required|min:3',
            'opened_at' => 'required|date|before:closed_at',
            'closed_at' => 'required|date|after:opened_at',
            'description' => 'required|min:10',
            'address' => 'required|min:10',
            'slot' => 'required|min:1|max:500',
            'project_price' => 'required|numeric|min:1000000|max:900000000000000000',
            'project_image' => 'required|mimes:jpeg,jpg,png|max:5000kb',
            'project_image1' => 'required|mimes:jpeg,jpg,png|max:5000kb',
            'project_image2' => 'required|mimes:jpeg,jpg,png|max:5000kb',
        ]);

        // gambar
        $image = $request->file('project_image');
        $fileName = time() . $image->getClientOriginalName();
        $request->file('project_image')->storeAs('public/project_image', $fileName);

        $image1 = $request->file('project_image1');
        $fileName1 = time() . $image1->getClientOriginalName();
        $request->file('project_image1')->storeAs('public/project_image1', $fileName1);

        $image2 = $request->file('project_image2');
        $fileName2 = time() . $image2->getClientOriginalName();
        $request->file('project_image2')->storeAs('public/project_image2', $fileName2);

        //slug
        $slug = str_slug($request->title, '-');

        if(Project::where('slug',$slug)->first() !=null) {
            $slug = $slug . '-' .time();
        }

        $projects = Project::create([
            'title' => $request['title'],
            'slug' => $slug,
            'opened_at' => $request['opened_at'],
            'closed_at' => $request['closed_at'],
            'description' => $request['description'],
            'address' => $request['address'],
            'slot' => $request['slot'],
            'project_price' => $request['project_price'],
            'user_id' => Auth::user()->id,
            'project_image' => $fileName,
            'project_image1' => $fileName1,
            'project_image2' => $fileName2,
            'slot_price' => $request['project_price'] / $request['slot'],
        ]);


        // membuat slot
        for ($i = 0; $i < $projects->slot ; $i++) {
            $slots = Slot::create([
                'price' => $projects->slot_price,
                'user_id' => 1, //super user
                'user_name' => 'Super User',
                'project_id' => $projects->id,
                'project_name' => $projects->title,
                'project_slug' => $projects->slug,
            ]);
        }

        return redirect('projects')->with('msg', 'project berhasil di submit!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::all()->where('project_slug',$project->slug)->sortKeysDesc();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        if(empty($project)) abort (404);
        if($project->status==9) abort (404);
        if($project->status==1) abort (404);
        // app.blade.php
        return view('projects.single', compact('project', 'slots', 'newinvestasion'));
    }

    public function show_guest($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::all()->where('project_slug',$project->slug)->sortKeysDesc();
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        if(empty($project)) abort (404);
        if($project->status==9) abort (404);
        if($project->status==1) abort (404);
        // app_guest.blade.php
        return view('projects.single_guest', compact('project', 'slots', 'newinvestasion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        // app.blade.php
        return view('projects.edit', compact('project', 'newinvestasion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id)->update([
            'status'=>9,
        ]);
        // validasi saat create project
        $this->validate($request, [
            'title' => 'required|min:3',
            'opened_at' => 'required|date|before:closed_at',
            'closed_at' => 'required|date|after:opened_at',
            'description' => 'required|min:10',
            'address' => 'required|min:10',
            'slot' => 'required|min:1|max:500',
            'project_price' => 'required|numeric|min:1000000|max:900000000000000000',
            'project_image' => 'required|mimes:jpeg,jpg,png|max:5000kb',
            'project_image1' => 'required|mimes:jpeg,jpg,png|max:5000kb',
            'project_image2' => 'required|mimes:jpeg,jpg,png|max:5000kb',
        ]);

        // gambar
        $image = $request->file('project_image');
        $fileName = time() . $image->getClientOriginalName();
        $request->file('project_image')->storeAs('public/project_image', $fileName);

        $image1 = $request->file('project_image1');
        $fileName1 = time() . $image1->getClientOriginalName();
        $request->file('project_image1')->storeAs('public/project_image1', $fileName1);

        $image2 = $request->file('project_image2');
        $fileName2 = time() . $image2->getClientOriginalName();
        $request->file('project_image2')->storeAs('public/project_image2', $fileName2);

        //slug
        $slug = str_slug($request->title, '-');

        if(Project::where('slug',$slug)->first() !=null) {
            $slug = $slug . '-' .time();
        }

        $projects = Project::create([
            'title' => $request['title'],
            'slug' => $slug,
            'opened_at' => $request['opened_at'],
            'closed_at' => $request['closed_at'],
            'description' => $request['description'],
            'address' => $request['address'],
            'slot' => $request['slot'],
            'project_price' => $request['project_price'],
            'user_id' => Auth::user()->id,
            'project_image' => $fileName,
            'project_image1' => $fileName1,
            'project_image2' => $fileName2,
            'slot_price' => $request['project_price'] / $request['slot'],
        ]);


        // membuat slot
        for ($i = 0; $i < $projects->slot ; $i++) {
            $slots = Slot::create([
                'price' => $projects->slot_price,
                'user_id' => 1, //super user
                'user_name' => 'Super User',
                'project_id' => $projects->id,
                'project_name' => $projects->title,
                'project_slug' => $projects->slug,
            ]);
        }

        return redirect('projects')->with('msg', 'project berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if($project->isOwner())
            $project->update(['status' => 9]);
        else abort('404');
        return redirect('projects')->with('msg', 'project berhasil di Hapus!');
    }

    public function buySlot(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->first();
        $slots = Slot::all()->where('project_slug', $project->slug);
        $statistic_dana = Statistic::find(1);
        $statistic_project = Statistic::find(2);

        
        $slot = Slot::where('project_slug', $project->slug)->where('status', 0)->first();
        if($slot->price <= Auth::user()->balance){
            $investasion = Investasion::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'project_id' => $slot->project_id,
                'project_name' => $slot->project_name,
                'nominal' => $slot->price,
                'status' => 'Investasi sedang berlangsung',
            ]);

            $slot->update([
                'status' => 1,
                'user_id' => Auth::user()->id,
                'investasion_id' => $investasion->id,
                'user_name' => Auth::user()->username,
            ]);
            Auth::user()->update([
                'balance' => Auth::user()->balance - $slot->price,
            ]);

            $transaction = Transaction::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'slot_id' => $slot->id,
                'project_id' => $slot->project_id,
                'project_name' => $slot->project_name,
                'nominal' => $slot->price,
                'transaction_type' => 2,
                'credit' => $slot->price,
                'status' => 'Slot Telah Di Beli',
            ]);

            
            // update progress
            $project->update([
                'progress' => $project->progress + $slot->price,
            ]);
            $statistic_dana->update([
                'nominal' => $statistic_dana->nominal + $slot->price,
            ]);
            if($project->progress == $project->project_price){
                $project->update(['status' => 2]);
                $statistic_project->update(['nominal' => $statistic_project->nominal+1]);
            }
        }else{
            // klo saldo ga cukup return ini
            return back()->with('msg1', 'maaf saldo anda kurang, slot gagal di Beli!');
        }

        // bikin success message
        return back()->with('msg', 'slot berhasil di Beli!');
    }

    public function showCancel($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::get()->where('project_slug',$project->slug);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        if(empty($project)) abort (404);
        if($project->status==9) abort (404);
        if($project->status==1) abort (404);
        // app.blade.php
        return view('projects.cancel', compact('project', 'slots', 'newinvestasion'));
    }

    public function sendCancel(Request $request , $slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::get()->where('project_slug',$project->slug);
        $users = new User;
        $investasions = new Investasion;
        $statistic_dana = Statistic::find(1);
        // index dari colections = id_slot-1
        $first_index_slot = $slots->first()->id-1;
        for ($i = $first_index_slot; $i < count($slots) + $first_index_slot; $i++) 
        {
            $transaction = Transaction::create([
                'transaction_type' => 5,
                'project_id' => $slots->get($i)->project_id,
                'project_name' => $slots->get($i)->project_name,
                'slot_id' => $slots->get($i)->id,
                'user_id' => $slots->get($i)->user_id,
                'username' => $slots->get($i)->user_name,
                'nominal' => $request->nominal,
                'deposit' => $request->nominal,
                'status' => $request->status,
            ]);
            $user = $users->where('id', $slots->get($i)->user_id)->first();
            $user->update(['balance' => $user->balance + $request->nominal ]);
            if ($slots->get($i)->status == 0) {
            }
            else{
                $statistic_dana->update(['nominal' => $statistic_dana->nominal - $request->nominal]);
            }
            $investasion = $investasions->where('id', $slots->get($i)->investasion_id)->first();
            if ($investasion == null){
            }else{
            $investasion->update([
                'status' => 'Project Telah Di Batalkan',
            ]);
            }
        }
        $project->update(['status' => 1]);
        return redirect('projects')->with('msg', 'Project Berhasil Di Batalkan');
    }
}
