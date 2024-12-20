-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2023 às 20:26
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `4000870`
--
CREATE DATABASE IF NOT EXISTS `4000870` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `4000870`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amplificadores`
--

CREATE TABLE `amplificadores` (
  `COD_AMP` int(11) NOT NULL,
  `TIPO_AMP` varchar(45) NOT NULL,
  `MARCA_AMP` varchar(45) NOT NULL,
  `MODELO_AMP` varchar(45) NOT NULL,
  `PRECO_AMP` decimal(10,2) NOT NULL,
  `FOTO_AMP` varchar(100) NOT NULL,
  `FILA_COMPRA_AMP` char(1) NOT NULL DEFAULT 'N',
  `VENDAS_COD_VEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `COD_FUN` int(11) NOT NULL,
  `NOME_FUN` varchar(45) NOT NULL,
  `LOGIN_FUN` varchar(45) NOT NULL,
  `SENHA_FUN` varchar(45) NOT NULL,
  `STATUS_FUN` varchar(45) NOT NULL DEFAULT 'ativo',
  `FUNCAO_FUN` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`COD_FUN`, `NOME_FUN`, `LOGIN_FUN`, `SENHA_FUN`, `STATUS_FUN`, `FUNCAO_FUN`) VALUES
(1, 'Administrador do sistema', 'admin', '1', 'ativo', 'administrador'),
(4, 'José da Silva', 'ze', '1', 'ativo', 'estoquista'),
(6, 'Joana D´Arc', 'jo', '1', 'ativo', 'vendedor'),
(7, 'João Moreira', 'jm', '1', 'ativo', 'estoquista'),
(8, 'Carla Nascimento', 'cnas', '1', 'ativo', 'vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `COD_VEN` int(11) NOT NULL,
  `DATA_VEN` varchar(45) NOT NULL,
  `FUNCIONARIOS_COD_FUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  ADD PRIMARY KEY (`COD_AMP`),
  ADD KEY `fk_IMPRESSORAS_VENDAS1_idx` (`VENDAS_COD_VEN`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`COD_FUN`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`COD_VEN`),
  ADD KEY `fk_VENDAS_FUNCIONARIOS_idx` (`FUNCIONARIOS_COD_FUN`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  MODIFY `COD_AMP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `COD_FUN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `COD_VEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `amplificadores`
--
ALTER TABLE `amplificadores`
  ADD CONSTRAINT `fk_IMPRESSORAS_VENDAS1` FOREIGN KEY (`VENDAS_COD_VEN`) REFERENCES `vendas` (`COD_VEN`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_VENDAS_FUNCIONARIOS` FOREIGN KEY (`FUNCIONARIOS_COD_FUN`) REFERENCES `funcionarios` (`COD_FUN`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
