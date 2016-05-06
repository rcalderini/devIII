-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.2.0.4981
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para desenv3
DROP DATABASE IF EXISTS `desenv3`;
CREATE DATABASE IF NOT EXISTS `desenv3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `desenv3`;


-- Copiando estrutura para tabela desenv3.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(160) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `id_menu_pai` int(11) DEFAULT NULL,
  `url` varchar(160) NOT NULL,
  `descricao` varchar(160) NOT NULL,
  `icone` varchar(160) NOT NULL DEFAULT ' icomoon-icon-file',
  PRIMARY KEY (`id_menu`),
  KEY `fk_menu_menu1_idx` (`id_menu_pai`),
  CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`id_menu_pai`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.menu_tipo_usuario
DROP TABLE IF EXISTS `menu_tipo_usuario`;
CREATE TABLE IF NOT EXISTS `menu_tipo_usuario` (
  `id_menu` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`,`id_tipo_usuario`),
  KEY `fk_menu_has_tipo_usuario_tipo_usuario1_idx` (`id_tipo_usuario`),
  KEY `fk_menu_has_tipo_usuario_menu1_idx` (`id_menu`),
  CONSTRAINT `fk_menu_has_tipo_usuario_menu1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_has_tipo_usuario_tipo_usuario1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.menu_tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_tipo_usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.pagamento
DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id_pedido` int(11) NOT NULL,
  `id_status_pagamento` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pagamento_status_pagamento1_idx` (`id_status_pagamento`),
  CONSTRAINT `fk_pagamento_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pagamento_status_pagamento1` FOREIGN KEY (`id_status_pagamento`) REFERENCES `status_pagamento` (`id_status_pagamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.pagamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.pedido
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_pedido_cliente1_idx` (`id_cliente`),
  CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.pedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.pedido_produto
DROP TABLE IF EXISTS `pedido_produto`;
CREATE TABLE IF NOT EXISTS `pedido_produto` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_produto`),
  KEY `fk_pedido_has_produto_produto1_idx` (`id_produto`),
  KEY `fk_pedido_has_produto_pedido1_idx` (`id_pedido`),
  CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.pedido_produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido_produto` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.produto
DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(160) NOT NULL,
  `valor` double NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.status_pagamento
DROP TABLE IF EXISTS `status_pagamento`;
CREATE TABLE IF NOT EXISTS `status_pagamento` (
  `id_status_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(60) NOT NULL,
  PRIMARY KEY (`id_status_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.status_pagamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `status_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_pagamento` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.tipo_usuario
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(60) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_atualizacao` datetime NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo`, `ativo`, `data_atualizacao`) VALUES
	(1, 'Administrador', 'S', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela desenv3.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `senha` text,
  `data_atualizacao` datetime NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_tipo_usuario1_idx` (`id_tipo_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela desenv3.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `nome`, `email`, `senha`, `data_atualizacao`, `ativo`) VALUES
	(1, 1, 'Roger William Calderini', 'roger_calderini@hotmail.com', 'tonZdWyW4mY9qS7xIKd3VvwWH5DfgZkr/UJAi4nbCNkCTmVgISWFQHiXsMIWyf25qo6ty7IREDWK6ev40FpITg==', '2016-04-02 13:04:56', 'S'),
	(2, 1, 'Rafael', 'rafael@hotmail.com', 'tonZdWyW4mY9qS7xIKd3VvwWH5DfgZkr/UJAi4nbCNkCTmVgISWFQHiXsMIWyf25qo6ty7IREDWK6ev40FpITg==', '2016-04-02 13:04:56', 'S');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

INSERT INTO `menu` (`id_menu`, `menu`, `id_menu_pai`, `url`, `descricao`, `icone`) VALUES (1, 'Cadastro', NULL, '#', 'Cadastros em geral', ' icomoon-icon-file');
INSERT INTO `menu` (`id_menu`, `menu`, `id_menu_pai`, `url`, `descricao`, `icone`) VALUES (5, 'Usuários', 1, 'usuario', 'Cadastros de Usuários', ' icomoon-icon-file');
INSERT INTO `menu` (`id_menu`, `menu`, `id_menu_pai`, `url`, `descricao`, `icone`) VALUES (6, 'Tipo Usuário', 1, 'tipo_usuario', 'Cadastro de Tipo Usuários', ' icomoon-icon-file');
INSERT INTO `menu` (`id_menu`, `menu`, `id_menu_pai`, `url`, `descricao`, `icone`) VALUES (12, 'Menu', 1, 'menu', 'Gerenciar Menus', ' icomoon-icon-file');

INSERT INTO menu_tipo_usuario (id_menu,id_tipo_usuario) select id_menu,id_tipo_usuario from menu, tipo_usuario;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
