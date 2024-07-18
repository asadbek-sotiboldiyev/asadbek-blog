<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['url', 'title', 'poster', 'content', 'telegram_message_id'];

    use HasFactory;

    public static function titleToUrl($title){
        $title = strtolower($title);
        $new_title = "";
        for($i = 0; $i < strlen($title); $i++){
            if( 97 <= ord($title[$i]) and ord($title[$i]) <= 122 or 48 <= ord($title[$i]) and ord($title[$i]) <= 57 )
                $new_title = $new_title . $title[$i];
            elseif($title[$i] == ' ')
                $new_title = $new_title . "-";
        }

        return $new_title;
    }

    public static function urlExists($url){
        $article = Article::select('url')->where('url', '=', $url)->first();
        return !empty($article);
    }
}
