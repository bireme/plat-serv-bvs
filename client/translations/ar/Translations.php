<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'مستخدم التوثيق';
        self::$trans["authentication"]["EMAIL"] = 'البريد الإلكتروني';
        self::$trans["authentication"]["LOGIN"] = 'تسجيل الدخول';
        self::$trans["authentication"]["PASSWORD"] = 'كلمة السر';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'كلمة السر / المستخدم غير صحيح';

    // Terms of the menu pages
        self::$trans["menu"]["USERS_SERVICES"] = 'الطلب على الخدمات';
        self::$trans["menu"]["OLA"] = 'مرحبا';
        self::$trans["menu"]["LOGOUT"] = 'خروج';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'وثائق بروفايلي';
        self::$trans["menu"]["MY_SHELF"] = 'ال بي';
        self::$trans["menu"]["MY_LINKS"] = 'لي صلات';
        self::$trans["menu"]["MY_NEWS"] = 'أخبار بلدي';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'نسيت كلمة السر؟';
        self::$trans["menu"]["MY_DATA"] = 'تعديل بيانات المستخدم';
        self::$trans["menu"]["MY_ALERTS"] = 'بي تنبيهات';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'مجموعة بي';
        self::$trans["mydocuments"]["BY_DATE"] = 'حسب التاريخ';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'ةدراولا مجلد';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'إضافة مجلد';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'بلدي المجلدات';
        self::$trans["mydocuments"]["SHOW_BY"] = 'وبالنظر إلى قائمة من قبل';
        self::$trans["mydocuments"]["DATE"] = 'تاريخ';
        self::$trans["mydocuments"]["MY_RANK"] = 'تصنيفي';
        self::$trans["mydocuments"]["MOVE_TO"] = 'الانتقال إلى';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'النص الكامل';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'إزالة من ال';
        self::$trans["mydocuments"]["HOME"] = 'منزل ';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'منزل ';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'رصدت وصول';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'لا سجلات وجدت ';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'تعديل المجلدات';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'إزالة مجلد';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'اسم المجلد';
        self::$trans["directories"]["EDIT_FOLDER"] = 'تعديل المجلدات';
        self::$trans["directories"]["SAVE"] = 'خلق';
        self::$trans["directories"]["CANCEL"] = 'الغاء';
        self::$trans["directories"]["REMOVE"] = 'يزيل';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'إزالة مجلد';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'إزالة المحتوى';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'نقل المحتويات إلى مجلد آخر';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'ةدراولا مجلد';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'منزل';
        self::$trans["mylinks"]["SHOW_BY"] = 'وبالنظر إلى قائمة من قبل';
        self::$trans["mylinks"]["DATE"] = 'تاريخ';
        self::$trans["mylinks"]["MY_RANK"] = 'تصنيفي ';
        self::$trans["mylinks"]["TOOLS"] = 'أدوات';
        self::$trans["mylinks"]["ADD_LINK"] = 'إضافة وصلة';
        self::$trans["mylinks"]["MY_LINKS"] = 'بلدي صلة';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'إزالة الارتباط';
        self::$trans["mylinks"]["EDIT_LINK"] = 'وصلة تحرير';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'إزالة من الداخل';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'نشر في الصفحة الرئيسية';
        self::$trans["mylinks"]["LINK_TITLE"] = 'العنوان';
        self::$trans["mylinks"]["LINK_URL"] = 'العنوان';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'وصف';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'نشر في الصفحة الرئيسية';
        self::$trans["mylinks"]["SAVE"] = 'حفظ';
        self::$trans["mylinks"]["CANCEL"] = 'الغاء';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'العثور على أي سجلات';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'منزل';
        self::$trans["mynews"]["SHOW_BY"] = 'وبالنظر إلى قائمة من قبل';
        self::$trans["mynews"]["DATE"] = 'تاريخ';
        self::$trans["mynews"]["MY_RANK"] = 'تصنيفي';
        self::$trans["mynews"]["TOOLS"] = 'أدوات';
        self::$trans["mynews"]["ADD_NEWS"] = 'إضافة تغذية RSS';
        self::$trans["mynews"]["MY_NEWS"] = 'أخبار بلدي';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'إزالة تغذية rss';
        self::$trans["mynews"]["EDIT_NEWS"] = 'تحرير rss تغذية';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'إزالة من الداخل';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'نشر في الصفحة الرئيسية';
        self::$trans["mynews"]["NEWS_TITLE"] = 'العنوان';
        self::$trans["mynews"]["NEWS_URL"] = 'العنوان';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'وصف';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'نشر في الصفحة الرئيسية';
        self::$trans["mynews"]["SAVE"] = 'حفظ';
        self::$trans["mynews"]["CANCEL"] = 'الغاء';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'لا سجلات وجدت';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'منزل';
        self::$trans["myalerts"]["TOOLS"] = 'أدوات';
        self::$trans["myalerts"]["MY_ALERTS"] = 'بي تنبيهات';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'وصول الإحصاءات';
        self::$trans["myalerts"]["CITED_LIST"] = 'الاقتباس ';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'رفع حالة التأهب';
        self::$trans["myalerts"]["FULL_TEXT"] = 'النص الكامل';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'وتظهر الاحصاءات الوصول';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'وتظهر مقتطفات';
        self::$trans["myalerts"]["SHOW_ALL"] = 'وتظهر كل من';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'العثور على أي سجلات';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'العثور على أي سجلات';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Meus Perfis';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar perfil';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Adicionar perfil';
        self::$trans["myalerts"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myalerts"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
    }

/**
 * @param <type> $term
 * @return <type>
 */
    public function getTrans($page,$term){
        $output=self::$trans[$page][$term];
        if (trim($output) == ""){
            $output = "translate_".$term;
        }
        return $output;
    }
}

?>
