-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/06/2025 às 03:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancophp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `valor` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `nome`, `descricao`, `valor`) VALUES
(1, 'lavagem', 'banho e tosaa  ', 150.00),
(3, 'manicure', 'cortar as unhas', 100.00),
(4, 'Vacina', 'Vacina', 10.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `data_consulta` datetime DEFAULT NULL,
  `pets_chip` int(11) NOT NULL,
  `atendimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `data_consulta`, `pets_chip`, `atendimento_id`) VALUES
(1, '2002-05-05 00:00:00', 2, 1),
(2, '2025-05-05 00:00:00', 4, 3),
(4, '2025-06-13 00:00:00', 123456, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `chip` int(11) NOT NULL,
  `nome_pet` varchar(45) DEFAULT NULL,
  `idade_pet` int(11) DEFAULT NULL,
  `raca_pet` varchar(45) DEFAULT NULL,
  `tutores_cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`chip`, `nome_pet`, `idade_pet`, `raca_pet`, `tutores_cpf`) VALUES
(2, 'Margoth', 4, 'Vira-latah', 12),
(4, 'Dinho', 4, 'Vira-latah', 24),
(5, 'cheetos', 2, 'lhasa apso', 24),
(123456, 'Pipoca', 10, 'Labradora', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tutores`
--

CREATE TABLE `tutores` (
  `cpf` int(11) NOT NULL,
  `nome_tutor` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tutores`
--

INSERT INTO `tutores` (`cpf`, `nome_tutor`, `data_nascimento`, `telefone`) VALUES
(12, 'Maria', '1999-05-02', 2342342),
(24, 'Italo', '1999-07-19', 23423423);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'noemi santos', 'no@no.com', '$2y$10$E8yvJEgUSWPkq4KWQIPsceZDaJPjiUm5EBy9idJcCOhN8Lpc4B7OO');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consulta_pets1_idx` (`pets_chip`),
  ADD KEY `fk_consulta_atendimento1_idx` (`atendimento_id`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`chip`),
  ADD KEY `fk_pets_tutores_idx` (`tutores_cpf`);

--
-- Índices de tabela `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_atendimento1` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_pets1` FOREIGN KEY (`pets_chip`) REFERENCES `pets` (`chip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk_pets_tutores` FOREIGN KEY (`tutores_cpf`) REFERENCES `tutores` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
