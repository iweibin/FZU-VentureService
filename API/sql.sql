
CREATE TABLE IF NOT EXISTS `vs_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(10) NOT NULL COMMENT '用户昵称',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `gender` tinyint(1) NOT NULL COMMENT '性别（0女1男）',
  `tel` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `userKey` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `reg_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `log_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `groupid` tinyint(1) NOT NULL COMMENT '用户组(0学生 1导师 2企业)',
  `tags` varchar(100) DEFAULT NULL COMMENT '标签编号，形如1-3-6-9',
  `avatar` varchar(100) DEFAULT NULL COMMENT '用户头像url',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vs_student` (
  `uid` mediumint(8) NOT NULL ,
  `stu_id` mediumint(9) NOT NULL COMMENT '学号',
  `school` varchar(20) NOT NULL COMMENT '学校',
  `college` varchar(20) NOT NULL COMMENT '学院',
  `major` varchar(30) NOT NULL COMMENT '专业',
  `start_year` char(4) NOT NULL COMMENT '入学年份',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `vs_powerlevels` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '功能名称',
  `controller` varchar(20) DEFAULT NULL COMMENT '控制器名称',
  `method` varchar(20) DEFAULT NULL COMMENT '方法名称',
  `level1` tinyint(1) NOT NULL COMMENT '级别1',
  `level2` tinyint(1) NOT NULL COMMENT '级别2',
  `level3` tinyint(1) NOT NULL COMMENT '级别3',
  `level4` tinyint(1) NOT NULL COMMENT '级别4',
  `level5` tinyint(1) NOT NULL COMMENT '级别5',
  `level6` tinyint(1) NOT NULL COMMENT '级别6',
  `level7` tinyint(1) NOT NULL COMMENT '级别7',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_seek_records` (
  `sid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) NOT NULL COMMENT '主题',
  `advantage` mediumtext NOT NULL COMMENT '团队优势',
  `demands` mediumtext NOT NULL COMMENT '成员要求（性格、技术）',
  `tel` varchar(30) NOT NULL COMMENT '联系电话',
  `email` varchar(50) NOT NULL COMMENT '联系邮箱',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `vs_tutors` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '导师姓名',
  `sex` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL COMMENT '导师职务',
  `title` varchar(20) NOT NULL COMMENT '导师职称',
  `introduction` mediumtext DEFAULT NULL COMMENT '导师简介',
  `addr` varchar(50) DEFAULT NULL COMMENT '通讯地址',
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `vs_teams` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `tcharge` varchar(20) NOT NULL COMMENT '队长id',
  `tname` varchar(50) NOT NULL COMMENT '团队名称',
  `goals` varchar(500) NOT NULL COMMENT '团队目标',
  `task` varchar(500) NOT NULL COMMENT '团队任务',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `memberinfo` varchar(500) NOT NULL COMMENT '队员信息',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_investors` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `charge_id` mediumint(8) NOT NULL COMMENT '投资人id',
  `name` varchar(50) NOT NULL COMMENT '投资人姓名',
  `company` varchar(30) NOT NULL COMMENT '公司名称',
  `addr` varchar(50) NOT NULL COMMENT '公司注册地址',
  `tel` varchar(11) NOT NULL COMMENT '联系电话',
  `fax` varchar(20) NOT NULL COMMENT '传真',
  `license_url` varchar(100) DEFAULT NULL COMMENT '营业执照',
  `more_info` mediumtext DEFAULT NULL COMMENT '企业详细内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `reg_time` int(11) NOT NULL COMMENT '注册时间',
  `issue_time` int(11) NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `vs_projects` (
  `pid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `stage` tinyint(1) NOT NULL COMMENT '融资阶段',
  `area` tinyint(1) NOT NULL COMMENT '所属领域',
  `type` tinyint(1) NOT NULL COMMENT '项目类别',
  `shareholding` tinyint(1) NOT NULL COMMENT '股权结构',
  `tags` varchar(100) NOT NULL COMMENT '项目标签',
  `progress` tinyint(1) NOT NULL COMMENT '项目研发进度',
  `logo` varchar(100) NOT NULL COMMENT '项目logo',
  `synopsis` varchar(500) NOT NULL COMMENT '项目简介',
  `detail` mediumtext NOT NULL COMMENT '项目详情介绍',
  `members` varchar(300) DEFAULT NULL COMMENT '团队成员',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `date` varchar(50) DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_fields` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '场地名称',
  `type` tinyint(1) NOT NULL COMMENT '场地类别',
  `pic` varchar(100) NOT NULL COMMENT '场地照片',
  `synopsis` varchar(500) NOT NULL COMMENT '场地简介',
  `detail` mediumtext NOT NULL COMMENT '场地详情介绍',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否空闲',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;








CREATE TABLE IF NOT EXISTS `vs_competitions` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `number` varchar(10) NOT NULL COMMENT '比赛编号',
  `name` varchar(20) NOT NULL COMMENT '比赛名称',
  `times` tinyint(1) NOT NULL COMMENT '届数',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  `deadline` int NOT NULL COMMENT '截止时间戳',
  `description` mediumtext NOT NULL COMMENT '比赛介绍',
  `url` varchar(100) NOT NULL COMMENT '报名链接',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vs_training` (
  `tid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '培训主题',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '培训内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '培训状态',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;






CREATE TABLE IF NOT EXISTS `vs_notice` (
  `nid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '通知主题',
  `type` tinyint(1) NOT NULL COMMENT '通知类型',
  `date` varchar(50) NOT NULL COMMENT '发布时间',
  `content` mediumtext NOT NULL COMMENT '通知内容',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否发布',
  `rank` smallint(5) NOT NULL COMMENT '排序',
  `overhead` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否顶置',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;






CREATE TABLE IF NOT EXISTS `vs_application` (
  `aid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) NOT NULL COMMENT '申请主题',
  `date` varchar(50) NOT NULL COMMENT '申请时间',
  `content` mediumtext NOT NULL COMMENT '申请内容',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '申请审核状态',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `vs_user_token` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `token` varchar(32) NOT NULL,
  `groupid` tinyint(1) NOT NULL,
  `token_expire` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `vs_classes` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '课堂名称',
  `theme` mediumtext NOT NULL COMMENT '课堂主要内容',
  `teacher` varchar(30) NOT NULL COMMENT '主讲人',
  `limit` int NOT NULL COMMENT '课堂限定人数',
  `students` int NOT NULL COMMENT '报名学生数目',
  `issue_time` int NOT NULL COMMENT '发布时间戳',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `vs_documents` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '文件名',
  `url` varchar(100) NOT NULL COMMENT '文件存放路径',
  `issue_time` int NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
