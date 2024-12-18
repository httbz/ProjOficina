-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/12/2024 às 05:04
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdoficina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(400) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endBairro` varchar(400) NOT NULL,
  `endCidade` varchar(400) NOT NULL,
  `endComplemento` varchar(400) NOT NULL,
  `endNum` varchar(10) NOT NULL,
  `endRua` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sexo`, `dataNasc`, `email`, `celular`, `cpf`, `endBairro`, `endCidade`, `endComplemento`, `endNum`, `endRua`) VALUES
(2, 'Jorge Campos', 'M', '2024-12-04', 'jc@jc', '(12) 31231-2312', '123.123.123-12', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a'),
(5, 'Julia dos Santos', 'F', '2024-12-17', 'JdS@gmai.com', '(12) 32312-3123', '123.123.123-21', 'N/a', 'Sapucaia do Sul', 'N/a', '823', 'No'),
(6, 'Carlos José', 'M', '2024-12-18', 'Cj@cj.com', '(12) 31232-1312', '123.213.123-12', 'a', 'a', 'qa', 'a', 'a'),
(7, 'Lady Gaga', 'F', '2024-12-18', 'Lady@gaga.com', '(45) 98070-4789', '409.586.045-96', 'a', 'a', 'a', 'a', 'a'),
(8, 'Kanye West', 'M', '2024-12-18', 'kanye@west', '(38) 49750-9834', '783.406.784-36', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `fkProduto` int(11) DEFAULT NULL,
  `qtd` int(11) NOT NULL,
  `qtdMax` int(11) NOT NULL,
  `qtdMin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `fkProduto`, `qtd`, `qtdMax`, `qtdMin`) VALUES
(5, 1, 15, 500, 2),
(6, 2, 400, 440, 1),
(7, 4, 5, 20, 0),
(8, 5, 2, 20, 0),
(9, 6, 2, 10, 1),
(10, 7, 20, 50, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `valorCusto` double NOT NULL,
  `valorVenda` double NOT NULL,
  `referencia` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `valorCusto`, `valorVenda`, `referencia`) VALUES
(1, 'Bieleta Customizada', 30, 300, '1000234'),
(2, 'Retrovisor de Chevvas', 650, 40, 'RetChevvy75'),
(4, 'Parabrisa FOX 10/11/12/13', 300, 450, 'pbfx10111213'),
(5, 'Parachoque Prisma 13/14/15/16', 350, 500, 'prcqprsm13141516'),
(6, 'Mola de Suspensão dianteira  SPEEDHUNTERS', 300, 500, 'molasuspdspdhntr'),
(7, 'Multimída universal', 500, 900, 'mult5009001550');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `valor` double NOT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `descricao`, `valor`, `tipo`) VALUES
(2, 'Instalação de Amortecedor', 160, 'Mecânico'),
(4, 'Aplicação de Cera automotiva', 95, 'Estético'),
(5, 'Instalação de Módulo eletrônico', 90, 'Elétrico'),
(7, 'Lavagem Completa', 500, 'Estético'),
(8, 'Lavagem Simples', 250, 'Estético'),
(9, 'Mão de Obra', 220, 'Mecânico'),
(10, 'Instalação de Multimídia', 400, 'Elétrico'),
(11, 'Troca de óleo', 90, 'Mecânico'),
(12, 'Troca do Fluído de Arrefecimento', 90, 'Mecânico'),
(13, 'Troca de Pneus', 100, 'Mecânico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(400) NOT NULL,
  `endCidade` varchar(400) NOT NULL,
  `endBairro` varchar(400) NOT NULL,
  `endNum` varchar(10) NOT NULL,
  `endComplemento` varchar(400) NOT NULL,
  `endrua` varchar(400) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `tipo`, `senha`, `sexo`, `dataNasc`, `email`, `endCidade`, `endBairro`, `endNum`, `endComplemento`, `endrua`, `celular`, `cpf`, `reset_token`, `reset_expira`) VALUES
(1, 'be', 'admin', '$2y$10$W/jKtY31Sk2JOHc/7fBWKOWfaWgRSI.iZKU3OY4zRi/B4Y4lJEEJ6', 'M', '2006-01-05', 'bernardo.zandonai@gmail.com', 'Sapuka City', 'N/a', 'N/a', 'N/a', 'N/a', '(03) 12321-3123', '213.123.212-13', NULL, NULL),
(2, 'gab', 'admin', '$2y$10$nkiDc14uIBiViP482aevwumNfNMbf8uI/WYP9QgdIR9rD6fswGDi6', 'M', '2005-11-16', 'glcgarcia@gmail.com', 'Sapuka city', 'N/a', 'N/a', 'N/a', 'N/a', '(01) 23123-3123', '123.123.213-12', NULL, NULL),
(3, 'fant', 'admin', '$2y$10$yJmp2HWbSzse.mrLfuRube3Ej/6niI13CsJexH.nfprBaFeUUCKFy', 'M', '2007-03-24', 'fant@fant.com', 'Esteio ruinzão', 'N/a', 'N/a', 'N/a', 'N/a', '(01) 23123-2313', '123.213.213-12', NULL, NULL),
(4, 'admin', 'admin', '$2y$10$aR2q56P2SQxviQJmtjqOUuZnDUkympfqGLXMI1lbMWJSUFRd4hx8K', 'M', '2024-12-12', 'admin@admin', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a', '(12) 32313-3231', '123.231.232-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `fkCliente` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `fkCliente`, `modelo`, `marca`, `ano`, `placa`) VALUES
(2, 2, 'Uno', 'Fiat', 2011, 'MKO7320'),
(3, 8, 'opala', 'Chevrolet', 1976, 'GRD7B01'),
(4, 7, 'Dolphin', 'BYD', 2024, 'SLK1919'),
(5, 5, 'Camry', 'Toyota', 2009, 'COL4D02'),
(6, 5, 'Fox', 'Volkswagen', 2016, 'ICS2536');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkProduto` (`fkProduto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCliente` (`fkCliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`fkProduto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`fkCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
