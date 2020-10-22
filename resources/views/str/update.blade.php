@component('components.header')
@slot('title')
編集
@endslot
@endcomponent

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="./home">みんなの記録</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./tweet">記録する</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">筋トレのすゝめ</a>
                </li>
            </ul>
        </div>
    </nav>
<!-- 一覧 -->

<main class="w-75 mx-auto mt-3 ">
    <form class="mt-4" method="post" action="./update/tweet">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="tweet"></label>
          <textarea class="form-control" id="tweet" rows="6" name="tweet">{!! nl2br(e($tweet->tweet))!!}</textarea>
          
        </div>
      

        
      {{-- <input type="hidden" name="name" value="{{Auth::user()->name}}"> --}}
    
        <div class="text-right">
          <input type="submit" class="btn btn-info " value="編集する">
        </div>

      </form>
    </main>  