

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teiu_saet`
--
CREATE DATABASE IF NOT EXISTS `sae` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sae`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saet_assinaturas`
--

CREATE TABLE `saet_assinaturas` (
  `assinatura_id` int(11) NOT NULL,
  `assinatura_nome` varchar(100) NOT NULL,
  `assinatura_cargo` varchar(100) NOT NULL,
  `assinatura_email` varchar(50) NOT NULL,
  `assinatura_telefone` varchar(20) NOT NULL,
  `assinatura_celular` varchar(20) DEFAULT NULL,
  `assinatura_id_empresa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saet_empresas`
--

CREATE TABLE `saet_empresas` (
  `empresa_id` int(11) NOT NULL,
  `empresa_nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `saet_empresas`
--

INSERT INTO `saet_empresas` (`empresa_id`, `empresa_nome`) VALUES
(1, 'TEIÚ'),
(2, 'KAIOKA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saet_assinaturas`
--
ALTER TABLE `saet_assinaturas`
  ADD PRIMARY KEY (`assinatura_id`),
  ADD KEY `fk_empresa` (`assinatura_id_empresa`);

--
-- Indexes for table `saet_empresas`
--
ALTER TABLE `saet_empresas`
  ADD PRIMARY KEY (`empresa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saet_assinaturas`
--
ALTER TABLE `saet_assinaturas`
  MODIFY `assinatura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `saet_empresas`
--
ALTER TABLE `saet_empresas`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `saet_assinaturas`
--
ALTER TABLE `saet_assinaturas`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`assinatura_id_empresa`) REFERENCES `saet_empresas` (`empresa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
