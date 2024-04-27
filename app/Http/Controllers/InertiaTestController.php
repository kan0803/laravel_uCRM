<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;
use Illuminate\Support\Facades\Log;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }

    public function show($id)
    {
        //dd($id);
        return Inertia::render('Inertia/Show',
            [
                'id' => $id,
                'blog' => InertiaTest::findOrFail($id)
            ]
        );
    }

    public function store(Request $request)
    {
        Log::debug('before');
        Log::debug($request);

        $validate = $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        //$request->validate([
        //    'title' => 'required|unique:posts|max:20',
        //    'content' => 'required',
        //]);

        Log::debug('message');
        Log::debug($request);
        Log::debug($validate);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました。'
        ]);
    }

    public function delete($id){
        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました。'
        ]);
    }
}
