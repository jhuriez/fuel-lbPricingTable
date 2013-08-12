<?php

namespace Fuel\Migrations;

class Create_pricingtable_price
{
	public function up()
	{
		\DBUtil::create_table('pricingtable_price', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'is_new' => array('type' => 'boolean'),
			'is_popular' => array('type' => 'boolean'),
			'view_counter' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'price' => array('type' => 'float'),
			'price_text' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'price_small_text' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'currency' => array('constraint' => 255, 'type' => 'varchar'),
			'button_action_text' => array('constraint' => 255, 'type' => 'varchar'),
			'button_action_url' => array('constraint' => 255, 'type' => 'varchar'),
			'small_text' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'position' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pricingtable_price');
	}
}