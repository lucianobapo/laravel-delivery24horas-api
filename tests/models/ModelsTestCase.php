<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ModelsTestCase extends TestCase
{
    use DatabaseMigrations;

    protected $testClass = Illuminate\Database\Eloquent\Model::class;
    protected $testDateFields = [];

    public static function setupBeforeClass()
    {
        // note that method chaining is supported
//        FactoryMuffin::setFakerLocale('en_EN')->setSaveMethod('save'); // optional step
//        FactoryMuffin::loadFactories(database_path('factories/FactoryMuffin'));
    }

    public function test_sample_factory()
    {
        $record = factory($this->testClass)->create();
        $this->assertInstanceOf($this->testClass, $record);
    }

    public function test_date_fields()
    {

        if (count($this->testDateFields)>0) {
            foreach($this->testDateFields as $field){
                // Instantiate, fill with values, save and return
                $record = factory($this->testClass)->create();

                // Regular expression that represents d/m/Y pattern
                $expected = '/\d{2}\/\d{2}\/\d{4}/';

                // True if preg_match finds the pattern
                $matches = ( preg_match($expected, $record->$field) ) ? true : false;

                $this->assertTrue( $matches );
            }

        } else {
            $this->markTestSkipped(
                "Class $this->testClass date fields missing."
            );
        }

    }
}
