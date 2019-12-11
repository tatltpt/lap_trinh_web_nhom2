<form action="" method="POST" >
    @csrf
    <div class="form-group">
        <label for="name">Tên tác giả</label>
        <input type="text" class="form-control"  placeholder="Tên tác giả" value="{{old('name',isset($author->name) ? $author->name:'')}}" name="name">
        @if($errors->has('name'))
            <span class="error-text">
                            {{$errors->first('name')}}
                            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
