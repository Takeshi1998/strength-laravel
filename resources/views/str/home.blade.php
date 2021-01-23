
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link href="{{mix('css/app.css')}}" rel="stylesheet">

  <title>みんなの記録</title>
</head>
<body>

<div class="header">
    <div class="header-wrapper">
        <nav class="main-nav">
            <span><span class="word-orange">S</span><span class="page-number">T</span>RENGT<span class="page-number">H</span></span>
        </nav>
        <nav class="sub-nav">
                    <a  class="sub-nav-title" href="./tweet">記録する</a>

                <a class="sub-nav-title" href="./person">{{Auth::user()->name}}の記録</a>

                    <a class="sub-nav-title" href="./study">筋トレのすゝめ</a>

                    <a class="sub-nav-title" href="./logout">ログアウト</a>
        </nav>
        <div class="hamburger">
    <input type="checkbox" id="hamburger-check" class="hamburger-hidden" >
      <label for="hamburger-check" class="hamburger-open"><span></span></label>
      <nav class="hamburger-content">
        <ul class="hamburger-list">
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./tweet">記録する</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./person">{{Auth::user()->name}}の記録</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./study">筋トレのすゝめ</a>
          </li>
          <li class="hamburger-item">
            <a class="hamburger-item-name" href="./logout">ログアウト</a>
          </li>
          </li>
        </ul>
      </nav>
    </div>
    </div>
</div>
<!-- 一覧 -->

<main class="home">
    <div class="home-wrapper">
        <h1><i class="fas fa-check"></i><span class="word-orange">H</span>OME<span class="page-number">{{$comments->currentPage()}}</span></h1>

        <div id="app" v-cloak>
        @foreach($comments as $comment)
        <ul class="home-list">
          <div class="home-list-header d-flex justify-content-between">
            <div>
            {{$comment->name}}
            </div>


            <div class="small　 text-muted ">
                {{$comment->zikan}}
            </div>
          </div>
            <li class="home-list-content-left">
              {!! nl2br(e($comment->tweet))!!}
            </li>
            <li class="home-list-content-right">

                 <like-component v-bind:comment_id="{{$comment->id}}" v-bind:like_count="{{$comment->likes->count()}}"></like-component>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
    <span class="page-end">{{$comments->links()}}</span>

</main>
<script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
