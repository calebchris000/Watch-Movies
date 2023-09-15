<?php

namespace App\Services\V1\Movies;

use App\Models\Movie;
use App\Services\V1\Movies\IMovieService;
use App\Traits\ApiResponder;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class MovieService implements IMovieService
{
    use ApiResponder;
    public function __construct(public Movie $movie_model)
    {
    }

    public function get_list(): Collection | array
    {
        $all_movies = $this->movie_model->all();
        return $all_movies;
    }

    public function get_one($movie_id): JsonResponse
    {
        $movie = $this->movie_model->where('id', $movie_id)->first();
        if (!$movie instanceof Movie) {
            return response()->json(['message' => 'Movie is not found', 'status_code' => 404], 404);
        }
        return $this->showOne($movie);
    }

    public function add_movie(array $data): JsonResponse
    {
        $get_movie = $this->movie_model->where('name', $data['name'])->first();
        if ($get_movie instanceof Model) {
            return response()->json($this->sendError('The movie already exist', 400), 400);
        }
        $new_movie = $this->movie_model->create($data);
        return $this->showOne($new_movie, 201, 'created');
    }

    public function update_movie(array $data, $movie_id): JsonResponse
    {
        $get_movie = $this->movie_model->find($movie_id);
        if (!$get_movie instanceof Model) {
            return response()->json($this->sendError('The movie does not exist', 404), 404);
        }
        $get_movie->update($data);
        return $this->showOne($get_movie);
    }

    public function delete_movie($movie_id): JsonResponse
    {
        $get_movie = $this->movie_model->find($movie_id);

        if (!$get_movie instanceof Model) {
            return response()->json($this->sendError('The movie already does not exist', 404), 404);
        }
        $count = $get_movie->delete();
        return $this->sendCount($count);
    }
}
