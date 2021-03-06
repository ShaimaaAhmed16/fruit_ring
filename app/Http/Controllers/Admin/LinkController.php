<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Link::paginate(20);
        return view('admin.link.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'watsUp'=>'required',
        ];
        $messages = [
            'name.required' => 'يرجي كتابه اسم ',
            'phone.required' => 'يرجي كتابه رقم الهاتف',
            'email.required' => 'يرجي كتابه البريد',
            'watsUp.required'=>'يرجي اضافه رقم الوتس '
        ];
        $this->validate($request, $rules, $messages);
        $record = Link::create($request->all());
        flash()->success("تم الاضافه بنجاح");
        return redirect()->route('link.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Link::findOrFail($id);
        return view('admin.link.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $record = Link::findOrFail($id);
        $record->update($request->all());
        $record->save();
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Link::findOrFail($id);
        $record->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('link.index');
    }
}
