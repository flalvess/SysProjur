/*
SQLyog Ultimate v8.55 
MySQL - 5.0.45-community-nt : Database - dbprojur
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbprojur` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbprojur`;

/*Table structure for table `stbcaso_de_uso` */

DROP TABLE IF EXISTS `stbcaso_de_uso`;

CREATE TABLE `stbcaso_de_uso` (
  `idCasoDeUso` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(100) default NULL,
  `ordem` varchar(45) default NULL,
  PRIMARY KEY  (`idCasoDeUso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbcaso_de_uso` */

insert  into `stbcaso_de_uso`(`idCasoDeUso`,`nome`,`descricao`,`ordem`) values (1,'Usuarios','Cadastro e listagem de usuarios do sistema ','1'),(2,'Pressoas','Cadastro e listagem de Pessoas','2'),(3,'Cidades','Cadastro e listagem de Cidades','3'),(4,'Juizos','Cadastro e listagem de Juizos','4'),(5,'Processos','Cadastro e listagem de Processos','5'),(6,'Área do Procurador','Listagem dos processos com ciente em aberto ou a executar ','6'),(7,'Atividades','Cadastro e listagem de Atividades','7');

/*Table structure for table `stbfluxo` */

DROP TABLE IF EXISTS `stbfluxo`;

CREATE TABLE `stbfluxo` (
  `idFluxo` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(100) default NULL,
  `idCasoDeUso` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idFluxo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbfluxo` */

insert  into `stbfluxo`(`idFluxo`,`nome`,`descricao`,`idCasoDeUso`) values (1,'Inserir Usuario','cadastro de usuarios',1),(2,'Listar Usuarios','Lista todos os usuarios',1),(3,'Editar Usuario','Altera os dados de um usuario',1),(4,'Excluir Usuario','Apaga um usuario',1),(5,'Inserir Pessoas','cadastro de Pessoas',2),(6,'Listar Pessoas','Lista todos as Pessoas',2),(7,'Editar Pessoas','Altera os dados de uma Pessoa',2),(8,'Excluir Pessoas','Apaga uma Pessoa do processo',2),(9,'Inserir Cidade','cadastro de Cidade',3),(10,'Listar Cidades','Lista todas as Cidades',3),(11,'Editar Cidade','Altera os dados de uma Cidade',3),(12,'Excluir Cidades','Exclui uma Cidade',3),(13,'Inserir Juizo','cadastro de Juízos do processo',4),(14,'Listar Juizos','Lista todas os Juízos cadastrados',4),(15,'Editar Juizo','Altera os dados de um Juízo',4),(16,'Excluir Juizos','Exclui um Juízo',4),(17,'Inserir Processo','cadastro de processo',5),(18,'Listar Processos','Lista todas os Processos os cadastrados',5),(19,'Editar Processo','Altera os dados de um Processo',5),(20,'Excluir Processos','Exclui um Processo',5),(21,'Modo Distribuição','defini se a distriuição será manual ou automática',5),(22,'Substituir Procurador','Substitui um procurador do processo',5),(23,'Vizualizar Processo','Mostar as info. de um processo e suas movimentações',5),(24,'Redistribuição','Lista todos os procuradores com processos a redistribuir',5),(25,'Histórico','Lista todas as movimentações do processos(distr. e redistr.)',5),(26,'Meus Processos','Lista todos os processos de um procurador específico',6),(27,'Listar todos sem ciente','Lista todos os processos com mov. sem ciente',6),(28,'Listar todos a executar','Lista todos os processos com mov. a executar',6),(29,'Inserir Atividade','cadastro de atividade',7),(30,'Atividades Enviadas','Lista todas as atividades enviadas',7),(31,'Atividades Recebidas','Lista todas as atividades recebidas',7);

/*Table structure for table `stbgrupo` */

DROP TABLE IF EXISTS `stbgrupo`;

CREATE TABLE `stbgrupo` (
  `idGrupo` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(100) default NULL,
  PRIMARY KEY  (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbgrupo` */

insert  into `stbgrupo`(`idGrupo`,`nome`,`descricao`) values (1,'Administrador do Sistema','procurador-chefe adiministra o sistema'),(2,'Apoio','cadastra e distribui processos'),(3,'Procurador','movimenta os processos a ele destinado');

/*Table structure for table `stbgrupo_stbcaso_de_uso` */

DROP TABLE IF EXISTS `stbgrupo_stbcaso_de_uso`;

CREATE TABLE `stbgrupo_stbcaso_de_uso` (
  `idGrupo` int(11) NOT NULL default '0',
  `IdCasoDeUso` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idGrupo`,`IdCasoDeUso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbgrupo_stbcaso_de_uso` */

insert  into `stbgrupo_stbcaso_de_uso`(`idGrupo`,`IdCasoDeUso`) values (1,1),(1,2),(1,3),(1,4),(1,5),(2,2);

/*Table structure for table `stbgrupo_stbusuario` */

DROP TABLE IF EXISTS `stbgrupo_stbusuario`;

CREATE TABLE `stbgrupo_stbusuario` (
  `idUsuario` int(11) NOT NULL default '0',
  `idGrupo` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idUsuario`,`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbgrupo_stbusuario` */

insert  into `stbgrupo_stbusuario`(`idUsuario`,`idGrupo`) values (1,1),(7,2),(8,1),(9,3),(10,2),(11,3),(12,3),(16,1),(17,3);

/*Table structure for table `stbitem_menu` */

DROP TABLE IF EXISTS `stbitem_menu`;

CREATE TABLE `stbitem_menu` (
  `idItemMenu` int(11) NOT NULL,
  `nome` varchar(45) default NULL,
  `descricao` varchar(150) default NULL,
  `linkJS` varchar(150) default NULL,
  `idFluxo` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idItemMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbitem_menu` */

insert  into `stbitem_menu`(`idItemMenu`,`nome`,`descricao`,`linkJS`,`idFluxo`) values (1,'Inserir novo','Cadastra novo usuario','GestaoUsuarios.initCad();',1),(2,'Listar todos','Lista todos os usuarios','GestaoUsuarios.initList();',2),(3,'Inserir novo','Cadastra uma nova pessoa','GestaoPessoas.initCad();',5),(4,'Listar todos','Lista todas as pessoas do processo','GestaoPessoas.initList();',6),(5,'Inserir novo','Cadastra um novo processo','GestaoCidades.initCad();',9),(6,'Listar todos','Lista todos os proccessos','GestaoCidades.initList();',10),(7,'Inserir novo','Cadastra um novo juizo','GestaoJuizos.initCad();',13),(8,'Listar todos','Lista todos os juízos','GestaoJuizos.initList();',14),(9,'Inserir novo','Cadastra um novo processo','GestaoProcessos.initCad();',17),(10,'Listar todos','Lista todas os processo','GestaoProcessos.initList();',18),(11,'Modo Distribuição','Alterar o modo de distribuição do processo','GestaoProcessos.initEditModoDistribuicao();',21),(12,'Substituir Procurador','Altera o procurador do processo','GestaoSubstituicoes.initList();',22),(13,'Redistribuição','Lista todos os procuradores excluidos','GestaoProcurador.initListProcuradorExcluido();',24),(14,'Histórico','Lista os processos(distr. e redistr.)','GestaoHistorico.initList();',25),(15,'Sem ciente','Lista todos os processos com movimentação sem ciente','GestaoProcessos.initListSemCiente();',27),(16,'A executar','Lista todos os processos com movimentação a executar','GestaoProcessos.initListAExecutar();',28),(17,'Meus Processos','Lista todos os processos de um procurador específico','GestaoProcessos.initListMeusProcessos();',26),(18,'Enviadas','Listas as atividades enviadas','GestaoAtividadeEnv.initListEnv();',30),(19,'Recebidas','Lista as atividades recebidas','GestaoAtividadeRec.initListRec();',31),(20,'Inserir novo','Cadastra uma nova atividade','GestaoAtividade.initCad();',29);

/*Table structure for table `stbsessao` */

DROP TABLE IF EXISTS `stbsessao`;

CREATE TABLE `stbsessao` (
  `sessionId` int(11) NOT NULL,
  `unixTime` varchar(45) default NULL,
  `idUsuario` int(11) NOT NULL default '0',
  PRIMARY KEY  (`sessionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbsessao` */

insert  into `stbsessao`(`sessionId`,`unixTime`,`idUsuario`) values (774,'1296163747',1);

/*Table structure for table `stbusuario` */

DROP TABLE IF EXISTS `stbusuario`;

CREATE TABLE `stbusuario` (
  `idUsuario` int(11) NOT NULL auto_increment,
  `login` varchar(45) default NULL,
  `senha` varchar(150) default NULL,
  `status` varchar(2) NOT NULL,
  `dataCadastro` int(11) unsigned NOT NULL default '0',
  `dataSenha` int(11) default NULL,
  `afastamento` varchar(45) default 'Não',
  PRIMARY KEY  (`idUsuario`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `stbusuario` */

insert  into `stbusuario`(`idUsuario`,`login`,`senha`,`status`,`dataCadastro`,`dataSenha`,`afastamento`) values (1,'maycon','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',0,0,'Não'),(7,'apoio','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',1286288330,1286288330,'Não'),(8,'administrador','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',1286512103,1286512103,'Não'),(9,'tom','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',0,0,'Não'),(10,'joao','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',1289414394,1289414394,'Não'),(11,'teste','5d4f273613740809f7868e349d9944b03ea77041','1',1292183874,1292183874,'Não'),(12,'outro','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',1292341773,1292341773,'Sim'),(16,'asasasas','6c0456fdff9fe833ba74bdeded8f27a4d08d3cb2','1',1292821210,1292821210,'Não');

/*Table structure for table `stbusuario_stbfluxo` */

DROP TABLE IF EXISTS `stbusuario_stbfluxo`;

CREATE TABLE `stbusuario_stbfluxo` (
  `idUsuario` int(11) NOT NULL default '0',
  `idFluxo` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idUsuario`,`idFluxo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbusuario_stbfluxo` */

insert  into `stbusuario_stbfluxo`(`idUsuario`,`idFluxo`) values (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(7,5),(7,6),(7,7),(7,8),(7,9),(7,10),(7,11),(7,12),(7,13),(7,14),(7,15),(7,16),(7,17),(7,18),(7,19),(7,20),(7,21),(7,22),(7,23),(7,24),(7,25),(7,29),(7,30),(7,31),(8,1),(8,2),(8,3),(8,4),(8,5),(8,6),(8,7),(8,8),(8,9),(8,10),(8,11),(8,12),(8,13),(8,14),(8,15),(8,16),(8,17),(8,18),(8,19),(8,20),(8,21),(8,22),(8,23),(8,24),(8,25),(8,26),(8,27),(8,28),(8,29),(8,30),(8,31),(9,17),(9,18),(9,19),(9,20),(9,21),(9,22),(9,23),(9,24),(9,25),(9,26),(9,27),(9,28),(9,29),(9,30),(9,31),(10,5),(10,6),(10,7),(10,8),(10,9),(10,10),(10,11),(10,12),(10,13),(10,14),(10,15),(10,16),(10,17),(10,18),(10,19),(10,20),(10,21),(10,22),(10,23),(10,29),(10,30),(10,31),(11,17),(11,18),(11,19),(11,20),(11,21),(11,22),(11,23),(11,24),(11,25),(11,26),(11,27),(11,28),(11,29),(11,30),(11,31),(12,17),(12,18),(12,19),(12,20),(12,21),(12,22),(12,23),(12,24),(12,25),(12,26),(12,27),(12,28),(12,29),(12,30),(12,31),(16,1),(16,2),(16,3),(16,4),(16,5),(16,6),(16,7),(16,8),(16,9),(16,10),(16,11),(16,12),(16,13),(16,14),(16,15),(16,16),(16,26),(16,27),(16,28),(16,29),(16,30),(16,31);

/*Table structure for table `stbusuarioinfo` */

DROP TABLE IF EXISTS `stbusuarioinfo`;

CREATE TABLE `stbusuarioinfo` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) default NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `stbusuarioinfo` */

insert  into `stbusuarioinfo`(`idUsuario`,`nome`,`email`) values (1,'Maycon Torres','edttos@gmail.com'),(7,'maria','apoio@uespi.com'),(8,'Administrador do Sistema','administrador@uespi.br'),(9,'Tom Jobim','jobim@gmail.com'),(10,'joão','teste@hotmail.com'),(11,'teste','sasdfsdfsdf'),(12,'outro teste','fulano@teste.com'),(16,'asasas','asaas');

/*Table structure for table `tbassunto` */

DROP TABLE IF EXISTS `tbassunto`;

CREATE TABLE `tbassunto` (
  `idAssunto` int(11) NOT NULL auto_increment,
  `assunto` varchar(45) default '',
  `fkProcurador` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idAssunto`),
  KEY `fkUsuario` (`fkProcurador`),
  CONSTRAINT `fkUsuario` FOREIGN KEY (`fkProcurador`) REFERENCES `stbusuarioinfo` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbassunto` */

insert  into `tbassunto`(`idAssunto`,`assunto`,`fkProcurador`) values (1,'teste de assunto',1),(2,'Sem Assunto',8),(3,'teste teste',9),(4,'Sem Assunto',11),(5,'',12),(8,'Sem Assunto',16);

/*Table structure for table `tbatividade` */

DROP TABLE IF EXISTS `tbatividade`;

CREATE TABLE `tbatividade` (
  `idAtividade` int(11) NOT NULL auto_increment,
  `de` varchar(45) default NULL,
  `para` varchar(45) default NULL,
  `tipoAtividade` varchar(45) default NULL,
  `solicitacao` text,
  `status` varchar(45) default NULL,
  `pendencia` varchar(45) default NULL,
  `ciente` varchar(45) default NULL,
  `data` varchar(45) default NULL,
  `numero` int(15) default NULL,
  `dataCiente` varchar(45) default NULL,
  PRIMARY KEY  (`idAtividade`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

/*Data for the table `tbatividade` */

insert  into `tbatividade`(`idAtividade`,`de`,`para`,`tipoAtividade`,`solicitacao`,`status`,`pendencia`,`ciente`,`data`,`numero`,`dataCiente`) values (47,'Maycon Torres','apoio','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Normal','---','Não','18/12/2010 - 20:13:05',1,''),(48,'joão','Maycon Torres','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Normal','Lorem ipsum dolor sit amet, consectetur adipi','Sim','18/12/2010 - 20:13:53',1,'18/12/2010 - 20:14:14'),(49,'Maycon Torres','Apoio','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Normal','Lorem ipsum dolor sit amet, consectetur adipi','Sim','18/12/2010 - 20:14:36',2,'18/12/2010 - 20:15:06'),(50,'maria','Maycon Torres','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Urgente','Lorem ipsum dolor sit amet, consectetur adipi','Não','18/12/2010 - 20:17:20',1,''),(51,'Maycon Torres','Apoio','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Normal','Lorem ipsum dolor sit amet, consectetur adipi','Não','18/12/2010 - 23:33:48',3,''),(52,'Maycon Torres','Apoio','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Urgente','Lorem ipsum dolor sit amet, consectetur adipi','Não','04/01/2011 - 00:12:54',4,''),(53,'Maycon Torres','Apoio','Lorem ipsum dolor sit amet, consectetur adipi','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Normal','sem pendências','Não','23/01/2011 - 21:49:46',5,'');

/*Table structure for table `tbcidade` */

DROP TABLE IF EXISTS `tbcidade`;

CREATE TABLE `tbcidade` (
  `idCidade` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `fkEstado` int(11) NOT NULL,
  PRIMARY KEY  (`idCidade`),
  KEY `fk_cidade_Estado1` (`fkEstado`),
  CONSTRAINT `fkEstado` FOREIGN KEY (`fkEstado`) REFERENCES `tbestado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbcidade` */

insert  into `tbcidade`(`idCidade`,`nome`,`fkEstado`) values (1,'Teresina',18),(2,'Timon',10),(3,'Fortaleza',6),(4,'Picos',18),(5,'Caxias',10),(6,'Sobral',6),(7,'outro testes',18);

/*Table structure for table `tbcontrole` */

DROP TABLE IF EXISTS `tbcontrole`;

CREATE TABLE `tbcontrole` (
  `idControle` int(11) NOT NULL default '0',
  `posicao` int(11) default '0',
  `total` int(11) default '0',
  PRIMARY KEY  (`idControle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbcontrole` */

insert  into `tbcontrole`(`idControle`,`posicao`,`total`) values (1,4,5);

/*Table structure for table `tbestado` */

DROP TABLE IF EXISTS `tbestado`;

CREATE TABLE `tbestado` (
  `idEstado` int(11) NOT NULL default '0',
  `nome` varchar(45) default NULL,
  `sigla` varchar(45) default NULL,
  PRIMARY KEY  (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbestado` */

insert  into `tbestado`(`idEstado`,`nome`,`sigla`) values (1,'Acre','AC'),(2,'Alagoas','AL'),(3,'Amapá','AP'),(4,'Amazonas','AM'),(5,'Bahia','BA'),(6,'Ceará','CE'),(7,'Distrito Federal','DF'),(8,'Goiás','GO'),(9,'Espírito Santo','ES'),(10,'Maranhão','MA'),(11,'Mato Grosso','MT'),(12,'Mato Grosso do Sul','MTS'),(13,'Minas Gerais','MG'),(14,'Pará','PA'),(15,'Paraíba','PB'),(16,'Paraná','PR'),(17,'Pernambuco','PE'),(18,'Piauí','PI'),(19,'Rio de Janeiro','RJ'),(20,'Rio Grande do Norte','RN'),(21,'Rio Grande do Sul','RS'),(22,'Rondônia','RO'),(23,'Roraima','RR'),(24,'São Paulo','SP'),(25,'Santa Catarina','SC'),(26,'Sergipe','SE'),(27,'Tocantins','TO');

/*Table structure for table `tbjuizo` */

DROP TABLE IF EXISTS `tbjuizo`;

CREATE TABLE `tbjuizo` (
  `idJuizo` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `fkCidade` int(11) NOT NULL,
  PRIMARY KEY  (`idJuizo`),
  KEY `fk_juizo_cidade1` (`fkCidade`),
  CONSTRAINT `fk_juizo_cidade1` FOREIGN KEY (`fkCidade`) REFERENCES `tbcidade` (`idCidade`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbjuizo` */

insert  into `tbjuizo`(`idJuizo`,`nome`,`fkCidade`) values (1,'forum de Teresina',1),(2,'forum  de Picos',4),(3,'testejl',2),(4,'zxcx',3),(5,'outro teste',1),(6,'aas',4),(7,'xc',5),(8,'werwer',6),(9,'gggg',1),(11,'hhhhh',2);

/*Table structure for table `tbmovimentacao` */

DROP TABLE IF EXISTS `tbmovimentacao`;

CREATE TABLE `tbmovimentacao` (
  `idMovimentacao` int(11) NOT NULL auto_increment,
  `numeroMovimentacao` varchar(45) default NULL,
  `tipoMovimentacao` varchar(45) default NULL,
  `evento` varchar(45) default NULL,
  `data` varchar(45) default NULL,
  `perfil` varchar(45) default NULL,
  `movimentadoPor` varchar(45) default NULL,
  `arquivo` varchar(500) default NULL,
  `observacao` mediumtext,
  `ciente` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `fkProcesso` int(11) NOT NULL,
  PRIMARY KEY  (`idMovimentacao`),
  KEY `fk_movimentacao_processo1` (`fkProcesso`),
  CONSTRAINT `fk_movimentacao_processo1` FOREIGN KEY (`fkProcesso`) REFERENCES `tbprocesso` (`idProcesso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbmovimentacao` */

insert  into `tbmovimentacao`(`idMovimentacao`,`numeroMovimentacao`,`tipoMovimentacao`,`evento`,`data`,`perfil`,`movimentadoPor`,`arquivo`,`observacao`,`ciente`,`status`,`fkProcesso`) values (2,'1','executada','Lorem ipsum dolor sit amet, consectetur adipi','18/01/2011 - 17:03:12','Administrador do Sistema','Maycon Torres','','Lorem ipsum dolor sit amet, consectetur adipi','Não',NULL,8),(3,'2','a executar','Lorem ipsum dolor sit amet, consectetur adipi','27/01/2011 - 18:28:59','Administrador do Sistema','Maycon Torres','','Lorem ipsum dolor sit amet, consectetur adipi','Não',NULL,8),(4,'1','executada','Lorem ipsum dolor sit amet, consectetur adipi','23/01/2011 - 18:35:04','Administrador do Sistema','Maycon Torres','','Lorem ipsum dolor sit amet, consectetur adipi','Não',NULL,9),(5,'2','executada','Lorem ipsum dolor sit amet, consectetur adipi','23/01/2011 - 18:47:43','Administrador do Sistema','Maycon Torres','10_c0f1fb5f15e43b984c7ad0f2e3fcff31.pdf','teste de observação','Não',NULL,9),(6,'1','executada','teste','25/01/2011 - 19:57:42','Administrador do Sistema','Maycon Torres','','teste','Sim',NULL,14);

/*Table structure for table `tbmovimentacao_a_executar` */

DROP TABLE IF EXISTS `tbmovimentacao_a_executar`;

CREATE TABLE `tbmovimentacao_a_executar` (
  `idMovimentacaoAExecutar` int(11) NOT NULL auto_increment,
  `dataLimite` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `pendencia` text,
  `fkMovimentacao` int(11) NOT NULL,
  PRIMARY KEY  (`idMovimentacaoAExecutar`),
  KEY `fk_movimentacao_a_executar_movimentacao1` (`fkMovimentacao`),
  CONSTRAINT `fk_movimentacao_a_executar_movimentacao1` FOREIGN KEY (`fkMovimentacao`) REFERENCES `tbmovimentacao` (`idMovimentacao`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbmovimentacao_a_executar` */

insert  into `tbmovimentacao_a_executar`(`idMovimentacaoAExecutar`,`dataLimite`,`status`,`pendencia`,`fkMovimentacao`) values (2,'','','',2),(3,'13/01/2011','Concluído','Lorem ipsum dolor sit amet, consectetur adipi',3),(4,'','','',4),(5,'','','',5),(6,'','','',6);

/*Table structure for table `tbpessoa` */

DROP TABLE IF EXISTS `tbpessoa`;

CREATE TABLE `tbpessoa` (
  `idPessoa` int(11) NOT NULL auto_increment,
  `nome` varchar(45) default NULL,
  `parte` varchar(45) default NULL,
  `status` char(2) default NULL,
  PRIMARY KEY  (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tbpessoa` */

insert  into `tbpessoa`(`idPessoa`,`nome`,`parte`,`status`) values (16,'Maria','impetrado','1'),(17,'Joao','Impetrado','1'),(18,'Carlos','Parte-Contrária','1'),(19,'Marcos','parte-contrária','-1'),(20,'Maiza','Impetrado','1'),(21,'Carlos','impetrado','-1'),(22,'Tatiane','Parte-Contrária','1'),(23,'Pedro','Outro','1'),(24,'Cecília','Outro','1'),(25,'José','Outro','1'),(26,'Carolina','Parte-Contrária','1'),(27,'teste','Parte-Contraria','1'),(28,'Maycon Torres Sena','Impetrado','1');

/*Table structure for table `tbprimeira_instancia` */

DROP TABLE IF EXISTS `tbprimeira_instancia`;

CREATE TABLE `tbprimeira_instancia` (
  `idPrimeiraInstancia` int(11) NOT NULL auto_increment,
  `fkProcesso` int(11) NOT NULL,
  `fkJuizo` int(11) NOT NULL,
  PRIMARY KEY  (`idPrimeiraInstancia`),
  KEY `fk_primeira_instancia_processo1` (`fkProcesso`),
  KEY `fk_primeira_instancia_juizo1` (`fkJuizo`),
  CONSTRAINT `fk_primeira_instancia_juizo1` FOREIGN KEY (`fkJuizo`) REFERENCES `tbjuizo` (`idJuizo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_primeira_instancia_processo1` FOREIGN KEY (`fkProcesso`) REFERENCES `tbprocesso` (`idProcesso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `tbprimeira_instancia` */

insert  into `tbprimeira_instancia`(`idPrimeiraInstancia`,`fkProcesso`,`fkJuizo`) values (50,8,1),(51,10,3),(52,11,2);

/*Table structure for table `tbprocesso` */

DROP TABLE IF EXISTS `tbprocesso`;

CREATE TABLE `tbprocesso` (
  `idProcesso` int(11) NOT NULL auto_increment,
  `numeroProcesso` varchar(45) NOT NULL,
  `tipoProcesso` varchar(45) default NULL,
  `descricao` text,
  `justica` varchar(45) default NULL,
  `instancia` varchar(45) default NULL,
  `dataEntrada` varchar(45) default NULL,
  `tipoAcao` varchar(45) default NULL,
  `litisconsorte` varchar(45) default NULL,
  `assunto` text,
  `situacaoProcesso` varchar(45) default NULL,
  `fkUsuario` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idProcesso`),
  KEY `fkUsuario1` (`fkUsuario`),
  CONSTRAINT `fkUsuario1` FOREIGN KEY (`fkUsuario`) REFERENCES `stbusuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbprocesso` */

insert  into `tbprocesso`(`idProcesso`,`numeroProcesso`,`tipoProcesso`,`descricao`,`justica`,`instancia`,`dataEntrada`,`tipoAcao`,`litisconsorte`,`assunto`,`situacaoProcesso`,`fkUsuario`) values (8,'11111111111111','Concurso','Lorem ipsum dolor sit amet, consectetur adipi','Federal','1º Instancia','23/01/2011 - 12:43:27','Lorem ipsum dolor sit amet, consectetur adipi','zxczxczxc','assunto1','Normal',9),(9,'22222222222222','','Lorem ipsum dolor sit amet, consectetur adipi','Estadual','2º Instancia','23/01/2011 - 14:01:49','Lorem ipsum dolor sit amet, consectetur adipi','','teste teste','Normal',1),(10,'33333333333333','','Lorem ipsum dolor sit amet, consectetur adipi','Trabalho','1º Instancia','23/01/2011 - 13:03:46','Lorem ipsum dolor sit amet, consectetur adipi','','assunto4','Normal',9),(11,'34444444444444','','Lorem ipsum dolor sit amet, consectetur adipi','Estadual','1º Instancia','23/01/2011 - 16:47:31','Lorem ipsum dolor sit amet, consectetur adipi','','assunto3','Normal',1),(12,'34534234234','','Lorem ipsum dolor sit amet, consectetur adipi','Federal','2º Instancia','23/01/2011 - 13:52:33','Lorem ipsum dolor sit amet, consectetur adipi','','assunto2','Normal',9),(13,'55555555555555','','teste de descrição','Federal','2º Instancia','23/01/2011 - 15:56:15','Lorem ipsum dolor sit amet, consectetur adipi','','teste de assunto','Normal',9),(14,'77777777777777','','Lorem ipsum dolor sit amet, consectetur adipi','Estadual','2º Instancia','23/01/2011 - 17:15:21','Lorem ipsum dolor sit amet, consectetur adipi','','teste de assunto','Normal',1);

/*Table structure for table `tbprocesso_pessoa` */

DROP TABLE IF EXISTS `tbprocesso_pessoa`;

CREATE TABLE `tbprocesso_pessoa` (
  `fkProcesso` int(11) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  KEY `fk_processo_pessoa_pessoa1` (`fkPessoa`),
  KEY `fk_processo_pessoa_processo1` (`fkProcesso`),
  CONSTRAINT `fk_processo_pessoa_pessoa1` FOREIGN KEY (`fkPessoa`) REFERENCES `tbpessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_processo_pessoa_processo1` FOREIGN KEY (`fkProcesso`) REFERENCES `tbprocesso` (`idProcesso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbprocesso_pessoa` */

insert  into `tbprocesso_pessoa`(`fkProcesso`,`fkPessoa`) values (8,16),(8,24),(8,23),(8,18),(10,23),(10,25),(10,24),(12,16),(12,23),(9,20),(9,24),(9,23),(9,18),(13,26),(13,20),(13,23),(11,16),(11,23),(14,16),(14,23);

/*Table structure for table `tbsegunda_instancia` */

DROP TABLE IF EXISTS `tbsegunda_instancia`;

CREATE TABLE `tbsegunda_instancia` (
  `idSegundaInstancia` int(11) NOT NULL auto_increment,
  `tipoSegundaInstancia` varchar(45) default NULL,
  `fkProcesso` int(11) NOT NULL,
  PRIMARY KEY  (`idSegundaInstancia`),
  KEY `fk_segunda_instancia_processo1` (`fkProcesso`),
  CONSTRAINT `fk_segunda_instancia_processo1` FOREIGN KEY (`fkProcesso`) REFERENCES `tbprocesso` (`idProcesso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbsegunda_instancia` */

insert  into `tbsegunda_instancia`(`idSegundaInstancia`,`tipoSegundaInstancia`,`fkProcesso`) values (1,'Originário',9),(2,'Derivado',12),(3,'Originário',13),(4,'Originário',14);

/*Table structure for table `tbsegunda_instancia_derivado` */

DROP TABLE IF EXISTS `tbsegunda_instancia_derivado`;

CREATE TABLE `tbsegunda_instancia_derivado` (
  `idSegundaInstanciaDerivado` int(11) NOT NULL auto_increment,
  `fkSegundaInstancia` int(11) NOT NULL,
  `fkPrimeiraInstancia` int(11) NOT NULL,
  PRIMARY KEY  (`idSegundaInstanciaDerivado`),
  KEY `fk_segunda_instancia_derivado_segunda_instancia1` (`fkSegundaInstancia`),
  KEY `fk_segunda_instancia_derivado_primeira_instancia1` (`fkPrimeiraInstancia`),
  CONSTRAINT `fk_segunda_instancia_derivado_primeira_instancia1` FOREIGN KEY (`fkPrimeiraInstancia`) REFERENCES `tbprimeira_instancia` (`idPrimeiraInstancia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_segunda_instancia_derivado_segunda_instancia1` FOREIGN KEY (`fkSegundaInstancia`) REFERENCES `tbsegunda_instancia` (`idSegundaInstancia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbsegunda_instancia_derivado` */

insert  into `tbsegunda_instancia_derivado`(`idSegundaInstanciaDerivado`,`fkSegundaInstancia`,`fkPrimeiraInstancia`) values (1,2,52);

/*Table structure for table `tbsubstituicao_procurador` */

DROP TABLE IF EXISTS `tbsubstituicao_procurador`;

CREATE TABLE `tbsubstituicao_procurador` (
  `idSubstituicaoProcurador` int(11) NOT NULL auto_increment,
  `processo` varchar(45) default NULL,
  `procuradorSubstituto` varchar(45) default NULL,
  `procuradorOriginal` varchar(45) default NULL,
  `temporaria` char(1) default NULL,
  `motivoSubstituicao` varchar(45) default NULL,
  `observacao` mediumtext,
  `status` char(2) default NULL,
  PRIMARY KEY  (`idSubstituicaoProcurador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbsubstituicao_procurador` */

insert  into `tbsubstituicao_procurador`(`idSubstituicaoProcurador`,`processo`,`procuradorSubstituto`,`procuradorOriginal`,`temporaria`,`motivoSubstituicao`,`observacao`,`status`) values (1,'12','9','1','n','','','1'),(2,'8','9','1','n','','','1');

/*Table structure for table `tbtipo_distribuicao` */

DROP TABLE IF EXISTS `tbtipo_distribuicao`;

CREATE TABLE `tbtipo_distribuicao` (
  `idTipoDistribuicao` int(11) NOT NULL auto_increment,
  `modo` char(1) default 'M',
  `criterio` varchar(45) default NULL,
  PRIMARY KEY  (`idTipoDistribuicao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbtipo_distribuicao` */

insert  into `tbtipo_distribuicao`(`idTipoDistribuicao`,`modo`,`criterio`) values (1,'A','Sequencial');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
