<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use PhpAmqpLib\Connection\AMQPConnection;

$parameters = Yaml::parse(__DIR__.'/../parameters.yml');

$connection = new AMQPConnection(
    $parameters['parameters']['host'],
    $parameters['parameters']['port'],
    $parameters['parameters']['user'],
    $parameters['parameters']['password']
);
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
