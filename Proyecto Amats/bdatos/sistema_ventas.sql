CREATE DATABASE sistema_ventas
USE sistema_ventas

CREATE TABLE rol_usuario(
id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre_rol VARCHAR(15)
);

CREATE TABLE usuario(
id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre_usuario VARCHAR(20),
password_usuario VARCHAR(20),
fk_id_rol INT NOT NULL,
FOREIGN KEY(fk_id_rol) REFERENCES rol_usuario(id_rol)
);


CREATE TABLE venta(
		id_venta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre_cliente VARCHAR(50),
		fecha_venta DATE,
		fk_id_usuario INT,
		fk_id_producto INT NOT NULL,
		cantidad_venta INT,
		FOREIGN KEY(fk_id_usuario) REFERENCES usuario(id_usuario),
		FOREIGN KEY (fk_id_producto) REFERENCES productos (id_producto)
);

SELECT fecha_venta 







SELECT venta.fecha_venta, COUNT(venta.fecha_venta) AS ventas_hechas, (venta.cantidad_venta * productos.precio_producto) AS monto
FROM venta

INNER JOIN productos ON productos.id_producto = venta.fk_id_producto
GROUP BY venta.fecha_venta








CREATE TABLE categorias(
		id_categoria INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		nombre_categoria VARCHAR(30)
);

CREATE TABLE productos(
		id_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		fk_id_categoria INT NOT NULL,
		nombre_producto VARCHAR(30),
		cantidad_producto INT,
		descripcion VARCHAR(100),
		precio_producto DECIMAL(10,2),
		FOREIGN KEY(fk_id_categoria) REFERENCES categorias(id_categoria)
);



/*		Ingreso de Rol de usuario		*/

INSERT INTO rol_usuario (nombre_rol) VALUES ('administrador');
INSERT INTO rol_usuario (nombre_rol) VALUES ('empleado');
INSERT INTO usuario (nombre_usuario, password_usuario,fk_id_rol) VALUES ('admin','admin',1);

UPDATE usuario SET nombre_usuario = 'jona',
			password_usuario = 'jona' ,
			fk_id_rol = 2 
		WHERE id_usuario = 1
		
DELETE FROM usuario 
	WHERE id_usuario=6		

SELECT * FROM rol_usuario 
SELECT * FROM usuario 

/*		Ingreso de categorias		*/
INSERT INTO categorias (nombre_categoria) VALUES ('Zapatos');
INSERT INTO categorias (nombre_categoria) VALUES ('Joyeria');
INSERT INTO categorias (nombre_categoria) VALUES ('soda');

SELECT * FROM categorias;

/*		ingreso de productos		*/

SELECT * FROM productos
INSERT INTO productos (fk_id_categoria,nombre_producto,descripcion,cantidad_producto,precio_producto)
		VALUE(1,'Nike sb','Talla 9','20','80.99');
INSERT INTO productos (fk_id_categoria,nombre_producto,descripcion,cantidad_producto,precio_producto)
		VALUE(2,'Cadena','Oro 14 quilates','10','90.99');
		
SELECT fk_id_categoria FROM productos

DELETE FROM productos 
                    WHERE id_producto = 3
                    
DELETE FROM usuario 
                    WHERE id_usuario = 12
                    


/*	Pruebas		*/}








SELECT * FROM venta








INSERT INTO detalle_venta (fk_id_producto,cantidad) VALUES(1,10);

INSERT INTO venta (fk_id_usuario,fk_id) VALUES(1,10);


/*	CONSULTA PARA LA TABLA VENTAS 	*/
/*
SELECT detalle_venta.id_detalle, productos.nombre_producto ,detalle_venta.cantidad
FROM detalle_venta
INNER JOIN productos ON productos.id_producto = detalle_venta.fk_id_producto
*/

SELECT venta.id_venta, venta.nombre_cliente, venta.fecha_venta, productos.nombre_producto, venta.cantidad_venta, 
	productos.precio_producto
FROM venta
INNER JOIN productos ON productos.id_producto = venta.fk_id_producto