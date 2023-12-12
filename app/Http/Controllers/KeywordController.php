<?php
use App\Models\Keyword;

public function index(keywords $keyword)
{
    return view('categories.index')->with(['posts' => $category->getByCategory()]);
}
