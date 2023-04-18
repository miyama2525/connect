<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //categoriesテーブルから::pluckでcategory_nameとidを抽出、$categoriesに返す関数を作る
    public function getLists()
    {
        $categories = Category::pluck('category_name', 'id');

        return $categories;
    }
    
    public function products()
    {
        return $this->hasMany(PostContent::class);
    }
}
