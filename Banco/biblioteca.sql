-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Dez-2020 às 02:45
-- Versão do servidor: 8.0.16
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `Id_Emprestimo` int(11) NOT NULL,
  `Id_Estoque` int(11) NOT NULL,
  `Id_Membros` int(11) NOT NULL,
  `Id_Livro` int(11) NOT NULL,
  `Data_Incial_Emprestimo` date NOT NULL,
  `Data_Final_Emprestimo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `Id_Estoque` int(11) NOT NULL,
  `Id_Livro` int(11) NOT NULL,
  `Quantidade_Estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `Id_Imagem` int(11) NOT NULL,
  `Guarda_Imagem` mediumblob,
  `Nome_imagem` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Id_Livro` int(11) NOT NULL,
  `Nome_Livro` varchar(255) NOT NULL,
  `Autor_Livro` varchar(255) NOT NULL,
  `Editora_Livro` varchar(255) NOT NULL,
  `Edicao_Livro` int(11) NOT NULL,
  `Sinopse_Livro` varchar(255) NOT NULL,
  `Id_Imagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `Id_login` int(11) NOT NULL,
  `Login` varchar(225) NOT NULL,
  `Senha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `Id_Membros` int(11) NOT NULL,
  `Nome_Membros` varchar(225) NOT NULL,
  `Data_Nacimento_Membros` date NOT NULL,
  `Cpf_Membros` varchar(15) NOT NULL,
  `Telefone_Membros` varchar(16) NOT NULL,
  `Email_Membros` varchar(225) NOT NULL,
  `Endereco_Membros` varchar(225) NOT NULL,
  `Id_Imagem` int(11) NOT NULL,
  `Id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`Id_Emprestimo`),
  ADD UNIQUE KEY `id_estoque_Emprestimo` (`Id_Estoque`),
  ADD UNIQUE KEY `id_Membros_Emprestimo` (`Id_Membros`),
  ADD UNIQUE KEY `id_livro_Emprestimo` (`Id_Livro`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`Id_Estoque`),
  ADD UNIQUE KEY `id_livro_Estoque` (`Id_Livro`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`Id_Imagem`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Id_Livro`),
  ADD UNIQUE KEY `id_imagem_Livro_flc` (`Id_Imagem`) USING BTREE;

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_login`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`Id_Membros`),
  ADD UNIQUE KEY `Id_login_flc` (`Id_login`),
  ADD UNIQUE KEY `id_imagem_Membro_flc` (`Id_Imagem`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `Id_Emprestimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `Id_Estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `Id_Imagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Id_Livro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `Id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `Id_Membros` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `id_livro_Estoque` FOREIGN KEY (`Id_Livro`) REFERENCES `livro` (`Id_Livro`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `id_imagem_Livro_flc` FOREIGN KEY (`Id_Imagem`) REFERENCES `imagem` (`Id_Imagem`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `membros`
--
ALTER TABLE `membros`
  ADD CONSTRAINT `Id_login_flc` FOREIGN KEY (`Id_login`) REFERENCES `login` (`Id_login`),
  ADD CONSTRAINT `id_imagem_Membro_flc` FOREIGN KEY (`Id_Imagem`) REFERENCES `imagem` (`Id_Imagem`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
