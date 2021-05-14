<?php

require "../backend/tarefa.model.php";
require "../backend/tarefa.service.php";
require "../backend/conexao.php";

//classe tarefa (parametros da tabela)
$tarefa = new Tarefa();
//name
$tarefa->__set('tarefa', $_POST['tarefa']);

//conexao
$conexao = new Conexao();


//crud
$tarefaService = new TarefaService($conexao, $tarefa);
$tarefaService->inserir();