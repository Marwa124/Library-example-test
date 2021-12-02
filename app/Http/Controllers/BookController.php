<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $books = Book::paginate(25);
    return view('books.index', compact('books'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('books.form', ['book' => false]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreBookRequest $request)
  {
    Book::create($request->all());

    return redirect()->route('books.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show(Book $book)
  {
    return view('books.show', compact('book'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Book $book)
  {
    return view('books.form', compact('book'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(UpdateBookRequest $request, Book $book)
  {
    $book->update($request->all());

    return redirect()->route('books.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Book $book)
  {
    $book->delete();

    return back();
  }

}

?>
