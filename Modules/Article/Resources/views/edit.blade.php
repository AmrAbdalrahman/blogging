@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Article</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div>
                        <form action="{{ route('articles.update',$article->id) }}" method="POST">
                            @method('PUT')
                            @include('article::form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
