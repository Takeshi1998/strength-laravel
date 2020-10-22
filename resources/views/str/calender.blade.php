@php


use Carbon\Carbon;

if(empty($_GET)){
  $calender=new Carbon();
}else{

      if(!empty($_GET['before'])){
        $month=$_GET['before'];
    }
    
    if(!empty($_GET['after'])){
        $month=$_GET['after'];
    }
  
$calender=new Carbon($month.'01');
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
// $amonth=$calender->format('n');






@endphp

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>カレンダー</h1>

  <ul >
  <li><a href="?before={{$before}}">a</a></li>
  <li><a href="">{{$nmonth}}</a></li>
  <li><a href="?after={{$after}}">b</a></li>

</ul>
    <table>


  <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
  </tr>

  
  @foreach($arrayday as $array)
  <tr>
   @foreach($array as $day)
  <td>{{$day}}</td>
  @endforeach
  </tr>
  @endforeach

  </table>


  

</body>
</html>