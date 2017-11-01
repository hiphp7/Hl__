/*
Navicat MySQL Data Transfer

Source Server         : hanglv
Source Server Version : 50626
Source Host           : 112.74.171.99:3306
Source Database       : air

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-12-12 17:53:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for airline
-- ----------------------------
DROP TABLE IF EXISTS `airline`;
CREATE TABLE `airline` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `C_Country` varchar(50) NOT NULL COMMENT '中文国家',
  `E_Country` varchar(50) DEFAULT NULL COMMENT '英文国家',
  `C_Airline` varchar(50) NOT NULL COMMENT '中文航空公司',
  `E_Airline` varchar(50) DEFAULT NULL COMMENT '航空公司名称，英文',
  `C_Short` varchar(20) DEFAULT NULL COMMENT '中文简称',
  `E_Short` varchar(20) DEFAULT NULL COMMENT '英文简称',
  `Status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `CreationTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '记录创建时间',
  `LastTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后修改时间',
  `Note` varchar(200) DEFAULT NULL COMMENT '备注',
  `Code` varchar(2) NOT NULL COMMENT '航空公司二字代码',
  `Website` varchar(100) DEFAULT NULL COMMENT '网址',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`) USING BTREE,
  UNIQUE KEY `Code` (`Code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COMMENT='航空公司信息';

-- ----------------------------
-- Records of airline
-- ----------------------------
INSERT INTO `airline` VALUES ('1', '中国', 'China', '四川航空', '', '四川航空', '', '0', '2016-05-10 00:00:00', '2016-03-12 17:00:17', '', '3U', 'http://www.scal.com.cn/web');
INSERT INTO `airline` VALUES ('2', '中国', 'China', '海南航空', '', '海南航空', '', '0', '2016-05-10 00:00:00', '2016-03-10 08:31:19', '', 'HU', 'http://www.hnair.com/hnair2014/index/');
INSERT INTO `airline` VALUES ('3', '中国', 'China', '厦门航空公司', '', '厦门航空', '', '0', '2016-05-10 00:00:00', '2016-03-10 08:57:09', '', 'MF', 'http://www.xiamenair.com');
INSERT INTO `airline` VALUES ('4', '中国', 'China', '华夏航空', null, '华夏航空', null, '0', '2016-05-10 00:00:00', '0000-00-00 00:00:00', '', 'G5', 'http://new.chinaexpressair.com/');
INSERT INTO `airline` VALUES ('5', '中国', 'China', '首都航空', null, '首都航空', null, '1', '2016-05-10 00:00:00', '0000-00-00 00:00:00', '待检测', 'JD', 'http://www.jdair.net');
INSERT INTO `airline` VALUES ('6', '香港', 'China', '港龙航空', null, '港龙航空', null, '0', '2016-05-10 00:00:00', '0000-00-00 00:00:00', '', 'KA', 'https://www.dragonair.com/ka/sc_CN.html');
INSERT INTO `airline` VALUES ('7', '中国', 'China', '天津航空', 'China', '天津航空', null, '1', '2016-05-10 00:00:00', '0000-00-00 00:00:00', '', 'GS', 'http://www.tianjin-air.com/index.jsp');
INSERT INTO `airline` VALUES ('8', '中国', 'China', '西藏航空', '', '西藏航空', '', '1', '2016-05-10 00:00:00', '2016-01-29 16:53:48', '', 'TV', 'http://www.tibetairlines.com.cn/tibetair/index.jsp');
INSERT INTO `airline` VALUES ('9', '中国', 'China', '上海吉祥航空公司', null, '吉祥航空', null, '0', '2016-05-10 12:04:00', '0000-00-00 00:00:00', null, 'HO', null);
INSERT INTO `airline` VALUES ('10', '中国', 'China', '祥鹏航空', null, '祥鹏航空', null, '0', '2016-05-10 00:00:00', '0000-00-00 00:00:00', '', '8L', 'http://www.luckyair.net/');
INSERT INTO `airline` VALUES ('11', '中国', 'China', '瑞丽航空', '', '瑞丽航空', '', '1', '0000-00-00 00:00:00', '2016-03-10 08:56:55', '', 'DR', 'http://www.rlair.net/index.html');
INSERT INTO `airline` VALUES ('12', '中国', 'China', '长龙航空', null, '长龙航空', null, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'GJ', 'http://www.loongair.cn/b2c');
INSERT INTO `airline` VALUES ('13', '中国', 'China', '昆明航空公司', '', '昆明航空', '', '0', '0000-00-00 00:00:00', '2016-03-10 08:32:13', '', 'KY', 'http://www.airkunming.com/');
INSERT INTO `airline` VALUES ('14', '中国', 'China', '东海航空公司', null, '东海航空', null, '0', '2016-05-10 12:05:40', '0000-00-00 00:00:00', null, 'DZ', null);
INSERT INTO `airline` VALUES ('15', '中国', 'China', '中国国际航空公司', null, '中国国航', null, '0', '2016-05-10 12:06:01', '0000-00-00 00:00:00', null, 'CA', null);
INSERT INTO `airline` VALUES ('16', '中国', 'China', '联合航空', null, '联合航空', null, '0', '2016-05-10 12:07:39', '0000-00-00 00:00:00', null, 'KN', null);
INSERT INTO `airline` VALUES ('17', '中国', 'China', '奥凯航空', null, '奥凯航空', null, '0', '2016-05-10 12:08:05', '0000-00-00 00:00:00', null, 'BK', null);
INSERT INTO `airline` VALUES ('18', '中国', 'China', '西部航空', null, '西部航空', null, '0', '2016-05-10 12:10:15', '0000-00-00 00:00:00', null, 'PN', null);
INSERT INTO `airline` VALUES ('19', '中国', 'China', '中国南方航空公司', null, '南方航空', null, '0', '2016-05-10 12:01:24', '0000-00-00 00:00:00', null, 'CZ', null);
INSERT INTO `airline` VALUES ('20', '中国', 'China', '中国东方航空公司', null, '东方航空', null, '0', '2016-05-10 12:02:46', '0000-00-00 00:00:00', null, 'MU', null);
INSERT INTO `airline` VALUES ('21', '中国', 'China', '重庆航空', null, '重庆航空', null, '0', '2016-05-10 12:13:07', '0000-00-00 00:00:00', null, 'OQ', null);
INSERT INTO `airline` VALUES ('22', '中国', 'China', '大新华航空', null, '大新华航空', null, '0', '2016-05-10 12:13:43', '0000-00-00 00:00:00', null, 'CN', null);
INSERT INTO `airline` VALUES ('23', '中国', 'China', '河北航空', null, '河北航空', null, '0', '2016-05-10 12:14:04', '0000-00-00 00:00:00', null, 'NS', null);
INSERT INTO `airline` VALUES ('24', '中国', 'China', '鲲鹏航空', null, '鲲鹏航空', null, '0', '2016-05-10 12:14:40', '0000-00-00 00:00:00', null, 'VD', null);
INSERT INTO `airline` VALUES ('25', '中国', 'China', '幸福航空', null, '幸福航空', null, '0', '2016-05-10 12:14:56', '0000-00-00 00:00:00', null, 'JR', null);
INSERT INTO `airline` VALUES ('26', '中国', 'China', '春秋航空', null, '春秋航空', null, '0', '2016-05-10 12:15:31', '0000-00-00 00:00:00', null, '9C', null);
INSERT INTO `airline` VALUES ('27', '中国', 'China', '成都航空', null, '成都航空', null, '0', '2016-05-10 12:16:40', '0000-00-00 00:00:00', null, 'EU', null);
INSERT INTO `airline` VALUES ('28', '中国', 'China', '上海航空', null, '上海航空', null, '0', '2016-05-10 12:17:10', '0000-00-00 00:00:00', null, 'FM', null);
INSERT INTO `airline` VALUES ('29', '中国', 'China', '山东航空', null, '山东航空', null, '0', '2016-05-10 12:17:51', '0000-00-00 00:00:00', null, 'SC', null);
INSERT INTO `airline` VALUES ('30', '中国', 'China', '深圳航空', null, '深圳航空', null, '0', '2016-05-10 12:18:07', '0000-00-00 00:00:00', null, 'ZH', null);
INSERT INTO `airline` VALUES ('31', '中国', 'China', '九元航空', null, '九元航空', null, '0', '2016-05-10 12:19:35', '0000-00-00 00:00:00', null, 'AQ', null);

-- ----------------------------
-- Table structure for airport
-- ----------------------------
DROP TABLE IF EXISTS `airport`;
CREATE TABLE `airport` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `Code` char(3) NOT NULL COMMENT '机场三字代码',
  `City` varchar(50) NOT NULL COMMENT '机场所在城市，中文',
  `Airport` varchar(50) NOT NULL COMMENT '机场名称，中文',
  `Short` varchar(12) NOT NULL COMMENT '机场简称',
  `IsDefault` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-默认机场，1-非默认机场',
  `Status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热门，0-非热门，1-热门',
  `PinYin` varchar(100) NOT NULL COMMENT '全拼',
  `Seq` int(11) NOT NULL DEFAULT '0' COMMENT '热门城市显示顺序，大数排前面',
  `CreationTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '记录创建时间',
  PRIMARY KEY (`ID`),
  KEY `Code` (`Code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airport
-- ----------------------------
INSERT INTO `airport` VALUES ('1', 'AEB', '百色', '百色巴马机场', '巴马机场', '0', '0', 'Baise', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('2', 'ACX', '兴义', '兴义机场', '兴义机场', '0', '0', 'Xingyi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('3', 'AKA', '安康', '安康五里铺机场', '五里铺机场', '0', '0', 'Ankang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('4', 'AAT', '阿勒泰', '阿勒泰机场', '阿勒泰机场', '0', '0', 'Aletai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('5', 'AXF', '阿拉善左旗', '巴彦浩特机场', '巴彦浩特机场', '0', '0', 'Alashanzuoqi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('6', 'AOG', '鞍山', '鞍山腾鳌机场', '腾鳌机场', '0', '0', 'Anshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('7', 'AQG', '安庆', '安庆天柱山机场', '天柱山机场', '0', '0', 'Anqing', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('8', 'AVA', '安顺', '安顺黄果树机场', '黄果树机场', '0', '0', 'Anshun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('9', 'AKU', '阿克苏', '阿克苏机场', '阿克苏机场', '0', '0', 'Akesu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('10', 'BGF', '班吉', '班吉机场', '班吉机场', '0', '0', 'Banji', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('11', 'BFJ', '毕节', '毕节飞雄机场', '飞雄机场', '0', '0', 'Bijie', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('12', 'BPL', '博乐', '博乐阿拉山口机场', '阿拉山口机场', '0', '0', 'Bole', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('13', 'BAV', '包头', '包头二里半机场', '二里半机场', '0', '0', 'Baotou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('14', 'BHY', '北海', '北海福成机场', '福成机场', '0', '0', 'Beihai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('15', 'BSD', '保山', '保山云瑞机场', '云瑞机场', '0', '0', 'Baoshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('16', 'BPX', '昌都', '昌都邦达机场', '邦达机场', '0', '0', 'Changdu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('17', 'CMJ', '七美', '七美机场', '七美机场', '0', '0', 'Qimei', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('18', 'CYI', '嘉义', '嘉义机场', '嘉义机场', '0', '0', 'Jiayi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('19', 'CIF', '赤峰', '赤峰玉龙机场', '玉龙机场', '0', '0', 'Chifeng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('20', 'CNI', '长海', '长海大长山岛机场', '大长山岛机场', '0', '0', 'Zhanghai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('21', 'CGQ', '长春', '长春龙嘉国际机场', '龙嘉机场', '0', '0', 'Changchun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('22', 'CZX', '常州', '常州奔牛机场', '奔牛机场', '0', '0', 'Changzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('23', 'CGO', '郑州', '郑州新郑国际机场', '新郑机场', '0', '0', 'Zhengzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('24', 'CSX', '长沙', '长沙黄花国际机场', '黄花机场', '0', '0', 'Changsha', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('25', 'CAN', '广州', '广州白云国际机场', '白云机场', '0', '1', 'Guangzhou', '7', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('26', 'CTU', '成都', '成都双流国际机场', '双流机场', '0', '0', 'Chengdu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('27', 'CIH', '长治', '长治王村机场', '王村机场', '0', '0', 'Changzhi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('28', 'CHG', '朝阳', '朝阳机场', '朝阳机场', '0', '0', 'Chaoyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('29', 'CGD', '常德', '常德桃花源机场', '桃花源机场', '0', '0', 'Changde', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('30', 'CKG', '重庆', '重庆江北国际机场', '江北机场', '0', '0', 'Chongqing', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('31', 'DAT', '大同', '大同云冈机场', '云冈机场', '0', '0', 'Datong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('32', 'DLC', '大连', '大连周水子国际机场', '周水子机场', '0', '0', 'Dalian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('33', 'DQA', '大庆', '大庆萨尔图机场', '萨尔图机场', '0', '0', 'Daqing', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('34', 'DCY', '稻城', '稻城亚丁机场', '亚丁机场', '0', '0', 'Daocheng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('35', 'DLU', '大理', '大理机场', '大理机场', '0', '0', 'Dali', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('36', 'DIG', '香格里拉', '迪庆香格里拉机场', '迪庆机场', '0', '0', 'Xianggelila', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('37', 'DSN', '鄂尔多斯', '鄂尔多斯伊金霍洛机场', '伊金霍洛机场', '0', '0', 'Eerduosi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('38', 'DDG', '丹东', '丹东浪头机场', '浪头机场', '0', '0', 'Dandong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('39', 'DOY', '东营', '东营胜利机场', '胜利机场', '0', '0', 'Dongying', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('40', 'DYG', '张家界', '张家界荷花国际机场', '荷花机场', '0', '0', 'Zhangjiajie', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('41', 'DAX', '达州', '达州河市机场', '河市机场', '0', '0', 'Dazhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('42', 'DNH', '敦煌', '敦煌机场', '敦煌机场', '0', '0', 'Dunhuang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('43', 'EJN', '额济纳旗', '额济纳旗桃来机场', '桃来机场', '0', '0', 'Ejinaqi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('44', 'ERL', '二连浩特', '二连浩特赛乌苏机场', '赛乌苏机场', '0', '0', 'Erlianhaote', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('45', 'ENH', '恩施', '恩施许家坪机场', '许家坪机场', '0', '0', 'Enshi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('46', 'ENY', '延安', '延安二十里堡机场', '二十里堡机场', '0', '0', 'Yanan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('47', 'FUG', '阜阳', '阜阳西关机场', '西关机场', '0', '0', 'Fuyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('48', 'FOC', '福州', '福州长乐国际机场', '长乐机场', '0', '0', 'Fuzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('49', 'FUO', '佛山', '佛山沙堤机场', '沙堤机场', '0', '0', 'Foshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('50', 'FYN', '富蕴', '富蕴机场', '富蕴机场', '0', '0', 'Fuyun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('51', 'GNI', '格林岛', '格林岛机场', '格林岛机场', '0', '0', 'Gelindao', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('52', 'GYS', '广元', '广元盘龙机场', '盘龙机场', '0', '0', 'Guangyuan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('53', 'GXH', '夏河', '甘南夏河机场', '甘南机场', '0', '0', 'Xiahe', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('54', 'GOQ', '格尔木', '格尔木机场', '格尔木机场', '0', '0', 'Geermu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('55', 'GYU', '固原', '固原六盘山机场', '六盘山机场', '0', '0', 'Guyuan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('56', 'HCN', '恒春', '恒春机场', '恒春机场', '0', '0', 'Hengchun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('57', 'HUN', '花莲', '花莲机场', '花莲机场', '0', '0', 'Hualian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('58', 'HDG', '邯郸', '邯郸机场', '邯郸机场', '0', '0', 'Handan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('59', 'HET', '呼和浩特', '呼和浩特白塔国际机场', '白塔机场', '0', '0', 'Huhehaote', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('60', 'HRB', '哈尔滨', '哈尔滨太平国际机场', '太平机场', '0', '0', 'Haerbin', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('61', 'HSN', '舟山', '舟山普陀山机场', '普陀山机场', '0', '0', 'Zhoushan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('62', 'HFE', '合肥', '合肥新桥国际机场', '新桥机场', '0', '0', 'Hefei', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('63', 'HJJ', '怀化', '怀化芷江机场', '芷江机场', '0', '0', 'Huaihua', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('64', 'HSC', '韶关', '韶关桂头机场', '桂头机场', '0', '0', 'Shaoguan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('65', 'HMI', '哈密', '哈密机场', '哈密机场', '0', '0', 'Hami', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('66', 'HLD', '海拉尔', '呼伦贝尔海拉尔机场', '呼伦贝尔机场', '0', '0', 'Hailaer', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('67', 'HLH', '乌兰浩特', '乌兰浩特机场', '乌兰浩特机场', '0', '0', 'Wulanhaote', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('68', 'HEK', '黑河', '黑河机场', '黑河机场', '0', '0', 'Heihe', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('69', 'HIA', '淮安', '淮安涟水机场', '涟水机场', '0', '0', 'Huaian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('70', 'HYN', '黄岩', '台州路桥机场', '台州路桥机场', '0', '0', 'Huangyan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('71', 'HGH', '杭州', '杭州萧山国际机场', '萧山机场', '0', '0', 'Hangzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('72', 'HUZ', '惠州', '惠州平潭机场', '平潭机场', '0', '0', 'Huizhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('73', 'HAK', '海口', '海口美兰国际机场', '美兰机场', '0', '1', 'Haikou', '1', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('74', 'HZH', '黎平', '黎平机场', '黎平机场', '0', '0', 'liping', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('75', 'HZG', '汉中', '汉中西关机场', '西关机场', '0', '0', 'Hanzhong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('76', 'HTN', '和田', '和田机场', '和田机场', '0', '0', 'Hetian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('77', 'IQN', '庆阳', '庆阳机场', '庆阳机场', '0', '0', 'Qingyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('78', 'INC', '银川', '银川河东国际机场', '河东机场', '0', '0', 'Yinchuan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('79', 'IQM', '且末', '且末机场', '且末机场', '0', '0', 'Qiemo', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('80', 'JNZ', '锦州', '锦州小岭子机场', '小岭子机场', '0', '0', 'Jinzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('81', 'JMU', '佳木斯', '佳木斯东郊机场', '东郊机场', '0', '0', 'Jiamusi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('82', 'JUZ', '衢州', '衢州机场', '衢州机场', '0', '0', 'QuZhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('83', 'JUH', '池州', '池州九华山机场', '九华山机场', '0', '0', 'Chizhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('84', 'JGS', '井冈山', '井冈山机场', '井冈山机场', '0', '0', 'Jinggangshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('85', 'JIU', '九江', '九江庐山机场', '庐山机场', '0', '0', 'Jiujiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('86', 'JHG', '西双版纳', '西双版纳嘎洒国际机场', '嘎洒机场', '0', '0', 'Xishuangbanna', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('87', 'JGN', '嘉峪关', '嘉峪关机场', '嘉峪关机场', '0', '0', 'Jiayuguan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('88', 'JXA', '鸡西', '鸡西兴凯湖机场', '兴凯湖机场', '0', '0', 'Jixi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('89', 'JGD', '加格达奇', '加格达奇机场', '加格达奇机场', '0', '0', 'Jiagedaqi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('90', 'JJN', '晋江', '泉州晋江机场', '泉州机场', '0', '0', 'Jinjiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('91', 'JDZ', '景德镇', '景德镇罗家机场', '罗家机场', '0', '0', 'Jingdezhen', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('92', 'JNG', '济宁', '济宁曲阜机场', '曲阜机场', '0', '0', 'Jining', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('93', 'JIQ', '黔江', '黔江武陵山机场', '武陵山机场', '0', '0', 'Qianjiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('94', 'JZH', '九寨沟', '九寨黄龙机场', '九寨黄龙机场', '0', '0', 'Jiuzhaigou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('95', 'JIC', '金昌', '金昌金川机场', '金川机场', '0', '0', 'Jinchang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('96', 'KHH', '高雄', '高雄国际机场', '国际机场', '0', '0', 'Gaoxiong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('98', 'KNH', '金门', '台湾金门机场', '台湾机场', '0', '0', 'Jinmen', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('99', 'KHN', '南昌', '南昌昌北国际机场', '昌北机场', '0', '0', 'Nanchang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('100', 'KWL', '桂林', '桂林两江国际机场', '两江机场', '0', '0', 'Guilin', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('101', 'KJH', '凯里', '凯里黄平机场', '黄平机场', '0', '0', 'Kaili', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('102', 'KRL', '库尔勒', '库尔勒机场', '库尔勒机场', '0', '0', 'Kuerle', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('103', 'KHG', '喀什', '喀什机场', '喀什机场', '0', '0', 'Kashi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('104', 'KCA', '库车', '库车龟兹机场', '龟兹机场', '0', '0', 'Kuche', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('105', 'KOW', '赣州', '赣州黄金机场', '黄金机场', '0', '0', 'Ganzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('106', 'KGT', '康定', '甘孜康定机场', '甘孜机场', '0', '0', 'Kangding', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('107', 'KWE', '贵阳', '贵阳龙洞堡国际机场', '龙洞堡机场', '0', '0', 'Guiyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('108', 'KMG', '昆明', '昆明长水国际机场', '长水机场', '0', '0', 'Kunming', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('109', 'KJI', '喀纳斯', '布尔津喀纳斯机场', '布尔津机场', '0', '0', 'Kanasi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('110', 'KRY', '克拉玛依', '克拉玛依机场', '克拉玛依机场', '0', '0', 'Kelamayi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('111', 'LLV', '吕梁', '吕梁机场', '吕梁机场', '0', '0', 'Lvliang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('112', 'LDS', '伊春', '伊春林都机场', '林都机场', '0', '0', 'Yichun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('113', 'LCX', '连城', '连城冠豸山机场', '冠豸山机场', '0', '0', 'Liancheng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('114', 'LJG', '丽江', '丽江三义机场', '三义机场', '0', '0', 'Lijiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('115', 'LXA', '拉萨', '拉萨贡嘎机场', '贡嘎机场', '0', '0', 'Lasa', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('116', 'LYG', '连云港', '连云港白塔埠机场', '白塔埠机场', '0', '0', 'Lianyungang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('117', 'LYI', '临沂', '临沂沭埠岭机场', '沭埠岭机场', '0', '0', 'Linyi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('118', 'LYA', '洛阳', '洛阳北郊机场', '北郊机场', '0', '0', 'Luoyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('119', 'LLF', '永州', '永州零陵机场', '零陵机场', '0', '0', 'Yongzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('120', 'LZH', '柳州', '柳州白莲机场', '白莲机场', '0', '0', 'Liuzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('121', 'LZO', '泸州', '泸州蓝田机场', '蓝田机场', '0', '0', 'LuZhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('122', 'LLB', '荔波', '荔波机场', '荔波机场', '0', '0', 'Libo', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('123', 'LNJ', '临沧', '临沧机场', '临沧机场', '0', '0', 'Lincang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('124', 'LUM', '芒市', '德宏芒市机场', '德宏机场', '0', '0', 'Mangshi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('125', 'LZY', '林芝', '林芝米林机场', '米林机场', '0', '0', 'Linzhi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('126', 'LHW', '兰州', '兰州中川机场', '中川机场', '0', '0', 'Lanzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('127', 'MFK', '马祖', '马祖机场', '马祖机场', '0', '0', 'Mazu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('128', 'MFM', '澳门', '澳门国际机场', '国际机场', '0', '0', 'Aomen', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('129', 'MZG', '马公', '马公机场', '马公机场', '0', '0', 'Magong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('130', 'MXZ', '梅县', '梅县长岗岌机场', '长岗岌机场', '0', '0', 'Meixian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('131', 'MIG', '绵阳', '绵阳南郊机场', '南郊机场', '0', '0', 'Mianyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('132', 'MDG', '牡丹江', '牡丹江海浪机场', '海浪机场', '0', '0', 'Mudanjiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('133', 'NZH', '满洲里', '满洲里西郊机场', '西郊机场', '0', '0', 'Mianzhonli', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('134', 'NBS', '长白山', '长白山机场', '长白山机场', '0', '0', 'Zhangbaishan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('135', 'NDG', '齐齐哈尔', '齐齐哈尔三家子机场', '三家子机场', '0', '0', 'Qiqihaer', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('136', 'NTG', '南通', '南通兴东机场', '兴东机场', '0', '0', 'Nantong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('137', 'NNG', '南宁', '南宁吴圩国际机场', '吴圩机场', '0', '1', 'Nanning', '2', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('138', 'NAO', '南充', '南充高坪机场', '高坪机场', '0', '0', 'Nanchong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('139', 'NAY', '北京', '北京南苑机场', '南苑机场', '1', '1', 'Beijing', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('140', 'NKG', '南京', '南京禄口国际机场', '禄口机场', '0', '0', 'Nanjing', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('141', 'NGB', '宁波', '宁波栎社国际机场', '栎社机场', '0', '0', 'Ningbo', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('142', 'NNY', '南阳', '南阳姜营机场', '姜营机场', '0', '0', 'Nanyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('143', 'NGQ', '阿里', '阿里昆莎机场', '昆莎机场', '0', '0', 'Ali', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('144', 'NLT', '那拉提', '新源那拉提机场', '新源机场', '0', '0', 'Nalati', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('145', 'OHE', '漠河', '漠河古莲机场', '古莲机场', '0', '0', 'Mohe', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('146', 'PIF', '屏东', '屏东机场', '屏东机场', '0', '0', 'Pingdong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('147', 'PVG', '上海', '上海浦东国际机场', '浦东机场', '1', '1', 'Shanghai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('148', 'PZI', '攀枝花', '攀枝花保安营机场', '保安营机场', '0', '0', 'Panzhihua', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('149', 'PEK', '北京', '北京首都国际机场', '首都机场', '0', '1', 'Beijing', '9', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('150', 'RMQ', '清泉岗', '台湾清泉岗机场', '台湾机场', '0', '0', 'Qingquangang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('151', 'RHT', '阿拉善右旗', '阿右旗巴丹吉林机场', '阿右旗机场', '0', '0', 'Alashanyouqi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('152', 'RKZ', '日喀则', '日喀则和平机场', '和平机场', '0', '0', 'Rikaze', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('153', 'RLK', '巴彦淖尔', '巴彦淖尔天吉泰机场', '天吉泰机场', '0', '0', 'Bayannaoer', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('154', 'SJW', '石家庄', '石家庄正定国际机场', '正定机场', '0', '0', 'Shijiazhuang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('155', 'SZX', '深圳', '深圳宝安国际机场', '宝安机场', '0', '1', 'Shenzhen', '6', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('156', 'SYX', '三亚', '三亚凤凰国际机场', '凤凰机场', '0', '0', 'Sanya', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('157', 'SHP', '秦皇岛', '秦皇岛山海关机场', '山海关机场', '0', '0', 'Qinhuangdao', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('158', 'SHE', '沈阳', '沈阳桃仙国际机场', '桃仙机场', '0', '0', 'Shenyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('159', 'SHA', '上海', '上海虹桥国际机场', '虹桥机场', '0', '1', 'Shanghai', '8', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('160', 'SWA', '揭阳', '揭阳潮汕机场', '潮汕机场', '0', '0', 'Jieyang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('161', 'SUN', '遂宁', '遂宁机场', '遂宁机场', '0', '0', 'Suining', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('162', 'SYM', '普洱', '普洱思茅机场', '思茅机场', '0', '0', 'Puer', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('163', 'TNN', '台南', '台南机场', '台南机场', '0', '0', 'Tainan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('164', 'TPE', '台北', '桃园机场', '桃园机场', '1', '0', 'Taibei', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('165', 'TTT', '台东', '台东机场', '台东机场', '0', '0', 'Taidong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('166', 'TVS', '唐山', '唐山三女河机场', '三女河机场', '0', '0', 'Tangshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('167', 'TGO', '通辽', '通辽机场', '通辽机场', '0', '0', 'Tongliao', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('168', 'TNA', '济南', '济南遥墙国际机场', '遥墙机场', '0', '0', 'Jinan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('169', 'TEN', '铜仁', '铜仁凤凰机场', '凤凰机场', '0', '0', 'Tongren', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('170', 'TCZ', '腾冲', '腾冲驼峰机场', '驼峰机场', '0', '0', 'Tengchong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('171', 'TLQ', '吐鲁番', '吐鲁番交河机场', '交河机场', '0', '0', 'Tulufan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('172', 'TPE', '台北', '桃园国际机场', '桃园机场', '0', '0', 'Taibei', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('173', 'TSN', '天津', '天津滨海国际机场', '滨海机场', '0', '1', 'Tianjin', '3', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('174', 'TYN', '太原', '太原武宿国际机场', '武宿机场', '0', '0', 'Taiyuan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('175', 'TNH', '通化', '通化三源浦机场', '三源浦机场', '0', '0', 'Tonghua', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('176', 'TXN', '黄山', '黄山屯溪机场', '屯溪机场', '0', '0', 'Huangshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('177', 'TAO', '青岛', '青岛流亭国际机场', '流亭机场', '0', '0', 'Qingdao', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('178', 'THQ', '天水', '天水麦积山机场', '麦积山机场', '0', '0', 'Tianshui', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('179', 'TCG', '塔城', '塔城机场', '塔城机场', '0', '0', 'Tacheng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('180', 'TSA', '松山', '台北松山机场', '台北机场', '0', '0', 'Songsan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('181', 'UYN', '榆林', '榆林榆阳机场', '榆阳机场', '0', '0', 'Yulin', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('182', 'URC', '乌鲁木齐', '乌鲁木齐地窝堡国际机场', '地窝堡机场', '0', '0', 'Wulumuqi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('183', 'WOT', '望安', '望安机场', '望安机场', '0', '0', 'Wangan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('184', 'WUS', '武夷山', '武夷山机场', '武夷山机场', '0', '0', 'Wuyishan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('185', 'WEF', '潍坊', '潍坊机场', '潍坊机场', '0', '0', 'Weifang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('186', 'WEH', '威海', '威海国际机场', '国际机场', '0', '0', 'Weihai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('187', 'WXN', '万县', '万州五桥机场', '万州五桥机场', '0', '0', 'Wanxian', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('188', 'WNH', '文山', '文山普者黑机场', '普者黑机场', '0', '0', 'Wenshan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('189', 'WUA', '乌海', '乌海机场', '乌海机场', '0', '0', 'Wuhai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('190', 'WUX', '无锡', '苏南硕放国际机场', '苏南硕放机场', '0', '0', 'Wuxi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('191', 'WNZ', '温州', '温州龙湾国际机场', '龙湾机场', '0', '0', 'Wenzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('192', 'WUH', '武汉', '武汉天河国际机场', '天河机场', '0', '1', 'Wuhan', '4', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('193', 'WUZ', '梧州', '梧州长洲岛机场', '长洲岛机场', '0', '0', 'Wuzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('194', 'XIL', '锡林浩特', '锡林浩特机场', '锡林浩特机场', '0', '0', 'Xilinhaote', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('195', 'XUZ', '徐州', '徐州观音机场', '观音机场', '0', '0', 'Xuzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('196', 'XFN', '襄樊', '襄阳刘集机场', '襄阳刘集机场', '0', '0', 'Xiangfan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('197', 'XIC', '西昌', '西昌青山机场', '青山机场', '0', '0', 'Xichang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('198', 'XNT', '邢台', '邢台褡裢机场', '褡裢机场', '0', '0', 'Xingtai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('199', 'XMN', '厦门', '厦门高崎国际机场', '高崎机场', '0', '0', 'Xiamen', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('200', 'XIY', '西安', '西安咸阳国际机场', '咸阳机场', '0', '1', 'Xian', '5', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('201', 'XNN', '西宁', '西宁曹家堡机场', '曹家堡机场', '0', '0', 'Xining', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('202', 'YIE', '阿尔山', '阿尔山伊尔施机场', '伊尔施机场', '0', '0', 'Aershan', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('203', 'YTY', '扬州', '扬州泰州机场', '泰州机场', '0', '0', 'Yangzhou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('204', 'YIW', '义乌', '义乌机场', '义乌机场', '0', '0', 'yiwu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('205', 'YNT', '烟台', '烟台莱山国际机场', '莱山机场', '0', '0', 'Yantai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('206', 'YIH', '宜昌', '宜昌三峡机场', '三峡机场', '0', '0', 'Yichang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('207', 'YZY', '张掖', '张掖甘州机场', '甘州机场', '0', '0', 'Zhangye', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('208', 'YIN', '伊宁', '伊宁机场', '伊宁机场', '0', '0', 'Yining', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('209', 'YCU', '运城', '运城机场', '运城机场', '0', '0', 'Yuncheng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('210', 'YNJ', '延吉', '延吉朝阳川机场', '朝阳川机场', '0', '0', 'Yanji', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('211', 'YNZ', '盐城', '盐城南洋机场', '南洋机场', '0', '0', 'Yancheng', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('212', 'YIC', '宜春', '宜春明月山机场', '明月山机场', '0', '0', 'Yichun', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('213', 'YBP', '宜宾', '宜宾菜坝机场', '菜坝机场', '0', '0', 'Yibin', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('214', 'YUS', '玉树', '玉树巴塘机场', '巴塘机场', '0', '0', 'Yushu', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('215', 'ZHA', '湛江', '湛江机场', '湛江机场', '0', '0', 'Zhanjiang', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('216', 'ZQZ', '张家口', '张家口宁远机场', '宁远机场', '0', '0', 'Zhangjiakou', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('217', 'ZUH', '珠海', '珠海金湾机场', '金湾机场', '0', '0', 'Zhuhai', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('218', 'ZYI', '遵义', '遵义新舟机场', '新舟机场', '0', '0', 'Zunyi', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('219', 'ZAT', '昭通', '昭通机场', '昭通机场', '0', '0', 'Zhaotong', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('220', 'ZHY', '中卫', '中卫沙坡头机场', '沙坡头机场', '0', '0', 'Zhongwei', '0', '2015-07-08 00:00:00');
INSERT INTO `airport` VALUES ('221', 'FYJ', '抚远', '抚远机场', '抚远机场', '0', '0', 'Fuyuan', '0', '2015-07-18 16:33:00');
INSERT INTO `airport` VALUES ('222', 'HXD', '海西', '德令哈机场', '德令哈机场', '0', '0', 'Haixi', '0', '2015-07-18 16:35:00');
INSERT INTO `airport` VALUES ('223', 'HPG', '神农架', '神农架机场', '神农架机场', '0', '0', 'Shennongjia', '0', '2015-07-18 16:36:00');
INSERT INTO `airport` VALUES ('224', 'AHJ', '阿坝', '阿坝红原机场', '红原机场', '0', '0', 'Aba', '0', '2015-07-18 16:39:00');
INSERT INTO `airport` VALUES ('225', 'HNY', '衡阳', '衡阳南岳机场', '南岳机场', '0', '0', 'Hengyang', '0', '2015-07-18 16:41:00');
INSERT INTO `airport` VALUES ('226', 'LPF', '六盘水', '六盘水月照机场', '月照机场', '0', '0', 'Liupanshui', '0', '2015-07-18 16:43:00');
INSERT INTO `airport` VALUES ('227', 'HCJ', '河池', '河池金城江机场', '金城江机场', '0', '0', 'Hechi', '0', '2015-07-18 16:45:00');

-- ----------------------------
-- Table structure for baoxianchanpin
-- ----------------------------
DROP TABLE IF EXISTS `baoxianchanpin`;
CREATE TABLE `baoxianchanpin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `baoxiangongsiid` bigint(20) DEFAULT NULL COMMENT '保险公司id',
  `chanpindaima` varchar(60) DEFAULT NULL COMMENT '产品代码',
  `chanpinmingcheng` varchar(60) DEFAULT NULL COMMENT '产品名称',
  `chanpinleibie` int(11) DEFAULT NULL COMMENT '产品类别',
  `baoxianqixian` int(11) DEFAULT NULL COMMENT '保险期限',
  `baoxianjine` double DEFAULT NULL COMMENT '保险金额',
  `baoexiangxi` text COMMENT '保额详细',
  `baoxianfanwei` text COMMENT '保险范围',
  `yanzhengdizhi` text COMMENT '验证地址',
  `fujian` text COMMENT '附件',
  `xiaoshoudanjia` double DEFAULT NULL COMMENT '销售单价',
  `chengbendanjia` double DEFAULT NULL COMMENT '成本单价',
  `jiesuanfangshi` int(11) DEFAULT NULL COMMENT '结算方式',
  `shifoutuibao` tinyint(1) DEFAULT NULL COMMENT '是否退保',
  `nianlingxianzhi` tinyint(1) DEFAULT NULL COMMENT '年龄限制',
  `shangjia` tinyint(1) DEFAULT NULL COMMENT '产品上架',
  `dangqianzhuangtai` tinyint(1) DEFAULT NULL COMMENT '当前状态',
  `zuixiaonianling` int(11) DEFAULT NULL COMMENT '最小年龄',
  `zuidanianling` int(11) DEFAULT NULL COMMENT '最大年龄',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `baoxiangongsiid` (`baoxiangongsiid`) USING BTREE,
  KEY `chanpinleibie` (`chanpinleibie`) USING BTREE,
  KEY `baoxianqixian` (`baoxianqixian`) USING BTREE,
  KEY `jiesuanfangshi` (`jiesuanfangshi`) USING BTREE,
  KEY `zuixiaonianling` (`zuixiaonianling`) USING BTREE,
  KEY `zuidanianling` (`zuidanianling`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baoxianchanpin
-- ----------------------------
INSERT INTO `baoxianchanpin` VALUES ('1', '1', null, '平安国内外航空意外险B', '0', '0', '3000000', '在保险期间内，以乘客身份乘坐民航客机期间因意外伤害事故身故/伤残，我们将按“飞机意外伤害保险金额”给付保险金。', '飞机意外身故/伤残。', null, null, '30', '1', '0', '1', '0', '0', '0', '2', '99', '4', '2016-12-07 15:41:37', null);
INSERT INTO `baoxianchanpin` VALUES ('2', '1', null, '平安国内外航空意外险A', '0', '0', '1000000', '在保险期间内，以乘客身份乘坐民航客机期间因意外伤害事故身故/伤残，我们将按“飞机意外伤害保险金额”给付保险金。', '飞机意外身故/伤残。', null, null, '20', '0.4', '0', '1', '0', null, '0', '2', '66', '4', '2016-12-07 15:45:44', null);
INSERT INTO `baoxianchanpin` VALUES ('10', '2', 's', 'd', '1', '0', '3', '33', '3s', '3dddss', null, '3', '2', '0', '0', '0', '1', null, '0', '0', '4', '2016-12-07 15:42:15', '3dd');
INSERT INTO `baoxianchanpin` VALUES ('11', '2', 's', 'd', '1', '0', '3', '33', '3s', '3dddssss', null, '3', '2', '0', '0', '0', '1', null, '0', '0', '4', '2016-12-07 15:44:51', '3dd');
INSERT INTO `baoxianchanpin` VALUES ('12', '2', 's', 'd', '1', '0', '3', '33', '3s', '3dddssss', null, '3', '2', '0', '0', '0', '1', null, '0', '0', '4', '2016-12-07 15:45:48', '3dd');

-- ----------------------------
-- Table structure for baoxiandingdan
-- ----------------------------
DROP TABLE IF EXISTS `baoxiandingdan`;
CREATE TABLE `baoxiandingdan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `baoxianchanpinid` bigint(20) DEFAULT NULL COMMENT '保险产品id',
  `hangchenglvkeid` bigint(20) DEFAULT NULL COMMENT '航程旅客id',
  `dingdanzhuangtai` varchar(60) DEFAULT NULL COMMENT '订单状态',
  `dingdanzongjia` double DEFAULT NULL COMMENT '订单总价',
  `baoxianleixing` varchar(60) DEFAULT NULL COMMENT '保险类型',
  `baoxiandingdanhao` varchar(60) DEFAULT NULL COMMENT '保险订单号',
  `waicaipingtai` varchar(60) DEFAULT NULL COMMENT '外采平台',
  `waicaidingdanbianhao` varchar(60) DEFAULT NULL COMMENT '外采订单编号',
  `waicaizongjia` double DEFAULT NULL COMMENT '外采总价',
  `waicaibeizhu` text COMMENT '外采备注',
  `baodanhao` varchar(60) DEFAULT NULL COMMENT '保单号',
  `baodanzhuangtai` varchar(60) DEFAULT NULL COMMENT '保单状态',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `shengxiaoriqi` datetime DEFAULT NULL COMMENT '生效日期',
  `chulishijian` datetime DEFAULT NULL COMMENT '处理时间',
  `wanchengshijian` datetime DEFAULT NULL COMMENT '完成时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  `suodan` tinyint(1) DEFAULT NULL,
  `suodanid` bigint(20) DEFAULT NULL,
  `suodanshijian` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `baoxianchanpinid` (`baoxianchanpinid`) USING BTREE,
  KEY `hangchenglvkeid` (`hangchenglvkeid`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `shengxiaoriqi` (`shengxiaoriqi`) USING BTREE,
  KEY `chulishijian` (`chulishijian`) USING BTREE,
  KEY `wanchengshijian` (`wanchengshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baoxiandingdan
-- ----------------------------
INSERT INTO `baoxiandingdan` VALUES ('9', '25', '1', '9', '1', '30', '0', 'BX14813545419', null, null, null, null, null, '1', '2016-12-10 15:22:21', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('10', '26', '1', '10', '1', '30', '0', 'BX148136064410', '平安保险', '123123123', '12', null, '123123123', '3', '2016-12-10 17:04:04', '2017-01-01 00:00:00', null, '2016-12-10 17:35:57', '5', null, '1', '5', '2016-12-10 17:34:30');
INSERT INTO `baoxiandingdan` VALUES ('11', '27', '1', '11', '1', '30', '0', 'BX148136108911', null, null, null, null, null, '1', '2016-12-10 17:11:29', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('12', '27', '1', '12', '1', '30', '0', 'BX148136108912', null, null, null, null, null, '1', '2016-12-10 17:11:29', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('13', '27', '1', '13', '1', '30', '0', 'BX148136108913', null, null, null, null, null, '1', '2016-12-10 17:11:29', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('14', '27', '1', '14', '1', '30', '0', 'BX148136108914', null, null, null, null, null, '1', '2016-12-10 17:11:29', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('15', '29', '1', '18', '1', '30', '0', 'BX148150838515', null, null, null, null, null, '1', '2016-12-12 10:06:25', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('16', '29', '1', '19', '1', '30', '0', 'BX148150838516', null, null, null, null, null, '1', '2016-12-12 10:06:25', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('17', '29', '1', '20', '1', '30', '0', 'BX148150838517', null, null, null, null, null, '1', '2016-12-12 10:06:25', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('18', '30', '1', '21', '1', '30', '0', 'BX148151620518', null, null, null, null, null, '1', '2016-12-12 12:16:45', null, null, null, null, null, '1', '5', '2016-12-12 17:46:21');
INSERT INTO `baoxiandingdan` VALUES ('19', '30', '1', '22', '1', '30', '0', 'BX148151620519', null, null, null, null, null, '1', '2016-12-12 12:16:45', null, null, null, null, null, null, null, null);
INSERT INTO `baoxiandingdan` VALUES ('20', '30', '1', '23', '1', '30', '0', 'BX148151620520', null, null, null, null, null, '1', '2016-12-12 12:16:45', null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for baoxiangongsi
-- ----------------------------
DROP TABLE IF EXISTS `baoxiangongsi`;
CREATE TABLE `baoxiangongsi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(60) DEFAULT NULL COMMENT '名称',
  `url` text COMMENT 'url',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baoxiangongsi
-- ----------------------------
INSERT INTO `baoxiangongsi` VALUES ('1', '中国人保', 'http://www.epicc.com.cn/', null, '2016-11-25 20:03:36', '1', null);
INSERT INTO `baoxiangongsi` VALUES ('2', '泰康在线', 'http://www.tk.cn/', null, '2016-11-25 20:03:57', '1', null);
INSERT INTO `baoxiangongsi` VALUES ('3', '阳光保险', 'http://www.sinosig.com/', null, '2016-11-25 20:04:16', '1', null);
INSERT INTO `baoxiangongsi` VALUES ('4', '中国平安', 'http://www.pingan.com', null, '2016-11-25 20:04:42', '1', null);
INSERT INTO `baoxiangongsi` VALUES ('5', '安联保险', 'https://www.allianz360.com', null, '2016-11-25 20:04:59', '1', null);
INSERT INTO `baoxiangongsi` VALUES ('6', '', '', '', '2016-12-07 15:26:09', '4', null);

-- ----------------------------
-- Table structure for baoxiangongyingshang
-- ----------------------------
DROP TABLE IF EXISTS `baoxiangongyingshang`;
CREATE TABLE `baoxiangongyingshang` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gongyingshang` varchar(60) DEFAULT NULL COMMENT '供应商',
  `lianxiren` varchar(60) DEFAULT NULL COMMENT '联系人',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baoxiangongyingshang
-- ----------------------------

-- ----------------------------
-- Table structure for baoxiaodan
-- ----------------------------
DROP TABLE IF EXISTS `baoxiaodan`;
CREATE TABLE `baoxiaodan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `dingdanhao` varchar(60) DEFAULT NULL COMMENT '订单号',
  `xingchengshu` int(11) DEFAULT NULL COMMENT '行程数',
  `fapiaoshu` int(11) DEFAULT NULL COMMENT '发票数',
  `baoxianleixing` varchar(60) DEFAULT NULL COMMENT '保险类型',
  `qifeishijian` datetime DEFAULT NULL COMMENT '起飞时间',
  `shoujianren` varchar(60) DEFAULT NULL COMMENT '收件人',
  `lianxifangshi` varchar(60) DEFAULT NULL COMMENT '联系方式',
  `shoujiandizhi` varchar(60) DEFAULT NULL COMMENT '收件地址',
  `dingdanzongjia` double DEFAULT NULL COMMENT '订单总价',
  `dingdanzhuangtai` varchar(60) DEFAULT NULL COMMENT '订单状态',
  `wuliuhao` varchar(60) DEFAULT NULL COMMENT '物流号',
  `xingchengdan` tinyint(1) DEFAULT NULL COMMENT '行程单',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `chulishijian` datetime DEFAULT NULL COMMENT '处理时间',
  `wanchengshijian` datetime DEFAULT NULL COMMENT '完成时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `xingchengshu` (`xingchengshu`) USING BTREE,
  KEY `fapiaoshu` (`fapiaoshu`) USING BTREE,
  KEY `qifeishijian` (`qifeishijian`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `chulishijian` (`chulishijian`) USING BTREE,
  KEY `wanchengshijian` (`wanchengshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baoxiaodan
-- ----------------------------

-- ----------------------------
-- Table structure for dingdan
-- ----------------------------
DROP TABLE IF EXISTS `dingdan`;
CREATE TABLE `dingdan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dingdanhao` varchar(60) DEFAULT NULL COMMENT '订单号',
  `sanfanggongsi` bigint(20) DEFAULT NULL COMMENT '三方公司',
  `dingdanleibie` int(11) DEFAULT NULL COMMENT '订单类别',
  `yonghuid` bigint(20) DEFAULT NULL COMMENT '用户id',
  `chupiaobianma` varchar(60) DEFAULT NULL COMMENT '出票编码',
  `zhifufangshi` int(11) DEFAULT NULL COMMENT '支付方式',
  `dingdanzonge` double DEFAULT NULL COMMENT '订单总额',
  `chupiaozhuangtai` int(11) DEFAULT NULL COMMENT '出票状态',
  `lianxiren` varchar(60) DEFAULT NULL COMMENT '联系人',
  `lianxirendianhua` varchar(60) DEFAULT NULL COMMENT '联系人电话',
  `baoxian` tinyint(1) DEFAULT NULL COMMENT '保险',
  `baoxiaopingzheng` tinyint(1) DEFAULT NULL COMMENT '报销凭证',
  `fasongduanxin` tinyint(1) DEFAULT NULL COMMENT '发送短信',
  `dingdanzhuangtai` int(11) DEFAULT NULL COMMENT '订单状态',
  `fukuanshijian` datetime DEFAULT NULL COMMENT '付款时间',
  `chulishijian` datetime DEFAULT NULL COMMENT '处理时间',
  `wanchengshijian` datetime DEFAULT NULL COMMENT '完成时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  `shoujianren` varchar(60) DEFAULT NULL COMMENT '收件人',
  `youjidizhi` varchar(60) DEFAULT NULL COMMENT '邮寄地址',
  `youjirendianhua` varchar(60) DEFAULT NULL COMMENT '邮寄人电话',
  `suodan` tinyint(1) DEFAULT NULL,
  `suodanid` tinyint(20) DEFAULT NULL,
  `suodanshijian` datetime DEFAULT NULL,
  `yidipingtai` varchar(60) DEFAULT NULL COMMENT '异地平台名称',
  `yidicaigoujine` int(11) DEFAULT NULL,
  `yididingdanhao` varchar(60) DEFAULT NULL COMMENT '异地采购单号',
  `yidiqitashuoming` text COMMENT '异地--其他说明',
  `prn` varchar(60) DEFAULT NULL COMMENT '本地 -- 订座记录PNR',
  `caigoujine` varchar(60) DEFAULT NULL COMMENT '本地 -- 采购金额',
  `qitashuoming` text COMMENT '本地 -- 其他说明',
  PRIMARY KEY (`id`),
  KEY `sanfanggongsi` (`sanfanggongsi`) USING BTREE,
  KEY `dingdanleibie` (`dingdanleibie`) USING BTREE,
  KEY `yonghuid` (`yonghuid`) USING BTREE,
  KEY `zhifufangshi` (`zhifufangshi`) USING BTREE,
  KEY `chupiaozhuangtai` (`chupiaozhuangtai`) USING BTREE,
  KEY `dingdanzhuangtai` (`dingdanzhuangtai`) USING BTREE,
  KEY `fukuanshijian` (`fukuanshijian`) USING BTREE,
  KEY `chulishijian` (`chulishijian`) USING BTREE,
  KEY `wanchengshijian` (`wanchengshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dingdan
-- ----------------------------
INSERT INTO `dingdan` VALUES ('25', 'hb2016121015220325', null, null, '3', 'gh', '2', '565', '2', 'gao', '13273890941', '1', '0', '1', '3', '2016-12-10 15:22:21', '2016-12-10 15:26:53', null, null, null, '', '', '', '1', '3', '2016-12-10 15:26:41', '1', '1', '1', '1', null, null, null);
INSERT INTO `dingdan` VALUES ('26', 'hb2016121017020426', null, null, '6', '123124', '2', '390', '2', '张子原', '15810224468', '1', '1', '1', '3', '2016-12-10 17:04:04', '2016-12-10 17:34:16', null, null, null, '李四', '广东省深圳市罗湖区桃园路', '15810224468', '1', '5', '2016-12-10 17:33:19', '123', '123123', '4124142', '', null, null, null);
INSERT INTO `dingdan` VALUES ('27', 'hb2016121017110727', null, null, '6', null, '2', '1675', '0', '张子原', '15810224468', '1', '1', '1', '1', '2016-12-10 17:11:29', null, null, null, null, '李四', '广东省深圳市罗湖区桃园路', '15810224468', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `dingdan` VALUES ('28', 'hb2016121017254728', null, null, '7', '7', '2', '1464', '2', '刘家锦', '13631607260', '0', '0', '1', '3', '2016-12-10 17:26:12', '2016-12-10 17:28:30', null, null, null, '', '', '', '1', '7', '2016-12-10 17:27:31', '5', '6', '7', '', null, null, null);
INSERT INTO `dingdan` VALUES ('29', 'hb2016121210053129', null, null, '6', null, '2', '1585', '0', '张子原', '15810224468', '1', '1', '1', '1', '2016-12-12 10:06:25', null, null, null, null, '李四', '广东省深圳市罗湖区桃园路', '15810224468', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `dingdan` VALUES ('30', 'hb2016121212163030', null, null, '3', 'p3', '2', '1528', '1', 'gao', '13273890941', '1', '0', '1', '3', '2016-12-12 12:16:45', '2016-12-12 12:22:54', null, null, null, '', '', '', '1', '3', '2016-12-12 12:22:34', '1', '1', '1', '1', null, null, null);

-- ----------------------------
-- Table structure for gaiqian
-- ----------------------------
DROP TABLE IF EXISTS `gaiqian`;
CREATE TABLE `gaiqian` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shenqinghao` varchar(60) DEFAULT NULL COMMENT '申请号',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `hangchengid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `hangchenglvkeid` bigint(20) DEFAULT NULL COMMENT '航程旅客id',
  `shenqingriqi` datetime DEFAULT NULL COMMENT '申请日期',
  `gaiqianshijian` datetime DEFAULT NULL COMMENT '改签时间',
  `shifoushengcang` tinyint(1) DEFAULT NULL COMMENT '是否升舱',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `gaiqianshuoming` text COMMENT '改签说明',
  `gaiqianrenshu` int(11) DEFAULT NULL COMMENT '改签人数',
  `shenqingzhuangtai` int(11) DEFAULT NULL COMMENT '申请状态',
  `gaiqianhoudingdanid` bigint(20) DEFAULT NULL COMMENT '改签后订单id',
  `gaiqianhouhangchengid` bigint(20) DEFAULT NULL COMMENT '改签后航程id',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `kaishishijian` datetime DEFAULT NULL COMMENT '开始时间',
  `wanchengshijian` datetime DEFAULT NULL COMMENT '完成时间',
  `beizhu` text COMMENT '备注',
  `chulizhuangtai` int(11) DEFAULT NULL COMMENT '处理状态',
  `suodan` tinyint(1) DEFAULT NULL COMMENT '锁单',
  `suodanid` bigint(20) DEFAULT NULL COMMENT '锁单id',
  `suodanshijian` datetime DEFAULT NULL COMMENT '锁单时间',
  `shenghe` tinyint(1) DEFAULT NULL,
  `shengherenid` bigint(20) DEFAULT NULL,
  `shengheshijian` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `hangchengid` (`hangchengid`) USING BTREE,
  KEY `hangchenglvkeid` (`hangchenglvkeid`) USING BTREE,
  KEY `shenqingriqi` (`shenqingriqi`) USING BTREE,
  KEY `gaiqianshijian` (`gaiqianshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE,
  KEY `gaiqianrenshu` (`gaiqianrenshu`) USING BTREE,
  KEY `shenqingzhuangtai` (`shenqingzhuangtai`) USING BTREE,
  KEY `gaiqianhoudingdanid` (`gaiqianhoudingdanid`) USING BTREE,
  KEY `gaiqianhouhangchengid` (`gaiqianhouhangchengid`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `kaishishijian` (`kaishishijian`) USING BTREE,
  KEY `wanchengshijian` (`wanchengshijian`) USING BTREE,
  KEY `chulizhuangtai` (`chulizhuangtai`) USING BTREE,
  KEY `suodanid` (`suodanid`) USING BTREE,
  KEY `suodanshijian` (`suodanshijian`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gaiqian
-- ----------------------------
INSERT INTO `gaiqian` VALUES ('1', 'GQ201612121306281', '30', '15', '21', '2016-12-12 13:06:28', '2016-12-14 00:00:00', '0', null, 'kk', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gaiqian` VALUES ('2', 'GQ201612121306282', '30', '15', '22', '2016-12-12 13:06:28', '2016-12-14 00:00:00', '0', null, 'kk', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gaiqian` VALUES ('3', 'GQ201612121306283', '30', '15', '23', '2016-12-12 13:06:28', '2016-12-14 00:00:00', '0', null, 'kk', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gaiqian` VALUES ('4', 'GQ201612121522444', '30', '15', '21', '2016-12-12 15:22:44', '2016-12-15 00:00:00', '0', null, '', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gaiqian` VALUES ('5', 'GQ201612121522445', '30', '15', '22', '2016-12-12 15:22:44', '2016-12-15 00:00:00', '0', null, '', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `gaiqian` VALUES ('6', 'GQ201612121522446', '30', '15', '23', '2016-12-12 15:22:44', '2016-12-15 00:00:00', '0', null, '', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for gaiqianxiangqing
-- ----------------------------
DROP TABLE IF EXISTS `gaiqianxiangqing`;
CREATE TABLE `gaiqianxiangqing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gaiqianid` bigint(20) DEFAULT NULL COMMENT '改签id',
  `qifeishijian` datetime DEFAULT NULL COMMENT '起飞时间',
  `hangbanriqi` datetime DEFAULT NULL COMMENT '航班日期',
  `didashijian` datetime DEFAULT NULL COMMENT '抵达时间',
  `hangbanhao` varchar(60) DEFAULT NULL COMMENT '航班号',
  `chengrencangwei` varchar(60) DEFAULT NULL COMMENT '成人舱位',
  `chengrenshouxufei` double DEFAULT NULL COMMENT '成人手续费',
  `chengrenshengcangfei` double DEFAULT NULL COMMENT '成人升舱费',
  `ertongcangwei` varchar(60) DEFAULT NULL COMMENT '儿童舱位',
  `ertongshouxufei` double DEFAULT NULL COMMENT '儿童手续费',
  `ertongshengcangfei` double DEFAULT NULL COMMENT '儿童升舱费',
  `beizhu` varchar(60) DEFAULT NULL COMMENT '备注',
  `caozuorenid` bigint(20) DEFAULT NULL COMMENT '操作人id',
  `caozuoshijian` datetime DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`),
  KEY `gaiqianid` (`gaiqianid`) USING BTREE,
  KEY `qifeishijian` (`qifeishijian`) USING BTREE,
  KEY `hangbanriqi` (`hangbanriqi`) USING BTREE,
  KEY `didashijian` (`didashijian`) USING BTREE,
  KEY `caozuorenid` (`caozuorenid`) USING BTREE,
  KEY `caozuoshijian` (`caozuoshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gaiqianxiangqing
-- ----------------------------

-- ----------------------------
-- Table structure for guanliyuan
-- ----------------------------
DROP TABLE IF EXISTS `guanliyuan`;
CREATE TABLE `guanliyuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhanghu` varchar(60) DEFAULT NULL COMMENT '账户',
  `mima` text COMMENT '密码',
  `xingming` varchar(60) DEFAULT NULL COMMENT '姓名',
  `youxiang` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `shoujihaoma` varchar(60) DEFAULT NULL COMMENT '手机号码',
  `zhuceriqi` datetime DEFAULT NULL COMMENT '注册日期',
  `guanliyuanzuid` int(11) DEFAULT NULL COMMENT '管理员组id',
  `jiaoseid` int(11) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`),
  KEY `zhuceriqi` (`zhuceriqi`) USING BTREE,
  KEY `guanliyuanzuid` (`guanliyuanzuid`) USING BTREE,
  KEY `jiaoseid` (`jiaoseid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guanliyuan
-- ----------------------------
INSERT INTO `guanliyuan` VALUES ('1', 'admin', 'admin', '吴大富', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('2', '李湘', 'admin', '李湘', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('3', '高', 'admin', '高晓凯', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('4', '侯', 'admin', '侯金良', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('5', '张子原', '张子原', '张子原', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('6', 'admin1', 'admin1', 'admin1', null, null, null, '0', '0');
INSERT INTO `guanliyuan` VALUES ('7', '刘', 'admin', '刘', null, null, null, '0', '0');

-- ----------------------------
-- Table structure for guanliyuanzu
-- ----------------------------
DROP TABLE IF EXISTS `guanliyuanzu`;
CREATE TABLE `guanliyuanzu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(60) DEFAULT NULL COMMENT '名称',
  `chuangjianriqi` datetime DEFAULT NULL COMMENT '创建日期',
  PRIMARY KEY (`id`),
  KEY `chuangjianriqi` (`chuangjianriqi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guanliyuanzu
-- ----------------------------
INSERT INTO `guanliyuanzu` VALUES ('1', '国内机票', null);
INSERT INTO `guanliyuanzu` VALUES ('2', '火车票', null);
INSERT INTO `guanliyuanzu` VALUES ('3', '财务管理', null);
INSERT INTO `guanliyuanzu` VALUES ('4', '平台管理', null);
INSERT INTO `guanliyuanzu` VALUES ('5', '账户设置', null);

-- ----------------------------
-- Table structure for hangcheng
-- ----------------------------
DROP TABLE IF EXISTS `hangcheng`;
CREATE TABLE `hangcheng` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gendingdanid` bigint(20) DEFAULT NULL COMMENT '根订单id',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `dabianma` varchar(60) DEFAULT NULL COMMENT '大编码',
  `PNRhao` varchar(60) DEFAULT NULL COMMENT 'PNR号',
  `PNRxinxi` text COMMENT 'PNR信息',
  `shifouertong` tinyint(1) DEFAULT NULL COMMENT '是否儿童',
  `chengkerenshu` int(11) DEFAULT NULL COMMENT '乘客人数',
  `wangfanhangcheng` tinyint(1) DEFAULT NULL COMMENT '往返航程',
  `fanchengbiaozhi` tinyint(1) DEFAULT NULL COMMENT '返程标志',
  `hangchengxuhao` varchar(10) DEFAULT NULL COMMENT '航程序号',
  `hangkonggongsi` varchar(10) DEFAULT NULL COMMENT '航空公司',
  `hangbanhao` varchar(30) DEFAULT NULL COMMENT '航班号',
  `gongxianghangbanhao` varchar(60) DEFAULT NULL COMMENT '共享航班号',
  `jixing` varchar(60) DEFAULT NULL COMMENT '机型',
  `qifeijichang` varchar(10) DEFAULT NULL COMMENT '起飞机场',
  `daodajichang` varchar(10) DEFAULT NULL COMMENT '到达机场',
  `qifeihangzhanlou` varchar(60) DEFAULT NULL COMMENT '起飞航站楼',
  `daodahangzhanlou` varchar(60) DEFAULT NULL COMMENT '到达航站楼',
  `jingtinglianbiao` bigint(20) DEFAULT NULL COMMENT '经停链表',
  `qifeishijian` datetime DEFAULT NULL COMMENT '起飞时间',
  `daodashijian` datetime DEFAULT NULL COMMENT '到达时间',
  `cangwei` varchar(5) DEFAULT NULL COMMENT '舱位',
  `tuigaiqianguize` text COMMENT '退改签规则',
  `piaoyuanshuliang` varchar(5) DEFAULT NULL COMMENT '票源数量',
  `xiaoshouzongjia` double DEFAULT NULL COMMENT '销售总价',
  `piaomiandanjia` double DEFAULT NULL COMMENT '票面单价',
  `ranyoushui` double DEFAULT NULL COMMENT '燃油税',
  `jijianfei` double DEFAULT NULL COMMENT '机建费',
  `baoxian` double DEFAULT NULL COMMENT '保险',
  `qitafei` double DEFAULT NULL COMMENT '其他费',
  `danzhangpiaomianjia` double DEFAULT NULL COMMENT '单张票面价',
  `guanliyuanid` bigint(20) DEFAULT NULL COMMENT '管理员id',
  `waicaipingtaiid` varchar(60) DEFAULT NULL COMMENT '外采平台id',
  `neibudingdanhao` varchar(64) DEFAULT NULL COMMENT '内部订单号',
  `waibudingdanhao` varchar(64) DEFAULT NULL COMMENT '外部订单号',
  `ticketText` text COMMENT 'ticketText',
  `PNRResponse` text COMMENT 'PNRResponse',
  `waicaichupiaobianma` varchar(50) DEFAULT NULL COMMENT '外采出票编码',
  `waicaidingdanzonge` double DEFAULT NULL COMMENT '外采订单总额',
  `pingtaizhuangtai` int(11) DEFAULT NULL COMMENT '平台状态',
  `quxiaodingdanshijian` datetime DEFAULT NULL COMMENT '取消订单时间',
  `pingtaiyuanyin` text COMMENT '平台原因',
  `seatCode` varchar(6) DEFAULT NULL COMMENT '舱位类型：如Y表示Y舱',
  `airlineCode` text,
  `refundStipulate` text,
  `changeStipulate` text,
  `modifyStipulate` text,
  `suitableAirline` text,
  `refundStipulateChild` text,
  `changeStipulateChild` text,
  `modifyStipulateChild` text,
  `suitableAirlineChild` text,
  `fandian` varchar(6) DEFAULT NULL COMMENT '返点',
  `fanqian` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gendingdanid` (`gendingdanid`) USING BTREE,
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `chengkerenshu` (`chengkerenshu`) USING BTREE,
  KEY `jingtinglianbiao` (`jingtinglianbiao`) USING BTREE,
  KEY `qifeishijian` (`qifeishijian`) USING BTREE,
  KEY `daodashijian` (`daodashijian`) USING BTREE,
  KEY `guanliyuanid` (`guanliyuanid`) USING BTREE,
  KEY `pingtaizhuangtai` (`pingtaizhuangtai`) USING BTREE,
  KEY `quxiaodingdanshijian` (`quxiaodingdanshijian`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hangcheng
-- ----------------------------
INSERT INTO `hangcheng` VALUES ('9', null, '25', null, null, null, null, null, '0', '0', '0', '中国东方航空公司', 'MU564', '否', '332', '浦东机场', '首都机场', 'T1', 'T2', '0', '2016-12-11 07:00:00', '2016-12-11 09:20:00', '经济舱', null, null, null, '485', '50', '50', '1', null, '1240', null, null, null, null, null, null, null, null, null, null, null, 'V', 'MU', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('10', null, '26', null, null, null, null, null, '0', '0', '0', '中国南方航空公司', 'CZ3569', '否', '321', '宝安机场', '萧山机场', '', '', '0', '2017-01-01 08:45:00', '2017-01-01 10:40:00', '经济舱', null, null, null, '295', '50', '50', '1', null, '1260', null, null, null, null, null, null, null, null, null, null, null, 'T', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('11', null, '27', null, null, null, null, null, '1', '0', '0', '中国南方航空公司', 'CZ3569', '否', '321', '宝安机场', '萧山机场', '', '', '0', '2017-01-01 08:45:00', '2017-01-01 10:40:00', '经济舱', null, null, null, '295', '50', '50', '1', null, '1260', null, null, null, null, null, null, null, null, null, null, null, 'T', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('12', null, '27', null, null, null, null, null, '1', '1', '0', '中国国际航空公司', 'CA1735', '否', '320', '萧山机场', '宝安机场', '', 'T3', '0', '2017-01-10 18:50:00', '2017-01-10 21:10:00', '经济舱', null, null, null, '375', '50', '50', '1', null, '1260', null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('13', null, '28', null, null, null, null, null, '0', '0', '0', '深圳航空', 'ZH9871', '否', '320', '宝安机场', '萧山机场', 'T3', '', '0', '2016-12-20 07:50:00', '2016-12-20 09:50:00', '经济舱', null, null, null, '367', '50', '50', '0', null, '1260', null, null, null, null, null, null, null, null, null, null, null, 'K', 'ZH', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('14', null, '29', null, null, null, null, null, '0', '0', '0', '中国国际航空公司', 'CA1736', '否', '320', '宝安机场', '萧山机场', 'T3', '', '0', '2017-01-10 22:20:00', '2017-01-11 00:20:00', '经济舱', null, null, null, '375', '50', '50', '1', null, '1260', null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');
INSERT INTO `hangcheng` VALUES ('15', null, '30', null, null, null, null, null, '0', '0', '0', '中国南方航空公司', 'CZ3908', '否', '330', '虹桥机场', '首都机场', 'T2', 'T2', '0', '2016-12-13 21:20:00', '2016-12-13 23:45:00', '经济舱', null, null, null, '359', '50', '50', '1', null, '1240', null, null, null, null, null, null, null, null, null, null, null, 'R', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '0', '0');

-- ----------------------------
-- Table structure for hangchenglvke
-- ----------------------------
DROP TABLE IF EXISTS `hangchenglvke`;
CREATE TABLE `hangchenglvke` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gendingdanid` bigint(20) DEFAULT NULL COMMENT '根订单id',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `hangchengid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `lvkeid` bigint(20) DEFAULT NULL COMMENT '旅客id',
  `pingtaidingdanhao` varchar(70) DEFAULT NULL COMMENT '平台订单号',
  `cangwei` varchar(5) DEFAULT NULL,
  `piaohao` varchar(10) DEFAULT NULL COMMENT '票号',
  `hangbanhao` varchar(30) DEFAULT NULL COMMENT '航班号',
  `shifoutuipiao` varchar(30) DEFAULT NULL COMMENT '是否退票',
  `shifougaiqian` varchar(30) DEFAULT NULL COMMENT '是否改签',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `zhongwenming` varchar(60) DEFAULT NULL COMMENT '中文名',
  `yingwenming` varchar(60) DEFAULT NULL COMMENT '英文名',
  `shifouertong` tinyint(1) DEFAULT NULL,
  `xingbie` tinyint(1) DEFAULT NULL COMMENT '性别',
  `chushengriqi` datetime DEFAULT NULL COMMENT '出生日期',
  `guoji` varchar(60) DEFAULT NULL COMMENT '国籍',
  `zhengjianleixing` int(11) DEFAULT NULL COMMENT '证件类型',
  `zhengjianhaoma` varchar(60) DEFAULT NULL COMMENT '证件号码',
  `zhengjianyouxiaoqi` datetime DEFAULT NULL COMMENT '证件有效期',
  `chushengdi` varchar(60) DEFAULT NULL COMMENT '出生地',
  `shoujihao` varchar(60) DEFAULT NULL COMMENT '手机号',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(60) DEFAULT NULL COMMENT 'email',
  `beizhu` text COMMENT '备注',
  `suodan` tinyint(1) DEFAULT NULL,
  `suodanid` bigint(20) DEFAULT NULL,
  `suodanshijian` datetime DEFAULT NULL,
  `yidipingtai` varchar(60) DEFAULT NULL COMMENT '异地平台名称',
  `yidicaigoujine` int(11) DEFAULT NULL COMMENT '异地--采购金额',
  `yididingdanhao` varchar(60) DEFAULT NULL COMMENT '异地采购单号',
  `yidiqitashuoming` text COMMENT '异地--其他说明',
  `prn` varchar(60) DEFAULT NULL COMMENT '本地 -- 订座记录PNR',
  `caigoujine` varchar(60) DEFAULT NULL COMMENT '本地 -- 采购金额',
  `qitashuoming` text COMMENT '本地 -- 其他说明',
  `seatCode` varchar(6) DEFAULT NULL,
  `airlineCode` varchar(6) DEFAULT NULL,
  `refundStipulate` text,
  `changeStipulate` text,
  `modifyStipulate` text,
  `suitableAirline` text,
  `zhuangtai` varchar(20) DEFAULT NULL COMMENT '航程旅客订单的状态--在退改签的时候，因为是按照旅客来算的',
  PRIMARY KEY (`id`),
  KEY `gendingdanid` (`gendingdanid`) USING BTREE,
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `hangchengid` (`hangchengid`) USING BTREE,
  KEY `lvkeid` (`lvkeid`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `chushengriqi` (`chushengriqi`) USING BTREE,
  KEY `zhengjianleixing` (`zhengjianleixing`) USING BTREE,
  KEY `zhengjianyouxiaoqi` (`zhengjianyouxiaoqi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hangchenglvke
-- ----------------------------
INSERT INTO `hangchenglvke` VALUES ('9', null, '25', '9', '1', null, '经济舱', 'gh', 'MU564', '否', '否', '2016-12-10 15:22:21', 'gao', null, '0', null, '1990-05-20 00:00:00', null, '0', '41048219900520113X', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'V', 'MU', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '已出票');
INSERT INTO `hangchenglvke` VALUES ('10', null, '26', '10', '3', null, '经济舱', '123124', 'CZ3569', '否', '否', '2016-12-10 17:04:04', '张三', null, '0', null, '1984-07-13 00:00:00', null, '0', '452702198407134370', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'T', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '已出票');
INSERT INTO `hangchenglvke` VALUES ('11', null, '27', '11', '3', null, '经济舱', null, 'CZ3569', '否', '否', '2016-12-10 17:11:29', '张三', null, '0', null, '1984-07-13 00:00:00', null, '0', '452702198407134370', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'T', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('12', null, '27', '11', '10', null, '经济舱', null, 'CZ3569', '否', '否', '2016-12-10 17:11:29', '李四', null, '0', null, '1990-12-20 00:00:00', null, '2', '4678889', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'T', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('13', null, '27', '12', '3', null, '经济舱', null, 'CA1735', '否', '否', '2016-12-10 17:11:29', '张三', null, '0', null, '1984-07-13 00:00:00', null, '0', '452702198407134370', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('14', null, '27', '12', '10', null, '经济舱', null, 'CA1735', '否', '否', '2016-12-10 17:11:29', '李四', null, '0', null, '1990-12-20 00:00:00', null, '2', '4678889', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('15', null, '28', '13', '6', null, '经济舱', '5', 'ZH9871', '否', '否', '2016-12-10 17:26:12', '刘家锦', null, '0', null, '1986-12-17 00:00:00', null, '0', '431229198612170635', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'ZH', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '不能改签', '适用全部航线', '已出票');
INSERT INTO `hangchenglvke` VALUES ('16', null, '28', '13', '7', null, '经济舱', '6', 'ZH9871', '否', '否', '2016-12-10 17:26:12', '李飞', null, '0', null, '1982-01-09 00:00:00', null, '0', '231181198201091812', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'ZH', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '不能改签', '适用全部航线', '已出票');
INSERT INTO `hangchenglvke` VALUES ('17', null, '28', '13', '8', null, '经济舱', '7', 'ZH9871', '否', '否', '2016-12-10 17:26:12', '刘紫妍', null, '1', null, '2013-03-03 00:00:00', null, '2', '20130303', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'ZH', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '已出票');
INSERT INTO `hangchenglvke` VALUES ('18', null, '29', '14', '3', null, '经济舱', null, 'CA1736', '否', '否', '2016-12-12 10:06:25', '张三', null, '0', null, '1984-07-13 00:00:00', null, '0', '452702198407134370', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('19', null, '29', '14', '10', null, '经济舱', null, 'CA1736', '否', '否', '2016-12-12 10:06:25', '李四', null, '0', null, '1990-12-20 00:00:00', null, '2', '4678889', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('20', null, '29', '14', '11', null, '经济舱', null, 'CA1736', '否', '否', '2016-12-12 10:06:25', 'tom', null, '1', null, '2013-11-10 00:00:00', null, '2', '567483', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'K', 'CA', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '出票中');
INSERT INTO `hangchenglvke` VALUES ('21', null, '30', '15', '1', null, '经济舱', 'p1', 'CZ3908', '否', '否', '2016-12-12 12:16:45', 'gao', null, '0', null, '1990-05-20 00:00:00', null, '0', '41048219900520113X', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'R', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '退票中');
INSERT INTO `hangchenglvke` VALUES ('22', null, '30', '15', '2', null, '经济舱', 'p2', 'CZ3908', '否', '否', '2016-12-12 12:16:45', '李', null, '0', null, '1990-05-20 00:00:00', null, '0', '41048219900520113X', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'R', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '不能改签', '适用全部航线', '改签中');
INSERT INTO `hangchenglvke` VALUES ('23', null, '30', '15', '5', null, '经济舱', 'p3', 'CZ3908', '否', '否', '2016-12-12 12:16:45', '李', null, '1', null, '2011-12-06 00:00:00', null, '1', '3587598', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'R', 'CZ', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '可以改签', '适用全部航线', '改签中');

-- ----------------------------
-- Table structure for jd_area
-- ----------------------------
DROP TABLE IF EXISTS `jd_area`;
CREATE TABLE `jd_area` (
  `area_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `area_name` varchar(50) NOT NULL COMMENT '地区名称',
  `area_parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '地区父ID',
  `area_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `area_deep` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '地区深度，从1开始',
  PRIMARY KEY (`area_id`),
  KEY `area_parent_id` (`area_parent_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jd_area
-- ----------------------------

-- ----------------------------
-- Table structure for jiaose
-- ----------------------------
DROP TABLE IF EXISTS `jiaose`;
CREATE TABLE `jiaose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(60) DEFAULT NULL COMMENT '名称',
  `guanliyuanzuid` varchar(60) DEFAULT NULL COMMENT '管理员组id',
  `chuangjianshijian` datetime DEFAULT NULL,
  `caozuoyuanid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guanliyuanzuid` (`guanliyuanzuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiaose
-- ----------------------------

-- ----------------------------
-- Table structure for jiaoyijilu
-- ----------------------------
DROP TABLE IF EXISTS `jiaoyijilu`;
CREATE TABLE `jiaoyijilu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jiaoyihao` varchar(60) DEFAULT NULL COMMENT '交易号',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `hangchengid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `tuikuanid` bigint(20) DEFAULT NULL COMMENT '退款id',
  `tuikuanhao` varchar(60) DEFAULT NULL COMMENT '退款号',
  `tuikuanzhifuhao` varchar(60) DEFAULT NULL COMMENT '退款支付号',
  `chanpinleixing` int(11) DEFAULT NULL COMMENT '产品类型',
  `jiaoyileixing` varchar(60) DEFAULT NULL COMMENT '交易类型',
  `jiaoyizhuangtai` int(11) DEFAULT NULL COMMENT '交易状态',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `hangchengid` (`hangchengid`) USING BTREE,
  KEY `tuikuanid` (`tuikuanid`) USING BTREE,
  KEY `chanpinleixing` (`chanpinleixing`) USING BTREE,
  KEY `jiaoyizhuangtai` (`jiaoyizhuangtai`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiaoyijilu
-- ----------------------------

-- ----------------------------
-- Table structure for jingting
-- ----------------------------
DROP TABLE IF EXISTS `jingting`;
CREATE TABLE `jingting` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jingtingjichang` varchar(60) DEFAULT NULL COMMENT '经停机场',
  `daodashijian` datetime DEFAULT NULL COMMENT '到达时间',
  `qifeishijian` datetime DEFAULT NULL COMMENT '起飞时间',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `daodashijian` (`daodashijian`) USING BTREE,
  KEY `qifeishijian` (`qifeishijian`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jingting
-- ----------------------------

-- ----------------------------
-- Table structure for kuaidigongsi
-- ----------------------------
DROP TABLE IF EXISTS `kuaidigongsi`;
CREATE TABLE `kuaidigongsi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(60) DEFAULT NULL COMMENT '名称',
  `lianxiren` varchar(60) DEFAULT NULL COMMENT '联系人',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kuaidigongsi
-- ----------------------------

-- ----------------------------
-- Table structure for lianjiedizhi
-- ----------------------------
DROP TABLE IF EXISTS `lianjiedizhi`;
CREATE TABLE `lianjiedizhi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sanfanggongsiid` bigint(20) DEFAULT NULL COMMENT '三方公司id',
  `qudao` varchar(60) DEFAULT NULL COMMENT '渠道',
  `dizhi` text COMMENT '地址',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `sanfanggongsiid` (`sanfanggongsiid`) USING BTREE,
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lianjiedizhi
-- ----------------------------

-- ----------------------------
-- Table structure for lvke
-- ----------------------------
DROP TABLE IF EXISTS `lvke`;
CREATE TABLE `lvke` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) DEFAULT NULL COMMENT '用户id',
  `zhongwenming` varchar(60) DEFAULT NULL COMMENT '中文名',
  `yingwenming` varchar(60) DEFAULT NULL COMMENT '英文名',
  `shifouertong` tinyint(1) DEFAULT NULL COMMENT '是否儿童',
  `xingbie` tinyint(1) DEFAULT NULL COMMENT '性别',
  `chushengriqi` datetime DEFAULT NULL COMMENT '出生日期',
  `guoji` varchar(60) DEFAULT NULL COMMENT '国籍',
  `zhengjianleixing` int(11) DEFAULT NULL COMMENT '证件类型',
  `zhengjianhaoma` varchar(60) DEFAULT NULL COMMENT '证件号码',
  `zhengjianyouxiaoqi` datetime DEFAULT NULL COMMENT '证件有效期',
  `chushengdi` varchar(60) DEFAULT NULL COMMENT '出生地',
  `shoujihao` varchar(60) DEFAULT NULL COMMENT '手机号',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(60) DEFAULT NULL COMMENT 'email',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `yonghuid` (`yonghuid`) USING BTREE,
  KEY `chushengriqi` (`chushengriqi`) USING BTREE,
  KEY `zhengjianleixing` (`zhengjianleixing`) USING BTREE,
  KEY `zhengjianyouxiaoqi` (`zhengjianyouxiaoqi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lvke
-- ----------------------------
INSERT INTO `lvke` VALUES ('1', '3', 'gao', null, '0', null, '1990-05-20 00:00:00', null, '0', '41048219900520113X', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('2', '3', '李', null, '0', null, '1990-05-20 00:00:00', null, '0', '41048219900520113X', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('3', '6', '张三', null, '0', null, '1984-07-13 00:00:00', null, '0', '452702198407134370', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('4', '2', '吴克武', null, '0', null, '1974-09-05 00:00:00', null, '0', '422427197409050315', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('5', '3', '李', null, '1', null, '2011-12-06 00:00:00', null, '1', '3587598', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('6', '7', '刘家锦', null, '0', null, '1986-12-17 00:00:00', null, '0', '431229198612170635', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('7', '7', '李飞', null, '0', null, '1982-01-09 00:00:00', null, '0', '231181198201091812', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('8', '7', '刘紫妍', null, '1', null, '2013-03-03 00:00:00', null, '2', '20130303', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('9', '7', '李天', null, '1', null, '2012-09-09 00:00:00', null, '2', '20120909', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('10', '6', '李四', null, '0', null, '1990-12-20 00:00:00', null, '2', '4678889', null, null, null, null, null, null);
INSERT INTO `lvke` VALUES ('11', '6', 'tom', null, '1', null, '2013-11-10 00:00:00', null, '2', '567483', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for mqiudui_ch
-- ----------------------------
DROP TABLE IF EXISTS `mqiudui_ch`;
CREATE TABLE `mqiudui_ch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liansaihao` varchar(60) DEFAULT NULL COMMENT '联赛号',
  `bianhao` varchar(60) DEFAULT NULL COMMENT '编号',
  `mingcheng` text COMMENT '名称',
  `mydatetime` datetime DEFAULT NULL COMMENT 'mydatetime',
  `myint` int(11) DEFAULT NULL COMMENT 'myint',
  `mydouble` double DEFAULT NULL COMMENT 'mydouble',
  `mylong` bigint(20) DEFAULT NULL COMMENT 'mylong',
  `mybool` tinyint(1) DEFAULT NULL COMMENT 'mybool',
  PRIMARY KEY (`id`),
  KEY `mydatetime` (`mydatetime`) USING BTREE,
  KEY `myint` (`myint`) USING BTREE,
  KEY `mylong` (`mylong`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mqiudui_ch
-- ----------------------------

-- ----------------------------
-- Table structure for myusers
-- ----------------------------
DROP TABLE IF EXISTS `myusers`;
CREATE TABLE `myusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `job` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `note` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of myusers
-- ----------------------------

-- ----------------------------
-- Table structure for quanxian
-- ----------------------------
DROP TABLE IF EXISTS `quanxian`;
CREATE TABLE `quanxian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fumingcheng` varchar(60) DEFAULT NULL COMMENT '父名称',
  `mingcheng` varchar(60) DEFAULT NULL COMMENT '名称',
  `dizhi` text COMMENT '地址',
  `zeng` tinyint(1) DEFAULT NULL COMMENT '增',
  `shan` tinyint(1) DEFAULT NULL COMMENT '删',
  `gai` tinyint(1) DEFAULT NULL COMMENT '改',
  `cha` tinyint(1) DEFAULT NULL COMMENT '查',
  `jiaoseid` int(11) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`),
  KEY `jiaoseid` (`jiaoseid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of quanxian
-- ----------------------------
INSERT INTO `quanxian` VALUES ('1', '国内机票', '出票管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('2', '国内机票', '退票管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('3', '国内机票', '改签申请管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('4', '国内机票', '改签出票管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('5', '国内机票', '保险售后管理--订单管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('6', '国内机票', '报销售后管理--订单管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('7', '国内机票', '报销售后管理--订单管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('8', '国内机票', '政策调控', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('9', '国内机票', '政策添加', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('10', '国内机票', '政策更新', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('11', '财务管理', '退款处理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('12', '财务管理', '批量退款记录', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('13', '财务管理', '机票报表', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('14', '平台管理', '用户管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('15', '平台管理', '保险公司管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('16', '平台管理', '保险产品管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('17', '平台管理', '管理员组', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('18', '平台管理', '管理员', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('19', '平台管理', '角色管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('20', '平台管理', '权限管理', null, '1', '1', '1', '1', '0');
INSERT INTO `quanxian` VALUES ('21', '账户设置', '安全中心', null, '1', '1', '1', '1', '0');

-- ----------------------------
-- Table structure for sanfanggongsi
-- ----------------------------
DROP TABLE IF EXISTS `sanfanggongsi`;
CREATE TABLE `sanfanggongsi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gongsimingcheng` varchar(60) DEFAULT NULL COMMENT '公司名称',
  `dizhi` varchar(60) DEFAULT NULL COMMENT '地址',
  `yingyezhizhaohao` varchar(60) DEFAULT NULL COMMENT '营业执照号',
  `wangzhi` text COMMENT '网址',
  `chuangjianshijian` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `chuangjianshijian` (`chuangjianshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sanfanggongsi
-- ----------------------------

-- ----------------------------
-- Table structure for sanfangpingtai
-- ----------------------------
DROP TABLE IF EXISTS `sanfangpingtai`;
CREATE TABLE `sanfangpingtai` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sanfanggongsiid` bigint(20) DEFAULT NULL COMMENT '三方公司id',
  `guanliyuan` varchar(60) DEFAULT NULL COMMENT '管理员',
  `mima` text COMMENT '密码',
  `shoujihao` varchar(60) DEFAULT NULL COMMENT '手机号',
  `dengluriqi` datetime DEFAULT NULL COMMENT '登录日期',
  PRIMARY KEY (`id`),
  KEY `sanfanggongsiid` (`sanfanggongsiid`) USING BTREE,
  KEY `dengluriqi` (`dengluriqi`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sanfangpingtai
-- ----------------------------

-- ----------------------------
-- Table structure for suodan
-- ----------------------------
DROP TABLE IF EXISTS `suodan`;
CREATE TABLE `suodan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guanliyuanid` bigint(20) DEFAULT NULL COMMENT '管理员id',
  `tableid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `suodanshijian` datetime DEFAULT NULL COMMENT '锁单时间',
  `tablename` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guanliyuanid` (`guanliyuanid`) USING BTREE,
  KEY `suodanshijian` (`suodanshijian`) USING BTREE,
  KEY `tablename` (`tablename`) USING BTREE,
  KEY `tableid` (`tableid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of suodan
-- ----------------------------

-- ----------------------------
-- Table structure for train_lvke
-- ----------------------------
DROP TABLE IF EXISTS `train_lvke`;
CREATE TABLE `train_lvke` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) DEFAULT NULL COMMENT '用户Id',
  `user_name` varchar(60) DEFAULT NULL COMMENT '乘客姓名',
  `ids_type` tinyint(1) DEFAULT NULL COMMENT '证件类型',
  `user_ids` varchar(18) DEFAULT NULL COMMENT '证件号码',
  `ticket_type` bigint(1) DEFAULT '0' COMMENT '车票类型',
  `Audit` bigint(1) DEFAULT '0' COMMENT ' 是否认证 0 认证，1 未认证',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of train_lvke
-- ----------------------------
INSERT INTO `train_lvke` VALUES ('1', '1', '李东方', '5', 'e21458736', '1', '1');
INSERT INTO `train_lvke` VALUES ('2', '1', '王西方', '5', 'e54123', '0', '1');
INSERT INTO `train_lvke` VALUES ('3', '4', 're', '2', '450421199112081078', '0', '1');
INSERT INTO `train_lvke` VALUES ('4', '3', 'add', '2', '41048219900520113X', '0', '1');

-- ----------------------------
-- Table structure for train_order
-- ----------------------------
DROP TABLE IF EXISTS `train_order`;
CREATE TABLE `train_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) DEFAULT NULL,
  `order_id` varchar(20) DEFAULT NULL COMMENT '订单ID',
  `merchant_order_id` varchar(20) DEFAULT NULL COMMENT '商户订单ID',
  `arrive_station` varchar(60) DEFAULT NULL COMMENT '到达车站',
  `arrive_time` datetime DEFAULT NULL COMMENT '到达时间',
  `bx_pay_money` varchar(20) DEFAULT NULL COMMENT '保险金额',
  `from_station` varchar(60) DEFAULT NULL COMMENT '出发车站',
  `from_time` datetime DEFAULT NULL COMMENT '出发时间',
  `pay_money` varchar(60) DEFAULT NULL COMMENT '支付金额',
  `seat_type` bigint(2) DEFAULT NULL COMMENT '座位类型 0、商务座 1、特等座 2、一等座 3、二等座 4、高级软卧 5、软卧 6、硬卧 7、软座 8、硬座 9、无座 10、其他',
  `ticket_pay_money` varchar(20) DEFAULT NULL COMMENT '票价总额',
  `train_code` varchar(60) DEFAULT NULL COMMENT '车次',
  `travel_time` datetime DEFAULT NULL COMMENT '发车日期',
  `status` bigint(1) DEFAULT '0' COMMENT '订单状态,0 => ''待付款'', 1 => ''出票中'', 2 => ''已出票'',',
  `laiyuan` varchar(60) DEFAULT NULL COMMENT '订单来源',
  `refund_status` bigint(1) DEFAULT '0' COMMENT '退款状态',
  `bx_invoice` bigint(1) DEFAULT NULL COMMENT '是否邮递',
  `bx_invoice_address` varchar(60) DEFAULT NULL COMMENT '邮递地址',
  `bx_invoice_phone` varchar(60) DEFAULT NULL COMMENT '邮递电话',
  `bx_invoice_receiver` varchar(60) DEFAULT NULL COMMENT '邮递收件人姓名',
  `bx_invoice_zipcode` varchar(60) DEFAULT NULL COMMENT '邮编',
  `link_address` varchar(60) DEFAULT NULL COMMENT '联系人电话',
  `link_mail` varchar(60) DEFAULT NULL COMMENT '联系人邮箱',
  `link_name` varchar(60) DEFAULT NULL COMMENT '联系人姓名',
  `link_phone` varchar(60) DEFAULT NULL COMMENT '联系人电话',
  `insurance` varchar(60) DEFAULT NULL COMMENT '保险价格',
  `insurerName` varchar(60) DEFAULT NULL COMMENT '保险公司名字',
  `chuangjianshijian` varchar(60) DEFAULT NULL,
  `isdelete` bigint(1) DEFAULT '0' COMMENT '订单是否删除，0，显示， 1隐藏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of train_order
-- ----------------------------
INSERT INTO `train_order` VALUES ('1', '3', 'EXHC161207094235969', 'hc201612070940480', '上海虹桥', '2016-12-08 18:43:00', '20.0', '深圳北', '2016-12-08 07:00:00', '501.0', '3', '481.0', 'D3126', '2016-12-08 00:00:00', '1', '1', '0', '0', '', '', '', '', '', '', 'gao', '13273890941', '20', '太平人寿', '2016-12-07 09:40:52', '0');

-- ----------------------------
-- Table structure for train_order_lvke
-- ----------------------------
DROP TABLE IF EXISTS `train_order_lvke`;
CREATE TABLE `train_order_lvke` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `orderid` int(11) DEFAULT NULL COMMENT '订单ID',
  `order_id` varchar(30) DEFAULT NULL COMMENT '19旅行订单Id',
  `merchant_id` varchar(30) DEFAULT NULL COMMENT '合作商户的订单Id',
  `amount` varchar(30) DEFAULT NULL COMMENT '支付单票金额',
  `bx_channel` varchar(30) DEFAULT NULL COMMENT '可为空，保险公司名称',
  `bx_code` varchar(30) DEFAULT NULL COMMENT '可为空，即没有购买保险',
  `bx_price` varchar(30) DEFAULT NULL COMMENT '合作商户使用19旅行保险产品，则为20.0，否则为0',
  `ids_type` bigint(1) DEFAULT NULL COMMENT '证件类型：1、一代身份证、２、二代身份证、３、港澳通行证、４、台湾通行证、５、护照',
  `ticket_type` bigint(1) DEFAULT NULL COMMENT '0：成人票,1：儿童票',
  `user_ids` varchar(30) DEFAULT NULL COMMENT '证件号码',
  `user_name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `train_box` varchar(30) DEFAULT '' COMMENT '列车车厢号码',
  `seat_no` varchar(30) DEFAULT '' COMMENT '座位号',
  `seat_type` bigint(2) DEFAULT NULL COMMENT '0、商务座\r\n1、特等座\r\n2、一等座\r\n3、二等座\r\n4、高级软卧\r\n5、软卧\r\n6、硬卧\r\n7、软座\r\n8、硬座',
  `ticketStatusName` varchar(60) DEFAULT NULL COMMENT '出票状态',
  `chupiaozhuangtai` bigint(1) DEFAULT '0' COMMENT '出票状态：0 未出票 1 已出票',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of train_order_lvke
-- ----------------------------
INSERT INTO `train_order_lvke` VALUES ('40', '53', 'EXHC161201173109621', '20161201173014', '234.0', null, null, '20', '2', '0', '41048219900520113X', '高晓凯', '', '', null, '出票中', '0');
INSERT INTO `train_order_lvke` VALUES ('41', '54', 'EXHC161201173315624', '20161201173219', '391.0', null, null, '20', '2', '0', '41048219900520113X', '高晓凯', '', '', null, '出票中', '0');
INSERT INTO `train_order_lvke` VALUES ('42', '55', 'EXHC161203152640780', 'hc2016120315250755', '481.0', null, null, '20', '2', '0', '41048219900520113X', '高晓凯', '', '', null, '出票中', '0');
INSERT INTO `train_order_lvke` VALUES ('43', '1', 'EXHC161207094235969', 'hc201612070940480', '481.0', null, null, '20', '2', '0', '41048219900520113X', 'add', '', '', null, '出票中', '0');

-- ----------------------------
-- Table structure for train_tuipiao
-- ----------------------------
DROP TABLE IF EXISTS `train_tuipiao`;
CREATE TABLE `train_tuipiao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `train_order_id` varchar(20) DEFAULT NULL COMMENT '订单ID',
  `merchant_order_id` varchar(20) DEFAULT NULL COMMENT '合作商户ID',
  `ids_type` varchar(255) DEFAULT NULL,
  `ticket_type` bigint(1) DEFAULT NULL COMMENT '证件类型',
  `user_ids` varchar(255) DEFAULT NULL COMMENT '证件号',
  `user_name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `RawNote` text COMMENT '退票原因',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of train_tuipiao
-- ----------------------------

-- ----------------------------
-- Table structure for train_youdidizhi
-- ----------------------------
DROP TABLE IF EXISTS `train_youdidizhi`;
CREATE TABLE `train_youdidizhi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) NOT NULL COMMENT '用户id',
  `bx_invoice_receiver` varchar(60) NOT NULL COMMENT '保险发票收件人',
  `bx_invoice_phone` bigint(20) NOT NULL COMMENT '保险发票联系电话',
  `bx_invoice_address` varchar(60) NOT NULL COMMENT '保险发票联系地址',
  `bx_invoice_zipcode` bigint(20) NOT NULL COMMENT '保险发票邮政编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='邮递地址表';

-- ----------------------------
-- Records of train_youdidizhi
-- ----------------------------

-- ----------------------------
-- Table structure for train_youjibaoxian
-- ----------------------------
DROP TABLE IF EXISTS `train_youjibaoxian`;
CREATE TABLE `train_youjibaoxian` (
  `id` bigint(20) NOT NULL,
  `bx_invoice` varchar(50) DEFAULT NULL,
  `bx_invoice_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of train_youjibaoxian
-- ----------------------------

-- ----------------------------
-- Table structure for tuigaiqianzhengce
-- ----------------------------
DROP TABLE IF EXISTS `tuigaiqianzhengce`;
CREATE TABLE `tuigaiqianzhengce` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `seatId` varchar(60) DEFAULT NULL COMMENT 'seatId',
  `airlineCode` varchar(60) DEFAULT NULL COMMENT 'airlineCode',
  `seatCode` varchar(60) DEFAULT NULL COMMENT 'seatCode',
  `refundStipulate` text COMMENT 'refundStipulate',
  `changeStipulate` text COMMENT 'changeStipulate',
  `suitableAirline` varchar(60) DEFAULT NULL COMMENT 'suitableAirline',
  `updatetime` datetime DEFAULT NULL COMMENT 'updatetime',
  `modifyStipulate` tinyint(1) DEFAULT NULL COMMENT 'modifyStipulate',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuigaiqianzhengce
-- ----------------------------
INSERT INTO `tuigaiqianzhengce` VALUES ('1', '100014', '8C', 'C', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2', '100015', '8L', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('3', '100015', '8L', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('4', '100015', '8L', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('5', '100015', '8L', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('6', '100029', '8C', 'E', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('7', '100038', '8C', 'F', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('8', '100039', '8L', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('9', '100039', '8L', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('10', '100039', '8L', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('11', '100039', '8L', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('12', '100052', '8C', 'G', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('13', '100068', '8C', 'H', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('14', '100075', '8C', 'K', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('15', '100101', '8C', 'L', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('16', '100104', '8C', 'M', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('17', '100136', '8C', 'Q', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('18', '100146', '8C', 'S', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('19', '100151', '8C', 'T', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('20', '100183', '8C', 'W', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('21', '100194', '8C', 'Y', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('22', '100195', '8L', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('23', '100195', '8L', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('24', '100195', '8L', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('25', '100201', 'HO', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;最低收取50.0元退票费;按照对应舱位明折明扣公布运价标准收取，退票手续费不得低于50元', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('26', '100201', 'HO', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('27', '100201', 'HO', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('28', '100256', 'KN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('29', '100264', '9C', 'Y1', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('30', '100265', '9C', 'K', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('31', '100266', '9C', 'L', '按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('32', '100267', '9C', 'M', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('33', '100268', '9C', 'N', '按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('34', '100269', '9C', 'Q', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('35', '100270', '9C', 'T', '按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('36', '100271', '9C', 'X', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的30.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('37', '100272', '9C', 'U', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('38', '100273', '9C', 'B', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('39', '100274', '9C', 'H', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时到1.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前1.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('40', '100275', '9C', 'E', '按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的30.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('41', '100363', 'PN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('42', '100363', 'PN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('43', '100363', 'PN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('44', '100363', 'PN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('45', '100363', 'PN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('46', '101384', 'GS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('47', '101384', 'GS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('48', '101384', 'GS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('49', '101384', 'GS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('50', '101384', 'GS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('51', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('52', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('53', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('54', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('55', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('56', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('57', '101386', 'GS', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('58', '102271', 'CN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('59', '102271', 'CN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('60', '102271', 'CN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('61', '102271', 'CN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('62', '102273', 'CN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('63', '102273', 'CN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('64', '102273', 'CN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('65', '102273', 'CN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('66', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('67', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('68', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('69', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('70', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('71', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('72', '102283', 'CN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('73', '102828', 'HO', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('74', '102828', 'HO', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('75', '102828', 'HO', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('76', '104751', 'VD', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('77', '104753', 'VD', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('78', '104761', 'VD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('79', '108323', 'OQ', 'F', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('80', '108324', 'OQ', 'C', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('81', '108325', 'OQ', 'Y', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('82', '109857', '8C', 'Z', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('83', '109858', '8C', 'V', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('84', '109859', '8C', 'X', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('85', '113480', 'JD', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('86', '113480', 'JD', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('87', '113482', 'JD', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('88', '113482', 'JD', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('89', '113482', 'JD', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('90', '131422', '8L', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('91', '131422', '8L', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('92', '131422', '8L', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('93', '131422', '8L', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('94', '131423', '8L', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('95', '131423', '8L', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('96', '131423', '8L', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('97', '131423', '8L', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('98', '131424', '8L', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('99', '131424', '8L', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('100', '131424', '8L', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('101', '131424', '8L', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('102', '131425', '8L', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('103', '131425', '8L', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('104', '131425', '8L', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('105', '131425', '8L', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('106', '131426', '8L', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('107', '131426', '8L', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('108', '131426', '8L', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('109', '131426', '8L', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('110', '131427', '8L', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('111', '131427', '8L', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('112', '131427', '8L', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('113', '131427', '8L', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('114', '131428', '8L', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('115', '131428', '8L', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('116', '131428', '8L', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('117', '131428', '8L', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('118', '131429', '8L', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('119', '131429', '8L', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('120', '131429', '8L', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('121', '131430', '8L', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('122', '131430', '8L', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('123', '131430', '8L', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('124', '131430', '8L', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('125', '131440', 'CN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('126', '131440', 'CN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('127', '131440', 'CN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('128', '131440', 'CN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('129', '131441', 'CN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('130', '131441', 'CN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('131', '131441', 'CN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('132', '131441', 'CN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('133', '131442', 'CN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('134', '131442', 'CN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('135', '131442', 'CN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('136', '131442', 'CN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('137', '131443', 'CN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('138', '131443', 'CN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('139', '131443', 'CN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('140', '131443', 'CN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('141', '131444', 'CN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('142', '131444', 'CN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('143', '131444', 'CN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('144', '131444', 'CN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('145', '131445', 'CN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('146', '131445', 'CN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('147', '131445', 'CN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('148', '131445', 'CN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('149', '131446', 'CN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('150', '131446', 'CN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('151', '131446', 'CN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('152', '131446', 'CN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('153', '131447', 'CN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('154', '131447', 'CN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('155', '131447', 'CN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('156', '131447', 'CN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('157', '131448', 'CN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('158', '131448', 'CN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('159', '131448', 'CN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('160', '131448', 'CN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('161', '131463', 'GS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('162', '131463', 'GS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('163', '131463', 'GS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('164', '131463', 'GS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('165', '131463', 'GS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:03', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('166', '131465', 'GS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('167', '131465', 'GS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('168', '131465', 'GS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('169', '131465', 'GS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('170', '131465', 'GS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('171', '131467', 'GS', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('172', '131467', 'GS', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('173', '131467', 'GS', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('174', '131467', 'GS', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('175', '131467', 'GS', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('176', '131468', 'GS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('177', '131468', 'GS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('178', '131468', 'GS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('179', '131468', 'GS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('180', '131468', 'GS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('181', '131469', 'GS', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('182', '131469', 'GS', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('183', '131469', 'GS', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('184', '131469', 'GS', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('185', '131469', 'GS', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('186', '131470', 'GS', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('187', '131470', 'GS', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('188', '131470', 'GS', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('189', '131470', 'GS', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('190', '131470', 'GS', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('191', '131471', 'HO', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('192', '131471', 'HO', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('193', '131473', 'HO', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('194', '131473', 'HO', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('195', '131474', 'HO', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('196', '131474', 'HO', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('197', '131474', 'HO', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('198', '131474', 'HO', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('199', '131475', 'HO', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('200', '131475', 'HO', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('201', '131477', 'HO', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('202', '131477', 'HO', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('203', '131477', 'HO', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('204', '131478', 'HO', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('205', '131478', 'HO', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('206', '131479', 'HO', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('207', '131479', 'HO', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('208', '131480', 'HO', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('209', '131480', 'HO', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('210', '131480', 'HO', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('211', '131481', 'HO', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('212', '131481', 'HO', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('213', '131481', 'HO', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('214', '131481', 'HO', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('215', '131492', 'JD', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('216', '131492', 'JD', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('217', '131493', 'JD', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('218', '131493', 'JD', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('219', '131494', 'JD', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('220', '131494', 'JD', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('221', '131495', 'JD', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('222', '131495', 'JD', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('223', '131496', 'JD', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('224', '131496', 'JD', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('225', '131498', 'JD', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('226', '131498', 'JD', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('227', '131499', 'JD', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('228', '131499', 'JD', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('229', '131511', 'PN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('230', '131511', 'PN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('231', '131511', 'PN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('232', '131512', 'PN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('233', '131512', 'PN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('234', '131512', 'PN', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('235', '131513', 'PN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('236', '131513', 'PN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('237', '131513', 'PN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('238', '131514', 'PN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('239', '131514', 'PN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('240', '131514', 'PN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('241', '131515', 'PN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('242', '131515', 'PN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('243', '131515', 'PN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('244', '131516', 'PN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('245', '131516', 'PN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('246', '131516', 'PN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('247', '131517', 'PN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('248', '131517', 'PN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('249', '131517', 'PN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('250', '131518', 'PN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('251', '131518', 'PN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('252', '131518', 'PN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('253', '131519', 'PN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('254', '131519', 'PN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('255', '131519', 'PN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('256', '131548', 'OQ', 'M', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('257', '131549', 'OQ', 'E', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('258', '131550', 'OQ', 'Q', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('259', '131551', 'OQ', 'L', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('260', '131552', 'OQ', 'S', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('261', '131553', 'OQ', 'G', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('262', '131554', 'OQ', 'T', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('263', '131555', 'OQ', 'H', '按照当前舱位票面价收取退票费;', '按照当前舱位票面价收取变更费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('264', '133479', 'KY', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('265', '133479', 'KY', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('266', '133479', 'KY', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('267', '133481', 'KY', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('268', '133481', 'KY', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('269', '133481', 'KY', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('270', '133481', 'KY', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('271', '143662', 'G5', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('272', '143662', 'G5', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('273', '143662', 'G5', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('274', '143664', 'G5', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('275', '143664', 'G5', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('276', '143664', 'G5', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('277', '143665', 'G5', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('278', '143665', 'G5', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('279', '143665', 'G5', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('280', '143665', 'G5', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('281', '143666', 'G5', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('282', '143667', 'G5', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('283', '143667', 'G5', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('284', '143667', 'G5', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('285', '143667', 'G5', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('286', '143668', 'G5', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('287', '143668', 'G5', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('288', '143668', 'G5', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('289', '143668', 'G5', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('290', '143669', 'G5', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('291', '143669', 'G5', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('292', '143669', 'G5', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('293', '143669', 'G5', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('294', '143670', 'G5', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('295', '143670', 'G5', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('296', '143670', 'G5', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('297', '143671', 'G5', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('298', '143671', 'G5', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('299', '143671', 'G5', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('300', '143672', 'G5', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('301', '143672', 'G5', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('302', '143672', 'G5', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('303', '143673', 'G5', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('304', '143673', 'G5', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('305', '143673', 'G5', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('306', '143674', 'G5', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('307', '143674', 'G5', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('308', '143674', 'G5', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('309', '167048', 'NS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('310', '167048', 'NS', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('311', '167049', 'NS', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('312', '167049', 'NS', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('313', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('314', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('315', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('316', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('317', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('318', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('319', '167052', 'NS', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('320', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('321', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('322', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('323', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('324', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('325', '167053', 'NS', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('326', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('327', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('328', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('329', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('330', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('331', '167054', 'NS', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('332', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('333', '167055', 'NS', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('334', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('335', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('336', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('337', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('338', '167055', 'NS', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('339', '167056', 'NS', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('340', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('341', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('342', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('343', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('344', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('345', '167058', 'NS', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('346', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('347', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('348', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('349', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('350', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('351', '167059', 'NS', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('352', '167060', 'NS', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('353', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('354', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('355', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('356', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('357', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('358', '167061', 'NS', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('359', '167062', 'NS', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;若销售3.6折(含)以上舱位运价,填写该运价所对应的舱位客票类别代码,若销售3.6折以下舱位运价,则为Y+实际订座舱位字母代码YR,YZ,YW仅退机建费和燃油费,机票款不退', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('360', '167062', 'NS', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('361', '167062', 'NS', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('362', '167064', 'NS', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('363', '172804', 'JR', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('364', '172804', 'JR', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('365', '172804', 'JR', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('366', '172804', 'JR', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('367', '172805', 'JR', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('368', '172805', 'JR', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('369', '172805', 'JR', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('370', '172805', 'JR', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('371', '172806', 'JR', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('372', '172806', 'JR', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('373', '172807', 'JR', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('374', '172807', 'JR', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('375', '172807', 'JR', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('376', '172807', 'JR', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('377', '172808', 'JR', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('378', '172808', 'JR', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('379', '172809', 'JR', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('380', '172809', 'JR', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('381', '172809', 'JR', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('382', '172809', 'JR', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('383', '172810', 'JR', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;1、45%（含）以上客票：航班起飞前：同等舱位免费 变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更，收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者。 2、45%以下客票：不允许同舱位变更，允许升舱一次且至6折（含）以上舱位，再次变更，参照《幸福航空多等级舱位管理规定》升舱后舱位相应规定办理', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('384', '172810', 'JR', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的15.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('385', '172810', 'JR', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的25.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('386', '172810', 'JR', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('387', '172811', 'JR', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('388', '172811', 'JR', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('389', '172811', 'JR', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的25.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('390', '172811', 'JR', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('391', '172812', 'JR', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;航班起飞前：同等舱位免费变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更， 收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('392', '172812', 'JR', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;免费变更2次，再次变更每次收取Y舱公布运价5%变更费', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('393', '172812', 'JR', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('394', '172812', 'JR', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的25.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的5.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('395', '172813', 'JR', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;飞后免费变更一次，若再次变更收取10%变更费', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('396', '172813', 'JR', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('397', '172813', 'JR', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('398', '172813', 'JR', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('399', '172813', 'JR', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('400', '181062', 'CA', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('401', '181064', 'CA', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('402', '181065', 'CA', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('403', '181066', 'CA', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('404', '204094', 'VD', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('405', '678760', 'VD', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('406', '678761', 'VD', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('407', '678762', 'VD', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('408', '678763', 'VD', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('409', '678764', 'VD', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('410', '678769', 'VD', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('411', '678770', 'VD', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('412', '678771', 'VD', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('413', '678772', 'VD', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('414', '708908', 'KY', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('415', '708908', 'KY', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('416', '708908', 'KY', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('417', '708909', 'KY', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('418', '708909', 'KY', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('419', '708909', 'KY', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:04', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('420', '708910', 'KY', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('421', '708910', 'KY', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('422', '708910', 'KY', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('423', '708912', 'KY', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('424', '708912', 'KY', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('425', '708912', 'KY', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('426', '1129699', 'KN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('427', '1129699', 'KN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('428', '1129699', 'KN', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('429', '1396724', 'HO', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('430', '1396724', 'HO', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('431', '1630675', 'G5', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('432', '1630675', 'G5', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('433', '1630675', 'G5', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('434', '1695251', 'CA', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('435', '1695252', 'CA', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('436', '1695253', 'CA', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('437', '1695254', 'CA', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('438', '1695255', 'CA', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('439', '1695255', 'CA', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('440', '1695256', 'CA', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('441', '1740667', 'CN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('442', '1740667', 'CN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('443', '1740667', 'CN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('444', '1740667', 'CN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('445', '1740668', 'CN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('446', '1740668', 'CN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('447', '1740668', 'CN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('448', '1740671', 'CN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('449', '1740671', 'CN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('450', '1740671', 'CN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('451', '1740672', 'CN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('452', '1740672', 'CN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('453', '1740672', 'CN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;			', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('454', '1740675', 'CN', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('455', '1740694', 'EU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('456', '1740695', 'HO', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;最低收取50.0元改期费;不得低于50元', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('457', '1740697', 'EU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;若销售3折（含）以上舱位运价，填写该运价所对应的舱位客票类别代码。 按照该客票类别所对应的规定执行。若销售3折以下舱位运价 ， 则为Y+实际订座舱位字母代码,即YN ，YZ，YD。  ', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('458', '1740703', 'HO', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;最低收取50.0元退票费;按照对应舱位明折明扣公布运价标准收取，退票手续费不得低于50元', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;最低收取50.0元改期费;不得低于50元', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('459', '1740707', 'EU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;若销售3折(含)以上舱位运价，填写该运价所对应的舱位客票类别代码。 若销售3折以下舱位运价 ， 则为Y+实际订座舱位字母代码,即YN ，YZ，YD。  ', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('460', '1740711', 'EU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('461', '1740717', 'JD', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('462', '1740718', 'JD', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('463', '1740740', 'KN', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('464', '1740741', '8L', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('465', '1740742', '8L', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('466', '1740743', '8L', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('467', '1740750', 'JD', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行 ', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行 ', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('468', '1740750', 'JD', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('469', '1740764', 'NS', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('470', '1740764', 'NS', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('471', '1740766', 'NS', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('472', '1740766', 'NS', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('473', '1740774', 'JR', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;45%（含）以上客票：航班起飞前：同等舱位免费 变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更，收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者。 2、45%以下客票：不允许同舱位变更，允许升舱一次且至6折（含）以上舱位，再次变更，参照《幸福航空多等级舱位管理规定》升舱后舱位相应规定办理。', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('474', '1740774', 'JR', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('475', '1740774', 'JR', 'G', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按照对应折扣匹配手续费', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按照对应折扣匹配手续费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('476', '1740785', 'JR', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('477', '1740785', 'JR', 'X', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按照对应折扣匹配手续费', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按照对应折扣匹配手续费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('478', '1740785', 'JR', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;45%（含）以上客票：航班起飞前：同等舱位免费 变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更，收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者。 2、45%以下客票：不允许同舱位变更，允许升舱一次且至6折（含）以上舱位，再次变更，参照《幸福航空多等级舱位管理规定》升舱后舱位相应规定办理。', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('479', '1740799', 'G5', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('480', '1740799', 'G5', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('481', '1740800', 'G5', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的40.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('482', '1740800', 'G5', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的25.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;R舱无陪儿童、军残、警残，24小时前退票10%，24小时内及航班起飞后20%', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;R舱无陪儿童、军残、警残，不得自愿改签', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('483', '1740800', 'G5', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('484', '1740801', 'G5', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('485', '1740804', 'TV', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('486', '1740804', 'TV', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取F舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('487', '1740804', 'TV', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('488', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;拉萨(拉萨=成都/重庆除外)、林芝、邦达、阿里、日喀则进出港航班的客票；以航司审核结果为准！', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('489', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;销售2015年8月13日至2015年9月15日期间（以航班日期为准）拉萨、林芝、邦达、阿里（Y/B/M/H）、日喀则进出港航班的客票与Y 舱（阿里航线Y/B/M/H）相同价格的特殊舱位，也应按照此客规办理', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;销售2015年8月13日至2015年9月15日期间（以航班日期为准）拉萨、林芝、邦达、阿里（Y/B/M/H）、日喀则进出港航班的客票与Y 舱（阿里航线Y/B/M/H）相同价格的特殊舱位，也应按照此客规办理', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('490', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('491', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;具体审核结果以航司为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('492', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('493', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('494', '1740806', 'TV', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('495', '1740807', 'TV', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('496', '1740807', 'TV', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('497', '1740808', 'TV', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('498', '1740808', 'TV', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('499', '1740809', 'TV', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('500', '1740809', 'TV', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('501', '1740810', 'TV', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('502', '1740810', 'TV', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('503', '1740811', 'TV', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('504', '1740811', 'TV', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('505', '1740812', 'TV', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('506', '1740812', 'TV', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('507', '1740813', 'TV', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('508', '1740813', 'TV', 'G', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的25.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('509', '1740814', 'TV', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的25.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('510', '1740814', 'TV', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('511', '1740815', 'TV', 'A', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('512', '1740815', 'TV', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取F舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('513', '1740815', 'TV', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('514', '1740819', 'TV', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的10.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的10.0%改期费;可免费更改一次；再次更改每次收取Y舱公布运价10%变更费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('515', '1740819', 'TV', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('516', '1740821', 'HO', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('517', '1740821', 'HO', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('518', '1740830', 'JD', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('519', '1740831', 'JD', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('520', '1740842', 'HO', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('521', '1740842', 'HO', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('522', '1740843', 'HO', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('523', '1740843', 'HO', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('524', '1740851', 'TV', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;3折以上按照所对应的客规执行 , 3折（含）以下收100%退票手续费', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('525', '1740880', '8L', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('526', '1740880', '8L', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('527', '1740950', 'JR', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;45%（含）以上客票：航班起飞前：同等舱位免费 变更不限次数。航班起飞后：同等舱位免费变更一次，再次变更，收取票面价10%变更费；无同等舱位时，升舱费与变更费比较取其高者。 2、45%以下客票：不允许同舱位变更，允许升舱一次且至6折（含）以上舱位，再次变更，参照《幸福航空多等级舱位管理规定》升舱后舱位相应规定办理。', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('528', '1740950', 'JR', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按照对应折扣匹配手续费', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按照对应折扣匹配手续费', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('529', '1740950', 'JR', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('530', '1740951', 'KY', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('531', '1740951', 'KY', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('532', '1740951', 'KY', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('533', '1740953', 'KY', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('534', '1740953', 'KY', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('535', '1740953', 'KY', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('536', '1740973', 'KY', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('537', '1740973', 'KY', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('538', '1740973', 'KY', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('539', '1740975', 'G5', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('540', '1740976', 'CA', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;正规A舱按票面价收取；如A舱折扣舱，起飞前后都按A舱（如无A舱FD运价，按F舱公布运价）公布运价10%收取', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('541', '1740978', 'EU', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('542', '1740978', 'EU', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('543', '1740998', 'CA', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('544', '1741006', 'EU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('545', '1741007', 'EU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('546', '1741008', 'EU', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('547', '1741009', 'G5', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('548', '1741010', 'G5', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天（含）内收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('549', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('550', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('551', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('552', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('553', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('554', '1741015', 'NS', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('555', '1741016', 'NS', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('556', '1741021', '8L', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('557', '1741022', 'HO', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;最低收取50.0元退票费;按照对应舱位明折明扣公布运价标准收取，退票手续费不得低于50元', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('558', '1741025', 'TV', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('559', '1741025', 'TV', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取Y舱全价票的15.0%退票费,起飞前1.0天以内及起飞后收取Y舱全价票的25.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外收取Y舱全价票的10.0%改期费,起飞前1.0天以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('560', '1741029', 'TV', 'Z', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('561', '1741031', 'NS', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('562', '1741032', '8L', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('563', '1741032', '8L', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:05', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('564', '1741032', '8L', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('565', '1741032', '8L', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('566', '1741042', 'NS', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('567', '1741050', 'HO', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('568', '1741050', 'HO', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('569', '1741050', 'HO', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('570', '1741051', 'HO', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;最低收取50.0元退票费;按照对应舱位明折明扣公布运价标准收取，退票手续费不得低于50元', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('571', '1741051', 'HO', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('572', '1750013', 'CZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('573', '1750013', 'CZ', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取W舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取W舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取W舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('574', '1750013', 'CZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('575', '1750013', 'CZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('576', '1750013', 'CZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('577', '1750015', 'CZ', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;特价T舱以ER项备注为准，具体以航司审核为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('578', '1750015', 'CZ', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取T舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下不改不退不签 以EI项备注为准，具体以航司审核结果为准', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取T舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取T舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('579', '1750018', 'CZ', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取M舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取M舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取M舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('580', '1750018', 'CZ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('581', '1750020', 'CZ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('582', '1750024', 'CZ', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取E舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取E舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取E舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取E舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('583', '1750024', 'CZ', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('584', '1750025', 'CZ', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取V舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取V舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取V舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('585', '1750025', 'CZ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('586', '1750026', 'CZ', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('587', '1750030', 'FM', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('588', '1750030', 'FM', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('589', '1750033', 'FM', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('590', '1750033', 'FM', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('591', '1750047', 'FM', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('592', '1750048', 'HU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('593', '1750048', 'HU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;		', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('594', '1750048', 'HU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('595', '1750049', 'HU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('596', '1750049', 'HU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('597', '1750049', 'HU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('598', '1750049', 'HU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('599', '1750050', 'HU', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('600', '1750050', 'HU', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('601', '1750050', 'HU', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('602', '1750051', 'HU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('603', '1750051', 'HU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的1.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('604', '1750051', 'HU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('605', '1750051', 'HU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('606', '1750051', 'HU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('607', '1750052', 'HU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('608', '1750052', 'HU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;		', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('609', '1750052', 'HU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('610', '1750053', 'HU', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;		', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('611', '1750053', 'HU', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前10.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前10.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前5.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前5.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('612', '1750053', 'HU', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;根据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('613', '1750055', 'HU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('614', '1750055', 'HU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('615', '1750055', 'HU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('616', '1750056', 'HU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('617', '1750056', 'HU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('618', '1750056', 'HU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('619', '1750057', 'HU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('620', '1750057', 'HU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('621', '1750057', 'HU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('622', '1750058', 'HU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('623', '1750058', 'HU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('624', '1750058', 'HU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('625', '1750060', 'HU', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('626', '1750060', 'HU', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('627', '1750060', 'HU', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('628', '1750061', 'HU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('629', '1750061', 'HU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('630', '1750061', 'HU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('631', '1750062', 'HU', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('632', '1750062', 'HU', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('633', '1750062', 'HU', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('634', '1750063', 'HU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('635', '1750063', 'HU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('636', '1750063', 'HU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('637', '1750064', 'HU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('638', '1750064', 'HU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('639', '1750064', 'HU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('640', '1750066', 'HU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;		', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;			', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('641', '1750066', 'HU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('642', '1750066', 'HU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('643', '1750067', 'HU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('644', '1750067', 'HU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据海航规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据海航规定执行			', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('645', '1750068', 'HU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('646', '1750068', 'HU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('647', '1750068', 'HU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;		', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;不得自愿变更，但可升舱至F、C舱		', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('648', '1750070', 'MF', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取P舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取P舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取P舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('649', '1750070', 'MF', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取P舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取P舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取P舱全价票的5.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（P/F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('650', '1750070', 'MF', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取P舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取P舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取P舱全价票的5.0%改期费;≤3次，免费；', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('651', '1750085', 'MF', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('652', '1750085', 'MF', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的5.0%退票费,起飞前2.0小时（含）内收取F舱全价票的10.0%退票费,起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的5.0%改期费,起飞前2.0小时（含）内收取J舱全价票的5.0%改期费,起飞后收取J舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('653', '1750090', 'MU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('654', '1750090', 'MU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('655', '1750090', 'MU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('656', '1750090', 'MU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('657', '1750090', 'MU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('658', '1750092', 'MU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('659', '1750092', 'MU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('660', '1750092', 'MU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('661', '1750092', 'MU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('662', '1750092', 'MU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('663', '1750107', 'MU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前100.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前100.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('664', '1750111', 'SC', 'B', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('665', '1750111', 'SC', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('666', '1750111', 'SC', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('667', '1750126', 'SC', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('668', '1750126', 'SC', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;按照舱位折扣率对应舱位标准执行，就低原则。  40 折以下按照 Z 舱（40 折）标准执行 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('669', '1750126', 'SC', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('670', '1750127', 'SC', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行 以航司审核为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('671', '1750127', 'SC', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('672', '1750127', 'SC', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('673', '1750128', '3U', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('674', '1750128', '3U', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('675', '1750129', '3U', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('676', '1750129', '3U', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取A舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取A舱全价票的15.0%退票费;1', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取A舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取A舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('677', '1750130', '3U', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('678', '1750130', '3U', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取C舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取C舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('679', '1750131', '3U', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('680', '1750131', '3U', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('681', '1750132', '3U', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('682', '1750132', '3U', 'I', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取I舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取I舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取I舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('683', '1750133', '3U', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('684', '1750133', '3U', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('685', '1750133', '3U', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('686', '1750135', '3U', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('687', '1750135', '3U', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体以航司审核结果为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('688', '1750136', '3U', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取H舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取H舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取H舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('689', '1750136', '3U', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('690', '1750136', '3U', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('691', '1750137', '3U', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取M舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取M舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取M舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取M舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('692', '1750137', '3U', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('693', '1750138', '3U', 'G', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取G舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取G舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取G舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取G舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('694', '1750138', '3U', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('695', '1750139', '3U', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('696', '1750139', '3U', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取S舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取S舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取S舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取S舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('697', '1750140', '3U', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取L舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取L舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取L舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取L舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('698', '1750140', '3U', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('699', '1750141', '3U', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('700', '1750141', '3U', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Q舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Q舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Q舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Q舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('701', '1750142', '3U', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('702', '1750142', '3U', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取E舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取E舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取E舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取E舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('703', '1750142', '3U', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('704', '1750143', '3U', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('705', '1750143', '3U', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('706', '1750143', '3U', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('707', '1750144', '3U', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取R舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取R舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取R舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取R舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('708', '1750144', '3U', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取R舱全价票的40.0%退票费,起飞前2.0小时以内及起飞后收取R舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取R舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取R舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('709', '1750144', '3U', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('710', '1750145', '3U', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('711', '1750145', '3U', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('712', '1750146', '3U', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('713', '1750147', '3U', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('714', '1750147', '3U', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('715', '1750148', '3U', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('716', '1750149', '3U', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('717', '1750150', '3U', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;若销售3折(含)以上舱位运价，填写该运价所对应的舱位客票类别代码。若销售3折以下舱位运价，则为Y+实际订座舱位字母代码，即YX.1.不得自愿改期、升舱。 2.仅退机建费和燃油费，机票款不退。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('718', '1750151', '3U', 'Z', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('719', '1750152', '3U', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('720', '1750152', '3U', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('721', '1750153', 'ZH', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('722', '1750153', 'ZH', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('723', '1750154', 'ZH', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;2014年7月15日（含）以后销售，航班日期为2014年7月15日（含）以后开始旅行的客票）', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;2014年7月15日（含）以后销售，航班日期为2014年7月15日（含）以后开始旅行的客票）', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('724', '1750154', 'ZH', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('725', '1750154', 'ZH', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:06', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('726', '1750154', 'ZH', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:06', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('727', '1750155', 'ZH', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('728', '1750155', 'ZH', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('729', '1750155', 'ZH', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('730', '1750155', 'ZH', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('731', '1750155', 'ZH', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('732', '1750156', 'ZH', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('733', '1750156', 'ZH', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('734', '1750169', 'ZH', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('735', '1750169', 'ZH', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('736', '1750170', 'ZH', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('737', '1750170', 'ZH', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('738', '1750174', '8L', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('739', '1750175', 'BK', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('740', '1750191', 'CA', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('741', '1750196', 'BK', 'X', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时（含）内收取Y舱全价票的35.0%退票费,起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时（含）内收取Y舱全价票的10.0%改期费,起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('742', '1750196', 'BK', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('743', '1750197', 'BK', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('744', '1750197', 'BK', 'X1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时（含）内收取Y舱全价票的35.0%退票费,起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时（含）内收取Y舱全价票的10.0%改期费,起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('745', '1750205', 'EU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;若销售3折(含)以上舱位运价，填写该运价所对应的舱位客票类别代码。 若销售3折以下舱位运价 ， 则为Y+实际订座舱位字母代码,即YN ，YZ，YD。  ', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('746', '1750206', 'GS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('747', '1750206', 'GS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('748', '1750206', 'GS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('749', '1750206', 'GS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('750', '1750206', 'GS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('751', '1750208', 'GS', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('752', '1750208', 'GS', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('753', '1750209', 'GS', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('754', '1750209', 'GS', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('755', '1750209', 'GS', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('756', '1750209', 'GS', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('757', '1750209', 'GS', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('758', '1750210', 'GS', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('759', '1750210', 'GS', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('760', '1750210', 'GS', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('761', '1750210', 'GS', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('762', '1750210', 'GS', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('763', '1750211', 'GS', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('764', '1750211', 'GS', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('765', '1750211', 'GS', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('766', '1750211', 'GS', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('767', '1750211', 'GS', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('768', '1750214', 'BK', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('769', '1750214', 'BK', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('770', '1750215', 'BK', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规定及特价销售政策执行，未作产品特别说明的，按本文件中订座折扣舱位对应规定办理。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规定及特价销售政策执行，未作产品特别说明的，按本文件中订座折扣舱位对应规定办理。', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('771', '1750216', 'BK', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('772', '1750218', 'BK', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('773', '1750219', 'CN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('774', '1750219', 'CN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('775', '1750219', 'CN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('776', '1750221', 'MU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('777', '1750221', 'MU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('778', '1750221', 'MU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('779', '1750222', 'MU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('780', '1750222', 'MU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('781', '1750222', 'MU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('782', '1750223', 'FM', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('783', '1750223', 'FM', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('784', '1750224', 'FM', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('785', '1750224', 'FM', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('786', '1750225', 'FM', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('787', '1750225', 'FM', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('788', '1750227', 'KN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('789', '1750227', 'KN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('790', '1750227', 'KN', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('791', '1750228', 'KN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('792', '1750228', 'KN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('793', '1750228', 'KN', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('794', '1750229', 'CN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('795', '1750229', 'CN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的5.0%改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('796', '1750229', 'CN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('797', '1750229', 'CN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('798', '1750230', 'GS', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('799', '1750230', 'GS', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('800', '1750230', 'GS', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;依据天航规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规则执行', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('801', '1750233', 'GS', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('802', '1750233', 'GS', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;依据天航规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规则执行', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('803', '1750233', 'GS', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('804', '1750233', 'GS', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('805', '1750238', 'BK', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;以产品文件规定为准	', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;以产品文件规定为准	', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('806', '1750241', 'PN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('807', '1750241', 'PN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('808', '1750241', 'PN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('809', '1750243', 'JD', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('810', '1750249', 'TV', 'I', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('811', '1750250', 'PN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('812', '1750250', 'PN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('813', '1750250', 'PN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('814', '1750251', 'PN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('815', '1750251', 'PN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('816', '1750251', 'PN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('817', '1750252', 'PN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('818', '1750252', 'PN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('819', '1750252', 'PN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('820', '1750254', 'PN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('821', '1750254', 'PN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('822', '1750254', 'PN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('823', '1750255', 'PN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('824', '1750255', 'PN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('825', '1750255', 'PN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('826', '1750256', 'PN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('827', '1750256', 'PN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('828', '1750256', 'PN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的60.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('829', '1750258', 'JD', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('830', '1750259', 'CA', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;3.5折（含）以下票款不退，只退基建燃油费。不得改签', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('831', '1750259', 'CA', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('832', '1750262', 'KY', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('833', '1750269', 'HU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('834', '1750269', 'HU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;		', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('835', '1750269', 'HU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('836', '1750270', 'HU', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('837', '1750270', 'HU', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;具体以审核为准			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;不得自愿变更，但可升舱至F、C舱			', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('838', '1750270', 'HU', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('839', '1750272', 'SC', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('840', '1750272', 'SC', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('841', '1750273', 'SC', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('842', '1750274', 'SC', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('843', '1750274', 'SC', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('844', '1750275', 'SC', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('845', '1750275', 'SC', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('846', '1750277', 'SC', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('847', '1750277', 'SC', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('848', '1750277', 'SC', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('849', '1750278', 'SC', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('850', '1750278', 'SC', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('851', '1750278', 'SC', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('852', '1750279', 'SC', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('853', '1750279', 'SC', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('854', '1750279', 'SC', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('855', '1750280', 'SC', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('856', '1750280', 'SC', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('857', '1750280', 'SC', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('858', '1750281', 'SC', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('859', '1750281', 'SC', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('860', '1750281', 'SC', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('861', '1750282', 'SC', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('862', '1750282', 'SC', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('863', '1750282', 'SC', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('864', '1750283', 'SC', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('865', '1750283', 'SC', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('866', '1750283', 'SC', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('867', '1750284', 'SC', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('868', '1750284', 'SC', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('869', '1750284', 'SC', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('870', '1750285', 'SC', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('871', '1750285', 'SC', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('872', '1750285', 'SC', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('873', '1750286', 'SC', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('874', '1750286', 'SC', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('875', '1750286', 'SC', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('876', '1750287', 'SC', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('877', '1750287', 'SC', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('878', '1750289', 'ZH', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('879', '1750291', 'HU', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('880', '1750294', 'SC', 'Y1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('881', '1750295', 'MU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('882', '1750295', 'MU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('883', '1750295', 'MU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('884', '1750298', 'MU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('885', '1750298', 'MU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('886', '1750298', 'MU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('887', '1750298', 'MU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('888', '1750298', 'MU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('889', '1750300', 'MU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('890', '1750300', 'MU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到167.0小时（含）免收退票费,起飞前167.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('891', '1750300', 'MU', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('892', '1750303', 'MU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('893', '1750303', 'MU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('894', '1750303', 'MU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('895', '1750304', 'MU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('896', '1750304', 'MU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:07', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('897', '1750304', 'MU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('898', '1750305', 'MU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('899', '1750305', 'MU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('900', '1750305', 'MU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('901', '1750307', 'MU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价T舱以ER项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;4折以下T舱不改不退不签,特价T舱以ER项备注为准，具体以航司审核为准。', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('902', '1750307', 'MU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价T舱以ER项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;4折以下T舱不改不退不签,特价T舱以ER项备注为准，具体以航司审核为准。', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('903', '1750307', 'MU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到167.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前167.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价T舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('904', '1750308', 'MU', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('905', '1750308', 'MU', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('906', '1750309', 'MU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下不改不退不签 以ER项备注为准，具体以航司审核结果为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;4折以下不改不退不签 以ER项备注为准，具体以航司审核结果为准', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('907', '1750309', 'MU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('908', '1750309', 'MU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下z舱不该不退不签', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('909', '1750310', 'KN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('910', '1750310', 'KN', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;部分航线特殊优惠Z舱按照航空公司具体使用规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('911', '1750312', '8L', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('912', '1750319', 'GS', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('913', '1750319', 'GS', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('914', '1750319', 'GS', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('915', '1750319', 'GS', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('916', '1750319', 'GS', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('917', '1750320', '8L', 'Z2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('918', '1750321', 'MU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('919', '1750321', 'MU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('920', '1750321', 'MU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('921', '1750322', 'MU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;部分航线特殊优惠P舱按照航空公司具体使用规则执行', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('922', '1750322', 'MU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('923', '1750322', 'MU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('924', '1750324', 'GS', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('925', '1750324', 'GS', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('926', '1750324', 'GS', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('927', '1750324', 'GS', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('928', '1750324', 'GS', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('929', '1750325', 'FM', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('930', '1750325', 'FM', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('931', '1750326', 'FM', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('932', '1750326', 'FM', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('933', '1750327', 'FM', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('934', '1750327', 'FM', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('935', '1750328', 'FM', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('936', '1750328', 'FM', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('937', '1750328', 'FM', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;部分航线特殊优惠P舱按照航空公司具体使用规则执行', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('938', '1750329', 'FM', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价T舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('939', '1750329', 'FM', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价T舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('940', '1750329', 'FM', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到167.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前167.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('941', '1750330', 'FM', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('942', '1750330', 'FM', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('943', '1750332', 'FM', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('944', '1750332', 'FM', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('945', '1750333', 'FM', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('946', '1750333', 'FM', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('947', '1750334', 'FM', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('948', '1750334', 'FM', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('949', '1750336', 'KN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('950', '1750336', 'KN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('951', '1750336', 'KN', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('952', '1750337', 'KN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('953', '1750337', 'KN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('954', '1750337', 'KN', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('955', '1750338', 'KN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('956', '1750338', 'KN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('957', '1750338', 'KN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('958', '1750339', 'KN', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('959', '1750339', 'KN', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;部分航线特殊优惠P舱按照航空公司具体使用规则执行', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('960', '1750339', 'KN', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('961', '1750342', 'KN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('962', '1750342', 'KN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('963', '1750342', 'KN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('964', '1750342', 'KN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('965', '1750342', 'KN', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('966', '1750343', 'FM', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;部分航线特殊优惠Z舱按照航空公司具体使用规则执行', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('967', '1750343', 'FM', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下不改不退不签 以ER项备注为准，具体以航司审核结果为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('968', '1750343', 'FM', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('969', '1750344', 'KN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '适用全部航线  ', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('970', '1750344', 'KN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('971', '1750344', 'KN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('972', '1750344', 'KN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('973', '1750346', 'FM', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('974', '1750346', 'FM', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('975', '1750346', 'FM', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('976', '1750347', 'KN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('977', '1750347', 'KN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('978', '1750347', 'KN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('979', '1750347', 'KN', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('980', '1750348', 'BK', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('981', '1750352', 'HU', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('982', '1750352', 'HU', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('983', '1750353', 'CN', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('984', '1750353', 'CN', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('985', '1750353', 'CN', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('986', '1750354', 'CN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;			', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;		', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('987', '1750354', 'CN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('988', '1750355', 'CN', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('989', '1750355', 'CN', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('990', '1750355', 'CN', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('991', '1750358', 'HO', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;最低收取50.0元退票费;按照对应舱位明折明扣公布运价标准收取，退票手续费不得低于50元', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;最低收取50.0元改期费;不得低于50元', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('992', '1750359', 'GS', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('993', '1750359', 'GS', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('994', '1750359', 'GS', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('995', '1750359', 'GS', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('996', '1750360', 'TV', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取W舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取W舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取W舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('997', '1750360', 'TV', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('998', '1750361', 'GS', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据天航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规定执行', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('999', '1750361', 'GS', 'P', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据天航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规定执行', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1000', '1750361', 'GS', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;依据天航规定执行', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1001', '1750362', 'JD', 'Z2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1002', '1750363', '8L', 'Z3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1003', '1750364', 'CZ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1004', '1750364', 'CZ', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取J舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1005', '1750364', 'CZ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1006', '1750364', 'CZ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1007', '1750365', 'PN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1008', '1750366', 'PN', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1009', '1750367', 'CZ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1010', '1750367', 'CZ', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取B舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取B舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取B舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1011', '1750369', '8L', 'Z4', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1012', '1750372', '8L', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1013', '1750372', '8L', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1014', '1750373', '8L', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1015', '1750374', 'MF', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1016', '1750377', '8L', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据祥鹏规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1017', '1750377', '8L', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1018', '1750379', 'SC', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1019', '1750380', 'MF', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1020', '1750380', 'MF', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1021', '1750380', 'MF', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取F舱全价票的5.0%改期费;≤3次，免费；', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1022', '1750381', 'MF', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取Y舱全价票的5.0%改期费;≤3次，免费；', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1023', '1750381', 'MF', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1024', '1750381', 'MF', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1025', '1750383', 'MF', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1026', '1750383', 'MF', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1027', '1750383', 'MF', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1028', '1750390', 'MF', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1029', '1750391', 'KY', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1030', '1750396', 'CZ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1031', '1750396', 'CZ', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取L舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取L舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取L舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取L舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1032', '1750397', 'FM', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时到1.0小时（含）收取当前舱位票面价的50.0%改期费,起飞前1.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1033', '1750398', 'CZ', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1034', '1750398', 'CZ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1035', '1750398', 'CZ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1036', '1750399', 'CZ', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取C舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取C舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取C舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1037', '1750399', 'CZ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1038', '1750402', 'CZ', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1039', '1750402', 'CZ', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;具体文件使用条件', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1040', '1750404', 'MF', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1041', '1750404', 'MF', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后收取J舱全价票的5.0%改期费;≤3次，免费；', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1042', '1750404', 'MF', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%改期费;≤3次，免费变更；＞3次，收取对应舱位等级全票价（F/J/Y）5%变更费', '适用全部航线', '2016-12-12 04:30:08', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1043', '1750405', 'MF', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:08', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1044', '1750405', 'MF', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1045', '1750405', 'MF', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1046', '1750406', 'MF', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1047', '1750406', 'MF', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1048', '1750406', 'MF', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1049', '1750407', 'MF', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1050', '1750409', 'MF', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1051', '1750411', 'SC', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1052', '1750412', 'MF', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1053', '1750414', '8L', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1054', '1750414', '8L', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1055', '1750414', '8L', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1056', '1750415', 'SC', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1057', '1750416', 'SC', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1058', '1750416', 'SC', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1059', '1750417', 'HU', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体审核依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1060', '1750417', 'HU', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;不得自愿变更，但可升舱至F、C舱', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1061', '1750417', 'HU', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1062', '1750418', 'CN', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;具体以审核为准		', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1063', '1750418', 'CN', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;不签不改不退', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1064', '1750418', 'CN', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1065', '1750419', 'CN', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;具体以审核为准		', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1066', '1750419', 'CN', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;不签不改不退', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;不签不改不退', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1067', '1750419', 'CN', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1068', '1750420', 'KY', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;不签不改不退', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;不签不改不退', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1069', '1750421', '3U', 'L1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1070', '1750422', '3U', 'S1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1071', '1750423', '3U', 'G1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1072', '1750424', '3U', 'M1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1073', '1750425', '3U', 'H1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1074', '1750426', '3U', 'W1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1075', '1750427', '3U', 'T1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1076', '1750427', '3U', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1077', '1750428', 'MU', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;部分航线特殊优惠G舱按客票备注EI项文件号为准', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的50.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1078', '1750429', 'HU', 'A1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1079', '1750430', 'GJ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1080', '1750430', 'GJ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1081', '1750430', 'GJ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1082', '1750431', 'GJ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1083', '1750431', 'GJ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1084', '1750431', 'GJ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1085', '1750432', 'GJ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1086', '1750432', 'GJ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1087', '1750432', 'GJ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1088', '1750433', 'GJ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1089', '1750433', 'GJ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1090', '1750433', 'GJ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1091', '1750434', 'GJ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1092', '1750434', 'GJ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1093', '1750435', 'GJ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1094', '1750435', 'GJ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1095', '1750436', 'GJ', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1096', '1750436', 'GJ', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1097', '1750436', 'GJ', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1098', '1750438', 'GJ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1099', '1750438', 'GJ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1100', '1750438', 'GJ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1101', '1750439', 'GJ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1102', '1750439', 'GJ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1103', '1750439', 'GJ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1104', '1750440', 'GJ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1105', '1750440', 'GJ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1106', '1750440', 'GJ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1107', '1750440', 'GJ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的65.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的45.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的65.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1108', '1750441', 'GJ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1109', '1750441', 'GJ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的65.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的45.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的65.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1110', '1750441', 'GJ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1111', '1750441', 'GJ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1112', '1750442', 'GJ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1113', '1750442', 'GJ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的65.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的45.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的65.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1114', '1750442', 'GJ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的30.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1115', '1750442', 'GJ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1116', '1750443', 'GJ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1117', '1750443', 'GJ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1118', '1750443', 'GJ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1119', '1750444', 'GJ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1120', '1750444', 'GJ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1121', '1750444', 'GJ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1122', '1750446', 'GJ', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1123', '1750447', 'GJ', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1124', '1750467', 'JR', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1125', '1750467', 'JR', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1126', '1750468', 'MF', 'B1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时（含）内收取Y舱全价票的20.0%退票费,起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时（含）内收取Y舱全价票的10.0%改期费,起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1127', '1750468', 'MF', 'B1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1128', '1750468', 'MF', 'B1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1129', '1750469', 'MF', 'Q1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1130', '1750469', 'MF', 'Q1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1131', '1750469', 'MF', 'Q1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1132', '1750470', 'MF', 'V1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1133', '1750470', 'MF', 'V1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1134', '1750470', 'MF', 'V1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时（含）内收取Y舱全价票的40.0%退票费,起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时（含）内收取Y舱全价票的20.0%改期费,起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1135', '1750472', 'JD', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1136', '1750473', 'JD', 'T2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1137', '1750474', 'JD', 'T3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1138', '1750475', 'JD', 'T4', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1139', '1750476', 'GJ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行	', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行	', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1140', '1750476', 'GJ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1141', '1750476', 'GJ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1142', '1750477', 'GJ', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1143', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1144', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1145', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1146', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1147', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1148', '1750478', 'NS', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1149', '1750480', 'KN', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1150', '1750483', 'MU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1151', '1750483', 'MU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1152', '1750484', 'MF', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1153', '1750484', 'MF', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1154', '1750484', 'MF', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1155', '1750485', 'MF', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1156', '1750485', 'MF', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1157', '1750485', 'MF', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1158', '1750486', 'HU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1159', '1750486', 'HU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1160', '1750486', 'HU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1161', '1750487', 'HU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1162', '1750487', 'HU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1163', '1750487', 'HU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1164', '1750488', 'MU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1165', '1750488', 'MU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1166', '1750489', 'CZ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1167', '1750489', 'CZ', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取H舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取H舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取H舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1168', '1750490', 'CZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1169', '1750490', 'CZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1170', '1750490', 'CZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1171', '1750490', 'CZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1172', '1750490', 'CZ', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前免收改期费,起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1173', '1750491', 'MU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1174', '1750491', 'MU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1175', '1750492', 'JD', 'Z3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1176', '1750493', 'JD', 'Z4', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1177', '1750494', 'GS', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1178', '1750494', 'GS', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1179', '1750494', 'GS', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据天航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1180', '1750495', 'SC', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1181', '1750495', 'SC', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;按照舱位折扣率对应舱位标准执行，就低原则。  40 折以下按照 Z 舱（40 折）标准执行 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1182', '1750495', 'SC', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1183', '1750496', 'MF', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;≤3次，免费变更；＞3次，收取对应舱位等级全票价（F/J/Y）5%变更费', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1184', '1750496', 'MF', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1185', '1750496', 'MF', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1186', '1750496', 'MF', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;1、≤3次，免费； 2、＞3次，对应舱位等级全票价（F/J/Y）的5%', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1187', '1750497', 'DZ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1188', '1750497', 'DZ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1189', '1750498', 'DZ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1190', '1750498', 'DZ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1191', '1750499', 'DZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1192', '1750499', 'DZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1193', '1750499', 'DZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1194', '1750499', 'DZ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1195', '1750500', 'DZ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1196', '1750500', 'DZ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1197', '1750501', 'DZ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1198', '1750501', 'DZ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1199', '1750502', 'DZ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1200', '1750502', 'DZ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1201', '1750503', 'DZ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1202', '1750503', 'DZ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1203', '1750504', 'DZ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1204', '1750504', 'DZ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1205', '1750505', 'DZ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1206', '1750505', 'DZ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1207', '1750506', 'DZ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1208', '1750506', 'DZ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1209', '1750507', 'DZ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1210', '1750507', 'DZ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1211', '1750508', 'DZ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1212', '1750508', 'DZ', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1213', '1750509', 'DZ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1214', '1750509', 'DZ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1215', '1750510', 'DZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1216', '1750510', 'DZ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1217', '1750511', 'MF', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1218', '1750511', 'MF', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1219', '1750511', 'MF', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1220', '1750512', 'MF', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1221', '1750512', 'MF', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:09', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1222', '1750512', 'MF', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;≤3次，免费；', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1223', '1750513', 'MF', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1224', '1750513', 'MF', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1225', '1750513', 'MF', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1226', '1750518', 'SC', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;按照舱位折扣率对应舱位标准执行，就低原则。  40 折以下按照 Z 舱（40 折）标准执行 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1227', '1750518', 'SC', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1228', '1750518', 'SC', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1229', '1750534', 'EU', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外免收改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1230', '1750534', 'EU', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取A舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1231', '1750535', 'EU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1232', '1750535', 'EU', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取C舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1233', '1750535', 'EU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外免收改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1234', '1750536', 'EU', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取E舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取E舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取E舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取E舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1235', '1750536', 'EU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1236', '1750537', 'EU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1237', '1750537', 'EU', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1238', '1750537', 'EU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外免收改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1239', '1750538', 'EU', 'G', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取G舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取G舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取G舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取G舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1240', '1750538', 'EU', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1241', '1750539', 'EU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1242', '1750539', 'EU', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取H舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取H舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取H舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1243', '1750540', 'EU', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取J舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1244', '1750540', 'EU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外免收改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1245', '1750541', 'EU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1246', '1750541', 'EU', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取L舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取L舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取L舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取L舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1247', '1750542', 'EU', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取M舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取M舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取M舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取M舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1248', '1750542', 'EU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1249', '1750543', 'EU', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Q舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Q舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Q舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Q舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1250', '1750543', 'EU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1251', '1750544', 'EU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1252', '1750544', 'EU', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取R舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取R舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取R舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取R舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1253', '1750545', 'EU', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取S舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取S舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取S舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取S舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1254', '1750545', 'EU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1255', '1750546', 'EU', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取T舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取T舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取T舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1256', '1750546', 'EU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1257', '1750547', 'EU', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取V舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取V舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取V舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取V舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1258', '1750547', 'EU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1259', '1750548', 'EU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1260', '1750548', 'EU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的30.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的20.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1261', '1750548', 'EU', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1262', '1750549', 'YI', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1263', '1750549', 'YI', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;起飞前两小时之前免费变更2次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1264', '1750550', 'YI', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更2次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1265', '1750551', 'YI', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更2次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1266', '1750552', 'YI', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更2次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1267', '1750553', 'YI', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1268', '1750554', 'YI', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1269', '1750555', 'YI', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1270', '1750556', 'YI', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1271', '1750557', 'YI', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1272', '1750558', 'YI', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1273', '1750559', 'YI', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1274', '1750560', 'YI', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的5.0%改期费;起飞前：免费变更1次，再次变更每次收取5%变更手续费', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1275', '1750561', 'YI', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1276', '1750562', 'GJ', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1277', '1750562', 'GJ', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1278', '1750563', 'GJ', 'A1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1279', '1750564', 'CA', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后收取当前舱位票面价的10.0%改期费;1）相同舱位改期：每次每段更改收取票面运价10%的改期费（2）子舱位变更改期：重新计算票价，并与原付票款金额进行比较，差额少补多不退，并与票面运价10%的改期费比较，收取高者。', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1280', '1750566', 'QW', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1281', '1750566', 'QW', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1282', '1750566', 'QW', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;需升舱至全价改期', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1283', '1750566', 'QW', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1284', '1750580', 'QW', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按照具体产品规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按照具体产品规定执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1285', '1750580', 'QW', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;需升舱至全价改期', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1286', '1750581', 'QW', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%改期费,起飞前2.0小时以内及起飞后不得改期;航班离站时间2小时内（不含）及飞后不允许自愿变更', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1287', '1750581', 'QW', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;需升舱至全价改期', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1288', '1750582', 'QW', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%改期费,起飞前2.0小时以内及起飞后不得改期;航班离站时间2小时内（不含）及飞后不允许自愿变更', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1289', '1750582', 'QW', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1290', '1750583', 'ZH', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1291', '1750583', 'ZH', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;同等舱位变更，如变更后舱位运价高于变更前的舱位运价，需补齐差价;如变更后舱位运价低于变更前的舱位运价，票价差额不退。如无同等舱位开放，需升舱至公布运价舱位。', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1292', '1750584', 'DR', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1293', '1750584', 'DR', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1294', '1750585', 'DR', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1295', '1750585', 'DR', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1296', '1750586', 'DR', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1297', '1750586', 'DR', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1298', '1750587', 'DR', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1299', '1750587', 'DR', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1300', '1750588', 'DR', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1301', '1750588', 'DR', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1302', '1750589', 'DR', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1303', '1750590', 'DR', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1304', '1750590', 'DR', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1305', '1750591', 'DR', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1306', '1750591', 'DR', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1307', '1750592', 'DR', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的15.0%退票费,起飞后收取当前舱位票面价的25.0%退票费;距离航班起飞日期前7天（不含）免收退票费', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1308', '1750593', 'DR', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1309', '1750593', 'DR', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1310', '1750594', 'DR', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1311', '1750594', 'DR', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1312', '1750595', 'DR', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1313', '1750595', 'DR', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1314', '1750596', 'DR', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1315', '1750596', 'DR', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1316', '1750597', 'DR', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1317', '1750597', 'DR', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1318', '1750598', 'DR', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1319', '1750599', 'DR', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1320', '1750600', 'DR', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1321', '1750601', 'GS', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1322', '1750601', 'GS', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的70.0%退票费,起飞前4.0小时以内及起飞后不得退票;依据天航规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1323', '1750601', 'GS', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1324', '1750602', 'CZ', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体文件使用条件', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1325', '1750604', 'JD', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1326', '1750604', 'JD', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1327', '1750606', 'JD', 'S', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1328', '1750608', 'CA', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1329', '1750608', 'CA', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1330', '1750609', 'HU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规定执行			', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1331', '1750609', 'HU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据海航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1332', '1750610', 'HU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1333', '1750611', 'HU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1334', '1750611', 'HU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1335', '1750611', 'HU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1336', '1750612', 'HU', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1337', '1750613', 'HU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1338', '1750614', 'HU', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1339', '1750615', 'EU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;见成都航空相关特殊舱位产品销售管理规定 ', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1340', '1750616', '8L', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据祥鹏规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1341', '1750617', 'G5', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按具体文件执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按具体文件执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1342', '1750617', 'G5', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1343', '1750617', 'G5', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1344', '1750618', 'G5', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按具体文件执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按具体文件执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1345', '1750619', 'PN', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按对应舱位规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1346', '1750620', 'KN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1347', '1750620', 'KN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1348', '1750623', 'MU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1349', '1750623', 'MU', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1350', '1750624', 'FM', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1351', '1750624', 'FM', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1352', '1750630', 'UQ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1353', '1750630', 'UQ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1354', '1750630', 'UQ', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1355', '1750631', 'UQ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1356', '1750631', 'UQ', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1357', '1750632', 'UQ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1358', '1750632', 'UQ', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1359', '1750633', 'UQ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1360', '1750633', 'UQ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1361', '1750634', 'UQ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1362', '1750634', 'UQ', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1363', '1750635', 'UQ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1364', '1750635', 'UQ', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1365', '1750636', 'UQ', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1366', '1750636', 'UQ', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1367', '1750637', 'UQ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1368', '1750637', 'UQ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1369', '1750638', 'UQ', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1370', '1750638', 'UQ', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1371', '1750639', 'UQ', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1372', '1750639', 'UQ', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1373', '1750640', 'UQ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1374', '1750640', 'UQ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1375', '1750641', 'UQ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1376', '1750641', 'UQ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1377', '1750642', 'UQ', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1378', '1750642', 'UQ', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1379', '1750643', 'UQ', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1380', '1750644', 'UQ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1381', '1750645', 'UQ', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1382', '1750646', 'UQ', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1383', '1750648', 'MF', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1384', '1750648', 'MF', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按具体文件规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1385', '1750651', 'DZ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1386', '1750652', 'CZ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1387', '1750652', 'CZ', 'U', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取U舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取U舱全价票的50.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取U舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取U舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1388', '1750653', 'NS', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取J舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1389', '1750653', 'NS', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%改期费;≤3次，免费；＞3次，对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1390', '1750653', 'NS', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取J舱全价票的5.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（J）的5%', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1391', '1750654', 'NS', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1392', '1750654', 'NS', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;航班规定离站时间2小时前自愿改期≤3次免费；＞3次对应舱位等级全票价（J/Y）的5%', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1393', '1750654', 'NS', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1394', '1750654', 'NS', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1395', '1750654', 'NS', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1396', '1750655', 'CZ', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1397', '1750655', 'CZ', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1398', '1750655', 'CZ', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1399', '1750656', 'MF', 'D', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的15.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1400', '1750657', 'FU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1401', '1750657', 'FU', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1402', '1750658', 'FU', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1403', '1750659', 'FU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1404', '1750659', 'FU', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1405', '1750660', 'FU', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体以使用条件为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;具体以使用条件为准', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1406', '1750662', 'FU', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1407', '1750663', 'FU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1408', '1750663', 'FU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1409', '1750664', 'FU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1410', '1750664', 'FU', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1411', '1750665', 'FU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1412', '1750665', 'FU', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1413', '1750666', 'FU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1414', '1750666', 'FU', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1415', '1750667', 'FU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1416', '1750667', 'FU', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1417', '1750668', 'FU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1418', '1750668', 'FU', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1419', '1750669', 'FU', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1420', '1750669', 'FU', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1421', '1750670', 'FU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1422', '1750670', 'FU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1423', '1750671', 'FU', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1424', '1750671', 'FU', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1425', '1750672', 'FU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1426', '1750672', 'FU', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1427', '1750673', 'FU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1428', '1750673', 'FU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1429', '1750674', 'FU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:10', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1430', '1750674', 'FU', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1431', '1750675', 'FU', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1432', '1750676', 'FU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1433', '1750677', 'FU', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1434', '1750678', 'FU', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1435', '1750679', 'FU', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1436', '1750680', 'FU', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1437', '1750681', 'FM', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1438', '1750681', 'FM', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1439', '1750685', 'CZ', 'Z', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Z舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下不改不退不签 以EI项备注为准，具体以航司审核结果为准', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Z舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取Z舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1440', '1750685', 'CZ', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1441', '1750687', 'KY', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1442', '1750688', '3U', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1443', '1750688', '3U', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1444', '1750689', 'DR', 'I', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1445', '1750690', 'NS', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;飞前大于3次的收取5%', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1446', '1750692', 'PN', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1447', '1750692', 'PN', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1448', '1750693', 'PN', 'Y1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1449', '1750693', 'PN', 'Y1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1450', '1750694', 'PN', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1451', '1750694', 'PN', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1452', '1750695', 'PN', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1453', '1750695', 'PN', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1454', '1750696', 'PN', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1455', '1750696', 'PN', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1456', '1750697', 'PN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1457', '1750697', 'PN', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1458', '1750699', 'PN', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1459', '1750699', 'PN', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1460', '1750700', 'PN', 'D1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1461', '1750700', 'PN', 'D1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1462', '1750701', 'PN', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1463', '1750701', 'PN', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1464', '1750702', 'PN', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1465', '1750702', 'PN', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1466', '1750705', 'CZ', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1467', '1750706', 'PN', 'A1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1468', '1750706', 'PN', 'A1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1469', '1750707', 'PN', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1470', '1750707', 'PN', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1471', '1750708', 'PN', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1472', '1750708', 'PN', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1473', '1750709', 'PN', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1474', '1750709', 'PN', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1475', '1750710', 'PN', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1476', '1750710', 'PN', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1477', '1750711', 'PN', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1478', '1750711', 'PN', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1479', '1750712', 'PN', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1480', '1750712', 'PN', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前3.0天（含）以外收取当前舱位票面价的60.0%退票费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前12.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前3.0天（含）以外收取当前舱位票面价的40.0%改期费,起飞前3.0天到12.0小时（含）收取当前舱位票面价的60.0%改期费,起飞前12.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1481', '1750713', 'CZ', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1482', '1750713', 'CZ', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取R舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下不改不退不签 以EI项备注为准，具体以航司审核结果为准', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取R舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取R舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1483', '1750714', 'KN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。 ', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1484', '1750714', 'KN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体已航司审核为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;具体已航司审核为准', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1485', '1750714', 'KN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1486', '1750715', 'SC', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1487', '1750715', 'SC', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1488', '1750716', 'JR', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;70%-99%之间的客票收取票面价10%的退票费：55%-69%之间的客票收取票面价20%的退票费：40%-54%之间的客票收取票面价50%的退票费：40%以下的客票不得自愿退票，只退机建和燃油', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1489', '1750716', 'JR', 'I', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按照对应折扣匹配手续费', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按照对应折扣匹配手续费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1490', '1750719', '3U', 'N2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1491', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1492', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1493', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1494', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1495', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1496', '1750720', 'JD', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1497', '1750721', 'HU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1498', '1750721', 'HU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1499', '1750721', 'HU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1500', '1750721', 'HU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1501', '1750721', 'HU', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1502', '1750722', 'QW', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1503', '1750722', 'QW', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1504', '1750723', 'QW', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1505', '1750723', 'QW', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1506', '1750724', 'QW', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1507', '1750724', 'QW', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1508', '1750725', 'QW', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1509', '1750725', 'QW', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1510', '1750726', 'QW', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1511', '1750726', 'QW', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1512', '1750727', 'QW', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1513', '1750727', 'QW', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1514', '1750728', 'QW', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1515', '1750728', 'QW', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1516', '1750729', 'QW', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1517', '1750729', 'QW', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1518', '1750730', 'QW', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1519', '1750730', 'QW', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1520', '1750731', 'QW', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1521', '1750731', 'QW', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1522', '1750732', 'QW', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1523', '1750732', 'QW', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1524', '1750733', 'QW', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1525', '1750733', 'QW', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1526', '1750734', 'QW', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1527', '1750734', 'QW', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1528', '1750735', 'QW', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1529', '1750735', 'QW', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1530', '1750736', 'BK', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;同舱位免费变更', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1531', '1750736', 'BK', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1532', '1750737', 'BK', 'F1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;同舱位免费变更', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1533', '1750738', 'BK', 'Y1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1534', '1750739', 'BK', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1535', '1750740', 'BK', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1536', '1750741', 'BK', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1537', '1750742', 'BK', 'B1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1538', '1750743', 'BK', 'H1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1539', '1750744', 'BK', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1540', '1750745', 'BK', 'K1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;同等舱位免费变更一次，再次或多次变更按经济舱全价（Y）收取5%的变更费', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1541', '1750746', 'BK', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1542', '1750747', 'BK', 'M1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1543', '1750748', 'BK', 'L1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1544', '1750749', 'BK', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1545', '1750750', 'BK', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1546', '1750751', 'BK', 'N1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1547', '1750752', 'BK', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1548', '1750753', 'BK', 'Q1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的25.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1549', '1750754', 'BK', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1550', '1750754', 'BK', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1551', '1750755', 'BK', 'E1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1552', '1750755', 'BK', 'E1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1553', '1750756', 'BK', 'U', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1554', '1750756', 'BK', 'U', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1555', '1750757', 'BK', 'U1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1556', '1750757', 'BK', 'U1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1557', '1750758', 'BK', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1558', '1750758', 'BK', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1559', '1750759', 'BK', 'T1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的30.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的35.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1560', '1750759', 'BK', 'T1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后收取 统一起飞前/后收取Y舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1561', '1750760', 'BK', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1562', '1750760', 'BK', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;4折以下无论何时提出退票，收取票面价100%的退票费（T1舱退改规则以主舱位T舱为准）。	', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的25.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1563', '1750761', 'BK', 'O1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;4折以下无论何时提出退票，收取票面价100%的退票费（T1舱退改规则以主舱位T舱为准）。	', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的25.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1564', '1750761', 'BK', 'O1', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1565', '1750762', 'UQ', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票; 按对应舱位规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1566', '1750763', 'QW', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%改期费,起飞前2.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1567', '1750763', 'QW', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;需升舱至全价改期', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1568', '1750764', 'QW', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1569', '1750764', 'QW', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%改期费,起飞前2.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1570', '1750765', 'YI', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1571', '1750766', 'G5', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1572', '1750767', 'GX', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1573', '1750767', 'GX', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1574', '1750767', 'GX', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1575', '1750768', 'GX', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1576', '1750768', 'GX', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1577', '1750768', 'GX', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1578', '1750769', 'GX', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1579', '1750769', 'GX', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1580', '1750769', 'GX', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1581', '1750770', 'GX', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1582', '1750770', 'GX', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1583', '1750770', 'GX', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1584', '1750771', 'GX', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1585', '1750771', 'GX', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1586', '1750771', 'GX', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1587', '1750772', 'GX', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1588', '1750772', 'GX', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1589', '1750772', 'GX', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1590', '1750773', 'GX', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1591', '1750773', 'GX', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1592', '1750773', 'GX', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:11', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1593', '1750774', 'GX', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1594', '1750774', 'GX', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1595', '1750774', 'GX', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1596', '1750775', 'GX', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1597', '1750775', 'GX', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1598', '1750775', 'GX', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1599', '1750776', 'GX', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1600', '1750776', 'GX', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1601', '1750776', 'GX', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1602', '1750777', 'GX', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1603', '1750777', 'GX', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1604', '1750777', 'GX', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1605', '1750778', 'GX', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1606', '1750779', 'GX', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1607', '1750780', 'GX', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1608', '1750781', 'GX', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1609', '1750781', 'GX', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1610', '1750781', 'GX', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后免收退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1611', '1750782', 'GX', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外免收改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1612', '1750782', 'GX', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1613', '1750782', 'GX', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1614', '1750787', 'KN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1615', '1750787', 'KN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1616', '1750787', 'KN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1617', '1750787', 'KN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;航班规定离站时间之后提出收取客票价50%的误机费', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1618', '1750796', 'KN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1619', '1750796', 'KN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1620', '1750796', 'KN', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的40.0%退票费,起飞后收取当前舱位票面价的80.0%退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%改期费,起飞后收取当前舱位票面价的40.0%改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1621', '1750797', 'KN', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1622', '1750797', 'KN', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1623', '1750798', 'KN', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1624', '1750798', 'KN', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1625', '1750799', 'KN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1626', '1750799', 'KN', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1627', '1750800', 'KN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;注意：此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1628', '1750800', 'KN', 'I', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1629', '1750800', 'KN', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1630', '1750801', 'BK', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;以产品文件规定为准', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;以产品文件规定为准	', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1631', '1750802', 'MF', 'I', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1632', '1750802', 'MF', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体依据超频文件执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1633', '1750803', 'KY', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1634', '1750804', 'MF', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前169.0小时（含）以外免收退票费,起飞前169.0小时到167.0小时（含）免收退票费,起飞前167.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1635', '1750805', 'UQ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按对应舱位规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1636', '1750805', 'UQ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票; 按对应舱位规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1637', '1750806', 'NS', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1638', '1750806', 'NS', 'S', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1639', '1750806', 'NS', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1640', '1750807', 'GX', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1641', '1750807', 'GX', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1642', '1750807', 'GX', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1643', '1750808', 'GX', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据特价规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据特价规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1644', '1750809', 'GX', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据特价规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据特价规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1645', '1750810', 'CZ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按照具体文件使用条件执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按照具体文件使用条件执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1646', '1750810', 'CZ', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按照具体文件使用条件执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按照具体文件使用条件执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1647', '1750811', 'MU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1648', '1750811', 'MU', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外免收退票费,起飞前7.0天到2.0小时（含）免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1649', '1750812', 'KN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;最低收取50.0元退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;最低收取50.0元改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1650', '1750812', 'KN', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的50.0%退票费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的30.0%改期费;此客规仅适用于票证822客票，781客票匹配MU航原客规，如有更改再另行通知。', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1651', '1750813', 'KN', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1652', '1750814', 'GJ', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体审核以航司为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1653', '1750815', 'GJ', 'D1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体以航司审核为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1654', '1750816', 'QW', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;销售价格在外放最低舱位的基础上上浮Y舱价格的20%，具体退票费用以航司审核为准。', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;此仓位销售价格在外放最低舱位的基础上上浮Y舱价格的20%', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1655', '1750816', 'QW', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;此仓位销售价格在外放最低舱位的基础上上浮Y舱价格的20% ，具体退票费用以航司审核为准。', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;此仓位销售价格在外放最低舱位的基础上上浮Y舱价格的20% ', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1656', '1750817', 'CN', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1657', '1750817', 'CN', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1658', '1750818', 'CN', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;PCK/FBS/FPB /BBB 依据海航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1659', '1750819', 'CN', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据海航规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1660', '1750820', 'GX', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1661', '1750821', 'GX', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1662', '1750822', 'GX', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行	', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1663', '1750823', 'GX', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1664', '1750824', 'GX', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据北部湾航空规定执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1665', '1750825', 'GX', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据北部湾航空规定执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1666', '1750826', 'GX', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据北部湾航空规定执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1667', '1750827', 'GX', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据北部湾航空规定执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据北部湾航空规定执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1668', '1750828', 'DR', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1669', '1750829', 'DR', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的15.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的25.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1670', '1750830', 'DR', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1671', '1750831', 'DR', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1672', '1750832', 'GJ', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行	', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行	', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1673', '1750833', 'DR', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1674', '1750834', 'DR', 'X2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1675', '1750835', 'DR', 'X3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1676', '1750836', 'DR', 'X4', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1677', '1750837', 'G5', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1678', '1750839', 'G5', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;航班起飞前80元，航班起飞后150元', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;航班起飞前50元，航班起飞后100元', 'KWE-BFJ；BFJ-KWE；', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1679', '1750839', 'G5', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1680', '1750840', 'DR', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1681', '1750841', 'DZ', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1682', '1750842', 'GS', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1683', '1750843', '8L', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依产品规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1684', '1750844', 'JR', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1685', '1750844', 'JR', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依产品规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1686', '1750845', 'MU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1687', '1750845', 'MU', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价Q舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;4折以下T舱不改不退不签,特价Q舱以EI项备注为准，具体以航司审核为准。', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1688', '1750846', 'CZ', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体文件使用条件', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;具体文件使用条件', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1689', '1750847', 'JD', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1690', '1750848', 'GJ', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1691', '1750849', 'GJ', 'I2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1692', '1750850', 'PN', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1693', '1750851', 'GS', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1694', '1750852', 'JD', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1695', '1750853', 'FM', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1696', '1750853', 'FM', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价Q舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1697', '1750853', 'FM', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前7.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前7.0天到2.0小时（含）收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;4折以下T舱不改不退不签,特价Q舱以EI项备注为准，具体以航司审核为准。', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1698', '1750854', '3U', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1699', '1750854', '3U', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取T舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取T舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取T舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1700', '1750854', '3U', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取T舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取T舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取T舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1701', '1750855', '9C', 'S', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时（含）内收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1702', '1750856', '9C', 'V', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1703', '1750857', '9C', 'R1', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1704', '1750858', '9C', 'R2', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1705', '1750859', '9C', 'R3', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1706', '1750860', '9C', 'R4', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1707', '1750861', '9C', 'P', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1708', '1750862', '9C', 'P1', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1709', '1750863', '9C', 'P2', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1710', '1750864', 'KN', 'U', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1711', '1750865', 'MU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1712', '1750865', 'MU', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1713', '1750866', 'FM', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1714', '1750867', 'FM', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1715', '1750868', 'DZ', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1716', '1750869', 'DZ', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1717', '1750870', 'DZ', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1718', '1750871', 'HU', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;			', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;		', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1719', '1750872', 'BK', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;4折以下无论何时提出退票，收取票面价100%的退票费（T1舱退改规则以主舱位T舱为准）。', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的25.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1720', '1750873', 'CN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1721', '1750873', 'CN', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1722', '1750874', 'CN', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;FIC/FBS/PPB/FAG/FNP依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;FIC/FBS/PPB/FAG/FNP依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1723', '1750875', 'CN', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1724', '1750876', 'CN', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1725', '1750877', 'CN', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1726', '1750878', 'PN', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规定执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规定执行					', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1727', '1750879', 'PN', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规定执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规定执行					', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1728', '1750880', 'PN', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规定执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规定执行					', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1729', '1750881', 'GS', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1730', '1750881', 'GS', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1731', '1750882', 'GS', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据天航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1732', '1750882', 'GS', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1733', '1750883', 'GS', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据天航规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据天航规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1734', '1750884', 'QW', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1735', '1750884', 'QW', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;需升舱至全价改期', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1736', '1750885', 'DR', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按瑞丽航空规定执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按瑞丽航空规定执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1737', '1750886', 'BK', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1738', '1750887', 'BK', 'W2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1739', '1750888', 'SC', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1740', '1750889', 'SC', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1741', '1750889', 'SC', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;按照舱位折扣率对应舱位标准执行，就低原则。  40 折以下按照 Z 舱（40 折）标准执行 ', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1742', '1750889', 'SC', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1743', '1750890', 'FU', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1744', '1750891', 'Y8', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1745', '1750892', 'Y8', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;K/FBS/FPB  依据扬子江航空特殊舱位使用规定执行	', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;PCK/FBS/FPB  依据扬子江航空特殊舱位使用规定执行			', '适用全部航线', '2016-12-12 04:30:12', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1746', '1750893', 'Y8', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;依据产品规则执行			', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1747', '1750894', 'Y8', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;依据产品规则执行			', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1748', '1750895', 'Y8', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1749', '1750896', 'Y8', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1750', '1750897', 'Y8', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1751', '1750898', 'Y8', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1752', '1750899', 'Y8', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1753', '1750900', 'Y8', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1754', '1750901', 'Y8', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1755', '1750902', 'Y8', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1756', '1750903', 'Y8', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1757', '1750904', 'Y8', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1758', '1750905', 'Y8', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1759', '1750906', 'Y8', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1760', '1750907', 'Y8', 'R	', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1761', '1750908', 'Y8', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1762', '1750909', 'Y8', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1763', '1750910', 'Y8', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行			', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行			', '适用全部航线', '2016-12-12 04:30:12', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1764', '1750911', 'TV', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1765', '1750912', 'TV', 'U', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1766', '1750913', 'TV', 'D', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1767', '1750913', 'TV', 'D', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1768', '1750914', 'TV', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;若销售3折以上舱位运价，按该运价所对应的票价区间规定执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;若销售3折以上舱位运价，按该运价所对应的票价区间规定执行', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1769', '1750915', 'TV', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;若销售3折以上舱位运价，按该运价所对应的票价区间规定执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;若销售3折以上舱位运价，按该运价所对应的票价区间规定执行', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1770', '1750916', '8L', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1771', '1750917', '8L', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1772', '1750917', '8L', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1773', '1750918', '8L', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1774', '1750918', '8L', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1775', '1750919', '8L', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1776', '1750919', '8L', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的40.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1777', '1750920', '8L', 'D1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1778', '1750921', '8L', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1779', '1750922', '8L', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1780', '1750923', '8L', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1781', '1750924', 'QW', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1782', '1750925', 'QW', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1783', '1750925', 'QW', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1784', '1750926', 'GY', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后免收退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1785', '1750926', 'GY', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1786', '1750927', 'GY', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后免收退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1787', '1750927', 'GY', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外免收退票费,起飞前2.0小时以内及起飞后收取C舱全价票的5.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取C舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1788', '1750928', 'GY', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1789', '1750929', 'GY', 'O', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1790', '1750930', 'GY', 'W', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取W舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取W舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取W舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1791', '1750931', 'GY', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1792', '1750932', 'GY', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取B舱全价票的15.0%退票费,起飞前2.0小时以内及起飞后收取B舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取B舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取B舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1793', '1750933', 'GY', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取M舱全价票的15.0%退票费,起飞前2.0小时以内及起飞后收取M舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取M舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取M舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1794', '1750934', 'GY', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取H舱全价票的15.0%退票费,起飞前2.0小时以内及起飞后收取H舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取H舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取H舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1795', '1750935', 'GY', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取K舱全价票的15.0%退票费,起飞前2.0小时以内及起飞后收取K舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取K舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取K舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1796', '1750936', 'GY', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取L舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取L舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取L舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取L舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1797', '1750937', 'GY', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取J舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取J舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1798', '1750938', 'GY', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Q舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Q舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Q舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Q舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1799', '1750939', 'GY', 'R', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取R舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取R舱全价票的30.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取R舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取R舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1800', '1750940', 'GY', 'E', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取E舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取E舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取E舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1801', '1750941', 'GY', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取V舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取V舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取V舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1802', '1750942', 'GY', 'Z', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Z舱全价票的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Z舱全价票的30.0%改期费,起飞前2.0小时以内及起飞后收取Z舱全价票的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1803', '1750943', 'GY', 'I', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1804', '1750944', 'GY', 'U', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1805', '1750945', 'GY', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1806', '1750946', 'GY', 'D', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1807', '1750947', 'GY', 'S	', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1808', '1750948', 'GY', 'S', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1809', '1750949', 'GY', 'P', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1810', '1750950', 'GY', 'X', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1811', '1750951', 'GY', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;按对应的产品规定执行			', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;按对应的产品规定执行			', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1812', '1750952', 'UQ', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1813', '1750953', 'UQ', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1814', '1750954', 'UQ', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1815', '1750955', 'UQ', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1816', '1750956', 'UQ', 'J1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行					', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1817', '1750957', 'UQ', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行					', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1818', '1750958', 'UQ', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行					', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1819', '1750959', 'UQ', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行					', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1820', '1750960', 'UQ', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;按产品规则执行					', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;按产品规则执行					', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1821', '1750963', 'QW', 'E2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的80.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%改期费,起飞前2.0小时以内及起飞后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1822', '1750963', 'QW', 'E2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后收取 统一起飞前/后收取当前舱位票面价的80.0%退票费;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1823', '1750964', 'KY', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1824', '1750965', 'RY', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取F舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取F舱全价票的5.0%改期费;、≤3次，免费；＞3次，对应舱位等级全票价（F）的5%', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1825', '1750966', 'RY', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取J舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取J舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取J舱全价票的5.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（J）的5% ', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1826', '1750967', 'RY', 'Y', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的5.0%改期费;1、≤3次，免费；＞3次，对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1827', '1750968', 'RY', 'H', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（Y）的5% ', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1828', '1750969', 'RY', 'B', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1829', '1750970', 'RY', 'M', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;1、≤3次，免费；2、＞3次，对应舱位等级全票价（Y）的5%', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1830', '1750971', 'RY', 'L', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1831', '1750972', 'RY', 'K', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的5.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1832', '1750973', 'RY', 'N', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1833', '1750974', 'RY', 'Q', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1834', '1750975', 'RY', 'V', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1835', '1750976', 'RY', 'T', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取Y舱全价票的20.0%退票费,起飞前2.0小时以内及起飞后收取Y舱全价票的40.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外收取Y舱全价票的10.0%改期费,起飞前2.0小时以内及起飞后收取Y舱全价票的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1836', '1750977', 'QW', 'A1', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;以航司审核为准', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1837', '1750978', 'SC', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1838', '1750978', 'SC', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1839', '1750978', 'SC', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1840', '1750979', 'GJ', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1841', '1750979', 'GJ', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1842', '1750980', 'RY', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1843', '1750981', 'RY', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1844', '1750982', 'CA', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1845', '1750983', 'CA', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1846', '1750984', 'CA', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1847', '1750985', 'CA', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1848', '1750986', 'CA', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1849', '1750987', 'CA', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前免收退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1850', '1750988', 'CA', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1851', '1750989', 'CA', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的5.0%退票费,起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前免收改期费,起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1852', '1750990', 'CA', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1853', '1750991', 'CA', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1854', '1750992', 'CA', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1855', '1750993', 'CA', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1856', '1750994', 'CA', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1857', '1750995', 'CA', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1858', '1750996', 'ZH', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1859', '1750996', 'ZH', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1860', '1750997', 'ZH', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1861', '1750997', 'ZH', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1862', '1750998', 'ZH', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1863', '1750998', 'ZH', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1864', '1750999', 'ZH', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1865', '1750999', 'ZH', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1866', '1751000', 'ZH', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1867', '1751000', 'ZH', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1868', '1751001', 'ZH', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1869', '1751001', 'ZH', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1870', '1751002', 'ZH', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1871', '1751002', 'ZH', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1872', '1751003', 'ZH', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1873', '1751003', 'ZH', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1874', '1751004', 'ZH', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1875', '1751004', 'ZH', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1876', '1751005', 'ZH', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1877', '1751005', 'ZH', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1878', '1751006', 'ZH', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1879', '1751006', 'ZH', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1880', '1751007', 'ZH', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1881', '1751007', 'ZH', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1882', '1751008', 'CA', 'S1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;航司更新频繁，具体以航司规定为准', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1883', '1751008', 'CA', 'S1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1884', '1751009', 'CA', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;航司更新频繁，具体以航司规定为准', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1885', '1751009', 'CA', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1886', '1751010', 'CA', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;航司更新频繁，具体以航司规定为准', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1887', '1751011', 'FU', 'R2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1888', '1751012', 'GX', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1889', '1751013', 'JD', 'C2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1890', '1751014', 'CZ', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前2.0小时（含）以外收取A舱全价票的5.0%退票费,起飞前2.0小时以内及起飞后收取A舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取A舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1891', '1751014', 'CZ', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1892', '1751015', 'DZ', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1893', '1751017', 'SC', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1894', '1751017', 'SC', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的50.0%退票费,起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的30.0%改期费,起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1895', '1751018', 'ZH', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1896', '1751018', 'ZH', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1897', '1751024', 'ZH', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1898', '1751024', 'ZH', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1899', '1751025', 'ZH', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1900', '1751025', 'ZH', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1901', '1751026', 'ZH', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1902', '1751026', 'ZH', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1903', '1751028', 'KY', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1904', '1751028', 'KY', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1905', '1751029', 'KY', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1906', '1751029', 'KY', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1907', '1751029', 'KY', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1908', '1751029', 'KY', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1909', '1751030', 'KY', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1910', '1751030', 'KY', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1911', '1751031', 'KY', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1912', '1751031', 'KY', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1913', '1751032', 'KY', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1914', '1751032', 'KY', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1915', '1751033', 'KY', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1916', '1751033', 'KY', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1917', '1751033', 'KY', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1918', '1751033', 'KY', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1919', '1751036', 'CZ', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体文件使用条件', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;具体文件使用条件', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1920', '1751037', 'FU', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1921', '1751038', 'JD', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1922', '1751041', 'JD', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1923', '1751041', 'JD', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1924', '1751042', 'JD', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据产品规则执行', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1925', '1751043', 'JD', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1926', '1751043', 'JD', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1927', '1751043', 'JD', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1928', '1751044', 'JD', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1929', '1751045', 'JD', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1930', '1751046', 'JD', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的15.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1931', '1751046', 'JD', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1932', '1751047', 'JD', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据票面价所对仓位执行相应的客规', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据票面价所对仓位执行相应的客规', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1933', '1751048', 'SC', 'G1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1934', '1751049', 'SC', 'P1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1935', '1751050', 'SC', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1936', '1751052', 'JD', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据票面价所对仓位执行相应的客规', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据票面价所对仓位执行相应的客规', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1937', '1751053', 'JD', 'I2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据票面价所对仓位执行相应的客规', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;依据票面价所对仓位执行相应的客规', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1938', '1751054', 'KY', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1939', '1751054', 'KY', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1940', '1751055', 'KY', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1941', '1751055', 'KY', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1942', '1751056', 'KY', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1943', '1751056', 'KY', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1944', '1751057', 'KY', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1945', '1751057', 'KY', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1946', '1751058', 'KY', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1947', '1751058', 'KY', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1948', '1751059', 'FU', 'Y1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外免收改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1949', '1751060', 'FU', 'B1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1950', '1751061', 'FU', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1951', '1751062', 'FU', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1952', '1751063', 'FU', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1953', '1751064', 'FU', 'M2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1954', '1751065', 'FU', 'M3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1955', '1751066', 'FU', 'Q2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1956', '1751067', 'FU', 'Q3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1957', '1751068', 'FU', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1958', '1751069', 'FU', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1959', '1751070', 'FU', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1960', '1751071', 'FU', 'T1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1961', '1751072', 'FU', 'I1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1962', '1751073', 'FU', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1963', '1751074', 'FU', 'J1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1964', '1751075', 'FU', 'J2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1965', '1751076', 'FU', 'W1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1966', '1751077', 'FU', 'W2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:13', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('1967', '1751078', 'A6', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1968', '1751079', 'A6', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1969', '1751080', 'A6', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1970', '1751081', 'A6', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1971', '1751082', 'A6', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:13', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1972', '1751083', 'A6', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1973', '1751084', 'A6', 'O', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1974', '1751085', 'A6', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1975', '1751086', 'A6', 'G', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1976', '1751087', 'A6', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1977', '1751088', 'A6', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1978', '1751089', 'A6', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1979', '1751090', 'A6', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1980', '1751091', 'A6', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的60.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1981', '1751092', 'A6', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1982', '1751093', 'A6', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1983', '1751094', 'A6', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1984', '1751095', 'A6', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1985', '1751096', 'A6', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1986', '1751097', 'A6', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1987', '1751098', 'A6', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1988', '1751099', '9H', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1989', '1751100', '9H', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1990', '1751101', '9H', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1991', '1751102', '9H', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1992', '1751103', '9H', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1993', '1751104', '9H', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1994', '1751105', '9H', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1995', '1751106', '9H', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1996', '1751107', '9H', 'R', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1997', '1751108', '9H', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1998', '1751109', '9H', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('1999', '1751110', '9H', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2000', '1751111', '9H', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2001', '1751112', '9H', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2002', '1751113', '9H', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的25.0%退票费,起飞后收取当前舱位票面价的40.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的15.0%改期费,起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2003', '1751114', '9H', 'W', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2004', '1751115', '9H', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2005', '1751116', '9H', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2006', '1751117', '9H', 'I', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2007', '1751118', '9H', 'F1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2008', '1751119', '9H', 'C1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%退票费,起飞前2.0天（含）内收取当前舱位票面价的20.0%退票费,起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%改期费,起飞前2.0天（含）内收取当前舱位票面价的10.0%改期费,起飞后收取当前舱位票面价的15.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2009', '1751120', '9H', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2010', '1751121', '9H', 'J1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2011', '1751122', '9H', 'V', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2012', '1751123', '9H', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2013', '1751124', '9H', 'N', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2014', '1751125', '9H', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2015', '1751126', '9H', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2016', '1751127', 'HU', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2017', '1751128', 'HU', 'N2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2018', '1751129', 'A6', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;具体以航司审核为准！', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2019', '1751130', 'CN', 'N1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2020', '1751131', 'CN', 'N2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前4.0小时（含）以外收取当前舱位票面价的50.0%退票费,起飞前4.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前4.0小时（含）以外收取当前舱位票面价的30.0%改期费,起飞前4.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2021', '1751132', 'GJ', 'I3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2022', '1751133', 'JD', 'I3', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2023', '1751134', 'HO', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;官网特价舱位  参规定', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;官网特价舱位  参规定', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2024', '1751135', 'GJ', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2025', '1751136', 'GJ', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外免收改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2026', '1751137', 'GT', 'F', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2027', '1751138', 'GT', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2028', '1751139', 'GT', 'A', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2029', '1751140', 'GT', 'Y', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2030', '1751141', 'GT', 'B', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2031', '1751142', 'GT', 'H', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2032', '1751143', 'GT', 'K', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2033', '1751144', 'GT', 'M', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2034', '1751145', 'GT', 'L', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2035', '1751146', 'GT', 'Q', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2036', '1751147', 'GT', 'J', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2037', '1751148', 'GT', 'X', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2038', '1751149', 'GT', 'U', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2039', '1751150', 'GT', 'E', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前1.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前1.0天以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前1.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前1.0天以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2040', '1751151', 'GT', 'T', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2041', '1751152', 'GT', 'Z', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2042', '1751153', 'GT', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2043', '1751154', 'GT', 'S', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2044', '1751155', 'GT', 'C', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2045', '1751156', 'QW', 'D', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的30.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0小时（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2046', '1751157', 'G5', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2047', '1751158', 'G5', 'M1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2048', '1751159', 'G5', 'G1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2049', '1751160', 'G5', 'S1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的25.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的35.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2050', '1751161', 'G5', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的45.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的55.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2051', '1751162', 'G5', 'Q1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的45.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的55.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2052', '1751163', 'G5', 'E1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的45.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的55.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2053', '1751164', 'G5', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的45.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的55.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2054', '1751165', 'G5', 'R1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前12.0小时（含）以外收取当前舱位票面价的45.0%退票费,起飞前12.0小时以内及起飞后收取当前舱位票面价的55.0%退票费;', '按照当前舱位票面价收取变更费;起飞前12.0小时（含）以外收取当前舱位票面价的35.0%改期费,起飞前12.0小时以内及起飞后收取当前舱位票面价的45.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2055', '1751166', 'G5', 'O1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2056', '1751167', 'TV', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;具体以航司审核为准', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2057', '1751167', 'TV', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取C舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取C舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;起飞前1.0天（含）以外免收改期费,起飞前1.0天以内及起飞后收取C舱全价票的5.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2058', '1751168', 'GJ', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2059', '1751169', 'GJ', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2060', '1751170', 'GJ', 'G1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2061', '1751171', 'GJ', 'V1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2062', '1751172', 'GJ', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2063', '1751173', 'GJ', 'U1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2064', '1751174', 'JR', 'F', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取F舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2065', '1751175', 'JR', 'A', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;依据产品规则执行', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2066', '1751176', 'JR', 'C', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;起飞前1.0天（含）以外收取F舱全价票的5.0%退票费,起飞前1.0天以内及起飞后收取F舱全价票的10.0%退票费;', '按照对应舱位等级全价收取变更费;统一起飞前/后免收改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2067', '1751177', 'JR', 'J', '取消座位时间计算手续费;按照对应舱位等级全价收取退票费;统一起飞前/后不得退票;', '按照对应舱位等级全价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2068', '1751178', 'GX', 'Z1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2069', '1751179', 'GX', 'P', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2070', '1751180', 'JD', 'I4', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2071', '1751181', 'BK', 'D1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2072', '1751183', 'GJ', 'Q1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2073', '1751184', 'KY', 'L1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2074', '1751185', 'KY', 'L2', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2075', '1751186', 'A6', 'P', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2076', '1751186', 'A6', 'P', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2077', '1751187', 'CZ', 'P', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2078', '1751188', 'JD', 'V3', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2079', '1751189', 'KY', 'Z2', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2080', '1751190', 'JD', 'V2', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2081', '1751191', 'JD', 'V1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2082', '1751192', 'KY', 'Z1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2083', '1751193', 'KY', 'J1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2084', '1751194', 'KY', 'J2', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2085', '1751195', 'KY', 'E1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2086', '1751196', 'JD', 'V4', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2087', '1751197', 'KY', 'E2', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2088', '1751198', 'GJ', 'X', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2089', '1751200', 'DR', 'Q', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2090', '1751201', '3U', 'H4', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2091', '1751202', 'AQ', 'Y', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2092', '1751203', 'AQ', 'E', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2093', '1751204', 'AQ', 'Z', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2094', '1751205', 'QW', 'I1', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2095', '1751206', 'QW', 'R2', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2096', '1751207', '3U', 'L4', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2097', '1751208', '3U', 'E4', '提交退票时间计算手续费;按照当前舱位票面价收取退票费;统一起飞前/后不得退票;', '按照当前舱位票面价收取变更费;统一起飞前/后不得改期;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2098', '1751209', 'GX', 'E1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2099', '1751210', 'GX', 'U1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2100', '1751211', 'GX', 'X1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的30.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的50.0%退票费,起飞前2.0小时以内及起飞后不得退票;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '1');
INSERT INTO `tuigaiqianzhengce` VALUES ('2101', '1751212', 'GX', 'L1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2102', '1751213', 'GX', 'K1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2103', '1751214', 'GX', 'H1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的20.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的40.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的50.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外收取当前舱位票面价的10.0%改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的30.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的40.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2104', '1751216', 'GX', 'Y1', '取消座位时间计算手续费;按照当前舱位票面价收取退票费;起飞前2.0天（含）以外收取当前舱位票面价的5.0%退票费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的10.0%退票费,起飞前2.0小时以内及起飞后收取当前舱位票面价的20.0%退票费;', '按照当前舱位票面价收取变更费;起飞前2.0天（含）以外免收改期费,起飞前2.0天到2.0小时（含）收取当前舱位票面价的5.0%改期费,起飞前2.0小时以内及起飞后收取当前舱位票面价的10.0%改期费;', '适用全部航线', '2016-12-12 04:30:14', '0');
INSERT INTO `tuigaiqianzhengce` VALUES ('2105', '1751217', 'GX', 'C1', '具体客规以航司审核为准', '具体客规以航司审核为准', '适用全部航线', '2016-12-12 04:30:14', '0');

-- ----------------------------
-- Table structure for tuipiao
-- ----------------------------
DROP TABLE IF EXISTS `tuipiao`;
CREATE TABLE `tuipiao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shenqinghao` varchar(60) DEFAULT NULL COMMENT '申请号',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `hangchengid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `hangchenglvkeid` bigint(20) DEFAULT NULL COMMENT '航程旅客id',
  `shenqingriqi` datetime DEFAULT NULL COMMENT '申请日期',
  `tuipiaoleixing` tinyint(1) DEFAULT NULL COMMENT '退票类型',
  `caozuoyuanid` bigint(20) DEFAULT NULL COMMENT '操作员id',
  `caozuoshijian` datetime DEFAULT NULL COMMENT '操作时间',
  `wanchengshijian` datetime DEFAULT NULL COMMENT '完成时间',
  `tuipiaoyuanyin` text COMMENT '退票原因',
  `fujian` text COMMENT '附件',
  `beizhu` text COMMENT '备注',
  `chulizhuangtai` int(11) DEFAULT NULL COMMENT '处理状态',
  `suodan` tinyint(1) DEFAULT NULL COMMENT '锁单',
  `suodanid` bigint(20) DEFAULT NULL COMMENT '锁单id',
  `suodanshijian` datetime DEFAULT NULL COMMENT '锁单时间',
  `tuipiaojine` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `hangchengid` (`hangchengid`) USING BTREE,
  KEY `hangchenglvkeid` (`hangchenglvkeid`) USING BTREE,
  KEY `shenqingriqi` (`shenqingriqi`) USING BTREE,
  KEY `caozuoyuanid` (`caozuoyuanid`) USING BTREE,
  KEY `caozuoshijian` (`caozuoshijian`) USING BTREE,
  KEY `wanchengshijian` (`wanchengshijian`) USING BTREE,
  KEY `chulizhuangtai` (`chulizhuangtai`) USING BTREE,
  KEY `suodanid` (`suodanid`) USING BTREE,
  KEY `suodanshijian` (`suodanshijian`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuipiao
-- ----------------------------
INSERT INTO `tuipiao` VALUES ('1', 'TP201612101729561', '28', '13', '15', '2016-12-10 17:29:56', '1', null, null, null, '航班取消、提前、延误或航程改变', null, '', '0', '1', '7', '2016-12-10 17:30:33', null);
INSERT INTO `tuipiao` VALUES ('2', 'TP201612101813172', '25', '9', '9', '2016-12-10 18:13:17', '1', null, null, null, '航班取消、提前、延误或航程改变', null, 'aa', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('3', 'TP201612121055053', '26', '10', '10', '2016-12-12 10:55:05', '1', null, null, null, '航班取消、提前、延误或航程改变', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('4', 'TP201612121227474', '30', '15', '21', '2016-12-12 12:27:47', '1', null, null, null, '因病无法乘机', null, 'dgg', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('5', 'TP201612121302355', '30', '15', '23', '2016-12-12 13:02:35', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('6', 'TP201612121313226', '30', '15', '22', '2016-12-12 13:13:22', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('7', 'TP201612121315207', '30', '15', '21', '2016-12-12 13:15:20', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('8', 'TP201612121315208', '30', '15', '22', '2016-12-12 13:15:20', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('9', 'TP201612121315209', '30', '15', '23', '2016-12-12 13:15:20', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('10', 'TP2016121215221910', '30', '15', '21', '2016-12-12 15:22:19', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('11', 'TP2016121215221911', '30', '15', '22', '2016-12-12 15:22:19', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('12', 'TP2016121215221912', '30', '15', '23', '2016-12-12 15:22:19', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('13', 'TP2016121215234413', '30', '15', '21', '2016-12-12 15:23:44', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('14', 'TP2016121215234414', '30', '15', '22', '2016-12-12 15:23:44', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('15', 'TP2016121215234415', '30', '15', '23', '2016-12-12 15:23:44', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('16', 'TP2016121215281016', '30', '15', '21', '2016-12-12 15:28:10', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('17', 'TP2016121215281017', '30', '15', '22', '2016-12-12 15:28:10', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('18', 'TP2016121215281018', '30', '15', '23', '2016-12-12 15:28:10', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('19', 'TP2016121215370919', '30', '15', '21', '2016-12-12 15:37:09', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('20', 'TP2016121215370920', '30', '15', '22', '2016-12-12 15:37:09', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('21', 'TP2016121215370921', '30', '15', '23', '2016-12-12 15:37:09', '1', null, null, null, '因病无法乘机', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('22', 'TP2016121215405322', '30', '15', '21', '2016-12-12 15:40:53', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('23', 'TP2016121215531823', '30', '15', '21', '2016-12-12 15:53:18', '0', null, null, null, '我办理了升舱', null, '', '0', null, null, null, null);
INSERT INTO `tuipiao` VALUES ('24', 'TP2016121217004724', '30', '15', '21', '2016-12-12 17:00:47', '1', null, null, null, '名字错误，换开重出，新票已使用', null, 'aa', '0', null, null, null, null);

-- ----------------------------
-- Table structure for tuipiaoxize
-- ----------------------------
DROP TABLE IF EXISTS `tuipiaoxize`;
CREATE TABLE `tuipiaoxize` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tuipiaoid` bigint(20) DEFAULT NULL COMMENT '退票id',
  `hangchengid` bigint(20) DEFAULT NULL COMMENT '航程id',
  `dingdanid` bigint(20) DEFAULT NULL COMMENT '订单id',
  `tuipiaozhangshu` int(11) DEFAULT NULL COMMENT '退票张数',
  `tuipiaojine` double DEFAULT NULL COMMENT '退票金额',
  `tuipiaoshijian` datetime DEFAULT NULL COMMENT '退票时间',
  PRIMARY KEY (`id`),
  KEY `tuipiaoid` (`tuipiaoid`) USING BTREE,
  KEY `hangchengid` (`hangchengid`) USING BTREE,
  KEY `dingdanid` (`dingdanid`) USING BTREE,
  KEY `tuipiaozhangshu` (`tuipiaozhangshu`) USING BTREE,
  KEY `tuipiaoshijian` (`tuipiaoshijian`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuipiaoxize
-- ----------------------------

-- ----------------------------
-- Table structure for yewu
-- ----------------------------
DROP TABLE IF EXISTS `yewu`;
CREATE TABLE `yewu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sanfanggongsiid` bigint(20) DEFAULT NULL COMMENT '三方公司id',
  `yewumingcheng` varchar(60) DEFAULT NULL COMMENT '业务名称',
  PRIMARY KEY (`id`),
  KEY `sanfanggongsiid` (`sanfanggongsiid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yewu
-- ----------------------------

-- ----------------------------
-- Table structure for yonghu
-- ----------------------------
DROP TABLE IF EXISTS `yonghu`;
CREATE TABLE `yonghu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zhanghu` varchar(60) DEFAULT NULL COMMENT '账户',
  `mima` varchar(60) DEFAULT NULL COMMENT '密码',
  `xingming` varchar(60) DEFAULT NULL COMMENT '姓名',
  `xingbie` char(2) DEFAULT NULL,
  `youxiang` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `shoujihaoma` varchar(60) DEFAULT NULL COMMENT '手机号码',
  `chushengriqi` datetime DEFAULT NULL COMMENT '出生日期',
  `zhuceriqi` datetime DEFAULT NULL COMMENT '注册日期',
  `zhifufangshi` int(11) DEFAULT NULL COMMENT '支付方式',
  `beizhu` text COMMENT '备注',
  `zhucelaiyuan` int(11) DEFAULT NULL COMMENT '注册来源',
  `dengluriqi` datetime DEFAULT NULL COMMENT '登录日期',
  `OpenidQQ` varchar(60) DEFAULT NULL COMMENT 'OpenidQQ',
  `OpenidWX` varchar(60) DEFAULT NULL COMMENT 'OpenidWX',
  `UnionidWX` varchar(60) DEFAULT NULL COMMENT 'UnionidWX',
  `OpenidXM` varchar(60) DEFAULT NULL COMMENT 'OpenidXM',
  `chengshiip` varchar(60) DEFAULT NULL COMMENT '城市ip',
  PRIMARY KEY (`id`),
  KEY `chushengriqi` (`chushengriqi`) USING BTREE,
  KEY `zhuceriqi` (`zhuceriqi`) USING BTREE,
  KEY `zhifufangshi` (`zhifufangshi`) USING BTREE,
  KEY `zhucelaiyuan` (`zhucelaiyuan`) USING BTREE,
  KEY `dengluriqi` (`dengluriqi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yonghu
-- ----------------------------
INSERT INTO `yonghu` VALUES ('1', '18688950231', '21yuan22yyuan', '王西方', null, null, '12345678901', null, '2016-12-04 04:10:39', null, null, null, '2016-12-08 15:44:26', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('2', '13302969813', 'sz518034', '吴克武', null, null, '13302969813', null, '2016-12-05 11:21:15', null, null, '1', '2016-12-09 12:42:49', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('3', '13273890941', 'a12345678', 'gao', '男', null, '13273890941', null, '2016-12-05 13:31:37', null, null, null, '2016-12-12 17:15:22', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('4', '13418595594', 'abc123456', '侯金良', null, null, '13418595594', null, '2016-12-05 17:31:59', null, null, null, '2016-12-08 15:44:37', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('5', '18948788167', 'sz518034', '深航旅', null, null, '18948788167', null, '2016-12-06 09:53:53', null, null, null, '2016-12-08 15:44:34', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('6', '15810224468', '15810224468', '张子原', null, null, '15810224468', null, '2016-12-06 16:45:35', null, null, '1', '2016-12-12 11:35:30', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('7', '18002512462', '@bibi321', '刘家锦', null, null, '13631607260', null, '2016-12-06 16:56:04', null, null, null, '2016-12-08 15:44:35', null, null, null, null, null);
INSERT INTO `yonghu` VALUES ('8', null, null, '汤明', null, null, '18306668806', null, '2016-12-06 17:19:18', null, null, null, null, null, 'oD1n9jtpgsiQra1heDsgxzUHY2ws', null, null, null);
INSERT INTO `yonghu` VALUES ('9', null, null, 'liupan', null, null, '15118095706', null, '2016-12-06 17:34:49', null, null, null, null, null, 'oD1n9jnA9tNxlMCQCvvvUT1cDKQI', null, null, null);
INSERT INTO `yonghu` VALUES ('10', null, null, 'li/ming', null, null, '15118095706', null, '2016-12-06 17:53:27', null, null, null, null, null, 'oD1n9jioIcu2fJwQArM30p5-Vids', null, null, null);

-- ----------------------------
-- Table structure for yonghudizhi
-- ----------------------------
DROP TABLE IF EXISTS `yonghudizhi`;
CREATE TABLE `yonghudizhi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) DEFAULT NULL COMMENT '用户id',
  `shoujianrenmingzi` varchar(60) DEFAULT NULL,
  `sheng` varchar(60) DEFAULT NULL COMMENT '省',
  `cheng` varchar(60) DEFAULT NULL COMMENT '城',
  `qu\xian` varchar(60) DEFAULT NULL COMMENT '区县',
  `dizhi` text COMMENT '地址',
  `youbian` varchar(60) DEFAULT NULL COMMENT '邮编',
  `shoujihao` varchar(60) DEFAULT NULL COMMENT '手机号',
  `lianxidianhua` varchar(60) DEFAULT NULL COMMENT '联系电话',
  `beizhu` text COMMENT '备注',
  PRIMARY KEY (`id`),
  KEY `yonghuid` (`yonghuid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yonghudizhi
-- ----------------------------
INSERT INTO `yonghudizhi` VALUES ('1', '3', 'sahdkas', null, null, null, 'scd', null, '13273890941', null, null);
INSERT INTO `yonghudizhi` VALUES ('2', '6', '李四', null, null, null, '广东省深圳市罗湖区桃园路', null, '15810224468', null, null);

-- ----------------------------
-- Table structure for yonghufapiao
-- ----------------------------
DROP TABLE IF EXISTS `yonghufapiao`;
CREATE TABLE `yonghufapiao` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `yonghuid` bigint(20) DEFAULT NULL COMMENT '用户id',
  `fapiao` varchar(60) DEFAULT NULL COMMENT '发票',
  `dingdan` bigint(20) DEFAULT NULL COMMENT '订单',
  `fapiaoleixing` tinyint(1) DEFAULT NULL COMMENT '发票类型',
  PRIMARY KEY (`id`),
  KEY `yonghuid` (`yonghuid`) USING BTREE,
  KEY `dingdan` (`dingdan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yonghufapiao
-- ----------------------------

-- ----------------------------
-- Procedure structure for member_authorize
-- ----------------------------
DROP PROCEDURE IF EXISTS `member_authorize`;
DELIMITER ;;
CREATE DEFINER=`hanglv`@`%` PROCEDURE `member_authorize`(IN `pName` VARCHAR(50) CHARSET utf8)
    NO SQL
BEGIN
	SELECT `ID`,`Username`,`Password`, `Mobile`, `Email`, `Nickname`, `Name`, `Gender`, `MembCardNo`, `CreationTime` FROM `member` WHERE (`Mobile` = pName OR `Email` = pName) AND `Status` = 0;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for f_fristPinyin
-- ----------------------------
DROP FUNCTION IF EXISTS `f_fristPinyin`;
DELIMITER ;;
CREATE DEFINER=`root`@`%` FUNCTION `f_fristPinyin`(P_NAME VARCHAR(255)) RETURNS varchar(255) CHARSET utf8
    NO SQL
BEGIN
	    DECLARE V_RETURN VARCHAR(255);
	    SET V_RETURN = ELT(INTERVAL(CONV(HEX(LEFT(CONVERT(P_NAME USING gbk),1)),16,10), 
		0xB0A1,0xB0C5,0xB2C1,0xB4EE,0xB6EA,0xB7A2,0xB8C1,0xB9FE,0xBBF7, 
		0xBFA6,0xC0AC,0xC2E8,0xC4C3,0xC5B6,0xC5BE,0xC6DA,0xC8BB,
		0xC8F6,0xCBFA,0xCDDA,0xCEF4,0xD1B9,0xD4D1),    
	    'A','B','C','D','E','F','G','H','J','K','L','M','N','O','P','Q','R','S','T','W','X','Y','Z');
	    
	    IF P_NAME ='重庆' THEN SET V_RETURN = 'C'; END IF;
	    IF P_NAME ='栟茶' THEN SET V_RETURN = 'B'; END IF;
	    	    
	    RETURN V_RETURN;
    END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for f_pinyin
-- ----------------------------
DROP FUNCTION IF EXISTS `f_pinyin`;
DELIMITER ;;
CREATE DEFINER=`root`@`%` FUNCTION `f_pinyin`(P_NAME VARCHAR(255)) RETURNS varchar(255) CHARSET utf8
    NO SQL
BEGIN
    DECLARE V_COMPARE VARCHAR(255);
    DECLARE V_RETURN VARCHAR(255);
    DECLARE I INT;
    SET I = 1;
    SET V_RETURN = '';
    WHILE I < LENGTH(P_NAME) DO
        SET V_COMPARE = SUBSTR(P_NAME, I, 1);
        IF (V_COMPARE != '') THEN
            #SET V_RETURN = CONCAT(V_RETURN, ',', V_COMPARE);
            SET V_RETURN = CONCAT(V_RETURN, f_fristPinyin(V_COMPARE));
            #SET V_RETURN = f_fristPinyin(V_COMPARE);
        END IF;
        SET I = I + 1;
    END WHILE;
    IF (ISNULL(V_RETURN) OR V_RETURN = '') THEN
        SET V_RETURN = P_NAME;
    END IF;
    
    IF P_NAME ='重庆' THEN SET V_RETURN = 'CQ'; END IF;	
    
    RETURN V_RETURN;
END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for eventEvery5Mins
-- ----------------------------
DROP EVENT IF EXISTS `eventEvery5Mins`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `eventEvery5Mins` ON SCHEDULE EVERY 5 MINUTE STARTS '2016-01-19 13:55:40' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	SET @sysConfigFile = '/bibi321/www/config/config.xml';
	SET @sysConfigStr  = CONVERT(LOAD_FILE(@sysConfigFile) USING latin1);
	SET @sysConfigStr  = LOWER(@sysConfigStr);
	SET @duration      = EXTRACTVALUE(@sysConfigStr, '/system/duration');
   SET @timeout = EXTRACTVALUE(@sysConfigStr, '/system/agenttimeout');
	
	IF (@duration > 5 AND @duration < 100) THEN
     delete from RouteBestPrice where LastTime<date_sub(now(), interval (@duration - 5) MINUTE);
     delete from FlightBestPrice where LastTime<date_sub(now(), interval (@duration - 5) MINUTE); 
     delete from AirlinePrice where LastTime<date_sub(now(), interval (@duration - 5) MINUTE);
   END IF;
   IF (@timeout < 1 OR @timeout > 20) THEN
     SET @timeout = 5;
   END IF;
   UPDATE nodestatus SET AgentNodeID="" WHERE LastAgentTime<date_sub(now(), interval (@timeout) MINUTE) and AgentNodeID!="";
   UPDATE nodestatus SET AgentNodeID="",Status=1 WHERE StatusTime<date_sub(now(), interval (@timeout) MINUTE) and Status=0;

END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for eventEveryDawn
-- ----------------------------
DROP EVENT IF EXISTS `eventEveryDawn`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `eventEveryDawn` ON SCHEDULE EVERY 1 DAY STARTS '2016-03-03 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	SET @sysConfigFile = '/bibi321/www/config/config.xml';
	SET @sysConfigStr  = CONVERT(LOAD_FILE(@sysConfigFile) USING latin1);
	SET @sysConfigStr  = LOWER(@sysConfigStr);
	SET @continousDays = EXTRACTVALUE(@sysConfigStr, '/system/continousdays');
	SET @afterDays     = EXTRACTVALUE(@sysConfigStr, '/system/afterdays');
	INSERT INTO error_log VALUES(0, NOW(), CONCAT("afterDays=", @afterDays, "  continousDays=", @continousDays), "eventEveryDawn", "None");
	IF (@afterDays >= 0 AND @afterDays < 30 AND @continousDays > 0 AND @continousDays < 91) THEN
	  CALL procGenUsefulLine(@afterDays, @continousDays);
	END IF;
	
	DELETE FROM excludeline WHERE DepDate <= now();
END
;;
DELIMITER ;
