<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeopleFixture
 */
class PeopleFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'name' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'password' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'comment' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1001,
                'name' => 'test name 1',
                'password' => 'test password 1',
                'comment' => 'test comment 1',
            ],
            [
                'id' => 1002,
                'name' => 'test name 2',
                'password' => 'test password 2',
                'comment' => 'test comment 2',
            ],
            [
                'id' => 1003,
                'name' => 'test name 3',
                'password' => 'test password 3',
                'comment' => 'test comment 3',
            ],
        ];
        parent::init();
    }
}
