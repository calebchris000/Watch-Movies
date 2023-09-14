<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;

interface IMovieService
{
    public function get_list(): Collection | array;

    public function get_one(): Collection | array;

    public function add_movie(array $data): JsonResponse;

    public function update_movie(array $data): JsonResponse;

    /**
     * @return array<str, int>
     */
    public function delete_movie(Uuid $movie_id): array;
}
