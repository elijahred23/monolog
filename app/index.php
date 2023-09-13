<?php 

require '../vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

$logger = new Logger('my_logger');

$logFile = 'app.log';
$streamHandler = new StreamHandler($logFile, Logger::INFO);

$jsonFormatter = new JsonFormatter();
$streamHandler->setFormatter($jsonFormatter);

$logger->pushHandler($streamHandler);

$logRecord = [
	'message' => 'This is an informational message.',
	'level' => Logger::INFO,
	'extra' => [
		'application' => 'MyApp',
		'environment' => 'Production',
	],
];

$logger->info('', $logRecord);
