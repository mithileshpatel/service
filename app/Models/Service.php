<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category','images',
    ];

    protected $casts = [
        'images' => 'json', // Cast 'images' attribute to JSON type
    ];

    public function setImagesAttribute($value)
    {
        // Encode the value as JSON without escaping slashes
        $this->attributes['images'] = json_encode($value, JSON_UNESCAPED_SLASHES);
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}
public function categoryName()
{
    $category = Category::find($this->category);
    return $category ? $category->name : '';
}

}
