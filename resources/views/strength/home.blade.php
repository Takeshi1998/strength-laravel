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
                <like-component v-bind:comment_id="{{$comment->id}}" v-bind:like_count="{{$comment->likes->count()}}" v-bind:like_flag='@json($comment->like_flag)'></like-component>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="post-button">
    <button type="button" class="btn rounded-circle border border-danger" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-fist-raised fa-3x"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">本日の記録</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="./tweet/post">
                    {{ csrf_field() }}
                    <div class="modal-body p-0">
                        <textarea name="tweet" id="tweet" cols="30" rows="10" class="w-100 h-100" style="border:none;"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="投稿する"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="page-end d-flex justify-content-center">{{$comments->links()}}</div>
@endsection

@section('script')
<script src=" {{ mix('js/app.js') }} "></script>
@endsection

