-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16/05/2020 às 19:42
-- Versão do servidor: 10.4.8-MariaDB
-- Versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `operacao_padrao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nome_area` varchar(100) NOT NULL,
  `descricao_area` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `area`
--

INSERT INTO `area` (`id_area`, `nome_area`, `descricao_area`) VALUES
(1, 'COI Unidade', 'Gerência administradora do sistema'),
(3, 'Operação Descarregamento', 'Gerência de operação empilhadeiras, rota e virador de vagões.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_pilha_padrao`
--

CREATE TABLE `cadastro_pilha_padrao` (
  `id_cadastro` int(11) NOT NULL,
  `turno_cadastro` varchar(45) NOT NULL,
  `turma_cadastro` varchar(45) DEFAULT NULL,
  `pilha_cadastro` varchar(45) DEFAULT NULL,
  `material_cadastro` varchar(45) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `balizamento_cadastro` varchar(45) DEFAULT NULL,
  `tipoempilhamento_cadastro` varchar(45) DEFAULT NULL,
  `lotes_cadastro` int(11) DEFAULT NULL,
  `padrao_cadastro` varchar(45) DEFAULT NULL,
  `id_pilha_padrao` int(11) DEFAULT NULL,
  `id_periodo_chuvoso` int(11) DEFAULT NULL,
  `obs_cadastro` longtext DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `atualizacao_cadastro` datetime DEFAULT NULL,
  `id_equipamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cadastro_pilha_padrao`
--

INSERT INTO `cadastro_pilha_padrao` (`id_cadastro`, `turno_cadastro`, `turma_cadastro`, `pilha_cadastro`, `material_cadastro`, `data_cadastro`, `balizamento_cadastro`, `tipoempilhamento_cadastro`, `lotes_cadastro`, `padrao_cadastro`, `id_pilha_padrao`, `id_periodo_chuvoso`, `obs_cadastro`, `id_usuario`, `atualizacao_cadastro`, `id_equipamento`) VALUES
(2, '19x07', 'A', 'B401', '1', '2020-05-12 14:45:45', '20x30', 'Conevron', 4, 'Não Padrão', 2, 9, 'TESTE2', 4, '2020-05-12 20:01:00', 1),
(3, '07x19', 'B', 'B100', '1', '2020-05-12 14:50:45', '10x30', 'Windrow Modificado', 4, 'Não Padrão', 3, 10, 'TESTE4', 4, '2020-05-12 19:48:00', 1),
(4, '19x07', 'C', 'B020', '1', '2020-05-12 14:50:15', '10x20', 'Windrow Modificado', 3, 'Não Padrão', 4, 11, 'TESTE2', 4, '2020-05-12 19:51:00', 1),
(5, '07x19', 'A', 'B200', '1', '2020-05-12 14:55:15', '10x20', 'Multichevron', 4, 'Padrão', 5, 12, 'TESTE4345', 4, '2020-05-12 19:53:00', 1),
(6, '19x07', 'C', 'B300', '2', '2020-05-12 14:55:45', '10x20', 'Multichevron', 3, 'Padrão', 6, 13, 'TESTE PELLET', 4, '2020-05-12 19:54:00', 1),
(7, '07x19', 'D', 'B300', '1', '2020-05-12 14:55:30', '10x20', 'Chevron', 3, 'Padrão', 7, 14, 'TESRTE433', 4, '2020-05-12 19:55:00', 1),
(8, '07x19', 'B', 'B200', '1', '2020-05-12 14:55:45', '30x40', 'Multichevron', 5, 'Padrão', 8, 15, 'TESTE', 4, '2020-05-12 19:56:00', 2),
(9, '07x19', 'D', 'B400', '2', '2020-05-12 15:00:30', '10x20', 'Conevron', 3, 'Padrão', 9, 16, 'TSTEASDFASD', 4, '2020-05-12 19:56:00', 1),
(10, '19x07', 'B', 'B200', '1', '2020-05-12 15:00:00', '10x20', 'Conevron', 3, 'Padrão', 10, 17, 'TESTE', 4, '2020-05-12 19:58:00', 2),
(11, '19x07', 'C', 'C200', '1', '2020-05-12 15:00:00', '10x20', 'Chevron', 3, 'Padrão', 11, 18, 'TESTE', 4, '2020-05-12 19:59:00', 1),
(12, '07x19', 'B', 'B202', '1', '2020-05-12 18:00:00', '10x20', 'Multichevron', 3, 'Padrão', 12, 19, 'TESTE', 4, '2020-05-12 22:58:00', 1),
(13, '07x19', 'D', 'B302', '1', '2020-06-02 10:10:30', '10x22', 'Multichevron', 3, 'Não Padrão', 13, 20, 'TESTE MES 6', 4, '2020-05-13 15:10:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `tag_equipamento` varchar(45) NOT NULL,
  `tipo_equipamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `tag_equipamento`, `tipo_equipamento`) VALUES
(1, 'EP313K-02', 'Empilhadeira'),
(2, 'EP313K-03', 'Empilhadeira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodo_chuvoso`
--

CREATE TABLE `periodo_chuvoso` (
  `id_periodo_chuvoso` int(11) NOT NULL,
  `choveu` varchar(5) DEFAULT NULL,
  `agua_base` varchar(5) DEFAULT NULL,
  `saldo_pilha` varchar(5) DEFAULT NULL,
  `deslizamento` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `periodo_chuvoso`
--

INSERT INTO `periodo_chuvoso` (`id_periodo_chuvoso`, `choveu`, `agua_base`, `saldo_pilha`, `deslizamento`) VALUES
(9, 'false', 'false', 'false', 'false'),
(10, 'false', 'false', 'false', 'false'),
(11, 'false', 'false', 'false', 'false'),
(12, 'false', 'false', 'false', 'false'),
(13, 'false', 'false', 'false', 'false'),
(14, 'false', 'false', 'false', 'false'),
(15, 'false', 'false', 'false', 'false'),
(16, 'false', 'false', 'false', 'false'),
(17, 'false', 'false', 'false', 'false'),
(18, 'false', 'false', 'false', 'false'),
(19, 'false', 'false', 'false', 'false'),
(20, 'false', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pilha_padrao`
--

CREATE TABLE `pilha_padrao` (
  `id_pilha_padrao` int(11) NOT NULL,
  `angulo_empilhamento` varchar(5) DEFAULT NULL,
  `tipo_empilhamento` varchar(5) DEFAULT NULL,
  `cabecao_empilhamento` varchar(5) DEFAULT NULL,
  `capacidade_empilhamento` varchar(5) DEFAULT NULL,
  `espacamento_pilha` varchar(5) DEFAULT NULL,
  `espacamento_berma` varchar(5) DEFAULT NULL,
  `espacamento_via` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pilha_padrao`
--

INSERT INTO `pilha_padrao` (`id_pilha_padrao`, `angulo_empilhamento`, `tipo_empilhamento`, `cabecao_empilhamento`, `capacidade_empilhamento`, `espacamento_pilha`, `espacamento_berma`, `espacamento_via`) VALUES
(2, 'true', 'true', 'false', 'false', 'false', 'false', 'false'),
(3, 'true', 'true', 'true', 'true', 'false', 'false', 'false'),
(4, 'true', 'false', 'false', 'false', 'false', 'false', 'false'),
(5, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(6, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(7, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(8, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(9, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(10, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(11, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(12, 'false', 'false', 'false', 'false', 'false', 'false', 'false'),
(13, 'true', 'true', 'false', 'false', 'false', 'false', 'false');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao_produto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `descricao_produto`) VALUES
(1, 'IOCJ', 'Iron Ore Carajás'),
(2, 'PFCJ', 'Pellet Feed Carajás');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_empilhamento`
--

CREATE TABLE `tipo_empilhamento` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tipo_empilhamento`
--

INSERT INTO `tipo_empilhamento` (`id_tipo`, `tipo`) VALUES
(1, 'Chevron'),
(2, 'Conevron'),
(3, 'Multichevron'),
(4, 'Windrow Modificado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(1) NOT NULL,
  `turma` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `turma`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `turno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `turno`
--

INSERT INTO `turno` (`id_turno`, `turno`) VALUES
(1, '07x19'),
(2, '19x07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `matricula_usuario` varchar(45) NOT NULL,
  `tipo_usuario` varchar(45) NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `matricula_usuario`, `tipo_usuario`, `id_area`) VALUES
(3, 'Elilson Santos', '477952', 'Administrador', 1),
(4, 'UserTeste', '477953', 'Operador', 3);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Índices de tabela `cadastro_pilha_padrao`
--
ALTER TABLE `cadastro_pilha_padrao`
  ADD PRIMARY KEY (`id_cadastro`),
  ADD KEY `fk_cadastro_pilha_padrao_periodo_chuvoso1_idx` (`id_periodo_chuvoso`),
  ADD KEY `fk_cadastro_pilha_padrao_equipamento1_idx` (`id_equipamento`);

--
-- Índices de tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Índices de tabela `periodo_chuvoso`
--
ALTER TABLE `periodo_chuvoso`
  ADD PRIMARY KEY (`id_periodo_chuvoso`);

--
-- Índices de tabela `pilha_padrao`
--
ALTER TABLE `pilha_padrao`
  ADD PRIMARY KEY (`id_pilha_padrao`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `tipo_empilhamento`
--
ALTER TABLE `tipo_empilhamento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices de tabela `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_area_idx` (`id_area`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cadastro_pilha_padrao`
--
ALTER TABLE `cadastro_pilha_padrao`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `periodo_chuvoso`
--
ALTER TABLE `periodo_chuvoso`
  MODIFY `id_periodo_chuvoso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `pilha_padrao`
--
ALTER TABLE `pilha_padrao`
  MODIFY `id_pilha_padrao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_empilhamento`
--
ALTER TABLE `tipo_empilhamento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cadastro_pilha_padrao`
--
ALTER TABLE `cadastro_pilha_padrao`
  ADD CONSTRAINT `fk_cadastro_pilha_padrao_equipamento1` FOREIGN KEY (`id_equipamento`) REFERENCES `equipamento` (`id_equipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cadastro_pilha_padrao_periodo_chuvoso1` FOREIGN KEY (`id_periodo_chuvoso`) REFERENCES `periodo_chuvoso` (`id_periodo_chuvoso`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
