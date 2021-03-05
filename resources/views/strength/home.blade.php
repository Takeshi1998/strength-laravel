@extends('layouts.header')
@section('main')


<div id="app" v-cloak>
@foreach($comments as $comment)   @if($comment->like_flag)true @endif
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
<div class="post-button">
    <button type="button" class="btn rounded-circle border border-danger" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-fist-raised fa-3x"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('script')
<script src=" {{ mix('js/app.js') }} "></script>
@endsection
