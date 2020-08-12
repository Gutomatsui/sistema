-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Ago-2020 às 16:00
-- Versão do servidor: 5.7.26
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arquivos`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `AtualizarContrato`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AtualizarContrato` ()  BEGIN

    update empresa set  dias_fim_contrato = DATEDIFF(  dt_fim_cotrato, CURDATE())   where dt_fim_cotrato >= CURDATE(); 



    select * from empresa_certificado where dt_validade = CURDATE() and fl_vencido = 1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

DROP TABLE IF EXISTS `banco`;
CREATE TABLE IF NOT EXISTS `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_banco` varchar(60) NOT NULL,
  `mora` double NOT NULL,
  `juros_ativo` double NOT NULL,
  `valor_boleto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`id`, `nome_banco`, `mora`, `juros_ativo`, `valor_boleto`) VALUES
(7, 'Bradesco', 200, 5.2, 1.39),
(8, 'Inter', 1, 20, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cnae`
--

DROP TABLE IF EXISTS `cnae`;
CREATE TABLE IF NOT EXISTS `cnae` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_cnae` varchar(8) NOT NULL,
  `nome_cnae` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cnae`
--

INSERT INTO `cnae` (`id`, `numero_cnae`, `nome_cnae`) VALUES
(1, '18.5.4', 'web'),
(2, '18.1.5', 'teste ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

DROP TABLE IF EXISTS `contas_receber`;
CREATE TABLE IF NOT EXISTS `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `fl_ativo` bit(1) DEFAULT NULL,
  `plano` varchar(45) DEFAULT NULL,
  `tipo_plano` varchar(45) DEFAULT NULL,
  `valor_plano` varchar(45) DEFAULT NULL,
  `juros` varchar(45) DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `numero_contrato` longtext,
  `cnae` varchar(50) DEFAULT NULL,
  `descricao_servicos` longtext,
  `qtd_parcelas` int(11) DEFAULT NULL,
  `vencimento_original` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `mora` double DEFAULT NULL,
  `valor_total_liquido` double DEFAULT NULL,
  `numero_nota_fiscal` int(11) DEFAULT NULL,
  `data_emissao_nota_fiscal` date DEFAULT NULL,
  `data_competencia_nota_fiscal` date DEFAULT NULL,
  `desconto_boleto` double DEFAULT NULL,
  `forma_pagamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_id_status_idx` (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `id_empresa`, `fl_ativo`, `plano`, `tipo_plano`, `valor_plano`, `juros`, `id_status`, `numero_contrato`, `cnae`, `descricao_servicos`, `qtd_parcelas`, `vencimento_original`, `data_pagamento`, `mora`, `valor_total_liquido`, `numero_nota_fiscal`, `data_emissao_nota_fiscal`, `data_competencia_nota_fiscal`, `desconto_boleto`, `forma_pagamento`) VALUES
(53, 116, NULL, 'Comércio', ' \nCompleto \n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato_externo`
--

DROP TABLE IF EXISTS `contato_externo`;
CREATE TABLE IF NOT EXISTS `contato_externo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `assunto` varchar(50) NOT NULL,
  `cnpj_cpf` varchar(30) NOT NULL,
  `nome_contato` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `messagem` longtext NOT NULL,
  `fl_migrar` bit(1) NOT NULL,
  `newsletters` varchar(20) DEFAULT NULL,
  `tipo_empresa` varchar(50) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretorio_arquivos`
--

DROP TABLE IF EXISTS `diretorio_arquivos`;
CREATE TABLE IF NOT EXISTS `diretorio_arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pai` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `fl_diretorio` bit(1) NOT NULL,
  `nome_arquivo` varchar(200) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `dt_bloqueio` date DEFAULT NULL,
  `fl_bloqueado` bit(1) NOT NULL,
  `caminho` varchar(500) DEFAULT NULL,
  `fl_privado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_diretorio_arquivos_user_idx` (`id_usuario`),
  KEY `tyrttrr_idx` (`id_pai`)
) ENGINE=InnoDB AUTO_INCREMENT=11098 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `diretorio_arquivos`
--

INSERT INTO `diretorio_arquivos` (`id`, `id_pai`, `nome`, `fl_diretorio`, `nome_arquivo`, `fl_ativo`, `dt_cadastro`, `id_usuario`, `descricao`, `id_empresa`, `dt_bloqueio`, `fl_bloqueado`, `caminho`, `fl_privado`) VALUES
(13, NULL, 'copel.pdf', b'0', 'copel.pdf', b'1', '2019-12-22 21:21:55', 2, 'copel 1', 68, NULL, b'0', NULL, b'0'),
(16, NULL, '3343', b'1', '3343', b'1', '2019-12-22 21:57:47', 2, '343', 68, NULL, b'0', '3343', b'1'),
(17, NULL, 'ttt6', b'1', 'ttt6', b'1', '2019-12-22 22:02:36', 2, 'tryeryte', 68, NULL, b'0', 'ttt6', b'0'),
(19, 16, '44444444', b'1', '44444444', b'1', '2019-12-22 22:03:30', 2, '4444', 68, NULL, b'0', '3343 / 44444444', b'0'),
(20, 16, '5555', b'1', '5555', b'1', '2019-12-22 22:03:34', 2, '5555', 68, NULL, b'0', '3343 / 5555', b'0'),
(21, 17, '54333', b'1', '54333', b'1', '2019-12-22 22:03:43', 2, '3222', 68, NULL, b'0', 'ttt6 / 54333', b'0'),
(22, 19, '999', b'1', '999', b'1', '2019-12-22 22:03:56', 2, '999', 68, NULL, b'0', '3343 / 44444444 / 999', b'0'),
(23, 22, '000', b'1', '000', b'1', '2019-12-22 22:04:00', 2, '0000', 68, NULL, b'0', '3343 / 44444444 / 999 / 000', b'0'),
(11078, NULL, '3343', b'1', '3343', b'1', '2019-12-22 21:57:47', 2, '343', 64, NULL, b'0', '3343', b'1'),
(11079, 11078, '44444444', b'1', '44444444', b'1', '2019-12-22 22:03:30', 2, '4444', 64, NULL, b'0', '3343 / 44444444', b'0'),
(11080, 11079, '999', b'1', '999', b'1', '2019-12-22 22:03:56', 2, '999', 64, NULL, b'0', '3343 / 44444444 / 999', b'0'),
(11081, 11080, '000', b'1', '000', b'1', '2019-12-22 22:04:00', 2, '0000', 64, NULL, b'0', '3343 / 44444444 / 999 / 000', b'0'),
(11082, 11078, '5555', b'1', '5555', b'1', '2019-12-22 22:03:34', 2, '5555', 64, NULL, b'0', '3343 / 5555', b'0'),
(11083, NULL, '3343', b'1', '3343', b'1', '2019-12-22 21:57:47', 2, '343', 69, NULL, b'0', '3343', b'1'),
(11084, 11083, '44444444', b'1', '44444444', b'1', '2019-12-22 22:03:30', 2, '4444', 69, NULL, b'0', '3343 / 44444444', b'0'),
(11085, 11084, '999', b'1', '999', b'1', '2019-12-22 22:03:56', 2, '999', 69, NULL, b'0', '3343 / 44444444 / 999', b'0'),
(11086, 11085, '000', b'1', '000', b'1', '2019-12-22 22:04:00', 2, '0000', 69, NULL, b'0', '3343 / 44444444 / 999 / 000', b'0'),
(11087, 11083, '5555', b'1', '5555', b'1', '2019-12-22 22:03:34', 2, '5555', 69, NULL, b'0', '3343 / 5555', b'0'),
(11088, 11083, '9xQL8gUr.jpg', b'0', '9xQL8gUr.jpg', b'1', '2020-02-19 02:16:48', 2, 'sssss', 69, NULL, b'0', NULL, NULL),
(11089, NULL, 'ttt6', b'1', 'ttt6', b'1', '2019-12-22 22:02:36', 2, 'tryeryte', 63, NULL, b'0', 'ttt6', b'0'),
(11090, 11089, 'teste', b'1', '54333', b'1', '2019-12-22 22:03:43', 2, '3222', 63, NULL, b'0', 'ttt6 / 54333', b'0'),
(11091, NULL, 'Guto', b'1', 'Guto', b'1', '2020-03-08 01:16:10', 2, 'guto', 1, '2020-03-13', b'0', 'Guto', b'0'),
(11092, NULL, 'Jean', b'1', 'Jean', b'1', '2020-03-08 01:19:20', 2, 'jean', 1, NULL, b'0', 'Jean', b'0'),
(11093, 11092, 'conta-de-agua.pdf', b'0', 'conta-de-agua.pdf', b'1', '2020-03-08 01:24:11', 2, 'Conta de água ', 1, NULL, b'0', NULL, NULL),
(11094, 11092, 'conta-de-agua-1.pdf', b'0', 'conta-de-agua-1.pdf', b'1', '2020-03-08 01:25:17', 2, 'Conta de água 2', 1, NULL, b'0', NULL, NULL),
(11095, NULL, 'Teste', b'1', 'Teste', b'1', '2020-03-17 02:01:41', 2, 'Teste', 71, NULL, b'0', 'Teste', b'1'),
(11096, 11095, 'Boleto.pdf', b'0', 'Bradesco_16032020_151401.PDF', b'1', '2020-03-17 02:02:08', 2, 'Boletos', 71, NULL, b'0', NULL, NULL),
(11097, NULL, 'faturamento', b'1', 'faturamento', b'1', '2020-08-11 00:23:26', 2, 'faturamento', 115, NULL, b'0', 'faturamento', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `razao_social` varchar(150) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `id_tipo_empresa` int(11) NOT NULL,
  `id_tipo_porte_empresa` int(11) NOT NULL,
  `id_tipo_regime` int(11) NOT NULL,
  `id_tipo_tributacao` int(11) NOT NULL,
  `id_tipo_cliente` int(11) NOT NULL,
  `fone1` varchar(25) NOT NULL,
  `fone2` varchar(25) DEFAULT NULL,
  `contrato` varchar(200) DEFAULT NULL,
  `dt_contrato` datetime DEFAULT NULL,
  `dt_inicio_contrato` date DEFAULT NULL,
  `dt_fim_cotrato` date DEFAULT NULL,
  `dias_fim_contrato` int(11) DEFAULT NULL,
  `fl_contrato_vencido` bit(1) DEFAULT b'0',
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `fl_pendente` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `fk_tipo_empresa_idx` (`id_tipo_empresa`),
  KEY `fk_tipo_porte_emrpesa_idx` (`id_tipo_porte_empresa`),
  KEY `fk_tipo_regime_empresa_idx` (`id_tipo_regime`),
  KEY `fk_tipo_tributacao_idx` (`id_tipo_tributacao`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `razao_social`, `cnpj`, `dt_cadastro`, `fl_ativo`, `logo`, `email`, `id_tipo_empresa`, `id_tipo_porte_empresa`, `id_tipo_regime`, `id_tipo_tributacao`, `id_tipo_cliente`, `fone1`, `fone2`, `contrato`, `dt_contrato`, `dt_inicio_contrato`, `dt_fim_cotrato`, `dias_fim_contrato`, `fl_contrato_vencido`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `cep`, `complemento`, `fl_pendente`) VALUES
(1, 'SSH Sistemas e Matsui', 'SSH Sistemas', '29.269.540/0001-57', '2020-03-08 01:13:05', b'1', '', 'jean@sshsitemas.com.br', 1, 1, 1, 2, 1, '(41)9729-8876', '(13)9820-4227', 'ipad-820272_1920.jpg', '2019-12-01 19:11:51', NULL, NULL, NULL, NULL, 'Rua Vinte e Quatro de Agosto', '49', 'Vila Alice (Vicente de Carvalho)', 'Guarujá', 'SP', '14300-000', 'casa', b'0'),
(63, 'Empresa de teste', 'Empresa de teste RZ', '56.641.780/0001-03', '2020-03-08 01:14:18', b'1', '', 'jean@sshsistemas.com.br', 1, 1, 1, 2, 1, '(41)9999-9999', '(13)9820-4227', 'WhatsApp Image 2019-11-30 at 1.49.35 PM.jpeg', '2019-12-01 18:59:59', NULL, NULL, NULL, NULL, 'Rua Vinte e Quatro de Agosto', '49', 'Vila Alice (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-230', 'casa', b'0'),
(64, 'teste 2', 'teste 3', '21.977.963/0001-10', '2019-11-16 23:58:51', b'1', '', 'jeanbieda@gmail.com', 4, 1, 1, 3, 1, '(12)1212-1212', '', 'working-791175_640.jpg', '2019-12-01 19:11:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0'),
(65, 'undefined', 'undefined', 'undefined', '2019-12-01 03:37:57', b'1', '', 'undefined', 0, 0, 0, 0, 0, 'undefined', 'undefined', 'working-791175_640.jpg', '2019-12-01 19:11:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0'),
(66, '1111', 'undefined', 'undefined', '2019-12-01 03:46:14', b'1', '', 'undefined', 0, 0, 0, 0, 0, 'undefined', 'undefined', 'ipad-820272_1920 (1).jpg', '2019-12-02 18:26:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0'),
(67, 'aaaaaaaaaaaaaaaaaaaaa', 'SSH Sistemas', '56.842.260/0001-69', '2019-12-01 03:58:16', b'1', '', 'jeanbieda@gmail.com', 1, 1, 2, 2, 1, '(33)3333-3333', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0'),
(68, '22222222222', '33333333333', '277.380.060-00', '2020-01-11 22:56:58', b'1', '', 'jeanbied1a@gmail.com', 4, 1, 3, 2, 2, '(11)1111-1111', '', 'template-orcamento.docx', '2019-12-22 22:46:44', '2019-12-01', '2019-12-27', NULL, NULL, '7', '8', '10', '11', '12', '82110-444', '9', b'0'),
(69, '03.493.563/0001-57', '03.493.563/0001-57', '03.493.563/0001-57', '2019-12-31 16:30:38', b'1', '', 'jeanteste@gmail.com', 1, 1, 1, 2, 1, '(41)9972-9887', '', 'xampp-control.log', '2019-12-31 16:31:32', '2020-01-01', '2020-12-31', 312, b'1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, b'0'),
(115, 'Matsui Tecnologia do Brasil', 'Matsui tecnologia', '331.650.888-02', '2020-04-18 20:18:18', b'1', '', 'angelo@matsuitecnologia.com.br', 1, 1, 1, 4, 2, '(13)3352-1426', '(13)98204-2274', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Cunhambebe', '49', 'Jardim Cunhambebe (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-090', 'casa', b'0'),
(116, 'Empresa Teste', 'Teste do brasil', '243.251.450-00', '2020-04-18 23:00:16', b'1', '', 'angelo@matsuitecnologia.com.br', 1, 1, 1, 4, 2, '(13)3352-1426', '(13)98204-2274', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Cunhambebe', '49', NULL, 'Guarujá', 'SP', '11450-090', 'casa', b'1'),
(117, 'Empresa boa', 'Boa empresa de Marte', '22.135.458/0001-58', '2020-04-18 22:36:44', b'1', '', 'angelo@matsuitecnologia.com.br', 1, 1, 1, 4, 2, '(13)3352-1426', '(13)98204-2274', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Cunhambebe', '49', 'Jardim Cunhambebe (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-090', 'casa', b'1'),
(118, 'Renko do Brasil ', 'Renko do Brasil LTDA', '24.680.711/0001-12', '2020-04-20 15:21:28', b'1', '', 'angelo@matsuitecnologia.com.br', 1, 1, 2, 4, 2, '(13)3352-1426', '(13)98204-2274', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Cunhambebe', '49', 'Jardim Cunhambebe (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-090', 'casa', b'0'),
(119, 'KL Climatização ', 'Kaled ', '346.564.348-84', '2020-05-13 19:28:18', b'1', '', 'contato@matsuitecnologia.com.br', 1, 3, 2, 4, 2, '(13)3352-1158', '(13)98881-0119', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Francisco Alves', '73', 'Sítio Paecara (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-320', 'casa 01', b'0'),
(120, 'Renko Do Anderson ', 'Renko Do Anderson ', '302.755.625-55', '2020-05-14 23:53:39', b'1', '', 'augustorcm@hotmail.com', 1, 1, 1, 4, 2, '(13)3325-2442', '(13)98204-2274', NULL, NULL, NULL, NULL, NULL, b'0', 'Rua Maranhão', '08', 'Jardim Santense (Vicente de Carvalho)', 'Guarujá', 'SP', '11450-390', 'casa', b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_certificado`
--

DROP TABLE IF EXISTS `empresa_certificado`;
CREATE TABLE IF NOT EXISTS `empresa_certificado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `certificado` varchar(200) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_validade` date NOT NULL,
  `fl_vencido` bit(1) NOT NULL,
  `dias_vencimento` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_certificado_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa_certificado`
--

INSERT INTO `empresa_certificado` (`id`, `nome`, `certificado`, `dt_inicio`, `dt_validade`, `fl_vencido`, `dias_vencimento`, `id_empresa`, `id_usuario`) VALUES
(14, '1', '1', '0000-00-00', '2019-11-30', b'0', 2, 63, 2),
(15, '2', '2', '0000-00-00', '0000-00-00', b'0', 2, 63, 2),
(17, '421', '421', '0000-00-00', '0019-09-02', b'0', 87, 63, 2),
(18, '11', '111', '2019-12-04', '2019-12-04', b'0', 6, 63, 2),
(20, '3', '4', '2019-12-05', '2020-01-05', b'0', 5, 68, 2),
(21, 'GTO', '1010101010', '2020-03-13', '2020-03-13', b'0', 5, 63, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_plano`
--

DROP TABLE IF EXISTS `empresa_plano`;
CREATE TABLE IF NOT EXISTS `empresa_plano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_tipo_planos` int(11) NOT NULL,
  `dt_ativo` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `valor_plano` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa_plano_empresa_idx` (`id_empresa`),
  KEY `fk_tipo_planos_idx` (`id_tipo_planos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pai` int(11) DEFAULT NULL,
  `titulo` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `icone` varchar(45) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `fl_unico` bit(1) NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu_item`
--

INSERT INTO `menu_item` (`id`, `id_pai`, `titulo`, `action`, `icone`, `fl_ativo`, `fl_unico`, `ordem`) VALUES
(1, NULL, 'Home', 'home', 'gi gi-home', b'1', b'1', 1),
(2, NULL, 'Empresa', '', 'fa fa-institution', b'1', b'0', 2),
(3, 2, 'Listagem', 'empresa', ' ', b'1', b'0', 1),
(4, 2, 'Novo', 'empresa/create', NULL, b'1', b'0', 2),
(5, NULL, 'Usuario', ' ', 'fa fa-user', b'1', b'0', 3),
(8, 5, 'Listagem', 'usuario', NULL, b'1', b'0', 1),
(9, 5, 'Novo', 'usuario/create', NULL, b'1', b'0', 2),
(10, NULL, 'Diretório', '', 'fa fa-folder-open', b'1', b'0', 4),
(11, 10, 'Documentos', 'diretorio', ' ', b'1', b'0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_perfil`
--

DROP TABLE IF EXISTS `menu_perfil`;
CREATE TABLE IF NOT EXISTS `menu_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_menu_item` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_perfil_idx` (`id_perfil`),
  KEY `fk_menu_item_idx` (`id_menu_item`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu_perfil`
--

INSERT INTO `menu_perfil` (`id`, `id_perfil`, `id_menu_item`) VALUES
(12, 2, 1),
(13, 2, 2),
(14, 2, 3),
(15, 2, 4),
(20, 2, 10),
(21, 2, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_interno` int(11) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `id_interno`, `nome`, `descricao`, `fl_ativo`) VALUES
(2, 1, 'Admin', 'Admin', b'1'),
(3, 2, 'Basico', 'Basico', b'1'),
(5, 3, 'Admin Cliente', 'Admin Cliente', b'1'),
(6, 4, 'Basico Cliente', 'Basico Cliente', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_empresa`
--

DROP TABLE IF EXISTS `planos_empresa`;
CREATE TABLE IF NOT EXISTS `planos_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_plano` int(11) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `dt_alteracao` datetime DEFAULT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `valor_plano` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plano_empresa_empresa` (`id_empresa`),
  KEY `fk_plano_empresa_plano` (`id_plano`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos_empresa`
--

INSERT INTO `planos_empresa` (`id`, `id_empresa`, `id_plano`, `fl_ativo`, `dt_cadastro`, `dt_alteracao`, `nome_usuario`, `valor_plano`) VALUES
(30, 115, 5, b'1', '2020-04-18 17:18:18', NULL, 'Externo', 89.1),
(31, 116, 24, b'1', '2020-04-18 19:16:13', NULL, 'Externo', 350.6),
(32, 117, 16, b'1', '2020-04-18 19:36:44', NULL, 'Externo', 150.6),
(33, 118, 5, b'1', '2020-04-20 12:21:29', NULL, 'Externo', 89.1),
(34, 119, 5, b'1', '2020-05-13 16:28:18', NULL, 'Externo', 89.1),
(35, 120, 5, b'1', '2020-05-14 20:53:39', NULL, 'Externo', 89.1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_url` text,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `protocolo`
--

DROP TABLE IF EXISTS `protocolo`;
CREATE TABLE IF NOT EXISTS `protocolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_cadastro` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `protocolo` longtext NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tipo_protocolo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`id_empresa`),
  KEY `id_idx1` (`tipo_protocolo`),
  KEY `id_idx2` (`id`,`tipo_protocolo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `protocolo`
--

INSERT INTO `protocolo` (`id`, `data_cadastro`, `fl_ativo`, `protocolo`, `id_empresa`, `tipo_protocolo`, `titulo`, `descricao`) VALUES
(8, '2020-04-18 17:18:18', b'1', 'S202004181718000021', 115, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.'),
(9, '2020-04-18 19:16:13', b'1', 'S202004181916000022', 116, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.'),
(10, '2020-04-18 19:36:44', b'1', 'S202004181936000023', 117, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.'),
(11, '2020-04-20 12:21:29', b'1', 'S202004201221000024', 118, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.'),
(12, '2020-05-13 16:28:18', b'1', 'S202005131628000025', 119, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.'),
(13, '2020-05-14 20:53:39', b'1', 'S202005142053000026', 120, 1, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_apoio_replica`
--

DROP TABLE IF EXISTS `tabela_apoio_replica`;
CREATE TABLE IF NOT EXISTS `tabela_apoio_replica` (
  `id_antigo` int(11) DEFAULT NULL,
  `id_novo` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `id_pai` int(11) DEFAULT NULL,
  `id_pai_novo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_simples`
--

DROP TABLE IF EXISTS `tabela_simples`;
CREATE TABLE IF NOT EXISTS `tabela_simples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `mes` int(11) DEFAULT NULL,
  `receita` decimal(10,2) DEFAULT NULL,
  `despesa` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fl_status` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tabela_simples`
--

INSERT INTO `tabela_simples` (`id`, `ano`, `id_empresa`, `mes`, `receita`, `despesa`, `total`, `fl_status`) VALUES
(1, 2020, 1, 1, '1.00', '2.00', '3.00', b'0'),
(2, 2020, 1, 2, '3.00', '4.00', '0.00', b'0'),
(3, 2020, 1, 3, '0.00', '0.00', '0.00', b'0'),
(4, 2020, 1, 4, '0.00', '0.00', '0.00', b'0'),
(5, 2020, 1, 5, '0.00', '0.00', '0.00', b'0'),
(6, 2020, 1, 6, '0.00', '0.00', '0.00', b'0'),
(7, 2020, 1, 7, '0.00', '0.00', '0.00', b'0'),
(8, 2020, 1, 8, '0.00', '0.00', '0.00', b'0'),
(9, 2020, 1, 9, '0.00', '0.00', '0.00', b'0'),
(10, 2020, 1, 10, '0.00', '0.00', '0.00', b'0'),
(11, 2020, 1, 11, '0.00', '0.00', '0.00', b'0'),
(12, 2020, 1, 12, '6.00', '7.00', '13.00', b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id`, `nome`) VALUES
(1, 'PJ'),
(2, 'PF'),
(3, 'CAEPF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_empresa`
--

DROP TABLE IF EXISTS `tipo_empresa`;
CREATE TABLE IF NOT EXISTS `tipo_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`id`, `nome`, `fl_ativo`) VALUES
(1, ' Prestação de Serviço', b'1'),
(4, 'Comercio', b'1'),
(5, 'E-domestica', b'1'),
(7, 'Profissional Liberal', b'1'),
(9, 'Imposto de Renda', b'1'),
(10, 'Imposto de Renda( Carne Leão)', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_planos`
--

DROP TABLE IF EXISTS `tipo_planos`;
CREATE TABLE IF NOT EXISTS `tipo_planos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `tipo_planos` varchar(60) NOT NULL,
  `valor` double NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `id_grupo_plano` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_planos`
--

INSERT INTO `tipo_planos` (`id`, `nome`, `tipo_planos`, `valor`, `fl_ativo`, `id_grupo_plano`) VALUES
(5, 'Prestação de Serviços', 'básico', 100.5, b'1', 1),
(7, 'Prestação de Serviços', 'Completo', 110, b'1', 1),
(8, 'Prestação de Serviços', 'Customizado', 120, b'1', 1),
(12, 'Comércio', 'Completo', 100, b'1', 2),
(13, 'Comércio', 'Customizado', 100, b'1', 2),
(14, 'M.E.I', 'Básico', 100, b'1', 3),
(15, 'M.E.I', 'Customizado', 100, b'1', 3),
(16, 'Profissional Liberal', 'Completo', 100, b'1', 4),
(17, 'Profissional Liberal', 'Customziado', 100, b'1', 4),
(18, 'E-social Doméstico ', 'Completo', 100, b'1', 5),
(19, 'E-social Doméstico', 'Customziado', 100, b'1', 5),
(22, 'Imposto de Renda', 'Básico', 100, b'1', 6),
(23, 'Imposto de Renda', 'Completo', 100, b'1', 6),
(24, 'Imposto de Renda', 'Customizado', 100, b'1', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_porte_empresa`
--

DROP TABLE IF EXISTS `tipo_porte_empresa`;
CREATE TABLE IF NOT EXISTS `tipo_porte_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_porte_empresa`
--

INSERT INTO `tipo_porte_empresa` (`id`, `nome`, `fl_ativo`) VALUES
(1, 'ME', b'1'),
(2, 'EPP', b'1'),
(3, 'MEI', b'1'),
(5, 'Liberal', b'1'),
(6, 'Outros', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_protocolo`
--

DROP TABLE IF EXISTS `tipo_protocolo`;
CREATE TABLE IF NOT EXISTS `tipo_protocolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `indice` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sigla_UNIQUE` (`sigla`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_protocolo`
--

INSERT INTO `tipo_protocolo` (`id`, `nome`, `fl_ativo`, `data_cadastro`, `sigla`, `indice`) VALUES
(1, 'Site', b'1', '2020-04-17 21:28:20', 'S', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_regime_apuracao`
--

DROP TABLE IF EXISTS `tipo_regime_apuracao`;
CREATE TABLE IF NOT EXISTS `tipo_regime_apuracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_regime_apuracao`
--

INSERT INTO `tipo_regime_apuracao` (`id`, `nome`, `fl_ativo`) VALUES
(1, 'Competência', b'1'),
(2, 'Caixa', b'1'),
(3, 'Outros', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_status_faturamento`
--

DROP TABLE IF EXISTS `tipo_status_faturamento`;
CREATE TABLE IF NOT EXISTS `tipo_status_faturamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_status_faturamento`
--

INSERT INTO `tipo_status_faturamento` (`id`, `status`) VALUES
(1, 'Pago'),
(2, 'Cancelado'),
(3, 'Aguardando Pagamento'),
(4, 'Ação Legal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_tributacao`
--

DROP TABLE IF EXISTS `tipo_tributacao`;
CREATE TABLE IF NOT EXISTS `tipo_tributacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_tributacao`
--

INSERT INTO `tipo_tributacao` (`id`, `nome`, `fl_ativo`) VALUES
(2, ' Lucro Real', b'1'),
(3, 'Presumido', b'1'),
(4, 'Simples Nacional', b'1'),
(5, 'CAEPF', b'1'),
(6, 'Outros', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `fl_ativo` bit(1) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_perfil_idx` (`id_perfil`),
  KEY `fk_usuario_empresa_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `dt_cadastro`, `fl_ativo`, `id_empresa`, `id_perfil`, `senha`) VALUES
(2, 'Angelo', 'Augusto', 'angelo@matsuitecnologia.com.br', '2019-08-10 00:59:46', b'1', 1, 2, 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'JEAN FILIPE BIEDA 1', '', 'jean@sshsistemas.com.br', '2019-11-27 03:45:54', b'1', 63, 5, '123456'),
(19, 'Angelo Augusto', '', 'angelo@matsuitecnologia.com.br', '2020-03-08 01:39:00', b'1', 1, 2, '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `diretorio_arquivos`
--
ALTER TABLE `diretorio_arquivos`
  ADD CONSTRAINT `fk_diretorio_arquivos_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fkfkfk` FOREIGN KEY (`id_pai`) REFERENCES `diretorio_arquivos` (`id`);

--
-- Limitadores para a tabela `empresa_certificado`
--
ALTER TABLE `empresa_certificado`
  ADD CONSTRAINT `fk_certificado_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

--
-- Limitadores para a tabela `empresa_plano`
--
ALTER TABLE `empresa_plano`
  ADD CONSTRAINT `fk_empresa_planos_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_planos` FOREIGN KEY (`id_tipo_planos`) REFERENCES `tipo_planos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `menu_perfil`
--
ALTER TABLE `menu_perfil`
  ADD CONSTRAINT `fk_menu_item` FOREIGN KEY (`id_menu_item`) REFERENCES `menu_item` (`id`),
  ADD CONSTRAINT `fk_menu_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);

--
-- Limitadores para a tabela `planos_empresa`
--
ALTER TABLE `planos_empresa`
  ADD CONSTRAINT `fk_plano_empresa_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plano_empresa_plano` FOREIGN KEY (`id_plano`) REFERENCES `tipo_planos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protocolo`
--
ALTER TABLE `protocolo`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_protocolo` FOREIGN KEY (`tipo_protocolo`) REFERENCES `tipo_protocolo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
