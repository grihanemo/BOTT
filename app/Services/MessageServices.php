<?php


namespace App\Services;
use GuzzleHttp\Client;
use App\service\PalindromService;

class MessageServices
{
    private $baseUrl;
    private $token;
    private $client;
    private $text;
    private $chatID;
    private $otvet;
    function __construct(){
        $this->baseUrl = env ('TELEGRAM_API_URL');
        $this->token = env ('TELEGRAM_BOT_TOKEN');

        $this->client = new Client(
            ['base_uri' => $this->baseUrl . 'bot' . $this->token . '/']
        );
    }
    public function getMessages(){
        $response = $this->client->request('GET','getUpdates',['query' => ['offset' => -1]]);
        if($response->getStatusCode() === 200) {
            $messages = json_decode($response->getBody()->getContents(), true);
            if(array_key_exists('edited_message', $messages['result'][0])) {
                $this->chatID = $messages['result'][0]['edited_message']['chat']['id'];
                $this->text = $messages['result'][0]['edited_message']['text'];
            } else {
                $this->chatID = $messages['result'][0]['message']['chat']['id'];
                $this->text = $messages['result'][0]['message']['text'];
            }

            $this->otvet = PalindromService::palindrom($this->text);
            $this->sendMessage();
        }
        

    }
    public function sendMessage(){

        $this->client->request('GET','sendMessage',['query' => [
            'chat_id' => $this->chatID,
            'text' => $this->otvet
        ]]);

    }
}