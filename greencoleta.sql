-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2023 às 13:32
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `greencoleta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `telefone`, `senha`, `endereco`, `bairro`, `cep`, `cidade`, `estado`, `numero`, `foto_perfil`, `token`, `data_cadastro`) VALUES
(1, 'Paulo Amaral', 'ppaulo.developer@gmail.com', '(73) 98209-3868', '$2y$10$xes5RVUC9gKu/73iBgicZe2ZU2rlz.rIzEp3tk852QrOyL2U7E57C', 'Loide Alcantara', 'Centro', '45850-000', 'Itagimirim', 'BA', 107, NULL, '403ec73a64a1d11a237dc0c9cf6bfadf', '2023-09-05 22:01:40'),
(9, 'Joao Sobral', 'joaosobral@gmail.com', '(73) 11111-1111', '$2y$10$unzwuXI4DxXt31LOmyJvU.BkSolet0W0A96fuv.BtFSkJImH8QnT.', 'Rua 12 Santa Izabel', 'Perocão', '29220-616', 'Itagimirim', 'ES', 12, NULL, 'a0b70b3a0bd3ff52f39576ea5800b8a0', '2023-09-06 00:31:39'),
(53, 'oi', 'oi', 'oi', '$2y$10$WHec4/kAGlItB.p59bEENOUDftEXKYMQD5F/LImYIxYzaGIVM2z/a', 'oi', 'oi', 'oi', 'oi', 'oi', 2, NULL, '84b3a4f4c5a8942e14d195fbe3fe5a18', '2023-09-06 21:21:11'),
(54, 'Lara Beatriz', 'larabia@gmail.com', '12312313', '$2y$10$EAq.uWV6W0lHvrlnJA1YV.DiAF20rCN2QXyc0hGvLrtNID4zMgksa', '0', '0', '0', '0', '0', 0, NULL, '23ace25ae7cfff34303163c13026c6ae', '2023-09-06 22:35:08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
