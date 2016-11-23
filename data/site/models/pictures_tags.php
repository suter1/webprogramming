<?php
class PicturesTags extends Model {

    static function getTableName()
    {
        return "pictures_tags";
    }

    protected function has_and_belongs_to_many()
    {
        return [];
    }

	protected function has_many() {
		return [];
	}
}