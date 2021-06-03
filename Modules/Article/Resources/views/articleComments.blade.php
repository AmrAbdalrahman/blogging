@extends('layouts.app')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        hr {
            border-top: 1px solid #000 !important;
        }

        .row {
            margin-right: 0px;
            margin-left: 0px;
        }

        .comment {
            margin-right: 20px;
            margin-left: 20px;
            margin-bottom: 30px;
        }

        .head {
            margin-bottom: 10px;
        }


    </style>
@endsection
@section('content')
    <div class="container">

        <div class="col-md-12">

            <h1>{{$article->title}}</h1>
            <p>{{ $article->description }}</p>
            <div>
                <span class="badge">{{$article->created_at}}</span>
                <hr>

            </div>

        </div>

        <div class="row">
            <h2>Comments |{{count($article->comments)}}|
                <div class="pull-right"><a href="#" id="addacomment" class="btn btn-primary">Add a coment</a></div>
            </h2>
        </div>
        <br>
        <div class="row" id="addcomment" style="display: none;">
            <form action="{{route('articles.addComment')}}" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea class="form-control" name="comment" placeholder="Comment content..." cols="200"
                          rows="5"></textarea><br/>
                <button class="btn btn-primary">Send</button>
            </form>
        </div>
        <hr>
        @if(count($article->comments) > 0)
            @foreach($article->comments as $comment)
                <div class="row comment">
                    <div class="head">
                        <small> {{$comment->created_at}}</small>
                    </div>
                    <p>{{$comment->comment}}</p>
                </div>

                <hr>
            @endforeach
        @else
            <br>
            <p>no comments found</p>
        @endif

    </div>


@endsection

@section('footer')

    <script>
        $(document).on('click', '#addacomment', function () {
            $('#addcomment').toggle();
        });
    </script>

@endsection


