CREATE TABLE paises (
	id int(11) NOT NULL AUTO_INCREMENT,
	iso char(2) DEFAULT NULL,
	nombre varchar(80) DEFAULT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 

CREATE TABLE provincias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    pais_id INT NOT NULL,
    FOREIGN KEY (pais_id) REFERENCES paises(id)
);

CREATE TABLE localidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    provincia_id INT NOT NULL,
    FOREIGN KEY (provincia_id) REFERENCES provincias(id)
);


CREATE TABLE roles (
    codigo VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);


CREATE TABLE tipos_actividad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE usuarios (
    usuario VARCHAR(50) PRIMARY KEY,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(150),
    fecha_nacimiento DATE NOT NULL,
    tipo_actividad_id INT, -- actividad preferida
    localidad_id INT,
    provincia_id INT,
    pais_id INT,
    rol_codigo VARCHAR(20) NOT NULL DEFAULT 'usuario',
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_baja DATETIME DEFAULT NULL,
    codigo_validacion VARCHAR(100) DEFAULT NULL,

    FOREIGN KEY (tipo_actividad_id) REFERENCES tipos_actividad(id),
    FOREIGN KEY (localidad_id) REFERENCES localidades(id),
    FOREIGN KEY (provincia_id) REFERENCES provincias(id),
    FOREIGN KEY (pais_id) REFERENCES paises(id),
    FOREIGN KEY (rol_codigo) REFERENCES roles(codigo)
);

CREATE TABLE amigos (
    seguidor VARCHAR(50),
    seguido VARCHAR(50),
    PRIMARY KEY (seguidor, seguido),
    FOREIGN KEY (seguidor) REFERENCES usuarios(usuario) ON DELETE CASCADE,
    FOREIGN KEY (seguido) REFERENCES usuarios(usuario) ON DELETE CASCADE
);

CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    ruta VARCHAR(255) NOT NULL,
    tamano INT,
    alto INT,
    ancho INT,
    es_perfil BOOLEAN DEFAULT FALSE,

    FOREIGN KEY (usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
);

CREATE TABLE rutas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    archivo_gpx VARCHAR(255) NOT NULL
);

CREATE TABLE actividades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    tipo_actividad_id INT NOT NULL,
    ruta_id INT NOT NULL,
    fecha_publicacion DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE,
    FOREIGN KEY (tipo_actividad_id) REFERENCES tipos_actividad(id),
    FOREIGN KEY (ruta_id) REFERENCES rutas(id)
);

CREATE TABLE actividad_companeros (
    actividad_id INT,
    companero VARCHAR(50),
    PRIMARY KEY (actividad_id, companero),
    FOREIGN KEY (actividad_id) REFERENCES actividades(id) ON DELETE CASCADE,
    FOREIGN KEY (companero) REFERENCES usuarios(usuario) ON DELETE CASCADE
);

CREATE TABLE actividad_imagenes (
    actividad_id INT,
    imagen_id INT,
    PRIMARY KEY (actividad_id, imagen_id),
    FOREIGN KEY (actividad_id) REFERENCES actividades(id) ON DELETE CASCADE,
    FOREIGN KEY (imagen_id) REFERENCES imagenes(id) ON DELETE CASCADE
);

CREATE TABLE aplausos (
    actividad_id INT,
    usuario VARCHAR(50),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (actividad_id, usuario),
    FOREIGN KEY (actividad_id) REFERENCES actividades(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario) ON DELETE CASCADE
);