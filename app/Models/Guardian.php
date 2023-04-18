<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'guardians';

    protected $fillable = [
        'guardian_name',
        'tel',
        'workplace',
        'relationship',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
