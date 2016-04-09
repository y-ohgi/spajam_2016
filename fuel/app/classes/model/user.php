<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

    /*
    // ユーザープロフィール
    protected static $_has_one = array(
        'profile' => array(
            'model_to' => 'Model_Profile',
            'key_from' => 'id',
            'key_to' => 'user_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        ),
    );

    // 認証用トークン
    protected static $_has_one = array(
        'token' => array(
            'model_to' => 'Model_Token',
            'key_from' => 'id',
            'key_to' => 'user_id',
            'cascade_save' => true,
            'cascade_delete' => true,
        ),
    );

    // 連絡先
    protected static $_has_many = array(
        'contacts' => array(
            'model_to' => 'Model_Contact',
            'key_from' => 'id',
            'key_to' => 'user_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    // 使用可能言語
    protected static $_has_many = array(
        'languages' => array(
            'model_to' => 'Model_Language',
            'key_from' => 'id',
            'key_to' => 'user_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );
    */
}
