<?php

namespace App\Http\Controllers;

// add class
use Auth;
use App\Project;
use App\User;
use App\Slot;
use App\Transaction;
use App\Statistic;
use App\Investasion;

use Illuminate\Http\Request;

class ProfitController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::get()->where('project_slug',$project->slug);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        if(empty($project)) abort (404);
        if($project->status==9) abort (404);
        if($project->status==1) abort (404);
        // app.blade.php
        return view('profits.single', compact('project', 'slots', 'newinvestasion'));
    }
        
    public function sendProfit(Request $request , $slug)
    {
        // validasi saat bagi profit project
        // $this->validate($request, [
        //     'project_image' => 'required|mimes:pdf,doc,xls,pdfx,docx,xlsx,|max:5000kb',
        // ]);
        $laporan = $request->file('money_report');
        $fileName = time() . $laporan->getClientOriginalName();
        $request->file('money_report')->storeAs('public/money_report', $fileName);
        $project = Project::where('slug',$slug)->first();
        $statistic_profit = Statistic::find(3);
        $project->update([
                'money_report' => $fileName,
            ]);
        $slots = Slot::get()->where('project_slug',$project->slug);
        $users = new User;
        // index dari colections = id_slot-1
        $first_index_slot = $slots->first()->id-1;
        for ($i = $first_index_slot; $i < count($slots) + $first_index_slot; $i++) 
        {
            $transaction = Transaction::create([
                'transaction_type' => 3,
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
            $statistic_profit->update(['nominal' => $statistic_profit->nominal + $request->nominal]);
        }
        // return redirect()->route('projects.show',['project'=>$project->slug])->with('msg', 'profit berhasil di bagikan!');
        return back()->with('msg', 'Profit Telah Dibagikan');
    }

    public function showProfitAkhir($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $slots = Slot::get()->where('project_slug',$project->slug);
        $newinvestasion = Investasion::orderBy('created_at', 'desc')->take(1)->get();
        if(empty($project)) abort (404);
        if($project->status==9) abort (404);
        if($project->status==1) abort (404);
        // app.blade.php
        return view('profits.akhir', compact('project', 'slots', 'newinvestasion'));
    }
        
    public function sendProfitAkhir(Request $request , $slug)
    {
        // validasi saat bagi profit project
        // $this->validate($request, [
        //     'project_image' => 'required|mimes:pdf,doc,xls,pdfx,docx,xlsx,|max:5000kb',
        // ]);
        $laporan = $request->file('money_report');
        $fileName = time() . $laporan->getClientOriginalName();
        $request->file('money_report')->storeAs('public/money_report', $fileName);
        $project = Project::where('slug',$slug)->first();
        $statistic_profit = Statistic::find(3);
        $project->update([
                'money_report' => $fileName,
            ]);
        $slots = Slot::get()->where('project_slug',$project->slug);
        $users = new User;
        $investasions = new Investasion;

        // index dari colections = id_slot-1
        $first_index_slot = $slots->first()->id-1;
        for ($i = $first_index_slot; $i < count($slots) + $first_index_slot; $i++) 
        {
            $transaction = Transaction::create([
                'transaction_type' => 3,
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
            // $investasion = $investasions->where('user_id', $slots->get($i)->user_id)->where('project_id', $slots->get($i)->project_id)->first();
            $investasion = $investasions->where('id', $slots->get($i)->investasion_id)->first();
            $statistic_profit->update(['nominal'=> $statistic_profit->nominal + $request->nominal]);

            $investasion->update([
                'status' => 'Investasi Telah Selesai',
            ]);
            
        }
        $project->update(['status' => 3]);
        // return redirect()->route('projects.show',['project'=>$project->slug])->with('msg', 'profit berhasil di bagikan!');
        return back()->with('msg', 'Profit Akhir Telah Dibagikan');
    }
}
