-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/06/2026 às 17:57
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
-- Banco de dados: `doacoes_ifpr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id_usuario` int(11) NOT NULL,
  `localColeta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `beneficiario`
--

INSERT INTO `beneficiario` (`id_usuario`, `localColeta`) VALUES
(77, 'IFPR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `doador`
--

CREATE TABLE `doador` (
  `id_usuario` int(11) NOT NULL,
  `localColeta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doador`
--

INSERT INTO `doador` (`id_usuario`, `localColeta`) VALUES
(75, 'CRÁS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item_doacao`
--

CREATE TABLE `item_doacao` (
  `id_item` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Disponível',
  `foto` varchar(255) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `hora_cadastro` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item_doacao`
--

INSERT INTO `item_doacao` (`id_item`, `id_usuario`, `titulo`, `descricao`, `categoria`, `status`, `foto`, `data_cadastro`, `hora_cadastro`) VALUES
(25, 75, 'Bicicleta infantil', 'Bicicleta Aro 12 conservada.', 'Brinquedos', 'disponivel', 'assets/img/1782574681_bicilceta.jpg', '2026-06-27', '12:38:01'),
(26, 75, 'Moletom masculino', 'Moletom masculino M | NOVO.', 'Vestuário', 'disponivel', 'assets/img/1782574720_bluusa.jpg', '2026-06-27', '12:38:40'),
(27, 75, 'Camiseta Infantil', 'Camiseta do Brasil infantil | Tamanho 12 | Conservada', 'Vestuário', 'doado', 'assets/img/1782574746_camiseta infantil.jpg', '2026-06-27', '12:39:06'),
(28, 75, 'Cesta Básica', 'Cesta básica | Validade 1 mês', 'Alimentos', 'disponivel', 'assets/img/1782574775_cesta basica.webp', '2026-06-27', '12:39:35'),
(29, 75, 'Cômoda', 'Cômoda 4 gavetas e uma porta | pequena.', 'Móveis', 'disponivel', 'assets/img/1782574817_comoda.webp', '2026-06-27', '12:40:17'),
(30, 75, 'Tênis masculino', 'Tênis masculino | tamanho 42 | Usado 3 vezes.', 'Vestuário', 'disponivel', 'assets/img/1782574856_tenis.jpg', '2026-06-27', '12:40:56'),
(31, 75, 'Ursinho de Pelúcia', 'Urso de pelúcia novo.', 'Brinquedos', 'disponivel', 'assets/img/1782574881_ursinho.jpg', '2026-06-27', '12:41:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_doacao`
--

CREATE TABLE `pedido_doacao` (
  `id_pedido` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` date NOT NULL,
  `status` varchar(20) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido_doacao`
--

INSERT INTO `pedido_doacao` (`id_pedido`, `id_item`, `id_usuario`, `data`, `status`) VALUES
(8, 27, 77, '2026-06-27', 'solicitado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `tipoPerfil` varchar(50) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `telefone`, `tipoPerfil`, `dataNascimento`) VALUES
(75, 'Anne Ferreira', 'ferreirane2509@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '43 9 96546456', 'Doador', '2006-02-10'),
(76, 'Beatriz Valle ', 'beatriz@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '4399843425', 'Voluntario', '1971-02-09'),
(77, 'Pedro Aurelio Ferreira', 'pedro@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '43965874123', 'Beneficiario_Normal', '1996-12-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `voluntario`
--

CREATE TABLE `voluntario` (
  `id_usuario` int(11) NOT NULL,
  `horarioDisponibilidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `voluntario`
--

INSERT INTO `voluntario` (`id_usuario`, `horarioDisponibilidade`) VALUES
(76, 'Tarde');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `doador`
--
ALTER TABLE `doador`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `item_doacao`
--
ALTER TABLE `item_doacao`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_doad_exclusiva` (`id_usuario`);

--
-- Índices de tabela `pedido_doacao`
--
ALTER TABLE `pedido_doacao`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_item_exclusiva` (`id_item`),
  ADD KEY `fk_pedido_benef_exclusiva` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `voluntario`
--
ALTER TABLE `voluntario`
  ADD KEY `fk_voluntario_usr_exclusiva` (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item_doacao`
--
ALTER TABLE `item_doacao`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `pedido_doacao`
--
ALTER TABLE `pedido_doacao`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_beneficiario_usr_exclusiva` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_beneficiario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `doador`
--
ALTER TABLE `doador`
  ADD CONSTRAINT `doador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_doador_usr_exclusiva` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_doador_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `item_doacao`
--
ALTER TABLE `item_doacao`
  ADD CONSTRAINT `fk_item_doad_exclusiva` FOREIGN KEY (`id_usuario`) REFERENCES `doador` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_doacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `doador` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `pedido_doacao`
--
ALTER TABLE `pedido_doacao`
  ADD CONSTRAINT `fk_pedido_benef_exclusiva` FOREIGN KEY (`id_usuario`) REFERENCES `beneficiario` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pedido_item_exclusiva` FOREIGN KEY (`id_item`) REFERENCES `item_doacao` (`id_item`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_doacao_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item_doacao` (`id_item`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_doacao_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `beneficiario` (`id_usuario`) ON DELETE CASCADE;

--
-- Restrições para tabelas `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `fk_voluntario_usr_exclusiva` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
