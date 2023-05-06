<?php
use Core\Container;

Test('Test resolve result from the container', function () {
  // Arrange 
  $container = new Container();
  $container->bind('foo', fn() => 'bar');

  // Act

  $result = $container->resolve('foo');

  // Expect

  expect($result)->toEqual('bar');
});