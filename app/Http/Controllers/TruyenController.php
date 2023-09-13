<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;
use App\Models\ThuocDanh;
use App\Models\ThuocLoai;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id','DESC')->get();
        return view('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        return view('admincp.truyen.create')->with(compact('danhmuc', 'theloai'));
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
                'tentruyen'=>'required|unique:truyen|max:255',
                'slug_truyen'=>'required|unique:truyen|max:255', 
                'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',    
                'kichhoat' => 'required', 
                'tomtat' => 'required',
                'hinhanh' => 'required',
                'tacgia' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
                'tukhoa' => 'required',
                'truyen_noibat' => 'required',
            ],
            [
                'tentruyen.required' => 'Tên truyện không được để trống',
                'slug_truyen.required' => 'Slug truyện không được để trống',
                'tentruyen.unique' => 'Tên truyện đã có vui lòng nhập tên khác',
                'tomtat.required' => 'Tóm tắt truyện không được để trống',
                'tacgia.required' => 'Tác giả truyện không được để trống',
                'slug_truyen.required' => 'Slug truyện không được để trống',
                'hinhanh.required' => 'Hình ảnh truyện phải có',
                'tukhoa.required' => 'Từ khóa truyện phải có',
            ]
        ); 
      
        $truyen = new Truyen(); 
        $truyen->tentruyen = $data['tentruyen']; 
        $truyen->tacgia = $data['tacgia']; 
        $truyen->tukhoa = $data['tukhoa']; 
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->truyen_noibat = $data['truyen_noibat'];

        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        //THÊM ẢNH
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));//TÁCH TÊN VÀ TÊN MỞ RỘNG RA BỞI DẤU "."
        $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_name);

        $truyen->hinhanh  = $new_name;

        $truyen->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Thêm truyện thành công');
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
        $truyen = Truyen::find($id);
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $theloai = TheLoai::orderBy('id', 'DESC')->get();        
        return view('admincp.truyen.edit')->with(compact('truyen', 'danhmuc', 'theloai'));
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
                'tentruyen'=>'required|max:255',
                'slug_truyen'=>'required|max:255',    
                'kichhoat' => 'required', 
                'tomtat' => 'required',
                'tacgia' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',
                'tukhoa' => 'required',
                'truyen_noibat' => 'required',
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã có vui lòng nhập tên khác',
                'tomtat.required' => 'Tóm tắt truyện không được để trống',
                'slug_truyen.required' => 'Slug truyện không được để trống',
                'tacgia.required' => 'Tác giả truyện không được để trống',
                'tukhoa.required' => 'Từ khóa truyện không được để trống',
                'truyen_noibat.required' => 'Từ khóa ưefwfwefg được để trống',
                
            ]
        ); 
        $truyen = Truyen::find($id); 
        $truyen->tentruyen = $data['tentruyen']; 
        $truyen->tacgia = $data['tacgia'];
        $truyen->tukhoa = $data['tukhoa'];  
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->truyen_noibat = $data['truyen_noibat'];

        $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        //THÊM ẢNH
        $get_image = $request->hinhanh;
        if ($get_image) {
          
            $path = 'public/uploads/truyen/'.$truyen->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));//TÁCH TÊN VÀ TÊN MỞ RỘNG RA BỞI DẤU "."
            $new_name = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_name);

            $truyen->hinhanh  = $new_name;
        }
  

        $truyen->save();
        //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
        return redirect()->back()->with('status', 'Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa tryện thành công');
    }
}
