create database crud;
use crud;
create table usuario(
    id int unsigned auto_increment,
    email varchar(70) not null,
    senha varchar(70) not null,
    primary key(id)
);

create table emails (
  id int auto_increment primary key,
  sender varchar(255) not null,
  recipient varchar(255) not null,
  subject varchar(255) not null,
  message text,
  sent_at timestamp default current_timestamp,
  num_emails int default 1
);