<?php
namespace App\Services\V1\Movies;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface IMovieService
{
    public function get_list(): Collection | array;

    public function get_one($movie_id): JsonResponse;

    public function add_movie(array $data): JsonResponse | Movie;

    public function update_movie(array $data, $movie_id): JsonResponse;
    /**
     * @return array<string, int>
     */
    public function delete_movie($movie_id): JsonResponse;
}
