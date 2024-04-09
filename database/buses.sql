CREATE TABLE Buses (
  id INT NOT NULL AUTO_INCREMENT,
  placa VARCHAR(10) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  capacidad INT NOT NULL,
  color VARCHAR(20) NOT NULL,
  tipo_combustible VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE Rutas (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  origen VARCHAR(50) NOT NULL,
  destino VARCHAR(50) NOT NULL,
  distancia INT NOT NULL,
  tipo_servicio VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Pasajero (
  id INT NOT NULL AUTO_INCREMENT,
  identificacion VARCHAR(20) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  apellidos VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE Asignacion (
  id INT NOT NULL AUTO_INCREMENT,
  bus_id INT NOT NULL,
  ruta_id INT NOT NULL,
  pasajero_id INT NOT NULL,
  hora_salida DATETIME NOT NULL,
  hora_llegada DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (bus_id) REFERENCES Buses(id),
  FOREIGN KEY (ruta_id) REFERENCES Rutas(id),
  FOREIGN KEY (pasajero_id) REFERENCES Pasajero(id)
);
