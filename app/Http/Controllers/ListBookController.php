<?php

namespace App\Http\Controllers;

use App\Models\CategoryBook;
use App\Models\ListBook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListBookController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $listBook = ListBook::all();

        return view( 'admin.listbook.index', compact(
            'listBook'
        ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        $categoryBook = CategoryBook::all();

        return view( 'admin.listbook.create', compact(
            'categoryBook'
        ) );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $this->validate( $request, [
            'name' => 'required',
            'writer' => 'required|string',
            'publisher' => 'required|string',
            'categoryBook' => 'required',
            'description' => 'required|string',
        ] );

        $listBook = ListBook::create( [
            'name' => $request->name,
            'categoryBook' => $request->categoryBook,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'slug' => Str::slug( $request->name ),
            'description' => $request->description
        ] );

        if ( $listBook ) {
            return redirect()->route( 'listbook.index' )->with( 'success', 'Data berhasil ditambahkan' );
        } else {
            return redirect()->route( 'listbook.index' )->with( 'failed', 'Data gagal ditambahkan' );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        $listBook = ListBook::findOrFail( $id );

        return view( 'admin.listbook.show', compact(
            'listBook'
        ) );
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $listBook = ListBook::findOrFail( $id );
        $categoryBook = CategoryBook::orderBy( 'name', 'ASC' )->get();

        return view( 'admin.listbook.edit', compact(
            'listBook',
            'categoryBook'
        ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {

        $listBook = ListBook::findOrFail( $id );

        $this->validate( $request, [
            'name' => 'required',
            'writer' => 'required|string',
            'publisher' => 'required|string',
            'categoryBook' => 'required',
            'description' => 'required|string',
        ] );

        $listBook->update( [
            'name' => $request->name,
            'categoryBook' => $request->categoryBook,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'slug' => Str::slug( $request->name ),
            'description' => $request->description
        ] );

        if ( $listBook ) {
            return redirect()->route( 'listbook.index' )->with( 'success', 'Data berhasil diubah' );
        } else {
            return redirect()->route( 'listbook.index' )->with( 'failed', 'Data gagal diubah' );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $listBook = ListBook::findOrFail( $id );

        $listBook->delete();

        if ( $listBook ) {
            return redirect()->route( 'listbook.index' )->with( 'success', 'Data berhasil dihapus' );
        } else {
            return redirect()->route( 'listbook.index' )->with( 'failed', 'Data gagal dihapus' );
        }
    }
}
