/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  18/02/2018 20:03:44                      */
/*==============================================================*/


drop table if exists BILLET;

drop table if exists COMMENTAIRE;

drop table if exists PARAMETRE;

drop table if exists UTILISATEUR;

/*==============================================================*/
/* Table : BILLET                                               */
/*==============================================================*/
create table BILLET
(
   BIL_ID               int not null auto_increment,
   UTI_ID               int not null,
   BIL_TITRE            char(60) not null,
   BIL_DAT_CRE          datetime not null,
   BIL_DAT_MOD          datetime,
   BIL_TXT              longtext not null,
   BIL_DAT_VISU         datetime not null,
   BIL_EST_PAGE         bool not null,
   BIL_CHAP             smallint not null,
   BIL_IMG              char(60),
   primary key (BIL_ID)
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE
(
   COM_ID               int not null auto_increment,
   UTI_ID               int,
   BIL_ID               int not null,
   COM_USR              char(60) not null,
   COM_MAIL             char(100),
   COM_TXT              char(255) not null,
   COM_DAT              datetime not null,
   COM_NBR_RPT          smallint not null,
   COM_ETAT             tinyint,
   primary key (COM_ID)
);

/*==============================================================*/
/* Table : PARAMETRE                                            */
/*==============================================================*/
create table PARAMETRE
(
   PARAM_VAL            varchar(30) not null,
   PARAM_DAT            varchar(60),
   primary key (PARAM_VAL)
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
   UTI_ID               int not null auto_increment,
   UTI_NOM              char(60) not null,
   UTI_PSW              varchar(150) not null,
   UTI_DAT_CRE          datetime not null,
   UTI_DAT_FIN          date not null,
   UTI_MAIL             char(60) not null,
   primary key (UTI_ID)
);

alter table BILLET add constraint FK_REDIGER foreign key (UTI_ID)
      references UTILISATEUR (UTI_ID) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_CONCERNER foreign key (BIL_ID)
      references BILLET (BIL_ID) on delete restrict on update restrict;

alter table COMMENTAIRE add constraint FK_VALIDER foreign key (UTI_ID)
      references UTILISATEUR (UTI_ID) on delete restrict on update restrict;

