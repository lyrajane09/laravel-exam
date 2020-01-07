<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Services\ImportService;

class ImportTest extends TestCase
{

    use RefreshDatabase;

    public function testSuccessImportPlayer()
    {
        $import = new ImportService;
        $import_process = $import->importPlayer();

        $this->assertEquals($import_process['status'], 200);
        $this->assertEquals($import_process['message'], 'Successfully Imported');
        $this->assertEquals($import_process['total'], 589);
    }

    public function testFailedImportPlayer()
    {
        $import = new ImportService;
        $import_process = $import->importPlayer('https://somewrongwebsite.xyz');

        $this->assertEquals($import_process['status'], 400);
        $this->assertEquals($import_process['message'], 'Bad Request');
        $this->assertEquals($import_process['total'], 0);
    }
}
