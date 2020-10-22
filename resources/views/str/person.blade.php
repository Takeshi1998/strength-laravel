
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   

    <!-- Styles -->
    <link href="{{asset('css/person.css')}}" rel="stylesheet">
    
  <title>{{Auth::user()->name}}の記録</title>
</head>
<body>


<div class="header">
    <div class="header-wrapper">
        <nav class="main-nav">
            <span><span class="word-orange">S</span><span class="page-number">T</span>RENGT<span class="page-number">H</span></span>
        </nav>
        <nav class="sub-nav">    
                    <a  class="sub-nav-title" href="./home">みんなの記録</a>
      
                <a class="sub-nav-title" href="./tweet">記録する</a>
     
                    <a class="sub-nav-title" href="#">筋トレのすゝめ</a>
        </nav>
        <div class="hamburger">
    <input type="checkbox" id="hamburger-check" class="hamburger-hidden" >
      <label for="hamburger-check" class="hamburger-open"><span></span></label>
      <nav class="hamburger-content">
        <ul class="hamburger-list">
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./home">みんなの記録</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./tweet">記録する</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="#">筋トレのすゝめ</a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    </div>
</div>  
<!-- 一覧 -->


<main>
  <div class="main-content-wrapper">
  <nav aria-label="Page navigation example" class="float-right">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="?before=202009" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <li class="page-item"><a class="page-link" href="#">10月</a></li>
  
          <li class="page-item">
            <a class="page-link" href="?after=202011" aria-label="Next">
              <span class="sr-only">Next</span>
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

      <table class="calender">
        <thead class="thead">
          <tr class="day-of-week">
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
          </tr>
        </thead>
        @foreach($arrayday as $array)
        <tr>
           @foreach($array as $day)
           @if($todaycolor==$day)
           <td class="bg-primary">
             {{$day}}
            </td>
           @elseif(in_array($day,$check))
           <td style="background-image: url({{asset('images/check.png') }} ); background-repeat:no-repeat; background-position:50% 100%;">
           {{$day}}
          </td>
           @else
          <td>{{$day}}</td>  
          @endif
          @endforeach
        </tr>
         @endforeach
      </table>
      @foreach($comments as $comment)
      <ul class="list">
        <div class="list-header">
            {{$comment->zikan}}
        </div>
        <li class="list-group-item">
            <div class="">
                {!! nl2br(e($comment->tweet))!!}
              <div class="dropdown">
                <a class="dropdown-item" href="./update?id={{$comment->id}}">編集</a>
                <a class="dropdown-item" href="./delete?id={{$comment->id}}">消去</a>
              </div>
            </div>
        </li>
      </ul>
        @endforeach
    {{$comments->links()}}
  </div>
</main>