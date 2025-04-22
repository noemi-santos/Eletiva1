-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bancophp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bancophp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bancophp` DEFAULT CHARACTER SET utf8 ;
USE `bancophp` ;

-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
-- -----------------------------------------------------
-- Table `bancophp`.`tutores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancophp`.`tutores` (
  `cpf` INT NOT NULL,
  `nome_tutor` VARCHAR(45) NULL,
  `data_nascimento` DATETIME NULL,
  `telefone` INT NULL,
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancophp`.`pets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancophp`.`pets` (
  `chip` INT NOT NULL,
  `nome_pet` VARCHAR(45) NULL,
  `idade_pet` INT NULL,
  `raça_pet` VARCHAR(45) NULL,
  `tutores_cpf` INT NOT NULL,
  PRIMARY KEY (`chip`),
  INDEX `fk_pets_tutores_idx` (`tutores_cpf` ASC),
  CONSTRAINT `fk_pets_tutores`
    FOREIGN KEY (`tutores_cpf`)
    REFERENCES `bancophp`.`tutores` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancophp`.`atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancophp`.`atendimento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `descrição` VARCHAR(45) NULL,
  `valor` DECIMAL(5,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancophp`.`consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancophp`.`consulta` (
  `id_consulta` INT NOT NULL AUTO_INCREMENT,
  `data_consulta` DATETIME NULL,
  `pets_chip` INT NOT NULL,
  `atendimento_id` INT NOT NULL,
  PRIMARY KEY (`id_consulta`),
  INDEX `fk_consulta_pets1_idx` (`pets_chip` ASC),
  INDEX `fk_consulta_atendimento1_idx` (`atendimento_id` ASC),
  CONSTRAINT `fk_consulta_pets1`
    FOREIGN KEY (`pets_chip`)
    REFERENCES `bancophp`.`pets` (`chip`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_atendimento1`
    FOREIGN KEY (`atendimento_id`)
    REFERENCES `bancophp`.`atendimento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancophp`.`consulta_has_atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancophp`.`consulta_has_atendimento` (
  `consulta_id_consulta` INT NOT NULL,
  `consulta_tutores_cpf` INT NOT NULL,
  `atendimento_id` INT NOT NULL,
  PRIMARY KEY (`consulta_id_consulta`, `consulta_tutores_cpf`, `atendimento_id`),
  INDEX `fk_consulta_has_atendimento_atendimento1_idx` (`atendimento_id` ASC),
  INDEX `fk_consulta_has_atendimento_consulta1_idx` (`consulta_id_consulta` ASC, `consulta_tutores_cpf` ASC),
  CONSTRAINT `fk_consulta_has_atendimento_consulta1`
    FOREIGN KEY (`consulta_id_consulta`)
    REFERENCES `bancophp`.`consulta` (`id_consulta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_has_atendimento_atendimento1`
    FOREIGN KEY (`atendimento_id`)
    REFERENCES `bancophp`.`atendimento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
