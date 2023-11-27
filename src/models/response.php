<?php

/** An intrinsic object to manage responses efficiently. */
class Response {
    public readonly bool $success;
    public readonly string $message;
    public readonly mixed $data;

    public function __construct(bool $success, string $message, mixed $data = null) {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }
}
