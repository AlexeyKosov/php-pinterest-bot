<?php
namespace seregazhuk\tests;

use seregazhuk\PinterestBot\Providers\Conversations;

class ConversationsTest extends ProviderTest
{
    /**
     * @var Conversations
     */
    protected $provider;

    protected function setUp()
    {
        $this->provider = new Conversations($this->createRequestMock());
        parent::setUp();
    }

    public function testSendMessage()
    {
        $res = array(
            'resource_response' => array(
                'data' => array(
                    "id" => "0000000000000",
                ),
                'error' => null,
            ),
        );

        $mock = $this->createRequestMock();
        $mock->expects($this->at(1))->method('exec')->willReturn($res);
        $this->setProperty('request', $mock);

        $userId = '0000000000000';
        $message = 'test';
        $this->assertTrue($this->provider->sendMessage($userId, $message));
    }
}
