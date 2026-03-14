<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// （1）テンプレートファイルの指定と値の設定
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array(
        'value' => 'Silex'
    ));
});