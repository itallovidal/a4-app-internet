CREATE TABLE icecream (
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    price FLOAT,
    imageSrc varchar(255)
);

create table news (
	id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    imageSrc varchar(255)
);

INSERT INTO icecream (name, description, price, imageSrc) VALUES 
("Sorvete de Chocolate", "Delicioso sorvete de chocolate cremoso", 9.90, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Morango", "Sorvete refrescante com pedaços de morango", 8.50, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Baunilha", "Clássico sorvete de baunilha artesanal", 7.90, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Flocos", "Sorvete de creme com flocos crocantes de chocolate", 9.20, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Limão", "Sorvete cítrico e refrescante de limão", 8.00, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Coco", "Sorvete tropical feito com leite de coco natural", 8.70, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Pistache", "Saboroso sorvete com pedaços de pistache", 10.50, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Uva", "Sorvete suave com sabor marcante de uva", 8.30, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Café", "Sorvete gourmet com toque de café espresso", 9.60, "assets/icecreams/ice_cream_01.jpg"),
("Sorvete de Caramelo", "Sorvete doce com calda de caramelo salgado", 9.40, "assets/icecreams/ice_cream_01.jpg");

INSERT INTO news (name, description, imageSrc) VALUES
('Nova Filial Inaugurada', 'Estamos expandindo! Uma nova filial da nossa sorveteria foi inaugurada no centro da cidade.', 'assets/icecreams/ice_cream_01.jpg'),
('Nova Fórmula do Sorvete', 'Lançamos uma fórmula ainda mais cremosa e saborosa, feita com ingredientes naturais.', 'assets/icecreams/ice_cream_01.jpg'),
('Sabores da Temporada', 'Confira os novos sabores especiais lançados para esta estação, como Abacaxi com Hortelã e Brownie Caramelo.', 'assets/icecreams/ice_cream_01.jpg'),
('Festival do Sorvete', 'Participe do nosso Festival do Sorvete com promoções exclusivas e degustações gratuitas.', 'assets/icecreams/ice_cream_01.jpg'),
('Sorvete Vegano Chegou!', 'Pensando em todos os nossos clientes, agora temos opções 100% veganas no nosso cardápio.', 'assets/icecreams/ice_cream_01.jpg');

CREATE TABLE users (
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO users (name, email, password) VALUES
("Gabriel", "gabrielnathan929@gmail.com", "yrftead123sdfj"),
("Leonardo", "leonardo@gmail.com", "jdsfgastyfsf23"),
("Itallo", "itallo@gmail.com", "dsfcasd1231h1get");