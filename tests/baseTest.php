<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 10:44
 */

class baseTest extends \PHPUnit_Framework_TestCase
{
    public function testBase()
    {
        $demo = new \Aw\Cmd();
        $this->assertTrue($demo->isOk());
        $demo->setData('11');
        $this->assertEquals('11', $demo->getData());
        $demo->setMessage('msg');
        $this->assertEquals('msg', $demo->getMessage());

        $demo->error();
        $this->assertEquals('Error', $demo->getMessage());
        $this->assertTrue(!$demo->isOk());
        $this->assertTrue($demo->hasError());

        $demo2 = $demo->duplicate();
        $this->assertTrue(!$demo2->isOk());
        $this->assertTrue($demo2->hasError());
        $demo2->ok();
        $this->assertTrue($demo2->isOk());
        $this->assertTrue(!$demo2->hasError());
        $this->assertTrue(!$demo->isOk());
        $this->assertTrue($demo->hasError());
        $this->assertEquals('OK', $demo2->getMessage());
        $this->assertEquals('Error', $demo->getMessage());
    }

    public function testToString()
    {
        $demo = new \Aw\Cmd();
        print $demo;
    }
}
