<?php
/**
 * @api {OBJECT} Staff Staff
 * @apiVersion 4.0.0
 * @apiGroup Data Structures
 * @apiParam {String} name Name of the staff member.
 * @apiParam {String} email Email of the staff member.
 * @apiParam {String} profilePic profilePic url of the staff member.
 * @apiParam {Number} level Level of the staff member.
 * @apiParam {Object[]} departments The departments the staff member has assigned.
 * @apiParam {[Ticket](#api-Data_Structures-ObjectTicket)[]} tickets The tickets the staff member has assigned.
 * @apiParam {Number} lastLogin The last login of the staff member.
 */

class Staff extends DataStore {
    const TABLE = 'staff';

    public static function authenticate($userEmail, $userPassword) {
        $user = Staff::getUser($userEmail, 'email');

        return ($user && Hashing::verifyPassword($userPassword, $user->password)) ? $user : new NullDataStore();
    }

    public static function getProps() {
        return [
            'name',
            'email',
            'password',
            'profilePic',
            'level',
            'sharedDepartmentList',
            'sharedTicketList',
            'lastLogin',
            'ownStatList'
        ];
    }

    public function getDefaultProps() {
        return [
            'level' => 1,
            'ownStatList' => new DataStoreList()
        ];
    }

    public static function getUser($value, $property = 'id') {
        return parent::getDataStore($value, $property);
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profilePic' => $this->profilePic,
            'level' => $this->level,
            'departments' => $this->sharedDepartmentList->toArray(),
            'tickets' => $this->sharedTicketList->toArray(),
            'lastLogin' => $this->lastLogin
        ];
    }
}
