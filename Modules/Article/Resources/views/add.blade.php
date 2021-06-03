@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add New Article</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div>
                        <form action="{{ route('articles.store') }}" method="POST">
                            @include('article::form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
