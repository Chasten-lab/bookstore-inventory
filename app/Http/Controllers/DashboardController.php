<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- Cards Data ---

        // Total number of books
        $totalBooks = Book::count();

        // Total number of authors
        $totalAuthors = Author::count();

        // Book count per category
        $booksPerCategory = Book::select('categories.name', DB::raw('COUNT(*) as total'))
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();

        // --- Charts Data ---

        // Stock trend (use 'date' column, not 'created_at')
        $stockTrend = Book::select('date', DB::raw('SUM(stock) as total_stock'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('dashboard', compact(
            'totalBooks',
            'totalAuthors',
            'booksPerCategory',
            'stockTrend'
        ));
    }
}
