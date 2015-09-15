<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
* Test the Todo resource
*/
class TodosTest extends TestCase
{
  use DatabaseTransactions, WithoutMiddleware;

  public function testIndex()
  {
    $todos = factory(Dunnit\Models\Todo::class, 5)->create();

    foreach ($todos as $todo) {
      $this->get('todos')
           ->seeJson($this->makeJson($todo));
    }
  }

  public function testStore()
  {
    $todo = factory(Dunnit\Models\Todo::class)->make();

    $json = $this->makeJson($todo);
    unset($json['id']);

    $this->post('todos', $todo->toArray())
         ->seeInDatabase('todos', $json)
         ->seeJson($json);
  }

  public function testShow()
  {
    $todo = factory(Dunnit\Models\Todo::class)->create();

    $this->get('todos/' . $todo->id)
         ->seeJson($this->makeJson($todo));
  }

  public function testUpdate()
  {
    $todo = factory(Dunnit\Models\Todo::class)->create();
    $todo->text = 'Replacement Text';
    $json = $this->makeJson($todo);

    $this->put('todos/' . $todo->id, $json)
         ->seeInDatabase('todos', $json)
         ->seeJson($json);
  }

  public function testDelete()
  {
    $todo = factory(Dunnit\Models\Todo::class)->create();

    $this->delete('todos/' . $todo->id)
         ->notSeeInDatabase('todos', $this->makeJson($todo));
  }

  protected function makeJson($todo)
  {
    return [
      'id'   => strval($todo->id),
      'text' => $todo->text,
      'done' => $todo->done ? '1' : '0',
    ];
  }

}