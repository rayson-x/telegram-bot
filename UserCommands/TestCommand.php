<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Commands\Command;

class TestCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'test';

    /**
     * @var string
     */
    protected $description = 'Test command';

    /**
     * @var string
     */
    protected $usage = '/test';

    /**
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * Command execute method
     *
     * @return mixed
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $user_id = $message->getFrom()->getId();

        $data = [
            'chat_id' => $chat_id,
            'text'    => $user_id . 'test',
        ];

        return Request::sendMessage($data);
    }
}