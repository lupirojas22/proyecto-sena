-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 05:56:40
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL,
  `nom_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`) VALUES
(1, 'SEGURIDAD VIAL'),
(2, 'SEGURIDAD Y SALUD EN EL TRABAJO'),
(3, 'COVID'),
(4, 'CURSOS DE TRABAJO SEGURO EN ALTURAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL,
  `nombre` varchar(450) COLLATE utf8_spanish_ci NOT NULL,
  `ti_doc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_doc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_curso` int(5) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_exp` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `imprimir` int(45) NOT NULL,
  `consecutivo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `certificado`
--

INSERT INTO `certificado` (`id_certificado`, `nombre`, `ti_doc`, `num_doc`, `id_curso`, `id_empresa`, `estado`, `fecha`, `ciudad_exp`, `imprimir`, `consecutivo`, `fecha_ingreso`, `activo`) VALUES
(1, 'JUAN PÉREZ', '1', '1012345678', 2, 1, 'Certificado', '2024-05-15', 'Bogotá D.C.', 1, '24CP1079', '2024-11-14', 0),
(2, 'MARÍA LÓPEZ', '1', '1023456789', 63, 0, 'En proceso de formación', '0000-00-00', 'Abejorral', 0, '24CP1080', '2024-11-14', 0),
(3, 'CARLOS GÓMEZ', '1', '1034567890', 67, 2, 'Certificado', '2024-06-10', 'Calí', 0, '24IS0189', '2024-11-14', 0),
(4, 'LAURA MARTÍNEZ', '1', '1045678901', 24, 0, 'Certificado', '2024-07-16', 'Bogotá D.C.', 1, '24CA0061', '2024-11-14', 0),
(5, 'ANDRÉS RODRÍGUEZ', '1', '1056789012', 15, 3, 'En proceso de Certificación', '0000-00-00', 'Abejorral', 0, '24MC0069', '2024-11-14', 0),
(6, 'BEATRIZ FERNÁNDEZ', '1', '1067890123', 76, 0, 'Certificado', '2024-08-01', 'Barranquilla', 1, '240023', '2024-11-14', 0),
(7, 'ROBERTO SÁNCHEZ', '1', '1078901234', 24, 4, 'Certificado', '2024-09-15', 'Bucaramanga', 0, '24CA0062', '2024-11-14', 0),
(8, 'ANA TORRES', '1', '1089012345', 35, 0, 'Certificado', '2024-10-05', 'Medellín', 1, '24AD0052', '2024-11-14', 0),
(9, 'FELIPE DÍAZ', '1', '1090123456', 18, 4, 'En proceso de Certificación', '0000-00-00', 'Abejorral', 0, '24IS0190', '2024-11-14', 0),
(10, 'MARTA CRUZ', '1', '1101234567', 46, 0, 'Certificado', '2024-11-02', 'Bogotá D.C.', 1, '24AL0144', '2024-11-14', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'Leticia'),
(2, 'Puerto Nariño'),
(3, 'Abejorral'),
(4, 'Abriaquí'),
(5, 'Alejandria'),
(6, 'Amagá'),
(7, 'Amalfi'),
(8, 'Andes'),
(9, 'Angelópolis'),
(10, 'Angostura'),
(11, 'Anorí'),
(12, 'Anzá'),
(13, 'Apartadó'),
(14, 'Arboletes'),
(15, 'Argelia'),
(16, 'Armenia'),
(17, 'Barbosa'),
(18, 'Bello'),
(19, 'Belmira'),
(20, 'Betania'),
(21, 'Betulia'),
(22, 'Bolívar'),
(23, 'Briceño'),
(24, 'Burítica'),
(25, 'Caicedo'),
(26, 'Caldas'),
(27, 'Campamento'),
(28, 'Caracolí'),
(29, 'Caramanta'),
(30, 'Carepa'),
(31, 'Carmen de Viboral'),
(32, 'Carolina'),
(33, 'Caucasia'),
(34, 'Cañasgordas'),
(35, 'Chigorodó'),
(36, 'Cisneros'),
(37, 'Cocorná'),
(38, 'Concepción'),
(39, 'Concordia'),
(40, 'Copacabana'),
(41, 'Cáceres'),
(42, 'Dabeiba'),
(43, 'Don Matías'),
(44, 'Ebéjico'),
(45, 'El Bagre'),
(46, 'Entrerríos'),
(47, 'Envigado'),
(48, 'Fredonia'),
(49, 'Frontino'),
(50, 'Giraldo'),
(51, 'Girardota'),
(52, 'Granada'),
(53, 'Guadalupe'),
(54, 'Guarne'),
(55, 'Guatapé'),
(56, 'Gómez Plata'),
(57, 'Heliconia'),
(58, 'Hispania'),
(59, 'Itagüí'),
(60, 'Ituango'),
(61, 'Jardín'),
(62, 'Jericó'),
(63, 'La Ceja'),
(64, 'La Estrella'),
(65, 'La Pintada'),
(66, 'La Unión'),
(67, 'Liborina'),
(68, 'Maceo'),
(69, 'Marinilla'),
(70, 'Medellín'),
(71, 'Montebello'),
(72, 'Murindó'),
(73, 'Mutatá'),
(74, 'Nariño'),
(75, 'Nechí'),
(76, 'Necoclí'),
(77, 'Olaya'),
(78, 'Peque'),
(79, 'Peñol'),
(80, 'Pueblorrico'),
(81, 'Puerto Berrío'),
(82, 'Puerto Nare'),
(83, 'Puerto Triunfo'),
(84, 'Remedios'),
(85, 'Retiro'),
(86, 'Ríonegro'),
(87, 'Sabanalarga'),
(88, 'Sabaneta'),
(89, 'Salgar'),
(90, 'San Andrés de Cuerquía'),
(91, 'San Carlos'),
(92, 'San Francisco'),
(93, 'San Jerónimo'),
(94, 'San José de Montaña'),
(95, 'San Juan de Urabá'),
(96, 'San Luís'),
(97, 'San Pedro'),
(98, 'San Pedro de Urabá'),
(99, 'San Rafael'),
(100, 'San Roque'),
(101, 'San Vicente'),
(102, 'Santa Bárbara'),
(103, 'Santa Fé de Antioquia'),
(104, 'Santa Rosa de Osos'),
(105, 'Santo Domingo'),
(106, 'Santuario'),
(107, 'Segovia'),
(108, 'Sonsón'),
(109, 'Sopetrán'),
(110, 'Tarazá'),
(111, 'Tarso'),
(112, 'Titiribí'),
(113, 'Toledo'),
(114, 'Turbo'),
(115, 'Támesis'),
(116, 'Uramita'),
(117, 'Urrao'),
(118, 'Valdivia'),
(119, 'Valparaiso'),
(120, 'Vegachí'),
(121, 'Venecia'),
(122, 'Vigía del Fuerte'),
(123, 'Yalí'),
(124, 'Yarumal'),
(125, 'Yolombó'),
(126, 'Yondó (Casabe)'),
(127, 'Zaragoza'),
(128, 'Arauca'),
(129, 'Arauquita'),
(130, 'Cravo Norte'),
(131, 'Fortúl'),
(132, 'Puerto Rondón'),
(133, 'Saravena'),
(134, 'Tame'),
(135, 'Baranoa'),
(136, 'Barranquilla'),
(137, 'Campo de la Cruz'),
(138, 'Candelaria'),
(139, 'Galapa'),
(140, 'Juan de Acosta'),
(141, 'Luruaco'),
(142, 'Malambo'),
(143, 'Manatí'),
(144, 'Palmar de Varela'),
(145, 'Piojo'),
(146, 'Polonuevo'),
(147, 'Ponedera'),
(148, 'Puerto Colombia'),
(149, 'Repelón'),
(150, 'Sabanagrande'),
(151, 'Sabanalarga'),
(152, 'Santa Lucía'),
(153, 'Santo Tomás'),
(154, 'Soledad'),
(155, 'Suan'),
(156, 'Tubará'),
(157, 'Usiacuri'),
(158, 'Achí'),
(159, 'Altos del Rosario'),
(160, 'Arenal'),
(161, 'Arjona'),
(162, 'Arroyohondo'),
(163, 'Barranco de Loba'),
(164, 'Calamar'),
(165, 'Cantagallo'),
(166, 'Cartagena'),
(167, 'Cicuco'),
(168, 'Clemencia'),
(169, 'Córdoba'),
(170, 'El Carmen de Bolívar'),
(171, 'El Guamo'),
(172, 'El Peñon'),
(173, 'Hatillo de Loba'),
(174, 'Magangué'),
(175, 'Mahates'),
(176, 'Margarita'),
(177, 'María la Baja'),
(178, 'Mompós'),
(179, 'Montecristo'),
(180, 'Morales'),
(181, 'Norosí'),
(182, 'Pinillos'),
(183, 'Regidor'),
(184, 'Río Viejo'),
(185, 'San Cristobal'),
(186, 'San Estanislao'),
(187, 'San Fernando'),
(188, 'San Jacinto'),
(189, 'San Jacinto del Cauca'),
(190, 'San Juan de Nepomuceno'),
(191, 'San Martín de Loba'),
(192, 'San Pablo'),
(193, 'Santa Catalina'),
(194, 'Santa Rosa '),
(195, 'Santa Rosa del Sur'),
(196, 'Simití'),
(197, 'Soplaviento'),
(198, 'Talaigua Nuevo'),
(199, 'Tiquisio (Puerto Rico)'),
(200, 'Turbaco'),
(201, 'Turbaná'),
(202, 'Villanueva'),
(203, 'Zambrano'),
(204, 'Almeida'),
(205, 'Aquitania'),
(206, 'Arcabuco'),
(207, 'Belén'),
(208, 'Berbeo'),
(209, 'Beteitiva'),
(210, 'Boavita'),
(211, 'Boyacá'),
(212, 'Briceño'),
(213, 'Buenavista'),
(214, 'Busbanza'),
(215, 'Caldas'),
(216, 'Campohermoso'),
(217, 'Cerinza'),
(218, 'Chinavita'),
(219, 'Chiquinquirá'),
(220, 'Chiscas'),
(221, 'Chita'),
(222, 'Chitaraque'),
(223, 'Chivatá'),
(224, 'Chíquiza'),
(225, 'Chívor'),
(226, 'Ciénaga'),
(227, 'Coper'),
(228, 'Corrales'),
(229, 'Covarachía'),
(230, 'Cubará'),
(231, 'Cucaita'),
(232, 'Cuitiva'),
(233, 'Cómbita'),
(234, 'Duitama'),
(235, 'El Cocuy'),
(236, 'El Espino'),
(237, 'Firavitoba'),
(238, 'Floresta'),
(239, 'Gachantivá'),
(240, 'Garagoa'),
(241, 'Guacamayas'),
(242, 'Guateque'),
(243, 'Guayatá'),
(244, 'Guicán'),
(245, 'Gámeza'),
(246, 'Izá'),
(247, 'Jenesano'),
(248, 'Jericó'),
(249, 'La Capilla'),
(250, 'La Uvita'),
(251, 'La Victoria'),
(252, 'Labranzagrande'),
(253, 'Macanal'),
(254, 'Maripí'),
(255, 'Miraflores'),
(256, 'Mongua'),
(257, 'Monguí'),
(258, 'Moniquirá'),
(259, 'Motavita'),
(260, 'Muzo'),
(261, 'Nobsa'),
(262, 'Nuevo Colón'),
(263, 'Oicatá'),
(264, 'Otanche'),
(265, 'Pachavita'),
(266, 'Paipa'),
(267, 'Pajarito'),
(268, 'Panqueba'),
(269, 'Pauna'),
(270, 'Paya'),
(271, 'Paz de Río'),
(272, 'Pesca'),
(273, 'Pisva'),
(274, 'Puerto Boyacá'),
(275, 'Páez'),
(276, 'Quipama'),
(277, 'Ramiriquí'),
(278, 'Rondón'),
(279, 'Ráquira'),
(280, 'Saboyá'),
(281, 'Samacá'),
(282, 'San Eduardo'),
(283, 'San José de Pare'),
(284, 'San Luís de Gaceno'),
(285, 'San Mateo'),
(286, 'San Miguel de Sema'),
(287, 'San Pablo de Borbur'),
(288, 'Santa María'),
(289, 'Santa Rosa de Viterbo'),
(290, 'Santa Sofía'),
(291, 'Santana'),
(292, 'Sativanorte'),
(293, 'Sativasur'),
(294, 'Siachoque'),
(295, 'Soatá'),
(296, 'Socha'),
(297, 'Socotá'),
(298, 'Sogamoso'),
(299, 'Somondoco'),
(300, 'Sora'),
(301, 'Soracá'),
(302, 'Sotaquirá'),
(303, 'Susacón'),
(304, 'Sutamarchán'),
(305, 'Sutatenza'),
(306, 'Sáchica'),
(307, 'Tasco'),
(308, 'Tenza'),
(309, 'Tibaná'),
(310, 'Tibasosa'),
(311, 'Tinjacá'),
(312, 'Tipacoque'),
(313, 'Toca'),
(314, 'Toguí'),
(315, 'Topagá'),
(316, 'Tota'),
(317, 'Tunja'),
(318, 'Tunungua'),
(319, 'Turmequé'),
(320, 'Tuta'),
(321, 'Tutasá'),
(322, 'Ventaquemada'),
(323, 'Villa de Leiva'),
(324, 'Viracachá'),
(325, 'Zetaquirá'),
(326, 'Úmbita'),
(327, 'Aguadas'),
(328, 'Anserma'),
(329, 'Aranzazu'),
(330, 'Belalcázar'),
(331, 'Chinchiná'),
(332, 'Filadelfia'),
(333, 'La Dorada'),
(334, 'La Merced'),
(335, 'La Victoria'),
(336, 'Manizales'),
(337, 'Manzanares'),
(338, 'Marmato'),
(339, 'Marquetalia'),
(340, 'Marulanda'),
(341, 'Neira'),
(342, 'Norcasia'),
(343, 'Palestina'),
(344, 'Pensilvania'),
(345, 'Pácora'),
(346, 'Risaralda'),
(347, 'Río Sucio'),
(348, 'Salamina'),
(349, 'Samaná'),
(350, 'San José'),
(351, 'Supía'),
(352, 'Villamaría'),
(353, 'Viterbo'),
(354, 'Albania'),
(355, 'Belén de los Andaquíes'),
(356, 'Cartagena del Chairá'),
(357, 'Curillo'),
(358, 'El Doncello'),
(359, 'El Paujil'),
(360, 'Florencia'),
(361, 'La Montañita'),
(362, 'Milán'),
(363, 'Morelia'),
(364, 'Puerto Rico'),
(365, 'San José del Fragua'),
(366, 'San Vicente del Caguán'),
(367, 'Solano'),
(368, 'Solita'),
(369, 'Valparaiso'),
(370, 'Aguazul'),
(371, 'Chámeza'),
(372, 'Hato Corozal'),
(373, 'La Salina'),
(374, 'Maní'),
(375, 'Monterrey'),
(376, 'Nunchía'),
(377, 'Orocué'),
(378, 'Paz de Ariporo'),
(379, 'Pore'),
(380, 'Recetor'),
(381, 'Sabanalarga'),
(382, 'San Luís de Palenque'),
(383, 'Sácama'),
(384, 'Tauramena'),
(385, 'Trinidad'),
(386, 'Támara'),
(387, 'Villanueva'),
(388, 'Yopal'),
(389, 'Almaguer'),
(390, 'Argelia'),
(391, 'Balboa'),
(392, 'Bolívar'),
(393, 'Buenos Aires'),
(394, 'Cajibío'),
(395, 'Caldono'),
(396, 'Caloto'),
(397, 'Corinto'),
(398, 'El Tambo'),
(399, 'Florencia'),
(400, 'Guachené'),
(401, 'Guapí'),
(402, 'Inzá'),
(403, 'Jambaló'),
(404, 'La Sierra'),
(405, 'La Vega'),
(406, 'López (Micay)'),
(407, 'Mercaderes'),
(408, 'Miranda'),
(409, 'Morales'),
(410, 'Padilla'),
(411, 'Patía (El Bordo)'),
(412, 'Piamonte'),
(413, 'Piendamó'),
(414, 'Popayán'),
(415, 'Puerto Tejada'),
(416, 'Puracé (Coconuco)'),
(417, 'Páez (Belalcazar)'),
(418, 'Rosas'),
(419, 'San Sebastián'),
(420, 'Santa Rosa'),
(421, 'Santander de Quilichao'),
(422, 'Silvia'),
(423, 'Sotara (Paispamba)'),
(424, 'Sucre'),
(425, 'Suárez'),
(426, 'Timbiquí'),
(427, 'Timbío'),
(428, 'Toribío'),
(429, 'Totoró'),
(430, 'Villa Rica'),
(431, 'Aguachica'),
(432, 'Agustín Codazzi'),
(433, 'Astrea'),
(434, 'Becerríl'),
(435, 'Bosconia'),
(436, 'Chimichagua'),
(437, 'Chiriguaná'),
(438, 'Curumaní'),
(439, 'El Copey'),
(440, 'El Paso'),
(441, 'Gamarra'),
(442, 'Gonzalez'),
(443, 'La Gloria'),
(444, 'La Jagua de Ibirico'),
(445, 'La Paz (Robles)'),
(446, 'Manaure Balcón del Cesar'),
(447, 'Pailitas'),
(448, 'Pelaya'),
(449, 'Pueblo Bello'),
(450, 'Río de oro'),
(451, 'San Alberto'),
(452, 'San Diego'),
(453, 'San Martín'),
(454, 'Tamalameque'),
(455, 'Valledupar'),
(456, 'Acandí'),
(457, 'Alto Baudó (Pie de Pato)'),
(458, 'Atrato (Yuto)'),
(459, 'Bagadó'),
(460, 'Bahía Solano (Mútis)'),
(461, 'Bajo Baudó (Pizarro)'),
(462, 'Belén de Bajirá'),
(463, 'Bojayá (Bellavista)'),
(464, 'Cantón de San Pablo'),
(465, 'Carmen del Darién (CURBARADÓ)'),
(466, 'Condoto'),
(467, 'Cértegui'),
(468, 'El Carmen de Atrato'),
(469, 'Istmina'),
(470, 'Juradó'),
(471, 'Lloró'),
(472, 'Medio Atrato'),
(473, 'Medio Baudó'),
(474, 'Medio San Juan (ANDAGOYA)'),
(475, 'Novita'),
(476, 'Nuquí'),
(477, 'Quibdó'),
(478, 'Río Iró'),
(479, 'Río Quito'),
(480, 'Ríosucio'),
(481, 'San José del Palmar'),
(482, 'Santa Genoveva de Docorodó'),
(483, 'Sipí'),
(484, 'Tadó'),
(485, 'Unguía'),
(486, 'Unión Panamericana (ÁNIMAS)'),
(487, 'Ayapel'),
(488, 'Buenavista'),
(489, 'Canalete'),
(490, 'Cereté'),
(491, 'Chimá'),
(492, 'Chinú'),
(493, 'Ciénaga de Oro'),
(494, 'Cotorra'),
(495, 'La Apartada y La Frontera'),
(496, 'Lorica'),
(497, 'Los Córdobas'),
(498, 'Momil'),
(499, 'Montelíbano'),
(500, 'Monteria'),
(501, 'Moñitos'),
(502, 'Planeta Rica'),
(503, 'Pueblo Nuevo'),
(504, 'Puerto Escondido'),
(505, 'Puerto Libertador'),
(506, 'Purísima'),
(507, 'Sahagún'),
(508, 'San Andrés Sotavento'),
(509, 'San Antero'),
(510, 'San Bernardo del Viento'),
(511, 'San Carlos'),
(512, 'San José de Uré'),
(513, 'San Pelayo'),
(514, 'Tierralta'),
(515, 'Tuchín'),
(516, 'Valencia'),
(517, 'Agua de Dios'),
(518, 'Albán'),
(519, 'Anapoima'),
(520, 'Anolaima'),
(521, 'Apulo'),
(522, 'Arbeláez'),
(523, 'Beltrán'),
(524, 'Bituima'),
(525, 'Bogotá D.C.'),
(526, 'Bojacá'),
(527, 'Cabrera'),
(528, 'Cachipay'),
(529, 'Cajicá'),
(530, 'Caparrapí'),
(531, 'Carmen de Carupa'),
(532, 'Chaguaní'),
(533, 'Chipaque'),
(534, 'Choachí'),
(535, 'Chocontá'),
(536, 'Chía'),
(537, 'Cogua'),
(538, 'Cota'),
(539, 'Cucunubá'),
(540, 'Cáqueza'),
(541, 'El Colegio'),
(542, 'El Peñón'),
(543, 'El Rosal'),
(544, 'Facatativá'),
(545, 'Fosca'),
(546, 'Funza'),
(547, 'Fusagasugá'),
(548, 'Fómeque'),
(549, 'Fúquene'),
(550, 'Gachalá'),
(551, 'Gachancipá'),
(552, 'Gachetá'),
(553, 'Gama'),
(554, 'Girardot'),
(555, 'Granada'),
(556, 'Guachetá'),
(557, 'Guaduas'),
(558, 'Guasca'),
(559, 'Guataquí'),
(560, 'Guatavita'),
(561, 'Guayabal de Siquima'),
(562, 'Guayabetal'),
(563, 'Gutiérrez'),
(564, 'Jerusalén'),
(565, 'Junín'),
(566, 'La Calera'),
(567, 'La Mesa'),
(568, 'La Palma'),
(569, 'La Peña'),
(570, 'La Vega'),
(571, 'Lenguazaque'),
(572, 'Machetá'),
(573, 'Madrid'),
(574, 'Manta'),
(575, 'Medina'),
(576, 'Mosquera'),
(577, 'Nariño'),
(578, 'Nemocón'),
(579, 'Nilo'),
(580, 'Nimaima'),
(581, 'Nocaima'),
(582, 'Pacho'),
(583, 'Paime'),
(584, 'Pandi'),
(585, 'Paratebueno'),
(586, 'Pasca'),
(587, 'Puerto Salgar'),
(588, 'Pulí'),
(589, 'Quebradanegra'),
(590, 'Quetame'),
(591, 'Quipile'),
(592, 'Ricaurte'),
(593, 'San Antonio de Tequendama'),
(594, 'San Bernardo'),
(595, 'San Cayetano'),
(596, 'San Francisco'),
(597, 'San Juan de Río Seco'),
(598, 'Sasaima'),
(599, 'Sesquilé'),
(600, 'Sibaté'),
(601, 'Silvania'),
(602, 'Simijaca'),
(603, 'Soacha'),
(604, 'Sopó'),
(605, 'Subachoque'),
(606, 'Suesca'),
(607, 'Supatá'),
(608, 'Susa'),
(609, 'Sutatausa'),
(610, 'Tabio'),
(611, 'Tausa'),
(612, 'Tena'),
(613, 'Tenjo'),
(614, 'Tibacuy'),
(615, 'Tibirita'),
(616, 'Tocaima'),
(617, 'Tocancipá'),
(618, 'Topaipí'),
(619, 'Ubalá'),
(620, 'Ubaque'),
(621, 'Ubaté'),
(622, 'Une'),
(623, 'Venecia (Ospina Pérez)'),
(624, 'Vergara'),
(625, 'Viani'),
(626, 'Villagómez'),
(627, 'Villapinzón'),
(628, 'Villeta'),
(629, 'Viotá'),
(630, 'Yacopí'),
(631, 'Zipacón'),
(632, 'Zipaquirá'),
(633, 'Útica'),
(634, 'Inírida'),
(635, 'Calamar'),
(636, 'El Retorno'),
(637, 'Miraflores'),
(638, 'San José del Guaviare'),
(639, 'Acevedo'),
(640, 'Agrado'),
(641, 'Aipe'),
(642, 'Algeciras'),
(643, 'Altamira'),
(644, 'Baraya'),
(645, 'Campoalegre'),
(646, 'Colombia'),
(647, 'Elías'),
(648, 'Garzón'),
(649, 'Gigante'),
(650, 'Guadalupe'),
(651, 'Hobo'),
(652, 'Isnos'),
(653, 'La Argentina'),
(654, 'La Plata'),
(655, 'Neiva'),
(656, 'Nátaga'),
(657, 'Oporapa'),
(658, 'Paicol'),
(659, 'Palermo'),
(660, 'Palestina'),
(661, 'Pital'),
(662, 'Pitalito'),
(663, 'Rivera'),
(664, 'Saladoblanco'),
(665, 'San Agustín'),
(666, 'Santa María'),
(667, 'Suaza'),
(668, 'Tarqui'),
(669, 'Tello'),
(670, 'Teruel'),
(671, 'Tesalia'),
(672, 'Timaná'),
(673, 'Villavieja'),
(674, 'Yaguará'),
(675, 'Íquira'),
(676, 'Albania'),
(677, 'Barrancas'),
(678, 'Dibulla'),
(679, 'Distracción'),
(680, 'El Molino'),
(681, 'Fonseca'),
(682, 'Hatonuevo'),
(683, 'La Jagua del Pilar'),
(684, 'Maicao'),
(685, 'Manaure'),
(686, 'Riohacha'),
(687, 'San Juan del Cesar'),
(688, 'Uribia'),
(689, 'Urumita'),
(690, 'Villanueva'),
(691, 'Algarrobo'),
(692, 'Aracataca'),
(693, 'Ariguaní (El Difícil)'),
(694, 'Cerro San Antonio'),
(695, 'Chivolo'),
(696, 'Ciénaga'),
(697, 'Concordia'),
(698, 'El Banco'),
(699, 'El Piñon'),
(700, 'El Retén'),
(701, 'Fundación'),
(702, 'Guamal'),
(703, 'Nueva Granada'),
(704, 'Pedraza'),
(705, 'Pijiño'),
(706, 'Pivijay'),
(707, 'Plato'),
(708, 'Puebloviejo'),
(709, 'Remolino'),
(710, 'Sabanas de San Angel (SAN ANGE'),
(711, 'Salamina'),
(712, 'San Sebastián de Buenavista'),
(713, 'San Zenón'),
(714, 'Santa Ana'),
(715, 'Santa Bárbara de Pinto'),
(716, 'Santa Marta'),
(717, 'Sitionuevo'),
(718, 'Tenerife'),
(719, 'Zapayán (PUNTA DE PIEDRAS)'),
(720, 'Zona Bananera (PRADO - SEVILLA'),
(721, 'Acacías'),
(722, 'Barranca de Upía'),
(723, 'Cabuyaro'),
(724, 'Castilla la Nueva'),
(725, 'Cubarral'),
(726, 'Cumaral'),
(727, 'El Calvario'),
(728, 'El Castillo'),
(729, 'El Dorado'),
(730, 'Fuente de Oro'),
(731, 'Granada'),
(732, 'Guamal'),
(733, 'La Macarena'),
(734, 'Lejanías'),
(735, 'Mapiripan'),
(736, 'Mesetas'),
(737, 'Puerto Concordia'),
(738, 'Puerto Gaitán'),
(739, 'Puerto Lleras'),
(740, 'Puerto López'),
(741, 'Puerto Rico'),
(742, 'Restrepo'),
(743, 'San Carlos de Guaroa'),
(744, 'San Juan de Arama'),
(745, 'San Juanito'),
(746, 'San Martín'),
(747, 'Uribe'),
(748, 'Villavicencio'),
(749, 'Vista Hermosa'),
(750, 'Albán (San José)'),
(751, 'Aldana'),
(752, 'Ancuya'),
(753, 'Arboleda (Berruecos)'),
(754, 'Barbacoas'),
(755, 'Belén'),
(756, 'Buesaco'),
(757, 'Chachaguí'),
(758, 'Colón (Génova)'),
(759, 'Consaca'),
(760, 'Contadero'),
(761, 'Cuaspud (Carlosama)'),
(762, 'Cumbal'),
(763, 'Cumbitara'),
(764, 'Córdoba'),
(765, 'El Charco'),
(766, 'El Peñol'),
(767, 'El Rosario'),
(768, 'El Tablón de Gómez'),
(769, 'El Tambo'),
(770, 'Francisco Pizarro'),
(771, 'Funes'),
(772, 'Guachavés'),
(773, 'Guachucal'),
(774, 'Guaitarilla'),
(775, 'Gualmatán'),
(776, 'Iles'),
(777, 'Imúes'),
(778, 'Ipiales'),
(779, 'La Cruz'),
(780, 'La Florida'),
(781, 'La Llanada'),
(782, 'La Tola'),
(783, 'La Unión'),
(784, 'Leiva'),
(785, 'Linares'),
(786, 'Magüi (Payán)'),
(787, 'Mallama (Piedrancha)'),
(788, 'Mosquera'),
(789, 'Nariño'),
(790, 'Olaya Herrera'),
(791, 'Ospina'),
(792, 'Policarpa'),
(793, 'Potosí'),
(794, 'Providencia'),
(795, 'Puerres'),
(796, 'Pupiales'),
(797, 'Ricaurte'),
(798, 'Roberto Payán (San José)'),
(799, 'Samaniego'),
(800, 'San Bernardo'),
(801, 'San Juan de Pasto'),
(802, 'San Lorenzo'),
(803, 'San Pablo'),
(804, 'San Pedro de Cartago'),
(805, 'Sandoná'),
(806, 'Santa Bárbara (Iscuandé)'),
(807, 'Sapuyes'),
(808, 'Sotomayor (Los Andes)'),
(809, 'Taminango'),
(810, 'Tangua'),
(811, 'Tumaco'),
(812, 'Túquerres'),
(813, 'Yacuanquer'),
(814, 'Arboledas'),
(815, 'Bochalema'),
(816, 'Bucarasica'),
(817, 'Chinácota'),
(818, 'Chitagá'),
(819, 'Convención'),
(820, 'Cucutilla'),
(821, 'Cáchira'),
(822, 'Cácota'),
(823, 'Cúcuta'),
(824, 'Durania'),
(825, 'El Carmen'),
(826, 'El Tarra'),
(827, 'El Zulia'),
(828, 'Gramalote'),
(829, 'Hacarí'),
(830, 'Herrán'),
(831, 'La Esperanza'),
(832, 'La Playa'),
(833, 'Labateca'),
(834, 'Los Patios'),
(835, 'Lourdes'),
(836, 'Mutiscua'),
(837, 'Ocaña'),
(838, 'Pamplona'),
(839, 'Pamplonita'),
(840, 'Puerto Santander'),
(841, 'Ragonvalia'),
(842, 'Salazar'),
(843, 'San Calixto'),
(844, 'San Cayetano'),
(845, 'Santiago'),
(846, 'Sardinata'),
(847, 'Silos'),
(848, 'Teorama'),
(849, 'Tibú'),
(850, 'Toledo'),
(851, 'Villa Caro'),
(852, 'Villa del Rosario'),
(853, 'Ábrego'),
(854, 'Colón'),
(855, 'Mocoa'),
(856, 'Orito'),
(857, 'Puerto Asís'),
(858, 'Puerto Caicedo'),
(859, 'Puerto Guzmán'),
(860, 'Puerto Leguízamo'),
(861, 'San Francisco'),
(862, 'San Miguel'),
(863, 'Santiago'),
(864, 'Sibundoy'),
(865, 'Valle del Guamuez'),
(866, 'Villagarzón'),
(867, 'Armenia'),
(868, 'Buenavista'),
(869, 'Calarcá'),
(870, 'Circasia'),
(871, 'Cordobá'),
(872, 'Filandia'),
(873, 'Génova'),
(874, 'La Tebaida'),
(875, 'Montenegro'),
(876, 'Pijao'),
(877, 'Quimbaya'),
(878, 'Salento'),
(879, 'Apía'),
(880, 'Balboa'),
(881, 'Belén de Umbría'),
(882, 'Dos Quebradas'),
(883, 'Guática'),
(884, 'La Celia'),
(885, 'La Virginia'),
(886, 'Marsella'),
(887, 'Mistrató'),
(888, 'Pereira'),
(889, 'Pueblo Rico'),
(890, 'Quinchía'),
(891, 'Santa Rosa de Cabal'),
(892, 'Santuario'),
(893, 'Providencia'),
(894, 'Aguada'),
(895, 'Albania'),
(896, 'Aratoca'),
(897, 'Barbosa'),
(898, 'Barichara'),
(899, 'Barrancabermeja'),
(900, 'Betulia'),
(901, 'Bolívar'),
(902, 'Bucaramanga'),
(903, 'Cabrera'),
(904, 'California'),
(905, 'Capitanejo'),
(906, 'Carcasí'),
(907, 'Cepita'),
(908, 'Cerrito'),
(909, 'Charalá'),
(910, 'Charta'),
(911, 'Chima'),
(912, 'Chipatá'),
(913, 'Cimitarra'),
(914, 'Concepción'),
(915, 'Confines'),
(916, 'Contratación'),
(917, 'Coromoro'),
(918, 'Curití'),
(919, 'El Carmen'),
(920, 'El Guacamayo'),
(921, 'El Peñon'),
(922, 'El Playón'),
(923, 'Encino'),
(924, 'Enciso'),
(925, 'Floridablanca'),
(926, 'Florián'),
(927, 'Galán'),
(928, 'Girón'),
(929, 'Guaca'),
(930, 'Guadalupe'),
(931, 'Guapota'),
(932, 'Guavatá'),
(933, 'Guepsa'),
(934, 'Gámbita'),
(935, 'Hato'),
(936, 'Jesús María'),
(937, 'Jordán'),
(938, 'La Belleza'),
(939, 'La Paz'),
(940, 'Landázuri'),
(941, 'Lebrija'),
(942, 'Los Santos'),
(943, 'Macaravita'),
(944, 'Matanza'),
(945, 'Mogotes'),
(946, 'Molagavita'),
(947, 'Málaga'),
(948, 'Ocamonte'),
(949, 'Oiba'),
(950, 'Onzaga'),
(951, 'Palmar'),
(952, 'Palmas del Socorro'),
(953, 'Pie de Cuesta'),
(954, 'Pinchote'),
(955, 'Puente Nacional'),
(956, 'Puerto Parra'),
(957, 'Puerto Wilches'),
(958, 'Páramo'),
(959, 'Rio Negro'),
(960, 'Sabana de Torres'),
(961, 'San Andrés'),
(962, 'San Benito'),
(963, 'San Gíl'),
(964, 'San Joaquín'),
(965, 'San José de Miranda'),
(966, 'San Miguel'),
(967, 'San Vicente del Chucurí'),
(968, 'Santa Bárbara'),
(969, 'Santa Helena del Opón'),
(970, 'Simacota'),
(971, 'Socorro'),
(972, 'Suaita'),
(973, 'Sucre'),
(974, 'Suratá'),
(975, 'Tona'),
(976, 'Valle de San José'),
(977, 'Vetas'),
(978, 'Villanueva'),
(979, 'Vélez'),
(980, 'Zapatoca'),
(981, 'Buenavista'),
(982, 'Caimito'),
(983, 'Chalán'),
(984, 'Colosó (Ricaurte)'),
(985, 'Corozal'),
(986, 'Coveñas'),
(987, 'El Roble'),
(988, 'Galeras (Nueva Granada)'),
(989, 'Guaranda'),
(990, 'La Unión'),
(991, 'Los Palmitos'),
(992, 'Majagual'),
(993, 'Morroa'),
(994, 'Ovejas'),
(995, 'Palmito'),
(996, 'Sampués'),
(997, 'San Benito Abad'),
(998, 'San Juan de Betulia'),
(999, 'San Marcos'),
(1000, 'San Onofre'),
(1001, 'San Pedro'),
(1002, 'Sincelejo'),
(1003, 'Sincé'),
(1004, 'Sucre'),
(1005, 'Tolú'),
(1006, 'Tolú Viejo'),
(1007, 'Alpujarra'),
(1008, 'Alvarado'),
(1009, 'Ambalema'),
(1010, 'Anzoátegui'),
(1011, 'Armero (Guayabal)'),
(1012, 'Ataco'),
(1013, 'Cajamarca'),
(1014, 'Carmen de Apicalá'),
(1015, 'Casabianca'),
(1016, 'Chaparral'),
(1017, 'Coello'),
(1018, 'Coyaima'),
(1019, 'Cunday'),
(1020, 'Dolores'),
(1021, 'Espinal'),
(1022, 'Falan'),
(1023, 'Flandes'),
(1024, 'Fresno'),
(1025, 'Guamo'),
(1026, 'Herveo'),
(1027, 'Honda'),
(1028, 'Ibagué'),
(1029, 'Icononzo'),
(1030, 'Lérida'),
(1031, 'Líbano'),
(1032, 'Mariquita'),
(1033, 'Melgar'),
(1034, 'Murillo'),
(1035, 'Natagaima'),
(1036, 'Ortega'),
(1037, 'Palocabildo'),
(1038, 'Piedras'),
(1039, 'Planadas'),
(1040, 'Prado'),
(1041, 'Purificación'),
(1042, 'Rioblanco'),
(1043, 'Roncesvalles'),
(1044, 'Rovira'),
(1045, 'Saldaña'),
(1046, 'San Antonio'),
(1047, 'San Luis'),
(1048, 'Santa Isabel'),
(1049, 'Suárez'),
(1050, 'Valle de San Juan'),
(1051, 'Venadillo'),
(1052, 'Villahermosa'),
(1053, 'Villarrica'),
(1054, 'Alcalá'),
(1055, 'Andalucía'),
(1056, 'Ansermanuevo'),
(1057, 'Argelia'),
(1058, 'Bolívar'),
(1059, 'Buenaventura'),
(1060, 'Buga'),
(1061, 'Bugalagrande'),
(1062, 'Caicedonia'),
(1063, 'Calima (Darién)'),
(1064, 'Calí'),
(1065, 'Candelaria'),
(1066, 'Cartago'),
(1067, 'Dagua'),
(1068, 'El Cairo'),
(1069, 'El Cerrito'),
(1070, 'El Dovio'),
(1071, 'El Águila'),
(1072, 'Florida'),
(1073, 'Ginebra'),
(1074, 'Guacarí'),
(1075, 'Jamundí'),
(1076, 'La Cumbre'),
(1077, 'La Unión'),
(1078, 'La Victoria'),
(1079, 'Obando'),
(1080, 'Palmira'),
(1081, 'Pradera'),
(1082, 'Restrepo'),
(1083, 'Riofrío'),
(1084, 'Roldanillo'),
(1085, 'San Pedro'),
(1086, 'Sevilla'),
(1087, 'Toro'),
(1088, 'Trujillo'),
(1089, 'Tulúa'),
(1090, 'Ulloa'),
(1091, 'Versalles'),
(1092, 'Vijes'),
(1093, 'Yotoco'),
(1094, 'Yumbo'),
(1095, 'Zarzal'),
(1096, 'Carurú'),
(1097, 'Mitú'),
(1098, 'Taraira'),
(1099, 'Cumaribo'),
(1100, 'La Primavera'),
(1101, 'Puerto Carreño'),
(1102, 'Santa Rosalía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivo`
--

CREATE TABLE `consecutivo` (
  `id` int(11) NOT NULL,
  `Tipo_consecutivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Consecutivo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `año` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consecutivo`
--

INSERT INTO `consecutivo` (`id`, `Tipo_consecutivo`, `Consecutivo`, `año`) VALUES
(1, 'CP', '1080', 2024),
(2, 'MR', '30', 2022),
(3, 'MC', '69', 2024),
(4, 'MA', '131', 2024),
(5, 'IS', '190', 2024),
(6, 'CA', '62', 2024),
(7, 'EC', '48', 2024),
(8, 'IC', '50', 2024),
(9, 'AD', '52', 2024),
(10, 'TC', '39', 2024),
(11, 'SP', '18', 2024),
(12, 'AL', '144', 2024),
(13, 'CM', '17', 2024),
(14, 'TV', '30', 2023),
(15, '', '23', 2024);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(5) NOT NULL,
  `id_categoria` int(5) NOT NULL,
  `id_subcategoria` int(5) NOT NULL,
  `nom_curso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1200) COLLATE utf8_spanish_ci NOT NULL,
  `total_horas` int(5) NOT NULL,
  `activo` int(5) DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'img/foto.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `id_categoria`, `id_subcategoria`, `nom_curso`, `descripcion`, `total_horas`, `activo`, `imagen`) VALUES
(2, 1, 1, 'MECÁNICA BÁSICA', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li style=\"text-align: left;\">Fotocopia de la licencia de conducci&oacute;n</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(11, 1, 2, 'ATENCIÓN AL CLIENTE', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(13, 1, 2, 'CONTROL Y MANEJO DE EMERGENCIAS VIALES', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li>Fotocopia de la licencia de conducci&oacute;n</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(15, 1, 3, 'OPERARIO DE MONTACARGAS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(16, 1, 3, 'OPERADOR DE ESTIBA ELÉCTRICA Y MANUAL', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(17, 1, 4, 'OPERADOR DE MAQUINARIA AMARILLA', '', 16, 0, 'img/foto.jpg'),
(18, 2, 5, 'INVESTIGACIÓN DE ACCIDENTES DE TRABAJO', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(20, 2, 5, 'SOPORTE VITAL EN TRAUMA', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(23, 2, 6, 'RESCATE BÁSICO EN ALTURAS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li style=\"text-align: left;\">Certificado de curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(24, 2, 6, 'RESCATE AVANZADO EN ALTURAS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li>Certificado de Curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n<li>Certificado del Curso B&aacute;sico en Rescate en Alturas</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(27, 2, 7, 'BÁSICO EN TRABAJO SEGURO EN ESPACIOS CONFINADOS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li style=\"text-align: left;\">Certificado de Curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(28, 2, 7, 'AVANZADO EN TRABAJO SEGURO EN ESPACIOS CONFINADOS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul style=\"text-align: left;\">\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li>Certificado de Curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n<li>Certificado del Curso B&aacute;sico en Trabajo en Espacios Confinados</li>\r\n</ul>', 24, 1, 'img/foto.jpg'),
(31, 2, 8, 'NORMAS DE SEGURIDAD EN MANEJO DE CARGAS, AMARRES Y APAREJOS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(35, 2, 9, 'INSPECTOR DE ANDAMIO', '<p style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li style=\"text-align: left;\">Certificado de Curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n<li style=\"text-align: left;\">Certificado del Curso B&aacute;sico de Armador de Andamio</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(36, 2, 9, 'RESCATE EN ANDAMIOS Y ESCALERAS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n<li style=\"text-align: left;\">Certificado de Curso de Alturas Nivel Avanzado o Rentrenamiento Vigente</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(38, 2, 10, 'TRABAJO SEGURO CON SOLDADURA', '<p class=\"MsoNormal\" style=\"text-align: center;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'img/foto.jpg'),
(40, 2, 10, 'SUPERVISIÓN DE TRABAJOS CRÍTICOS', '<p class=\"MsoNormal\" style=\"text-align: center;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(41, 2, 11, 'PRIMERA RESPUESTA A INCIDENTES CON MATERIALES PELIGROSOS ', '<p class=\"MsoNormal\" style=\"text-align: center;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 24, 1, 'img/foto.jpg'),
(42, 2, 11, 'PROCEDIMIENTO OPERATIVO NORMALIZADO', '<p class=\"MsoNormal\" style=\"text-align: center;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 16, 1, 'img/foto.jpg'),
(46, 4, 12, 'AVANZADO TRABAJO SEGURO EN ALTURAS', '', 40, 1, 'img/foto.jpg'),
(47, 1, 13, 'MANEJO DEFENSIVO Y PREVENTIVO EN CONDICIÓN DE MOTO', '', 8, 1, 'img/foto.jpg'),
(48, 1, 13, 'MECÁNICA BÁSICA DE MOTO', '', 8, 1, 'img/foto.jpg'),
(57, 2, 15, 'SOSTENIMIENTO DE MINAS BAJO TIERRA', '<p class=\"MsoNormal\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 40, 1, 'imagenes/'),
(58, 2, 15, 'SEGURIDAD Y SALUD EN EL TRABAJO EN LABORES MINERAS SUBTERRANEAS', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 40, 1, 'imagenes/'),
(63, 1, 1, 'SEGURIDAD VIAL', '<p class=\"MsoNormal\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li>Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'imagenes/'),
(64, 1, 4, 'DE OPERACIÓN SEGURA DE EXCAVADORA TIPO PAJARITA', '<p class=\"MsoNormal\" style=\"text-align: left;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 40, 1, 'imagenes/'),
(67, 1, 5, 'PRIMEROS AUXILIOS', '<p class=\"MsoNormal\" style=\"text-align: center;\"><strong>REQUISITOS</strong></p>\r\n<ul>\r\n<li style=\"text-align: left;\">Fotocopia de la c&eacute;dula de ciudadan&iacute;a</li>\r\n</ul>', 8, 1, 'imagenes/'),
(76, 3, 16, 'MANEJO Y DESINFECCIÓN CONTRA EL COVID-19', '', 10, 1, 'img/foto.jpg'),
(86, 1, 14, 'AUXILIAR REGULADOR DE TRÁFICO', '', 30, 1, 'imagenes/'),
(93, 4, 6, 'RESCATE TÉCNICO EN ALTURAS NIVEL AVANZADO', '', 40, 1, 'imagenes/'),
(107, 1, 1, 'DIPLOMADO EN SEGURIDAD VIAL', '', 200, 0, 'imagenes/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `IdEmpresa` int(11) NOT NULL,
  `NombreEmpresa` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Nit` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `ActividadEconomica` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoCorporativo` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NombreContacto` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NumeroContacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoContacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `RepresentanteLegal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `activo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`IdEmpresa`, `NombreEmpresa`, `Nit`, `ActividadEconomica`, `Direccion`, `CorreoCorporativo`, `NombreContacto`, `NumeroContacto`, `CorreoContacto`, `RepresentanteLegal`, `activo`) VALUES
(1, 'Automotriz S.A.', '800123456-7', 'Reparación de vehículos', 'Calle 45 # 12-34', 'contacto@automotriz.com', 'Juan Pérez', '3001234567', 'juan@automotriz.com', 'oberto Sánchez', '0'),
(2, 'Equipos Industriales S.A.', '900987654-1', 'Fabricación de maquinaria', 'Avenida 68 # 25-67', 'info@equiposindustriales.com', 'Carlos Gómez', '3109876543', 'carlos@equipos.com', 'Marta Cruz', '0'),
(3, 'Transportes Rápidos', '801234567-8', 'Transporte terrestre', 'Carrera 23 # 67-89', 'transporte@rapidos.com', 'Andrés Rodrígue', '3112345678', 'andres@transportes.com', 'Felipe Díaz', '0'),
(4, 'Construcción y Obras', '801345678-9', 'Construcción de obras', 'Calle 32 # 14-89', 'construccion@obras.com', 'Beatriz Fernández', '3209876543', 'beatriz@construccion.com', 'Laura Martínez', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `independiente`
--

CREATE TABLE `independiente` (
  `id_ind` int(11) NOT NULL,
  `num_doc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Empresatrabaja` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `CiudadResidencia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `id_curso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `independiente`
--

INSERT INTO `independiente` (`id_ind`, `num_doc`, `Empresatrabaja`, `CiudadResidencia`, `Cargo`, `tel`, `email`, `id_curso`) VALUES
(1, '1023456789', '', 'MEDELLÍN', 'COORDINADORA DE SEGURIDAD', '3001234567', 'maria@correo.com', 63),
(2, '1045678901', '', 'BOGOTÁ D.C.', 'ASESORA DE SEGURIDAD', '3101234567', 'laura@correo.com', 24),
(3, '1067890123', '', 'BARRANQUILLA', 'TECNICA EN ELECTRICIDAD', '3209876543', 'beatriz@correo.com', 76),
(4, '1089012345', '', 'MEDELLÍN', 'CONSULTORA EN SEGURIDAD VIAL', '3007654321', 'ana@correo.com', 35),
(5, '1101234567', '', 'BOGOTÁ D.C.', 'COORDINADORA DE EMERGENCIAS', '3112345678', 'marta@correo.com', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(5) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `nom_subcategoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id_subcategoria`, `id_categoria`, `nom_subcategoria`) VALUES
(1, 1, 'CAPACITACIONES A CONDUCTORES PROFESIONALES'),
(2, 1, 'MONITOR DE RUTA ESCOLAR Y/O EMPRESARIAL'),
(3, 1, 'MONTACARGUISTA'),
(4, 1, 'OPERADORES DE MAQUINA AMARILLA'),
(5, 2, 'CURSOS PARA PERSONAL SST'),
(6, 2, 'CURSOS EN CONDICIÓN DE ALTURAS'),
(7, 2, 'CURSOS DE ESPACIOS CONFINADOS'),
(8, 2, 'CURSOS DE IZAJES Y LEVANTAMIENTO DE CARGAS'),
(9, 2, 'CURSOS DE ANDAMIOS'),
(10, 2, 'CURSOS DE TRABAJO EN CALIENTE Y ELÉCTRICOS'),
(11, 2, 'CURSOS DE TRABAJO CON SUSTANCIAS PELIGROSAS'),
(12, 4, 'CURSOS DE ALTURAS'),
(13, 1, 'CONDUCTORES DE MOTOS'),
(14, 1, 'TECNICOS Y ESCOLTAS VIALES'),
(15, 2, 'SEGURIDAD EN MINAS'),
(16, 3, 'COVID');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_doc` int(11) NOT NULL,
  `tipo_doc` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `abrev_doc` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_doc`, `tipo_doc`, `abrev_doc`) VALUES
(1, 'CEDULA', 'CC'),
(2, 'PASAPORTE', 'PAS'),
(3, 'CEDULA DE EXTRANJERIA', 'CE'),
(4, 'VISA', 'VISA'),
(5, 'PERMISO ESPECIAL DE PERMANENCIA', 'PEP'),
(6, 'PERMISO POR PROTECCION TEMPORAL', 'PPT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultacces` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `nombre`, `contra`, `nivel`, `ip`, `ultacces`) VALUES
(3, 'lupi', 'Luisa Rojas', '0b55b7d4723f7e4f2451523f21a3f11b58cb2e40', 'a', '::1', '2024-11-14 20:45:51'),
(11, 'empleado', 'empleado', 'f9f011a553550aef31a8ee2690e1d1b5f261c9ff', 'P', '::1', '2024-11-14 19:48:45'),
(12, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'a', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `independiente`
--
ALTER TABLE `independiente`
  ADD PRIMARY KEY (`id_ind`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1103;

--
-- AUTO_INCREMENT de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `independiente`
--
ALTER TABLE `independiente`
  MODIFY `id_ind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id_subcategoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
