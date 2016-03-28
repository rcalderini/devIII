-- --------------------------------------------------------
-- Servidor:                     mysql.rdfstands.com.br
-- Versão do servidor:           5.5.43-log - Source distribution
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.2.0.4981
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para rdfstands
DROP DATABASE IF EXISTS `rdfstands`;
CREATE DATABASE IF NOT EXISTS `rdfstands` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rdfstands`;


-- Copiando estrutura para tabela rdfstands.configuracao_sistema
DROP TABLE IF EXISTS `configuracao_sistema`;
CREATE TABLE IF NOT EXISTS `configuracao_sistema` (
  `id_configuracao_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `data_atulizacao` datetime DEFAULT NULL,
  PRIMARY KEY (`id_configuracao_sistema`),
  KEY `fk_configuracao_sistema_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_configuracao_sistema_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.configuracao_sistema: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracao_sistema` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracao_sistema` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.conta
DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id_conta` int(11) NOT NULL AUTO_INCREMENT,
  `conta` varchar(100) NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.conta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.custo_projeto
DROP TABLE IF EXISTS `custo_projeto`;
CREATE TABLE IF NOT EXISTS `custo_projeto` (
  `id_custo_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `id_projeto` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data_atualizacao` datetime NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id_custo_projeto`),
  KEY `fk_custo_projeto_projeto1_idx` (`id_projeto`),
  KEY `fk_custo_projeto_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_custo_projeto_projeto1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_custo_projeto_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.custo_projeto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `custo_projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `custo_projeto` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.despesa
DROP TABLE IF EXISTS `despesa`;
CREATE TABLE IF NOT EXISTS `despesa` (
  `id_fluxo` int(11) NOT NULL,
  `despesa` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fluxo`),
  CONSTRAINT `fk_despesa_fluxo1` FOREIGN KEY (`id_fluxo`) REFERENCES `fluxo` (`id_fluxo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.despesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `despesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `despesa` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.feira
DROP TABLE IF EXISTS `feira`;
CREATE TABLE IF NOT EXISTS `feira` (
  `id_feira` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_feira`),
  KEY `fk_feira_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_feira_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.feira: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `feira` DISABLE KEYS */;
/*!40000 ALTER TABLE `feira` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.fluxo
DROP TABLE IF EXISTS `fluxo`;
CREATE TABLE IF NOT EXISTS `fluxo` (
  `id_fluxo` int(11) NOT NULL AUTO_INCREMENT,
  `id_conta` int(11) NOT NULL,
  `id_fluxo_categoria` int(11) NOT NULL,
  `valor` double NOT NULL,
  `data_vencimento` datetime DEFAULT NULL,
  `fechado` char(1) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_atualizacao` datetime NOT NULL,
  PRIMARY KEY (`id_fluxo`),
  KEY `fk_fluxo_conta1_idx` (`id_conta`),
  KEY `fk_fluxo_fluxo_categoria1_idx` (`id_fluxo_categoria`),
  KEY `fk_fluxo_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_fluxo_conta1` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id_conta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fluxo_fluxo_categoria1` FOREIGN KEY (`id_fluxo_categoria`) REFERENCES `fluxo_categoria` (`id_fluxo_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fluxo_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.fluxo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fluxo` DISABLE KEYS */;
/*!40000 ALTER TABLE `fluxo` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.fluxo_categoria
DROP TABLE IF EXISTS `fluxo_categoria`;
CREATE TABLE IF NOT EXISTS `fluxo_categoria` (
  `id_fluxo_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(40) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_atualizacao` datetime NOT NULL,
  PRIMARY KEY (`id_fluxo_categoria`),
  KEY `fk_fluxo_categoria_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_fluxo_categoria_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.fluxo_categoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fluxo_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `fluxo_categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.fluxo_has_funcionario
DROP TABLE IF EXISTS `fluxo_has_funcionario`;
CREATE TABLE IF NOT EXISTS `fluxo_has_funcionario` (
  `id_fluxo` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`id_fluxo`,`id_funcionario`),
  KEY `fk_fluxo_has_funcionario_funcionario1_idx` (`id_funcionario`),
  KEY `fk_fluxo_has_funcionario_fluxo1_idx` (`id_fluxo`),
  CONSTRAINT `fk_fluxo_has_funcionario_fluxo1` FOREIGN KEY (`id_fluxo`) REFERENCES `fluxo` (`id_fluxo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fluxo_has_funcionario_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.fluxo_has_funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fluxo_has_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `fluxo_has_funcionario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.funcionario
DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `carteira_trabalho` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_funcionario_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_funcionario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.funcionario_has_projeto
DROP TABLE IF EXISTS `funcionario_has_projeto`;
CREATE TABLE IF NOT EXISTS `funcionario_has_projeto` (
  `id_funcionario` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`,`id_projeto`),
  KEY `fk_funcionario_has_projeto_projeto1_idx` (`id_projeto`),
  KEY `fk_funcionario_has_projeto_funcionario1_idx` (`id_funcionario`),
  CONSTRAINT `fk_funcionario_has_projeto_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_has_projeto_projeto1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.funcionario_has_projeto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario_has_projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_has_projeto` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  `id_menu_pai` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `fk_menu_menu1_idx` (`id_menu_pai`),
  CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`id_menu_pai`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.menu_tipo_usuario
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

-- Copiando dados para a tabela rdfstands.menu_tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `menu_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_tipo_usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.projeto
DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_projeto_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.projeto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.projeto_feira
DROP TABLE IF EXISTS `projeto_feira`;
CREATE TABLE IF NOT EXISTS `projeto_feira` (
  `id_feira` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  PRIMARY KEY (`id_feira`,`id_projeto`),
  KEY `fk_feira_has_projeto_projeto1_idx` (`id_projeto`),
  KEY `fk_feira_has_projeto_feira1_idx` (`id_feira`),
  CONSTRAINT `fk_feira_has_projeto_feira1` FOREIGN KEY (`id_feira`) REFERENCES `feira` (`id_feira`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_feira_has_projeto_projeto1` FOREIGN KEY (`id_projeto`) REFERENCES `projeto` (`id_projeto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.projeto_feira: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `projeto_feira` DISABLE KEYS */;
/*!40000 ALTER TABLE `projeto_feira` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.receita
DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `id_fluxo` int(11) NOT NULL,
  `receita` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fluxo`),
  CONSTRAINT `fk_receita_fluxo1` FOREIGN KEY (`id_fluxo`) REFERENCES `fluxo` (`id_fluxo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.receita: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `receita` DISABLE KEYS */;
/*!40000 ALTER TABLE `receita` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.regras
DROP TABLE IF EXISTS `regras`;
CREATE TABLE IF NOT EXISTS `regras` (
  `id_regras` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(100) NOT NULL,
  `action` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_regras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.regras: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `regras` DISABLE KEYS */;
/*!40000 ALTER TABLE `regras` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.regras_tipo_usuario
DROP TABLE IF EXISTS `regras_tipo_usuario`;
CREATE TABLE IF NOT EXISTS `regras_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `id_regras` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`,`id_regras`),
  KEY `fk_tipo_usuario_has_regras_regras1_idx` (`id_regras`),
  KEY `fk_tipo_usuario_has_regras_tipo_usuario_idx` (`id_tipo_usuario`),
  CONSTRAINT `fk_tipo_usuario_has_regras_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_usuario_has_regras_regras1` FOREIGN KEY (`id_regras`) REFERENCES `regras` (`id_regras`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.regras_tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `regras_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `regras_tipo_usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.salario_funcionario
DROP TABLE IF EXISTS `salario_funcionario`;
CREATE TABLE IF NOT EXISTS `salario_funcionario` (
  `id_salario_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) NOT NULL,
  `salario` double NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_atualizacao` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_salario_funcionario`),
  KEY `fk_salario_funcionario_funcionario1_idx` (`id_funcionario`),
  KEY `fk_salario_funcionario_usuario1_idx` (`id_usuario`),
  CONSTRAINT `fk_salario_funcionario_funcionario1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_salario_funcionario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.salario_funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `salario_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `salario_funcionario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.tipo_usuario
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(60) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S',
  `data_atualizacao` datetime NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;


-- Copiando estrutura para tabela rdfstands.usuario
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela rdfstands.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
