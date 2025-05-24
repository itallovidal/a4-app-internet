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
("Sorvete de Chocolate", "Delicioso sorvete de chocolate cremoso", 9.90, "https://media.istockphoto.com/id/484563516/pt/foto/cone-de-gelado-com-gelado-de-chocolate-isolado-a-branco.jpg?s=612x612&w=0&k=20&c=5BtbBHyrukuto4w0uEYhHV8vVxrCrPW6MPkhWRNOufk="),
("Sorvete de Morango", "Sorvete refrescante com pedaços de morango", 8.50, "https://vegcomcarinho.com.br/wp-content/uploads/2023/06/sem-titulo-3.jpeg"),
("Sorvete de Baunilha", "Clássico sorvete de baunilha artesanal", 7.90, "https://www.mrmixbrasil.com.br/arquivos-upload/produtos/casquinha-05022021111654478516.png"),
("Sorvete de Flocos", "Sorvete de creme com flocos crocantes de chocolate", 9.20, "https://cdn-cosmos.bluesoft.com.br/products/7891075004108"),
("Sorvete de Abacaxi", "Sorvete refrescante de abacaxi", 8.00, "https://img.freepik.com/fotos-gratis/arranjo-de-deliciosa-sobremesa-caseira_23-2148900951.jpg"),
("Sorvete de Coco", "Sorvete tropical feito com leite de coco natural", 8.70, "https://img.freepik.com/free-photo/delicious-coconut-ice-cream-pop-stickles_23-2149460219.jpg"),
("Sorvete de Uva", "Sorvete suave com sabor marcante de uva", 8.30, "https://img.freepik.com/free-photo/minimalist-blueberry-ice-cream-stick-surrounded-by-berries_23-2148430727.jpg"),
("Sorvete de Café", "Sorvete gourmet com toque de café espresso", 9.60, "https://img.freepik.com/free-photo/cup-with-ice-cream-cone_23-2148421999.jpg"),
("Sorvete de Caramelo", "Sorvete doce com calda de caramelo salgado", 9.40, "https://vegcomcarinho.com.br/wp-content/uploads/2023/11/caramelo-salgado-5-scaled.jpg");

INSERT INTO news (name, description, imageSrc) VALUES
('Nova Fórmula do Sorvete', 'Lançamos uma fórmula ainda mais cremosa e saborosa, feita com ingredientes naturais.', 'https://receitadaboa.com.br/wp-content/uploads/2024/04/iStock-520982830.jpg'),
('Sabores da Temporada', 'Confira os novos sabores especiais lançados para esta estação, como Baunilia e Chocolate.', 'https://http2.mlstatic.com/D_NQ_NP_652904-MLB53888321621_022023-O-kit-2-caldas-sorvete-expresso-daus-baunilha-e-chocolate-5l.webp'),
('Festival do Sorvete', 'Participe do nosso Festival do Sorvete com promoções exclusivas e degustações gratuitas.', 'https://img.freepik.com/free-photo/golden-percentage-sign-symbol-yellow-discount-sale-promotion-concept-by-3d-render_616485-12.jpg'),
('Sorvete Vegano Chegou!', 'Pensando em todos os nossos clientes, agora temos opções 100% veganas no nosso cardápio.', 'https://img.freepik.com/free-photo/delicious-green-ice-cream-still-life_23-2150096638.jpg'),
('Nova Filial Inaugurada', 'Estamos expandindo! Uma nova filial da nossa sorveteria foi inaugurada no centro da cidade.', 'https://img.freepik.com/free-vector/ice-cream-cafe-with-big-ice-cream-logo-isolated_1308-49457.jpg');

CREATE TABLE users (
    id int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO users (name, email, password) VALUES
("Gabriel", "gabrielnathan929@gmail.com", "abcdefgh"),
("Leonardo", "leonardo@gmail.com", "87654321"),
("Itallo", "itallo@gmail.com", "1a2b3c4d"),
("Eduardo Pareto", "pareto@uva.br", "12345678");