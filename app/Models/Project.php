<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false;
    //protected $fillable = ['nome', 'link', 'link_github', 'url_image', 'url_gif', 'description'];

    public function category() {
        // belongsTo si usa nel model della tabella che ha la chiave esterna, di conseguenza quella che sta dalla parte del molti
        return $this->belongsTo(Category::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
