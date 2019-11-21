<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-sm-4">
            <div class="form-group">
                <label for="book_name">Tên sách:</label>
                <input type="text" class="form-control"  placeholder="Tên sách" value="{{old('book_name',isset($book->book_name) ? $book->book_name : '') }}" name="book_name">
                @if($errors->has('book_name'))
                    <span class="error-text">
                            {{$errors->first('book_name')}}
                            </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Loại sách:</label>
                <select name ="book_category_id" id = "" class="form-control">
                    <option value="">--Chọn loại sách--</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{old('book_category_id',isset($book->book_category_id) ? $book->book_category_id : '') == $category->id ? "selected='selected'":""}}>{{ $category->c_name }}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('book_category_id'))
                    <span class="error-text">
                            {{$errors->first('book_category_id')}}
                            </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Tác giả:</label>
                <select name ="book_author_id" id = "" class="form-control">
                    <option value="">--Chọn tác giả--</option>
                    @if(isset($authors))
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{old('book_author_id',isset($book->book_author_id) ? $book->book_author_id : '') == $author->id ? "selected='selected'":""}}>{{ $author->name }}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('book_author_id'))
                    <span class="error-text">
                            {{$errors->first('book_author_id')}}
                            </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Giá sách:</label>
                <input type="number" placeholder="Giá sách" class="form-control" value="{{old('book_price',isset($book->book_price) ? $book->book_price : '')}}" name="book_price">
                @if($errors->has('book_price'))
                    <span class="error-text">
                            {{$errors->first('book_price')}}
                            </span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Số lượng sách:</label>
                <input type="number" placeholder="18" class="form-control" name="book_number" value="{{old('book_number',isset($book->book_number) ? $book->book_number : '0')}}">
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="hot"> Nổi bật</label>
                </div>

            </div>
            <div class="form-group">
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
            </div>
        </div>
    </div>
</form>

