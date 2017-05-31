<?php
   /*
   Plugin Name: Custom type movie
   Description: a plugin to create custom movie posts
   Version: 1
   Author: Alekhin Maxim
   Author URI: http://hmjim.ru
   */
if ( ! defined( 'RC_TC_BASE_FILE' ) )
    define( 'RC_TC_BASE_FILE', __FILE__ );
if ( ! defined( 'RC_TC_BASE_DIR' ) )
    define( 'RC_TC_BASE_DIR', dirname( RC_TC_BASE_FILE ) );
if ( ! defined( 'RC_TC_PLUGIN_URL' ) )
    define( 'RC_TC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
register_activation_hook(__FILE__, 'movieplugin_install');
register_deactivation_hook(__FILE__, 'movieplugin_uninstall');

   // Опишем требуемый функционал
if ( ! function_exists( 'movie' ) ) {
    function movie() {
 
        $labels = array(
            'name'                => _x( 'Фильмы', 'Post Type General Name', 'movie' ),
            'singular_name'       => _x( 'Фильмы', 'Post Type Singular Name', 'movie' ),
            'menu_name'           => __( 'Фильмы', 'movie' ),
            'parent_item_colon'   => __( 'Родительский:', 'movie' ),
            'all_items'           => __( 'Все записи', 'movie' ),
            'view_item'           => __( 'Просмотреть', 'movie' ),
            'add_new_item'        => __( 'Добавить новую запись в Фильмы', 'movie' ),
            'add_new'             => __( 'Добавить новую', 'movie' ),
            'edit_item'           => __( 'Редактировать запись', 'movie' ),
            'update_item'         => __( 'Обновить запись', 'movie' ),
            'search_items'        => __( 'Найти запись', 'movie' ),
            'not_found'           => __( 'Не найдено', 'movie' ),
            'not_found_in_trash'  => __( 'Не найдено в корзине', 'movie' ),
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', ),
            'taxonomies'          => array( 'movie_tax' ), // категории, которые мы создадим ниже
            'public'              => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-video-alt2',
        );
        register_post_type( 'movie', $args );
 
    }
 
    add_action( 'init', 'movie', 0 ); // инициализируем
 
}

if ( ! function_exists( 'janr_tax' ) ) {
 
// Опишем требуемый функционал
    function janr_tax() {
        $labels = array(
            'name'                       => _x( 'Жанры фильмов', 'Taxonomy General Name', 'movie' ),
            'singular_name'              => _x( 'Жанр Фильма', 'Taxonomy Singular Name', 'movie' ),
            'menu_name'                  => __( 'Жанры', 'movie' ),
            'all_items'                  => __( 'Жанры', 'movie' ),
            'parent_item'                => __( 'Родительский жанр', 'movie' ),
            'parent_item_colon'          => __( 'Родительский жанр:', 'movie' ),
            'new_item_name'              => __( 'Новый жанр', 'movie' ),
            'add_new_item'               => __( 'Добавить новый жанр', 'movie' ),
            'edit_item'                  => __( 'Редактировать жанр', 'movie' ),
            'update_item'                => __( 'Обновить жанр', 'movie' ),
            'search_items'               => __( 'Найти', 'movie' ),
            'add_or_remove_items'        => __( 'Добавить или удалить жанр', 'movie' ),
            'choose_from_most_used'      => __( 'Поиск среди популярных', 'movie' ),
            'not_found'                  => __( 'Не найдено', 'movie' ),
        );	  
		$args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'janr_tax', array( 'movie' ), $args );
 
    }
 
    add_action( 'init', 'janr_tax', 0 ); // инициализируем	
}
if ( ! function_exists( 'country_tax' ) ) {	
    function country_tax() {
 

		$labels = array(
            'name'                       => _x( 'Страны', 'Taxonomy General Name', 'movie' ),
            'singular_name'              => _x( 'Страна', 'Taxonomy Singular Name', 'movie' ),
            'menu_name'                  => __( 'Страны', 'movie' ),
            'all_items'                  => __( 'Страны', 'movie' ),
            'parent_item'                => __( 'Родительская страна', 'movie' ),
            'parent_item_colon'          => __( 'Родительская страна:', 'movie' ),
            'new_item_name'              => __( 'Новая страна', 'movie' ),
            'add_new_item'               => __( 'Добавить новую страну', 'movie' ),
            'edit_item'                  => __( 'Редактировать страну', 'movie' ),
            'update_item'                => __( 'Обновить страну', 'movie' ),
            'search_items'               => __( 'Найти', 'movie' ),
            'add_or_remove_items'        => __( 'Добавить или удалить страну', 'movie' ),
            'choose_from_most_used'      => __( 'Поиск среди популярных', 'movie' ),
            'not_found'                  => __( 'Не найдено', 'movie' ),		
		);
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'country_tax', array( 'movie' ), $args );
 
    }
 
    add_action( 'init', 'country_tax', 0 ); // инициализируем
}

 
 if ( ! function_exists( 'data_tax' ) ) {	
    function data_tax() {

		$labels = array(
            'name'                       => _x( 'Год', 'Taxonomy General Name', 'movie' ),
            'singular_name'              => _x( 'Год', 'Taxonomy Singular Name', 'movie' ),
            'menu_name'                  => __( 'Год', 'movie' ),
            'all_items'                  => __( 'Год', 'movie' ),
            'parent_item'                => __( 'Родительская год', 'movie' ),
            'parent_item_colon'          => __( 'Родительская год:', 'movie' ),
            'new_item_name'              => __( 'Новый год', 'movie' ),
            'add_new_item'               => __( 'Добавить новый год', 'movie' ),
            'edit_item'                  => __( 'Редактировать год', 'movie' ),
            'update_item'                => __( 'Обновить год', 'movie' ),
            'search_items'               => __( 'Найти', 'movie' ),
            'add_or_remove_items'        => __( 'Добавить или удалить год', 'movie' ),
            'choose_from_most_used'      => __( 'Поиск среди популярных', 'movie' ),
            'not_found'                  => __( 'Не найдено', 'movie' ),		
		);
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'data_tax', array( 'movie' ), $args );
 
    }

    add_action( 'init', 'data_tax', 0 ); // инициализируем
 }
 if ( ! function_exists( 'actor_tax' ) ) {	
	    function actor_tax() {
			
		$labels = array(
            'name'                       => _x( 'Актеры', 'Taxonomy General Name', 'movie' ),
            'singular_name'              => _x( 'Актер', 'Taxonomy Singular Name', 'movie' ),
            'menu_name'                  => __( 'Актеры', 'movie' ),
            'all_items'                  => __( 'Актеры', 'movie' ),
            'parent_item'                => __( 'Родительская актер', 'movie' ),
            'parent_item_colon'          => __( 'Родительская актер:', 'movie' ),
            'new_item_name'              => __( 'Новый актер', 'movie' ),
            'add_new_item'               => __( 'Добавить нового актера', 'movie' ),
            'edit_item'                  => __( 'Редактировать актера', 'movie' ),
            'update_item'                => __( 'Обновить актера', 'movie' ),
            'search_items'               => __( 'Найти', 'movie' ),
            'add_or_remove_items'        => __( 'Добавить или удалить актера', 'movie' ),
            'choose_from_most_used'      => __( 'Поиск среди популярных', 'movie' ),
            'not_found'                  => __( 'Не найдено', 'movie' ),		
		);
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
        );
        register_taxonomy( 'actor_tax', array( 'movie' ), $args );
 
    }
 
    add_action( 'init', 'actor_tax', 0 ); // инициализируем
}

function movie_meta_box() {  
    add_meta_box(  
        'movie_meta_box', // Идентификатор(id)
        'Фильмы - дополнительная информация', // Заголовок области с мета-полями(title)
        'show_movie_metabox', // Вызов(callback)
        'movie', // Где будет отображаться наше поле, в нашем случае в разделе фильмы
        'normal',
        'high');
}  
add_action('add_meta_boxes', 'movie_meta_box'); // Запускаем функцию


$movie_meta_fields = array(
    array(  
        'label' => 'Стоимость сеанса',  
        'desc'  => 'Стоимость сеанса',  
        'id'    => 'm_date', // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    ),  
    array(  
        'label' => 'Дата выхода в прокат',  
        'desc'  => 'Дата выхода в прокат',  
        'id'    => 'actor',  // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    )
);


function show_movie_metabox() {  
global $movie_meta_fields; // Обозначим наш массив с полями глобальным
global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
 
    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';  
    foreach ($movie_meta_fields as $field) {  
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // Начинаем выводить таблицу
        echo '<tr>
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';  
                switch($field['type']) {  
                    // Текстовое поле
					case 'text':  
					    echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
					        <br /><span class="description">'.$field['desc'].'</span>';  
					break;
					// Список
					case 'select':  
					    echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
					    foreach ($field['options'] as $option) {  
					        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
					    }  
					    echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
					break;
                }
        echo '</td></tr>';  
    }  
    echo '</table>';
}

function save_my_movie_meta_fields($post_id) {  
    global $movie_meta_fields;  // Массив с нашими полями
 
    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
        return $post_id;  
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // Проверяем права доступа  
    if ('movie' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
 
    // Если все отлично, прогоняем массив через foreach
    foreach ($movie_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }  
    } // end foreach  
}  
add_action('save_post', 'save_my_movie_meta_fields'); // Запускаем функцию сохранения





function movie_template_chooser( $template ) {
	
    // Post ID
    $post_id = get_the_ID();
    // For all other CPT
     if ( get_post_type( $post_id ) == 'page' || get_post_type( $post_id ) == 'post'  ) {
        return rc_tc_get_template_hierarchy( 'archive' );
    }
    // Else use custom template
     if ( get_post_type( $post_id ) != 'page' || $post_id == false ) {
        return rc_tc_get_template_hierarchy( 'single' );
    }
 
}
function rc_tc_get_template_hierarchy( $template ) {
 
    // Get the template slug
    $template_slug = rtrim( $template, '.php' );
    $template = $template_slug . '.php';
 
    // Check if a custom template exists in the theme folder, if not, load the plugin template file
    if ( $theme_file = locate_template( array( 'test/' . $template ) ) ) {
        $file = $theme_file;
    }
    else {
        $file = RC_TC_BASE_DIR . '/views/' . $template;
    }
 
    return apply_filters( 'rc_repl_template_' . $template, $file );
}

add_filter( 'template_include', 'movie_template_chooser');

function movieplugin_install(){
// Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Уроки чи',
 'post_content' => 'https://youtu.be/1hPJO6sKPnE',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '123');
 add_post_meta($post_id, 'actor', '22.01.1997');
 wp_set_post_terms( $post_id, 'janr_tax', 'Комедия', false );
 wp_set_post_terms( $post_id, 'country_tax', 'США', false );
 wp_set_post_terms( $post_id, 'data_tax', '1997', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'Джеки Чан', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Сильвестр Сталлоне', true );
 
 
 // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Уговори меня',
 'post_content' => 'https://youtu.be/vnMcE4VYxrA',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '234');
 add_post_meta($post_id, 'actor', '22.04.1994');
 wp_set_post_terms( $post_id, 'janr_tax', 'Драмма', false );
 wp_set_post_terms( $post_id, 'country_tax', 'Китай', false );
 wp_set_post_terms( $post_id, 'data_tax', '1994', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'Арнольд Шварценеггер', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Джет Ли', true );
 
 
 
  // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Санта барбара',
 'post_content' => 'https://youtu.be/COKpq4SyZCQ',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '465');
 add_post_meta($post_id, 'actor', '11.11.1990');
 wp_set_post_terms( $post_id, 'janr_tax', 'Драмма', false );
 wp_set_post_terms( $post_id, 'country_tax', 'Индия', false );
 wp_set_post_terms( $post_id, 'data_tax', '1990', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'Арнольд Шварценеггер', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Джет Ли', true );
 
   // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Никогда не говори никогда',
 'post_content' => 'https://youtu.be/dMPoaX-sGx0',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '654');
 add_post_meta($post_id, 'actor', '16.10.1991');
 wp_set_post_terms( $post_id, 'janr_tax', 'Ужасы', false );
 wp_set_post_terms( $post_id, 'country_tax', 'Франция', false );
 wp_set_post_terms( $post_id, 'data_tax', '1991', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'Арнольд Шварценеггер', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Джет Ли', true );
 
    // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Машина',
 'post_content' => 'https://youtu.be/1hPJO6sKPnE',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '345');
 add_post_meta($post_id, 'actor', '22.04.1995');
 wp_set_post_terms( $post_id, 'janr_tax', 'Ужасы', false );
 wp_set_post_terms( $post_id, 'country_tax', 'США', false );
 wp_set_post_terms( $post_id, 'data_tax', '1991', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'дольф лундгрен', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Джет Ли', true );
 
     // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Дом',
 'post_content' => 'https://youtu.be/I1kBDbBw3qY',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '789');
 add_post_meta($post_id, 'actor', '01.01.1990');
 wp_set_post_terms( $post_id, 'janr_tax', 'Комедия', false );
 wp_set_post_terms( $post_id, 'country_tax', 'Франция', false );
 wp_set_post_terms( $post_id, 'data_tax', '1990', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'дольф лундгрен', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Киану Ривз', true );


     // Создаем массив
 $my_post = array(
 'post_type' => 'movie',
 'post_title' => 'Горячие головы',
 'post_content' => 'https://youtu.be/ubAL7RCY0M0',
 'post_status' => 'publish',
 'post_author' => 1
 );
// Вставляем данные в БД
 $post_id = wp_insert_post($my_post);
 /* произвольное поле с кодом */
 add_post_meta($post_id, 'm_date', '234');
 add_post_meta($post_id, 'actor', '03.04.1993');
 wp_set_post_terms( $post_id, 'janr_tax', 'Триллер', false );
 wp_set_post_terms( $post_id, 'country_tax', 'Россия', false );
 wp_set_post_terms( $post_id, 'data_tax', '1993', false );
 wp_set_post_terms( $post_id, 'actor_tax', 'дольф лундгрен', true );
 wp_set_post_terms( $post_id, 'actor_tax', 'Киану Ривз', true ); 
}
function movieplugin_uninstall(){
	
}