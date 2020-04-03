#!/usr/bin/env php
<?php 

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false, 'base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
	//Remover acentuação do texto apresentado no Prompt
	/*
	$textoSemAcentuacao = preg_replace('/[~\´`^]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $curso));
	echo $textoSemAcentuacao . PHP_EOL;
	*/

	echo $curso . PHP_EOL;
}