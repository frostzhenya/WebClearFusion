﻿<?php
/*-------------------------------------------------------+
| WebClearFusion Content Management System
| Copyright (C) 2010 - 2012 lovepsone
+--------------------------------------------------------+
| Filename: text.ru.utf8.php
| Author: lovepsone
+--------------------------------------------------------+
| Removal of this copyright header is strictly prohibited 
| without written permission from the original author(s).
+--------------------------------------------------------*/

	require_once "zone_names.php";
	require_once "game_text.php";

$txt = array(
# тексты в правом и левом меню
'menu_auth_title'		=>'Авторизуйтесь или зарегистрируйтесь',
'menu_auth_greeting'		=>'Приветствуем вас',
'menu_auth_account'		=>'Учётная запись:',
'menu_auth_pass'		=>'Пароль:',
'menu_auth_enter'		=>'Войти',
'menu_auth_reg'			=>'Регистрация',
'menu_auth_remember_pass'	=>'Восстановить пароль',
'menu_auth_error'		=>'Ошибка!',
'menu_auth_re_enter'		=>'Введите аккаунт и пароль заново!',
'menu_auth_e_mail'		=>'E-Mail',
'menu_auth_ip'			=>'ИП-Адрес',
'menu_auth_log_in_acp'		=>'Выберете мир',
'menu_auth_admin'		=>'Админка',
'menu_auth_exit'		=>'Выйти',

'menu_acp_info_acc'		=>'Учётная запись:',
'menu_acp_info_type_acc'	=>'Тип учётной записи:',
'menu_acp_info_access'		=>'Права доступа:',
'menu_acp_info_reg_mail'	=>'Регистрационный E-mail:',
'menu_acp_info_lang'		=>'Язык клиента:',
'menu_acp_info_online'		=>'игровой статус:',
'menu_acp_info_game_on'		=>'В игре',
'menu_acp_info_game_off'	=>'В не игры',
'menu_acp_info_date_reg'	=>'Дата регистрации:',
'menu_acp_info_date_game'	=>'Дата последнего посещения:',
'menu_acp_info_last_ip'		=>'Последний IP-адрес:',
'menu_acp_info_linking_ip'	=>'Привязка к IP-адресу:',
'menu_acp_info_linking_ip_on'	=>'Включена',
'menu_acp_info_linking_ip_off'	=>'<font color=green>Выключена</font>',
'menu_acp_info_game_realm'	=>'Игровой реалм:',

# тексты в стандартных модулях
'modul_news_no_news'		=>'<b>Нет новостей</b>',
'modul_news_creation_date'	=>'Дата создания:',
'modul_news_author'		=>'| Автор:',
'modul_news_read_more'		=>'Читать далее',
'modul_newsexp_date_reply'	=>'Дата ответа:',
'modul_newsexp_date_reply'	=>'Дата ответа:',
'modul_newsexp_log_in'		=>'Авторизуйтесь чтобы оставлять сообщения!',

'modul_register'		=>'Регистрация',
'modul_register_no_ip'		=>'<b>Регистрация новой учетной записи не возможна.</b><br>Вы уже зарегистрировали максимально возможное<br>число учетных записей с данного IP-адреса.',
'modul_register_account'	=>'Учётная запись:',
'modul_register_pass'		=>'Пароль:',
'modul_register_confirm_pass'	=>'Подтверждение:',
'modul_register_mail'		=>'Регистрационный E-mail:',
'modul_register_add'		=>'Зарегистрировать',
'modul_register_no'		=>'Регистрация временно приостановлена администрацией!<br>Извините за причиненные неудобства.',
'modul_registe_warning_mail'	=>'Неправильно введен E-Mail!',
'modul_registe_warning_pass'	=>'Не совподают пароли либо пароль одинаковый с логинам!!!',
'modul_registe_warning_field'	=>'Пожалуйста правильно заполните все поля!',
'modul_registe_warning_account'	=>'Такая учетная запись уже существует!',
'modul_register_error'		=>'Ошибка при регистрации!!!',

'modul_setuser_sucess_auth'	=>'Вы вашли как ',
'modul_setuser_errors_auth'	=>'Вы ввели неверный логин или пароль!',
'modul_setuser_wait'		=>'<br>Пожалуйста, подождите, сейчас вы будете перемещены...<br><br>',
'modul_setuser_link'		=>'или нажмите сюда, если не хотите ждать',
'modul_setuser_logout'		=>'Вы успешно вышли из Учетной записи!',
'modul_setuser_login'		=>'Вы успешно вошли в Управление учетной записи!',
'modul_setuser_out_acp'		=>'Вы успешно вышли из Управления учетной записи!',
'modul_setuser_ban_acc'		=>'Ваша Учетная запись забанена Администрацияй по причине:',
'modul_setuser_ban_ip'		=>'Ваша IP-Адрес забанен Администрацияй по причине:',

'modul_online_timers'		=>'Таймеры:',
'modul_online_points_arena'	=>'Дата начисления очков арены:',
'modul_online_daily_quests'	=>'Дата сброса ежедневных заданий:',
'modul_online_weekly_quests'	=>'Дата сброса еженедельных заданий:',
'modul_online_monthly_quests'	=>'Дата сброса ежемесячных заданий:',
'modul_online'			=>'онлайн',
'modul_online_no_char'		=>'Нет игроков со статусом <b>Онлайн</b>',
'modul_online_level'		=>'Уровень',
'modul_online_name'		=>'Имя',
'modul_online_race'		=>'Раса',
'modul_online_class'		=>'Класс',
'modul_online_position'		=>'Позиция',

# тексты в меню админки
'menu_admin_panel_admin'	=>'Панель администратора',
'menu_admin_revert'		=>'Вернуться на сайт',
'menu_admin_content'		=>'Администрирование контента',
'menu_admin_users'		=>'Администрир. пользователей',
'menu_admin_system'		=>'Администрирование системы',
'menu_admin_plants'		=>'Установки',
'menu_admin_acp'		=>'Управление ACP',

# тексты в админке
'admin_newsmaker'		=>'Редактор новостей',
'admin_newsmaker_title'		=>'Удалить эту новость?',
'admin_newsmaker_team'		=>'Команда:',
'admin_newsmaker_edit'		=>'Редактировать',
'admin_newsmaker_add'		=>'Создать',
'admin_newsmaker_newsflash'	=>'Краткая новость:',
'admin_newsmaker_newsfull'	=>'Полная новость:',
'admin_newsmaker_del'		=>'Удалить',
'admin_newsmaker_teme'		=>'Тема:',
'admin_newsmaker_cat'		=>'Категория:',
'admin_newsmaker_comments'	=>'Разрешить комментарии:',
'admin_newsmaker_access'	=>'Доступ:',
'admin_newsmaker_show_img_cat'	=>'Показывать картинку категории:',
'admin_newsmaker_not_fields'	=>'Ошибка! Не заполнены все поля.',

'admin_newscat_name'		=>'Название категории: ',
'admin_newscat_picture'		=>'Картинка: ',
'admin_newscat_save'		=>'Сохранить',
'admin_newscat_edit'		=>'Редактировать',
'admin_newscat_del'		=>'Удалить',
'admin_newscat_del_y'		=>'Удалить категорию новостей?',
'admin_newscat_no_cat'		=>'Нет категорий',
'admin_newscat_edit_n'		=>'Редактировать категории новостей',
'admin_newscat_add_n'		=>'Добавить новую категорию',
'admin_newscat_link_load_img'	=>'Нажмите здесь, для загрузки картинки для категории',

'admin_forumedit_edit'		=>'Редактировать',
'admin_forumedit_del'		=>'Удалить',
'admin_forumedit_add_f_s'	=>'Добавить категорию форума',
'admin_forumedit_add_f_f'	=>'Добавить форум',
'admin_forumedit_edit_f_s'	=>'Редактировать категорию форума',
'admin_forumedit_edit_f_f'	=>'Редактировать форум',
'admin_forumedit_name_f_s'	=>'Название категории',
'admin_forumedit_name_f_f'	=>'Название форума',
'admin_forumedit_descript_f_f'	=>'Описание форума',
'admin_forumedit_sections'	=>'Категория',
'admin_forumedit_order_f_s'	=>'Порядок',
'admin_forumedit_savesect'	=>'Сохранить',
'admin_forumedit_cat_or_forum'	=>'Категория/Форум',
'admin_forumedit_order'		=>'Порядок',
'admin_forumedit_options'	=>'Опции',
'admin_forumedit_cleaning'	=>'Очистка',
'admin_forumedit_delete'	=>'Вы уверены в выборе действия?<br>Данные после этого действия нельзя восстановить.',

'admin_panel_control'		=>'Управление панелями',
'admin_panel_name'		=>'Название панели',
'admin_panel_place'		=>'Место',
'admin_panel_position'		=>'Положение',
'admin_panel_type'		=>'Тип',
'admin_panel_show'		=>'Доступ',
'admin_panel_options'		=>'Опции',
'admin_panel_edit'		=>'Редактировать',
'admin_panel_switch_off'	=>'ВЫКЛ',
'admin_panel_switch_on'		=>'ВКЛ',
'admin_panel_del'		=>'Удалить',
'admin_panel_del_n_y'		=>'Удалить эту панель?',
'admin_panel_add'		=>'Добавить новую панель',
'admin_panel_refresh'		=>'Обновить порядок панелей',

'admin_paneledit_name'		=>'Название панели:',
'admin_paneledit_position'	=>'Положение:',
'admin_paneledit_show'		=>'Доступ:',
'admin_paneledit_save'		=>'Сохронить',
'admin_paneledit_t_add'		=>'Добавить панель',
'admin_paneledit_t_edit'	=>'Редактировать панель',

'admin_panel_acp_control'	=>'Управление панелями',
'admin_panel_acp_name'		=>'Название панели',
'admin_panel_acp_place'		=>'Место',
'admin_panel_acp_position'	=>'Положение',
'admin_panel_acp_type'		=>'Тип',
'admin_panel_acp_show'		=>'Доступ',
'admin_panel_acp_options'	=>'Опции',
'admin_panel_acp_edit'		=>'Редактировать',
'admin_panel_acp_switch_off'	=>'ВЫКЛ',
'admin_panel_acp_switch_on'	=>'ВКЛ',
'admin_panel_acp_del'		=>'Удалить',
'admin_panel_acp_del_n_y'	=>'Удалить эту панель?',
'admin_panel_acp_add'		=>'Добавить новую панель',
'admin_panel_acp_refresh'	=>'Обновить порядок панелей',

'admin_settings'		=>'Настройки',
'admin_settings_nameserver'	=>'Название сайта:',
'admin_settings_urlserver'	=>'URL сайта:',
'admin_settings_serverbanner'	=>'Лого сайта:',
'admin_settings_intro'		=>'Приветствие сайта:',
'admin_settings_intro_title'	=>'Оставьте пустым, если не нужно',
'admin_settings_start_unit'	=>'Стартовая страница:',
'admin_settings_lang'		=>'Язык сайта (locale):',
'admin_settings_themes'		=>'Тема оформления сайта:',
'admin_settings_off_left_p'	=>'Выключить левые панели:',
'admin_settings_off_upper_p'	=>'Выключить центральные панели:',
'admin_settings_off_lower_p'	=>'Выключить нижние панели:',
'admin_settings_off_right_p'	=>'Выключить правые панели:',
'admin_settings_off_p_title'	=>'Пример:<br>/news.php<br>/forum/index.php',
'admin_savesettings'		=>'Сохранить',

'admin_setting_other'		=>'Прочие установки',
'admin_setting_other_k'		=>'Каптча при авторизации',
'admin_setting_other_lvl_admin'	=>'Минимальный уровень пользователя для входа в режим администрирования',

'admin_slinks_title_add'	=>'Добавить ссылку в навигацию',
'admin_slinks_title_edit'	=>'Редактировать ссылки меню',
'admin_slinks_name'		=>'Название:',
'admin_slinks_url'		=>'URL:',
'admin_slinks_show'		=>'Доступ:',
'admin_slinks_order'		=>'Порядок:',
'admin_slinks_save'		=>'Сохранить',
'admin_slinks_current_url'	=>'Текущие ссылки меню',
'admin_slinks_name_url'		=>'Название ссылки',
'admin_slinks_show_url'		=>'Кто видит (доступ)',
'admin_slinks_order_url'	=>'Порядок',
'admin_slinks_settings_url'	=>'Опции',
'admin_slinks_edit_url'		=>'Редактировать',
'admin_slinks_del_url'		=>'Удалить',
'admin_slinks_del_url_n_y'	=>'Удалить эту ссылку?',
'admin_slinks_no_url'		=>'Нет ссылок',
'admin_slinks_refresh'		=>'Обновить порядок ссылок ',

# тексты при логах
'log'				=>'Логи',
'log_title_date'		=>'Дата',
'log_title_ip'			=>'IP-Адрес',
'log_title_char'		=>'Персанаж',
'log_title_mode'		=>'Мод',
'log_title_mail'		=>'E-mail',
'log_title_account'		=>'Учетная запись',
'log_no'			=>'Нет логов.',
'1'				=>'Весь лог',
'2'				=>'Регистрация',
'3'				=>'Запрос восстановления пароля',
'4'				=>'Получение нового пароля',
'5'				=>'Запрос смены E-mail',
'6'				=>'Смена E-mail-a',
'7'				=>'Перенос на другую учётную запись персонажа',
'8'				=>'Переименование персонажа',
'9'				=>'Unlock ip',
'10'				=>'Анти-ошибка',

# форум
'forum'				=>'Форум',
'forum_create_theme'		=>'Создать тему',
'forum_create_name_theme'	=>'Название темы',
'forum_no_partitions'		=>'Администратор не создал разделы!!!',
'forum_column_section'		=>'Раздел',
'forum_column_last_post'	=>'Последнее сообщение',
'forum_column_so'		=>'Тем',
'forum_column_posts'		=>'Сообщений',
'forum_column_top_aut'		=>'Тема/Автор',
'forum_column_replies'		=>'Ответов',
'forum_column_views'		=>'Просмотров',
'forum_no_message'		=>'Нет сообщений',
'forum_no_temes'		=>'Нет тем',
'forum_quick_reply'		=>'Отправить',
'forum_log'			=>'Авторизуйтесь чтобы оставлять сообщения на форуме!',
'forum_from'			=>'от',

#ACP
'modul_acp_game_on'		=>'<font color=green>В игре</font>',
'modul_acp_game_off'		=>'Вне игры',
'modul_acp_revive'		=>'Просмотреть персонажа',
'modul_acp_level'		=>'Уровень',
'modul_acp_name'		=>'Имя',
'modul_acp_race'		=>'Раса',
'modul_acp_class'		=>'Класс',
'modul_acp_money'		=>'Деньги',
'modul_acp_position'		=>'Позиция',
'modul_acp_game_status'		=>'Игравой статус',
'modul_acp_no_char'		=>'На вашей учетной записи не созданы персонажи',

'modul_acp_char'		=>'Персонаж',
'modul_acp_char_talents'	=>'Таланты',
'modul_acp_char_skill'		=>'Умения',
'modul_acp_char_achievements'	=>'Достижения',
'modul_acp_char_reputation'	=>'Репутация',
'modul_acp_char_quests'		=>'Квесты',
'modul_acp_char_page_base'	=>'Основные',
'modul_acp_char_page_defence'	=>'Защита',
'modul_acp_char_page_melee'	=>'Ближний бой',
'modul_acp_char_page_ranged'	=>'Дальний бой',
'modul_acp_char_armor'		=>'Броня:',
'modul_acp_char_defence'	=>'Защита',
'modul_acp_char_dodge'		=>'Уклонение:',
'modul_acp_char_parry'		=>'Парирование:',
'modul_acp_char_block'		=>'Блок:',
'modul_acp_char_recilence'	=>'Устойчивость:',
'modul_acp_char_ach_total'	=>'Обзор',
'modul_acp_char_ach_complete' 	=>'Всего выполнено:',
'modul_acp_char_ach_last'     	=>'Последние выполненные:',
'modul_acp_char_skill'     	=>'Навыки персонажа',
'modul_acp_show_reputation'  	=>'Репутация персонажа',
'modul_acp_show_reqirement'     =>'Требование',
'modul_acp_show_horde'     	=>'Орда',
'modul_acp_show_alliance'     	=>'Альянс',
'modul_acp_show_no_sell_price' 	=>'Не для продажи',
'modul_acp_show_sell_price' 	=>'Цена продажи',
'modul_acp_show_money' 		=>'Деньги:',
'modul_acp_show_buy_price' 	=>'Цена выкупа',
'modul_acp_show_this_item_part_of_set' 	=> 'Этот предмет часть комплекта',

'modul_acp_show_detail_info' 	=>'Подробная информация',

# остальное
'errors'			=>'<font color=red>Неведомая ошибка!!!</font>',
'fill_field'			=>'<font color=red>Вы не заполнили поле!!!</font>',

'days'				=>'д.',
'hours'				=>'ч.',
'min' 				=>'мин.',
'sec' 				=>'сек.',
'minustime' 			=>'действие',

'up'				=>'Вверх',
'down'				=>'Вниз',
'left'				=>'Слева',
'right'				=>'Справа',
'center'			=>'Центр',
'center_footer'			=>'По центру снизу',

'yes'				=>'Да',
'no'				=>'Нет',
'no_links'			=>'Нет ссылок',
'php'				=>'PHP',
'file'				=>'Файл',

'genl'				=>'Общий',
'user'				=>'Пользователь',
'moderator'			=>'Модератор',
'vebmaster'			=>'Веб-мастер',
'administrator'			=>'Админитратор',
'superadministrator'		=>'Супер Администратор',
);
?>