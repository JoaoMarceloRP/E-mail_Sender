create database crud;
use crud;
create table usuario(
    id int unsigned auto_increment,
    email varchar(70) not null,
    senha varchar(70) not null,
    primary key(id)
);

CREATE TABLE emails (
  id INT AUTO_INCREMENT PRIMARY KEY,
  remetente VARCHAR(255) NOT NULL,
  destinatario VARCHAR(255) NOT NULL,
  assunto VARCHAR(255) NOT NULL,
  mensagem TEXT,
  data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  tem_anexo BOOLEAN DEFAULT 0
);