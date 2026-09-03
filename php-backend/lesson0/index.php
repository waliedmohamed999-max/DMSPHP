<?php
// This runs in Web Server mode (handles an HTTP request)
echo "<h1>Hello from PHP Web Server!</h1>";
echo "<p>Request method: " . $_SERVER['REQUEST_METHOD'] . "</p>";
echo "<p>Server software: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
