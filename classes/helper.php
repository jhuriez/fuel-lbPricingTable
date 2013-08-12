<?php

namespace LbPricingTable;

class Helper
{

    /**
     * Helper for manage collection in a object with "has_many" relationship
     * 
     * a POST example :
     * 
     * - For new object
     * $_POST['collection_name']['new']['uniq_id']['attribute_name']
     * 
     * - For existing object
     * $_POST['collection_name']['id']['attibute_name']
     * 
     * @param object $parentObject
     * @param string $collectionClassName
     * @param string $collectionName
     * @param bool $isUpdate It's an update or create ?
     * @param bool $deleteObject If we delete the object or just remove the relationship if he's not in the collection
     * @param array $attributes Attributes of object in collection
     * @return array
     */
    public static function manageCollection($parentObject, $collectionClassName, $collectionName, $isUpdate = false, $deleteObject = false, $attributes = array())
    {

        /**
         * Manage attribute title
         */
        $objectsToDelete = array();
        if ($isUpdate) {
            $objectsKey = array_keys($parentObject->{$collectionName});
            foreach ($objectsKey as $objectId) {
                if (\Input::post($collectionName . '.' . $objectId) === null) {
                    // Delete the object
                    $deleteObject and $objectsToDelete[] = $parentObject->{$collectionName}[$objectId];
                    unset($parentObject->{$collectionName}[$objectId]);
                } else {
                    // Update the object
                    $fromArray = array();
                    foreach ($attributes as $attribute) {
                        $fromArray[$attribute] = \Input::post($collectionName . '.' . $objectId . '.' . $attribute);
                    }
                    $parentObject->{$collectionName}[$objectId]->from_array($fromArray);
                }
            }
        }
        // Create the object
        $createObjects = (\Input::post($collectionName . '.new')) ? : array();
        foreach ($createObjects as $objectPost) {
            $fromArray = array();
            foreach ($attributes as $attribute) {
                $fromArray[$attribute] = $objectPost[$attribute];
            }
            $object = call_user_func(array($collectionClassName, 'forge'), $fromArray);
            $parentObject->{$collectionName}[] = $object;
        }

        return array(
            $parentObject,
            $objectsToDelete,
        );
    }

}
