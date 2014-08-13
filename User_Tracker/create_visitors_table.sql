CREATE TABLE `visitors_table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_ip` varchar(32) DEFAULT NULL,
  `visitors_browser` varchar(255) DEFAULT NULL,
  `visitors_hour` smallint(2) NOT NULL DEFAULT '0',
  `visitors_minute` smallint(2) NOT NULL DEFAULT '0',
  `visitors_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visitors_day` smallint(2) NOT NULL,
  `visitors_month` smallint(2) NOT NULL,
  `visitors_year` smallint(4) NOT NULL,
  `visitors_refferer` varchar(255) DEFAULT NULL,
  `visitors_page` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;