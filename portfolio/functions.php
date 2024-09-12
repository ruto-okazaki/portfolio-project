<?php
add_action('wp_body_open', function () {

    // bodyタグ直下に記述したいコードをここに記載（アクセス解析など）

});

function init_func()
{
    //タイトル名を有効化
    add_theme_support('title-tag');
    //アイキャッチを有効化
    add_theme_support('post-thumbnails');
    // カスタムメニュー機能を有効化
    add_theme_support('menus');
}
add_action('init', 'init_func');

//SVGをアップロード
function add_file_types_to_uploads($file_types)
{

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// excerpt制御
function my_excerpt_length()
{
    return 100;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);
function my_excerpt_more()
{
    return "<br><a href='" . get_permalink() . "' class=link>[..詳しくみる]</a>";
}
add_filter('excerpt_more', 'my_excerpt_more', 999);

// ファイルへのリンクの定義
function add_action_file()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
    wp_enqueue_style('google-web-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Noto+Sans+JP:wght@400;500;600;700&family=Noto+Serif+JP:wght@400;500;600;700&display=swap');
    // slick css
    wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    // wp_enqueue_style('slick-theme-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    // adobe fonts
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/iws3fcn.css');
    // 独自css
    wp_enqueue_style('my-style', get_template_directory_uri() . '/css/style.css');
    // jquery
    wp_deregister_script('jquery'); //デフォルトのjqueryを初期化
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', true);
    // slick js
    wp_enqueue_script('slick-carousel-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', true);
    // 独自js
    wp_enqueue_script('my-script', get_template_directory_uri() . '/index.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'add_action_file');

// ContactForm7 自動整形無効化
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}
// Contact From 7の整形機能をオフ(p)
add_filter('wpcf7_auto_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
    return false;
}

// デフォルトの投稿タイプ
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'news';
        $args['label'] = 'お知らせ';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// カスタム投稿タイプ
// キービジュアル
function cpt_register_hero()
{
    $labels = [
        "name" => "キービジュアル",
        "singular_name" => "キービジュアル",
        "edit_item" => "キービジュアルを編集",
    ];
    $args = [
        "label" => "キービジュアル",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "map_meta_cap" => true,
        "rewrite" => ["slug" => "hero", "with_front" => true],
        "query_var" => true,
        "menu_position" => 11,
        "supports" => ["title", "editor", "thumbnail"],
    ];
    register_post_type("hero", $args);
}
add_action('init', 'cpt_register_hero');

// 制作実績
function cpt_register_works()
{
    $labels = [
        "name" => "Works",
        "singular_name" => "Works",
        "edit_item" => "制作実績を編集",
        "add_new_item" => "制作実績を追加",
    ];
    $args = [
        "label" => "Works",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "map_meta_cap" => true,
        "rewrite" => ["slug" => "works", "with_front" => true],
        "query_var" => true,
        "menu_position" => 12,
        "supports" => ["title", "editor", "thumbnail"],
    ];
    register_post_type("works", $args);
}
add_action('init', 'cpt_register_works');

// スキル
function cpt_register_skills()
{
    $labels = [
        "name" => "Skills",
        "singular_name" => "Skills",
        "edit_item" => "スキルを編集",
        "add_new_item" => "スキルを追加",
    ];
    $args = [
        "label" => "Skills",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "map_meta_cap" => true,
        "rewrite" => ["slug" => "skills", "with_front" => true],
        "query_var" => true,
        "menu_position" => 13,
        "supports" => ["title", "editor", "thumbnail"],
    ];
    register_post_type("skills", $args);
}
add_action('init', 'cpt_register_skills');
// カテゴリー(Skills)をつくる
function cpt_register_dep()
{
    $labels = [
        "singular_name" => "dep",
    ];
    $args = [
        "label" => "カテゴリー",
        "labels" => $labels,
        "public_queryable" => true,
        "hierarchical" => true,
        "show_in_menu" => true,
        "query_var" => true,
        "rewrite" => ["slug" => "dep", "with_front" => true],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "rest_base" => "dep",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "show_in_quick_edit" => false,
    ];
    register_taxonomy("dep", ["skills"], $args);
}
add_action('init', 'cpt_register_dep');

// プロフィール
function cpt_register_profile()
{
    $labels = [
        "name" => "Profile",
        "singular_name" => "Profile",
        "edit_item" => "プロフィールを編集",
    ];
    $args = [
        "label" => "Profile",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "map_meta_cap" => true,
        "rewrite" => ["slug" => "profile", "with_front" => true],
        "query_var" => true,
        "menu_position" => 14,
        "supports" => ["title", "editor", "thumbnail"],
    ];
    register_post_type("profile", $args);
}
add_action('init', 'cpt_register_profile');

// アーカイブ用テンプレート
// function cpt_register_gallery()
// {
//     $labels = [
//         "name" => "ギャラリー",
//         "singular_name" => "ギャラリー",
//         "edit_item" => "ギャラリーを編集",
//         "add_new_item" => "ギャラリーを追加",
//     ];
//     $args = [
//         "label" => "ギャラリー",
//         "labels" => $labels,
//         "description" => "",
//         "public" => true,
//         "show_in_rest" => true,
//         "rest_base" => "",
//         "rest_controller_class" => "WP_REST_Posts_Controller",
//         "has_archive" => true,
//         "delete_with_user" => false,
//         "exclude_from_search" => false,
//         "map_meta_cap" => true,
//         "rewrite" => ["slug" => "gallery", "with_front" => true],
//         "query_var" => true,
//         "menu_position" => 11,
//         "supports" => ["title", "editor", "thumbnail"],
//     ];
//     register_post_type("gallery", $args);
// }
// add_action('init', 'cpt_register_gallery');

// 投稿数設定
function column_posts($query)
{
    // 管理画面やメインクエリでない場合は終了
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    // カスタム投稿タイプ
    $post_type_posts_per_page = array(
        'hero' => -1,
        'works' => 4,
        'skills' => 6,
        'profile' => -1,
        'gallery' => 6,
    );

    foreach ($post_type_posts_per_page as $post_type => $posts_per_page) {
        if ($query->is_post_type_archive($post_type)) {
            $query->set('posts_per_page', $posts_per_page);
            return;
        }
    }

    // 一般的なアーカイブページ
    if ($query->is_archive()) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'column_posts');
