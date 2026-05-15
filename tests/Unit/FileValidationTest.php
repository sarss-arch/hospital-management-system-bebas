<?php
namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
class FileValidationTest extends TestCase { public function test_filename_can_be_sanitized(): void { $name='../../hasil lab.pdf'; $this->assertStringNotContainsString('..', basename($name)); } }
