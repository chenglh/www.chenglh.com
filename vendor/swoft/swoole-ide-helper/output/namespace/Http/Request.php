<?php

namespace Swoole\Http;

/**
 * @since 4.4.16
 */
class Request
{

    // property of the class Request
    public $fd;
    public $streamId;
    public $header;
    public $server;
    public $cookie;
    public $get;
    public $files;
    public $post;
    public $tmpfiles;

    /**
     * @return mixed
     */
    public function rawContent(){}

    /**
     * @return mixed
     */
    public function getData(){}
}