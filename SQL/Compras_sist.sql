CREATE DATABASE CinemaBD;
USE CinemaBD;

CREATE TABLE cliente(
	cli_id SERIAL PRIMARY KEY,
	cli_email VARCHAR(100),
   	cli_senha VARCHAR(20),
	cli_nome VARCHAR(50),
	cli_cpf VARCHAR(14),
	cli_data_nasc DATE
);

INSERT INTO cliente(cli_email, cli_senha, cli_nome, cli_cpf, cli_data_nasc) VALUES
("victor@teste", "victor", "Victor Barbosa Rocha", "027.010.722-39", '1996-05-03'),
("ewelly@teste", "ewelly", "Ewelly Fabiane", "027.010.723-39", '1996-05-04'),
("chico@teste", "chico", "Francisco Nascimento", "027.010.724-39", '1996-06-04');

SELECT * FROM caixa;

CREATE TABLE caixa(
    cx_id INT PRIMARY KEY
);

INSERT INTO caixa VALUES
(1),(2),(3),(4);

CREATE TABLE compra(
	cmp_id BIGINT UNSIGNED NOT NULL,
 	cmp_valor FLOAT,
	cmp_datetime DATETIME, 
	cli_id BIGINT UNSIGNED NOT NULL REFERENCES cliente(cli_id), 
	cx_id INT UNSIGNED NOT NULL REFERENCES caixa(cx_id),
    	
	PRIMARY KEY (cmp_id)
);


CREATE TABLE ingresso(
	ing_id SERIAL PRIMARY KEY,
	cmp_id BIGINT UNSIGNED NOT NULL REFERENCES compra(cmp_id), 
    ses_id BIGINT REFERENCES sessao(ses_id),
    assento VARCHAR(3) REFERENCES poltronas(assento)
);

DROP TABLE ingresso;

CREATE TABLE sessao(
	ses_id SERIAL PRIMARY KEY,
	ses_data DATE,
	ses_idioma VARCHAR(15),
	ses_formato VARCHAR(2),
	horario TIME REFERENCES horarios(horario),
	fil_id BIGINT UNSIGNED NOT NULL REFERENCES filme(fil_id),
	sal_id INT REFERENCES salas(sal_id)
);

INSERT INTO sessao (ses_data,ses_idioma,ses_formato,horario,fil_id,sal_id)
VALUES
('2018-12-02', "DUBLADO", "3D", '14:00:00', 1, 2),
('2018-12-02', "LEGENDADO", "2D", '16:00:00', 2, 2),
('2018-12-02', "DUBLADO", "3D", '14:00:00', 3, 1);

SELECT * FROM sessao;

CREATE TABLE poltronas(
	assento VARCHAR(3) PRIMARY KEY,
	ocupada BOOLEAN
);

INSERT INTO poltronas VALUES
("A1", FALSE),
("A2", FALSE),
("A3", FALSE),
("A4", FALSE),
("A5", FALSE),
("A6", FALSE),
("A7", FALSE),
("A8", FALSE),
("A9", FALSE),
("A10", FALSE),

("B1", FALSE),
("B2", FALSE),
("B3", FALSE),
("B4", FALSE),
("B5", FALSE),
("B6", FALSE),
("B7", FALSE),
("B8", FALSE),
("B9", FALSE),
("B10", FALSE),

("C1", FALSE),
("C2", FALSE),
("C3", FALSE),
("C4", FALSE),
("C5", FALSE),
("C6", FALSE),
("C7", FALSE),
("C8", FALSE),
("C9", FALSE),
("C10", FALSE),

("D1", FALSE),
("D2", FALSE),
("D3", FALSE),
("D4", FALSE),
("D5", FALSE),
("D6", FALSE),
("D7", FALSE),
("D8", FALSE),
("D9", FALSE),
("D10", FALSE),

("E1", FALSE),
("E2", FALSE),
("E3", FALSE),
("E4", FALSE),
("E5", FALSE),
("E6", FALSE),
("E7", FALSE),
("E8", FALSE),
("E9", FALSE),
("E10", FALSE),

("F1", FALSE),
("F2", FALSE),
("F3", FALSE),
("F4", FALSE),
("F5", FALSE),
("F6", FALSE),
("F7", FALSE),
("F8", FALSE),
("F9", FALSE),
("F10", FALSE),

("G1", FALSE),
("G2", FALSE),
("G3", FALSE),
("G4", FALSE),
("G5", FALSE),
("G6", FALSE),
("G7", FALSE),
("G8", FALSE),
("G9", FALSE),
("G10", FALSE),

("H1", FALSE),
("H2", FALSE),
("H3", FALSE),
("H4", FALSE),
("H5", FALSE),
("H6", FALSE),
("H7", FALSE),
("H8", FALSE),
("H9", FALSE),
("H10", FALSE);

SELECT * FROM poltronas;

CREATE TABLE salas(
	sal_id INT PRIMARY KEY
);

INSERT INTO salas VALUES
(1),
(2),
(3),
(4);

CREATE TABLE horarios(
	horario TIME
);

INSERT INTO horarios VALUES
('14:00:00'),
('16:00:00'),
('18:00:00'),
('20:00:00');

SELECT * FROM horarios;


CREATE TABLE disponibilidade(
	SELECT salas.sal_id, horarios.horario, poltronas.assento, poltronas.ocupada FROM salas CROSS JOIN poltronas CROSS JOIN horarios
);

SELECT * FROM disponibilidade;

CREATE TABLE filme(
	fil_id SERIAL PRIMARY KEY,
	fil_nome VARCHAR(70),
	fil_duração TIME,
	fil_data_in DATE, 
   	fil_data_out DATE, 
	fil_gênero VARCHAR(10),
	fil_nacionalidade VARCHAR(10),
	fil_image VARCHAR(1024)
);

INSERT INTO filme (fil_nome,fil_duração,fil_data_in, fil_data_out, fil_gênero,fil_nacionalidade,fil_image)
VALUES
("Jurassic Park", '02:07:00', '2018-12-01', '2018-12-30', "Aventura", "Americano", "https://images-na.ssl-images-amazon.com/images/I/51dZZ4pl-kL.jpg"),
("Caçadores da Arca perdida", '01:55:00', '2018-11-01', '2018-12-15', "Aventura", "Americano","https://images-na.ssl-images-amazon.com/images/I/61a9P8QtEVL.jpg"),
("Toy Story", '01:30:00', '2018-11-15', '2018-12-15', "Animação", "Americano","https://www.movieposter.com/posters/archive/main/204/MPW-102287");

SELECT * FROM filme;