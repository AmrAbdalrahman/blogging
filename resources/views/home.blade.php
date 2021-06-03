@extends('layouts.app')

@section('content')
    <div class="container">

        <select name="category_id" id="category_id" class="form-control">
            <option value=" ">----Select Category-----</option>
            @foreach($categories as $category)
                <option
                    value="{{$category->id}}" @if(isset($category_id) && $category->id == $category_id) {{'selected'}}  @endif>{{$category->name}}</option>
            @endforeach
        </select>

        <hr>
        <div class="col-md-12">
            @foreach($articles as $article)

                <h1>{{$article->title}}</h1>
                <p>{{ Illuminate\Support\Str::limit($article->description, 50, $end='...') }}</p>
                <div>
                    <span class="badge">{{$article->created_at}}</span>
                    <a href="{{route('articles.comments',$article->id)}}">Read more</a>
                    <hr>

                </div>
            @endforeach
            <div class="text-center">
                {!! $articles->links() !!}
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script>
        let elmSelect = document.getElementById('category_id');

        if (!!elmSelect) {
            elmSelect.addEventListener('change', e => {
                let choice = e.target.value;
                if (!choice) return;

                let url = '{{ url('article/filterByCategory') }}' + '/' + choice;
                console.log(url);
                window.location.href = url;
            });
        }
    </script>
@endsection
