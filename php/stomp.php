<?php
//send a message to the queue
function sendMQ()
{
    try {
        $link = new Stomp('tcp://10.1.176.27:61613', 'guest', 'password');
        $result = $link->send('/queue/test', 'fgddfg', array("persistent" => "true"));
        if (false === $result) {
            die("发送消息失败");
        }
    } catch (StompException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

//receive message
function receiveMQ($queue)
{
    $link = openMQ();
    stomp_subscribe($link, $queue);

    while (1) {
        var_dump('aa');
        if (true === stomp_has_frame($link)) {
            $frame = stomp_read_frame($link);
            var_dump($frame);
            if (false !== $frame) {
                stomp_ack($link, $frame['headers']['message-id']);
            } else {
                break;
            }
        } else {
            break;
        }
    }
    stomp_unsubscribe($link, $queue);
    stomp_close($link);
}

//connection ActiveMQ
function openMQ(&$queue = false)
{

    $link = stomp_connect('tcp://10.1.176.27:61613');
    if (!$link) {
        die("Can't connect MQ !!");
    } else {
        return $link;
    }
}

$queue = '/queue/test';
sendMQ();
receiveMQ($queue);
