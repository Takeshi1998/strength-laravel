@extends('layouts.header')
@section('main')

@can('admin')
<div class="card w-75 mx-auto">
    <div class="card-body">

     <div class="d-flex d-flex justify-content-between mb-1">
         <h5 class="card-title my-auto">注文管理画面</h5>
     </div>

     <ul>
         <li>[名前] [status変更] [商品名]</li>
         <li>1</li>
     </ul>

    </div>
</div>

@else
<div class="card w-75 mx-auto">
    <div class="card-body">

        <div class="d-flex d-flex justify-content-between mb-1">
            <h5 class="card-title my-auto">注文済みの商品</h5>
            <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        注文する
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">1商品ずつ注文して下さい</h5>
                              </div>
                            <div class="modal-body text-center">
                                <form action="" method="post">
                                    <input type="text">
                                    <input type="submit" value="注文する" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
        </div>

        @if($orders->isEmpty())
            <ul>
                <li>注文はありません</li>
            </ul>
        @else
        <ul>
            <li>[名前] [status] [cancel]</li>
            <li>1</li>
        </ul>
        @endif

    </div>
</div>
@endcan



@endsection

@section('script')
<script src=" {{ mix('js/app.js') }} "></script>
@endsection

