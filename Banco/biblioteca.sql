-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jan-2021 às 00:09
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
  `idemprestimo` int(11) NOT NULL,
  `data_incial` date NOT NULL,
  `data_enterga` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `estoque_idEstoque` int(11) NOT NULL,
  `membro_idmembro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(11) NOT NULL,
  `quantidade` varchar(45) NOT NULL,
  `livro_idlivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `idImagem` int(11) NOT NULL,
  `imagem` blob NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idlivro` int(11) NOT NULL,
  `titulo` varchar(125) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `editora` varchar(125) NOT NULL,
  `isbn` int(11) NOT NULL,
  `sinopse` varchar(550) DEFAULT NULL,
  `imagem_idImagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `login`, `senha`) VALUES
(1, 'admin@admin', 'admin123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `idmembro` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `data_nacimento` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(125) NOT NULL,
  `imagem_idImagem` int(11) NOT NULL,
  `login_idLogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `idNoticias` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `data_publicao` date NOT NULL,
  `autor` varchar(250) NOT NULL,
  `texto` varchar(550) NOT NULL,
  `imagem_idImagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`idemprestimo`),
  ADD KEY `fk_emprestimo_estoque1_idx` (`estoque_idEstoque`),
  ADD KEY `fk_emprestimo_membro1_idx` (`membro_idmembro`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idEstoque`),
  ADD KEY `fk_estoque_livro1_idx` (`livro_idlivro`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idImagem`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idlivro`),
  ADD KEY `fk_livro_imagem1_idx` (`imagem_idImagem`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Índices para tabela `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`idmembro`),
  ADD KEY `fk_membro_imagem_idx` (`imagem_idImagem`),
  ADD KEY `fk_membro_login1_idx` (`login_idLogin`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticias`),
  ADD KEY `fk_noticias_imagem1_idx` (`imagem_idImagem`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `idemprestimo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `idlivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `membro`
--
ALTER TABLE `membro`
  MODIFY `idmembro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticias` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_emprestimo_estoque1` FOREIGN KEY (`estoque_idEstoque`) REFERENCES `estoque` (`idEstoque`),
  ADD CONSTRAINT `fk_emprestimo_membro1` FOREIGN KEY (`membro_idmembro`) REFERENCES `membro` (`idmembro`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `fk_estoque_livro1` FOREIGN KEY (`livro_idlivro`) REFERENCES `livro` (`idlivro`);

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_imagem1` FOREIGN KEY (`imagem_idImagem`) REFERENCES `imagem` (`idImagem`);

--
-- Limitadores para a tabela `membro`
--
ALTER TABLE `membro`
  ADD CONSTRAINT `fk_membro_imagem` FOREIGN KEY (`imagem_idImagem`) REFERENCES `imagem` (`idImagem`),
  ADD CONSTRAINT `fk_membro_login1` FOREIGN KEY (`login_idLogin`) REFERENCES `login` (`idLogin`);

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_imagem1` FOREIGN KEY (`imagem_idImagem`) REFERENCES `imagem` (`idImagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
