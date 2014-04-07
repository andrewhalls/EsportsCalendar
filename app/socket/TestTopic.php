<?php
use \Sidney\Latchet\BaseTopic;

class TestTopic extends BaseTopic
{
    public function subscribe($connection, $topic, $roomid = null)
    {
        //useful for debuging as this will echo the text in the console
        $this->publish($connection, $topic, 'Teting', array(), array());
    }

    public function publish($connection, $topic, $message, array $exclude, array $eligible)
    {
        $this->broadcast($topic, array('title' => 'Test', 'msg' => 'New broadcasted message!'));
    }

    public function call($connection, $id, $topic, array $params)
    {

    }

    public function unsubscribe($connection, $topic)
    {

    }

}
