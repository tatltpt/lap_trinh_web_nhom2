<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BillDetail;
use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class BorrowingCartController extends Controller
{
    //them gio hang
    public function addBook(Request $request,$id)
    {
        $book = Book::with('category:id,c_name','author:id,name')->find($id);
        if(!$book) return redirect('/');
        $price = $book->book_price;
        \Cart::add([
            'id' => $id,
            'name' => $book->book_name,
            'qty' => 1,
            'price' => $price,
            'weight' => 550,
            'options' =>
                [
                    'avatar' => $book->book_avatar,
                    'cate' => $book->category->c_name,
                    'author' => $book->author->name
                ],
        ]);
        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
    }

    public function deleteBookItem($key)
    {
        \Cart::remove($key);

        return redirect()->back();
    }

    //danh sach gio hang
    public function getListBorrowingCart()
    {
        $books = \Cart::content();
        return view('borrowing.index',compact('books'));
    }
    //form thanh toan
    public function getFormConfirm()
    {
        $books = \Cart::content();
        return view('borrowing.confirm',compact('books'));
    }
    //Luu tt gio hang
    public function saveInfoBorrowingCart(Request $request)
    {
        $trasactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if ($trasactionId)
        {
            $books = \Cart::content();
            foreach ($books as $book)
            {
                BillDetail::insert([
                    'bd_transaction_id' => $trasactionId,
                    'bd_book_id' => $book->id,
                    'bd_qty' => $book->qty,
                ]);
            }
        }
        \Cart::destroy();
        return redirect('/')->with('success','Thanh toán thành công');
    }
}
