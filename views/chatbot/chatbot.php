<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Chatbot</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/botui/build/botui.min.css" rel="stylesheet">
    <link href="https://unpkg.com/botui/build/botui-theme-default.css" rel="stylesheet">
    <link rel="stylesheet" type="" href="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/css/chatbot.css' ?>">
</head>

<body>
    <a href="<?= '/' . 'GRTT/public/home' ?>"><img class="back" src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/img/arrow-23255_1280.png' ?>" alt=""></a>
    <div id="my-botui-app">
        <bot-ui>
            </botui>
    </div>

    <script src="https://cdn.jsdelivr.net/vue/latest/vue.min.js"></script>
    <script src="https://unpkg.com/botui/build/botui.min.js"></script>
    <script src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/js/chatbot.js' ?>"></script>

</body>

</html>