<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Str; // Import Str

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'image_path', 'status'];

    // Relasi: Satu project milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Mutator untuk otomatis membuat slug saat menyimpan judul
     protected static function boot() {
        parent::boot();
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
         static::updating(function ($project) {
             if ($project->isDirty('title')) {
                $project->slug = Str::slug($project->title);
             }
        });
    }
}