<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:view articles', only: ['index']),
            new Middleware('permission:create articles', only: ['create']),
            new Middleware('permission:edit articles', only: ['edit']),
            new Middleware('permission:delete articles', only: ['destroy']),
        ];
    }



    //This method is for show manage article page


    public function index()
    {

        // latest()->::orderBy('created_at', 'DESC')

        $articles = Article::latest()->paginate(10);
        return view('articles.index', [
            'articles' => $articles
        ]);

    }

    // This function is to show create page
    public function create()
    {
        return view('articles.create');
    }

    // This function is to insert data to DB
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5',
            'text' => 'required',
            'author' => 'required',

        ]);

        if ($validator->passes()) {

            $article = new Article();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();

            return redirect()->route('articles.index')->with('success', 'Articles added succesfully.');

        } else {
            return redirect()->route('articles.create')->withInput()->withErrors($validator);
        }

    }

    // To show edit page
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    // to send updated data to DB
    public function update($id, Request $request)
    {

        $article = Article::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'author' => 'required|min:5',
        ]);

        if ($validator->passes()) {

            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();

            return redirect()->route('articles.index')->with('success', 'Articles updated successfully.');

        } else {
            return redirect()->route('articles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy(Request $request)
    {
        $article = Article::find($request->id);

        if ($article == null) {
            session()->flash('error', 'Article not found');
            return response()->json([
                'status' => false
            ]);
        }

        $article->delete();
        session()->flash('success', 'Article deleted successfully');
        return response()->json([
            'status' => true
        ]);
    }
}
