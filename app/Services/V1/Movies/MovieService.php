<?php
namespace App\Services\V1\Movies;

use App\Models\Movie;
use App\Services\V1\Movies\IMovieService;
use App\Traits\ApiResponder;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function get_one(Uuid $movie_id): array
    {
        $movie = $this->movie_model->where('id', $movie_id)->get();
        if (!isset($movie)) {
            throw new NotFoundHttpException('Movie not found');
        }
        return $movie;
    }

    public function add_movie(array $data): JsonResponse
    {
        $new_movie = $this->movie_model->create($data);
        return $this->showOne($new_movie, 201, 'created');
    }

    public function update_movie(array $data): JsonResponse | array
    {
        return [];
    }

    public function delete_movie($movie_id): JsonResponse
    {
        $get_movie = $this->movie_model->where('id', $movie_id)->delete();

        if(!$get_movie) {
            throw new NotFoundHttpException('Movie not found');
        }
        return response()->json(['message'=> "Delete"]);
    }
}
