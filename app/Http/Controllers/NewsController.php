<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::getAllNews()->paginate(10);

        return view('news', compact('news'));
    }

    public function store(StoreNewsRequest $request)
    {
        $validated = $request->validated();

        News::create($validated);

        return $this->redirect('News add');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function created()
    {
        return view('news.create');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return $this->redirect('News deleted');
    }
}
