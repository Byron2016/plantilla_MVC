-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-01-2017 a las 03:14:49
-- Versión del servidor: 5.6.30
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(10) unsigned NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pais` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
;
--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `ciudad`, `pais`) VALUES
(1, 'ciudad 1_1', 1),
(2, 'ciudad 2_2', 2),
(3, 'ciudad 3_1', 1),
(4, 'ciudad 4_2', 4);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(10) unsigned NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais`) VALUES
(1, 'pais 1'),
(2, 'pais 2'),
(3, 'pais 3'),
(4, 'pais 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(100) CHARACTER SET utf8 NOT NULL,
  `key` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`, `key`) VALUES
(1, 'Tareas de administración', 'admin_access'),
(2, 'Agregar Posts', 'nuevo_post'),
(3, 'Editar Posts', 'editar_post'),
(4, 'Eliminar Posts', 'eliminar_post');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_role`
--

CREATE TABLE IF NOT EXISTS `permisos_role` (
  `role` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos_role`
--

INSERT INTO `permisos_role` (`role`, `permiso`, `valor`) VALUES
(1, 1, 1),
(1, 2, 0),
(1, 3, 1),
(1, 4, 0),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(3, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usuario`
--

CREATE TABLE IF NOT EXISTS `permisos_usuario` (
  `usuario` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permisos_usuario`
--

INSERT INTO `permisos_usuario` (`usuario`, `permiso`, `valor`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) CHARACTER SET utf8 NOT NULL,
  `cuerpo` text CHARACTER SET utf8 NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `cuerpo`, `imagen`) VALUES
(1, 'Tareas de administración', 'admin_access', NULL),
(2, 'Agregar Posts', 'nuevo_post', NULL),
(3, 'Editar Posts', 'editar_post', NULL),
(4, 'Eliminar Posts', 'eliminar_post', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `nombre`) VALUES
(1, 'nombre 0'),
(2, 'nombre 1'),
(3, 'nombre 2'),
(4, 'nombre 3'),
(5, 'nombre 4'),
(6, 'nombre 5'),
(7, 'nombre 6'),
(8, 'nombre 7'),
(9, 'nombre 8'),
(10, 'nombre 9'),
(11, 'nombre 10'),
(12, 'nombre 11'),
(13, 'nombre 12'),
(14, 'nombre 13'),
(15, 'nombre 14'),
(16, 'nombre 15'),
(17, 'nombre 16'),
(18, 'nombre 17'),
(19, 'nombre 18'),
(20, 'nombre 19'),
(21, 'nombre 20'),
(22, 'nombre 21'),
(23, 'nombre 22'),
(24, 'nombre 23'),
(25, 'nombre 24'),
(26, 'nombre 25'),
(27, 'nombre 26'),
(28, 'nombre 27'),
(29, 'nombre 28'),
(30, 'nombre 29'),
(31, 'nombre 30'),
(32, 'nombre 31'),
(33, 'nombre 32'),
(34, 'nombre 33'),
(35, 'nombre 34'),
(36, 'nombre 35'),
(37, 'nombre 36'),
(38, 'nombre 37'),
(39, 'nombre 38'),
(40, 'nombre 39'),
(41, 'nombre 40'),
(42, 'nombre 41'),
(43, 'nombre 42'),
(44, 'nombre 43'),
(45, 'nombre 44'),
(46, 'nombre 45'),
(47, 'nombre 46'),
(48, 'nombre 47'),
(49, 'nombre 48'),
(50, 'nombre 49'),
(51, 'nombre 50'),
(52, 'nombre 51'),
(53, 'nombre 52'),
(54, 'nombre 53'),
(55, 'nombre 54'),
(56, 'nombre 55'),
(57, 'nombre 56'),
(58, 'nombre 57'),
(59, 'nombre 58'),
(60, 'nombre 59'),
(61, 'nombre 60'),
(62, 'nombre 61'),
(63, 'nombre 62'),
(64, 'nombre 63'),
(65, 'nombre 64'),
(66, 'nombre 65'),
(67, 'nombre 66'),
(68, 'nombre 67'),
(69, 'nombre 68'),
(70, 'nombre 69'),
(71, 'nombre 70'),
(72, 'nombre 71'),
(73, 'nombre 72'),
(74, 'nombre 73'),
(75, 'nombre 74'),
(76, 'nombre 75'),
(77, 'nombre 76'),
(78, 'nombre 77'),
(79, 'nombre 78'),
(80, 'nombre 79'),
(81, 'nombre 80'),
(82, 'nombre 81'),
(83, 'nombre 82'),
(84, 'nombre 83'),
(85, 'nombre 84'),
(86, 'nombre 85'),
(87, 'nombre 86'),
(88, 'nombre 87'),
(89, 'nombre 88'),
(90, 'nombre 89'),
(91, 'nombre 90'),
(92, 'nombre 91'),
(93, 'nombre 92'),
(94, 'nombre 93'),
(95, 'nombre 94'),
(96, 'nombre 95'),
(97, 'nombre 96'),
(98, 'nombre 97'),
(99, 'nombre 98'),
(100, 'nombre 99'),
(101, 'nombre 100'),
(102, 'nombre 101'),
(103, 'nombre 102'),
(104, 'nombre 103'),
(105, 'nombre 104'),
(106, 'nombre 105'),
(107, 'nombre 106'),
(108, 'nombre 107'),
(109, 'nombre 108'),
(110, 'nombre 109'),
(111, 'nombre 110'),
(112, 'nombre 111'),
(113, 'nombre 112'),
(114, 'nombre 113'),
(115, 'nombre 114'),
(116, 'nombre 115'),
(117, 'nombre 116'),
(118, 'nombre 117'),
(119, 'nombre 118'),
(120, 'nombre 119'),
(121, 'nombre 120'),
(122, 'nombre 121'),
(123, 'nombre 122'),
(124, 'nombre 123'),
(125, 'nombre 124'),
(126, 'nombre 125'),
(127, 'nombre 126'),
(128, 'nombre 127'),
(129, 'nombre 128'),
(130, 'nombre 129'),
(131, 'nombre 130'),
(132, 'nombre 131'),
(133, 'nombre 132'),
(134, 'nombre 133'),
(135, 'nombre 134'),
(136, 'nombre 135'),
(137, 'nombre 136'),
(138, 'nombre 137'),
(139, 'nombre 138'),
(140, 'nombre 139'),
(141, 'nombre 140'),
(142, 'nombre 141'),
(143, 'nombre 142'),
(144, 'nombre 143'),
(145, 'nombre 144'),
(146, 'nombre 145'),
(147, 'nombre 146'),
(148, 'nombre 147'),
(149, 'nombre 148'),
(150, 'nombre 149'),
(151, 'nombre 150'),
(152, 'nombre 151'),
(153, 'nombre 152'),
(154, 'nombre 153'),
(155, 'nombre 154'),
(156, 'nombre 155'),
(157, 'nombre 156'),
(158, 'nombre 157'),
(159, 'nombre 158'),
(160, 'nombre 159'),
(161, 'nombre 160'),
(162, 'nombre 161'),
(163, 'nombre 162'),
(164, 'nombre 163'),
(165, 'nombre 164'),
(166, 'nombre 165'),
(167, 'nombre 166'),
(168, 'nombre 167'),
(169, 'nombre 168'),
(170, 'nombre 169'),
(171, 'nombre 170'),
(172, 'nombre 171'),
(173, 'nombre 172'),
(174, 'nombre 173'),
(175, 'nombre 174'),
(176, 'nombre 175'),
(177, 'nombre 176'),
(178, 'nombre 177'),
(179, 'nombre 178'),
(180, 'nombre 179'),
(181, 'nombre 180'),
(182, 'nombre 181'),
(183, 'nombre 182'),
(184, 'nombre 183'),
(185, 'nombre 184'),
(186, 'nombre 185'),
(187, 'nombre 186'),
(188, 'nombre 187'),
(189, 'nombre 188'),
(190, 'nombre 189'),
(191, 'nombre 190'),
(192, 'nombre 191'),
(193, 'nombre 192'),
(194, 'nombre 193'),
(195, 'nombre 194'),
(196, 'nombre 195'),
(197, 'nombre 196'),
(198, 'nombre 197'),
(199, 'nombre 198'),
(200, 'nombre 199'),
(201, 'nombre 200'),
(202, 'nombre 201'),
(203, 'nombre 202'),
(204, 'nombre 203'),
(205, 'nombre 204'),
(206, 'nombre 205'),
(207, 'nombre 206'),
(208, 'nombre 207'),
(209, 'nombre 208'),
(210, 'nombre 209'),
(211, 'nombre 210'),
(212, 'nombre 211'),
(213, 'nombre 212'),
(214, 'nombre 213'),
(215, 'nombre 214'),
(216, 'nombre 215'),
(217, 'nombre 216'),
(218, 'nombre 217'),
(219, 'nombre 218'),
(220, 'nombre 219'),
(221, 'nombre 220'),
(222, 'nombre 221'),
(223, 'nombre 222'),
(224, 'nombre 223'),
(225, 'nombre 224'),
(226, 'nombre 225'),
(227, 'nombre 226'),
(228, 'nombre 227'),
(229, 'nombre 228'),
(230, 'nombre 229'),
(231, 'nombre 230'),
(232, 'nombre 231'),
(233, 'nombre 232'),
(234, 'nombre 233'),
(235, 'nombre 234'),
(236, 'nombre 235'),
(237, 'nombre 236'),
(238, 'nombre 237'),
(239, 'nombre 238'),
(240, 'nombre 239'),
(241, 'nombre 240'),
(242, 'nombre 241'),
(243, 'nombre 242'),
(244, 'nombre 243'),
(245, 'nombre 244'),
(246, 'nombre 245'),
(247, 'nombre 246'),
(248, 'nombre 247'),
(249, 'nombre 248'),
(250, 'nombre 249'),
(251, 'nombre 250'),
(252, 'nombre 251'),
(253, 'nombre 252'),
(254, 'nombre 253'),
(255, 'nombre 254'),
(256, 'nombre 255'),
(257, 'nombre 256'),
(258, 'nombre 257'),
(259, 'nombre 258'),
(260, 'nombre 259'),
(261, 'nombre 260'),
(262, 'nombre 261'),
(263, 'nombre 262'),
(264, 'nombre 263'),
(265, 'nombre 264'),
(266, 'nombre 265'),
(267, 'nombre 266'),
(268, 'nombre 267'),
(269, 'nombre 268'),
(270, 'nombre 269'),
(271, 'nombre 270'),
(272, 'nombre 271'),
(273, 'nombre 272'),
(274, 'nombre 273'),
(275, 'nombre 274'),
(276, 'nombre 275'),
(277, 'nombre 276'),
(278, 'nombre 277'),
(279, 'nombre 278'),
(280, 'nombre 279'),
(281, 'nombre 280'),
(282, 'nombre 281'),
(283, 'nombre 282'),
(284, 'nombre 283'),
(285, 'nombre 284'),
(286, 'nombre 285'),
(287, 'nombre 286'),
(288, 'nombre 287'),
(289, 'nombre 288'),
(290, 'nombre 289'),
(291, 'nombre 290'),
(292, 'nombre 291'),
(293, 'nombre 292'),
(294, 'nombre 293'),
(295, 'nombre 294'),
(296, 'nombre 295'),
(297, 'nombre 296'),
(298, 'nombre 297'),
(299, 'nombre 298'),
(300, 'nombre 299'),
(301, 'nombre 0'),
(302, 'nombre 1'),
(303, 'nombre 2'),
(304, 'nombre 3'),
(305, 'nombre 4'),
(306, 'nombre 5'),
(307, 'nombre 6'),
(308, 'nombre 7'),
(309, 'nombre 8'),
(310, 'nombre 9'),
(311, 'nombre 10'),
(312, 'nombre 11'),
(313, 'nombre 12'),
(314, 'nombre 13'),
(315, 'nombre 14'),
(316, 'nombre 15'),
(317, 'nombre 16'),
(318, 'nombre 17'),
(319, 'nombre 18'),
(320, 'nombre 19'),
(321, 'nombre 20'),
(322, 'nombre 21'),
(323, 'nombre 22'),
(324, 'nombre 23'),
(325, 'nombre 24'),
(326, 'nombre 25'),
(327, 'nombre 26'),
(328, 'nombre 27'),
(329, 'nombre 28'),
(330, 'nombre 29'),
(331, 'nombre 30'),
(332, 'nombre 31'),
(333, 'nombre 32'),
(334, 'nombre 33'),
(335, 'nombre 34'),
(336, 'nombre 35'),
(337, 'nombre 36'),
(338, 'nombre 37'),
(339, 'nombre 38'),
(340, 'nombre 39'),
(341, 'nombre 40'),
(342, 'nombre 41'),
(343, 'nombre 42'),
(344, 'nombre 43'),
(345, 'nombre 44'),
(346, 'nombre 45'),
(347, 'nombre 46'),
(348, 'nombre 47'),
(349, 'nombre 48'),
(350, 'nombre 49'),
(351, 'nombre 50'),
(352, 'nombre 51'),
(353, 'nombre 52'),
(354, 'nombre 53'),
(355, 'nombre 54'),
(356, 'nombre 55'),
(357, 'nombre 56'),
(358, 'nombre 57'),
(359, 'nombre 58'),
(360, 'nombre 59'),
(361, 'nombre 60'),
(362, 'nombre 61'),
(363, 'nombre 62'),
(364, 'nombre 63'),
(365, 'nombre 64'),
(366, 'nombre 65'),
(367, 'nombre 66'),
(368, 'nombre 67'),
(369, 'nombre 68'),
(370, 'nombre 69'),
(371, 'nombre 70'),
(372, 'nombre 71'),
(373, 'nombre 72'),
(374, 'nombre 73'),
(375, 'nombre 74'),
(376, 'nombre 75'),
(377, 'nombre 76'),
(378, 'nombre 77'),
(379, 'nombre 78'),
(380, 'nombre 79'),
(381, 'nombre 80'),
(382, 'nombre 81'),
(383, 'nombre 82'),
(384, 'nombre 83'),
(385, 'nombre 84'),
(386, 'nombre 85'),
(387, 'nombre 86'),
(388, 'nombre 87'),
(389, 'nombre 88'),
(390, 'nombre 89'),
(391, 'nombre 90'),
(392, 'nombre 91'),
(393, 'nombre 92'),
(394, 'nombre 93'),
(395, 'nombre 94'),
(396, 'nombre 95'),
(397, 'nombre 96'),
(398, 'nombre 97'),
(399, 'nombre 98'),
(400, 'nombre 99'),
(401, 'nombre 100'),
(402, 'nombre 101'),
(403, 'nombre 102'),
(404, 'nombre 103'),
(405, 'nombre 104'),
(406, 'nombre 105'),
(407, 'nombre 106'),
(408, 'nombre 107'),
(409, 'nombre 108'),
(410, 'nombre 109'),
(411, 'nombre 110'),
(412, 'nombre 111'),
(413, 'nombre 112'),
(414, 'nombre 113'),
(415, 'nombre 114'),
(416, 'nombre 115'),
(417, 'nombre 116'),
(418, 'nombre 117'),
(419, 'nombre 118'),
(420, 'nombre 119'),
(421, 'nombre 120'),
(422, 'nombre 121'),
(423, 'nombre 122'),
(424, 'nombre 123'),
(425, 'nombre 124'),
(426, 'nombre 125'),
(427, 'nombre 126'),
(428, 'nombre 127'),
(429, 'nombre 128'),
(430, 'nombre 129'),
(431, 'nombre 130'),
(432, 'nombre 131'),
(433, 'nombre 132'),
(434, 'nombre 133'),
(435, 'nombre 134'),
(436, 'nombre 135'),
(437, 'nombre 136'),
(438, 'nombre 137'),
(439, 'nombre 138'),
(440, 'nombre 139'),
(441, 'nombre 140'),
(442, 'nombre 141'),
(443, 'nombre 142'),
(444, 'nombre 143'),
(445, 'nombre 144'),
(446, 'nombre 145'),
(447, 'nombre 146'),
(448, 'nombre 147'),
(449, 'nombre 148'),
(450, 'nombre 149'),
(451, 'nombre 150'),
(452, 'nombre 151'),
(453, 'nombre 152'),
(454, 'nombre 153'),
(455, 'nombre 154'),
(456, 'nombre 155'),
(457, 'nombre 156'),
(458, 'nombre 157'),
(459, 'nombre 158'),
(460, 'nombre 159'),
(461, 'nombre 160'),
(462, 'nombre 161'),
(463, 'nombre 162'),
(464, 'nombre 163'),
(465, 'nombre 164'),
(466, 'nombre 165'),
(467, 'nombre 166'),
(468, 'nombre 167'),
(469, 'nombre 168'),
(470, 'nombre 169'),
(471, 'nombre 170'),
(472, 'nombre 171'),
(473, 'nombre 172'),
(474, 'nombre 173'),
(475, 'nombre 174'),
(476, 'nombre 175'),
(477, 'nombre 176'),
(478, 'nombre 177'),
(479, 'nombre 178'),
(480, 'nombre 179'),
(481, 'nombre 180'),
(482, 'nombre 181'),
(483, 'nombre 182'),
(484, 'nombre 183'),
(485, 'nombre 184'),
(486, 'nombre 185'),
(487, 'nombre 186'),
(488, 'nombre 187'),
(489, 'nombre 188'),
(490, 'nombre 189'),
(491, 'nombre 190'),
(492, 'nombre 191'),
(493, 'nombre 192'),
(494, 'nombre 193'),
(495, 'nombre 194'),
(496, 'nombre 195'),
(497, 'nombre 196'),
(498, 'nombre 197'),
(499, 'nombre 198'),
(500, 'nombre 199'),
(501, 'nombre 200'),
(502, 'nombre 201'),
(503, 'nombre 202'),
(504, 'nombre 203'),
(505, 'nombre 204'),
(506, 'nombre 205'),
(507, 'nombre 206'),
(508, 'nombre 207'),
(509, 'nombre 208'),
(510, 'nombre 209'),
(511, 'nombre 210'),
(512, 'nombre 211'),
(513, 'nombre 212'),
(514, 'nombre 213'),
(515, 'nombre 214'),
(516, 'nombre 215'),
(517, 'nombre 216'),
(518, 'nombre 217'),
(519, 'nombre 218'),
(520, 'nombre 219'),
(521, 'nombre 220'),
(522, 'nombre 221'),
(523, 'nombre 222'),
(524, 'nombre 223'),
(525, 'nombre 224'),
(526, 'nombre 225'),
(527, 'nombre 226'),
(528, 'nombre 227'),
(529, 'nombre 228'),
(530, 'nombre 229'),
(531, 'nombre 230'),
(532, 'nombre 231'),
(533, 'nombre 232'),
(534, 'nombre 233'),
(535, 'nombre 234'),
(536, 'nombre 235'),
(537, 'nombre 236'),
(538, 'nombre 237'),
(539, 'nombre 238'),
(540, 'nombre 239'),
(541, 'nombre 240'),
(542, 'nombre 241'),
(543, 'nombre 242'),
(544, 'nombre 243'),
(545, 'nombre 244'),
(546, 'nombre 245'),
(547, 'nombre 246'),
(548, 'nombre 247'),
(549, 'nombre 248'),
(550, 'nombre 249'),
(551, 'nombre 250'),
(552, 'nombre 251'),
(553, 'nombre 252'),
(554, 'nombre 253'),
(555, 'nombre 254'),
(556, 'nombre 255'),
(557, 'nombre 256'),
(558, 'nombre 257'),
(559, 'nombre 258'),
(560, 'nombre 259'),
(561, 'nombre 260'),
(562, 'nombre 261'),
(563, 'nombre 262'),
(564, 'nombre 263'),
(565, 'nombre 264'),
(566, 'nombre 265'),
(567, 'nombre 266'),
(568, 'nombre 267'),
(569, 'nombre 268'),
(570, 'nombre 269'),
(571, 'nombre 270'),
(572, 'nombre 271'),
(573, 'nombre 272'),
(574, 'nombre 273'),
(575, 'nombre 274'),
(576, 'nombre 275'),
(577, 'nombre 276'),
(578, 'nombre 277'),
(579, 'nombre 278'),
(580, 'nombre 279'),
(581, 'nombre 280'),
(582, 'nombre 281'),
(583, 'nombre 282'),
(584, 'nombre 283'),
(585, 'nombre 284'),
(586, 'nombre 285'),
(587, 'nombre 286'),
(588, 'nombre 287'),
(589, 'nombre 288'),
(590, 'nombre 289'),
(591, 'nombre 290'),
(592, 'nombre 291'),
(593, 'nombre 292'),
(594, 'nombre 293'),
(595, 'nombre 294'),
(596, 'nombre 295'),
(597, 'nombre 296'),
(598, 'nombre 297'),
(599, 'nombre 298'),
(600, 'nombre 299');

update prueba set id_pais=1, id_ciudad = 1 where id between 1 and 75;
update prueba set id_pais=1, id_ciudad = 3 where id between 76 and 150;
  update prueba set id_pais=2, id_ciudad = 2 where id between 151 and 225;
update prueba set id_pais=2, id_ciudad = 4 where id > 225;

select r.*, p.pais, c.ciudad from prueba r, paises p, ciudades c 
where r.id_pais = p.id and r.id_ciudad = c.id;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Administrador'),
(2, 'Gestor'),
(3, 'Editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(4) unsigned NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `role` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `codigo` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `email`, `role`, `estado`, `fecha`, `codigo`) VALUES
(1, 'nombre1', 'admin', 'f554564b63bfebedb20dab6c1e81132a44580761', 'admin@amin.com', 1, 1, '2016-11-01 23:19:44', 1),
(2, 'nombre1', 'usuario1', 'f554564b63bfebedb20dab6c1e81132a44580761', 'admin@amin.com', 2, 1, '2016-11-01 23:19:44', 2),
(3, 'nombre1', 'usuario2', 'f554564b63bfebedb20dab6c1e81132a44580761', 'admin@amin.com', 3, 1, '2016-11-01 23:19:44', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permisos_role`
--
ALTER TABLE `permisos_role`
  ADD UNIQUE KEY `role` (`role`,`permiso`);

--
-- Indices de la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  ADD UNIQUE KEY `usuario` (`usuario`,`permiso`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
  MODIFY `usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=601;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
