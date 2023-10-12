-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2023 a las 23:22:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finca - mi paraiso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del Id de la compra.',
  `Imagen` varchar(255) DEFAULT NULL COMMENT 'Guarda registro de la imagen de referencia de la compra.',
  `tipo_ganado` varchar(50) DEFAULT NULL COMMENT 'Guarda registro del tipo de ganado comprado.',
  `peso_ganado` decimal(10,2) DEFAULT NULL COMMENT 'Guarda registro del peso promedio del ganado comprado.',
  `nombre_vendedor` varchar(100) DEFAULT NULL COMMENT 'Guarda registro del nombre del vendedor.',
  `telefono_vendedor` varchar(20) DEFAULT NULL COMMENT 'Guarda registro del telefono del vendedor.',
  `direccion_vendedor` varchar(255) DEFAULT NULL COMMENT 'Guarda registro de la dirección del vendedor.',
  `precio_total` decimal(12,2) DEFAULT NULL COMMENT 'Guarda registro del precio total de la compra.',
  `ganado_traido` tinyint(1) DEFAULT NULL COMMENT 'Guarda registro de la cantidad de ganado comprado.',
  `fecha_venta` date DEFAULT NULL COMMENT 'Guarda registro de la fecha de la compra.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `Imagen`, `tipo_ganado`, `peso_ganado`, `nombre_vendedor`, `telefono_vendedor`, `direccion_vendedor`, `precio_total`, `ganado_traido`, `fecha_venta`) VALUES
(1, 'gallery-2.jpg', 'vaquillona', 520.00, 'Elizabeth Ocampo', '322 980 5358', 'Finca - El Olimpo', 2580000.00, 3, '2023-08-19'),
(2, 'ternero.jpg', 'ternero', 50.00, 'Elizabeth Ocampo', '322 980 5358', 'Finca - El Olimpo', 175000.00, 1, '2023-08-19'),
(3, 'service-1.jpg', 'vaca', 300.00, 'Isabel Montoya', '322 657 8007', 'Finca - Maria Lucía', 1350000.00, 3, '2023-08-19'),
(4, 'toro.jpg', 'toro', 400.00, 'Eduardo Orrego', '321 567 9882', 'Carrera 5 No. 17 - 29', 1200000.00, 2, '2023-08-19'),
(5, 'banner-2.jpg', 'novillo', 250.00, 'Mario Cardona', '311 267 5557', 'Dirección C', 2325000.00, 5, '2023-08-19'),
(6, 'gallery-2.jpg', 'vaquillona', 220.00, 'Alejandro Grajales', '310 690 4924', 'Dirección D', 1640000.00, 4, '2023-08-19'),
(7, 'banner-2.jpg', 'novillo', 300.00, 'Carlos Valencia', '320 208 5128', 'Finca - El Olvido', 540000.00, 1, '2023-08-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crianza_reproduccion`
--

CREATE TABLE `crianza_reproduccion` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del id de la crianza.',
  `id_animal_madre` int(11) NOT NULL COMMENT 'Guarda registro del registro del ID de la madre.',
  `id_animal_padre` int(11) DEFAULT NULL COMMENT 'Guarda registro del ID del padre.',
  `fecha_nacimiento` date NOT NULL COMMENT 'Guarda registro de la fecha de nacimiento del animal.',
  `Sexo` varchar(30) NOT NULL COMMENT 'Guarda registro del sexo del animal.',
  `detalles` varchar(255) DEFAULT NULL COMMENT 'Guarda registro de más detalles acerca del nacimiento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `crianza_reproduccion`
--

INSERT INTO `crianza_reproduccion` (`id`, `id_animal_madre`, `id_animal_padre`, `fecha_nacimiento`, `Sexo`, `detalles`) VALUES
(1, 1, 2, '2023-03-05', 'Macho', 'Parto normal, cría saludable'),
(2, 4, 8, '2023-08-20', 'Hembra', 'Parto normal, gemelas, cría baja de peso'),
(3, 4, 8, '2023-08-20', 'Hembra', 'Parto normal, gemelas, cría baja de peso'),
(4, 16, 17, '2023-08-20', 'Hembra', 'Parto normal - cría saludable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganado`
--

CREATE TABLE `ganado` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del id del ganado.',
  `tipo` varchar(50) NOT NULL COMMENT 'Guarda registro del tipo de animal.',
  `raza` varchar(50) DEFAULT NULL COMMENT 'Guarda registro de la raza del animal.',
  `sexo` enum('Macho','Hembra') NOT NULL COMMENT 'Guarda registro del sexo del animal.',
  `fecha_nacimiento` date DEFAULT NULL COMMENT 'Guarda registro de la fecha de nacimiento del animal.',
  `estado_salud` varchar(100) DEFAULT NULL COMMENT 'Guarda registro del estado de salud del animal.',
  `historial_medico` text DEFAULT NULL COMMENT 'Guarda registro del historial medico del animal.',
  `otros_detalles` text DEFAULT NULL COMMENT 'Guarda registro de otros detalles acerca del animal.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ganado`
--

INSERT INTO `ganado` (`id`, `tipo`, `raza`, `sexo`, `fecha_nacimiento`, `estado_salud`, `historial_medico`, `otros_detalles`) VALUES
(1, 'Vaca', 'Angus', 'Hembra', '2015-03-15', 'Saludable', 'Ningún problema médico conocido', 'N/A'),
(2, 'Toro', 'Hereford', 'Macho', '2014-07-25', 'Buen estado', 'Vacunación anual al día', 'Marcado en la oreja izquierda'),
(3, 'Novillo', 'Limousin', 'Macho', '2018-01-10', 'Recuperándose de una lesión en la pata', 'Tratado con antibióticos', 'Usa collar para identificación'),
(4, 'Vaca', 'Holstein', 'Hembra', '2016-11-08', 'Embarazada', 'Control prenatal regular', 'Marcas en el lomo'),
(5, 'Ternero', 'Charolais', 'Macho', '2022-05-03', 'Saludable', 'Sin historial médico', 'N/A'),
(6, 'Novillito', 'Simmental', 'Macho', '2019-09-20', 'En crecimiento', 'Vacunación al día', 'Tiene una mancha en el hocico'),
(7, 'Vaca', 'Angus', 'Hembra', '2017-06-12', 'Saludable', 'Ningún problema médico conocido', 'Sin marcas visibles'),
(8, 'Toro', 'Hereford', 'Macho', '2013-09-28', 'Buen estado', 'Vacunación al día', 'Tiene una marca en la oreja derecha'),
(9, 'Novillo', 'Limousin', 'Macho', '2020-02-15', 'Saludable', 'Sin historial médico', 'Usa collar para identificación'),
(10, 'Vaca', 'Holstein', 'Hembra', '2019-07-18', 'Saludable', 'Control de alimentación estricto', 'Sin marcas visibles'),
(11, 'Vaca', 'Holstein', 'Hembra', '2020-01-15', 'Saludable', 'Vacunación anual', 'Ninguno'),
(12, 'Toro', 'Angus', 'Macho', '2019-03-10', 'Saludable', 'Control de parásitos', 'Peso: 800 kg'),
(13, 'Novillo', 'Hereford', 'Macho', '2022-05-20', 'Enfermo', 'Tratamiento contra fiebre', 'Cicatriz en pata izquierda'),
(14, 'Vaquillona', 'Charolais', 'Hembra', '2021-11-08', 'Saludable', 'Examen de ojos', 'Mancha en el pelaje'),
(15, 'Novillito', 'Simmental', 'Macho', '2023-02-14', 'Saludable', 'Desparasitación', 'Marca en oreja izquierda'),
(16, 'Vaca', 'Limousin', 'Hembra', '2018-07-30', 'Gestante', 'Control prenatal', 'Peso antes del parto: 600 kg'),
(17, 'Toro', 'Hereford', 'Macho', '2020-09-22', 'Saludable', 'Revisiones regulares', 'Ojo izquierdo vendado'),
(18, 'Novillo', 'Angus', 'Macho', '2021-04-17', 'Saludable', 'Vacunación contra brucelosis', 'Peso: 750 kg'),
(19, 'Vaquillona', 'Charolais', 'Hembra', '2019-12-05', 'Enfermo', 'Tratamiento de resfriado', 'Cojera en pata derecha'),
(20, 'Novillito', 'Simmental', 'Macho', '2022-08-25', 'Saludable', 'Control dental', 'Peso: 680 kg'),
(21, 'Toro', 'Limousin', 'Macho', '2017-10-12', 'Saludable', 'Examen de sangre', 'Peso: 900 kg'),
(22, 'Vaquillona', 'Hereford', 'Hembra', '2023-06-28', 'Saludable', 'Control de parásitos', 'Peso: 520 kg'),
(23, 'Novillito', 'Angus', 'Macho', '2020-03-02', 'Saludable', 'Vacunación anual', 'Marca en oreja derecha'),
(24, 'Toro', 'Simmental', 'Macho', '2019-08-18', 'Gestante', 'Control prenatal', 'Peso antes del parto: 750 kg'),
(25, 'Vaca', 'Charolais', 'Hembra', '2021-01-09', 'Saludable', 'Revisiones regulares', 'Peso: 580 kg'),
(26, 'Ternero', 'Angus', 'Macho', '2023-03-01', 'Saludable', 'Desparasitación', 'Sin marcas visibles'),
(27, 'Ternero', 'Charolais', 'Hembra', '2023-02-15', 'Saludable', 'Control veterinario', 'Mancha blanca en la frente'),
(28, 'Ternero', 'Hereford', 'Macho', '2023-04-10', 'Saludable', 'Vacunación contra brucelosis', 'Peso: 50 kg'),
(29, 'Ternero', 'Simmental', 'Hembra', '2023-03-20', 'Saludable', 'Revisiones regulares', 'Cojera en pata izquierda'),
(30, 'Ternero', 'Limousin', 'Macho', '2023-01-05', 'Saludable', 'Control de crecimiento', 'Marca en oreja derecha'),
(31, 'Ternero', 'Angus', 'Hembra', '2023-02-28', 'Saludable', 'Desparasitación', 'Peso: 48 kg'),
(32, 'Ternero', 'Charolais', 'Macho', '2023-03-15', 'Saludable', 'Control veterinario', 'Sin marcas visibles'),
(33, 'Ternero', 'Hereford', 'Hembra', '2023-04-08', 'Saludable', 'Vacunación contra brucelosis', 'Peso: 51 kg'),
(34, 'Ternero', 'Simmental', 'Macho', '2023-02-25', 'Saludable', 'Revisiones regulares', 'Marca en oreja izquierda'),
(35, 'vaquillona', 'Holstein', 'Hembra', '2021-05-11', 'Saludable', 'Ningún problema médico conocido', 'Cicatriz en la pata derecha'),
(36, 'vaca', 'Charolais', '', '2019-12-23', 'Embarazada', 'Control prenatal regular', 'Marcada al costado izquierdo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_mantenimiento`
--

CREATE TABLE `gastos_mantenimiento` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del id del gasto.',
  `tipo_mantenimiento` varchar(50) NOT NULL COMMENT 'Guarda registro del tipo de gasto que se hizo.',
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Guarda registro de la fecha del gasto.',
  `descripcion` varchar(500) NOT NULL COMMENT 'Guarda registro de más información del gasto.',
  `monto` decimal(10,2) NOT NULL COMMENT 'Guarda registro del valor del gasto.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gastos_mantenimiento`
--

INSERT INTO `gastos_mantenimiento` (`id`, `tipo_mantenimiento`, `fecha`, `descripcion`, `monto`) VALUES
(1, 'Suministros', '2023-07-10 05:00:00', 'Compra de alimento para ganado', 2500000.00),
(2, 'Suministros', '2023-06-25 05:00:00', 'Suministros veterinarios', 800000.00),
(3, 'Mantenimiento', '2023-08-02 05:00:00', 'Reparación de cercado', 350000.00),
(4, 'Suministros', '2023-07-15 05:00:00', 'Tratamiento antiparasitario', 150000.00),
(5, 'Mantenimiento', '2023-06-18 05:00:00', 'Mantenimiento del tractor', 500000.00),
(6, 'Mantenimiento', '2023-07-28 05:00:00', 'Reemplazo de bebederos', 120000.00),
(7, 'Equipos', '2023-08-12 05:00:00', 'Alquiler de equipo de poda', 180000.00),
(8, 'Pago', '2023-07-05 05:00:00', 'Pago de mano de obra', 300000.00),
(9, 'Equipos', '2023-06-10 05:00:00', 'Compra de herramientas', 230000.00),
(10, 'Mantenimiento', '2023-08-25 05:00:00', 'Instalación de sistema de riego', 700000.00),
(11, 'Suministros', '2023-07-30 05:00:00', 'Compra de medicamentos', 120000.00),
(12, 'Mantenimiento', '2023-08-08 05:00:00', 'Reparación de establo', 250000.00),
(13, 'Suministros', '2023-06-22 05:00:00', 'Fertilizante para pasto', 180000.00),
(14, 'Suministros', '2023-08-18 05:00:00', 'Compra de suplementos nutricionales', 300000.00),
(15, 'Mantenimiento', '2023-07-12 05:00:00', 'Pintura para cercado', 90000.00),
(16, 'Mantenimiento', '2023-08-05 05:00:00', 'Control de plagas', 150000.00),
(17, 'Mantenimiento', '2023-06-15 05:00:00', 'Manejo de aguas residuales', 210000.00),
(18, 'Equipos', '2023-07-20 05:00:00', 'Compra de material de construcción', 450000.00),
(19, 'Servicios', '2023-08-30 05:00:00', 'Electricidad y servicios', 180000.00),
(20, 'Mantenimiento', '2023-07-08 05:00:00', 'Mantenimiento del sistema de ventilación', 120000.00),
(21, 'Suministros', '2023-08-20 18:22:32', 'Adquirir heno', 100000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_salud_tratamientos`
--

CREATE TABLE `historial_salud_tratamientos` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del id del tratamiento.',
  `id_animal` int(11) NOT NULL COMMENT 'Guarda registro del animal al que se le hace el tratamiento.',
  `fecha` date NOT NULL COMMENT 'Guarda registro de la fecha en que se hace el tratamiento.',
  `tipo_tratamiento` varchar(100) NOT NULL COMMENT 'Guarda registro del tipo de tratamiento realizado.',
  `detalles` text DEFAULT NULL COMMENT 'Guarda registro de más información del tratamiento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_salud_tratamientos`
--

INSERT INTO `historial_salud_tratamientos` (`id`, `id_animal`, `fecha`, `tipo_tratamiento`, `detalles`) VALUES
(1, 2, '2023-07-10', 'Vacunación', 'Vacuna contra fiebre aftosa'),
(2, 5, '2023-06-25', 'Desparasitación', 'Desparasitante interno administrado'),
(3, 3, '2023-08-02', 'Tratamiento médico', 'Antibióticos para una infección'),
(4, 7, '2023-07-15', 'Vacunación', 'Vacuna contra brucelosis'),
(5, 9, '2023-06-18', 'Control de Peso', 'Registro del peso actual'),
(6, 4, '2023-07-28', 'Vacunación', 'Vacuna contra enfermedades respiratorias'),
(7, 1, '2023-08-20', 'Control de Peso', 'Registro del peso actual - Peso estable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recordatorios`
--

CREATE TABLE `recordatorios` (
  `ID` int(11) NOT NULL COMMENT 'Guarda registro del id del recordatorio.',
  `Titulo` varchar(255) NOT NULL COMMENT 'Guarda registro del nombre del recordatorio.',
  `Descripcion` text DEFAULT NULL COMMENT 'Guarda registro de la descripción del recordatorio.',
  `FechaRecordatorio` date NOT NULL COMMENT 'Guarda registro de la fecha del recordatorio.',
  `HoraRecordatorio` time DEFAULT NULL COMMENT 'Guarda registro de la hora del recordatorio.',
  `Estado` varchar(20) DEFAULT 'Pendiente' COMMENT 'Guarda registro del estado del recortadorio (pendiente - realizado).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recordatorios`
--

INSERT INTO `recordatorios` (`ID`, `Titulo`, `Descripcion`, `FechaRecordatorio`, `HoraRecordatorio`, `Estado`) VALUES
(1, 'Exposición Ganadera', 'Feria para mostrar el ganado de la región', '2023-09-09', '10:00:00', 'Pendiente'),
(2, 'Visita veterinario', 'Revisión general de todo el ganado', '2023-08-18', '10:30:00', 'Realizado'),
(3, 'Vacunación del Ganado', 'Vacunación general del ganado', '2023-08-19', '09:00:00', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id_Rol` int(11) NOT NULL COMMENT 'Guarda registro del Id del rol.',
  `Rol` varchar(100) NOT NULL COMMENT 'Guarda registro del nombre del rol.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_Rol`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Guarda registro del Id del usuario.',
  `nombre` varchar(250) NOT NULL COMMENT 'Guarda registro del nombre del usuario.',
  `user` varchar(250) NOT NULL COMMENT 'Guarda registro del usuario.',
  `telefono` varchar(20) NOT NULL COMMENT 'Guarda registro del teléfono del usuario.',
  `password` varchar(250) NOT NULL COMMENT 'Guarda registro de la contraseña del usuario.',
  `foto` varchar(30) NOT NULL COMMENT 'Guarda registro de la foto del usuario.	',
  `rol_id` int(11) NOT NULL COMMENT 'Guarda registro del Id del Rol del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `user`, `telefono`, `password`, `foto`, `rol_id`) VALUES
(29, 'Administrador', 'admin', '3213566642', '$2y$10$wvpXrbLeyLxU1d1gm/zRi.KN/FM/m.r1xTr03az5jGcnyoF2iYGV6', 'admin.jpg', 1),
(30, 'Jorge Garcia', 'jogarcia', '315 890 5552', '$2y$10$896YGBWvq.2jcQ8rQLMOteZIujDBbrpl.jNdsvaMXSKVLzfnxVbCa', 'jogarcia.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL COMMENT '	Guarda registro del Id de la venta.',
  `Imagen` varchar(30) NOT NULL COMMENT 'Guarda registro de la imagen de referencia de la venta.',
  `tipo_ganado` varchar(50) NOT NULL COMMENT 'Guarda registro del tipo de ganado vendido.',
  `peso_ganado` decimal(10,2) NOT NULL COMMENT 'Guarda registro del peso promedio del ganado vendido.',
  `nombre_comprador` varchar(100) NOT NULL COMMENT '	Guarda registro del nombre del comprador.',
  `telefono_comprador` varchar(20) NOT NULL COMMENT '	Guarda registro del telefono del comprador.',
  `direccion_comprador` varchar(255) NOT NULL COMMENT '	Guarda registro de la dirección del comprador.',
  `precio_total` decimal(10,2) NOT NULL COMMENT 'Guarda registro del precio total de la venta.	',
  `ganado_llevado` tinyint(1) NOT NULL COMMENT 'Guarda registro de la cantidad de ganado vendido.	',
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Guarda registro de la fecha de la venta.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `Imagen`, `tipo_ganado`, `peso_ganado`, `nombre_comprador`, `telefono_comprador`, `direccion_comprador`, `precio_total`, `ganado_llevado`, `fecha_venta`) VALUES
(1, 'service-1.jpg', 'vaca', 600.00, 'Eduardo Orrego', '321 567 9882', 'Carrera 5 No. 17 - 29', 1185000.00, 1, '2023-08-19 00:46:41'),
(2, 'ternero.jpg', 'ternero', 400.00, 'Luis Fernando Caicedo', '312 887 2109', 'Finca la esparanza - vía Palenque', 800000.00, 1, '2023-08-19 01:02:11'),
(3, 'novillo.jpg', 'novillito', 420.00, 'Maria Fernanda Guzman', '317 654 2216', 'Diagonal el espejo - Finca Piedra Grande', 830000.00, 1, '2023-08-19 01:11:07'),
(4, 'novillo.jpg', 'novillito', 420.00, 'Maria Fernanda Guzman', '317 654 2216', 'Diagonal el espejo - Finca Piedra Grande', 4980000.00, 6, '2023-08-19 01:13:43'),
(5, 'toro.jpg', 'toro', 900.00, 'Bernardo Ardila', '315 678 7000', 'Finca el Espejo', 1705000.00, 1, '2023-08-20 18:17:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crianza_reproduccion`
--
ALTER TABLE `crianza_reproduccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal_madre` (`id_animal_madre`),
  ADD KEY `id_animal_padre` (`id_animal_padre`);

--
-- Indices de la tabla `ganado`
--
ALTER TABLE `ganado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos_mantenimiento`
--
ALTER TABLE `gastos_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_salud_tratamientos`
--
ALTER TABLE `historial_salud_tratamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Indices de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `email` (`user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del Id de la compra.', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `crianza_reproduccion`
--
ALTER TABLE `crianza_reproduccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del id de la crianza.', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ganado`
--
ALTER TABLE `ganado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del id del ganado.', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `gastos_mantenimiento`
--
ALTER TABLE `gastos_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del id del gasto.', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `historial_salud_tratamientos`
--
ALTER TABLE `historial_salud_tratamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del id del tratamiento.', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recordatorios`
--
ALTER TABLE `recordatorios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del id del recordatorio.', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del Id del rol.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Guarda registro del Id del usuario.', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	Guarda registro del Id de la venta.', AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `crianza_reproduccion`
--
ALTER TABLE `crianza_reproduccion`
  ADD CONSTRAINT `crianza_reproduccion_ibfk_1` FOREIGN KEY (`id_animal_madre`) REFERENCES `ganado` (`id`),
  ADD CONSTRAINT `crianza_reproduccion_ibfk_2` FOREIGN KEY (`id_animal_padre`) REFERENCES `ganado` (`id`);

--
-- Filtros para la tabla `historial_salud_tratamientos`
--
ALTER TABLE `historial_salud_tratamientos`
  ADD CONSTRAINT `historial_salud_tratamientos_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `ganado` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`Id_Rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
