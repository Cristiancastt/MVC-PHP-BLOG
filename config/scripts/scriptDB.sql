CREATE DATABASE roleplay;
USE roleplay;

CREATE TABLE pokemon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    avatar VARCHAR(255),
    attackpower INT,
    lifelevel INT
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

--Algunos datos para que se vean:
-- Insertar Usuario
INSERT INTO users (email, name, password)
VALUES ('a@a.com', 'a', 'a');



-- Insertar Pikachu
INSERT INTO pokemon (id, nombre, descripcion, avatar, attackpower, lifelevel)
VALUES (1, 'Pikachu', 'Picachu ejemplo desc', 'https://assets.stickpng.com/images/580b57fcd9996e24bc43c325.png', 100, 100);

-- Insertar Charizard
INSERT INTO pokemon (id, nombre, descripcion, avatar, attackpower, lifelevel)
VALUES (2, 'Charizard', 'La figura de Charizard es la de un dragón erguido sobre sus dos patas traseras, que sostienen su peso. Posee unas poderosas alas y un abrasador aliento de fuego. También posee un predominante cuello y una poderosa cola terminada en una llama que arde con más fuerza si ha vivido duras batallas.', 'https://www.miamieventdecor.com/wp-content/uploads/2022/11/Charizard_Pokemon_27-6x27-1.jpg', 100, 100);

-- Insertar Bulbasaur
INSERT INTO pokemon (id, nombre, descripcion, avatar, attackpower, lifelevel)
VALUES (3, 'Bulbasur', 'Bulbasaur es un Pokémon cuadrúpedo de color verde con manchas más oscuras que forman patrones geométricos en su piel...', 'https://media.printables.com/media/prints/30233/images/300606_05d12d0c-053b-47c7-a29d-57ec89e338e8/thumbs/inside/1280x960/png/bulbasaur_original.webp', 100, 100);

-- Insertar Eevee
INSERT INTO pokemon (id, nombre, descripcion, avatar, attackpower, lifelevel)
VALUES (4, 'Eevee', 'Eevee', 'https://img.asmedia.epimg.net/resizer/PmdQhTJiiyr-R6rOQn_c94aHgRw=/1472x828/cloudfront-eu-central-1.images.arcpublishing.com/diarioas/UIYB2VAKNJJEZCU5J32E6THYXE.jpg', 100, 100);
