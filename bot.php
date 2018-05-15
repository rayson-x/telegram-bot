<?php
include "vendor/autoload.php";

$token = '581421347:AAHPX0UYRMqBaLmrKy-pMmIQjY8L1kgohkg';
$username = 'AAAAAE8OFbVJq7dA1hsllg_bot';

$loop = \React\EventLoop\Factory::create();

// todo 节奏复读
// todo 指定每次复读间隔时间
// todo 指定复读语句
// todo 监听发言,对指定时间内重复率最高的语句进行复读
// todo 自动骂人
// todo 定制指定用户指定骂人信息
// todo 校验使用者信息,只有部分用户允许使用自动骂人
// todo 统计近期内群友最常说的话以及关键词
// todo 复读时,尝试将多条消息合并

// todo 底层运行机制改为异步io
// todo 启用swoole
// todo 使用中间件功能,每一条消息交由一系列中间件处理,每一个中间件取出自己需要的内容后发起异步任务进行处理(处理非命令消息)

$loop->addPeriodicTimer(1, function () use ($token, $username) {
    try {
        $telegram = new Longman\TelegramBot\Telegram($token, $username);

        $telegram->useGetUpdatesWithoutDatabase();

        $telegram->setCustomInput(file_get_contents('bot.json'));

        $telegram->handleGetUpdates();
    } catch (Longman\TelegramBot\Exception\TelegramException $e) {
        echo $e->getMessage();
    }
});

$loop->run();