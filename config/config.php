<?php

use Framework\Renderer\Renderer;
use Framework\Router\Router;

return [
    'renderer' => [
        Renderer::CONFIG_KEY_BASE_VIEW_PATH => dirname(__DIR__) . '/views/'
    ],
    'dispatcher' => [
        'controllerNamespace' => 'Quizapp\Controller',
            'controllerSuffix' => 'Controller'
        ],
    'routing' => [
        'routes' => [
            'user_homepage' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'getAllQuizzes',
                Router::CONFIG_KEY_PATH => '/user',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'user_quiz' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'getQuiz',
                Router::CONFIG_KEY_PATH => '/user/quiz/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'user_question' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'questionInstance',
                Router::CONFIG_KEY_ACTION => 'getQuestion',
                Router::CONFIG_KEY_PATH => '/user/quiz/question/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'admin_dashboard' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'getDashboard',
                Router::CONFIG_KEY_PATH => '/admin',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'user_login' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'login',
                Router::CONFIG_KEY_PATH => '/login',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'user_getLogin' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'getLogin',
                Router::CONFIG_KEY_PATH => '/',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'user_logout' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'logout',
                Router::CONFIG_KEY_PATH => '/logout',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'admin_get_quizzes' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'getQuizzes',
                Router::CONFIG_KEY_PATH => '/admin/quiz',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_quizzes_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'addQuizzes',
                Router::CONFIG_KEY_PATH => '/admin/quiz/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_quiz' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_PATH => '/admin/quiz/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'delete_quiz' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_PATH => '/admin/quiz/delete/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_quizzes_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'editQuizzes',
                Router::CONFIG_KEY_PATH => '/admin/quiz/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_quiz' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'quizTemplate',
                Router::CONFIG_KEY_ACTION => 'edit',
                Router::CONFIG_KEY_PATH => '/admin/quiz/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'get_questions' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'getQuestions',
                Router::CONFIG_KEY_PATH => '/admin/question',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_questions_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'addQuestions',
                Router::CONFIG_KEY_PATH => '/admin/question/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_question' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_PATH => '/admin/question/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'delete_question' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_PATH => '/admin/question/delete/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_questions_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'editQuestion',
                Router::CONFIG_KEY_PATH => '/admin/question/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_question' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'questionTemplate',
                Router::CONFIG_KEY_ACTION => 'edit',
                Router::CONFIG_KEY_PATH => '/admin/question/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'get_users' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'getUsers',
                Router::CONFIG_KEY_PATH => '/admin/user',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_users_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'addUsers',
                Router::CONFIG_KEY_PATH => '/admin/user/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'add_user' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'add',
                Router::CONFIG_KEY_PATH => '/admin/user/add',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'delete_user' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'delete',
                Router::CONFIG_KEY_PATH => '/admin/user/delete/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_users_page' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'editUser',
                Router::CONFIG_KEY_PATH => '/admin/user/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'edit_user' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'user',
                Router::CONFIG_KEY_ACTION => 'edit',
                Router::CONFIG_KEY_PATH => '/admin/user/edit/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'answer_next' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'textInstance',
                Router::CONFIG_KEY_ACTION => 'next',
                Router::CONFIG_KEY_PATH => '/answer/next/{id}/{next}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+',
                    'next' => '\d+'
                ]
            ],
            'answer_save' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'textInstance',
                Router::CONFIG_KEY_ACTION => 'save',
                Router::CONFIG_KEY_PATH => '/answer/save/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'get_review' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'getReview',
                Router::CONFIG_KEY_PATH => '/user/quiz/review',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'save_quiz' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'saveQuiz',
                Router::CONFIG_KEY_PATH => '/user/quiz/save',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'get_result_listing' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'getAllQuizzes',
                Router::CONFIG_KEY_PATH => '/admin/results',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
            'view_result' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'getResult',
                Router::CONFIG_KEY_PATH => '/admin/results/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'save_result' => [
                Router::CONFIG_KEY_METHOD => 'POST',
                Router::CONFIG_KEY_CONTROLLER => 'quizInstance',
                Router::CONFIG_KEY_ACTION => 'saveResult',
                Router::CONFIG_KEY_PATH => '/admin/results/{id}',
                Router::CONFIG_KEY_ATTRIBUTES => [
                    'id' => '\d+'
                ]
            ],
            'exception' => [
                Router::CONFIG_KEY_METHOD => 'GET',
                Router::CONFIG_KEY_CONTROLLER => 'exception',
                Router::CONFIG_KEY_ACTION => 'exception',
                Router::CONFIG_KEY_PATH => '/exception',
                Router::CONFIG_KEY_ATTRIBUTES => [
                ]
            ],
        ],
    ],
    'database' => [
        'host' => 'localhost',
        'db' => 'quiz',
        'user' => 'toni',
        'pass' => 'Evozon123!',
        'charset' => 'utf8mb4'
    ],
    'options' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ],
    'highlight' => [
        '/^\d+$/' => 'HighlightLib\Token\NumberToken',
        '/^\$[a-zA-Z_]+\w*$/' => 'HighlightLib\Token\VariableToken',
        '/\.|,|;|:|‘|“|\[|\]|\(|\)/' => 'HighlightLib\Token\PunctuationToken',
        '/{|}/' => 'HighlightLib\Token\BracketToken',
        '/\b(?:true|false|null|TRUE|FALSE|NULL|__CLASS__|__DIR__|__FILE__|__LINE__|__METHOD__|__FUNCTION__|__NAMESPACE__|__TRAIT__)\b/' => 'HighlightLib\Token\AtomToken',
        '/\b(?:func_num_args|func_get_arg|func_get_args|strlen|strcmp|strncmp|strcasecmp|strncasecmp|each|error_reporting|define|defined|trigger_error|user_error|set_error_handler|restore_error_handler|get_declared_classes|get_loaded_extensions|extension_loaded|get_extension_funcs|debug_backtrace|constant|bin2hex|hex2bin|sleep|usleep|time|mktime|gmmktime|strftime|gmstrftime|strtotime|date|gmdate|getdate|localtime|checkdate|flush|wordwrap|htmlspecialchars|htmlentities|html_entity_decode|md5|md5_file|crc32|getimagesize|image_type_to_mime_type|phpinfo|phpversion|phpcredits|strnatcmp|strnatcasecmp|substr_count|strspn|strcspn|strtok|strtoupper|strtolower|strpos|strrpos|strrev|hebrev|hebrevc|nl2br|basename|dirname|pathinfo|stripslashes|stripcslashes|strstr|stristr|strrchr|str_shuffle|str_word_count|strcoll|substr|substr_replace|quotemeta|ucfirst|ucwords|strtr|addslashes|addcslashes|rtrim|str_replace|str_repeat|count_chars|chunk_split|trim|ltrim|strip_tags|similar_text|explode|implode|setlocale|localeconv|parse_str|str_pad|chop|strchr|sprintf|printf|vprintf|vsprintf|sscanf|fscanf|parse_url|urlencode|urldecode|rawurlencode|rawurldecode|readlink|linkinfo|link|unlink|exec|system|escapeshellcmd|escapeshellarg|passthru|shell_exec|proc_open|proc_close|rand|srand|getrandmax|mt_rand|mt_srand|mt_getrandmax|base64_decode|base64_encode|abs|ceil|floor|round|is_finite|is_nan|is_infinite|bindec|hexdec|octdec|decbin|decoct|dechex|base_convert|number_format|fmod|ip2long|long2ip|getenv|putenv|getopt|microtime|gettimeofday|getrusage|uniqid|quoted_printable_decode|set_time_limit|get_cfg_var|magic_quotes_runtime|set_magic_quotes_runtime|get_magic_quotes_gpc|get_magic_quotes_runtime|import_request_variables|error_log|serialize|unserialize|memory_get_usage|var_dump|var_export|debug_zval_dump|print_r|highlight_file|show_source|highlight_string|ini_get|ini_get_all|ini_set|ini_alter|ini_restore|get_include_path|set_include_path|restore_include_path|setcookie|header|headers_sent|connection_aborted|connection_status|ignore_user_abort|parse_ini_file|is_uploaded_file|move_uploaded_file|intval|floatval|doubleval|strval|gettype|settype|is_null|is_resource|is_bool|is_long|is_float|is_int|is_integer|is_double|is_real|is_numeric|is_string|is_array|is_object|is_scalar|ereg|ereg_replace|eregi|eregi_replace|split|spliti|join|sql_regcase|dl|pclose|popen|readfile|rewind|rmdir|umask|fclose|feof|fgetc|fgets|fgetss|fread|fopen|fpassthru|ftruncate|fstat|fseek|ftell|fflush|fwrite|fputs|mkdir|rename|copy|tempnam|tmpfile|file|file_get_contents|file_put_contents|stream_select|stream_context_create|stream_context_set_params|stream_context_set_option|stream_context_get_options|stream_filter_prepend|stream_filter_append|fgetcsv|flock|get_meta_tags|stream_set_write_buffer|set_file_buffer|set_socket_blocking|stream_set_blocking|socket_set_blocking|stream_get_meta_data|stream_register_wrapper|stream_wrapper_register|stream_set_timeout|socket_set_timeout|socket_get_status|realpath|fnmatch|fsockopen|pfsockopen|pack|unpack|get_browser|crypt|opendir|closedir|chdir|getcwd|rewinddir|readdir|dir|glob|fileatime|filectime|filegroup|fileinode|filemtime|fileowner|fileperms|filesize|filetype|file_exists|is_writable|is_writeable|is_readable|is_executable|is_file|is_dir|is_link|stat|lstat|chown|touch|clearstatcache|mail|ob_start|ob_flush|ob_clean|ob_end_flush|ob_end_clean|ob_get_flush|ob_get_clean|ob_get_length|ob_get_level|ob_get_status|ob_get_contents|ob_implicit_flush|ob_list_handlers|ksort|krsort|natsort|natcasesort|asort|arsort|sort|rsort|usort|uasort|uksort|shuffle|array_walk|count|end|prev|next|reset|current|key|min|max|in_array|array_search|extract|compact|array_fill|range|array_multisort|array_push|array_pop|array_shift|array_unshift|array_splice|array_slice|array_merge|array_merge_recursive|array_keys|array_values|array_count_values|array_reverse|array_reduce|array_pad|array_flip|array_change_key_case|array_rand|array_unique|array_intersect|array_intersect_assoc|array_diff|array_diff_assoc|array_sum|array_filter|array_map|array_chunk|array_key_exists|array_intersect_key|array_combine|array_column|pos|sizeof|key_exists|assert|assert_options|version_compare|ftok|str_rot13|aggregate|session_name|session_module_name|session_save_path|session_id|session_regenerate_id|session_decode|session_register|session_unregister|session_is_registered|session_encode|session_start|session_destroy|session_unset|session_set_save_handler|session_cache_limiter|session_cache_expire|session_set_cookie_params|session_get_cookie_params|session_write_close|preg_match|preg_match_all|preg_replace|preg_replace_callback|preg_split|preg_quote|preg_grep|overload|ctype_alnum|ctype_alpha|ctype_cntrl|ctype_digit|ctype_lower|ctype_graph|ctype_print|ctype_punct|ctype_space|ctype_upper|ctype_xdigit|virtual|apache_request_headers|apache_note|apache_lookup_uri|apache_child_terminate|apache_setenv|apache_response_headers|apache_get_version|getallheaders|mysql_connect|mysql_pconnect|mysql_close|mysql_select_db|mysql_create_db|mysql_drop_db|mysql_query|mysql_unbuffered_query|mysql_db_query|mysql_list_dbs|mysql_list_tables|mysql_list_fields|mysql_list_processes|mysql_error|mysql_errno|mysql_affected_rows|mysql_insert_id|mysql_result|mysql_num_rows|mysql_num_fields|mysql_fetch_row|mysql_fetch_array|mysql_fetch_assoc|mysql_fetch_object|mysql_data_seek|mysql_fetch_lengths|mysql_fetch_field|mysql_field_seek|mysql_free_result|mysql_field_name|mysql_field_table|mysql_field_len|mysql_field_type|mysql_field_flags|mysql_escape_string|mysql_real_escape_string|mysql_stat|mysql_thread_id|mysql_client_encoding|mysql_get_client_info|mysql_get_host_info|mysql_get_proto_info|mysql_get_server_info|mysql_info|mysql|mysql_fieldname|mysql_fieldtable|mysql_fieldlen|mysql_fieldtype|mysql_fieldflags|mysql_selectdb|mysql_createdb|mysql_dropdb|mysql_freeresult|mysql_numfields|mysql_numrows|mysql_listdbs|mysql_listtables|mysql_listfields|mysql_db_name|mysql_dbname|mysql_tablename|mysql_table_name|pg_connect|pg_pconnect|pg_close|pg_connection_status|pg_connection_busy|pg_connection_reset|pg_host|pg_dbname|pg_port|pg_tty|pg_options|pg_ping|pg_query|pg_send_query|pg_cancel_query|pg_fetch_result|pg_fetch_row|pg_fetch_assoc|pg_fetch_array|pg_fetch_object|pg_fetch_all|pg_affected_rows|pg_get_result|pg_result_seek|pg_result_status|pg_free_result|pg_last_oid|pg_num_rows|pg_num_fields|pg_field_name|pg_field_num|pg_field_size|pg_field_type|pg_field_prtlen|pg_field_is_null|pg_get_notify|pg_get_pid|pg_result_error|pg_last_error|pg_last_notice|pg_put_line|pg_end_copy|pg_copy_to|pg_copy_from|pg_trace|pg_untrace|pg_lo_create|pg_lo_unlink|pg_lo_open|pg_lo_close|pg_lo_read|pg_lo_write|pg_lo_read_all|pg_lo_import|pg_lo_export|pg_lo_seek|pg_lo_tell|pg_escape_string|pg_escape_bytea|pg_unescape_bytea|pg_client_encoding|pg_set_client_encoding|pg_meta_data|pg_convert|pg_insert|pg_update|pg_delete|pg_select|pg_exec|pg_getlastoid|pg_cmdtuples|pg_errormessage|pg_numrows|pg_numfields|pg_fieldname|pg_fieldsize|pg_fieldtype|pg_fieldnum|pg_fieldprtlen|pg_fieldisnull|pg_freeresult|pg_result|pg_loreadall|pg_locreate|pg_lounlink|pg_loopen|pg_loclose|pg_loread|pg_lowrite|pg_loimport|pg_loexport|http_response_code|get_declared_traits|getimagesizefromstring|socket_import_stream|stream_set_chunk_size|trait_exists|header_register_callback|class_uses|session_status|session_register_shutdown|echo|print|global|static|exit|array|empty|eval|isset|unset|die|include|require|include_once|require_once|json_decode|json_encode|json_last_error|json_last_error_msg|curl_close|curl_copy_handle|curl_errno|curl_error|curl_escape|curl_exec|curl_file_create|curl_getinfo|curl_init|curl_multi_add_handle|curl_multi_close|curl_multi_exec|curl_multi_getcontent|curl_multi_info_read|curl_multi_init|curl_multi_remove_handle|curl_multi_select|curl_multi_setopt|curl_multi_strerror|curl_pause|curl_reset|curl_setopt_array|curl_setopt|curl_share_close|curl_share_init|curl_share_setopt|curl_strerror|curl_unescape|curl_version|mysqli_affected_rows|mysqli_autocommit|mysqli_change_user|mysqli_character_set_name|mysqli_close|mysqli_commit|mysqli_connect_errno|mysqli_connect_error|mysqli_connect|mysqli_data_seek|mysqli_debug|mysqli_dump_debug_info|mysqli_errno|mysqli_error_list|mysqli_error|mysqli_fetch_all|mysqli_fetch_array|mysqli_fetch_assoc|mysqli_fetch_field_direct|mysqli_fetch_field|mysqli_fetch_fields|mysqli_fetch_lengths|mysqli_fetch_object|mysqli_fetch_row|mysqli_field_count|mysqli_field_seek|mysqli_field_tell|mysqli_free_result|mysqli_get_charset|mysqli_get_client_info|mysqli_get_client_stats|mysqli_get_client_version|mysqli_get_connection_stats|mysqli_get_host_info|mysqli_get_proto_info|mysqli_get_server_info|mysqli_get_server_version|mysqli_info|mysqli_init|mysqli_insert_id|mysqli_kill|mysqli_more_results|mysqli_multi_query|mysqli_next_result|mysqli_num_fields|mysqli_num_rows|mysqli_options|mysqli_ping|mysqli_prepare|mysqli_query|mysqli_real_connect|mysqli_real_escape_string|mysqli_real_query|mysqli_reap_async_query|mysqli_refresh|mysqli_rollback|mysqli_select_db|mysqli_set_charset|mysqli_set_local_infile_default|mysqli_set_local_infile_handler|mysqli_sqlstate|mysqli_ssl_set|mysqli_stat|mysqli_stmt_init|mysqli_store_result|mysqli_thread_id|mysqli_thread_safe|mysqli_use_result|mysqli_warning_count
)\b/' => 'HighlightLib\Token\BuiltinToken',
        '/\b(?:abstract|and|array|as|break|case|catch|class|clone|const|continue|declare|default|do|else|elseif|enddeclare|endfor|endforeach|endif|endswitch|endwhile|extends|final|for|foreach|function|global|goto|if|implements|interface|instanceof|namespace|new|or|private|protected|public|static|switch|throw|trait|try|use|var|while|xor|die|echo|empty|exit|eval|include|include_once|isset|list|require|require_once|return|print|unset|__halt_compiler|self|static|parent|yield|insteadof|finally)\b/' => 'HighlightLib\Token\KeywordToken',
        '/\n|\r\n/' => 'HighlightLib\Token\NewlineToken'],
];