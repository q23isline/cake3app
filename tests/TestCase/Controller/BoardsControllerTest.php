<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BoardsController;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\BoardsController Test Case
 *
 * @uses \App\Controller\BoardsController
 */
class BoardsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Boards',
        'app.People',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/boards');
        $this->assertResponseOk();
    }

    /**
     * Test show method
     *
     * @return void
     */
    public function testShow()
    {
        $this->get('/boards/show/1');
        $this->assertResponseOk();
    }

    public function testAddPost()
    {
        // ↓テキストにはなし
        // CakePHPのCSRF対策突破用
        $this->cookie('csrfToken', 'test-token');
        $this->_request['headers'] = ['X-CSRF-Token' => 'test-token'];

        $data = [
            'name' => 'test name 1',
            'password' => 'test password 1',
            'title' => 'test new title 1',
            'content' => 'test new content 1',
        ];
        $this->post('/boards/add', $data);

        $this->assertResponseSuccess();
        $boards = TableRegistry::get('Boards');
        $query = $boards->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $query->count());
    }
}
