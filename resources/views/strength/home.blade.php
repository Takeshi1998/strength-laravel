@extends('layouts.header')
@section('main')

<div id="app" v-cloak>
@foreach($comments as $comment)
<div class="card mb-3">
    <div class="card-header d-inline-flex justify-content-between">
      <span>{{$comment->name}}</span>
      <span>{{$comment->zikan}}</span>
    </div>

    <div class="card-body">
      <h5 class="card-title">{!! nl2br(e($comment->tweet))!!}</h5>
      <div class="text-right">
          <like-component v-bind:comment_id="{{$comment->id}}" v-bind:like_count="{{$comment->likes->count()}}"></like-component>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="page-end d-flex justify-content-center">{{$comments->links()}}</div>
<button type="button" class="btn rounded-circle border border-danger"><i class="fas fa-fist-raised fa-3x"></i></button>
@endsection

@section('script')
<script src=" {{ mix('js/app.js') }} "></script>
@endsection
