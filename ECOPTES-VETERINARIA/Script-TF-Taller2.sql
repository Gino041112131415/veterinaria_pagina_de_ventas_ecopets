-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-06-2024 a las 18:49:34
-- Versión del servidor: 5.7.37
-- Versión de PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e-commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_de_compras`
--

CREATE TABLE `carrito_de_compras` (
  `ID_CARRITO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Producto` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_USUARIO` int(11) NOT NULL,
  `RUC` char(11) DEFAULT NULL,
  `RAZON_SOCIAL` varchar(255) DEFAULT NULL,
  `DNI` char(7) DEFAULT NULL,
  `NOMBRE` varchar(200) NOT NULL,
  `TELEFONO` varchar(200) NOT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `CPASSWORD` varchar(100) NOT NULL,
  `IMG_PERFIL` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_USUARIO`, `RUC`, `RAZON_SOCIAL`, `DNI`, `NOMBRE`, `TELEFONO`, `DIRECCION`, `EMAIL`, `CPASSWORD`, `IMG_PERFIL`) VALUES
(1, '12345678901', 'Empresa Admin1', '12345678', 'Admin1', '987654321', 'Dirección Admin1', 'greategui21@gmail.com', '12345', 'https://example.com/image_pethealth.jpg'),
(2, '12345678902', 'Empresa Admin2', '87654321', 'Admin2', '987654322', 'Dirección Admin2', 'vetcaresolutions@gmail.com', 'adminpassword2', 'https://example.com/image_vetcare.jpg'),
(3, '12345678903', 'Empresa Admin3', '56789012', 'Admin3', '987654323', 'Dirección Admin3', 'animaljoyproducts@gmail.com', 'adminpassword3', 'https://example.com/image_animaljoy.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `URL_IMAGEN` text,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `PRECIO` decimal(8,2) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO productos (ID_PRODUCTO, STOCK, URL_IMAGEN, NOMBRE, PRECIO, Descripcion) VALUES
(1, 100, 'comida de gato en crecimiento (1).png', 'Juguete Masticable para Perros', 9.99, 'Un juguete perfecto para mantener a tu perro entretenido y saludable.'),
(2, 150, 'collar ajustable para perro (1).png', 'Hueso de Juguete Azul para Perros', 12.50, 'Hueso de juguete duradero y seguro para masticar.'),
(3, 200, 'Bolsa de Comida para Gatos.png', 'Cuerda de Juguete para Perros', 7.99, 'Cuerda resistente para juegos de tira y afloja.'),
(4, 80, 'caja de arena ago.png', 'Pelota de Juguete para Perros', 8.75, 'Pelota interactiva para horas de diversión.'),
(5, 120, 'frisbee perros.png', 'Comida Premium para Gatos', 25.00, 'Comida balanceada y nutritiva para gatos adultos.'),
(6, 140, 'shampoo perro.png', 'Comida Seca para Gatos', 20.00, 'Alimento seco y crujiente para gatos.'),
(7, 110, 'correa perros.png', 'Comida enlatada para Gatos', 15.00, 'Comida húmeda y deliciosa en lata.'),
(8, 130, 'pelota para perro.png', 'Croquetas para Gatos', 18.50, 'Croquetas sabrosas para gatos de todas las edades.'),
(9, 100, 'comida sin granos.png', 'Cama para Perros', 45.00, 'Cama suave y cómoda para perros.'),
(10, 75, 'juguete divertido para gatos.png', 'Rascador para Gatos', 30.00, 'Rascador alto para gatos.'),
(11, 90, 'juguete chirriante.png', 'Plato para Perros', 12.00, 'Plato de acero inoxidable para perros.'),
(12, 85, 'comida para gatito.png', 'Cepillo para Mascotas', 10.00, 'Cepillo suave para el pelaje de tu mascota.'),
(13, 95, 'juguete colorido.png', 'Juguete Colorido para Perros', 7.50, 'Juguete resistente y colorido para perros.'),
(14, 150, 'cepillo mascota.png', 'Comida para Gatitos', 22.00, 'Comida especialmente formulada para gatitos.'),
(15, 100, 'platoperro.png', 'Juguete Chirriante para Perros', 9.00, 'Juguete que hace ruido al masticar.'),
(16, 80, 'rascador-para-gato.png', 'Juguete para Gatos', 5.00, 'Juguete divertido para gatos.'),
(17, 110, 'camaperro.png', 'Comida sin Granos para Gatos', 28.00, 'Comida saludable y sin granos para gatos.'),
(18, 130, 'croquetas gatos.png', 'Pelota para Perros', 8.00, 'Pelota resistente y duradera para perros.'),
(19, 90, 'comidaenlatada.png', 'Correa para Perros', 15.00, 'Correa ajustable y resistente para perros.'),
(20, 70, 'Bravery-Chicken-Cat-Adult-Gatos-adultos (1).png', 'Shampoo para Perros', 12.50, 'Shampoo suave y sin lágrimas para perros.'),
(21, 100, 'juguete-para-perros-pequenos-pelota-con-pinchos-amarillo.png', 'Frisbee para Perros', 10.00, 'Frisbee resistente y seguro para perros.'),
(22, 120, 'juguete-para-perros-pequenos-pelota-con-pinchos-azul.png', 'Caja de Arena para Gatos', 35.00, 'Caja de arena con tapa para gatos.'),
(23, 80, 'JUGUETE-DE-SOGA-CON-HUESO-DE-PLASTICO-1.png', 'Bolsa de Comida para Gatos', 25.00, 'Bolsa grande de comida para gatos.'),
(24, 110, 'huesos juguete azul (1).png', 'Collar para Perros', 15.00, 'Collar ajustable para perros.'),
(25, 140, 'juguete masticable.png', 'Comida para Gatos en Crecimiento', 27.00, 'Comida nutritiva para gatos en crecimiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_ROL` int(11) NOT NULL,
  `NOMBRE_ROL` varchar(50) NOT NULL,
  `DESCRIPCION_ROL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_ROL`, `NOMBRE_ROL`, `DESCRIPCION_ROL`) VALUES
(1, 'Cliente', 'Rol para clientes'),
(2, 'Administrador', 'Rol para administradores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(200) NOT NULL,
  `EMAIL_USUARIO` varchar(255) NOT NULL,
  `CPASSWORD` varchar(100) NOT NULL,
  `ID_ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE_USUARIO`, `EMAIL_USUARIO`, `CPASSWORD`, `ID_ROL`) VALUES
(1,'Admin1', 'greategui21@gmail.com', '12345', 2),
(2,'Admin2', 'vetcaresolutions@gmail.com', 'adminpassword2', 2),
(3,'Admin3', 'animaljoyproducts@gmail.com', 'adminpassword3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `RUC` char(11) DEFAULT NULL,
  `FECHA_VENTA` varchar(200) NOT NULL,
  `CANTIDAD` double NOT NULL,
  `TOTAL` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO ventas (id_venta, ID_USUARIO, ID_PRODUCTO, RUC, FECHA_VENTA, CANTIDAD, TOTAL) VALUES
(1, 1, 1, '20123456789', '2024-06-24', 3, 29.97),
(2, 2, 2, '20123456789', '2024-06-25', 2, 25.00),
(3, 3, 3, '20987654321', '2024-06-26', 5, 39.95),
(4, 4, 4, '20987654321', '2024-06-24', 4, 35.00),
(5, 5, 5, '20765432109', '2024-06-25', 6, 150.00),
(6, 6, 6, '20765432109', '2024-06-26', 3, 60.00),
(7, 7, 7, '20123456789', '2024-06-24', 7, 105.00),
(8, 8, 8, '20123456789', '2024-06-25', 4, 74.00),
(9, 9, 9, '20987654321', '2024-06-26', 2, 90.00),
(10, 10, 10, '20765432109', '2024-06-24', 1, 30.00),
(11, 11, 11, '20123456789', '2024-06-25', 2, 24.00),
(12, 12, 12, '20123456789', '2024-06-26', 3, 30.00),
(13, 13, 13, '20987654321', '2024-06-24', 4, 30.00),
(14, 14, 14, '20987654321', '2024-06-25', 5, 110.00),
(15, 15, 15, '20765432109', '2024-06-26', 2, 18.00),
(16, 16, 16, '20765432109', '2024-06-24', 7, 35.00),
(17, 17, 17, '20123456789', '2024-06-25', 6, 168.00),
(18, 18, 18, '20123456789', '2024-06-26', 3, 24.00),
(19, 19, 19, '20987654321', '2024-06-24', 4, 60.00),
(20, 20, 20, '20765432109', '2024-06-25', 2, 25.00),
(21, 21, 21, '20123456789', '2024-06-26', 3, 30.00),
(22, 22, 22, '20123456789', '2024-06-24', 1, 35.00),
(23, 23, 23, '20987654321', '2024-06-25', 5, 125.00),
(24, 24, 24, '20987654321', '2024-06-26', 2, 30.00),
(25, 25, 25, '20765432109', '2024-06-24', 6, 162.00),
(26, 26, 26, '20765432109', '2024-06-25', 4, 48.00),
(27, 27, 27, '20123456789', '2024-06-26', 5, 125.00),
(28, 28, 28, '20123456789', '2024-06-24', 3, 45.00),
(29, 29, 29, '20987654321', '2024-06-25', 6, 90.00),
(30, 30, 30, '20765432109', '2024-06-26', 7, 189.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_de_compras`
--
ALTER TABLE `carrito_de_compras`
  ADD PRIMARY KEY (`ID_CARRITO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRODUCTO`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_de_compras`
--
ALTER TABLE `carrito_de_compras`
  MODIFY `ID_CARRITO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_ROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_de_compras`
--
ALTER TABLE `carrito_de_compras`
  ADD CONSTRAINT `carrito_de_compras_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `carrito_de_compras_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID_USUARIO`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles` (`ID_ROL`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `clientes` (`ID_USUARIO`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
