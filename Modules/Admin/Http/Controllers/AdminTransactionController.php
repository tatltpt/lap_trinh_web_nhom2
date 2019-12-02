<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\BillDetail;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(20);
        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index',$viewData);
    }
    public function viewBillDetail(Request $request,$id)
    {
        if($request->ajax())
        {
            $billdetails = BillDetail::with('book')
                ->where('bd_transaction_id',$id)->get();

            $html = view('admin::components.billdetail',compact('billdetails'))->render();
            return \response()->json($html);
        }
    }
    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    break;
                case 'active':
                    $transaction->tr_status = $transaction->tr_status ? 0 : 1;
                    $transaction->tr_status = $transaction->tr_status ? 1 : 2;
                    break;
            }
            $transaction->save();

        }
        return redirect()->back();
    }

}
