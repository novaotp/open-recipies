<?php

function unless(bool $condition, mixed $onSuccess, mixed $onFail): mixed
{
  return $condition ? $onSuccess : $onFail;
}
