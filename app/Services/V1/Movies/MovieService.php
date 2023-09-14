<?php

namespace App\Services;

use App\Models\Movie;
use App\Services\IMovieService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MovieService implements IMovieService
{
    public function __construct(public Movie $movie_model)
    {
    }

    public function get_list(): Collection | array
    {
        $all_movies = $this->movie_model->all();
        return $all_movies;
    }

    public function get_one(Uuid $movie_id): array
    {
        $movie = $this->movie_model->where('id', $movie_id)->get();
        if (!isset($movie)) {
            throw new NotFoundHttpException('Movie not found');
        }
        return $movie;
    }

    public function add_movie(array $data): array
    {
        $get_movie = $this->movie_model->where('name', $data['name']);

        if (isset($get_movie)) {
            throw new Exception("A movie with the same name already exist");
        }
        $new_movie = $this->movie_model->create($data);
        return $new_movie;
    }

    public function update_movie(array $data): JsonResponse | array
    {
        return [];
    }

    public function delete_movie(Uuid $movie_id): array
    {
        return [];
    }
}
