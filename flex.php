<?php
// Telegram Bot Token
$token = "7559833109:AAF75cKFpCNYmCFkyjvb7APmY9q04DfulOo"; 

// Get updates from Telegram
$update = json_decode(file_get_contents("php://input"), true);

// Extract chat ID and message
$chat_id = $update["message"]["chat"]["id"] ?? "";
$text = $update["message"]["text"] ?? "";

// Define basic command responses
if ($text == "/start") {
    sendMessage($chat_id, "Welcome to the bot! Send /help to see commands.");
} elseif ($text == "/help") {
    sendMessage($chat_id, "Available commands:\n/start - Start the bot\n/help - Show this message");
} else {
    sendMessage($chat_id, "I don't understand that command.");
}

// Function to send messages
function sendMessage($chat_id, $message) {
    global $token;
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chat_id,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    file_get_contents($url . "?" . http_build_query($data));
}
?>