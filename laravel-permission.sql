/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : laravel-permission

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 17/02/2020 14:41:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for icons
-- ----------------------------
DROP TABLE IF EXISTS `icons`;
CREATE TABLE `icons`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unicode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'unicode 字符',
  `class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '类名',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 141 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of icons
-- ----------------------------
INSERT INTO `icons` VALUES (102, '&#xe62f;', 'layui-icon-upload-circle', '上传-圆圈', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (101, '&#xe630;', 'layui-icon-templeate-1', '选择模板', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (100, '&#xe631;', 'layui-icon-util', '工具', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (99, '&#xe632;', 'layui-icon-layouts', '布局', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (98, '&#xe633;', 'layui-icon-prev-circle', '翻页', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (97, '&#xe634;', 'layui-icon-carousel', '轮播组图', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (96, '&#xe635;', 'layui-icon-code-circle', '代码-圆圈', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (95, '&#xe636;', 'layui-icon-water', '水 下雨', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (94, '&#xe637;', 'layui-icon-date', '日期', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (93, '&#xe638;', 'layui-icon-layer', '窗口', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (92, '&#xe639;', 'layui-icon-fonts-clear', '文字格式化', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (91, '&#xe63a;', 'layui-icon-dialogue', '聊天 对话 沟通', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (90, '&#xe63b;', 'layui-icon-cellphone-fine', '手机-细体', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (89, '&#xe63c;', 'layui-icon-form', '表单', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (88, '&#xe640;', 'layui-icon-delete', '删除', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (87, '&#xe641;', 'layui-icon-share', '分享', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (86, '&#xe642;', 'layui-icon-edit', '编辑', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (85, '&#xe63f;', 'layui-icon-circle', '单选框-候选', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (84, '&#xe643;', 'layui-icon-radio', '单选框-选中', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (83, '&#xe62a;', 'layui-icon-tabs', 'Tabs 选项卡', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (82, '&#xe644;', 'layui-icon-fonts-i', '字体-斜体', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (81, '&#xe646;', 'layui-icon-fonts-u', '字体-下划线', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (80, '&#xe647;', 'layui-icon-align-center', '居中对齐', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (79, '&#xe648;', 'layui-icon-align-right', '右对齐', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (78, '&#xe649;', 'layui-icon-align-left', '左对齐', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (77, '&#xe650;', 'layui-icon-face-smile-b', '表情-笑-粗', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (76, '&#xe64c;', 'layui-icon-link', '链接', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (75, '&#xe64a;', 'layui-icon-picture', '图片', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (74, '&#xe64d;', 'layui-icon-unlink', '删除链接', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (73, '&#xe62b;', 'layui-icon-fonts-strong', '字体加粗', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (72, '&#xe64b;', 'layui-icon-fonts-html', 'HTML', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (71, '&#xe64e;', 'layui-icon-fonts-code', '代码', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (70, '&#xe64f;', 'layui-icon-fonts-del', '删除线', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (69, '&#xe645;', 'layui-icon-speaker', '消息-通知-喇叭', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (68, '&#xe688;', 'layui-icon-voice', '语音-声音', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (67, '&#xe6ed;', 'layui-icon-video', '视频', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (66, '&#xe6fc;', 'layui-icon-headset', '音频-耳机', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (65, '&#xe651;', 'layui-icon-pause', '暂停', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (64, '&#xe652;', 'layui-icon-play', '播放', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (63, '&#xe654;', 'layui-icon-add-1', '添加', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (62, '&#xe63e;', 'layui-icon-loading-1', 'loading', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (61, '&#xe63d;', 'layui-icon-loading', 'loading', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (60, '&#xe670;', 'layui-icon-find-fill', '发现-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (59, '&#xe770;', 'layui-icon-user', '用户', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (58, '&#xe655;', 'layui-icon-file-b', '文件-粗', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (57, '&#xe857;', 'layui-icon-component', '组件', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (56, '&#xe601;', 'layui-icon-download-circle', '下载-圆圈', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (55, '&#xe67c;', 'layui-icon-upload', '上传-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (54, '&#xe681;', 'layui-icon-upload-drag', '上传-空心-拖拽', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (53, '&#xe65a;', 'layui-icon-prev', '上一页', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (52, '&#xe65b;', 'layui-icon-next', '下一页', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (51, '&#xe657;', 'layui-icon-cart', '购物车', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (50, '&#xe698;', 'layui-icon-cart-simple', '购物车', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (49, '&#xe69c;', 'layui-icon-face-cry', '表情-哭泣', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (48, '&#xe6af;', 'layui-icon-face-smile', '表情-微笑', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (47, '&#xe6b2;', 'layui-icon-survey', '调查', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (46, '&#xe705;', 'layui-icon-read', '办公-阅读', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (45, '&#xe715;', 'layui-icon-location', '位置-地图', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (44, '&#xe65c;', 'layui-icon-return', '返回', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (43, '&#xe756;', 'layui-icon-fire', '火', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (42, '&#xe735;', 'layui-icon-diamond', '钻石-等级', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (41, '&#xe659;', 'layui-icon-dollar', '金额-美元', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (40, '&#xe65e;', 'layui-icon-rmb', '金额-人民币', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (39, '&#xe671;', 'layui-icon-more-vertical', '菜单-垂直', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (38, '&#xe65f;', 'layui-icon-more', '菜单-水平', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (37, '&#xe65d;', 'layui-icon-camera-fill', '相机-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (36, '&#xe660;', 'layui-icon-camera', '相机-空心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (35, '&#xe661;', 'layui-icon-female', '女', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (34, '&#xe662;', 'layui-icon-male', '男', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (33, '&#xe6c5;', 'layui-icon-tread', '踩', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (32, '&#xe6c6;', 'layui-icon-praise', '赞', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (31, '&#xe663;', 'layui-icon-template', '模板', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (30, '&#xe653;', 'layui-icon-app', '应用', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (29, '&#xe656;', 'layui-icon-template-1', '模板', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (28, '&#xe716;', 'layui-icon-set', '设置-空心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (27, '&#xe664;', 'layui-icon-face-surprised', '表情-惊讶', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (26, '&#xe665;', 'layui-icon-console', '控制台', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (25, '&#xe7ae;', 'layui-icon-website', '网站', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (24, '&#xe667;', 'layui-icon-notice', '消息-通知', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (23, '&#xe66a;', 'layui-icon-theme', '主题', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (22, '&#xe66c;', 'layui-icon-flag', '旗帜', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (21, '&#xe666;', 'layui-icon-refresh-1', '刷新', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (20, '&#xe669;', 'layui-icon-refresh', '刷新', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (19, '&#xe674;', 'layui-icon-senior', '高级', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (18, '&#xe68e;', 'layui-icon-home', '主页', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (17, '&#xe66e;', 'layui-icon-note', '便签', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (16, '&#xe702;', 'layui-icon-tips', '提示说明', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (15, '&#xe6b1;', 'layui-icon-snowflake', '雪花', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (14, '&#xe668;', 'layui-icon-shrink-right', '右向左伸缩菜单', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (13, '&#xe66b;', 'layui-icon-spread-left', '左向右伸缩菜单', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (12, '&#xe672;', 'layui-icon-auz', '授权', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (11, '&#xe9aa;', 'layui-icon-refresh-3', '刷新-粗', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (10, '&#xe66f;', 'layui-icon-username', '用户名', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (9, '&#xe673;', 'layui-icon-password', '密码', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (8, '&#xe675;', 'layui-icon-login-weibo', '微博', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (7, '&#xe676;', 'layui-icon-login-qq', 'QQ', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (6, '&#xe677;', 'layui-icon-login-wechat', '微信', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (5, '&#xe679;', 'layui-icon-vercode', '验证码', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (4, '&#xe678;', 'layui-icon-cellphone', '手机', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (3, '&#xe67a;', 'layui-icon-rate-solid', '星星-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (2, '&#xe67b;', 'layui-icon-rate', '星星-空心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (1, '&#xe6c9;', 'layui-icon-rate-half', '半星', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (103, '&#xe62e;', 'layui-icon-tree', '树', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (104, '&#xe62d;', 'layui-icon-table', '表格', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (105, '&#xe62c;', 'layui-icon-chart', '图表', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (106, '&#xe629;', 'layui-icon-chart-screen', '图标 报表 屏幕', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (107, '&#xe628;', 'layui-icon-engine', '引擎', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (108, '&#xe625;', 'layui-icon-triangle-d', '下三角', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (109, '&#xe623;', 'layui-icon-triangle-r', '右三角', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (110, '&#xe621;', 'layui-icon-file', '文件', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (111, '&#xe620;', 'layui-icon-set-sm', '设置-小型', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (112, '&#xe61f;', 'layui-icon-add-circle', '添加-圆圈', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (113, '&#xe61c;', 'layui-icon-404', '404', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (114, '&#xe60b;', 'layui-icon-about', '关于', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (115, '&#xe619;', 'layui-icon-up', '箭头 向上', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (116, '&#xe61a;', 'layui-icon-down', '箭头 向下', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (117, '&#xe603;', 'layui-icon-left', '箭头 向左', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (118, '&#xe602;', 'layui-icon-right', '箭头 向右', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (119, '&#xe617;', 'layui-icon-circle-dot', '圆点', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (120, '&#xe615;', 'layui-icon-search', '搜索', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (121, '&#xe614;', 'layui-icon-set-fill', '设置-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (122, '&#xe613;', 'layui-icon-group', '群组', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (123, '&#xe612;', 'layui-icon-friends', '好友', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (124, '&#xe611;', 'layui-icon-reply-fill', '回复 评论 实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (125, '&#xe60f;', 'layui-icon-menu-fill', '菜单 隐身 实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (126, '&#xe60e;', 'layui-icon-log', '记录', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (127, '&#xe60d;', 'layui-icon-picture-fine', '图片-细体', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (128, '&#xe60c;', 'layui-icon-face-smile-fine', '表情-笑-细体', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (129, '&#xe60a;', 'layui-icon-list', '列表', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (130, '&#xe609;', 'layui-icon-release', '发布 纸飞机', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (131, '&#xe605;', 'layui-icon-ok', '对 OK', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (132, '&#xe607;', 'layui-icon-help', '帮助', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (133, '&#xe606;', 'layui-icon-chat', '客服', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (134, '&#xe604;', 'layui-icon-top', 'top 置顶', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (135, '&#xe600;', 'layui-icon-star', '收藏-空心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (136, '&#xe658;', 'layui-icon-star-fill', '收藏-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (137, '&#x1007;', 'layui-icon-close-fill', '关闭-实心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (138, '&#x1006;', 'layui-icon-close', '关闭-空心', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (139, '&#x1005;', 'layui-icon-ok-circle', '正确', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');
INSERT INTO `icons` VALUES (140, '&#xe608;', 'layui-icon-add-circle-fine', '添加-圆圈-细体', 0, '2018-11-15 17:34:06', '2018-11-15 17:34:06');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消息标题',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '消息内容',
  `read` int(11) NOT NULL DEFAULT 1 COMMENT '1-未读，2-已读',
  `send_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '消息发送者ID，1表示系统发送',
  `accept_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '消息接收者ID',
  `flag` int(11) NOT NULL COMMENT '消息对应关系：12-系统推送给后台，13-系统推送给前台,22-后台推送给后台，23-后台推送给前台，32-前台推送给后台，33-前台推送给前台，',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2018_12_07_173625_create_icons_table', 1);
INSERT INTO `migrations` VALUES (2, '2018_12_07_173625_create_messages_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_12_07_173625_create_model_has_permissions_table', 1);
INSERT INTO `migrations` VALUES (4, '2018_12_07_173625_create_model_has_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2018_12_07_173625_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (6, '2018_12_07_173625_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (7, '2018_12_07_173625_create_role_has_permissions_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_12_07_173625_create_roles_table', 1);
INSERT INTO `migrations` VALUES (9, '2018_12_07_173625_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (10, '2018_12_07_173625_create_users_table', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (4, 'App\\Models\\User', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `route` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon_id` int(11) NULL DEFAULT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (14, 'system.permission.create', '添加权限', 'admin.permission.create', 1, 'web', 13, NULL, '2018-12-05 11:52:20', '2018-12-05 11:53:01');
INSERT INTO `permissions` VALUES (13, 'system.permission', '权限管理', 'admin.permission', 12, 'web', 1, NULL, '2018-12-05 11:52:22', '2018-12-05 11:52:58');
INSERT INTO `permissions` VALUES (12, 'system.role.permission', '分配权限', 'admin.role.permission', 1, 'web', 8, NULL, '2018-12-05 11:52:18', '2018-12-05 11:52:55');
INSERT INTO `permissions` VALUES (11, 'system.role.destroy', '删除角色', 'admin.role.destroy', 1, 'web', 8, NULL, '2018-12-05 11:52:15', '2018-12-05 11:52:53');
INSERT INTO `permissions` VALUES (10, 'system.role.edit', '编辑角色', 'admin.role.edit', 1, 'web', 8, NULL, '2018-12-05 11:52:13', '2018-12-05 11:52:50');
INSERT INTO `permissions` VALUES (9, 'system.role.create', '添加角色', 'admin.role.create', 1, 'web', 8, NULL, '2018-12-05 11:52:11', '2018-12-05 11:52:47');
INSERT INTO `permissions` VALUES (8, 'system.role', '角色管理', 'admin.role', 121, 'web', 1, NULL, '2018-12-05 11:52:09', '2018-12-05 11:52:45');
INSERT INTO `permissions` VALUES (7, 'system.user.permission', '分配权限', 'admin.user.permission', 1, 'web', 2, NULL, '2018-12-05 11:52:06', '2018-12-05 11:52:42');
INSERT INTO `permissions` VALUES (6, 'system.user.role', '分配角色', 'admin.user.role', 1, 'web', 2, NULL, '2018-12-05 11:52:04', '2018-12-05 11:52:40');
INSERT INTO `permissions` VALUES (5, 'system.user.destroy', '删除用户', 'admin.user.destroy', 1, 'web', 2, NULL, '2018-12-05 11:52:01', '2018-12-05 11:52:37');
INSERT INTO `permissions` VALUES (4, 'system.user.edit', '编辑用户', 'admin.user.edit', 1, 'web', 2, NULL, '2018-12-05 11:51:59', '2018-12-05 11:52:35');
INSERT INTO `permissions` VALUES (3, 'system.user.create', '添加用户', 'admin.user.create', 1, 'web', 2, NULL, '2018-12-05 11:51:57', '2018-12-05 11:52:32');
INSERT INTO `permissions` VALUES (2, 'system.user', '用户管理', 'admin.user', 123, 'web', 1, NULL, '2018-12-05 11:51:54', '2018-12-05 11:52:30');
INSERT INTO `permissions` VALUES (1, 'system.manage', '系统管理', NULL, 100, 'web', 0, NULL, '2018-11-29 04:49:48', '2018-11-29 04:49:48');
INSERT INTO `permissions` VALUES (15, 'system.permission.edit', '编辑权限', 'admin.permission.edit', 1, 'web', 13, NULL, '2018-12-05 11:52:25', '2018-12-05 11:53:04');
INSERT INTO `permissions` VALUES (16, 'system.permission.destroy', '删除权限', 'admin.permission.destroy', 1, 'web', 13, NULL, '2018-12-05 11:52:27', '2018-12-05 11:53:06');
INSERT INTO `permissions` VALUES (27, 'path.manage', '补丁管理', NULL, 100, 'web', 0, NULL, '2020-02-10 19:18:16', '2020-02-10 19:30:13');
INSERT INTO `permissions` VALUES (28, 'path.org', '组织管理', 'path.org', 94, 'web', 27, NULL, '2020-02-10 19:22:51', '2020-02-10 19:22:51');
INSERT INTO `permissions` VALUES (29, 'path.org.create', '新建组织', 'path.org.create', 83, 'web', 28, NULL, '2020-02-10 19:24:07', '2020-02-10 19:24:07');
INSERT INTO `permissions` VALUES (30, 'path.org.edit', '编辑组织', 'path.org.edit', 129, 'web', 28, NULL, '2020-02-11 08:35:53', '2020-02-11 08:35:53');
INSERT INTO `permissions` VALUES (31, 'path.org.destroy', '删除组织', 'path.org.destroy', 138, 'web', 28, NULL, '2020-02-11 08:36:24', '2020-02-11 08:36:24');
INSERT INTO `permissions` VALUES (32, 'path.path', '补丁管理', 'path.path', 54, 'web', 27, NULL, '2020-02-11 14:25:56', '2020-02-11 14:25:56');
INSERT INTO `permissions` VALUES (33, 'path.path.create', '新增补丁', 'path.path.create', 131, 'web', 32, NULL, '2020-02-11 14:27:01', '2020-02-11 14:27:01');
INSERT INTO `permissions` VALUES (34, 'path.path.edit', '编辑补丁', 'path.path.edit', 100, 'web', 32, NULL, '2020-02-11 14:27:43', '2020-02-11 14:27:43');
INSERT INTO `permissions` VALUES (35, 'path.path.destroy', '删除补丁', 'path.path.destroy', 138, 'web', 32, NULL, '2020-02-11 14:28:23', '2020-02-11 14:28:23');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (1, 5);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (2, 5);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (3, 5);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (4, 5);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (5, 5);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (6, 5);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (7, 5);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (8, 5);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (9, 5);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (10, 5);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (11, 5);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (12, 5);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 5);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (14, 5);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (15, 5);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (16, 5);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (27, 4);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (28, 4);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (29, 4);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (30, 4);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (4, 'Operator', '普通用户', 'web', '2018-12-07 12:11:00', '2020-02-11 11:44:00');
INSERT INTO `roles` VALUES (3, 'Audit', '审计员', 'web', '2018-12-07 02:44:03', '2018-12-07 12:10:43');
INSERT INTO `roles` VALUES (1, 'Super-Admin', '超级管理员', 'web', '2018-11-29 04:48:56', '2018-11-29 04:48:56');
INSERT INTO `roles` VALUES (5, 'Admin', '管理员', 'web', '2018-12-07 12:11:16', '2018-12-07 12:11:16');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE INDEX `sessions_id_unique`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('ZxGko2J7JkjllRZpUFsiVlEHijdKpdxbQjOEDAYs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovL3BhdGguc2NjZXJ0Lm9yZy5jbi9wYXRoL3BhdGgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoidVBua3BOWFBNVVdEeG91dTNjZlBEaHQ5dkhwZzUwbkpwcTlQaXI5MSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL3BhdGguc2NjZXJ0Lm9yZy5jbi9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1581402736);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `realname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` int(11) NULL DEFAULT 0,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `check` int(11) NULL DEFAULT 0,
  `role_id` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '管理员', 0, '13900000000', 'demo@demo.com', '$2y$10$p9lCFijyZEevRb6MvZmrFuWfSbEGrE.ldWu.GO1roqCLCfdRaxAg2', 'JBm1JnuF0x8YMnW2ndoJyO5SKeLv7YdFMe2534ovPJALYt2lcwxci5voF3Xc', 1, 1, '2019-05-27 09:43:50', '2019-05-27 09:43:52');
SET FOREIGN_KEY_CHECKS = 1;
