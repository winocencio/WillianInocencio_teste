<?php

function insereMotorista($conexao,$nomeMot,$NascMot,$sxMot,$cpfMot,$modCar,$isAtivo) {
  $query = "insert into tb_motorista (nm_motorista, nasc_motorista,sx_motorista,cpf, md_carro,st_motorista) values ('{$nomeMot}','{$NascMot}','{$sxMot}',{$cpfMot},'{$modCar}',{$isAtivo});";
  mysqli_query($conexao,$query);
}

function inserePassageiro($conexao,$nomePas,$NascPas,$sxPas,$cpfPas) {
  $query = "insert into tb_passsageiro (nm_passageiro, nasc_passageiro,sx_passageiro,cpf) values ('{$nomePas}','{$NascPas}','{$sxPas}',{$cpfPas});";
  mysqli_query($conexao,$query);
}

function insereCorrida($conexao,$valor,$idMot,$idPas) {
  $query = "insert into tb_corrida (valor_corr,id_motorista,id_passageiro) values ({$valor},{$idMot},{$idPas});";
  mysqli_query($conexao,$query);
}

function listaMotorista($conexao) {
  $motoristas = array();
  $resultado = mysqli_query($conexao, "select * from tb_motorista");
  while($motorista = mysqli_fetch_assoc($resultado)) {
      array_push($motoristas, $motorista);
  }
    return $motoristas;
}

function listaPassageiro($conexao) {
  $passageiros = array();
  $resultado = mysqli_query($conexao, "select * from tb_passsageiro");
  while($passageiro = mysqli_fetch_assoc($resultado)) {
      array_push($passageiros, $passageiro);
  }
    return $passageiros;
}
function transIdade($data) {
  $nasc = new DateTime($data);
  $hoje = new DateTime(date('d-m-Y'));
  return $hoje->diff($nasc)->y;
}

function listaNmsMot($conexao) {
  $query = "select id_motorista, nm_motorista from tb_motorista where st_motorista = true;";
  $motS = array();
  $resultado = mysqli_query($conexao, $query);

  while($nome = mysqli_fetch_assoc($resultado)) {
    array_push($motS,$nome);
  }
  return $motS;
}

function listaNmsPas($conexao) {
  $query = "select id_passageiro, nm_passageiro from tb_passsageiro;";
  $pasS = array();
  $resultado = mysqli_query($conexao, $query);

  while($nome = mysqli_fetch_assoc($resultado)) {
    array_push($pasS,$nome);
  }
  return $pasS;
}
