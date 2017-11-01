<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once dirname(dirname(__FILE__)) . '/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = dirname(dirname(__FILE__)) . '/gen_php_geo';
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', dirname(dirname(__FILE__)));
$loader->registerDefinition('shared', $GEN_DIR);
$loader->register();

require_once $GEN_DIR . '/GeoCall.php';
require_once $GEN_DIR . '/Types.php';

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

/**
 * java 生成 excel
 */
class javageo {

    public function Find($place, $category, $minPrice, $maxPrice, $mymaxDistance, $pageIndex, $pageSize) {
        $result = '';
        try {
            $socket = new TSocket('112.74.171.99', 9093);
            $socket->setSendTimeout(90000);
            $socket->setRecvTimeout(9000000);

            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new GeoCallClient($protocol);

            $transport->open();
            
            $result = $client->Find($place, $category, $minPrice, $maxPrice, $mymaxDistance, $pageIndex, $pageSize);
            $transport->close();

        } catch (TException $tx) {
            print 'TException: ' . $tx->getMessage() . "\n";
        }
        return $result;
    }
    
    public function FindByBaidu($place, $category, $minPrice, $maxPrice, $mymaxDistance, $pageIndex, $pageSize) {
        $result = '';
        try {
            $socket = new TSocket('112.74.171.99', 9093);
            $socket->setSendTimeout(90000);
            $socket->setRecvTimeout(9000000);

            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new GeoCallClient($protocol);

            $transport->open();
            
            $result = $client->FindByBaidu($place, $category, $minPrice, $maxPrice, $mymaxDistance, $pageIndex, $pageSize);
            $transport->close();

        } catch (TException $tx) {
            print 'TException: ' . $tx->getMessage() . "\n";
        }
        return $result;
    }
	 public function WaitShow($orderId) {
        try {
            $socket = new TSocket('112.74.171.99', 9093);
            $socket->setSendTimeout(90000);
            $socket->setRecvTimeout(9000000);

            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new GeoCallClient($protocol);

            $transport->open();
            
            $result=$client->WaitShow($orderId);
            $transport->close();

        } catch (TException $tx) {
            print 'TException: ' . $tx->getMessage() . "\n";
        }
    }
}