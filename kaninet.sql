-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 28-Nov-2019 às 01:24
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaninet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_erros`
--

DROP TABLE IF EXISTS `log_erros`;
CREATE TABLE IF NOT EXISTS `log_erros` (
  `cod_erro` int(11) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
CREATE TABLE IF NOT EXISTS `permissoes` (
  `id_permissao` int(11) DEFAULT NULL,
  `atributos_per` varchar(50) DEFAULT NULL,
  `valida_ses` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

DROP TABLE IF EXISTS `postagem`;
CREATE TABLE IF NOT EXISTS `postagem` (
  `id_postagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postagem` varchar(500) NOT NULL,
  `data_postagem` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_postagem`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_postagem`, `id_usuario`, `postagem`, `data_postagem`) VALUES
(26, 3, 'asdasda', '2019-11-27 20:45:35'),
(5, 3, 'Teste inclusão.', '2019-11-16 12:42:10'),
(12, 5, 'Minha primeira publicação!', '2019-11-16 23:38:48'),
(15, 7, 'Boa tarde a todos!', '2019-11-23 15:18:42'),
(27, 3, 'asd', '2019-11-27 20:45:38'),
(29, 8, 'Hoje será um grande dia em nossa empresa!!!', '2019-11-27 21:01:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
(1, 'Luan', 'LUANROBERTONUNES@HOTMAIL.COM', '1234'),
(2, 'teste', 'teste@teste.com.br', '233412'),
(3, 'joao', 'joao@teste.com.br', '98408db9a8744a44dbd4c7998f98c9d1'),
(4, 'maria', 'maria@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'marcos', 'marcos@teste.com.br', '202cb962ac59075b964b07152d234b70'),
(6, 'ana', 'ana@teste.com.br', '276b6c4692e78d4799c12ada515bc3e4'),
(7, 'paula', 'paula@teste.com.br', '1b207465eac83b5d4b12e335faa0b53a'),
(8, 'guilherme', 'guilherme@teste.com.br', '192309aaddc500140db28668e1bbd8b5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_seguidores`
--

DROP TABLE IF EXISTS `usuarios_seguidores`;
CREATE TABLE IF NOT EXISTS `usuarios_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `seguindo_id_usuario` int(11) NOT NULL,
  `data_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_seguidor`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguindo_id_usuario`, `data_registro`) VALUES
(13, 5, 3, '2019-11-16 23:40:36'),
(12, 5, 4, '2019-11-16 23:29:01'),
(46, 3, 4, '2019-11-27 21:16:26'),
(23, 7, 6, '2019-11-23 15:18:14'),
(35, 7, 3, '2019-11-26 20:09:36'),
(40, 8, 7, '2019-11-27 21:01:34'),
(51, 3, 5, '2019-11-27 21:19:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
