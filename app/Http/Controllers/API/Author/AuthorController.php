<?php

namespace App\Http\Controllers\API\Author;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\Author\AuthorRequest;
use App\Http\Requests\API\Author\AuthorUpdateRequest;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $authors = User::where('rule_id', 2)->get();
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
        $data = $request->validated();
        $data['rule_id'] = 2;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        $author = User::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'author' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $author): JsonResponse
    {
        return response()->json([
            'success' => true,
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorUpdateRequest $request, User $author): JsonResponse
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $this->deleteAuthorImage($author);
            $data['image'] = $request->file('image')->store('authors/', 'public');
        }
        $author->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'author' => $author
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author): JsonResponse
    {
        $author->delete();
        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully'
        ]);
    }

    private function deleteAuthorImage(User $author): void
    {
        if ($author->image) {
            Storage::disk('public')->delete($author->image);
        }
    }
}
