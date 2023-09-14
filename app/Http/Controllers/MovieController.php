<?php

namespace App\Http\Controllers;

use App\Services\V1\Movies\IMovieService;
use Ramsey\Uuid\Uuid;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieValidationRequest;

class MovieController extends Controller
{
    public function __construct(public IMovieService $imovieService)
    {
    }

    public function index()
    {
        return $this->showAll($this->imovieService->get_list());
    }

    public function show(Uuid $movie_id)
    {
        return $this->imovieService->get_one($movie_id);
    }

    public function store(MovieValidationRequest $request)
    {
        return $this->imovieService->add_movie($request->validated());
    }

    public function update(MovieValidationRequest $request)
    {
        return $this->imovieService->update_movie($request->validated());
    }

    public function destroy(Uuid $movie_id)
    {
        return $this->imovieService->delete_movie($movie_id);
    }
}
