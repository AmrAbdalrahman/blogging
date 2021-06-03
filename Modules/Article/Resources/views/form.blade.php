{!! csrf_field() !!}

<div class="{{ $errors->has('title') ? ' has-error' : '' }}">

    <label class="col-md-3">
        title:
    </label>

    <div class="col-md-9">
        @if(isset($article))
            <input type="text" name="title" class="form-control" placeholder="title" value="{{$article->title}}">
        @else
            <input type="text" name="title" class="form-control" placeholder="title">
        @endif
        @if ($errors->has('title'))
            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
        @endif
        <br>
    </div>
</div>

<div class="{{ $errors->has('description') ? ' has-error' : '' }}">
    <label class="col-md-3">
        Description:
    </label>

    <div class="col-md-9">
        <textarea placeholder="description" name="description"
                  class="form-control">{{isset($article) ? $article->description : null }}</textarea>

        @if ($errors->has('description'))
            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
        @endif
        <br>
    </div>
</div>

<div class="{{ $errors->has('is_published') ? ' has-error' : '' }}">

    <label class="col-md-3">
        Publish Status:
    </label>

    <div class="col-md-9">

        <select name="is_published" class="form-control">
            @if(isset($article))
                <option value="1" {{ ( $article->is_published == 1) ? 'selected' : '' }}>published</option>
                <option value="0" {{ ( $article->is_published == 0) ? 'selected' : '' }}>unpublished</option>
            @else
                <option value="1">published</option>
                <option value="0">unpublished</option>
            @endif

        </select>

        @if ($errors->has('is_published'))
            <span class="help-block">
                                        <strong>{{ $errors->first('is_published') }}</strong>
                                    </span>
        @endif

        <br>
    </div>

</div>

<div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">

    <label class="col-md-3">
        Select Country:
    </label>

    <div class="col-md-9">

        <select class="form-control" name="category_id">
            <option>Select Category</option>
            @if(isset($article))
                @foreach ($categories as $key => $value)
                    <option value="{{ $key }}" {{ ( $key == $article->category_id) ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach

            @else
                @foreach ($categories as $key => $value)
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
                @endforeach
            @endif


        </select>

        @if ($errors->has('category_id'))
            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
        @endif
        <br>
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


