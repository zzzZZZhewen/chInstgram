/*==============================================================*/
/* Table: Comment                                               */
/*==============================================================*/
create table chist_comment
(
   comment_id           numeric(11,0) not null,
   comment_user_id      numeric(11,0) not null,
   comment_post_id      numeric(11,0) not null,
   comment_content      varchar(200),
   comment_date         datetime,
   primary key (comment_id)
);

/*==============================================================*/
/* Table: Message                                               */
/*==============================================================*/
create table chist_message
(
   message_id           numeric(11,0) not null,
   message_sender_id    numeric(11,0) not null,
   message_reciever_id  numeric(11,0) not null,
   message_content      varchar(200),
   message_datetime     datetime,
   primary key (message_id)
);

/*==============================================================*/
/* Table: Post                                                  */
/*==============================================================*/
create table chist_post
(
   post_id              numeric(11,0) not null,
   user_id              numeric(11,0) not null,
   post_url             varchar(150),
   post_filter          bigint,
   post_gps             varchar(30),
   post_content         varchar(200),
   post_datetime        datetime,
   primary key (post_id)
);

/*==============================================================*/
/* Table: Topic                                                 */
/*==============================================================*/
create table chist_topic
(
   topic_id             numeric(11,0) not null,
   topic_name           varchar(40),
   primary key (topic_id)
);

alter table Topic comment '»°Ìâ';

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table chist_user
(
   user_id              numeric(11,0) not null,
   user_raelname        varchar(20),
   user_nickname        varchar(20),
   user_image_url       varchar(150),
   user_email           varchar(50),
   user_password        char(20),
   user_sex             numeric(2,0),
   user_tel             char(10),
   user_info            varchar(200),
   user_register_datetime datetime,
   user_url             varchar(150),
   user_last_login_datetime datetime,
   user_right           numeric(1,0),
   primary key (user_id)
);


/*==============================================================*/
/* Table: belong_to                                             */
/*==============================================================*/
create table chist_belongto
(
   topic_id             numeric(11,0) not null,
   post_id              numeric(11,0) not null,
   primary key (topic_id, post_id)
);

/*==============================================================*/
/* Table: follow                                                */
/*==============================================================*/
create table chist_follow
(
   follower_id          numeric(11,0) not null,
   followed_user_id     numeric(11,0) not null,
   primary key (follower_id, followed_user_id)
);

/*==============================================================*/
/* Table: "like"                                                */
/*==============================================================*/
create table chist_like
(
   post_id              numeric(11,0) not null,
   user_id              numeric(11,0) not null,
   primary key (post_id, user_id)
);

/*==============================================================*/
/* Table: remind                                                */
/*==============================================================*/
create table chist_remind
(
   post_id              numeric(11,0) not null,
   user_id              numeric(11,0) not null,
   primary key (post_id, user_id)
);
