<?php

namespace App\Models\Store;

use App\Models\MediaLibrary\MediaLibrary;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Define the fillable attributes
    protected $fillable = [
        "user_id",
        "team_id",
        "title",
        "slug",
        "address",
        "content",
        "published",
        "tags",
        "show_author",
        "trash",
        "author_id",
    ];

    // Define the relationship with the Team model
    public function team()
    {
        return $this->belongsTo(Team::class, "team_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function authors()
    {
        return $this->belongsToMany(User::class, "author_store");
    }

    public function states()
    {
        return $this->belongsToMany(
            StoreState::class,
            "store_state_relations",
            "store_id",
            "state_id"
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            StoreCategory::class,
            "store_category_relations",
            "store_id",
            "category_id"
        );
    }
    public function coverImages()
    {
        return $this->belongsToMany(
            MediaLibrary::class,
            "store_cover_image_relations",
            "store_id",
            "media_library_id"
        );
    }
}
