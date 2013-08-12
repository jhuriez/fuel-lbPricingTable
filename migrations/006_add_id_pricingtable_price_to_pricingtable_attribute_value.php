<?php

namespace Fuel\Migrations;

class Add_id_pricingtable_price_to_pricingtable_attribute_value
{
	public function up()
	{
		\DBUtil::add_fields('pricingtable_attribute_value', array(
			'id_pricingtable_price' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('pricingtable_attribute_value', array(
			'id_pricingtable_price'

		));
	}
}