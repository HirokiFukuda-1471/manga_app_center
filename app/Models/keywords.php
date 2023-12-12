<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    protected $primaryKey = 'keyword_id';
    use HasFactory;
    protected $fillable = [
    'keyword_type',
    ];
    
    public function getByCategory(int $limit_count = 5)
    {
         return $this->comics()->with('keywords')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    //comicに対するリレーション
    public function comics(){
        return $this->belongsToMany(Comics::class);
    }
    
}