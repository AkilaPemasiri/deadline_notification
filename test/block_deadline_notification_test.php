<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once '../../../config.php';
require_once '/var/www/moodle/blocks/moodleblock.class.php';
require_once '/var/www/moodle/blocks/quizsms/block_quizsms.php';

class block_deadline_notification_test extends advanced_testcase {

    var $test;

    function setUp() {
        $this->testBlock = new block_quiz_notification_test();
    }

    public function test_send_message() {
        //$this->test->send_message('test message', 'akilasbv');
    }

    public function test_connect_to_database() {
        $this->assertNotNull($this->testBlock->db_connect());
    }

    public function test_deadline_notification_subscribe() {
        global $DB;
        $this->resetAfterTest(true);
//             $this->testBlock->quiz_notification_subscribe(1, 'akilasbv');
//             $this->assertEquals(1, $DB->count_records('quizsms_subscriptions', array('userid'=>10)));
    }

    public function test_deadline_unsubscribe() {
        global $DB;
        $this->resetAfterTest(true);
        //$this->testBlock->quiz_notification_unsubscribe(1);
        $this->assertTrue($this->testBlock->quizsms_service_unsubscribe(1), 'fail');
    }

}

?>

