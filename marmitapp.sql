-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 23/09/2017 às 22:01
-- Versão do servidor: 5.5.57-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `marmitapp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprador`
--

CREATE TABLE IF NOT EXISTS `comprador` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `comprador`
--

INSERT INTO `comprador` (`id_usuario`, `nome`) VALUES
(1, 'Mario de Andrade Silva');

-- --------------------------------------------------------

--
-- Estrutura para tabela `prato`
--

CREATE TABLE IF NOT EXISTS `prato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_restaurante` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `preco` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `prato`
--

INSERT INTO `prato` (`id`, `id_restaurante`, `nome`, `foto`, `ingredientes`, `preco`) VALUES
(1, 1, 'espetinho de coração de galinha', NULL, '- 5 corações de galinha;-acompanha farofa e maionese', 5),
(2, 1, 'espetinho de boi', NULL, '- 5 tiras de carne de boi;- acompanha farofa e maionese', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `id_usuario` int(11) NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  `entrega_em_casa` tinyint(1) NOT NULL,
  `come_local` tinyint(1) NOT NULL,
  `entrega_meio` tinyint(1) NOT NULL,
  `aceita_cartao` tinyint(1) NOT NULL,
  `nome` varchar(55) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `restaurante`
--

INSERT INTO `restaurante` (`id_usuario`, `cnpj`, `entrega_em_casa`, `come_local`, `entrega_meio`, `aceita_cartao`, `nome`) VALUES
(1, NULL, 1, 1, 1, 1, 'CHURRASIC PARK');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(55) NOT NULL,
  `senha` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`) VALUES
(1, '1@1.com', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
