<?php

        $json = file_get_contents("php://input");
        $update = json_decode($json, true);

        $token = '5409689822:AAGNeNsImZCV6NTgRGp2ULXzcz1zPzDjAB4';
        // Chat::create([
        //     'details' => $json,
        // ]);
        $message = $update->message->text;
        $chat_id = $update->message->chat->id;
return 'ok';
        $rep = json_decode(
            file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$json")
        );