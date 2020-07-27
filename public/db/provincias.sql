/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias` (
  `id_provincia` smallint DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `provincias` (`id_provincia`, `provincia`) VALUES
('2', 'Albacete'),
('3', 'Alicante'),
('4', 'Almería'),
('1', 'Araba/Álava'),
('33', 'Asturias'),
('5', 'Ávila'),
('6', 'Badajoz'),
('7', 'Balears (Illes)'),
('8', 'Barcelona'),
('48', 'Vizcaya'),
('9', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('39', 'Cantabria'),
('12', 'Castellón / Castelló'),
('51', 'Ceuta'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('20', 'Guipúzcoa'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('27', 'Lugo'),
('25', 'Lleida'),
('28', 'Madrid'),
('29', 'Málaga'),
('52', 'Melilla'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('26', 'Rioja, La'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia / València'),
('47', 'Valladolid'),
('49', 'Zamora'),
('50', 'Zaragoza');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;