<?php
/**
 * As configurações básicas do WordPress
 *blabla
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'basico');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 * Blá,blá,blá
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'j-suwR}}zA@xX+F<)1CQ2(qg!;7 hDO(r~oQj-2YQ.ow]Vn^<}g140O,l6:PAO|e');
define('SECURE_AUTH_KEY',  'AIGT)@d[COrvt$joY`eGMii^V7IicHps Um`|zWL;/QKP>$)6aP`@F!.y;fR<LMy');
define('LOGGED_IN_KEY',    'cPnMOqEhdPyPx(V4X6XTAL;qc)QvIh,T,:jr_mU^;DBwn#u&3RE`-IPWq{&hmtbu');
define('NONCE_KEY',        'KT2u+E/8U<iDubbqPAcM|kOT&gdCS.+~Ffwb`%_!%>zHmd~Hw}~:E;57=z.e6-7T');
define('AUTH_SALT',        '`6:+a5>RCq=C,#fT&6C!oC|PN6e1/SmdNfm8Pv2Sx4^O^Zo5.y$A8Dh(-I>5mw|@');
define('SECURE_AUTH_SALT', 'Hml?oRtsz!1UnzY;Gv/M*<hUi(S+~`Xz0HX(LnF5`z,c0t~gJkde2jcBAl`>om$v');
define('LOGGED_IN_SALT',   '+8t@&U%^G1Odw0kl>E*F4z.xRwau$bI,Qz<2i(X/y[#30wtw*a!c^$4=84^{,9*>');
define('NONCE_SALT',       'A:-f)2]Y0:U`C|~7H^GU5[`gF]38Sp8p}|~rOI;xiYs@9)G<PdQ[I_78g4b1m{Y>');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
