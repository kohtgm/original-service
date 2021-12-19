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
        if($cnt >= 300){
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
       
       $pref->loadRelationshipCounts();
       $num = $pref->prefposts_count;
       
       $prefposts = $pref->prefposts()->orderBy('created_at', 'desc')->paginate(20);
       
       $prefpostsidall = $pref->prefposts()->orderBy('created_at', 'desc')->get();
       
       $ppost = $pref->prefposts()->orderBy('created_at', 'desc')->get();
    
       
       if($num==0){
           $strings[0]='test';
           $strlenary[0]=0;
       }
       if($num>=1 && $num<=3){
           for ($i = 1; $i <= $num; $i++) {
               $ppost[$i-1]=$prefpostsidall[$i-1];
               $strings[$i-1]=$ppost[$i-1]->content;
       }
       
       }
       if($num>=4){
           for ($i = 1; $i <= 3; $i++) {
               $ppost[$i-1]=$prefpostsidall[$i-1];
                $strings[$i-1]=$ppost[$i-1]->content;
       }
       
       for ($i = 4; $i <= $num; $i++) {
                $ary[$i-4]=$i-1;
       }
       shuffle($ary);
       for ($i = 4; $i <= $num; $i++) {
                $ppost[$i-1]=$prefpostsidall[$ary[$i-4]];
                 $strings[$i-1]=$ppost[$i-1]->content;
       }
       }
       
       if($num>=1 && $num<=9){
             for ($i = 0; $i < $num; $i++) {
                $strlenary[$i]=mb_strlen($strings[$i], 'UTF-8');
                }
       }
       else if($num>=10){
            for ($i = 0; $i < 10; $i++) {
                $strlenary[$i]=mb_strlen($strings[$i], 'UTF-8');
                }
       }
       
       for ($i = 0; $i < 10; $i++) {
                $colorary[$i]=mt_rand(0, 9);
       }
       
       for ($i = 0; $i < 10; $i++) {
                $xary[$i]=mt_rand(0, 9);
       }
       
       for ($i = 0; $i < 10; $i++) {
                $yary[$i]=mt_rand(0, 9);
       }
       
       for ($i = 0; $i < 10; $i++) {
                $pary[$i]=$i;
       }
       shuffle($pary);
       
       for ($i = 0; $i < 10; $i++) {
                $sxary[$i]=mt_rand(0, 9);
       }
       
       for ($i = 0; $i < 10; $i++) {
                $syary[$i]=mt_rand(0, 9);
       }

  //dd($strings);

        $color_array = json_encode($colorary);
        $x_array = json_encode($xary);
        $y_array = json_encode($yary);
        $p_array = json_encode($pary);
        $sx_array = json_encode($sxary);
        $sy_array = json_encode($syary);
        $number = json_encode($num);
        $str = json_encode($strings);
        $strlen_ary = json_encode($strlenary);
      
 
 


        return view('prefposts.show', [
            'pref' => $pref,'prefposts' => $prefposts,'prefall'=>$prefall,'ppost' => $ppost,
            'number' => $number,'color_array' => $color_array,'x_array' => $x_array,'y_array' => $y_array,
            'p_array' => $p_array,'sx_array' => $sx_array,'sy_array' => $sy_array,'str' => $str,
            'strlen_ary' => $strlen_ary,
        ]);
        
        
        
    }
    
    
    public function store($id, Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:50',
        ]);
        
        $prefall = Prefinfo::all();
        
        $pref = Prefinfo::findOrFail($id);
        
        
        
         // データベースから、今日作成されたデータをを取り出す
        $today=Carbon::today();
        $todaypost=Prefpost::whereDate('created_at', $today)->get();
        
        $ipp  = \Request::ip();
       
    
        $sameidippost= $todaypost->where('prefinfo_id', '==', $id)->where('ip_address', '==', $ipp);
     $cnt = count($sameidippost);
        if($cnt >= 300){
             return view('prefposts.create_disable', [
            'pref' => $pref, 'prefall'=>$prefall,
        ]);
        }
        
        
        
        $pref->prefposts()->create([
            'content' => $request->content , 'ip_address' => $request->ip()
            ]);
            
             return redirect('pref/' . $id . '/show');
            

          
          
    }
    
}
