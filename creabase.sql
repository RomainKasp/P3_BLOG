-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mai 2018 à 23:43
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pc3blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE IF NOT EXISTS `billet` (
  `BIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_ID` int(11) NOT NULL DEFAULT '1',
  `BIL_TITRE` char(60) NOT NULL,
  `BIL_DAT_CRE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BIL_DAT_MOD` datetime DEFAULT NULL,
  `BIL_TXT` longtext NOT NULL,
  `BIL_DAT_VISU` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `BIL_EST_PAGE` tinyint(1) NOT NULL DEFAULT '0',
  `BIL_CHAP` smallint(6) NOT NULL DEFAULT '0',
  `BIL_IMG` char(60) DEFAULT NULL,
  PRIMARY KEY (`BIL_ID`),
  KEY `FK_REDIGER` (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `billet`
--

INSERT INTO `billet` (`BIL_ID`, `UTI_ID`, `BIL_TITRE`, `BIL_DAT_CRE`, `BIL_DAT_MOD`, `BIL_TXT`, `BIL_DAT_VISU`, `BIL_EST_PAGE`, `BIL_CHAP`, `BIL_IMG`) VALUES
(1, 1, 'Synopsis/Préface', '2018-02-18 20:00:00', NULL, '<p>Lorem ipsum shaiy sit amet, consectetur adipiscing elit. Nunc enim nisl, porta a tempus a, ultricies sit amet dolor. Morbi nunc nunc, hendrerit id ullamcorper suscipit, bibendum vitae est. Sed ut elit nunc. In ut velit euismod, hendrerit turpis sed, dictum mauris. Vivamus ipsum quam, lobortis quis ornare non, varius eget lorem. In tempus ex eget nulla tincidunt imperdiet. In quis convallis purus, sit amet rhoncus massa. Fusce molestie elit lacus, et lobortis risus dapibus quis. Nulla iaculis tortor ex, nec mattis turpis mollis vitae. Sed vehicula egestas nisl, ac sollicitudin augue lacinia vel. Fusce egestas ante diam, at vestibulum lacus placerat sed. Integer euismod, lacus eget volutpat gravida, sapien massa pellentesque nibh, congue fermentum elit nibh nec quam. Integer a feugiat mauris. Fusce pellentesque, tortor non tincidunt euismod, arcu nisl imperdiet ligula, id tristique purus magna non risus. Aenean ante neque, dapibus sit amet orci id, facilisis porttitor orci. Nam vitae augue nec lacus sagittis fringilla. Morbi non mauris quis purus efficitur imperdiet nec sit amet neque. Vivamus rutrum hendrerit aliquet. Sed egestas nisi odio, ut tempus augue porta tincidunt. Nunc ultrices ligula eget ornare dictum. Quisque turpis nunc, efficitur id feugiat nec, euismod mattis enim. Pellentesque at risus sollicitudin enim laoreet egestas. Proin blandit nisl lectus, sed molestie elit euismod in. Vestibulum varius pharetra pulvinar. Nunc malesuada urna sit amet interdum suscipit. Nunc iaculis justo a hendrerit pellentesque. Duis et euismod sapien. Proin quis ipsum molestie, porttitor mauris non, dignissim neque. Fusce felis augue, tincidunt ut consectetur ac, accumsan at felis. Phasellus non ante eu arcu tempor imperdiet. Ut facilisis nisl quis sapien commodo, nec lacinia odio tincidunt.</p>', '2010-01-01 00:00:00', 1, 0, NULL),
(2, 1, 'Jean Forteroche', '2018-02-18 20:00:00', NULL, '<p>Dolor sit amet, consectetur adipiscing elit. Nunc enim nisl, porta a tempus a, ultricies sit amet dolor. Morbi nunc nunc, hendrerit id ullamcorper suscipit, bibendum vitae est. Sed ut elit nunc. In ut velit euismod, hendrerit turpis sed, dictum mauris. Vivamus ipsum quam, lobortis quis ornare non, varius eget lorem. In tempus ex eget nulla tincidunt imperdiet. In quis convallis purus, sit amet rhoncus massa. Fusce molestie elit lacus, et lobortis risus dapibus quis. Nulla iaculis tortor ex, nec mattis turpis mollis vitae. Sed vehicula egestas nisl, ac sollicitudin augue lacinia vel. Fusce egestas ante diam, at vestibulum lacus placerat sed. Integer euismod, lacus eget volutpat gravida, sapien massa pellentesque nibh, congue fermentum elit nibh nec quam. Integer a feugiat mauris. Fusce pellentesque, tortor non tincidunt euismod, arcu nisl imperdiet ligula, id tristique purus magna non risus. Aenean ante neque, dapibus sit amet orci id, facilisis porttitor orci.</p>', '2010-01-01 00:00:00', 2, 0, 'auteur.jpg'),
(3, 1, 'Préface', '2018-02-18 20:30:00', NULL, '<p>Loin, très loin, au delà des monts Mots, à mille lieues des pays Voyellie et Consonnia, demeurent les Bolos Bolos. Ils vivent en retrait, à Bourg-en-Lettres, sur les côtes de la Sémantique, un vaste océan de langues. Un petit ruisseau, du nom de Larousse, coule en leur lieu et les approvisionne en règlalades nécessaires en tout genre; un pays paradisiagmatique, dans lequel des pans entiers de phrases prémâchées vous volent litéralement tout cuit dans la bouche. Pas même la toute puissante Ponctuation ne régit les Bolos Bolos - une vie on ne peut moins orthodoxographique. Un jour pourtant, une petite ligne de Bolo Bolo du nom de Lorem Ipsum décida de s''aventurer dans la vaste Grammaire. Le grand Oxymore voulut l''en dissuader, le prevenant que là-bas cela fourmillait de vils Virgulos, de sauvages Pointdexclamators et de sournois Semicolons qui l''attendraient pour sûr au prochain paragraphe, mais ces mots ne firent écho dans l''oreille du petit Bolo qui ne se laissa point déconcerter. Il pacqua ses 12 lettrines, glissa son initiale dans sa panse et se mit en route. Alors qu''il avait gravi les premiers flancs de la chaîne des monts Italiques, il jeta un dernier regard sur la skyline de</p>\r\n', '2018-02-18 20:32:00', 0, 1, NULL),
(4, 1, 'Introduction', '2018-02-18 20:36:00', NULL, '<p>Tous mes sens sont émus d''une volupté douce et pure, comme l''haleine du matin dans cette saison délicieuse. Seul, au milieu d''une contrée qui semble fait exprès pour un coeur tel que mien, j''y goûte à longs traits l''ivresse de la vie. Je suis si heureux, mon ami, si absorbé dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible ébauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon chéri se couvre autour de moi d''une légère vapeur; qu''au-dessus de ma tête le soleil de midi darde ses rayons embrasés sur la sombre voûte de mon bois, au fond duquel, comme d''un sanctuaire, il introduit à peine une tremblante lumière; qu''étendu sur le gazon touffu, à la chute d''un ruisseau, je découvre avec ravissement une multitude de plantes, de fleurs d''une délicatesse infinie; que je vois s''agiter entre les brins d''herbe des milliers de vermisseaux, d''insectes, de moucherons, aux formes variées et innombrables; que j''entends résonner à mon oreille le murmure confus de ce petit monde; quand l''auguste présence de l''Être tout-puissant qui créa l''homme à son image, le souffle vivifiant du Dieu d''amour et de bonté qui nous porte et nous soutient sur un océan de délices éternels, me pénètrent de toutes parts, et que le ciel et la terre se réfléchissent dans mon âme sous le traits d''une amante adorée, alors je soupire et me dis: Oh! que ne puis-je exprimer ce que je sens si vivement! Ces émotions brûlantes, que ne m''est-il donné de les peindre en traits de flamme! Mais - mon ami - les forces me manquent; je succombe sous la grandeur, sous la majesté de ces sublimes merveilles!Tous mes sens sont émus d''une volupté douce et pure, comme l''haleine du matin dans cette saison délicieuse. Seul, au milieu d''une contrée qui semble fait exprès pour un coeur tel que mien, j''y goûte à longs traits l''ivresse de la vie. Je suis si heureux, mon ami, si absorbé dans le sentiment de ma paisible existence, que mon art en souffre. Incapable de dessiner le mointre trait, la plus faible ébauche, jamais pourtant je ne fus si grand peintre. Quand mon vallon chéri se couvre autour de moi d''une légère vapeur; qu''au-dessus de ma tête le soleil de midi darde ses rayons embrasés sur la sombre voûte de mon bois, au fond duquel, comme d''un sanctuaire, il introduit à peine une tremblante lumière; qu''étendu sur le gazon touffu, à la chute d''un ruisseau, je découvre avec ravissement une multitude de plantes, de fleurs d''une délicatesse infinie; que je vois s''agiter entre les brins d''herbe des milliers de vermisseaux, d''insectes, de moucherons, aux formes variées et innombrables; que j''entends résonner à mon oreille le murmure confus de ce petit monde; quand l''auguste présence de l''Être tout-puissant qui créa l''homme à son image, le souffle vivifiant du Dieu d''amour et de bonté qui nous porte et nous soutient sur un océan de délices</p>\r\n', '2018-02-18 20:36:00', 0, 2, NULL),
(13, 1, 'Chapitre créer', '2018-04-09 20:16:39', NULL, '<p><span style="display: inline !important; float: none; background-color: transparent; color: #333333; font-family: ''Segoe UI'',''Segoe WP'',Arial,Sans-Serif; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;">ciaux, le jeune acteur qui f&ecirc;te ce lundi 9 avril ses 25 ans a post&eacute; un bien triste message sur son compte instagram. </span><em style="background-color: transparent; box-sizing: border-box; color: #333333; font-family: &amp;quot; segoe ui&amp;quot;,&amp;quot;segoe wp&amp;quot;,arial,sans-serif; font-size: 18px; font-style: italic; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; padding: 0px; margin: 0px;"><strong style="box-sizing: border-box; padding: 0px; margin: 0px;">"Pas de joyeux anniversaire mon fiston cette ann&eacute;e, il va falloir m''y habituer"</strong></em><span style="display: inline !important; float: none; background-color: transparent; color: #333333; font-family: ''Segoe UI'',''Segoe WP'',Arial,Sans-Serif; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;">a confi&eacute; bien tristement Rayane Bensetti, en r&eacute;f&eacute;rence &agrave; l''absence douloureuse de son p&egrave;re pour son premier anniversaire. Heureusemen</span></p>', '2018-04-09 18:16:00', 0, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `COM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_ID` int(11) DEFAULT NULL,
  `BIL_ID` int(11) NOT NULL,
  `COM_USR` char(60) NOT NULL,
  `COM_MAIL` char(100) DEFAULT NULL,
  `COM_TXT` char(255) NOT NULL,
  `COM_DAT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `COM_NBR_RPT` smallint(6) NOT NULL,
  `COM_ETAT` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`COM_ID`),
  KEY `FK_CONCERNER` (`BIL_ID`),
  KEY `FK_VALIDER` (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`COM_ID`, `UTI_ID`, `BIL_ID`, `COM_USR`, `COM_MAIL`, `COM_TXT`, `COM_DAT`, `COM_NBR_RPT`, `COM_ETAT`) VALUES
(1, NULL, 3, 'pseudotest', 'ttt@mail.com', 'testmsg', '0000-00-00 00:00:00', 0, 0),
(2, NULL, 3, 'pseudotest', 'ttt@mail.com', 'testmsg', '0000-00-00 00:00:00', 0, 0),
(3, NULL, 3, 'pseudotest', 'ttt@mail.com', 'testmsg', '2018-03-24 21:26:07', 0, 0),
(4, NULL, 3, 'pseudotest', 'ttt@mail.com', 'testmsg', '2018-03-24 21:28:22', 0, 3),
(6, NULL, 3, 'pseudotest', 'ttt@mail.com', 'testmsg', '2018-03-24 21:33:41', 11, 3);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `PARAM_VAL` varchar(30) NOT NULL,
  `PARAM_DAT` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`PARAM_VAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `parametre`
--

INSERT INTO `parametre` (`PARAM_VAL`, `PARAM_DAT`) VALUES
('Mode_Maintenance(Oui/Non)', 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_NOM` char(60) NOT NULL,
  `UTI_PSW` varchar(255) NOT NULL,
  `UTI_DAT_CRE` datetime NOT NULL,
  `UTI_DAT_FIN` date NOT NULL,
  `UTI_MAIL` char(60) NOT NULL,
  PRIMARY KEY (`UTI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTI_ID`, `UTI_NOM`, `UTI_PSW`, `UTI_DAT_CRE`, `UTI_DAT_FIN`, `UTI_MAIL`) VALUES
(1, 'Jean Forteroche', 'XX-A-MODIFIER-XX', '2018-02-18 20:00:00', '2999-12-28', 'romain.kasp@gmail.com');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `FK_REDIGER` FOREIGN KEY (`UTI_ID`) REFERENCES `utilisateur` (`UTI_ID`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`BIL_ID`) REFERENCES `billet` (`BIL_ID`),
  ADD CONSTRAINT `FK_VALIDER` FOREIGN KEY (`UTI_ID`) REFERENCES `utilisateur` (`UTI_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
