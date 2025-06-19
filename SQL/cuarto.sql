-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2025 a las 21:17:41
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuarto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ID_CED` varchar(10) NOT NULL,
  `NOM_EST` varchar(20) NOT NULL,
  `APE_EST` varchar(20) NOT NULL,
  `TEL_EST` varchar(10) NOT NULL,
  `COR_EST` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ID_CED`, `NOM_EST`, `APE_EST`, `TEL_EST`, `COR_EST`) VALUES
('1723456789', 'María', 'García', '0976543210', 'maria.garcia@yahoo.com'),
('1745612390', 'Daniela', 'Ruiz', '0954321098', 'daniela.ruiz@gmail.com'),
('1754891234', 'Andrea', 'López', '0987654321', 'andrea.lopez@gmail.com'),
('1767891230', 'Luis', 'Paredes', '0965432109', 'luis.paredes@outlook.com'),
('1802315678', 'Carlos', 'Mendoza', '0991234567', 'c.mendoza@hotmail.com'),
('1850421312', 'Sebastian', 'Santana', '0995781009', 'sdsnt2003@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ID_CED`);
COMMIT;
CREATE TABLE usuarios (
  usuario VARCHAR(50) PRIMARY KEY,
  contrasena VARCHAR(100) NOT NULL,
  nombre varchar(100) NOT NULL,
  cargo VARCHAR(20) NOT NULL CHECK (cargo IN ('admin', 'secretaria'))
);
INSERT INTO usuarios VALUES
('admin1', 'admin123','Jose Luis', 'admin'),
('secretaria1', 'secre456','Maria Vega', 'secretaria'),
('admin2', 'claveAdmin','Mario Perez' ,'admin'),
('secre2', 'passwordSec','Luisa Martinez', 'secretaria'),
('soporte1', 'soporte123','Administrador','admin');  -- válido porque es 'admin'

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
