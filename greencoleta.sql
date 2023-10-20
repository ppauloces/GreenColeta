-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2023 às 22:30
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
-- Estrutura da tabela `coletas`
--

CREATE TABLE `coletas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coletor` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `papel` char(1) NOT NULL DEFAULT 'N',
  `plastico` char(1) NOT NULL DEFAULT 'N',
  `metal` char(1) NOT NULL DEFAULT 'N',
  `vidro` char(1) NOT NULL DEFAULT 'N',
  `ferro` char(1) NOT NULL DEFAULT 'n',
  `papelao` char(1) NOT NULL DEFAULT 'N',
  `eletronicos` char(1) NOT NULL DEFAULT 'N',
  `imagem` varchar(255) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `rua` varchar(75) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(75) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `ponto_referencia` varchar(255) NOT NULL,
  `situacao` int(1) NOT NULL DEFAULT 0,
  `observacao` text DEFAULT NULL,
  `observacao_coletor` text DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `coletas`
--

INSERT INTO `coletas` (`id`, `id_user`, `id_coletor`, `data`, `papel`, `plastico`, `metal`, `vidro`, `ferro`, `papelao`, `eletronicos`, `imagem`, `cep`, `rua`, `cidade`, `bairro`, `estado`, `numero`, `ponto_referencia`, `situacao`, `observacao`, `observacao_coletor`, `token`) VALUES
(11, 56, 5, '2023-10-18 20:27:10', 'S', 'N', 'N', 'N', 'N', 'N', 'N', 'bbe7ff4e0822a79c0248b8fe42925390.png', '45850-000', 'Loide Alcantara', 'Itagimirim', 'Centro', 'BA', '107', 'Perto dali', 2, 'Pouco material!', '', '2b5fb3189836b3729ce6362061831ee9'),
(12, 56, 5, '2023-10-19 02:15:56', 'S', 'N', 'S', 'S', 'N', 'N', 'N', '1ddfc5e4b481763749fdacc7729e422e.png', '45850-000', 'Loide Alcantara', 'Itagimirim', 'Centro', 'BA', '107', 'Perto dali', 2, 'NOSSA EMPRESA NÃO CONSEGUE ACESSAR ESSA LOCALIDADE, E ALÉM DE NÃO POSSUIR MATERIAL SUFICIENTE PARA COLETA, GRATO!', '', '2bc1b0071357ad473d3d9184acc81788'),
(13, 56, 5, '2023-10-19 02:55:10', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'da180b3a83050e10f2e8c88b6da9d6af.jpg', '45850-000', 'Loide Alcantara', 'Itagimirim', 'Centro', 'BA', '107', 'Perto dali', 4, NULL, 'Deu tudo certo!', 'ff5cb910d76570791af593143abd5ac0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletas_recusadas`
--

CREATE TABLE `coletas_recusadas` (
  `id` int(11) NOT NULL,
  `id_coletor` int(11) NOT NULL,
  `id_coleta` int(11) NOT NULL,
  `observacao` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coletor`
--

CREATE TABLE `coletor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  `identificador` varchar(25) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `coletor`
--

INSERT INTO `coletor` (`id`, `nome`, `email`, `identificador`, `telefone`, `senha`, `cep`, `endereco`, `token`, `data_cadastro`) VALUES
(4, 'GreenColeta', 'greencoleta@gmail.com', '123', '123', '$2y$10$ouEgHW.E3d0TTthLjPfoZ.RS8heg/iak/48NLVxsYi22yTFjKs5WK', '', '', '94917e460150ed0b16dfa621e93c865f', '2023-09-12 22:43:06'),
(5, 'Coletor', 'coletor@greencoleta.com.br', '1231231231313', '123123123132', '$2y$10$hDUzf.TfjAL3UA7RF2JV8OU4wCDEEnfv3besfSzzgfKZ4vMREF20i', '45850000', '', '387e0b82b1a0ccf0273faccef077a4ce', '2023-10-10 22:55:09');

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
(56, 'Usuário 1', 'usuario@greencoleta.com.br', '(73) 98209-3868', '$2y$10$3CdiFNgSpTsb/AVqrPWa/uJkylEE7xRxv8UGkXFjag2NOtaC4XZlS', 'Loide Alcantara', 'Centro', '45850-000', 'Itagimirim', 'BA', 107, NULL, 'a5fe1e7557da8290be04dcadac64899e', '2023-10-10 22:45:25');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `coletas`
--
ALTER TABLE `coletas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_coletor` (`id_coletor`);

--
-- Índices para tabela `coletas_recusadas`
--
ALTER TABLE `coletas_recusadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coleta` (`id_coleta`),
  ADD KEY `id_coletor` (`id_coletor`);

--
-- Índices para tabela `coletor`
--
ALTER TABLE `coletor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `coletas`
--
ALTER TABLE `coletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `coletas_recusadas`
--
ALTER TABLE `coletas_recusadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `coletor`
--
ALTER TABLE `coletor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
