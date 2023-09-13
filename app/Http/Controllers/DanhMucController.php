<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuctruyen = DanhMucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuctruyen.create');
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
                'tendanhmuc'=>'required|unique:danhmuc|max:255',
                'slug_danhmuc'=>'required|unique:danhmuc|max:255', 
                'mota'=>'required|max:255',    
                'kichhoat' => 'required', 
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục đã có, vui lòng điền tên khác',
                'slug_danhmuc.required' => 'Slug danh mục đã có, vui lòng điền tên khác',
                'tendanhmuc.unique' => 'Tên danh mục đã có vui lòng nhập tên khác',
                'mota.required' => 'Mô tả danh mục không được để trống',
            ]
        ); 
        $danhmuctruyen = new DanhMucTruyen(); 
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
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
        $danhmuc =  DanhMucTruyen::find($id);
        return view('admincp.danhmuctruyen.edit')->with(compact('danhmuc'));
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
                'tendanhmuc'=>'required|max:255',
                'slug_danhmuc'=>'required|max:255',    
                'mota'=>'required|max:255',    
                'kichhoat' => 'required', 
            ],
            [
                'slug_danhmuc.required' => 'Slug danh mục không được để trống',
                'tendanhmuc.required' => 'Tên danh mục không được để trống',
                'mota.required' => 'Mô tả danh mục không được để trống',
            ]
        ); 
        $danhmuctruyen = DanhMucTruyen::find($id); 
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc = $data['slug_danhmuc'];        
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Cập nhât danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DanhMucTruyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục truyện thành công');
    }
}
