create database trabalho_ia;
use trabalho_ia;

create table variavel(
  cod_variavel INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_variavel TEXT NOT NULL,
  PRIMARY KEY(cod_variavel)
);

create table formulario(
  cod_formulario INT UNSIGNED AUTO_INCREMENT NOT NULL,
  desc_formulario VARCHAR(200) NOT NULL,
  PRIMARY KEY(cod_formulario)
);

create table pergunta(
  cod_pergunta INT UNSIGNED AUTO_INCREMENT NOT NULL,
  ordem MEDIUMINT NOT NULL,
  proximo_no BOOLEAN NULL, /* se boolean = 1 será É, se 0 será OU */
  cod_formulario INT UNSIGNED NOT NULL,
  cod_variavel INT UNSIGNED NOT NULL,
  PRIMARY KEY(cod_pergunta),
  FOREIGN KEY (cod_formulario) REFERENCES formulario(cod_formulario),
  FOREIGN KEY (cod_variavel) REFERENCES variavel(cod_variavel)
);
alter table pergunta
change column ordem ordem MEDIUMINT UNIQUE NOT NULL;

create table resposta(
  cod_resposta INT UNSIGNED AUTO_INCREMENT NOT NULL,
  reposta_certa BOOLEAN NOT NULL,
  cod_variavel INT UNSIGNED NOT NULL,
  cod_pergunta INT UNSIGNED NOT NULL,
  PRIMARY KEY(cod_resposta),
  FOREIGN KEY (cod_variavel) REFERENCES variavel(cod_variavel),
  FOREIGN KEY (cod_pergunta) REFERENCES pergunta(cod_pergunta)
);
