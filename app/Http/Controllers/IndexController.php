<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\TheLoai;
use App\Models\Sach;
use App\Models\Publisher;
use App\Models\Favorite;
use Carbon\Carbon;
use Session;


class IndexController extends Controller
{
    public function home(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }

    public function register_publisher(Request $request){
          $data = $request->validate(
                    [
                        'username'=>'required|unique:publishers|max:100',
                        'email'=>'required|unique:publishers|max:100', 
                        'password'=>'required|required_with:password_confirmation|same:password|max:100',    
                        'fullname'=>'required|max:150',
                        'sdt' => 'required|max:250', 
                    ],
                    [
                        'username.unique' => 'Tên username đã có, vui lòng điền tên khác',
                        'email.unique' => 'Email đã có vui lòng nhập tên khác',
                        'username.required' => 'Username không được để trống',
                        'email.required' => 'Email không được để trống',
                        'password.required' => 'Password không được để trống',
                        'fullname.required' => 'Fullname không được để trống',
                       
                        'sdt.required' => 'Số điện thoại không được để trống',
                    ]
                ); 
                $publisher = new Publisher(); 
                $publisher->username = $data['username'];
                $publisher->password = md5($data['password']);
                $publisher->email = $data['email'];
                $publisher->fullname = $data['fullname'];
                $publisher->sdt = $data['sdt'];
                
                $publisher->save();
                //TRẢ VỀ ĐÚNG TRANG CÓ PHƯƠNG THỨC POST 
                return redirect()->back()->with('status', 'Đăng kí thành công');;
    }


    public function login_pulisher(Request $request){
          $data = $request->validate(
                    [
                        'username'=>'required',          
                        'password'=>'required',         
                    ],
                    [
                        'username.required' => 'Username không được để trống',
                        'password.required' => 'Password không được để trống',
                    ]
                ); 
                $publisher = Publisher::where('username', $data['username'])->where('password', md5($data['password']))->first(); 
        
                if ($publisher) {
                    Session::put('login_pulisher', true);
                    Session::put('publisher_id', $publisher->id);
                    Session::put('username', $publisher->username);
                    Session::put('email_publisher', $publisher->email);
                     return redirect()->back()->with('status', 'Đăng nhập thàng công');
                    
                }else{
                    return redirect()->back()->with('status', 'Mật khẩu hoặc username không đúng');
                }
              
    }

    public function sign_out(){
        Session::forget('login_pulisher');
        Session::forget('publisher_id');
        Session::forget('username');
        Session::forget('email_publisher');

         return redirect()->back()->with('status', 'Đăng xuất thàng công');
                    
    }

    public function dangky(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('admincp.users.dangky')->with(compact('danhmuc', 'truyen', 'theloai'));
    }

    // public function themyeuthich(Request $request)
    // {
           
    //     $data = $request->all();
    //     dd($data); 
    //     $favo = new Favorite(); 
    //     $favo->title = $data['title'];
    //     $favo->image = $data['image'];
    //     $favo->status = 0;
    //     $favo->publisher_id = $data['publisher_id'];
                

    //     $favo->save();
    // }

    public function dangnhap(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('admincp.users.dangnhap')->with(compact('danhmuc', 'truyen', 'theloai'));
    }

    public function yeu_thich(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('admincp.users.yeuthich')->with(compact('danhmuc', 'truyen', 'theloai'));
    }

    public function docsach(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

        $sach = Sach::orderBy('id', 'DESC')->where('kichhoat',0)->paginate(12);

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.sach')->with(compact('danhmuc', 'sach', 'theloai', 'slide_truyen', 'truyen'));
    }

    public function slide(){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();
    
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.slide')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }



    public function danhmuc($slug){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $danhmuc_id = DanhMucTruyen::where('slug_danhmuc', $slug)->first();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('danhmuc_id', $danhmuc_id->id)->get();

        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $tendanhmuc = $danhmuc_id->tendanhmuc;

        return view('pages.danhmuc')->with(compact('danhmuc','truyen', 'theloai', 'tendanhmuc', 'slide_truyen'));
    }

    public function theloai($slug){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $theloai_id = TheLoai::where('slug_theloai', $slug)->first();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->where('theloai_id', $theloai_id->id)->get();

        $tentheloai = $theloai_id->tentheloai;
    
        return view('pages.theloai')->with(compact('danhmuc','truyen', 'theloai', 'tentheloai', 'slide_truyen'));
    }

    public function xemtruyen($slug){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->get();
  
        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();
    
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->first();

        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();
    
        $truyen_moi = Truyen::with('danhmuctruyen','theloai')->orderBy('id', 'DESC')->whereNotIn('id', [$truyen->id])->where('kichhoat',0)->get();

        $truyen_noibat = Truyen::where('truyen_noibat',1)->take(20)->get();

        $truyen_xemnhieu = Truyen::where('truyen_noibat',2)->take(20)->get();
    
        return view('pages.truyen')->with(compact('danhmuc' ,'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'theloai', 'slide_truyen', 'chapter_moinhat', 'truyen_moi', 'truyen_noibat', 'truyen_xemnhieu'));
    }


    public function xemchapter($slug){
        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $truyen = Chapter::where('slug_chapter', $slug)->first();

        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id', $truyen->truyen_id)->first();

        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();

        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();

        //Breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->where('kichhoat',0)->first();

        //End breadcrumb

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'truyen', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai','truyen_breadcrumb', 'slide_truyen'));
   
    }

    public function xemsachnhanh(Request $request){
        $sach_id = $request->sach_id;
        $sach = Sach::find($sach_id);

        $output['tieude_sach'] = $sach->tensach;
        $output['noidung_sach'] = $sach->noidung;
        echo json_encode($output);
    }


    public function timkiem(Request $request)
    {
        $data = $request->all();

        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $tukhoa = $data['tukhoa'];

        $truyen = Truyen::with('danhmuctruyen', 'theloai')
                ->where('tentruyen','LIKE','%'.$tukhoa.'%')
                ->OrWhere('tomtat','LIKE','%'.$tukhoa.'%')
                ->OrWhere('tacgia','LIKE','%'.$tukhoa.'%')
                ->get();

        return view('pages.timkiem')->with(compact('danhmuc', 'theloai', 'slide_truyen', 'tukhoa', 'truyen'));
    }


    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $truyen = Truyen::where('kichhoat', 0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();
            $output = '
                    <ul class="dropdown-menu" style="display:block;">'
            ;
            foreach ($truyen as $key => $tr) {
                $output.='
                    <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function tag($tag)
    {
       

        $danhmuc = DanhMucTruyen::orderBy('id','DESC')->get();

        $theloai = TheLoai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->take(8)->get();

        $tags = explode("-",$tag); 

        $truyen = Truyen::with('danhmuctruyen', 'theloai')
                ->where(
                    function($query) use ($tags) {
                        for ($i=0; $i < count($tags); $i++) { 
                            $query->orwhere('tukhoa', 'LIKE', '%'.$tags[$i].'%');
                        }
                    }
                )->paginate(12);

        return view('pages.tag')->with(compact('danhmuc', 'theloai', 'slide_truyen', 'tag', 'truyen'));
    }
}
