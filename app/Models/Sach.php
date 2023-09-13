<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    protected $dates=[
        'created_at',
        'updated_at'
    ];
    
    public $timestamps = false;//KHI THÊM DL MẶC ĐỊNH SẼ CÓ 2 CÁI CỘT NỮA CREATE_AT VÀ UPDATE_AT, ĐỂ FALSE THÌ NÓ SẼ KHÔNG TẠO

    protected $fillable = [
        'tensach', 'tomtat', 'slug_sach', 'hinhanh', 'kichhoat', 'views', 'created_at', 'updated_at', 'tukhoa', 'noidung'
    ];//ĐIỀN NHỮNG CỘT MÀ TA THÊM DL VÀO
    // protected $primaryKey = 'id'; //NẾU SỬ DỤNG TÊN KHÁC THÌ TA PHẢI KHAI BÁO ID
    protected $table = 'sach';//NẾU ĐẶT TÊN MODEL TRÙNG VS TÊN CỦA TABLE THÌ KHÔNG CẦN KHAI BÁO CÁI NÀY

}
