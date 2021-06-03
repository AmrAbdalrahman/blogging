@extends('admin.layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Category</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div>
                        <form action="{{ route('categories.update',$category->id) }}" method="POST">
                            @method('PUT')
                            @include('category::form')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
