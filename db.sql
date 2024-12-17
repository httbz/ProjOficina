CREATE DATABASE IF NOT EXISTS `bdoficina` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdoficina`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) PRIMARY key AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `email` varchar(400) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endBairro` varchar(400) NOT NULL,
  `endCidade` varchar(400) NOT NULL,
  `endComplemento` varchar(400) NOT NULL,
  `endNum` varchar(10) NOT NULL,
  `endRua` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`nome`, `sexo`, `dataNasc`, `email`, `celular`, `cpf`, `endBairro`, `endCidade`, `endComplemento`, `endNum`, `endRua`) VALUES
('Julia Matos', 'F', '2024-12-12', 'Jm@jm', '(12) 32312-3123', '123.123.123', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a'),
('Jorge Campos', 'M', '2024-12-04', 'jc@jc', '(12) 31231-2312', '123.123.123', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a'),
('fantinel', 'M', '2024-12-12', '123@123', '(12) 31231-2323', '123.123.123', 'N/a', 'N/a', 'N/a', 'N/a', 'N/a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(1000) NOT NULL,
  `valorCusto` double NOT NULL,
  `valorVenda` double NOT NULL,
  `referencia` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`descricao`, `valorCusto`, `valorVenda`, `referencia`) VALUES
('Bieleta', 30, 300, '12312ffas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `fkProduto` int(11) DEFAULT NULL,
  `qtd` int(11) NOT NULL,
  `qtdMax` int(11) NOT NULL,
  `qtdMin` int(11) NOT NULL,
  FOREIGN KEY (`fkProduto`) REFERENCES `produtos` (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(1000) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
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
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` ( `nome`, `tipo`, `senha`, `sexo`, `dataNasc`, `email`, `endCidade`, `endBairro`, `endNum`, `endComplemento`, `endrua`, `celular`, `cpf`) VALUES
( 'be', 'admin', '$2y$10$W/jKtY31Sk2JOHc/7fBWKOWfaWgRSI.iZKU3OY4zRi/B4Y4lJEEJ6', 'M', '2006-01-05', 'b@b.com', 'Sapuka city', 'N/a', 'N/a', 'N/a', '', 0, 121312),
( 'gab', 'admin', '$2y$10$nkiDc14uIBiViP482aevwumNfNMbf8uI/WYP9QgdIR9rD6fswGDi6', 'M', '2005-11-16', 'gab@gab.com', 'Sapuka city', 'N/a', 'N/a', 'N/a', '', 0, 123123),
( 'fant', 'admin', '$2y$10$yJmp2HWbSzse.mrLfuRube3Ej/6niI13CsJexH.nfprBaFeUUCKFy', 'M', '2007-03-24', 'fant@fant.com', 'Esteio ruinzão', 'N/a', 'N/a', 'N/a', '', 0, 212312),
( 'admin', 'admin', '$2y$10$aR2q56P2SQxviQJmtjqOUuZnDUkympfqGLXMI1lbMWJSUFRd4hx8K', 'M', '2024-12-12', 'admin@admin', 'N/a', 'N/a', 'N/a', 'N/a', '', 0, 123123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `fkCliente` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(100) NOT NULL,
   FOREIGN KEY (`fkCliente`) REFERENCES `clientes` (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Alter Table
--

ALTER TABLE usuarios ADD COLUMN codigo_verificacao VARCHAR(10) DEFAULT
NULL;
