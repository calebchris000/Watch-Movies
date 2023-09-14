<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @package Movie
 * 
 * @property int $id
 * @property int $name
 * @property int $genre
 * @property int $release_date
 * @property int $language
 * @property int $description
 * @property int $trailers
 * @property int $download_link
 */

class Movie extends Model
{
    use HasFactory;

    /**
     * @var array
     */

    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * @var array
     */
    protected $fillable = ['name', 'genre', 'release_date', 'language', 'description', 'trailers', 'download_link'];
}
