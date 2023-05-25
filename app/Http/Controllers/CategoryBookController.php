<?php

namespace App\Http\Controllers;

use App\Models\CategoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryBookController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $categoryBook = CategoryBook::orderBy( 'name', 'ASC' )->get();

        return view( 'admin.categorybook.index', compact(
            'categoryBook'
        ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'admin.categorybook.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $this->validate( $request, [
            'name' => 'required|string|max:255|unique:category_books,name'
        ] );

        $categoryBook = CategoryBook::create( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name )

        ] );

        if ( $categoryBook ) {
            return redirect()->route( 'category.index' )->with( [
                'success' => 'Data Berhasil Disimpan!'
            ] );
        } else {
            return redirect()->route( 'category.index' )->with( [
                'error' => 'Data Gagal Disimpan!'
            ] );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        return view( 'admin.categorybook.edit' );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        $this->validate( $request, [
            'name' => 'required|string|max:255|unique:category_books,name' . $id
        ] );

        $categoryBook = CategoryBook::findOrFail( $id );

        $categoryBook->update( [
            'name' => $request->name,
            'slug' => Str::slug( $request->name )
        ] );

        if ( $categoryBook ) {
            return redirect()->route( 'category.index' )->with( [
                'success' => 'Data Berhasil Diupdate!'
            ] );
        } else {
            return redirect()->route( 'category.index' )->with( [
                'error' => 'Data Gagal Diupdate!'
            ] );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        $categoryBook = CategoryBook::findOrFail( $id );

        $categoryBook->delete();

        if ( $categoryBook ) {
            return redirect()->route('category.index')->with( [
                'success' => 'Data Berhasil Dihapus!'
            ] );
        } else {
            return redirect()->route('category.index')->with( [
                'error' => 'Data Gagal Dihapus!'
            ] );
        }
    }
}
