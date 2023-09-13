<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        return view('admincp.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentheloai'=>'required|unique:theloai|max:255',
                'slug_theloai'=>'required|unique:theloai|max:255', 
                'mota'=>'required|max:255',    
                'kichhoat' => 'required', 
            ],
            [
                'tentheloai.required' => 'Tên thể loại đã có, vui lòng điền tên khác',
                'slug_theloai.required' => 'Slug thể loại đã có, vui lòng điền tên khác',
                'tentheloai.unique' => 'Tên danh mục đã có vui lòng nhập tên khác',
                'mota.required' => 'Mô tả danh mục không được để trống',
            ]
        ); 
        $theloai = new TheLoai(); 
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Thêm thể loại thành công');
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
        $theloai = TheLoai::find($id); 

        return view('admincp.theloai.edit')->with(compact('theloai'));
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
        $data = $request->validate(
            [
                'tentheloai'=>'required|max:255',
                'slug_theloai'=>'required|max:255', 
                'mota'=>'required|max:255',    
                'kichhoat' => 'required', 
            ],
            [
                'tentheloai.required' => 'Tên thể loại đã có, vui lòng điền tên khác',
                'mota.required' => 'Mô tả danh mục không được để trống',
            ]
        ); 
        $theloai = TheLoai::find($id); 
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa thể loại truyện thành công');
    }
}
