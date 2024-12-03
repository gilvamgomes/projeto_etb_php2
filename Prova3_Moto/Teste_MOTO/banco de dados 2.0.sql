-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/11/2024 às 22:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `Cod_cliente` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Rg` int(11) NOT NULL,
  `Cnh` varchar(45) NOT NULL,
  `Data_de_nascimento` date NOT NULL,
  `Endereco` varchar(45) NOT NULL,
  `Telefone` varchar(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Historico_de_compras` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`Cod_cliente`, `Nome`, `Cpf`, `Rg`, `Cnh`, `Data_de_nascimento`, `Endereco`, `Telefone`, `Email`, `Historico_de_compras`) VALUES
(1, 'João', '000000000', 0, '444444444', '2000-01-01', 'rua J', '888888888', 'joao@email.com', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `Cod_Fun` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Rg` int(10) NOT NULL,
  `Nascimento` date NOT NULL,
  `Endereco` varchar(45) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Senha` varchar(11) NOT NULL,
  `Funcao` varchar(45) NOT NULL,
  `Status` varchar(45) NOT NULL DEFAULT 'ATIVADO',
  `Admissao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`Cod_Fun`, `Nome`, `Cpf`, `Rg`, `Nascimento`, `Endereco`, `Telefone`, `Email`, `Login`, `Senha`, `Funcao`, `Status`, `Admissao`) VALUES
(2, 'Administrador do Sistema', '00000000000', 0, '0000-00-00', 'Rua', '000000000', 'admin@gmail.com', 'admin', '1', 'Administrador', 'ATIVADO', '19.11.2024'),
(3, 'Wevertton Silva', '00000030402', 6000, '2002-02-20', 'rua1', '999999999', 'w.email@email.com', 'user', '1', 'Estoquista', 'ATIVADO', '2024'),
(5, 'teste', '00000030402', 6000, '2002-02-20', 'rua1', '999999999', 'teste@email.com', 'user', '1', 'Estoquista', 'ATIVADO', '2024'),
(6, 'dani', '000000000', 0, '1990-01-01', 'rua 1 lote2 quadra12', '999999999', 'dani@email.com', 'user', '1', 'Vendedor', 'ATIVADO', '2024-11-30 18:12:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `moto`
--

CREATE TABLE `moto` (
  `Cod_moto` int(11) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `Ano_de_fabricacao` varchar(45) NOT NULL,
  `Cor` varchar(45) NOT NULL,
  `Numero_do_chassi` varchar(45) NOT NULL,
  `Cilindrada` varchar(45) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Preco_de_custo` varchar(45) NOT NULL,
  `Preco_de_venda` varchar(45) NOT NULL,
  `Quantidade_em_estoque` int(11) NOT NULL,
  `Tipo_de_combustivel` varchar(45) NOT NULL,
  `Potencia` varchar(45) NOT NULL,
  `Sistema_de_freios` varchar(45) NOT NULL,
  `Abs` varchar(45) NOT NULL,
  `Peso` varchar(45) NOT NULL,
  `Capacidade_do_tanque` varchar(45) NOT NULL,
  `Tipo_de_partida` varchar(45) NOT NULL,
  `Status_de_disponibilidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `moto`
--

INSERT INTO `moto` (`Cod_moto`, `Marca`, `Modelo`, `Ano_de_fabricacao`, `Cor`, `Numero_do_chassi`, `Cilindrada`, `Tipo`, `Preco_de_custo`, `Preco_de_venda`, `Quantidade_em_estoque`, `Tipo_de_combustivel`, `Potencia`, `Sistema_de_freios`, `Abs`, `Peso`, `Capacidade_do_tanque`, `Tipo_de_partida`, `Status_de_disponibilidade`) VALUES
(1, 'Honda', 'CB150', '2021', 'vermelha', '33232', '', '', '', '20000', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `Cod_Venda` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora` varchar(45) NOT NULL,
  `Responsavel_pela_venda` varchar(45) NOT NULL,
  `Valor_total` varchar(45) NOT NULL,
  `Valor_de_entrada` varchar(45) NOT NULL,
  `Forma_de_pagamento` varchar(45) NOT NULL,
  `Numero_de_parcelas` int(12) NOT NULL,
  `Status_da_venda` varchar(45) NOT NULL,
  `Cod_Fun` int(11) NOT NULL,
  `Cod_cliente` int(11) NOT NULL,
  `Cod_moto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_cliente`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`Cod_Fun`);

--
-- Índices de tabela `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`Cod_moto`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`Cod_Venda`),
  ADD KEY `fk_Venda_Funcionarios_idx` (`Cod_Fun`),
  ADD KEY `fk_Venda_Cliente1_idx` (`Cod_cliente`),
  ADD KEY `fk_Venda_Moto1_idx` (`Cod_moto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `Cod_Fun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `moto`
--
ALTER TABLE `moto`
  MODIFY `Cod_moto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `Cod_Venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_Venda_Cliente1` FOREIGN KEY (`Cod_cliente`) REFERENCES `cliente` (`Cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_Funcionarios` FOREIGN KEY (`Cod_Fun`) REFERENCES `funcionarios` (`Cod_Fun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_Moto1` FOREIGN KEY (`Cod_moto`) REFERENCES `moto` (`Cod_moto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
