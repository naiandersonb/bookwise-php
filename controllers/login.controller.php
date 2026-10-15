<?php

$msg = $_REQUEST['msg'] ?? '';

view("login", compact('msg'));