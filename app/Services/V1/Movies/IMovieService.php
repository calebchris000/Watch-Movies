<?php
namespace App\Services\V1\Movies;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

interface IMovieService
{
    public function get_list(): Collection | array;

    public function get_one(Uuid $movie_id): array;

    public function add_movie(array $data): JsonResponse | Movie;

    public function update_movie(array $data): JsonResponse | array;

    /**
     * @return array<string, int>
     */
    public function delete_movie(Uuid $movie_id): JsonResponse;
}
