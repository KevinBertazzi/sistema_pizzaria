-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_pizzaria
CREATE DATABASE IF NOT EXISTS `db_pizzaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_pizzaria`;

-- Copiando estrutura para tabela db_pizzaria.tb_fornecedor
CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `produto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_pizzaria.tb_fornecedor: ~5 rows (aproximadamente)
INSERT INTO `tb_fornecedor` (`id`, `nome`, `telefone`, `email`, `produto`) VALUES
	(8, 'João', '19 90409409', 'joão_ribeiro@hotmail.com', 'molhos'),
	(9, 'Chico Queijada', '19 90409409', 'chicaoquejao@gmail.com', 'queijos em geral'),
	(10, 'Matue', '19 90709409', 'matutu@hotmail.com', 'cogumelos'),
	(11, 'Zé Galinho', '19 90309409', 'zezao_do_frango@hotmail.com', 'frango'),
	(12, 'Tonho Tomate', '19 96309409', 'tonho_pimentao@gmail.com', 'Vegetais');

-- Copiando estrutura para tabela db_pizzaria.tb_funcionario
CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_pizzaria.tb_funcionario: ~3 rows (aproximadamente)
INSERT INTO `tb_funcionario` (`id`, `nome`, `email`, `telefone`) VALUES
	(5, 'João2', 'joão_ribeiro@hotmail.com', '19 90409409'),
	(6, 'Zé', 'ze_da_massa@gmail.com', '19 90409409'),
	(7, 'Renan', 'ze_da_massa@gmail.com', '19 90409409');

-- Copiando estrutura para tabela db_pizzaria.tb_pizza
CREATE TABLE IF NOT EXISTS `tb_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sabor` varchar(50) NOT NULL,
  `ingredinte` varchar(200) NOT NULL,
  `tamanho` char(1) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela db_pizzaria.tb_pizza: ~3 rows (aproximadamente)
INSERT INTO `tb_pizza` (`id`, `sabor`, `ingredinte`, `tamanho`, `valor`) VALUES
	(7, 'calabresa', 'calabresa, mussarela, cebola e massa de tomate', 'G', 50.45),
	(8, 'Frango', 'Frango desfiado, massa de tomate e mussarela  ', 'G', 49.90),
	(9, '4 queijos ', 'Massa de tomate, mussarela, catupiri, chedar e parmesão', 'G', 59.90);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
