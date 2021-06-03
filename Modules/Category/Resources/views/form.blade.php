{!! csrf_field() !!}

<div class="{{ $errors->has('name') ? ' has-error' : '' }}">

    <label class="col-md-3">
        name:
    </label>

    <div class="col-md-9">
        @if(isset($category))
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$category->name}}">
        @else
            <input type="text" name="name" class="form-control" placeholder="Name">
        @endif
        @if ($errors->has('name'))
            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
        @endif
        <br>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


