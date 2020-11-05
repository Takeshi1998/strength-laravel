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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   

    <!-- Styles -->
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    
  <title>みんなの記録</title>
</head>
<body>


<main class="w-75 mx-auto mt-3 ">
    <form class="mt-4" method="post" action="./update/tweet">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="tweet"></label>
          <textarea class="form-control" id="tweet" rows="6" name="tweet">{!!e($tweet->tweet)!!}</textarea>
          
        </div>
      

        
      {{-- <input type="hidden" name="name" value="{{Auth::user()->name}}"> --}}
    
        <div class="text-right">
          <input type="submit" class="btn btn-info " value="編集する">
        </div>

      </form>
    </main>  
  </body>
  </html>