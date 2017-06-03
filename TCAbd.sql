-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-07-2016 a las 16:43:16
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `TCAbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AnexoPDF`
--

CREATE TABLE `AnexoPDF` (
`id` int(11) NOT NULL COMMENT 'Control de tabla',
  `Folio` varchar(45) NOT NULL,
  `id_Tipo` int(11) NOT NULL COMMENT 'Tipo de anexo guardado',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente',
  `FechaUp` datetime NOT NULL COMMENT 'Fecha de subida',
  `PathAnexo` varchar(50) NOT NULL COMMENT 'Directorio electrónico del documento',
  `NomFile` varchar(45) NOT NULL COMMENT 'Nombre del documento asignado por el usuario',
  `NomFileSis` varchar(45) NOT NULL COMMENT 'Nombre del documento otorgado por el sistema',
  `Status` int(11) NOT NULL COMMENT 'borrado lógico',
  `StatusCrea` int(11) NOT NULL COMMENT 'Creado el documento a través del sistema\n0: Se subió directamente el oficio\n1: Se redacto una promoción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `data` blob NOT NULL,
  `Persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`, `Persona_id`) VALUES
('2117e7ded3f999397fb3a9291efd8c494d85e617', '::1', 1469077742, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393037373734323b, NULL),
('3e73a9a32cbc2ff273cca07efbcd24f21d2e085b', '::1', 1469108419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393130383431393b, NULL),
('4af8e8fef7808ab269db6273b736af723cad054d', '::1', 1469111591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393131313539313b736573696f6e5f6e6f6d6272657c733a373a22416e746f6e696f223b, NULL),
('67fe51bf61161fdfd30e920fb6da674080a2738e', '::1', 1469078099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393037383039393b, NULL),
('b5ff7918dd924786fad332bdeab76c97d4e4499e', '::1', 1469078055, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393037383035353b, NULL),
('ca8b84c1a8afa47688df8308d71a809611ccf9c1', '::1', 1469111460, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393131313236383b736573696f6e5f6e6f6d6272657c733a373a22416e746f6e696f223b, NULL),
('ce5dc0a32a0f7350db8fe3a1cbcfb5ed5ea9d06c', '::1', 1469108042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313436393130383034323b, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Domicilio`
--

CREATE TABLE `Domicilio` (
`id` int(11) NOT NULL,
  `id_Persona` int(11) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Municipio` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `Cp` varchar(10) NOT NULL,
  `Referencia` varchar(50) DEFAULT NULL,
  `Oir` int(11) NOT NULL COMMENT 'oír:\n0: Domicilio no apto para notificar\n1: Domicilio permitido para notificar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Expediente`
--

CREATE TABLE `Expediente` (
`Id` int(11) NOT NULL COMMENT 'Control de tabla',
  `id_Persona` int(11) NOT NULL COMMENT 'Persona que crea el expediente\nusuario interno {Oficial de Partes}\nusuario externo ',
  `id_Ppresenta` int(11) NOT NULL COMMENT 'Persona representante legal que presenta la demanda.',
  `id_PDemandante` int(11) NOT NULL COMMENT 'Persona que se le considera como Demandante',
  `id_PDemandado` int(11) NOT NULL COMMENT 'Persona Institución pública que recibe demanda',
  `Fecha` datetime NOT NULL COMMENT 'Fecha en que ingresa demanda, promoción, documentos.',
  `Expediente` varchar(45) NOT NULL COMMENT 'Numero de Expediente',
  `Descripcion` longblob NOT NULL COMMENT 'Breve descripción/resumen(250 palabras) del expediente.',
  `Status` int(11) NOT NULL COMMENT 'Indica si permanece activo el expediente (borrado lógico)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notificacion`
--

CREATE TABLE `Notificacion` (
`Id` int(11) NOT NULL COMMENT 'control de tabla',
  `id_PActuario` int(11) NOT NULL COMMENT 'Persona <Actuario> que notifica a las partes interesadas',
  `id_Expediente` int(11) NOT NULL COMMENT 'Expediente',
  `id_PDestinatario` int(11) NOT NULL COMMENT 'Persona a quien se le notifica.',
  `FechaEnvio` datetime NOT NULL COMMENT 'Fecha en que se envía',
  `AnexoPDF_id` int(11) NOT NULL COMMENT 'Folio del documento a notificar.',
  `Status` int(11) NOT NULL COMMENT 'borrado lógico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
`id` int(11) NOT NULL,
  `RazonSocial` varchar(50) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apat` varchar(45) NOT NULL,
  `Amat` varchar(45) NOT NULL,
  `Tel` varchar(45) NOT NULL,
  `Cel` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `CURP` varchar(45) NOT NULL,
  `Tipo de Persona` varchar(45) NOT NULL,
  `IDoficial` varchar(45) NOT NULL,
  `NumeroIDOficial` varchar(45) NOT NULL,
  `Cuentaelectronica` varchar(45) DEFAULT NULL,
  `Usuario` varchar(10) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `RazonSocial`, `Nombre`, `Apat`, `Amat`, `Tel`, `Cel`, `Email`, `CURP`, `Tipo de Persona`, `IDoficial`, `NumeroIDOficial`, `Cuentaelectronica`, `Usuario`, `Password`) VALUES
(1, NULL, 'Antonio', 'Moreno', 'Jáuregui', '3150021', '3121316325', 'ingantonmor@gmail.com', 'MOJA841127HCMRRN02', 'FISICA', '', '123456879', NULL, 'ingantonmo', 'moreno84');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Promocion`
--

CREATE TABLE `Promocion` (
`id` int(11) NOT NULL COMMENT 'control de la tabla',
  `id_Expediente` int(11) NOT NULL COMMENT 'id del expediente',
  `id_Pcrea` int(11) NOT NULL COMMENT 'Persona que crea redactando un documento, promoción, demanda, entre otros.',
  `id_Anexopdf` int(11) NOT NULL,
  `Fecha` datetime NOT NULL COMMENT 'Fecha y hora en que se inicia a redactar.',
  `Redaccion` longtext NOT NULL COMMENT 'Redacción de las promociones.',
  `Status` int(11) NOT NULL COMMENT 'Eliminación lógica.',
  `Status1` int(11) NOT NULL COMMENT 'Validado por magistrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Rol`
--

CREATE TABLE `Rol` (
`idRoles` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Rol`
--

INSERT INTO `Rol` (`idRoles`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Oficial de Partes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RolesPeriodo`
--

CREATE TABLE `RolesPeriodo` (
`id` int(11) NOT NULL COMMENT 'Control de tabla',
  `idPersona` int(11) NOT NULL COMMENT 'Persona',
  `idRoles` int(11) NOT NULL COMMENT 'Relación con la tabla de roles',
  `Fecha` datetime NOT NULL COMMENT 'Periodo del tipo de rol',
  `Status` int(11) NOT NULL COMMENT '0: Inactivo\n1: Activo'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `RolesPeriodo`
--

INSERT INTO `RolesPeriodo` (`id`, `idPersona`, `idRoles`, `Fecha`, `Status`) VALUES
(1, 1, 1, '2016-07-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seguimiento`
--

CREATE TABLE `Seguimiento` (
`id` int(11) NOT NULL COMMENT 'Control de tabla',
  `idExpediente` int(11) NOT NULL COMMENT 'Expediente creado',
  `Status` int(11) NOT NULL COMMENT 'Status\n0.- Ingresado, en espera…\n1.- Validando por Secretario de Acuerdo\n2.- Solicitud de promoción faltante.\n3.- Solicitud de Alegatos.\n4.- Enviado a Proyectista.\n5.- En elaboración de proyecto.\n6.- Proyecto elaborado, en espera de sentencia.\n7.- Sentencia.',
  `Fecha` datetime NOT NULL COMMENT 'Fecha y hora del seguimiento.',
  `Status1` int(11) NOT NULL COMMENT 'Borrado lógico.',
  `AnexoPDF_id` int(11) NOT NULL COMMENT 'Folio del documento agregado al expediente <secuencia del tramite>',
  `FechaVisto` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo`
--

CREATE TABLE `Tipo` (
`IdTipo` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AnexoPDF`
--
ALTER TABLE `AnexoPDF`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_AnexoPDF_Tipo1_idx` (`id_Tipo`), ADD KEY `fk_AnexoPDF_Expediente1_idx` (`id_Expediente`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ci_sessions_Persona1_idx` (`Persona_id`);

--
-- Indices de la tabla `Domicilio`
--
ALTER TABLE `Domicilio`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Domicilio_Persona1_idx` (`id_Persona`);

--
-- Indices de la tabla `Expediente`
--
ALTER TABLE `Expediente`
 ADD PRIMARY KEY (`Id`), ADD KEY `fk_Expediente_Persona1_idx` (`id_Persona`), ADD KEY `fk_Expediente_Persona2_idx` (`id_Ppresenta`);

--
-- Indices de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Id_UNIQUE` (`Id`), ADD KEY `fk_Notifica_Persona1_idx` (`id_PActuario`), ADD KEY `fk_Notifica_Expediente1_idx` (`id_Expediente`), ADD KEY `fk_Notifica_Persona2_idx` (`id_PDestinatario`), ADD KEY `fk_Notifica_AnexoPDF1_idx` (`AnexoPDF_id`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `Promocion`
--
ALTER TABLE `Promocion`
 ADD PRIMARY KEY (`id`,`id_Expediente`,`id_Pcrea`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_Persona_has_Expediente_Expediente1_idx` (`id_Expediente`), ADD KEY `fk_Redacta_Persona1_idx` (`id_Pcrea`), ADD KEY `fk_Promocion_AnexoPDF1_idx` (`id_Anexopdf`);

--
-- Indices de la tabla `Rol`
--
ALTER TABLE `Rol`
 ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `RolesPeriodo`
--
ALTER TABLE `RolesPeriodo`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Personas_has_Roles_Personas_idx` (`idPersona`), ADD KEY `fk_Personas_has_Roles_Roles1_idx` (`idRoles`);

--
-- Indices de la tabla `Seguimiento`
--
ALTER TABLE `Seguimiento`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `idSeguimiento_UNIQUE` (`id`), ADD KEY `fk_Seguimiento_Expediente1_idx` (`idExpediente`), ADD KEY `fk_Seguimiento_AnexoPDF1_idx` (`AnexoPDF_id`);

--
-- Indices de la tabla `Tipo`
--
ALTER TABLE `Tipo`
 ADD PRIMARY KEY (`IdTipo`), ADD UNIQUE KEY `idPromo_UNIQUE` (`IdTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AnexoPDF`
--
ALTER TABLE `AnexoPDF`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla';
--
-- AUTO_INCREMENT de la tabla `Domicilio`
--
ALTER TABLE `Domicilio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Expediente`
--
ALTER TABLE `Expediente`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla';
--
-- AUTO_INCREMENT de la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'control de tabla';
--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Promocion`
--
ALTER TABLE `Promocion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'control de la tabla';
--
-- AUTO_INCREMENT de la tabla `Rol`
--
ALTER TABLE `Rol`
MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `RolesPeriodo`
--
ALTER TABLE `RolesPeriodo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Seguimiento`
--
ALTER TABLE `Seguimiento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control de tabla';
--
-- AUTO_INCREMENT de la tabla `Tipo`
--
ALTER TABLE `Tipo`
MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AnexoPDF`
--
ALTER TABLE `AnexoPDF`
ADD CONSTRAINT `fk_AnexoPDF_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_AnexoPDF_Tipo1` FOREIGN KEY (`id_Tipo`) REFERENCES `Tipo` (`IdTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
ADD CONSTRAINT `fk_ci_sessions_Persona1` FOREIGN KEY (`Persona_id`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Domicilio`
--
ALTER TABLE `Domicilio`
ADD CONSTRAINT `fk_Domicilio_Persona1` FOREIGN KEY (`id_Persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Expediente`
--
ALTER TABLE `Expediente`
ADD CONSTRAINT `fk_Expediente_Persona1` FOREIGN KEY (`id_Persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Expediente_Persona2` FOREIGN KEY (`id_Ppresenta`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
ADD CONSTRAINT `fk_Notifica_AnexoPDF1` FOREIGN KEY (`AnexoPDF_id`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Notifica_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Notifica_Persona1` FOREIGN KEY (`id_PActuario`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Notifica_Persona2` FOREIGN KEY (`id_PDestinatario`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Promocion`
--
ALTER TABLE `Promocion`
ADD CONSTRAINT `fk_Persona_has_Expediente_Expediente1` FOREIGN KEY (`id_Expediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Promocion_AnexoPDF1` FOREIGN KEY (`id_Anexopdf`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Redacta_Persona1` FOREIGN KEY (`id_Pcrea`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `RolesPeriodo`
--
ALTER TABLE `RolesPeriodo`
ADD CONSTRAINT `fk_Personas_has_Roles_Personas` FOREIGN KEY (`idPersona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Personas_has_Roles_Roles1` FOREIGN KEY (`idRoles`) REFERENCES `Rol` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Seguimiento`
--
ALTER TABLE `Seguimiento`
ADD CONSTRAINT `fk_Seguimiento_AnexoPDF1` FOREIGN KEY (`AnexoPDF_id`) REFERENCES `AnexoPDF` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Seguimiento_Expediente1` FOREIGN KEY (`idExpediente`) REFERENCES `Expediente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
