<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Commands\Command;

class RepeatCommand extends Command
{
    /**
     * @var string
     */
    protected $name = 'repeat';

    /**
     * @var string
     */
    protected $description = 'repeat command';

    /**
     * @var string
     */
    protected $usage = '/repeat';

    /**
     * @var string
     */
    protected $version = '1.0.0';

    protected $sendNum = 10;

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

        $i = 0;
        while ($i < $this->sendNum) {
            $i++;

            $data = [
                'chat_id' => $chat_id,
                'text'    => $message->getText(true),
            ];

            Request::sendMessage($data);
        }
    }
}