<?php

namespace WeWork\Tests\Api;

use Mockery\MockInterface;
use WeWork\Api\Euser;
use WeWork\Http\HttpClientInterface;
use WeWork\Tests\TestCase;

class EuserTest extends TestCase
{
    /**
     * @var MockInterface
     */
    protected $httpClient;

    /**
     * @var euser
     */
    protected $euser;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->httpClient = \Mockery::mock(HttpClientInterface::class);

        $this->euser = new Euser();
    }

    /**
     * @return void
     */
    public function testGet()
    {
        $this->httpClient->shouldReceive('get')
            ->once()
            ->with('externalcontact/get', ['external_userid' => 'foo'])
            ->andReturn(['errcode' => 0]);

        $this->euser->setHttpClient($this->httpClient);

        $this->assertEquals(['errcode' => 0], $this->euser->get('foo'));
    }
}
