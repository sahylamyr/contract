<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'company', 'category_id', 'date', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function contract_file()
    {
        return $this->hasOne(File::class);
    }
}
