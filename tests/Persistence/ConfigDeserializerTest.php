<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\WikibaseExport\Tests\Persistence;

use PHPUnit\Framework\TestCase;
use ProfessionalWiki\WikibaseExport\Domain\Config;
use ProfessionalWiki\WikibaseExport\Tests\TestDoubles\Valid;
use ProfessionalWiki\WikibaseExport\WikibaseExportExtension;

/**
 * @covers \ProfessionalWiki\WikibaseExport\Persistence\ConfigDeserializer
 */
class ConfigDeserializerTest extends TestCase {

	public function testValidJsonReturnsConfig(): void {
		$deserializer = WikibaseExportExtension::getInstance()->newConfigDeserializer();

		$config = $deserializer->deserialize( Valid::configJson() );

		$this->assertSame(
			'en',
			$config->entityLabelLanguage
		);
		$this->assertSame(
			'choose foo',
			$config->chooseSubjectsLabel
		);
		$this->assertSame(
			'filter foo',
			$config->filterSubjectsLabel
		);
		$this->assertSame(
			[ 'Q1', 'Q2' ],
			$config->defaultSubjects
		);
		$this->assertSame(
			2010,
			$config->defaultStartYear
		);
		$this->assertSame(
			2022,
			$config->defaultEndYear
		);
		$this->assertSame(
			'P1',
			$config->startYearPropertyId
		);
		$this->assertSame(
			'P2',
			$config->endYearPropertyId
		);
		$this->assertSame(
			'P3',
			$config->pointInTimePropertyId
		);
		$this->assertSame(
			[ 'P4', 'P5' ],
			$config->properties
		);
		$this->assertSame(
			'Lorem ipsum',
			$config->introText
		);
	}

	public function testInvalidJsonReturnsEmptyConfig(): void {
		$deserializer = WikibaseExportExtension::getInstance()->newConfigDeserializer();

		$config = $deserializer->deserialize( '}{' );
		$emptyConfig = new Config();

		$this->assertSame(
			$emptyConfig->entityLabelLanguage,
			$config->entityLabelLanguage
		);
		$this->assertSame(
			$emptyConfig->chooseSubjectsLabel,
			$config->chooseSubjectsLabel
		);
		$this->assertSame(
			$emptyConfig->filterSubjectsLabel,
			$config->filterSubjectsLabel
		);
		$this->assertSame(
			$emptyConfig->defaultSubjects,
			$config->defaultSubjects
		);
		$this->assertSame(
			$emptyConfig->defaultStartYear,
			$config->defaultStartYear
		);
		$this->assertSame(
			$emptyConfig->defaultEndYear,
			$config->defaultEndYear
		);
		$this->assertSame(
			$emptyConfig->startYearPropertyId,
			$config->startYearPropertyId
		);
		$this->assertSame(
			$emptyConfig->endYearPropertyId,
			$config->endYearPropertyId
		);
		$this->assertSame(
			$emptyConfig->pointInTimePropertyId,
			$config->pointInTimePropertyId
		);
		$this->assertSame(
			$emptyConfig->properties,
			$config->properties
		);
		$this->assertSame(
			$emptyConfig->introText,
			$config->introText
		);
	}

}
