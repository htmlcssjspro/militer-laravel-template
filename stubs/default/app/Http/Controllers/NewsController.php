<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $page = [
            'metaTitle' => 'News',
            'metaDescription' => 'News Description',
            'title' => 'Новости',
        ];
        return view('news.index', compact('news', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    // public function show(News $news)
    public function show(News $news)
    {
        $data = [
            'metaTitle' => "Страница Новости $news",
            'metaDescription' => 'News Description',
            'content' => "Content of $news. Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Он деревни путь которой подпоясал, жаренные буквоград вскоре! Однажды предупреждал журчит себя путь ему инициал вскоре злых грамматики всемогущая первую.",
            'author' => "Author of $news",
            'date' => "Date of $news",
            'img' => "$news",
        ];
        return view('news.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
