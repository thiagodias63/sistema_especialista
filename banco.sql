create database trabalho_ia;
use trabalho_ia;
drop table if exists variavel;
create table variavel(
  cod_variavel INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_variavel TEXT NOT NULL,
  PRIMARY KEY(cod_variavel)
);
drop table if exists formulario;
create table formulario(
  cod_formulario INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_formulario VARCHAR(200) NOT NULL,
  diagnostico_final INT UNSIGNED NOT NULL,
  PRIMARY KEY(cod_formulario),
  FOREIGN KEY (diagnostico_final) REFERENCES variavel(cod_variavel)
);
drop table if exists pergunta;
create table pergunta(
  cod_pergunta INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_pergunta TEXT NOT NULL,
  ordem MEDIUMINT NOT NULL,
  proximo_no BOOLEAN NULL,  --1 E, 0 Ou
  cod_formulario INT UNSIGNED NOT NULL,
  cod_variavel INT UNSIGNED NOT NULL,
  PRIMARY KEY(cod_pergunta),
  FOREIGN KEY (cod_formulario) REFERENCES formulario(cod_formulario),
  FOREIGN KEY (cod_variavel) REFERENCES variavel(cod_variavel)
);
drop table if exists resposta;
create table resposta(
  cod_resposta INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_resposta VARCHAR(255) NOT NULL,
  reposta_certa BOOLEAN NOT NULL, --1 Sim, 0 Não
  cod_pergunta INT UNSIGNED NOT NULL,
  PRIMARY KEY(cod_resposta),
  FOREIGN KEY (cod_pergunta) REFERENCES pergunta(cod_pergunta)
);

/* se boolean = 1 será É, se 0 será OU */