<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

interface IMovieService
{
    public function get_list(): Collection | array;

    public function get_one(Uuid $movie_id): array;

    public function add_movie(array $data): JsonResponse | array;

    public function update_movie(array $data): JsonResponse | array;

    /**
     * @return array<str, int>
     */
    public function delete_movie(Uuid $movie_id): array;
}
