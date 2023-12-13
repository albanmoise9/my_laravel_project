<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGigRequest;
use App\Http\Requests\UpdateGigRequest;
use Illuminate\Validation\Rules\Exists;
use Symfony\Component\Console\Input\Input;
use Spatie\LaravelIgnition\Recorders\QueryRecorder\Query;

class GigController extends Controller
{
    public function index()
    {
        /*$data = DB::select('select * from gigs order by created_at Asc limit 6');*/
        /*$data = DB::table('gigs')->orderBy('created_at', 'asc')->limit(6)->get();
        /*$data = Gig::get()->orderby();*/
        /*if(isset($_GET['search']))
        {
            $data = DB::select("select * from gigs where tags like ? OR title like ? OR company like ? OR location like ? order by created_at desc limit 6 " , ['%' . $_GET['search'] . '%', '%' . $_GET['search'] . '%', '%' . $_GET['search'] . '%', '%' . $_GET['search'] . '%']);
        }*/
        
        /*$data = */
        
        
        /*if(isset($_GET['search']))
        {
            $data = DB::table('gigs')->where('tags', 'like', '%' . $_GET['search'] . '%')
            ->orWhere('title', 'like', '%' . $_GET['search'] . '%')
            ->orwhere('location', 'like', '%' . $_GET['search'] . '%')
            ->orwhere('company', 'like', '%' . $_GET['search'] . '%')->get();
        }*/
        $data = Gig::filter()->paginate(5);

    
        return view('pages/index', [
            'gigs' => $data
        ]);
        
    }


    public function show(Gig $gig)
    {
        /*$dat = DB::select("select * from gigs where id=?", [$id]);*/
        /*$dat = DB::table('gigs')->find($id);*/
        $dat = $gig;
        /*$dat = Gig::find($id);*/
        return view('pages/show', [
            'gigs' => $dat
        ]);
    }


    public function create()
    {
        return view('pages.create');
    }


    public function store(StoreGigRequest $request)
    {
        $data = $request->all();
       
        if($request->hasFile('logo'))
        {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $data['user_id'] = auth()->user()->id;

        Gig::create($data);


        return redirect('/')->with('message', 'Gig created successfully');            
    }


    public function edit($id)
    {
        return view('pages/edit', [
            'gigs' => Gig::find($id)
        ]);
    }

    public function delete(gig $gig)
    {
        /*DB::delete('DELETE FROM gigs where id=?', [$gig->id]);*/
        DB::table('gigs')->where('id', $gig->id)->delete();
        /*$gig->delete();*/

        return redirect('/gigs/manage')->with('message', 'Gigs deleted succesfully');
    }


    public function update(UpdateGigRequest $request, Gig $gig)
    {
        $gig->update($request->all());
        return back()->with('message', 'Gigs updated succesfully');
    }


    public function  manage()
    {
        /*$data = DB::select('SELECT * FROM gigs WHERE user_id=?', [auth()->user()->id]);*/
        $data = Gig::where('user_id', auth()->user()->id)->get();
        return view('pages/manage', [
            'gigs' => $data
        ]);
    }
}
