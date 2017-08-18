<? namespace Intervolga\Migrato\Data\Module\Crm;

use Intervolga\Migrato\Data\BaseUserField;

class Field extends BaseUserField
{
    /**
     * @param string $userFieldEntityId
     *
     * @return int
     */
    public function isCurrentUserField($userFieldEntityId)
    {
        return preg_match("/^CRM_[A-Z0-9_]+$/", $userFieldEntityId);
    }

    protected function userFieldToRecord(array $userField)
    {
        $record = parent::userFieldToRecord($userField);
        $record->addFieldsRaw(array("ENTITY_ID" => $userField["ENTITY_ID"]));
        return $record;
    }

    /**
     * @return string
     */
    public function getDependencyString()
    {
        return "";
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function getDependencyNameKey($id)
    {
        return "";
    }
}