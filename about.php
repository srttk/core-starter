<?php

require(__DIR__."/core/init.php");

//$app['middleware']->auth();
echo $app["template"]->render('about.html',[]);