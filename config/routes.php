<?php
//routes for controllers and their action
return array(
    'exit'=>'user/exit',
    'add'=>'note/add',
    'dashboard'=>'note/open',
    'delete/([0-9]+)'=>'note/delete/$1',
    'login'=>'user/login',
    'registration'=>'user/registration',
    'index'=>'main/open',
    'main'=>'main/open',
    ''=>'main/open',
);