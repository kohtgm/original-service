<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Prefinfo;    // 追加
use App\Prefpost; // 追加

use Carbon\Carbon;

use Validator;

class PrefpostsController extends Controller
{
    
    public function index()
    {
        $prefall = Prefinfo::all();

        return view('welcome', [
            'prefall'=>$prefall,
        ]);
        
    }
    
    
    public function create($id)
    {
        $prefall = Prefinfo::all();
        
        $pref = Prefinfo::findOrFail($id);
      
          // データベースから、今日作成されたデータをを取り出す
        $today=Carbon::today();
        $todaypost=Prefpost::whereDate('created_at', $today)->get();
        
        $ipp  = \Request::ip();
       
    
        $sameidippost= $todaypost->where('prefinfo_id', '==', $id)->where('ip_address', '==', $ipp);
     $cnt = count($sameidippost);
        if($cnt >= 3){
             return view('prefposts.create_disable', [
            'pref' => $pref, 'prefall'=>$prefall,
        ]);
        }
        
      

        return view('prefposts.create', [
            'pref' => $pref, 'prefall'=>$prefall,
        ]);
    }
    
    
    public function show($id)
    {
        $prefall = Prefinfo::all();
       $pref = Prefinfo::findOrFail($id);
       
       $prefposts = $pref->prefposts()->orderBy('created_at', 'desc')->paginate(10);
       //$prefposts = $pref->prefposts()->orderBy('created_at', 'desc')->paginate(100);
       
       //dd($prefposts
       
       
       
       

        return view('prefposts.show', [
            'pref' => $pref,'prefposts' => $prefposts,'prefall'=>$prefall,
        ]);
        
        
        
    }
    
    
    public function store($id, Request $request)
    {
        
        
       
        
       
        
        
        
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        $prefall = Prefinfo::all();
        
        $pref = Prefinfo::findOrFail($id);
        
         // データベースから、今日作成されたデータをを取り出す
        $today=Carbon::today();
        $todaypost=Prefpost::whereDate('created_at', $today)->get();
        
        $ipp  = \Request::ip();
       
    
        $sameidippost= $todaypost->where('prefinfo_id', '==', $id)->where('ip_address', '==', $ipp);
     $cnt = count($sameidippost);
        if($cnt >= 3){
             return view('prefposts.create_disable', [
            'pref' => $pref, 'prefall'=>$prefall,
        ]);
        }
        
        
        
        $pref->prefposts()->create([
            'content' => $request->content , 'ip_address' => $request->ip()
            ]);
            
            $prefposts = $pref->prefposts()->orderBy('created_at', 'desc')->paginate(10);
            //$prefposts = $pref->prefposts;

       // $request->prefinfo()->prefposts()->create([
        //    'content' => $request->content , 'ip_address' => $request->ip()
    //    ]);
    
    // dd($request->ip());
    // dd($request->content);
    
    
   

      //  return redirect('/');
      return view('prefposts.show', [
            'pref' => $pref,'prefposts' => $prefposts,'prefall'=>$prefall,
        ]);
    }
    
}
