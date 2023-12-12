<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comics extends Model
{
    protected $primaryKey = 'comic_id';
    use HasFactory;
    protected $fillable = [
    'title',
    'outline',
    'author',
    'day_of_week',
    'image_url',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //keywordに対するリレーション
    public function keywords(){
        return $this->belongsToMany(keywords::class,'comics_keywords','comic_id','keyword_id');
    }
    //userに対するリレーション
    public function users(){
        return $this->belongsToMany(Users::class);
    }
}
