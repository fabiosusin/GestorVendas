-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jul-2021 às 23:50
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gestorvendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cartaoCredito` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `senha`, `telefone`, `email`, `cartaoCredito`) VALUES
(1, 'fabio', 'fabio123', '', 'fabio@gmail.com', ''),
(2, 'William', 'teste', '(54) 3291-2912', 'williamsilva83@gmail.com', '1098914545'),
(3, 'Giovanni', 'teste', '(54) 3291-2912', 'giovanni@bontempo.com.br', '454565654');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(255) NOT NULL,
  `numero` char(5) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `FornecedorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ClienteID` (`ClienteID`),
  KEY `FornecedorID` (`FornecedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `rua`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `ClienteID`, `FornecedorID`) VALUES
(1, '', '', '', '', '', '', '', 1, NULL),
(2, 'Luiz Cioatto', '45A', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', 2, NULL),
(3, 'Jardim dos platanos', '999', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', NULL, 1),
(4, 'Avenida Beira Rio', '1056', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', NULL, 2),
(5, 'Luiz Cioatto', '1052', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', NULL, 3),
(7, 'Luiz Cioatto', '45A', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', 3, NULL),
(8, 'Carlos gomes', '1056', '', 'Centro', '95.190-000', 'SÃ£o Marcos', 'RS', NULL, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  `ProdutoID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ProdutoID` (`ProdutoID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `quantidade`, `preco`, `ProdutoID`) VALUES
(13, 8, 50, 6),
(11, 0, 20, 3),
(3, 506, 10, 2),
(8, 9, 35, 1),
(12, 0, 50, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `descricao`, `telefone`, `email`) VALUES
(1, 'Fornecedor Padrao', 'Teste', '(54) 3291-8300', 'fornecedor@gmail'),
(2, 'Inter Store', 'Camiseta inter', '(54) 9999-99999', 'inter@inter.com.br'),
(3, 'Bontempo', 'FÃ¡brica de mÃ³veis', '(54) 3291-8300', 'bontempo@bontempo.com.br'),
(6, 'HP', 'InformÃ¡tica', '(54) 3291-2912', 'hp@hp.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE IF NOT EXISTS `itempedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  `PedidoID` int(11) NOT NULL,
  `ProdutoID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PedidoID` (`PedidoID`),
  KEY `ProdutoID` (`ProdutoID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itempedido`
--

INSERT INTO `itempedido` (`id`, `quantidade`, `preco`, `PedidoID`, `ProdutoID`) VALUES
(1, 2, 250, 1, 1),
(2, 7, 250, 2, 1),
(3, 1, 20, 3, 3),
(4, 1, 35, 4, 1),
(5, 1, 50, 4, 5),
(6, 2, 50, 5, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataPedido` date NOT NULL,
  `dataEntrega` date DEFAULT NULL,
  `situacao` varchar(255) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ClienteID` (`ClienteID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `dataPedido`, `dataEntrega`, `situacao`, `ClienteID`) VALUES
(1, '2021-07-06', NULL, 'Aguardando Pagamento', 1),
(2, '2021-07-06', NULL, 'Aguardando Pagamento', 1),
(3, '2021-07-06', '2021-07-23', 'Entregue', 2),
(4, '2021-07-06', NULL, 'Aguardando Pagamento', 2),
(5, '2021-07-06', NULL, 'Aguardando Pagamento', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `fotoUrl` varchar(255) DEFAULT NULL,
  `FornecedorID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FornecedorID` (`FornecedorID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `fotoUrl`, `FornecedorID`) VALUES
(1, 'CAMISA TAISON', 'Camisa 10', 'shared/upload/tt.jpg', 1),
(2, 'Cadeira', 'Cadeira de madeira', 'shared/upload/cadeira.jfif', 3),
(3, 'Camiseta D\'alessandro', 'Camisa 15', 'shared/upload/dale.jfif', 2),
(5, 'Notebook HP', '- Notebook I5', 'shared/upload/transferir.jfif', 6),
(6, 'Notebook Vermelho Hp', '- Notebook vermelho', 'shared/upload/hpvermelho.jfif', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
