<?php
/**
 * WordPress 基础配置文件。
 *
 * 本文件包含以下配置选项: MySQL 设置、数据库表名前缀、
 * 密匙、WordPress 语言设定以及 ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/Editing_wp-config.php 编辑
 * wp-config.php} Codex 页面。MySQL 设置具体信息请咨询您的空间提供商。
 *
 * 这个文件用在于安装程序自动生成 wp-config.php 配置文件，
 * 您可以手动复制这个文件，并重命名为 wp-config.php，然后输入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress 数据库的名称 */
define('DB_NAME', 'C321871_number1g');

/** MySQL 数据库用户名 */
// define('DB_USER', 'C321871_number1g');
define('DB_USER', 'root');

/** MySQL 数据库密码 */
// define('DB_PASSWORD', '1qaz!QAZ');
define('DB_PASSWORD', '');

/** MySQL 主机 */
// define('DB_HOST', 'mysql1008.ixwebhosting.com');
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份密匙设定。
 *
 * 您可以随意写一些字符
 * 或者直接访问 {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org 私钥生成服务}，
 * 任何修改都会导致 cookie 失效，所有用户必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'n**<9@u2z|URtt-b[*!1ld,<yd(q(g`$]p3V!Ts/7V<bEm0xtLs2DKI%6]Br~>eX');
define('SECURE_AUTH_KEY', 'X~_7f~+]<U6iI!+|R:,zJW4%@dPShxhg$P;<UmEuU{,xtwq!pL;=T`yA?qExGs4z');
define('LOGGED_IN_KEY', 'HVfV`(&bJb)a-N]QWuOwZ;yx<,sMCb@c7H+LF/S#B?ev+[L^=D)4VuIXQ9>=qLhp');
define('NONCE_KEY', 'opRfeG$$LxNh8vIda#_x%;YRSwBf:;Ip6Ll&oGqNUtN&^o0aNCv,@wvBbrZonO]%');
define('AUTH_SALT', 'iSE@Pd3s`qSX3.A*.`|8v<TdUso;^nK:@c:?pnWD!G3:%q7,=@eorL~RD*q)LS[i');
define('SECURE_AUTH_SALT', '~tibGE:b_uDu=>fV-LVt1MSSbEeTG#/V?40<<`(C-9^f7Or{u7?#~6Uj:&PFNAZY');
define('LOGGED_IN_SALT', '9EA?oi@N41G?U:*EJ%&s+z>ORAZ]JGl>)xEF Vr~mt%*n?90QL$g:E/?x/])2b0>');
define('NONCE_SALT', ')>|Pjw[Ptd]|);YW;*/?j%YLW64J,u5;z*!n}[r?hFO%&Tm?QQ5)M;n{2)e0KNZ~');

/**#@-*/

/**
 * WordPress 数据表前缀。
 *
 * 如果您有在同一数据库内安装多个 WordPress 的需求，请为每个 WordPress 设置不同的数据表前缀。
 * 前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * WordPress 语言设置，默认为英语。
 *
 * 本项设定能够让 WordPress 显示您需要的语言。
 * wp-content/languages 内应放置同名的 .mo 语言文件。
 * 要使用 WordPress 简体中文界面，只需填入 zh_CN。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress 调试模式。
 *
 * 将这个值改为“true”，WordPress 将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用本功能。
 */
define('WP_DEBUG', false);

/**
 * 解决错误
 * Fatal error: Allowed memory size of 33554432 bytes exhausted (tried to allocate xxx bytes)
 */
define('WP_MEMORY_LIMIT', '64M');

/* 好了！请不要再继续编辑。请保存该文件。使用愉快！ */

/** WordPress 目录的绝对路径。 */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** 设置 WordPress 变量和包含文件。 */
require_once ABSPATH . 'wp-settings.php';
