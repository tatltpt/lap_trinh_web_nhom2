@if($billdetails)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Hình ảnh</th>
            <th>Thể loại</th>
            <th>Tác giả</th>
            <th>Số lượng</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1?>
        @foreach($billdetails as $key=>$bd)
            <tr>
                <td>{{$i}}</td>
                <td><a href="{{route('get.detail.book',[str_slug($bd->book->book_name),$bd->bd_book_id])}}"> {{isset($bd->book->book_name) ? $bd->book->book_name : ''}} </a></td>
                <td><img  src="{{isset($bd->book->book_avatar) ? pare_url_file($bd->book->book_avatar) : ''}}" alt=""  style="width: 80px;height: 80px;" ></td>
                <td>{{isset($bd->book->category->c_name) ? $bd->book->category->c_name : ''}}</td>
                <td>{{isset($bd->book->author->name) ? $bd->book->author->name : ''}}</td>
                <td>{{$bd->bd_qty}}</td>
                <td>
                    <a href="" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach

        </tbody>
    </table>
@endif
