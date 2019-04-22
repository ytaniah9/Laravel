<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::latest()->paginate(5);
        return view('book.index',compact('books'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'pengarang' => 'required',


        ]);

        book::create($request->all());
        return redirect() -> route('book.index')
                          -> with('success','New Booklist successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::find($id);
        return view ('perpustakaan.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = book::find($id);
        return view ('perpustakaan.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'pengarang' => 'required'

        ]);

        $book = book::find($id);
        $book->judul = $request->get('judul');
        $book->penerbit = $request->get('penerbit');
        $book->tahun_terbit = $request->get('tahun_terbit');
        $book->pengarang = $request->get('pengarang');
        $book->save();

        return redirect() -> route('book.index')
                          -> with('success','New Booklist successfully Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::find($id);
        $book->delete();
        return redirect() -> route('book.index')
                          -> with('success','Booklist successfully Deleted');

    }
}
