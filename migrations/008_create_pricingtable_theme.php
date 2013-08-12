<?php

namespace Fuel\Migrations;

class Create_pricingtable_theme
{
	public function up()
	{
		\DBUtil::create_table('pricingtable_theme', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'file' => array('constraint' => 255, 'type' => 'varchar'),
			'css_file' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'js_file' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pricingtable_theme');
	}
}