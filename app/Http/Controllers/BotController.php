<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public static $BOT_TOKEN;
    public static $BOT_CHANNEL_ID;
    public static $API;

    public static function formatToHTML($title, $text){
        $replaces = [
            "\n" => ["<p><br></p>", '</p>', '<p>', '</br>', '<br>', "<ul>", '</ul>',  '</li>'],
            "\$" => ['$'],
            " - " => ['<li>'],
            "<b>" => ['<h1>'],
            "" => ["<div>", "</div>"],
            "</b>\n" => ["</h1>"],
            " " => ["&nbsp;"]
        ];
        foreach($replaces as $character => $list){
            foreach($list as $tag)
                $text = str_replace($tag, $character, $text);
        }

        $text = "<b>$title</b>\n\n" . $text;

        $text = $text . "\n\n<a href='https://t.me/sotiboldiyev_asadbek'>🧑‍💻Asadbek's blog</a>";
        $text = str_replace("\n\n\n", "\n\n", $text);

        return $text;
    }

    /**
     * Telegram kanalga maqolani yuboradi 
     */
    public static function sendMessage($title, $text){
        $text = self::formatToHTML($title, $text);
        $data = [
            'chat_id' => self::$BOT_CHANNEL_ID,
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true
        ];
        return self::call('sendMessage', $data);
    }

    public static function editMessageText($title, $text, $message_id){
        $text = self::formatToHTML($title, $text);
        
        $data = [
            'chat_id' => self::$BOT_CHANNEL_ID,
            'message_id' => $message_id,
            'text' => $text,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true
        ];
        return self::call('editMessageText', $data);
    }

    public static function deleteMessage($message_id)
    {
        $data = [
            'chat_id' => self::$BOT_CHANNEL_ID,
            'message_id' => $message_id,
        ];
        return self::call('deleteMessage', $data);
    }

    /**
     * Umumiy API uchun call qiladi
     * @param [ sendMessage, editMessageText ] $method
     * @return object
     */
    public static function call($method, $data){
        $api_url = "https://api.telegram.org/bot" . BotController::$BOT_TOKEN . '/' . $method;
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        return json_decode($response);
    }
}

BotController::$BOT_TOKEN = env('BOT_TOKEN');
BotController::$BOT_CHANNEL_ID = env('BOT_CHANNEL_ID');
BotController::$API = "https://api.telegram.org/bot" . BotController::$BOT_TOKEN . '/';