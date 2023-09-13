<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    
    public $timestamps = false;//KHI THÊM DL MẶC ĐỊNH SẼ CÓ 2 CÁI CỘT NỮA CREATE_AT VÀ UPDATE_AT, ĐỂ FALSE THÌ NÓ SẼ KHÔNG TẠO
    protected $fillable = [
        'title', 'image','status','publisher_id'
    ];//ĐIỀN NHỮNG CỘT MÀ TA THÊM DL VÀO
    // protected $primaryKey = 'id'; //NẾU SỬ DỤNG TÊN KHÁC THÌ TA PHẢI KHAI BÁO ID
    protected $table = 'favorites';//NẾU ĐẶT TÊN MODEL TRÙNG VS TÊN CỦA TABLE THÌ KHÔNG CẦN KHAI BÁO CÁI NÀY
}
