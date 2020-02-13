-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Dez-2019 às 05:00
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inbrie_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentariofotografia`
--

CREATE TABLE IF NOT EXISTS `postcomentariofotografia` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_fotografia_post_coment_idx` (`id_fotografiaPost`),
  KEY `original_fotografia_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentarioilustracao`
--

CREATE TABLE IF NOT EXISTS `postcomentarioilustracao` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_ilustracao_post_coment_idx` (`id_ilustracaoPost`),
  KEY `original_ilustracao_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentarioliteratura`
--

CREATE TABLE IF NOT EXISTS `postcomentarioliteratura` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_literatura_post_coment_idx` (`id_literaturaPost`),
  KEY `original_literatura_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcomentariomusica`
--

CREATE TABLE IF NOT EXISTS `postcomentariomusica` (
  `comentarioID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentarioConteudo` varchar(500) COLLATE utf8_bin NOT NULL,
  `comentarioData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comentarioID`),
  KEY `original_musica_post_coment_idx` (`id_musicaPost`),
  KEY `original_musica_usuario_coment_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudofotografia`
--

CREATE TABLE IF NOT EXISTS `postconteudofotografia` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentFotografia_idx` (`id_fotografiaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudoilustracao`
--

CREATE TABLE IF NOT EXISTS `postconteudoilustracao` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentIlustracao_idx` (`id_ilustracaoPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudoliteratura`
--

CREATE TABLE IF NOT EXISTS `postconteudoliteratura` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudo` mediumtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentLiteratura_idx` (`id_literaturaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postconteudomusica`
--

CREATE TABLE IF NOT EXISTS `postconteudomusica` (
  `postConteudoID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `conteudoTitulo` varchar(120) CHARACTER SET latin1 NOT NULL,
  `conteudoIndice` int(11) NOT NULL,
  `conteudoDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`postConteudoID`),
  KEY `id_contentMusica_idx` (`id_musicaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidafotografia`
--

CREATE TABLE IF NOT EXISTS `postcurtidafotografia` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_fotografia_post_curtida_idx` (`id_fotografiaPost`),
  KEY `original_fotografia_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidailustracao`
--

CREATE TABLE IF NOT EXISTS `postcurtidailustracao` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_ilustracao_post_curtida_idx` (`id_ilustracaoPost`),
  KEY `original_ilustracao_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidaliteratura`
--

CREATE TABLE IF NOT EXISTS `postcurtidaliteratura` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_literatura_post_curtida_idx` (`id_literaturaPost`),
  KEY `original_literatura_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postcurtidamusica`
--

CREATE TABLE IF NOT EXISTS `postcurtidamusica` (
  `curtidaID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `curtidaTipo` tinyint(4) NOT NULL,
  `curtidaData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curtidaID`),
  KEY `original_musica_post_curtida_idx` (`id_musicaPost`),
  KEY `original_musica_user_curtida_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagfotografia`
--

CREATE TABLE IF NOT EXISTS `posttagfotografia` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_fotografiaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_idx` (`id_fotografiaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagilustracao`
--

CREATE TABLE IF NOT EXISTS `posttagilustracao` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_ilustracaoPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_idx` (`id_ilustracaoPost`),
  KEY `original_post_ilustracao` (`id_ilustracaoPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagliteratura`
--

CREATE TABLE IF NOT EXISTS `posttagliteratura` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_literaturaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_literatura_idx` (`id_literaturaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttagmusica`
--

CREATE TABLE IF NOT EXISTS `posttagmusica` (
  `tagID` int(11) NOT NULL AUTO_INCREMENT,
  `id_musicaPost` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tagID`),
  KEY `original_post_musica_idx` (`id_musicaPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipofotografia`
--

CREATE TABLE IF NOT EXISTS `posttipofotografia` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_fotografo_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipoilustracao`
--

CREATE TABLE IF NOT EXISTS `posttipoilustracao` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'Sem título',
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL DEFAULT 'Sem descrição',
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_ilustrationOP` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipoliteratura`
--

CREATE TABLE IF NOT EXISTS `posttipoliteratura` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `miniaturaDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_escritor_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posttipomusica`
--

CREATE TABLE IF NOT EXISTS `posttipomusica` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `postTitulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postDescricao` varchar(500) CHARACTER SET latin1 NOT NULL,
  `tipoMusica` varchar(11) CHARACTER SET latin1 NOT NULL,
  `generoMusica` varchar(32) CHARACTER SET latin1 NOT NULL,
  `miniaturaDiretorio` varchar(500) CHARACTER SET latin1 NOT NULL,
  `postData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`),
  KEY `id_musico_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioNome` varchar(16) CHARACTER SET latin1 NOT NULL,
  `usuarioBio` varchar(1000) DEFAULT 'Sem biografia.',
  `usuarioEmail` varchar(36) CHARACTER SET latin1 NOT NULL,
  `usuarioSenha` varchar(62) CHARACTER SET latin1 NOT NULL,
  `usuarioFotoPerfil` varchar(500) CHARACTER SET latin1 NOT NULL,
  `usuarioDataRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuarioID`),
  UNIQUE KEY `userName_UNIQUE` (`usuarioNome`),
  UNIQUE KEY `userEmail_UNIQUE` (`usuarioEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `postcomentariofotografia`
--
ALTER TABLE `postcomentariofotografia`
  ADD CONSTRAINT `original_fotografia_post_coment` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_fotografia_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentarioilustracao`
--
ALTER TABLE `postcomentarioilustracao`
  ADD CONSTRAINT `original_ilustracao_post_coment` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_ilustracao_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentarioliteratura`
--
ALTER TABLE `postcomentarioliteratura`
  ADD CONSTRAINT `original_literatura_post_coment` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_literatura_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcomentariomusica`
--
ALTER TABLE `postcomentariomusica`
  ADD CONSTRAINT `original_musica_post_coment` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_musica_usuario_coment` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudofotografia`
--
ALTER TABLE `postconteudofotografia`
  ADD CONSTRAINT `id_contentFotografia` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudoilustracao`
--
ALTER TABLE `postconteudoilustracao`
  ADD CONSTRAINT `id_contentIlustracao` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudoliteratura`
--
ALTER TABLE `postconteudoliteratura`
  ADD CONSTRAINT `id_contentLiteratura` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postconteudomusica`
--
ALTER TABLE `postconteudomusica`
  ADD CONSTRAINT `id_contentMusica` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidafotografia`
--
ALTER TABLE `postcurtidafotografia`
  ADD CONSTRAINT `original_fotografia_post_curtida` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_fotografia_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidailustracao`
--
ALTER TABLE `postcurtidailustracao`
  ADD CONSTRAINT `original_ilustracao_post_curtida` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_ilustracao_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidaliteratura`
--
ALTER TABLE `postcurtidaliteratura`
  ADD CONSTRAINT `original_literatura_post_curtida` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_literatura_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `postcurtidamusica`
--
ALTER TABLE `postcurtidamusica`
  ADD CONSTRAINT `original_musica_post_curtida` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `original_musica_user_curtida` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagfotografia`
--
ALTER TABLE `posttagfotografia`
  ADD CONSTRAINT `original_post` FOREIGN KEY (`id_fotografiaPost`) REFERENCES `posttipofotografia` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagilustracao`
--
ALTER TABLE `posttagilustracao`
  ADD CONSTRAINT `original_post_ilustracao` FOREIGN KEY (`id_ilustracaoPost`) REFERENCES `posttipoilustracao` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagliteratura`
--
ALTER TABLE `posttagliteratura`
  ADD CONSTRAINT `original_post_literatura` FOREIGN KEY (`id_literaturaPost`) REFERENCES `posttipoliteratura` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttagmusica`
--
ALTER TABLE `posttagmusica`
  ADD CONSTRAINT `original_post_musica` FOREIGN KEY (`id_musicaPost`) REFERENCES `posttipomusica` (`postID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipofotografia`
--
ALTER TABLE `posttipofotografia`
  ADD CONSTRAINT `id_fotografo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipoilustracao`
--
ALTER TABLE `posttipoilustracao`
  ADD CONSTRAINT `id_ilustrador` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipoliteratura`
--
ALTER TABLE `posttipoliteratura`
  ADD CONSTRAINT `id_escritor` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posttipomusica`
--
ALTER TABLE `posttipomusica`
  ADD CONSTRAINT `id_musico` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
