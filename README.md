# RabbitMQ Examples

## Requirements

* First of all, install RabbitMQ locally
* Then make sur you have composer installed, if not [go here](https://getcomposer.org/download)
* Then run ```php composer.phar install``` if composer is installed locally or ```composer install``` if it's installed globally

## [Hello World](https://github.com/Irvyne/RabbitMQExamples/tree/master/hello-world)

![Hello World](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-hello-world.png "Hello World")

1. In one terminal run the sender ```php send.php```
2. Then in another run the receiver ```php receiver.php```

## [Work Queues](https://github.com/Irvyne/RabbitMQExamples/tree/master/work-queues)

![Work Queues](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-work-queues.png "Work Queues")

1. In one terminal run the sender ```php worker.php```
2. Then in another run the receiver ```php newTask.php {{task}}```

## [Publish/Subscribe](https://github.com/Irvyne/RabbitMQExamples/tree/master/publish-subscribe)

![Publish/Subscribe](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-publish-subscribe.png "Publish/Subscribe")

1. In one terminal receive logs on screen ```php receive_logs.php``` or save them ```php receive_logs.php > logs_from_rabbit.log```
2. In another terminal do the same as above (2 receivers)
3. Now, emit log with ```php emit_log.php```
4. Using rabbitmqctl list_bindings you can verify that the code actually creates bindings and queues as we want. With two receive_logs.php programs running you should see something like:
```
sudo rabbitmqctl list_bindings
Listing bindings ...
logs    exchange        amq.gen-JzTY20BRgKO-HjmUJj0wLg  queue           []
logs    exchange        amq.gen-vso0PVvyiRIL2WoV3i48Yg  queue           []
...done.
```

## [Routing](https://github.com/Irvyne/RabbitMQExamples/tree/master/routing)

![Routing](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-routing.png "Routing")

## [Topics](https://github.com/Irvyne/RabbitMQExamples/tree/master/topics)

![Topics](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-topics.png "Topics")

## [RPC](https://github.com/Irvyne/RabbitMQExamples/tree/master/rpc)

![RPC](https://raw.githubusercontent.com/Irvyne/RabbitMQExamples/master/assets/project-rpc.png "RPC")

### License

This code is under the MIT License (https://github.com/Irvyne/license/blob/master/MIT.md)