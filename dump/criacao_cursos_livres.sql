-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Abr-2022 às 16:15
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `criacao_cursos_livres`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_curso_livre`
--

CREATE TABLE `classe_curso_livre` (
  `sequencia` int(11) NOT NULL,
  `codcurso` int(11) DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `semestre` tinyint(4) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  `termo` int(2) DEFAULT NULL,
  `turma` char(1) DEFAULT NULL,
  `idmoodle` int(11) DEFAULT NULL,
  `idcategoriapaimoodle` int(11) NOT NULL,
  `codtipocurso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codtipocurso` int(2) NOT NULL,
  `codcurso` int(3) NOT NULL,
  `nomecurso` varchar(50) NOT NULL,
  `iniciocurso` date DEFAULT NULL,
  `nomegraumasculino` varchar(150) DEFAULT NULL,
  `nomegraufeminino` varchar(150) DEFAULT NULL,
  `idcursoinep` int(12) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nomecursocompleto` varchar(150) DEFAULT NULL,
  `modalidade` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codtipocurso`, `codcurso`, `nomecurso`, `iniciocurso`, `nomegraumasculino`, `nomegraufeminino`, `idcursoinep`, `descricao`, `nomecursocompleto`, `modalidade`) VALUES
(1, 1, 'ADS', '2022-02-02', 'sla', 'sla', 1, 'Desenvolvimento de Softwares e Gestão de Projetos', 'Análise e Desenvolvimento de Sietemas', NULL),
(4, 2, 'ADM', '2022-02-06', 'sla', 'sla', 2, 'Gestão de Negócios', 'Administração', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_curso_livre`
--

CREATE TABLE `professor_curso_livre` (
  `username` varchar(100) NOT NULL,
  `cursolivre` int(11) NOT NULL,
  `nomecompleto` varchar(50) DEFAULT NULL,
  `criado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classe_curso_livre`
--
ALTER TABLE `classe_curso_livre`
  ADD PRIMARY KEY (`sequencia`),
  ADD KEY `class_cur_fk` (`codtipocurso`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codtipocurso`,`codcurso`);

--
-- Índices para tabela `professor_curso_livre`
--
ALTER TABLE `professor_curso_livre`
  ADD PRIMARY KEY (`username`,`cursolivre`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classe_curso_livre`
--
ALTER TABLE `classe_curso_livre`
  MODIFY `sequencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `classe_curso_livre`
--
ALTER TABLE `classe_curso_livre`
  ADD CONSTRAINT `class_cur_fk` FOREIGN KEY (`codtipocurso`) REFERENCES `curso` (`codtipocurso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
