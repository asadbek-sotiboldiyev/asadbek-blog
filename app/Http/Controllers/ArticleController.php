<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Http\Controllers\BotController;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('*')->orderBy('id', 'desc')->get();
        return view('blog/index', $data = [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) abort(404);
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        if(!Auth::check()) abort(404);

        $title = $request->input('title');
        $url = Article::titleToUrl($title);

        if(Article::urlExists($url)){
            $url = $url . date('-d-m-Y');
        };
        $content = $request->input('content');
        // $poster = $request->input('poster');

        $bot = BotController::sendMessage($title, $content);

        $new_article = Article::create([
            'url' => $url,
            'title' => $title,
            'content' => $content,
            // 'poster' => $poster,
            'telegram_message_id' => $bot->result->message_id
        ]);
        return redirect()->route('blogShow', ['url' => $url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $article = Article::where('url', $url)->firstOrFail();
        $previous = Article::select('url')->where('id', '<', $article->id)->orderBy('id', 'desc')->first();
        $next = Article::select('url')->where('id', '>', $article->id)->first();
        return view('blog/show', $data = [
            'article' => $article,
            'previous' => $previous,
            'next' => $next
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        if(!Auth::check()) abort(404);

        $article = Article::select('*')->where('url', '=', $url)->firstOrFail();
        return view('blog/edit', $data = [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $url)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        // $poster = $request->input('poster');
        $article = Article::select('*')->where('url', '=', $url)->firstOrFail();
        $new_url = Article::titleToUrl($title);

        if($new_url != $url and Article::urlExists($new_url)){
            $new_url = $new_url . date_format($article->created_at, '-d-m-Y');
        };
        if($article->content != $content)
            BotController::editMessageText($title, $content, $article->telegram_message_id);

        $article->update([
            'url' => $new_url,
            'title' => $title,
            'content' => $content,
            // 'poster' => $poster,
            'telegram_message_id' => $article->telegram_message_id
        ]);

        return redirect()->route('blogShow', ['url' => $new_url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        if(!Auth::check()) abort(404);

        $article = Article::select('*')->where('url', '=', $url)->firstOrFail();
        BotController::deleteMessage($article->telegram_message_id);
        $article->delete();
        return redirect()->route('blogIndex');
    }

    public function delete($url){
        if(!Auth::check()) abort(404);

        $article = Article::select('*')->where('url', '=', $url)->firstOrFail();
        return view('blog/delete', $data = [
            'article' => $article
        ]);
    }



}
