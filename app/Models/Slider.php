<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{

    use  HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'images',
        'category_id',
        'is_active',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_ar' => 'required|min:1|max:191',
        'name_en' => 'required|min:1|max:191',
        'category_id' => 'required|exists:categories,id',
        'is_active' => 'required|in:1,0',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function getImagesAttribute($value)
    {
        $photos = json_decode($value);
        if ($photos)
            foreach ($photos as $index => $photo)
                $photos[$index] = asset($photo);
        return $photos;
    }





    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d H:i');
    }


}
