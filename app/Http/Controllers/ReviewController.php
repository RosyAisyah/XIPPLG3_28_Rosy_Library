<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Menampilkan semua data reviews
     */
    public function index()
    {
        $reviews = Review::all();

        return response()->json([
            'status'  => 200,
            'message' => 'Reviews retrieved successfully.',
            'data'    => $reviews
        ], 200);
    }

    /**
     * Menyimpan data review baru
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'book_id' => 'required|integer',
            'user1_id' => 'required|integer',
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        // Menyimpan data ke database dengan mass assignment
        $review = Review::create($request->all());

        return response()->json([
            'status'  => 201,
            'message' => 'Review created successfully.',
            'data'    => $review
        ], 201);
    }

    /**
     * Menampilkan data review berdasarkan id
     */
    public function show($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status'  => 404,
                'message' => 'Review not found.',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'status'  => 200,
            'message' => 'Review retrieved successfully.',
            'data'    => $review
        ], 200);
    }

    /**
     * Mengupdate data review berdasarkan id
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status'  => 404,
                'message' => 'Review not found.',
                'data'    => null
            ], 404);
        }

        // Validasi data yang akan diupdate
        $request->validate([
            'book_id' => 'integer',
            'user1_id' => 'integer',
            'rating'  => 'integer|min:1|max:5',
            'comment' => 'string',
        ]);

        // Update data
        $review->update($request->all());

        return response()->json([
            'status'  => 200,
            'message' => 'Review updated successfully.',
            'data'    => $review
        ], 200);
    }

    /**
     * Menghapus data review berdasarkan id
     */
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status'  => 404,
                'message' => 'Review not found.',
                'data'    => null
            ], 404);
        }

        $review->delete();

        return response()->json([
            'status'  => 200,
            'message' => 'Review deleted successfully.',
            'data'    => null
        ], 200);
    }
}
