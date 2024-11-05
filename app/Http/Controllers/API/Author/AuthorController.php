<?php

namespace App\Http\Controllers\API\Author;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Http\Requests\API\Author\AuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $authors = Author::all();
        return response()->json([
            'success' => true,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request): JsonResponse
    {
        $author = Author::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'author' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author): JsonResponse
    {
        return response()->json([
            'success' => true,
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author): JsonResponse
    {
        $author->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'author' => $author
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): JsonResponse
    {
        $author->delete();
        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ]);
    }
}
