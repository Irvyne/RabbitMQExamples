<?php
/**
 * Created by Thibaud BARDIN (Irvyne)
 * This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$parameters = Yaml::parse(__DIR__.'/../parameters.yml');

$connection = new AMQPConnection(
    $parameters['parameters']['host'],
    $parameters['parameters']['port'],
    $parameters['parameters']['user'],
    $parameters['parameters']['password']
);
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo ' [x] Sent \'Hello World!\'', "\n";

$channel->close();
$connection->close();