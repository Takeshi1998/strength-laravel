@extends('layouts.header')
@section('main')
<div>
    <nav aria-label="Page navigation example" class="center-block">
        <ul class="pagination d-flex justify-content-center">
          <li class="page-item">
          <a class="page-link" href="?before={{$before}}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

        <li class="page-item"><a class="page-link" href="#">{{$nmonth}}</a></li>

          <li class="page-item">
          <a class="page-link" href="?after={{$after}}" aria-label="Next">
              <span class="sr-only">Next</span>
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

    <table class="calender mx-auto calender-size">
        <thead class="thead">
          <tr class="day-of-week table-warning">
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
        <tr class="border-top">
           @foreach($array as $day)
           @if($todaycolor==$day)
           <td style="color:red;">
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
</div>

@foreach($comments as $comment)
<div class="card mb-3">
    <div class="card-header d-inline-flex justify-content-between">
      <span>{{$comment->name}}</span>
      <span>{{$comment->zikan}}</span>
    </div>

    <div class="card-body">
      <h5 class="card-title">{!! nl2br(e($comment->tweet))!!}</h5>
      <div class="d-flex justify-content-end">
        <a href="./update?id={{$comment->id}}" class="mr-1">編集</a>
        <a href="./delete?id={{$comment->id}}">消去</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="page-end d-flex justify-content-center">{{$comments->links()}}</div>
@endsection

@section('script')
<script src=" {{ mix('js/app.js') }} "></script>
@endsection
