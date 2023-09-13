<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Carbon\Carbon;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_sach = Sach::orderBy('id', 'DESC')->get();
        return view('admincp.sach.index')->with(compact('list_sach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.sach.create');
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
                'tensach'=>'required|unique:sach|max:255',
                'slug_sach'=>'required|unique:sach|max:255', 
                'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',    
                'kichhoat' => 'required', 
                'tomtat' => 'required',
                'hinhanh' => 'required',
                'tukhoa' => 'required', 
                'noidung' => 'required',
                'views' => 'required',
            
            ],
            [
                'tensach.required' => 'Tên sách không được để trống',
                'slug_sach.required' => 'Slug sách không được để trống',
                'tensach.unique' => 'Tên sách đã có vui lòng nhập tên khác',
                'tomtat.required' => 'Tóm tắt sách không được để trống',
                'views.required' => 'Views không được để trống',
                'noidung.required' => 'Tác giả sách không được để trống',
                'hinhanh.required' => 'Hình ảnh sách phải có',
                'tukhoa.required' => 'Từ khóa sách phải có',
            ]
        ); 
        $sach = new Sach(); 
        $sach->tensach = $data['tensach']; 
        $sach->tukhoa = $data['tukhoa']; 
        $sach->slug_sach = $data['slug_sach'];
        $sach->tomtat = $data['tomtat'];
        $sach->kichhoat = $data['kichhoat'];
        $sach->noidung = $data['noidung'];
        $sach->views = $data['views'];
        $sach->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $sach->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //THÊM ẢNH
        $get_image = $request->hinhanh;
        $path = 'public/uploads/sach/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));//TÁCH TÊN VÀ TÊN MỞ RỘNG RA BỞI DẤU "."
        $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_name);

        $sach->hinhanh  = $new_name;

        $sach->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Thêm sách thành công');
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
        $sach = Sach::find($id);
        return view('admincp.sach.edit')->with(compact('sach'));
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
                'tensach'=>'required|max:255',
                'slug_sach'=>'required|max:255', 
                'hinhanh'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',    
                'kichhoat' => 'required', 
                'tomtat' => 'required',
  
                'tukhoa' => 'required', 
                'noidung' => 'required',
                'views' => 'required',
            
            ],
            [
                'tensach.required' => 'Tên sách không được để trống',
                'slug_sach.required' => 'Slug sách không được để trống',
                'tensach.unique' => 'Tên sách đã có vui lòng nhập tên khác',
                'tomtat.required' => 'Tóm tắt sách không được để trống',
                'views.required' => 'Views không được để trống',
                'noidung.required' => 'Tác giả sách không được để trống',
                'tukhoa.required' => 'Từ khóa sách phải có',
            ]
        ); 
        $sach = Sach::find($id); 
        $sach->tensach = $data['tensach']; 
        $sach->tukhoa = $data['tukhoa']; 
        $sach->slug_sach = $data['slug_sach'];
        $sach->tomtat = $data['tomtat'];
        $sach->kichhoat = $data['kichhoat'];
        $sach->noidung = $data['noidung'];
        $sach->views = $data['views'];
        $sach->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $sach->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //THÊM ẢNH
        $get_image = $request->hinhanh;
        if ($get_image) {
            $path = 'public/uploads/sach/'.$sach->hinhanh;
            if (file_exists($path)) {
                unlink($path); 
            }
            $path = 'public/uploads/sach/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));//TÁCH TÊN VÀ TÊN MỞ RỘNG RA BỞI DẤU "."
            $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_name);

            $sach->hinhanh  = $new_name; 
        } 
        $sach->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Thêm sách thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = Sach::find($id);
        $path = 'public/uploads/sach/'.$sach->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Sach::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa sách thành công');
    }
}
