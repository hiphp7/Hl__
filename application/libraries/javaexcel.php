<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once dirname(dirname(__FILE__)) . '/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = dirname(dirname(__FILE__)) . '/gen_php_excel';
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', dirname(dirname(__FILE__)));
$loader->registerDefinition('shared', $GEN_DIR);
$loader->register();

require_once $GEN_DIR . '/PhpCall.php';
require_once $GEN_DIR . '/Types.php';

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

/**
 * java 生成 excel
 */
class javaexcel {

    public function CreateExcel($lst, $sql, $ps, $exname) {
        try {
            $socket = new TSocket('127.0.0.1', 9092);
            $socket->setSendTimeout(90000);
            $socket->setRecvTimeout(9000000);

            $transport = new TBufferedTransport($socket, 1024, 1024);
            $protocol = new TBinaryProtocol($transport);
            $client = new PhpCallClient($protocol);

            $transport->open();

            $lst1 = array();
            foreach ($lst as $v) {
                $kv = new keyvalue();
                $kv->key = $v->key;
                $kv->value = $v->value;
                $lst1[] = $kv;
            }

            $exname = $exname . time();
            $result = $client->CreateExcel($lst1, $sql, $ps, $exname);
            $transport->close();

            //if (!empty($result) && $result == true) {
            //    redirect(base_url('upload/ebay/' . $exname . '.xls'));
            //}
            if ($result == 1) {
                return $exname;
            }
            return '';
        } catch (TException $tx) {
            print 'TException: ' . $tx->getMessage() . "\n";
        }
    }

}