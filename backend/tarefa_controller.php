<?php

require "../backend/tarefa.model.php";
require "../backend/tarefa.service.php";
require "../backend/conexao.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;



if ($acao  == 'inserir') {

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    $conexao = new Conexao();

    //crud
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1'); //para mostrar uma mensagem




} else if ($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
} else if ($acao == 'remover') {

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remover();

    header('Location: todas_tarefas.php');
} else if ($acao == 'atualizar') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->atualizar()) {
        header('location: todas_tarefas.php');
    }
}
