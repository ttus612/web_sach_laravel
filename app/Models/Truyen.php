<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    
    // public $timestamps = false;//KHI THÊM DL MẶC ĐỊNH SẼ CÓ 2 CÁI CỘT NỮA CREATE_AT VÀ UPDATE_AT, ĐỂ FALSE THÌ NÓ SẼ KHÔNG TẠO

    protected $fillable = [
        'tentruyen', 'tomtat', 'danhmuc_id', 'slug_truyen', 'hinhanh', 'kichhoat', 'theloai_id', 'tukhoa', 'created_at', 'updated_at', 'truyen_noibat'
    ];//ĐIỀN NHỮNG CỘT MÀ TA THÊM DL VÀO
    // protected $primaryKey = 'id'; //NẾU SỬ DỤNG TÊN KHÁC THÌ TA PHẢI KHAI BÁO ID
    protected $table = 'truyen';//NẾU ĐẶT TÊN MODEL TRÙNG VS TÊN CỦA TABLE THÌ KHÔNG CẦN KHAI BÁO CÁI NÀY

    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\DanhMucTruyen','danhmuc_id','id');
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter', 'truyen_id', 'id');
    }

    public function theloai(){
        return $this->belongsTo('App\Models\TheLoai', 'theloai_id','id');
    }

    public function thuocnhieudanhmuctruyen(){
        return $this->belongsToMany(DanhMucTruyen::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    }

    public function thuocnhieuloaitruyen(){
        return $this->belongsToMany(TheLoai::class, 'thuocloai', 'truyen_id', 'theloai_id');
    }

}
