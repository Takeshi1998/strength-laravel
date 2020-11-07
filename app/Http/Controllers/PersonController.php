<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user=Auth::user();
        $judge=Comment::where('name',$user->name)->exists();
        if($judge){
          $comments=Comment::where('name',$user->name)->orderBy('id','desc')
          ->simplePaginate(5);
        }else{
          $comments="NULL";
        }
        

       
        
        
// calender     
if(empty($_GET['before'])&&empty($_GET['after'])){
    $calender=new Carbon();
    $todaycolor=$calender->format('d');
  }else{
  
        if(!empty($_GET['before'])){
          $month=$_GET['before'];
      }
      
      if(!empty($_GET['after'])){
          $month=$_GET['after'];
      }
    
  $calender=new Carbon($month.'01');
  $todaycolor=10000000;
  }

 
  
  
  $today=$calender->format('Ym');

  $before=date('Ym',strtotime($today.'01'.'-1 month'));
  $after=date('Ym',strtotime($today.'01'.'+1 month'));
  
  
  
  // 1日の曜日を数字に変換
  $day1=$calender->format('w');
  // 今月の最後
  $daynumber=$calender->endOfMonth()->format('d');
  
  
  
  
  $r=0;
  $arrayday=[];
  
  for($i=1;$i<=$day1;$i++){
    $arrayday[$r][]='';
  }
  
  for($i=1;$i<=$daynumber;$i++){
    if(isset($arrayday[$r])&&count($arrayday[$r])==7){
      $r++;
    }
    $arrayday[$r][]=$i;
  }
  
  for($i=count($arrayday[$r]);$i<7;$i++){
    $arrayday[$r][]='';
  }
  
  
  
  $nmonth=$calender->format('n');


//   データを記入した日をtimestamp型で$timedayに格納

if($comments!="NULL"){

    $dayon=Comment::where('name',$user->name)->get('zikan');
    $arrayon=$dayon->toArray();
        foreach($arrayon as $array){
            
            foreach($array as $key){
                $on[]=$key;
            }
        
        }
    
    foreach($on as $key){
      $time=new Carbon($key);
      $timeday[]=$time->format('Ymd');
    }
    
    $judge=$calender->format('Ym');
    
    
      // $judgemonthにtimestamp型で今月記入した日を格納
    foreach($timeday as $key){
      
        if($judge==substr($key,0,6)){
          $judgemonth[]=$key;
        }
      }
    
      if(!empty($judgemonth)){
    
        foreach($judgemonth as $key){
          $checkday=new Carbon($key);
          $check[]=$checkday->format('j');
        }
      }else{
        // ダミー
        $check[]='abcde';
        $check[]='asdhey';
      }
}else{
  $todaycolor="null";
  $check[]="abcde";
  $check[]="adbsf";
}

 







                    
                    $data=[
                        'user'=>$user,
                        'comments'=>$comments,
                        'arrayday'=>$arrayday,
                        'nmonth'=>$nmonth,
                        'after'=>$after,
                        'before'=>$before,
                        'todaycolor'=>$todaycolor,
                        'check'=>$check,
                        
                    ];
                    return view('str.person',$data);
            }

}
