<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;


class customerController extends Controller
{
    //
    public function index()
    {
        $customer = DB::table('customer')->orderBy('id','desc')->simplePaginate(3);
        return view('customer')->with('customer', $customer);
    }
    public function create()
    {
        return view('customer-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'address'    => 'required',
            'phone' => 'required|numeric|digits_between:10,11',
            'dob'    => 'required',

        ], [
            'phone.digits_between'      => 'Vui lòng nhập đúng số điện thoại (10 hoặc 11 số)',
            'name.required'      => 'Vui lòng nhập tên khách hàng',
            'address.required'     => 'Vui lòng nhập địa chỉ khách hàng',
            'phone.numeric'   => 'Số điện thoại chỉ được nhập số',
            'phone.required'  => 'Vui lòng nhập số điện thoại',
            'dob.required'  => 'Vui lòng nhập ngày tháng năm sinh',
        ]);

        $customer=DB::table('customer')->insert([
            'name' =>  $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'dob' => $request->dob
        ]);
        return redirect()->route('customer')->with('message', 'Thêm thành công');
    }

    public function edit($id)
    {
        $editData=DB::table('customer')->find($id);
        // dd($editData);
        return view('customer-create')->with('editData', $editData);
    }

    public function delete($id)
    {
        $affected = DB::table('customer')->where('id',$id)->delete();
        return redirect()->route('customer')->with('message', 'Xóa thành công');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'address'    => 'required',
            'phone' => 'required|numeric|digits_between:10,11',
            'dob'    => 'required',

        ], [
            'phone.digits_between'      => 'Vui lòng nhập đúng số điện thoại (10 hoặc 11 số)',
            'name.required'      => 'Vui lòng nhập tên khách hàng',
            'address.required'     => 'Vui lòng nhập địa chỉ khách hàng',
            'phone.numeric'   => 'Số điện thoại chỉ được nhập số',
            'phone.required'  => 'Vui lòng nhập số điện thoại',
            'dob.required'  => 'Vui lòng nhập ngày tháng năm sinh',
        ]);

        $affected = DB::table('customer')
                        ->where('id', $id)
                        ->update([
                            'name' =>  $request->name,
                            'address' => $request->address,
                            'phone' => $request->phone,
                            'dob' => $request->dob]);

        return redirect()->route('customer')->with('message', 'Sửa thành công');
    }

    public function searCustomer(Request $request)
    {

        $result=DB::table('customer')->where('name', 'like', "%{$request->search}%")->orWhere('phone', 'like', "%{$request->search}%")->orderBy('id','desc')->simplePaginate(3);
        return view('customer')->with('customer', $result);
    }

    public function filter(Request $request)
    {
        $customer_filter = DB::table('customer')->orderBy('id','desc')->get();
        $filter_type=$request->filter;
        try {
            switch ($request->filter) {
                case 1:
                    // dd($customer_filter);
                    foreach ($customer_filter as $item) {
                        $diff =Carbon::parse($item->DOB)->diff(Carbon::now())->format('%y');
                        if (($diff>17) && ($diff<26)) {
                            $customer[]=$item;
                        }
                    }
                    return view('customer')->with(['customer'=> $customer,'filter_type'=>$filter_type]);
                break;
                case 2:
                    foreach ($customer_filter as $item) {
                        $diff =Carbon::parse($item->DOB)->diff(Carbon::now())->format('%y');
                        if (($diff>27) && ($diff<31)) {
                            $customer[]=$item;
                        }
                    }
                    return view('customer')->with(['customer'=> $customer,'filter_type'=>$filter_type]);
                break;
                case 3:
                    foreach ($customer_filter as $item) {
                        $diff =Carbon::parse($item->DOB)->diff(Carbon::now())->format('%y');
                        if (($diff>32) && ($diff<46)) {
                            $customer[]=$item;
                        }
                    }
                    return view('customer')->with(['customer'=> $customer,'filter_type'=>$filter_type]);
                break;
                case 4:
                    foreach ($customer_filter as $item) {
                        $diff =Carbon::parse($item->DOB)->diff(Carbon::now())->format('%y');
                        if (($diff>47) && ($diff<61)) {
                            $customer[]=$item;
                        }
                    }
                    return view('customer')->with(['customer'=> $customer,'filter_type'=>$filter_type]);
                break;
                default:

                return redirect()->route('customer');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', 'Không có dữ liệu');
        }
    }
}
